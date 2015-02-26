package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.TextView;


public class ExampleActivity extends Activity {

    public void onActivityResult (int requestCode, int resultCode, Intent data) {

        if (requestCode == 0) {
            if (resultCode == 0)
                finish();
        }
    }

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

            case R.id.publier: {
                Intent intent2 = new Intent(ExampleActivity.this, Photo.class);
                startActivity(intent2);
                return true;
            }

            case R.id.deconnexion: {
                //Intent intent = new Intent(ExampleActivity.this, LoginActivity.class);
                setResult(0);
                finish();
            }
        }
        return super.onOptionsItemSelected(item);
    }

}
