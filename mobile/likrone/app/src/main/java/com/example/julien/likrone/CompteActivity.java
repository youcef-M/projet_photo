package com.example.julien.likrone;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Canvas;
import android.graphics.drawable.BitmapDrawable;
import android.graphics.drawable.Drawable;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.widget.ImageView;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.util.Objects;

public class CompteActivity extends MenuActivity{

    public CompteActivity(){
        super(4);
    }


    final String EXTRA_User = "info login";
    String json =null;
    final String EXTRA_IdUser = "Id User";
    ImageView avatar =null;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.compte);

        Intent intent = getIntent();
        TextView idUser = (TextView) findViewById(R.id.viewId);
        TextView nomUser = (TextView) findViewById(R.id.viewName);
        TextView mailUser = (TextView) findViewById(R.id.viewMail);
        ImageView avatar = (ImageView) findViewById(R.id.avatar);

        // On transforme le String obtenu en Json pour pouvoir le parse

        json = intent.getStringExtra(EXTRA_User).toString();
        try {
            JSONObject obj = new JSONObject(json);
            idUser.setText(obj.getString("id"));
            nomUser.setText(obj.getString("username"));
            mailUser.setText(obj.getString("email"));

            String adressAvatar = "http://api-rest-youcef-m.c9.io/avatar/" + idUser.getText().toString() + ".jpg";
            Drawable Dr = ImageOperations(adressAvatar);
            Bitmap bitmap = ((BitmapDrawable)Dr).getBitmap();
           //Bitmap bitmap = convertToBitmap(Dr,300,300);
            avatar.setImageBitmap(bitmap);
            //avatar.setImageDrawable(Dr);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    protected Drawable ImageOperations(String url) {
        Drawable drawable = null;
        try {
            URL urle = new URL(url);
            //HttpURLConnection connection = (HttpURLConnection) urle.openConnection();
            //InputStream inputStream = connection.getInputStream();
            Object content = urle.getContent();
            InputStream inputstream = (InputStream)content;
            //Bitmap bitmap = BitmapFactory.decodeStream(inputStream);
            drawable = Drawable.createFromStream(inputstream, "src");
        } catch (Exception e) {
            e.printStackTrace();
        }
        return drawable;
    }

    public Bitmap convertToBitmap(Drawable drawable, int widthPixels, int heightPixels) {
        Bitmap mutableBitmap = Bitmap.createBitmap(widthPixels, heightPixels, Bitmap.Config.ARGB_8888);
        Canvas canvas = new Canvas(mutableBitmap);
        drawable.setBounds(0, 0, widthPixels, heightPixels);
        drawable.draw(canvas);

        return mutableBitmap;
    }
}
