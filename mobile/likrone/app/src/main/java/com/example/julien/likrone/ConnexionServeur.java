package com.example.julien.likrone;

import android.os.AsyncTask;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

class ConnexionServeur extends AsyncTask<Void, Void, String> {

    String EXTRA_ID = "id";
    String nom =null;
    URL url = null;
    int id;

    @Override
    protected String doInBackground(Void... params){

        try {

            url = new URL("http://api-rest-youcef-m.c9.io/users?page=1");

            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setInstanceFollowRedirects(true);
            connection.setRequestMethod("GET");
            InputStream inputStream = connection.getInputStream();
            String result = InputStreamOperations.InputStreamToString(inputStream);

            // On récupère le JSON complet
            JSONObject obj = new JSONObject(result);
            JSONArray arr = obj.getJSONArray("users");
            JSONObject json = arr.getJSONObject(0);
            id =json.getInt("id");
            nom = json.getString("username");

            EXTRA_ID = result;


            //code = Integer.toString(connection.getResponseCode());
            //EXTRA_ID = connection.getResponseMessage();

        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        }
        return nom;
    }

}