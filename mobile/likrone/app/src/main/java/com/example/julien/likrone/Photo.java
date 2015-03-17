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
import android.widget.RadioGroup;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.mime.HttpMultipartMode;
import org.apache.http.entity.mime.MultipartEntityBuilder;
import org.apache.http.entity.mime.content.FileBody;
import org.apache.http.impl.client.DefaultHttpClient;

import java.io.File;
import java.io.IOException;


public class Photo extends MenuActivity {
    final String EXTRA_User = "info login";
    ImageView img = null;
    Button raz = null;
    Button valider = null;
    EditText titre = null;
    EditText desc = null;
    ImageButton camera = null;
    RadioGroup priv = null;
    File image = null;
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
        priv = (RadioGroup)findViewById(R.id.priv);
        camera = (ImageButton) findViewById(R.id.camera);
        img = (ImageView) findViewById(R.id.photo);
        camera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (v.getId() == R.id.camera){
                    Intent imageIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                    File imagesFolder = new File(Environment.getExternalStorageDirectory(), "MyImages");
                    imagesFolder.mkdirs();
                    image = new File(imagesFolder, "image_001.jpg");
                    Uri uriSavedImage = Uri.fromFile(image);
                    imageIntent.putExtra(MediaStore.EXTRA_OUTPUT, uriSavedImage);

                    startActivityForResult(imageIntent, 1);
                }
            }
        });

        valider.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //    /post/new     |  POST  | **titre**, *description*, **privacy**, **user_id**, **photo(le fichier)**

                String title = titre.getText().toString();
                String description = desc.getText().toString();
                String privacy = Integer.toString(priv.getCheckedRadioButtonId());
                String user_id = EXTRA_User;
                FileBody file = new FileBody(image);

                HttpClient client = new DefaultHttpClient();
                HttpPost post = new HttpPost("http://api-rest-youcef-m.c9.io/post/new");
                MultipartEntityBuilder builder = MultipartEntityBuilder.create();
                builder.setMode(HttpMultipartMode.BROWSER_COMPATIBLE);
                builder.addTextBody("titre", title);
                builder.addTextBody("description", description);
                builder.addTextBody("privacy", privacy);
                builder.addTextBody("user_id", user_id);
                builder.addPart("photo",file);

                post.setEntity(builder.build());

                try{
                    HttpResponse response = client.execute(post);
                    HttpEntity entity = response.getEntity();
                    entity.consumeContent();
                } catch (IOException e1) {
                    e1.printStackTrace();
                }
                client.getConnectionManager().shutdown();
            }
        });
    }

    @Override
    public  void onActivityResult(int requestCode, int resultCode, Intent data) {
        //On met la photo dans le bitmap photo
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