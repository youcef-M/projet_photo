package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.content.res.TypedArray;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.GridView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;

public class AccueilActivity extends Activity {

    /*public AccueilActivity(){
        super(4);
    }*/

    private GridView gridView;
    private GridViewAdapter customGridAdapter;
    final String  EXTRA_INFO ="info_user";
    final String EXTRA_User = "info login";
    Button accesCompte = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.accueil);

        gridView = (GridView) findViewById(R.id.gridView);
        customGridAdapter = new GridViewAdapter(this, R.layout.grid_row, getData());
        gridView.setAdapter(customGridAdapter);

        gridView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v, int position, long id) {
                Toast.makeText(AccueilActivity.this, position + "#Selected",Toast.LENGTH_SHORT).show();
            }
        });

        Intent intent = getIntent();
        final TextView idUser = (TextView) findViewById(R.id.idUser);
        idUser.setText(intent.getStringExtra(EXTRA_INFO));

        //On met les données obtenu lors de la connexion dans un nouvel EXTRA et on créé un nouvel intent et un nouveau bouton

        /*accesCompte = (Button)findViewById(R.id.compte);
        accesCompte.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent1 = new Intent(AccueilActivity.this, CompteActivity.class);
                intent1.putExtra(EXTRA_User, idUser.getText().toString());
                //startActivity(intent1);
            }
        });*/


    }

    private ArrayList getData() {
        final ArrayList imageItems = new ArrayList();
        // retrieve String drawable array
        TypedArray imgs = getResources().obtainTypedArray(R.array.image_ids);
        for (int i = 0; i < imgs.length(); i++) {
            Bitmap bitmap = BitmapFactory.decodeResource(this.getResources(),
                    imgs.getResourceId(i, -1));
            imageItems.add(new ImageItem(bitmap, "Image#" + i));
        }

        return imageItems;

    }

    //Création du menu dans cette activité

    int numAct = 0;
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);

        if(getActiviteFille()==2) {
            MenuItem item = menu.findItem(R.id.publier);
            item.setVisible(false);
        }
        return true;
    }

    public int getActiviteFille(){
        return numAct;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {

            case R.id.refresh: {
                //getWindow().getDecorView().findViewById(android.R.id.content).invalidate();
                return true;
            }

            case R.id.compte: {
                //Intent intent = new Intent(this, CompteActivity.class);
                Intent intent = getIntent();
                final TextView idUser = (TextView) findViewById(R.id.idUser);
                idUser.setText(intent.getStringExtra(EXTRA_INFO));
                Intent intent1 = new Intent(AccueilActivity.this, CompteActivity.class);
                intent1.putExtra(EXTRA_User, idUser.getText().toString());
                startActivityForResult(intent1,4);
                return true;
            }

            case R.id.publier: {
                Intent intent = new Intent(this, Photo.class);
                startActivityForResult(intent,1);
                return true;
            }

            case R.id.deconnexion: {
                setResult(1);
                finish();
            }
        }
        return super.onOptionsItemSelected(item);
    }

    public void onActivityResult (int requestCode, int resultCode, Intent data) {
        if (requestCode == 1) {
            if (resultCode == 1)
                finish();
        }
    }
}