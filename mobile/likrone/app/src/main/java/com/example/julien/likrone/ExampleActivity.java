package com.example.julien.likrone;

import android.os.Bundle;
import android.widget.TextView;

import java.util.concurrent.ExecutionException;


public class ExampleActivity extends MenuActivity {

    TextView id = null;
    TextView name = null;


    final String EXTRA_Titre = "Titre_Photo";
    final String EXTRA_Desc = "Desc_Photo";

    public ExampleActivity() {
        super(1);
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.compte);
        try {
            String x =new ConnexionServeur().execute().get();
            id= (TextView) findViewById(R.id.idUser);
            id.setText(x);
        } catch (InterruptedException e) {
            e.printStackTrace();
        } catch (ExecutionException e) {
            e.printStackTrace();
        }

        /*Intent intent = getIntent();
        TextView titreDisplay = (TextView) findViewById(R.id.titre_display);
        TextView descDisplay = (TextView) findViewById(R.id.desc_display);

        if (intent != null) {
            titreDisplay.setText(intent.getStringExtra(EXTRA_Titre));
            descDisplay.setText(intent.getStringExtra(EXTRA_Desc));
        }*/

    }

}
