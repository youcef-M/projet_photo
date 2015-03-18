package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.URL;
import java.net.URLConnection;
import java.net.URLEncoder;
import java.util.concurrent.ExecutionException;
import java.util.concurrent.TimeoutException;

public class LoginActivity extends Activity{
    private EditText pseudo,mp;
    private TextView role;
    Button creation = null;

    final String  EXTRA_INFO ="info_user";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        pseudo = (EditText)findViewById(R.id.pseudo);
        mp = (EditText)findViewById(R.id.mp);
        role = (TextView)findViewById(R.id.textView7);
        creation = (Button)findViewById(R.id.creation);

        creation.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(LoginActivity.this, InscriptionActivity.class);
                startActivity(intent);
            }
        });
    }

    public void loginPost(View view) throws ExecutionException, InterruptedException, TimeoutException {
        String username = pseudo.getText().toString();
        String password = mp.getText().toString();
        role.setVisibility(view.INVISIBLE);
        login valide =(login) new login().execute(username,password);
        mp.getText().clear();
        role.setText(valide.get());
        if(!("Mauvais identifiants".equals(role.getText()))) {
            Intent intent = new Intent(LoginActivity.this, AccueilActivity.class);
            intent.putExtra(EXTRA_INFO,role.getText().toString());
            role.setText(intent.getStringExtra(EXTRA_INFO));
            startActivity(intent);
        }else
            role.setVisibility(view.VISIBLE);

        }

    public class login extends AsyncTask<String,Void,String>{

        @Override
        protected String doInBackground(String... arg0) {
            try {
                String username = (String) arg0[0];
                String password = (String) arg0[1];
                String link = "http://api-rest-youcef-m.c9.io/user/login";
                String data = URLEncoder.encode("username", "UTF-8") + "=" + URLEncoder.encode(username, "UTF-8");
                data += "&" + URLEncoder.encode("password", "UTF-8") + "=" + URLEncoder.encode(password, "UTF-8");
                URL url = new URL(link);
                URLConnection conn = url.openConnection();
                conn.setDoOutput(true);
                OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
                wr.write(data);
                wr.flush();
                BufferedReader reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
                StringBuilder sb = new StringBuilder();
                String line = null;
                // Read Server Response
                while ((line = reader.readLine()) != null) {
                    sb.append(line);
                    break;
                }
                return sb.toString();
            } catch (Exception e) {
                return "Mauvais identifiants";
            }
        }

        @Override
        protected void onPostExecute(String result){
            role.setText(result);
        }
    }
}