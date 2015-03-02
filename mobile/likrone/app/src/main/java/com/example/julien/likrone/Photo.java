package com.example.julien.likrone;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.provider.MediaStore;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;


public class Photo extends MenuActivity implements View.OnClickListener {

    /*
        Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
        File fichier = new File(Environment.getExternalStorageDirectory(), "/storage/emulated/0/DCIM/Camera/20150211_083145.jpg");
        Uri chemin = Uri.fromFile(fichier);
    */

    Button img = null;
    Button raz = null;
    EditText titre = null;
    EditText desc = null;
    String OPERATOR;

    public Photo(){
        super(2);
    }


    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.new_photo);

        img = (Button) findViewById(R.id.photo);
        img.setOnClickListener(this);
        Intent operator_intent = getIntent();
        OPERATOR = operator_intent.getStringExtra("operator");

        raz = (Button) findViewById(R.id.cancel);
        // intent.putExtra(MediaStore.EXTRA_OUTPUT, chemin);

        //this.startActivityForResult(intent, 0);
        //raz.setOnClickListener(razListener);
        titre = (EditText) findViewById(R.id.titre);
        desc = (EditText) findViewById(R.id.description);
    }

    @Override
    public void onClick(View v) {
        if (v.getId() == R.id.photo) {
            startCameraActivity();
        }

    }

    public void startCameraActivity() {
        final Intent capture_intent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(capture_intent, 1);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (resultCode == RESULT_OK) {
            if (requestCode == 1) {
                Uri picUri = data.getData();
            }
        }
    }
}
