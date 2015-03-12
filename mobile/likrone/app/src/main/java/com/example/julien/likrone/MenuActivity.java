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
            MenuItem item1 = menu.findItem(R.id.publier);
            item1.setVisible(false);
            MenuItem item2 = menu.findItem(R.id.compte);
            item2.setVisible(false);
        }

        if(getActiviteFille()==4){
            MenuItem item=menu.findItem(R.id.compte);
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
            case R.id.refresh: {
                Intent intent = getIntent();
                finish();
                startActivity(intent);
                return true;
            }

            case R.id.home:{
                finish();
                return true;
            }

            case R.id.compte: {
                Intent intent = new Intent(this, CompteActivity.class);
                startActivityForResult(intent, 1);
                if(getActiviteFille()!=0)
                    finish();
                return true;
            }

            case R.id.publier: {
                Intent intent = new Intent(this, Photo.class);
                startActivityForResult(intent,2);
                if(getActiviteFille()!=0)
                    finish();
                return true;
            }

            case R.id.deconnexion: {
                Intent intent = new Intent(this,LoginActivity.class);
                intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                startActivityForResult(intent,1);
                finish();
            }
        }
        return super.onOptionsItemSelected(item);
    }

    public void onActivityResult (int requestCode, int resultCode, Intent data) {
        if (requestCode == 2) {
            finish();
        }
    }
}