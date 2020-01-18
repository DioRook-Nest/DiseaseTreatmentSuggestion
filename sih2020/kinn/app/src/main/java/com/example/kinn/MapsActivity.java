package com.example.kinn;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.core.app.ActivityCompat;
import androidx.fragment.app.FragmentActivity;

import android.Manifest;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Color;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationProvider;
import android.os.Bundle;
import android.os.Looper;
import android.telephony.SmsManager;
import android.util.Log;
import android.widget.Toast;

import com.firebase.geofire.GeoFire;
import com.firebase.geofire.GeoLocation;
import com.firebase.geofire.GeoQuery;
import com.firebase.geofire.GeoQueryEventListener;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.GooglePlayServicesUtil;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationCallback;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.CircleOptions;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.util.Random;
//import com.google.firebase.firestore.DocumentReference;
//import com.google.firebase.firestore.FirebaseFirestore;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback,
        GoogleApiClient.ConnectionCallbacks,
        GoogleApiClient.OnConnectionFailedListener,
        LocationListener{

    private GoogleMap mMap;
    private static final int PLAY_SERVICES_RESOLUTION_REQUEST=300193;
    private static final int MY_PERMISSION_REQUEST_CODE=7192;
    private LocationRequest mLocationRequest;
    private GoogleApiClient mGoogleApiClient;
    private Location mLastLocation;
    private static int UPDATE_INTERVAL=5000;
    private static int FASTEST_INTERVAL=3000;
    private static int DISPLACEMENT=10;
    Marker myCurrent;

    DatabaseReference ref;
    GeoFire geoFire;
    private FusedLocationProviderClient mFusedLocationClient;
    //FusedLocationProviderClient mFusedLocationClient = LocationServices.getFusedLocationProviderClient(this);
    //private FirebaseFirestore db1 = FirebaseFirestore.getInstance();
   // private DocumentReference refer = db1.collection("locator").document("abhi");

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        mFusedLocationClient = LocationServices.getFusedLocationProviderClient(this);
        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);
        ref= FirebaseDatabase.getInstance().getReference("MyLocation");
        geoFire=new GeoFire(ref);
        setUpLocation();

    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        switch (requestCode)
        {
            case MY_PERMISSION_REQUEST_CODE:
                if(grantResults.length>0 && grantResults[0]==PackageManager.PERMISSION_GRANTED)
                {
                    if(checkPlayServices())
                    {
                        buildGoogleApiClient();
                        createLocationRequest();
                        displayLocation();
                    }
                }
                break;
        }
    }

    private void setUpLocation() {
    if(ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION)!= PackageManager.PERMISSION_GRANTED &&
            ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)!= PackageManager.PERMISSION_GRANTED )
    {
        ActivityCompat.requestPermissions(this,new String[]{
                Manifest.permission.ACCESS_COARSE_LOCATION,
                Manifest.permission.ACCESS_FINE_LOCATION
        },MY_PERMISSION_REQUEST_CODE);
    }
    else
    {
        if(checkPlayServices())
        {
            buildGoogleApiClient();
            createLocationRequest();
            displayLocation();
        }
    }
    }

    private void displayLocation() {
        if(ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION)!= PackageManager.PERMISSION_GRANTED &&
                ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)!= PackageManager.PERMISSION_GRANTED )
        {
            return;
        }
        mLastLocation=LocationServices.FusedLocationApi.getLastLocation(mGoogleApiClient);
        if(mLastLocation!=null)
        {
            final double latitude=mLastLocation.getLatitude();
            final double longitude=mLastLocation.getLongitude();

            //update firebase
            geoFire.setLocation("You", new GeoLocation(latitude, longitude), new GeoFire.CompletionListener() {
                        @Override
                        public void onComplete(String key, DatabaseError error) {
                            if(myCurrent!=null)
                                myCurrent.remove();
                            myCurrent=mMap.addMarker(new MarkerOptions()
                            .position(new LatLng(latitude,longitude))
                            .title("You"));
                            mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(new LatLng(latitude,longitude),15.0f));
                        }
                    }
            );



            Log.d("EDM",String.format("Your location changed: %f / %f",latitude,longitude));
        }
        else
        {
            Log.d("EDM","Cannot get your location");
        }
    }

    private void createLocationRequest() {
        mLocationRequest=new LocationRequest();
        mLocationRequest.setInterval(UPDATE_INTERVAL);
        mLocationRequest.setInterval(FASTEST_INTERVAL);
        mLocationRequest.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);
        mLocationRequest.setSmallestDisplacement(DISPLACEMENT);
    }

    private void buildGoogleApiClient() {
    mGoogleApiClient=new GoogleApiClient.Builder(this)
            .addConnectionCallbacks(this)
            .addOnConnectionFailedListener(this)
            .addApi(LocationServices.API)
            .build();
    mGoogleApiClient.connect();
    }

    private boolean checkPlayServices() {
    int resultCode= GooglePlayServicesUtil.isGooglePlayServicesAvailable(this);
    if(resultCode!=ConnectionResult.SUCCESS)
    {
        if(GooglePlayServicesUtil.isUserRecoverableError(resultCode))
            GooglePlayServicesUtil.getErrorDialog(resultCode,this,PLAY_SERVICES_RESOLUTION_REQUEST).show();
        else
        {
            Toast.makeText(this,"This device is not supported",Toast.LENGTH_SHORT).show();
            finish();
        }
        return false;
    }
    return  true;
    }


    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;
        //create area
        LatLng dangerous_area=new LatLng(19.045166 , 72.890500);
