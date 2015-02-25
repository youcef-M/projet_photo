package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.Toast;


public class Photo extends Activity {

    /*
        Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
        File fichier = new File(Environment.getExternalStorageDirectory(), "/storage/emulated/0/DCIM/Camera/20150211_083145.jpg");
        Uri chemin = Uri.fromFile(fichier);
    */
    ImageView img = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.new_photo);

        // intent.putExtra(MediaStore.EXTRA_OUTPUT, chemin);

        //this.startActivityForResult(intent, 0);

        img = (ImageView) findViewById(R.id.photo);
        ImageView b = (ImageView) findViewById(R.id.photo);

        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(Photo.this, "Activation de l'appareil photo", Toast.LENGTH_SHORT).show();

                Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                startActivityForResult(intent, 0);
            }
        });
    }

    @Override
    public  void onActivityResult(int requestCode, int resultCode, Intent data) {

        // TODO Auto-generated method stub
        Bitmap bit= (Bitmap) data.getExtras().get("data");
        img.setImageBitmap(bit);

    }
}