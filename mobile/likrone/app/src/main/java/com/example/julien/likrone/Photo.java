package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;


public class Photo extends Activity {

    /*
        Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
        File fichier = new File(Environment.getExternalStorageDirectory(), "/storage/emulated/0/DCIM/Camera/20150211_083145.jpg");
        Uri chemin = Uri.fromFile(fichier);
    */
    ImageView img = null;
    Button raz = null;
    EditText titre = null;
    EditText desc = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.new_photo);

        raz = (Button) findViewById(R.id.cancel);
        // intent.putExtra(MediaStore.EXTRA_OUTPUT, chemin);

        //this.startActivityForResult(intent, 0);
        raz.setOnClickListener(razListener);
        titre = (EditText) findViewById(R.id.titre);
        desc = (EditText) findViewById(R.id.description);

        img = (ImageView) findViewById(R.id.photo);
        ImageView b = (ImageView) findViewById(R.id.photo);

        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(Photo.this, "Activation de l'appareil photo", Toast.LENGTH_SHORT).show();

                Intent intent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                startActivityForResult(intent,0);
            }
        });
    }

    @Override
    public  void onActivityResult(int requestCode, int resultCode, Intent data) {
                Bitmap bit= (Bitmap) data.getExtras().get("data");
                img.setImageBitmap(bit);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }


    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {

          /*  case R.id.refresh: {
                updateHomeList();
                break;
            }

            case R.id.compte: {
                showUser();
                break;
            }*/

            /*case R.id.publier: {
                Intent intent2 = new Intent(ExampleActivity.this, Photo.class);
                startActivity(intent2);
                return true;
            }*/

            case R.id.deconnexion: {
                //Intent intent = new Intent(Photo.this, LoginActivity.class);
                setResult(0);
                finish();
            }
        }
        return super.onOptionsItemSelected(item);
    }

    private View.OnClickListener razListener = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            titre.getText().clear();
            desc.getText().clear();
        }
    };


}