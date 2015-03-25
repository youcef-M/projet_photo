package com.example.julien.likrone;

import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.MenuItem;


public class MenuActivity extends Activity {

    int numAct = 0;
    final String  EXTRA_INFO ="info_user";
    final String EXTRA_User = "info login";

    public MenuActivity(int pNumAct){
        numAct = pNumAct;
    }

    public int getActiviteFille(){
        return numAct;
    }

    /**********************************
     * AccueilActivity ==> numAct = 1 *
     * Photo           ==> numAct = 2 *
     * CompteActivity  ==> numAct = 3 *
     * ImageAdapter    ==> numAct = 4 *
     **********************************/

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);

        if(getActiviteFille()==1){
            MenuItem item = menu.findItem(R.id.home);
            item.setVisible(false);
        }

        if(getActiviteFille()==2){
            MenuItem item1 = menu.findItem(R.id.publier);
            item1.setVisible(false);
            MenuItem item2 = menu.findItem(R.id.compte);
            item2.setVisible(false);
            MenuItem item3 = menu.findItem(R.id.refresh);
            item3.setVisible(false);
        }

        if(getActiviteFille()==3){
            MenuItem item=menu.findItem(R.id.compte);
            item.setVisible(false);
            MenuItem item1 = menu.findItem(R.id.publier);
            item1.setVisible(false);
            MenuItem item3 = menu.findItem(R.id.refresh);
            item3.setVisible(false);
        }

        if(getActiviteFille()==4){
            MenuItem item=menu.findItem(R.id.compte);
            item.setVisible(false);
            MenuItem item1 = menu.findItem(R.id.publier);
            item1.setVisible(false);
        }
        return true;
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
                Intent intent2 = getIntent();
                final String idUser = intent2.getStringExtra(EXTRA_INFO).toString();
                Intent intent1 = new Intent(this, CompteActivity.class);
                intent1.putExtra(EXTRA_User, idUser.toString());
                startActivityForResult(intent1,1);
                return true;
            }

            case R.id.publier: {
                Intent intent2 = getIntent();
                final String idUser = intent2.getStringExtra(EXTRA_INFO).toString();
                Intent intent1 = new Intent(this, Photo.class);
                intent1.putExtra(EXTRA_User, idUser.toString());
                startActivityForResult(intent1, 1);
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