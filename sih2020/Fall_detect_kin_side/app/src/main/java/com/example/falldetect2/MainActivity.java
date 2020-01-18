package com.example.falldetect2;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.media.AudioManager;
import android.media.Ringtone;
import android.media.RingtoneManager;
import android.media.ToneGenerator;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.firestore.DocumentReference;
import com.google.firebase.firestore.DocumentSnapshot;
import com.google.firebase.firestore.EventListener;
import com.google.firebase.firestore.FirebaseFirestore;
import com.google.firebase.firestore.FirebaseFirestoreException;


public class MainActivity extends AppCompatActivity {
    private TextView test;
    private static final String TAG = "MyActivity";
     FirebaseFirestore db = FirebaseFirestore.getInstance();
      DocumentReference docc = db.collection("Fall").document("First alert ");


        @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        test=findViewById(R.id.test);
    }

    @Override
    protected void onStart() {

        super.onStart();
        docc.addSnapshotListener(this,new EventListener<DocumentSnapshot>() {
            @Override
            public void onEvent(@Nullable DocumentSnapshot documentSnapshot, @Nullable FirebaseFirestoreException e) {
                if (e != null) {
                Log.w(TAG, "Listen failed.", e);
                return;
            }
                if(documentSnapshot.exists()){
                    Toast.makeText(MainActivity.this,"Patient fell",Toast.LENGTH_SHORT);
                    test.setText("Pateint fallen");
                    ToneGenerator toneGen1= new ToneGenerator(AudioManager.STREAM_ALARM,100);
                    toneGen1.startTone(ToneGenerator.TONE_CDMA_PIP,150);
                    Uri notification = RingtoneManager.getDefaultUri(RingtoneManager.TYPE_NOTIFICATION);
                    Ringtone r = RingtoneManager.getRingtone(getApplicationContext(), notification);
                    r.play();
                }
            }
        });
    }
}
