package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import java.util.concurrent.ExecutionException;

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

    public void loginPost(View view) throws ExecutionException, InterruptedException {
        String username = pseudo.getText().toString();
        String password = mp.getText().toString();
        mp.getText().clear();
        if(new Login(this,role).execute(username,password).get()!="Mauvais identifiants") {
            Intent intent = new Intent(LoginActivity.this, AccueilActivity.class);
            intent.putExtra(EXTRA_INFO,role.getText().toString());
            startActivity(intent);
        }
        else
            role.setVisibility(view.VISIBLE);
    }
}