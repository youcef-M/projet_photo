package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;


public class MainActivity extends Activity {
    Button confirm = null;
    Button raz = null;
    EditText pseudo = null;
    EditText email = null;
    EditText mp = null;
    EditText mp2 = null;

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

   /* @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {

            case R.id.refresh: {
                updateHomeList();
                break;
            }

            case R.id.compte: {
                showUser();
                break;
            }

            case R.id.publier: {
                newPhoto();
                break;
            }

            case R.id.deconnexion: {
                onLogoutButtonClicked();
                break;
            }
        }
        return super.onOptionsItemSelected(item);
    }*/

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
            Intent intent = new Intent(MainActivity.this, LoginActivity.class);
            startActivity(intent);
        }
    };
}
