package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.TextView;


public class ExampleActivity extends Activity {

    Button boutonDeconnexion = null;
    Button boutonAjout = null;
    final String EXTRA_LOGIN = "user_login";
    private Menu m = null;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.example);

        Intent intent = getIntent();
        TextView loginDisplay = (TextView) findViewById(R.id.login_display);

        if (intent != null) {
            loginDisplay.setText(intent.getStringExtra(EXTRA_LOGIN));
        }

        boutonDeconnexion = (Button) findViewById(R.id.deconnexion);
        boutonAjout = (Button) findViewById(R.id.publier);


    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }


    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {

          /*  case R.id.refresh: {
                updateHomeList();
                break;
            }

            case R.id.compte: {
                showUser();
                break;
            }*/

           /* case R.id.publier: {
                newPhoto();
                break;
            }*/

            case R.id.deconnexion: {
                Intent intent = new Intent(ExampleActivity.this, LoginActivity.class);
                startActivity(intent);
                return true;
            }
        }
        return super.onOptionsItemSelected(item);
    }
}
