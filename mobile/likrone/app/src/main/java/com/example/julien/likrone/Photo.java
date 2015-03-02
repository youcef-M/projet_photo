package com.example.julien.likrone;

import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.Toast;


public class Photo extends MenuActivity {

    ImageView img = null;
    Button raz = null;
    EditText titre = null;
    EditText desc = null;
    ImageButton camera = null;

    public Photo(){
        super(2);
    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.new_photo);

        raz = (Button) findViewById(R.id.cancel);
        raz.setOnClickListener(razListener);
        titre = (EditText) findViewById(R.id.titre);
        desc = (EditText) findViewById(R.id.description);
        camera = (ImageButton) findViewById(R.id.camera);

        img = (ImageView) findViewById(R.id.photo);

        camera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (v.getId() == R.id.camera){
                startCameraActivity();
                }
            }
        });
    }

    public void startCameraActivity() {
        Toast.makeText(Photo.this, "Activation de l'appareil photo", Toast.LENGTH_SHORT).show();
        Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
        startActivityForResult(intent, 1);
    }


    @Override
    public  void onActivityResult(int requestCode, int resultCode, Intent data) {

        if (resultCode == RESULT_OK) if (requestCode == 1) {
            //Uri picUri = data.getData();
            Bitmap photo = (Bitmap) data.getExtras().get("data");
            img.setImageBitmap(photo);
        }
    }


    private View.OnClickListener razListener = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            titre.getText().clear();
            desc.getText().clear();
        }
    };
}