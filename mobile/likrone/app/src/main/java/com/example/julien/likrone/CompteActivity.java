package com.example.julien.likrone;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class CompteActivity extends MenuActivity{

    public CompteActivity(){
        super(4);
    }


    final String EXTRA_User = "info login";
    String json =null;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.compte);

        Intent intent = getIntent();
        TextView idUser = (TextView) findViewById(R.id.viewId);
        TextView nomUser = (TextView) findViewById(R.id.viewName);
        TextView mailUser = (TextView) findViewById(R.id.viewMail);

        //On met les infos du contenu dans EXTRA_User pour les afficher dans un TextView

        //infoUser.setText(intent.getStringExtra(EXTRA_User));
        //json = infoUser.getText().toString();

        json = intent.getStringExtra(EXTRA_User).toString();

        // On transforme le String obtenu en Json pour pouvoir le parse
        try {
            JSONObject obj = new JSONObject(json);
            //JSONArray arr = obj.getJSONArray("users");
            //JSONObject json = arr.getJSONObject(0);
            //id =json.getInt("id");
            idUser.setText(obj.getString("id"));
            nomUser.setText(obj.getString("username"));
            mailUser.setText(obj.getString("email"));

        } catch (JSONException e) {
            e.printStackTrace();
        }




    }
}
