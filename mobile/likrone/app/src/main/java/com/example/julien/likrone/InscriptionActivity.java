package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.concurrent.ExecutionException;
import java.util.regex.Matcher;
import java.util.regex.Pattern;


public class InscriptionActivity extends Activity {
    Button confirm,raz = null;
    EditText pseudo,email,mp,mp2 = null;
    String username,mail,password,password2 = null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.inscription);

        confirm = (Button) findViewById(R.id.confirm);
        raz = (Button) findViewById(R.id.raz);
        pseudo = (EditText) findViewById(R.id.pseudo);
        email = (EditText) findViewById(R.id.email);
        mp = (EditText) findViewById(R.id.mp);
        mp2= (EditText) findViewById(R.id.mp2);

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

            username = pseudo.getText().toString();
            mail = email.getText().toString();
            password = mp.getText().toString();
            password2 = mp2.getText().toString();
                if (username.equals("")) {
                    Toast.makeText(InscriptionActivity.this, "Le champs pseudo n'est pas correct.", Toast.LENGTH_SHORT).show();
                    return;
                }

                Pattern p = Pattern.compile(".+@.+\\.[a-z]+");
                Matcher m = p.matcher(mail);
                if (mail.equals("") || !m.matches()) {
                    Toast.makeText(InscriptionActivity.this, "Le champs email n'est pas correct.", Toast.LENGTH_SHORT).show();
                    return;
                }

                if (password.length() < 8) {
                    Toast.makeText(InscriptionActivity.this, "Le mot de passe doit être composé d'au moins 8 caractères.", Toast.LENGTH_SHORT).show();
                    return;
                }

                if (!password.equals(password2)) {
                    Toast.makeText(InscriptionActivity.this, "Les mots de passe sont différents", Toast.LENGTH_SHORT).show();
                    return;
                }

            //  |     /user/new     |  POST  | *username,email,password* |                 Nouvel utilisateur

            try {
                new inscription().execute().get();
            } catch (InterruptedException e) {
                e.printStackTrace();
            } catch (ExecutionException e) {
                e.printStackTrace();
            }
            Toast.makeText(getApplicationContext(), "Vous êtes à présent inscrit !", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(InscriptionActivity.this,LoginActivity.class);
            startActivity(intent);
            finish();
        }
    };

    public class inscription extends AsyncTask<Void,Void,Void>{

        @Override
        protected Void doInBackground(Void... params) {

            ArrayList nameValuePairs = new ArrayList();
            nameValuePairs.add(new BasicNameValuePair("username", username));
            nameValuePairs.add(new BasicNameValuePair("email", mail));
            nameValuePairs.add(new BasicNameValuePair("password", password));

            try {
                HttpClient client = new DefaultHttpClient();
                HttpPost post = new HttpPost("http://api-rest-youcef-m.c9.io/user/new");
                post.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                HttpResponse response = client.execute(post);
                HttpEntity entity = response.getEntity();
                InputStream is = entity.getContent();
                BufferedReader reader = new BufferedReader(new InputStreamReader(is,"iso-8859-1"),8);
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
