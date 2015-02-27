package com.example.julien.likrone;


import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class LoginActivity extends Activity {
    Button connexion = null;
    Button creation = null;
    EditText pseudo = null;
    EditText mp = null;

    final String EXTRA_LOGIN = "user_login";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        connexion = (Button) findViewById(R.id.connect);
        creation = (Button) findViewById(R.id.creation);
        pseudo = (EditText) findViewById(R.id.pseudo);
        mp = (EditText) findViewById(R.id.mp);


        final EditText login = (EditText) findViewById(R.id.pseudo);

        connexion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(LoginActivity.this, ExampleActivity.class);
                intent.putExtra(EXTRA_LOGIN, login.getText().toString());
                startActivityForResult(intent, 0);
            }
        });

        creation.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(LoginActivity.this, InscriptionActivity.class);
                startActivity(intent);
            }
        });
    }
}