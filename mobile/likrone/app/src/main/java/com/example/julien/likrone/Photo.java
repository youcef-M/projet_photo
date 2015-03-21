package com.example.julien.likrone;

import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.RadioGroup;
import android.widget.Toast;

import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.mime.MultipartEntity;
import org.apache.http.entity.mime.content.FileBody;
import org.apache.http.entity.mime.content.StringBody;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.File;
import java.io.IOException;
import java.util.concurrent.ExecutionException;


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
    Intent intent2=null;
    String json = null;
    String user_id=null;

    public Photo(){
        super(2);
    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.new_photo);

        intent2 = getIntent();
        valider = (Button) findViewById(R.id.save);
        raz = (Button) findViewById(R.id.cancel);
        raz.setOnClickListener(razListener);
        titre = (EditText) findViewById(R.id.titre);
        desc = (EditText) findViewById(R.id.description);
        priv = (RadioGroup) findViewById(R.id.priv);
        camera = (ImageButton) findViewById(R.id.camera);
        img = (ImageView) findViewById(R.id.photo);
        json = intent2.getStringExtra(EXTRA_User).toString();

        try {
            JSONObject obj = new JSONObject(json);
            user_id = obj.getString("id");
        } catch (JSONException e) {
            e.printStackTrace();
        }

        camera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (v.getId() == R.id.camera) {
                    Intent imageIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                    File imagesFolder = new File(Environment.getExternalStorageDirectory(), "MyImages");
                    imagesFolder.mkdirs();
                    image = new File(imagesFolder, "image_001.jpg");
                    Uri uriSavedImage = Uri.fromFile(image);
                    imageIntent.putExtra(MediaStore.EXTRA_OUTPUT, uriSavedImage);
                    startActivity(imageIntent);

                    //String filestring = uriSavedImage.getPath();
                    //Bitmap thumbnail = BitmapFactory.decodeFile(filestring);
                    //img.setImageBitmap(thumbnail);
                }
            }
        });

        valider.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                try {
                    new postPhoto().execute().get();
                } catch (InterruptedException e) {
                    e.printStackTrace();
                } catch (ExecutionException e) {
                    e.printStackTrace();
                }
                Toast.makeText(getApplicationContext(), "La photo a bien été envoyée.", Toast.LENGTH_LONG).show();
                Intent intent = new Intent(Photo.this,AccueilActivity.class);
                startActivity(intent);
                finish();
            }
        });
    }

        public class postPhoto extends AsyncTask<Void, Void, Void> {
            @Override
            protected Void doInBackground(Void... params) {

                //    /post/new     |  POST  | **titre**, *description*, **privacy**, **user_id**, **photo(le fichier)**

                String title = titre.getText().toString();
                String description = desc.getText().toString();
                String privacy = "0";

                HttpClient client = new DefaultHttpClient();
                HttpPost post = new HttpPost("http://api-rest-youcef-m.c9.io/post/new");
                try {
                    MultipartEntity entity = new MultipartEntity();
                    entity.addPart("titre", new StringBody(title));
                    entity.addPart("description", new StringBody(description));
                    entity.addPart("privacy", new StringBody(privacy));
                    entity.addPart("user_id", new StringBody(user_id));
                    entity.addPart("photo", new FileBody(image));
                    post.setEntity(entity);
                    HttpResponse response = client.execute(post);
                } catch (ClientProtocolException e) {
                    e.printStackTrace();
                } catch (IOException e) {
                    e.printStackTrace();
                }
                return null;
            }
        }

 /*   @Override
    public  void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (resultCode == RESULT_OK){
            if (requestCode == 1) {
                Uri selectedImageUri = data.getData();
                filestring = selectedImageUri.getPath();

                Bitmap thumbnail = BitmapFactory.decodeFile(filestring, options2);

                System.out.println("Bitmap(CAMERA_IMAGES_REQUEST):"+thumbnail);
                System.out.println("cap_image(CAMERA_IMAGES_REQUEST):"+cap_image);
                cap_image.setImageBitmap(thumbnail);

                Bitmap photo = (Bitmap) data.getExtras().get(data);
                img.setImageBitmap(photo);
            }
        }
    }*/

    private View.OnClickListener razListener = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            titre.getText().clear();
            desc.getText().clear();
        }
    };
}