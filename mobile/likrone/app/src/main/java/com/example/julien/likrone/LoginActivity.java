package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class LoginActivity extends Activity{
    private EditText pseudo,mp;
    private TextView role;
    Button creation = null;

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

    public void loginPost(View view){
        String username = pseudo.getText().toString();
        String password = mp.getText().toString();
        new Login(this,role).execute(username,password);
        mp.getText().clear();
        if(role.getText()=="Mauvais identifiants") {
            Intent intent = new Intent(LoginActivity.this, AccueilActivity.class);
            role.setVisibility(view.INVISIBLE);
            startActivity(intent);
        }
    }
}