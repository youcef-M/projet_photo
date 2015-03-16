package com.example.julien.likrone;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.GridView;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

public class AccueilActivity extends MenuActivity {

    public AccueilActivity(){
        super(1);
    }

    private GridView gridView;
    private GridViewAdapter customGridAdapter;
    String idAuteurPhoto = null;
    String titrePhoto = null;
    String chemin = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.accueil);

        gridView = (GridView) findViewById(R.id.gridView);
        customGridAdapter = new GridViewAdapter(this, R.layout.grid_row, getData());
        gridView.setAdapter(customGridAdapter);

        gridView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v, int position, long id) {
                //Ouvrir une nouvelle activity avec l'image en taille réelle + commentaires, votes ...
                //Intent intent = new Intent(AccueilActivity.this, ImageAdapter.class);
                //startActivity(intent);
                Toast.makeText(AccueilActivity.this, position + "#Selected", Toast.LENGTH_SHORT).show();
            }
        });
    }

    private ArrayList getData() {
        final ArrayList imageItems = new ArrayList();
        Bitmap b = null;
        for (int i = 0; i < 10; i++) {
            try {
                new getJson().execute(String.valueOf(i+1)).get();
                b = new getImage().execute(chemin).get();
            } catch (InterruptedException e) {
                e.printStackTrace();
            } catch (ExecutionException e) {
                e.printStackTrace();
            }
            imageItems.add(new ImageItem(b, titrePhoto, idAuteurPhoto));
       }
       return imageItems;
    }


    private class getJson extends AsyncTask<String, Void, Void> {

        @Override
        protected Void doInBackground(String... params) {
            try {

                URL url = new URL("https://api-rest-youcef-m.c9.io/post/show/"+params[0]);
                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                connection.connect();
                InputStream inputStream = connection.getInputStream();

                String result = InputStreamOperations.InputStreamToString(inputStream);

                JSONObject obj = new JSONObject(result);
                String result2 = obj.getString("post");
                JSONObject obj2 = new JSONObject(result2);

                idAuteurPhoto = obj2.getString("user_id");
                titrePhoto= (obj2.getString("titre")).replaceAll("\\+"," ");
                chemin = obj2.getString("chemin");

            } catch (JSONException e) {
                e.printStackTrace();
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
            return null;
        }
    }

    private class getImage extends AsyncTask<String, Void, Bitmap> {
        Bitmap bitmap = null;

        @Override
        protected Bitmap doInBackground(String... params) {
            try {
                URL urlImage = new URL("http://api-rest-youcef-m.c9.io"+params[0]);
                HttpURLConnection connection = (HttpURLConnection) urlImage.openConnection();
                connection.setRequestMethod("GET");
                InputStream inputStream = connection.getInputStream();
                bitmap = BitmapFactory.decodeStream(inputStream);
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
            return bitmap;
        }
    }
}