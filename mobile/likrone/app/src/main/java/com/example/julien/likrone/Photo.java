package com.example.julien.likrone;

import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;

import java.io.File;


public class Photo extends MenuActivity {

    ImageView img = null;
    Button raz = null;
    Button valider = null;
    EditText titre = null;
    EditText desc = null;
    ImageButton camera = null;

    File file = null;
    Uri mImageUri = null;

    private static final int MEDIA_TYPE_IMAGE = 1;
    private Uri fileUri;

    final String EXTRA_Titre = "Titre_Photo";
    final String EXTRA_Desc = "Desc_Photo";

    public Photo(){
        super(2);
    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.new_photo);

        valider = (Button) findViewById(R.id.save);
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
                    Intent imageIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                    File imagesFolder = new File(Environment.getExternalStorageDirectory(), "MyImages");
                    imagesFolder.mkdirs();
                    File image = new File(imagesFolder, "image_001.jpg");
                    Uri uriSavedImage = Uri.fromFile(image);
                    imageIntent.putExtra(MediaStore.EXTRA_OUTPUT, uriSavedImage);

                    startActivityForResult(imageIntent, 1);
                }
            }
        });

        valider.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Photo.this, ExampleActivity.class);
                intent.putExtra(EXTRA_Titre, titre.getText().toString());
                intent.putExtra(EXTRA_Desc,desc.getText().toString());
                startActivityForResult(intent, 0);
            }
        });
    }

    /*public void startCameraActivity() {

        Toast.makeText(Photo.this, "Activation de l'appareil photo", Toast.LENGTH_SHORT).show();
        Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);

        startActivityForResult(intent, 1);
    }*/

    @Override
    public  void onActivityResult(int requestCode, int resultCode, Intent data) {

        if (resultCode == RESULT_OK){
            if (requestCode == 1) {
                Bitmap photo = (Bitmap) data.getExtras().get("data");
                img.setImageBitmap(photo);
            }
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