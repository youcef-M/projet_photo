package com.example.julien.likrone;

import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.GridView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

public class AccueilActivity extends MenuActivity {

    public AccueilActivity() {
        super(1);
    }

    private GridView gridView = null;
    private GridViewAdapter customGridAdapter = null;
    final String EXTRA_INFO_IMAGE = "info_image";
    final String EXTRA_ID_USER = "id_user";
    final String EXTRA_INFO = "info_user";
    String idUser;
    ArrayList idPhoto = new ArrayList();
    ArrayList auteur = new ArrayList();
    ArrayList titrePhoto = new ArrayList();
    ArrayList chemins = new ArrayList();
    ArrayList imageItems = new ArrayList();
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
            idUser = intent2.getStringExtra(EXTRA_INFO).toString();


        latest.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (chemins.size() != 0) {
                    auteur.clear();
                    idPhoto.clear();
                    titrePhoto.clear();
                    chemins.clear();
                }
                customGridAdapter = new GridViewAdapter(AccueilActivity.this, R.layout.grid_row, getData(1));
                gridView.setAdapter(customGridAdapter);
            }
        });

        vote.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (chemins.size() != 0) {
                    auteur.clear();
                    idPhoto.clear();
                    titrePhoto.clear();
                    chemins.clear();
                }
                customGridAdapter = new GridViewAdapter(AccueilActivity.this, R.layout.grid_row, getData(2));
                gridView.setAdapter(customGridAdapter);
            }
        });

        gridView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v, int position, long id) {
                Intent intent = new Intent(AccueilActivity.this, ImageAdapter.class);
                try {
                    intent.putExtra(EXTRA_INFO_IMAGE, arr.getString(position));
                } catch (JSONException e) {
                    e.printStackTrace();
                }
                intent.putExtra(EXTRA_ID_USER, idUser);
                startActivity(intent);
            }
        });
    }

    private ArrayList getData(int mode) {
        imageItems = new ArrayList();
        Bitmap b = null;
        try {
            String infoImage = new Image.getJson().execute(mode).get();
            arr = new JSONArray(infoImage);
            for (int i = 0; i < 6; i++) {
                String result3 = arr.getString(i);
                JSONObject obj2 = new JSONObject(result3);
                idPhoto.add(obj2.getString("id"));
                auteur.add(java.net.URLDecoder.decode(new Image.getAuteur().execute(obj2.getString("user_id")).get(),"UTF-8"));
                titrePhoto.add(java.net.URLDecoder.decode(obj2.getString("titre"),"UTF-8"));
                String[] tab = obj2.getString("chemin").split("\\.");
                chemins.add(tab[0]+"_200x200."+tab[1]);
            }
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        } catch (IOException e){
            e.printStackTrace();
        }

        for (int i = 0; i < chemins.size(); i++) {
            try {
                b = new Image.getImage().execute(chemins.get(i).toString()).get();
            } catch (InterruptedException e) {
                e.printStackTrace();
            } catch (ExecutionException e) {
                e.printStackTrace();
            }
            imageItems.add(new ImageItem(b, idPhoto.get(i).toString(), titrePhoto.get(i).toString(), auteur.get(i).toString()));
        }
        return imageItems;
    }
}