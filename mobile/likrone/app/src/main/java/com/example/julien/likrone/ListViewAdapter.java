package com.example.julien.likrone;

import android.app.Activity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.ArrayList;

public class ListViewAdapter extends BaseAdapter
{
    Activity context;
    ArrayList auteurs;
    ArrayList commentaires;

    public ListViewAdapter(Activity context, ArrayList auteurs, ArrayList commentaires) {
        super();
        this.context = context;
        this.auteurs = auteurs;
        this.commentaires = commentaires;
    }

    public View getView(int position, View convertView, ViewGroup parent)
    {
        // TODO Auto-generated method stub
        ViewHolder holder;
        LayoutInflater inflater =  context.getLayoutInflater();

        if (convertView == null)
        {
            convertView = inflater.inflate(R.layout.list_row, null);
            holder = new ViewHolder();
            holder.txtViewAuteur = (TextView) convertView.findViewById(R.id.auteur);
            holder.txtViewCommentaire = (TextView) convertView.findViewById(R.id.commentaire);
            convertView.setTag(holder);
        }
        else
        {
            holder = (ViewHolder) convertView.getTag();
        }

        holder.txtViewAuteur.setText(auteurs.get(position).toString());
        holder.txtViewCommentaire.setText(commentaires.get(position).toString());

        return convertView;
    }

    public int getCount() {
      return auteurs.size();
    }

    public Object getItem(int position) {
        // TODO Auto-generated method stub
        return null;
    }

    public long getItemId(int position) {
        // TODO Auto-generated method stub
        return 0;
    }

    private class ViewHolder {
        TextView txtViewAuteur;
        TextView txtViewCommentaire;
    }


}