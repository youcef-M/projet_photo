package com.example.julien.likrone;

import android.os.Bundle;
import android.widget.TextView;


public class ExampleActivity extends MenuActivity {

    TextView id = null;
    TextView name = null;


    final String EXTRA_Titre = "Titre_Photo";
    final String EXTRA_Desc = "Desc_Photo";

    public ExampleActivity() {
        super(5);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.compte);
    }

}
