package com.example.julien.likrone;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;

public class CompteActivity extends MenuActivity{

    public CompteActivity(){
        super(4);
    }


    final String EXTRA_INFO = "info user";

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.compte);


        Intent intent = getIntent();
        TextView idUser = (TextView) findViewById(R.id.pseudo);

        if (intent != null) {
            idUser.setText(intent.getStringExtra(EXTRA_INFO));
        }
    }
}
