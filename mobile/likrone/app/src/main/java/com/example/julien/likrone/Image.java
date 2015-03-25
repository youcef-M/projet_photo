package com.example.julien.likrone;

import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;


public class Image {

    //Context context = this;
    public static class getJson extends AsyncTask<Integer, Void, String> {
        @Override
        protected String doInBackground(Integer... params) {
            String infoImage=null;
            try {
                URL url;
                String selec, result = null;
                if (params[0] == 1) {
                    //On affiche les dernières images ajoutées
                    url = new URL("http://api-rest-youcef-m.c9.io/post/feed/latest?page=1");
                    selec = "latest_feed";
                } else {
                    //On affiche les images les mieux notées
                    url = new URL("http://api-rest-youcef-m.c9.io/post/feed/vote?page=1");
                    selec = "vote_feed";
                }
                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                connection.connect();
                InputStream inputStream = connection.getInputStream();
                result = InputStreamOperations.InputStreamToString(inputStream);
                JSONObject obj = new JSONObject(result);
                infoImage = obj.getString(selec);
                inputStream.close();
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
                URL urlImage = new URL("http://api-rest-youcef-m.c9.io" + params[0]);
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