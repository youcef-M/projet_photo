package com.example.julien.likrone;


import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.concurrent.ExecutionException;

public class ImageAdapter extends Activity {
    final String EXTRA_INFO_IMAGE = "info_image";
    String chemin = null;
    String user_id = null;

    //Variables pour commentaire
    final String EXTRA_ID_USER="id_user";
    ArrayList auteursCId = new ArrayList();
    ArrayList auteursC = new ArrayList();
    ArrayList commentaires = new ArrayList();
    ListView lview;
    ListViewAdapter lviewAdapter;
    EditText newCom = null;
    Button postCom = null;
    String post_id = null;
    String json = null;

    //Variables pour info image
    TextView titreP,auteurP,dateP=null;
    ImageView img = null;
    String json2 = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.detail_photo);

        img = (ImageView) findViewById(R.id.img);
        titreP = (TextView) findViewById(R.id.titreP);
        auteurP = (TextView)findViewById(R.id.auteurP);
        dateP = (TextView)findViewById(R.id.dateP);

        newCom = (EditText)findViewById(R.id.newCom);
        postCom = (Button)findViewById(R.id.postCom);
        postCom.setOnClickListener(postComm);


        Intent intent = getIntent();
        json = intent.getStringExtra(EXTRA_ID_USER).toString();
        json2 = intent.getStringExtra(EXTRA_INFO_IMAGE).toString();
        try {
            JSONObject obj = new JSONObject(json);
            user_id=obj.getString("id");

            JSONObject obj2 = new JSONObject(json2);
            post_id =obj2.getString("id");
            auteurP.setText(new AccueilActivity.getAuteur().execute(obj2.getString("user_id")).get());
            titreP.setText((obj2.getString("titre")).replaceAll("\\+", " "));
            dateP.setText(obj2.getString("created_at"));
            chemin = obj2.getString("chemin");
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        }

        //chemin = intent.getStringExtra("chemin");



        try {
            img.setImageBitmap(new AccueilActivity.getImage().execute(chemin).get());
            new getComm().execute(post_id).get();
            for(int i=0;i<auteursCId.size();i++)
                auteursC.add(new AccueilActivity.getAuteur().execute(auteursCId.get(i).toString()).get());
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }
        lview = (ListView) findViewById(R.id.listView);
        lviewAdapter = new ListViewAdapter(this, auteursC, commentaires);
        lview.setAdapter(lviewAdapter);
    }

    private class getComm extends AsyncTask<String, Void, Void> {
        @Override
        protected Void doInBackground(String... params) {
            try {

                URL url = new URL("https://api-rest-youcef-m.c9.io/comments/bypost/"+params[0]+"?page=1");
                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                connection.connect();
                InputStream inputStream = connection.getInputStream();

                String result = InputStreamOperations.InputStreamToString(inputStream);

                JSONObject obj = new JSONObject(result);
                String result1 = obj.getString("comments");
                JSONArray arr = new JSONArray(result1);
                for(int i=0;i<arr.length();i++) {
                    String result2 = arr.getString(i);
                    JSONObject obj3 = new JSONObject(result2);
                    auteursCId.add(obj3.getString("user_id"));
                    commentaires.add(obj3.getString("content"));
                }
            } catch (JSONException e) {
                e.printStackTrace();
            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                return null;
            }
            return null;
        }
    }

    private View.OnClickListener postComm = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            try {
                new postCommentaire().execute().get();
                newCom.getText().clear();
            } catch (InterruptedException e) {
                e.printStackTrace();
            } catch (ExecutionException e) {
                e.printStackTrace();
            }
        }
    };

    public class postCommentaire extends AsyncTask<Void,Void,Void> {


        //     /comment/new     |  POST  |  **content**,**user_id**,**post_id**  |           Nouveau commentaire           |
        @Override
        protected Void doInBackground(Void... params) {
            String content = newCom.getText().toString();

            ArrayList nameValuePairs = new ArrayList();
            nameValuePairs.add(new BasicNameValuePair("content", content));
            nameValuePairs.add(new BasicNameValuePair("user_id", user_id));
            nameValuePairs.add(new BasicNameValuePair("post_id", post_id));

            try {
                HttpClient client = new DefaultHttpClient();
                HttpPost post = new HttpPost("http://api-rest-youcef-m.c9.io/comment/new");
                post.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                HttpResponse response = client.execute(post);
                HttpEntity entity = response.getEntity();
                InputStream is = entity.getContent();
                BufferedReader reader = new BufferedReader(new InputStreamReader(is, "iso-8859-1"), 8);
                StringBuilder sb = new StringBuilder();
                String line = reader.readLine();
                sb.append(line + "\n");
                is.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
            return null;
        }
    }
}