package com.example.julien.likrone;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.io.IOException;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class ExampleActivity extends MenuActivity {

    TextView id = null;
    TextView name = null;


    final String EXTRA_Titre = "Titre_Photo";
    final String EXTRA_Desc = "Desc_Photo";

    public ExampleActivity() {
        super(1);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.compte);
         try {
                id = (TextView) findViewById(R.id.idUser);

                URL url = new URL("https://api-rest-youcef-m.c9.io/users");
                HttpURLConnection connection = (HttpURLConnection)url.openConnection();
                connection.setRequestMethod("GET");
                connection.connect();

                id.setText("Gros porc");
                int code = connection.getResponseCode();
                name = (TextView) findViewById(R.id.nom);
                name.setText(connection.getResponseMessage());


            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }




        /*Intent intent = getIntent();
        TextView titreDisplay = (TextView) findViewById(R.id.titre_display);
        TextView descDisplay = (TextView) findViewById(R.id.desc_display);

        if (intent != null) {
            titreDisplay.setText(intent.getStringExtra(EXTRA_Titre));
            descDisplay.setText(intent.getStringExtra(EXTRA_Desc));
        }*/

    }

}
