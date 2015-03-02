package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.MenuItem;


public class MenuActivity extends Activity {

    int numAct = 0;

    public MenuActivity(int pNumAct){
        numAct = pNumAct;
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);

        if(getActiviteFille()==2) {
            MenuItem item = menu.findItem(R.id.publier);
            item.setVisible(false);
        }
        return true;
    }

    public int getActiviteFille(){
        return numAct;
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
                Intent intent = new Intent(this, Photo.class);
                startActivityForResult(intent,1);
                return true;
            }

            case R.id.deconnexion: {
                setResult(1);
                finish();
            }
        }
        return super.onOptionsItemSelected(item);
    }

    public void onActivityResult (int requestCode, int resultCode, Intent data) {
        if (requestCode == 1) {
            if (resultCode == 1)
                finish();
        }
    }
}
