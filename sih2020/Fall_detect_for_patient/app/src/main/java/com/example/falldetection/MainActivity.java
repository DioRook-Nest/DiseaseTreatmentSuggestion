package com.example.falldetection;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.hardware.Sensor;
import android.hardware.SensorEvent;
import android.hardware.SensorEventListener;
import android.hardware.SensorManager;
import android.media.AudioManager;
import android.media.Ringtone;
import android.media.RingtoneManager;
import android.media.ToneGenerator;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.firestore.FirebaseFirestore;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity implements SensorEventListener {


    private static final String TAG = "MyActivity";
    public static final  String ALERT= "The patient have fallen";
    private SensorManager sensorManager;
    Sensor accelerometer;
    private FirebaseFirestore db= FirebaseFirestore.getInstance();
    public EditText test;
//    onSensorChanged(accelerometer);


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        test=findViewById(R.id.test);
        sensorManager=(SensorManager) getSystemService(Context.SENSOR_SERVICE);
        accelerometer=sensorManager.getDefaultSensor(Sensor.TYPE_ACCELEROMETER);
        sensorManager.registerListener(MainActivity.this,accelerometer,SensorManager.SENSOR_DELAY_NORMAL);
    }

    @Override
    public void onSensorChanged(SensorEvent foEvent) {
        if (foEvent.sensor.getType() == Sensor.TYPE_ACCELEROMETER) {
            double loX = foEvent.values[0];
            double loY = foEvent.values[1];
            double loZ = foEvent.values[2];

            double loAccelerationReader = Math.sqrt(Math.pow(loX, 2)
                    + Math.pow(loY, 2)
                    + Math.pow(loZ, 2));
            long mlPreviousTime = System.currentTimeMillis();
            Log.i(TAG, "loX : " + loX + " loY : " + loY + " loZ : " + loZ);
            boolean moIsMin=true ;
            if (loAccelerationReader <= 6.0) {
                moIsMin = false;
                Log.i(TAG, "min");
            }

            int i=0;
            boolean moIsMax=false;
            if (moIsMin) {
                i = i + 1;
                Log.i(TAG, " loAcceleration : " + loAccelerationReader);
                if (loAccelerationReader >= 30) {
                    long llCurrentTime = System.currentTimeMillis();
                    long llTimeDiff = llCurrentTime - mlPreviousTime;
                    Log.i(TAG, "loTime :" + llTimeDiff);
                    if (llTimeDiff >= 1) {
                        moIsMax = true;
                        Log.i(TAG, "max");
                    }
                }

            }

            if (moIsMin && moIsMax) {
                Log.i(TAG, "loX : " + loX + " loY : " + loY + " loZ : " + loZ);
                Log.i(TAG, "FALL DETECTED!!!!!");
                Toast.makeText(this, "FALL DETECTED!!!!!", Toast.LENGTH_SHORT).show();
                ToneGenerator toneGen1= new ToneGenerator(AudioManager.STREAM_ALARM,100);
                toneGen1.startTone(ToneGenerator.TONE_CDMA_PIP,150);
                Uri notification = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
                Ringtone r = RingtoneManager.getRingtone(getApplicationContext(), notification);
                r.play();
                Map<String, Object> a=new HashMap<>();
                String t= test.getText().toString();
                a.put(ALERT,t);
                db.collection("Fall").document("First alert ").set(a)
                        .addOnSuccessListener(new OnSuccessListener<Void>() {
                            @Override
                            public void onSuccess(Void aVoid) {
                                Toast.makeText(MainActivity.this,"Guardian notified",Toast.LENGTH_SHORT);

                            }
                        })
                        .addOnFailureListener(new OnFailureListener() {
                            @Override
                            public void onFailure(@NonNull Exception e) {
                                Toast.makeText(MainActivity.this,"Failed to notify ",Toast.LENGTH_SHORT);
                                Log.i(TAG,e.toString());
                            }
                        });

                i = 0;
                moIsMin = false;
                moIsMax = false;
            }

            if (i > 5) {
                i = 0;
                moIsMin = false;
                moIsMax = false;
            }

        }
    }    

    @Override
    public void onAccuracyChanged(Sensor sensor, int accuracy) {

     
    }

}
