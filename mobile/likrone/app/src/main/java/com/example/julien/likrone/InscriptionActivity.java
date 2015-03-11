package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;


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
            Intent i = new Intent(getApplicationContext(), LoginActivity.class);
            startActivity(i);
            finish();
        }
    };
}
