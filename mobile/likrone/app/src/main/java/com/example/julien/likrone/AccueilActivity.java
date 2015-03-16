package com.example.julien.likrone;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.GridView;

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
    final String EXTRA_ID_IMAGE = "id";
    String idPhoto = null;
    String idAuteurPhoto = null;
    String titrePhoto = null;
    String chemin = null;
    ArrayList chemins = new ArrayList();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.accueil);
        gridView = (GridView) findViewById(R.id.gridView);
        customGridAdapter = new GridViewAdapter(this, R.layout.grid_row, getData());
        gridView.setAdapter(customGridAdapter);

        gridView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v, int position, long id) {
                Intent intent = new Intent(AccueilActivity.this, ImageAdapter.class);
                ImageItem imageSelec = customGridAdapter.getItem(position);
                intent.putExtra("chemin", chemins.get(position).toString());
                intent.putExtra(EXTRA_ID_IMAGE, imageSelec.getId());
                startActivity(intent);
            }
        });
    }

    private ArrayList getData() {
        final ArrayList imageItems = new ArrayList();
        Bitmap b = null;
        int x=1;
        int i=0;
       // while(i<4){
            for(int j=0;j<10;j++) {
                try {
                    x = new getJson().execute(String.valueOf(j + 1)).get();
                } catch (InterruptedException e) {
                    e.printStackTrace();
                } catch (ExecutionException e) {
                    e.printStackTrace();
                }
                if (x == 0) {
                    try {
                        b = new getImage().execute(chemin).get();
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    } catch (ExecutionException e) {
                        e.printStackTrace();
                    }
                    chemins.add(chemin);
                    imageItems.add(new ImageItem(b, idPhoto, titrePhoto, idAuteurPhoto));
                    i++;
                }
            }
        //}
       return imageItems;
    }


    private class getJson extends AsyncTask<String, Void, Integer> {
        @Override
        protected Integer doInBackground(String... params) {
            try {

                URL url = new URL("https://api-rest-youcef-m.c9.io/post/show/" + params[0]);
                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                connection.connect();
                InputStream inputStream = connection.getInputStream();

                String result = InputStreamOperations.InputStreamToString(inputStream);

                JSONObject obj = new JSONObject(result);
                String result2 = obj.getString("post");
                JSONObject obj2 = new JSONObject(result2);
                idPhoto = obj2.getString("id");
                idAuteurPhoto = obj2.getString("user_id");
                titrePhoto = (obj2.getString("titre")).replaceAll("\\+", " ");
                chemin=obj2.getString("chemin");

            } catch (JSONException e) {
                e.printStackTrace();
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                return 1;
            }
            return 0;
        }
    }


    public static class getImage extends AsyncTask<String, Void, Bitmap> {
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