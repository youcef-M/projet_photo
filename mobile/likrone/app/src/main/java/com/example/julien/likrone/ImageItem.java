package com.example.julien.likrone;

import android.graphics.Bitmap;

public class ImageItem {
    private Bitmap image;
    private String id;
    private String title;
    private String author;

    public ImageItem(Bitmap image, String id, String title, String author) {
        super();
        this.image = image;
        this.id = id;
        this.title = title;
        this.author = author;
    }

    public Bitmap getImage() {
        return image;
    }

    public void setImage(Bitmap image) {
        this.image = image;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getAuthor(){
        return author;
    }

    public void setAuthor(String author){
        this.author=author;
    }

    public String getId(){
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }
}