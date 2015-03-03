package com.example.julien.likrone;

/**
 * Created by Pierre on 02/03/2015.
 */
public class GalerieItem {

    private String itemTitle;

    public String getItemTitle() {
        return itemTitle;
    }

    public void setItemTitle(String itemTitle) {
        this.itemTitle = itemTitle;
    }

    public GalerieItem(String title){
        this.itemTitle = title;
    }
}