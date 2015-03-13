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
import android.widget.GridView;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.EditText;
import android.widget.Toast;

import java.util.ArrayList;


public class DetailPhotoActivity extends Activity {

    confirmCom = (Button) findViewById(R.id.confirmCom);

    auteur = (TextView) findViewById(R.id.auteur);
    date = (TextView) findViewById(R.id.date);
    note = (TextView) findViewById(R.id.note);
    commentaire = (TextView) findViewById(R.id.commentaire);

    avatar = (ImageView) findViewById(R.id.avatar);

    nouveauCom = (EditText) findViewById(R.id.nouveauCom);

    confirmCom.setOnClickListener(apresEnvoi);

    /*private View.OnClickListener apresEnvoi = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            Intent i = new Intent(getApplicationContext(), LoginActivity.class);
            startActivity(i);
            finish();
        }
    };*/


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.detail_photo);
    }

}
