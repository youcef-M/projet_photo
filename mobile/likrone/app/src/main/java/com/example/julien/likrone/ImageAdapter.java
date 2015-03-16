package com.example.julien.likrone;


import android.app.Activity;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.AsyncTask;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

public class ImageAdapter extends Activity {
    final String EXTRA_ID_IMAGE = "id";
    ArrayList auteurs = new ArrayList();
    ArrayList commentaires = new ArrayList();
    ListView lview;
    ListViewAdapter lviewAdapter;
    ImageView img = null;
    String chemin = null;
    Bitmap image = null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.detail_photo);

        img = (ImageView) findViewById(R.id.img);

        Intent intent = getIntent();
        String idPhoto = intent.getStringExtra(EXTRA_ID_IMAGE).toString();
        chemin = intent.getStringExtra("chemin");
        try {
            img.setImageBitmap(new AccueilActivity.getImage().execute(chemin).get());
            new getComm().execute(idPhoto).get();
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }

        lview = (ListView) findViewById(R.id.listView);
        lviewAdapter = new ListViewAdapter(this, auteurs, commentaires);
        lview.setAdapter(lviewAdapter);
    }

    private class getComm extends AsyncTask<String, Void, Void> {
        @Override
        protected Void doInBackground(String... params) {
            try {

                URL url = new URL("https://api-rest-youcef-m.c9.io/comments/bypost/"+ params[0] +"?page=1");
                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                connection.connect();
                InputStream inputStream = connection.getInputStream();

                String result = InputStreamOperations.InputStreamToString(inputStream);

                JSONObject obj = new JSONObject(result);
                String result1 = obj.getString("comments");
                JSONArray arr = new JSONArray(result1);
                for(int i=0;i<2;i++) {
                    String result2 = arr.getString(i);
                    JSONObject obj3 = new JSONObject(result2);
                    auteurs.add(obj3.getString("user_id"));
                    commentaires.add(obj3.getString("content"));
                }
            } catch (JSONException e) {
                e.printStackTrace();
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                return null;
            }
            return null;
        }
    }
}