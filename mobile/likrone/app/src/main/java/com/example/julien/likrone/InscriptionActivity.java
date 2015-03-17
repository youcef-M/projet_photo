package com.example.julien.likrone;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;


public class InscriptionActivity extends Activity {
    Button confirm = null;
    Button raz = null;
    EditText pseudo = null;
    EditText email = null;
    EditText mp = null;
    EditText mp2 = null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.inscription);

        confirm = (Button) findViewById(R.id.confirm);
        raz = (Button) findViewById(R.id.raz);
        pseudo = (EditText) findViewById(R.id.pseudo);
        email = (EditText) findViewById(R.id.email);
        mp = (EditText) findViewById(R.id.mp);
        mp2 = (EditText) findViewById(R.id.mp2);

        raz.setOnClickListener(razListener);
        confirm.setOnClickListener(apresConfirmation);
    }


    private View.OnClickListener razListener = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            pseudo.getText().clear();
            email.getText().clear();
            mp.getText().clear();
            mp2.getText().clear();
        }
    };

    private View.OnClickListener apresConfirmation = new View.OnClickListener() {
        @Override
        public void onClick(View v) {

          //  |     /user/new     |  POST  | *username,email,password* |                 Nouvel utilisateur


            String username = pseudo.getText().toString();
            String mail = email.getText().toString();
            //String password=null;
            //if(mp.getText().toString().equals(mp2.getText().toString())) {
             String password = mp.getText().toString();
            //}
            HttpClient client = new DefaultHttpClient();
            HttpPost post = new HttpPost("http://api-rest-youcef-m.c9.io/user/new");

            try{
                List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(3);
                nameValuePairs.add(new BasicNameValuePair("username", username));
                nameValuePairs.add(new BasicNameValuePair("email", mail));
                nameValuePairs.add(new BasicNameValuePair("password", password));
                post.setEntity(new UrlEncodedFormEntity(nameValuePairs));


                HttpResponse response = client.execute(post);

            }catch(ClientProtocolException e){
                e.printStackTrace();
            }catch(IOException e){
                e.printStackTrace();
            }
            finish();
        }
    };
}
