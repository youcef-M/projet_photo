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


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        connexion= (Button) findViewById(R.id.connect);
        creation = (Button) findViewById(R.id.creation);
        pseudo = (EditText) findViewById(R.id.pseudo);
        mp = (EditText) findViewById(R.id.mp);

        creation.setOnClickListener(creationListener);
    }


    private View.OnClickListener creationListener = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            Intent intent = new Intent(LoginActivity.this, MainActivity.class);
            startActivity(intent);
        }
    };
 }
