package com.example.julien.likrone;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;


public class ExampleActivity extends MenuActivity {

    final String EXTRA_LOGIN = "user_login";

    public ExampleActivity(){
        super(1);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.example);

        Intent intent = getIntent();
        TextView loginDisplay = (TextView) findViewById(R.id.login_display);

        if (intent != null) {
            loginDisplay.setText(intent.getStringExtra(EXTRA_LOGIN));
        }
    }
}