//        LatLng dangerous_area=new LatLng(19.047734,72.904158);
        mMap.addCircle(new CircleOptions()
        .center(dangerous_area)
        .radius(400)
        .strokeColor(Color.BLUE)
        .fillColor(0x220000FF)
        .strokeWidth(5.0f)
        );
        //geoquery
        GeoQuery geoQuery=geoFire.queryAtLocation(new GeoLocation(dangerous_area.latitude,dangerous_area.longitude),0.1f);
        geoQuery.addGeoQueryEventListener(new GeoQueryEventListener() {
            @Override
            public void onKeyEntered(String key, GeoLocation location) {
                sendNotification("EDMTV",String.format("%s is in the area",key));
                Toast.makeText(MapsActivity.this, "Person is in the area", Toast.LENGTH_SHORT).show();
                SmsManager smsManager = SmsManager.getDefault();
                smsManager.sendTextMessage("+919920966108", null, "Person is in the area. http://maps.google.com/?q="+location.latitude+","+location.longitude, null, null);
                Toast.makeText(getApplicationContext(), "SMS sent.",
                        Toast.LENGTH_LONG).show();
            }

            @Override
            public void onKeyExited(String key) {
                sendNotification("EDMTV",String.format("%s is outside the area!!",key));

            }

            @Override
            public void onKeyMoved(String key, GeoLocation location) {
                Log.d("MOVE",String.format("%s moved within the area [%f/%f]",key,location.latitude,location.longitude));
            }

            @Override
            public void onGeoQueryReady() {

            }

            @Override
            public void onGeoQueryError(DatabaseError error) {
            Log.e("ERROR",""+error);
                SmsManager smsManager = SmsManager.getDefault();
                smsManager.sendTextMessage("+918850580571", null, "signal lost!!!", null, null);
                Toast.makeText(getApplicationContext(), "SMS sent.",
                        Toast.LENGTH_LONG).show();
            }
        });
    }

    private void sendNotification(String title, String content) {
        Notification.Builder builder=new Notification.Builder(this).setSmallIcon(R.mipmap.ic_launcher_round).setContentTitle(title)
                .setContentText(content);
        NotificationManager manager=(NotificationManager)this.getSystemService(Context.NOTIFICATION_SERVICE);
        Intent Intent=new Intent(this,MapsActivity.class);
        PendingIntent contentIntent=PendingIntent.getActivity(this,0,Intent,PendingIntent.FLAG_IMMUTABLE);
        builder.setContentIntent(contentIntent);
        Notification notification= builder.build();
        notification.flags = Notification.FLAG_NO_CLEAR;
        notification.defaults=Notification.DEFAULT_SOUND;
        manager.notify(new Random().nextInt(),notification);
    }

    @Override
    public void onLocationChanged(Location location) {
mLastLocation=location;
displayLocation();
    }

    @Override
    public void onStatusChanged(String s, int i, Bundle bundle) {

    }

    @Override
    public void onProviderEnabled(String s) {

    }

    @Override
    public void onProviderDisabled(String s) {

    }

    @Override
    public void onConnected(@Nullable Bundle bundle) {
    displayLocation();
    startLocationUpdates();
    }

    private void startLocationUpdates() {
        if(ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION)!= PackageManager.PERMISSION_GRANTED &&
                ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)!= PackageManager.PERMISSION_GRANTED )
        {
            return;
        }
        mFusedLocationClient.getLastLocation()
                .addOnSuccessListener(this, new OnSuccessListener<Location>() {
                    @Override
                    public void onSuccess(Location location) {
                        // Got last known location. In some rare situations, this can be null.
                        if (location != null) {
                            // Logic to handle location object
                        }
                    }
                });
    //    LocationServices.FusedLocationApi.requestLocationUpdates(mGoogleApiClient,mLocationRequest, (com.google.android.gms.location.LocationListener) this);
        //mFusedLocationClient.requestLocationUpdates(mLocationRequest,new LocationCallback(),Looper.myLooper());
    }

    @Override
    public void onConnectionSuspended(int i) {
mGoogleApiClient.connect();
    }

    @Override
    public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {

    }
}
