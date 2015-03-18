package com.example.julien.likrone;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.GridView;

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

public class AccueilActivity extends MenuActivity {

    public AccueilActivity(){
        super(1);
    }

    private GridView gridView=null;
    private GridViewAdapter customGridAdapter=null;
    final String EXTRA_INFO_IMAGE = "info_image";
    final String EXTRA_ID_USER ="id_user";
    final String EXTRA_INFO ="info_user";
    ArrayList idPhoto = new ArrayList();
    ArrayList auteur = new ArrayList();
    ArrayList titrePhoto = new ArrayList();
    ArrayList chemins = new ArrayList();
    Button latest = null;
    Button vote = null;
    JSONArray arr = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.accueil);

        latest = (Button) findViewById(R.id.rec);
        vote = (Button) findViewById(R.id.meilleures);
        gridView = (GridView) findViewById(R.id.gridView);
        Intent intent2 = getIntent();
        final String idUser = intent2.getStringExtra(EXTRA_INFO).toString();

        latest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               // if(!customGridAdapter.()){
                    //customGridAdapter.clear();
               // }
                customGridAdapter = new GridViewAdapter(AccueilActivity.this, R.layout.grid_row, getData(1));
                 gridView.setAdapter(customGridAdapter);
           }
        });

        vote.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //if(!customGridAdapter.isEmpty()){
                    //customGridAdapter.clear();
                //}
                customGridAdapter = new GridViewAdapter(AccueilActivity.this, R.layout.grid_row, getData(2));
                gridView.setAdapter(customGridAdapter);
            }
        });


        gridView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v, int position, long id) {
                Intent intent = new Intent(AccueilActivity.this, ImageAdapter.class);
                //ImageItem imageSelec = customGridAdapter.getItem(position);
               //intent.putExtra("chemin", chemins.get(position).toString());
                try {
                    intent.putExtra(EXTRA_INFO_IMAGE, arr.getString(position));
                } catch (JSONException e) {
                    e.printStackTrace();
                }
                intent.putExtra(EXTRA_ID_USER,idUser);
                startActivity(intent);
            }
        });
    }

    private ArrayList getData(int mode) {
        final ArrayList imageItems = new ArrayList();
        Bitmap b = null;
        try {
            String infoImage = new getJson().execute(mode).get();
            arr  = new JSONArray(infoImage);
            for(int i=0;i<5;i++) {
                String result3 = arr.getString(i);
                JSONObject obj2 = new JSONObject(result3);
                idPhoto.add(obj2.getString("id"));
                auteur.add(new getAuteur().execute(obj2.getString("user_id")).get());
                titrePhoto.add((obj2.getString("titre")).replaceAll("\\+", " "));
                chemins.add(obj2.getString("chemin"));
            }
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        }

        for (int i = 0; i < chemins.size(); i++) {
            try {
                b = new getImage().execute(chemins.get(i).toString()).get();
            } catch (InterruptedException e) {
                e.printStackTrace();
            } catch (ExecutionException e) {
                e.printStackTrace();
            }
            imageItems.add(new ImageItem(b, idPhoto.get(i).toString(), titrePhoto.get(i).toString(), auteur.get(i).toString()));
        }
        return imageItems;
     }


    private class getJson extends AsyncTask<Integer, Void, String> {
        @Override
        protected String doInBackground(Integer... params) {
            String infoImage=null;
            try {
                URL url;
                String selec;
                if(params[0]==1) {
                    //On affiche les dernières images ajoutées
                    url = new URL("http://api-rest-youcef-m.c9.io/post/feed/latest?page=1");
                    selec = "latest_feed";
                }
                else {
                    //On affiche les images les mieux notées
                    url = new URL("http://api-rest-youcef-m.c9.io/post/feed/vote?page=1");
                    selec = "vote_feed";
                }
                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                connection.connect();
                InputStream inputStream = connection.getInputStream();
                String result = InputStreamOperations.InputStreamToString(inputStream);
                JSONObject obj = new JSONObject(result);
                infoImage = obj.getString(selec);
            } catch (JSONException e) {
                e.printStackTrace();
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                return "Pas d'image";
            }
            return infoImage;
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

    public static class getAuteur extends AsyncTask<String, Void, String> {
        String auteur = null;
        @Override
        protected String doInBackground(String... params) {
            try {
                URL urlImage = new URL("http://api-rest-youcef-m.c9.io/user/show/" + params[0]);
                HttpURLConnection connection = (HttpURLConnection) urlImage.openConnection();
                connection.setRequestMethod("GET");
                InputStream inputStream = connection.getInputStream();
                String result = InputStreamOperations.InputStreamToString(inputStream);
                JSONObject obj = new JSONObject(result);
                auteur = obj.getString("username");
            } catch (JSONException e){
                e.printStackTrace();
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
            return auteur;
        }
    }
}