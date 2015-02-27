package com.example.julien.likrone;

import android.app.Activity;
import android.view.Menu;

/**
 * Created by Julien on 27/02/2015.
 */
public class MenuActivity extends Activity {


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }
}
