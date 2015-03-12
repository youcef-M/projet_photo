package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

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
        Login valide = (Login) new Login(this,role).execute(username,password);
        //mp.getText().clear();
        role.setText(valide.get());
        if(!("Mauvais identifiants".equals(role.getText()))) {
            Intent intent = new Intent(LoginActivity.this, AccueilActivity.class);
            intent.putExtra(EXTRA_INFO,role.getText().toString());
            role.setText(intent.getStringExtra(EXTRA_INFO));
            startActivity(intent);
        }else
            role.setVisibility(view.VISIBLE);

        }

}
