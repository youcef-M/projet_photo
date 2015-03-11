package com.example.julien.likrone;

import android.os.Bundle;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

public class AccueilActivity extends MenuActivity {

    public AccueilActivity(){
        super(3);
    }

    Button principale = null;
    Button meilleures = null;
    Button pires = null;
    Button suivis = null;
    Button fgauche = null;
    Button fdroite = null;

    ImageView imageView = null;
    Button poucev = null;
    Button poucer = null;
    Button commenter = null;
    Button modifier = null;
    Button supprimer = null;
    TextView titre = null;
    TextView auteur = null;
    TextView score = null;

    ImageView imageView2 = null;
    Button poucev2 = null;
    Button poucer2 = null;
    Button commenter2 = null;
    Button modifier2 = null;
    Button supprimer2 = null;
    TextView titre2 = null;
    TextView auteur2 = null;
    TextView score2 = null;

    ImageView imageView3 = null;
    Button poucev3 = null;
    Button poucer3 = null;
    Button commenter3 = null;
    Button modifier3 = null;
    Button supprimer3 = null;
    TextView titre3 = null;
    TextView auteur3 = null;
    TextView score3 = null;

    ImageView imageView4 = null;
    Button poucev4 = null;
    Button poucer4 = null;
    Button commenter4 = null;
    Button modifier4 = null;
    Button supprimer4 = null;
    TextView titre4 = null;
    TextView auteur4 = null;
    TextView score4 = null;

    ImageView imageView5 = null;
    Button poucev5 = null;
    Button poucer5 = null;
    Button commenter5 = null;
    Button modifier5 = null;
    Button supprimer5 = null;
    TextView titre5 = null;
    TextView auteur5 = null;
    TextView score5 = null;

    ImageView imageView6 = null;
    Button poucev6 = null;
    Button poucer6 = null;
    Button commenter6 = null;
    Button modifier6 = null;
    Button supprimer6 = null;
    TextView titre6 = null;
    TextView auteur6 = null;
    TextView score6 = null;

    ImageView imageView7 = null;
    Button poucev7 = null;
    Button poucer7 = null;
    Button commenter7 = null;
    Button modifier7 = null;
    Button supprimer7 = null;
    TextView titre7 = null;
    TextView auteur7 = null;
    TextView score7 = null;

    ImageView imageView8 = null;
    Button poucev8 = null;
    Button poucer8 = null;
    Button commenter8 = null;
    Button modifier8 = null;
    Button supprimer8 = null;
    TextView titre8 = null;
    TextView auteur8 = null;
    TextView score8 = null;

    ImageView imageView9 = null;
    Button poucev9 = null;
    Button poucer9 = null;
    Button commenter9 = null;
    Button modifier9 = null;
    Button supprimer9 = null;
    TextView titre9 = null;
    TextView auteur9 = null;
    TextView score9 = null;

    ImageView imageView10 = null;
    Button poucev10 = null;
    Button poucer10 = null;
    Button commenter10 = null;
    Button modifier10 = null;
    Button supprimer10 = null;
    TextView titre10 = null;
    TextView auteur10 = null;
    TextView score10 = null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.accueil);


        principale = (Button) findViewById(R.id.principale);
        meilleures = (Button) findViewById(R.id.meilleures);
        pires = (Button) findViewById(R.id.pires);
        suivis = (Button) findViewById(R.id.suivis);
        fgauche = (Button) findViewById(R.id.fgauche);
        fdroite = (Button) findViewById(R.id.fdroite);


        imageView = (ImageView) findViewById(R.id.imageView);
        imageView2 = (ImageView) findViewById(R.id.imageView2);
        imageView3 = (ImageView) findViewById(R.id.imageView3);
        imageView4 = (ImageView) findViewById(R.id.imageView4);
        imageView5 = (ImageView) findViewById(R.id.imageView5);
        imageView6 = (ImageView) findViewById(R.id.imageView6);
        imageView7 = (ImageView) findViewById(R.id.imageView7);
        imageView8 = (ImageView) findViewById(R.id.imageView8);
        imageView9 = (ImageView) findViewById(R.id.imageView9);
        imageView10 = (ImageView) findViewById(R.id.imageView10);

        poucev = (Button) findViewById(R.id.poucev);
        poucev2 = (Button) findViewById(R.id.poucev2);
        poucev3 = (Button) findViewById(R.id.poucev3);
        poucev4 = (Button) findViewById(R.id.poucev4);
        poucev5 = (Button) findViewById(R.id.poucev5);
        poucev6 = (Button) findViewById(R.id.poucev6);
        poucev7 = (Button) findViewById(R.id.poucev7);
        poucev8 = (Button) findViewById(R.id.poucev8);
        poucev9 = (Button) findViewById(R.id.poucev9);
        poucev10 = (Button) findViewById(R.id.poucev10);

        poucer = (Button) findViewById(R.id.poucer);
        poucer2 = (Button) findViewById(R.id.poucer2);
        poucer3 = (Button) findViewById(R.id.poucer3);
        poucer4 = (Button) findViewById(R.id.poucer4);
        poucer5 = (Button) findViewById(R.id.poucer5);
        poucer6 = (Button) findViewById(R.id.poucer6);
        poucer7 = (Button) findViewById(R.id.poucer7);
        poucer8 = (Button) findViewById(R.id.poucer8);
        poucer9 = (Button) findViewById(R.id.poucer9);
        poucer10 = (Button) findViewById(R.id.poucer10);

        commenter = (Button) findViewById(R.id.commenter);
        commenter2 = (Button) findViewById(R.id.commenter2);
        commenter3 = (Button) findViewById(R.id.commenter3);
        commenter4 = (Button) findViewById(R.id.commenter4);
        commenter5 = (Button) findViewById(R.id.commenter5);
        commenter6 = (Button) findViewById(R.id.commenter6);
        commenter7 = (Button) findViewById(R.id.commenter7);
        commenter8 = (Button) findViewById(R.id.commenter8);
        commenter9 = (Button) findViewById(R.id.commenter9);
        commenter10 = (Button) findViewById(R.id.commenter10);

        modifier = (Button) findViewById(R.id.modifier);
        modifier2 = (Button) findViewById(R.id.modifier2);
        modifier3 = (Button) findViewById(R.id.modifier3);
        modifier4 = (Button) findViewById(R.id.modifier4);
        modifier5 = (Button) findViewById(R.id.modifier5);
        modifier6 = (Button) findViewById(R.id.modifier6);
        modifier7 = (Button) findViewById(R.id.modifier7);
        modifier8 = (Button) findViewById(R.id.modifier8);
        modifier9 = (Button) findViewById(R.id.modifier9);
        modifier10 = (Button) findViewById(R.id.modifier10);

        supprimer = (Button) findViewById(R.id.supprimer);
        supprimer2 = (Button) findViewById(R.id.supprimer2);
        supprimer3 = (Button) findViewById(R.id.supprimer3);
        supprimer4 = (Button) findViewById(R.id.supprimer4);
        supprimer5 = (Button) findViewById(R.id.supprimer5);
        supprimer6 = (Button) findViewById(R.id.supprimer6);
        supprimer7 = (Button) findViewById(R.id.supprimer7);
        supprimer8 = (Button) findViewById(R.id.supprimer8);
        supprimer9 = (Button) findViewById(R.id.supprimer9);
        supprimer10 = (Button) findViewById(R.id.supprimer10);

        titre = (TextView) findViewById(R.id.titre);
        titre2 = (TextView) findViewById(R.id.titre2);
        titre3 = (TextView) findViewById(R.id.titre3);
        titre4 = (TextView) findViewById(R.id.titre4);
        titre5 = (TextView) findViewById(R.id.titre5);
        titre6 = (TextView) findViewById(R.id.titre6);
        titre7 = (TextView) findViewById(R.id.titre7);
        titre8 = (TextView) findViewById(R.id.titre8);
        titre9 = (TextView) findViewById(R.id.titre9);
        titre10 = (TextView) findViewById(R.id.titre10);

        auteur = (TextView) findViewById(R.id.auteur);
        auteur2 = (TextView) findViewById(R.id.auteur2);
        auteur3 = (TextView) findViewById(R.id.auteur3);
        auteur4 = (TextView) findViewById(R.id.auteur4);
        auteur5 = (TextView) findViewById(R.id.auteur5);
        auteur6 = (TextView) findViewById(R.id.auteur6);
        auteur7 = (TextView) findViewById(R.id.auteur7);
        auteur8 = (TextView) findViewById(R.id.auteur8);
        auteur9 = (TextView) findViewById(R.id.auteur9);
        auteur10 = (TextView) findViewById(R.id.auteur10);

        score = (TextView) findViewById(R.id.score);
        score2 = (TextView) findViewById(R.id.score2);
        score3 = (TextView) findViewById(R.id.score3);
        score4 = (TextView) findViewById(R.id.score4);
        score5 = (TextView) findViewById(R.id.score5);
        score6 = (TextView) findViewById(R.id.score6);
        score7 = (TextView) findViewById(R.id.score7);
        score8 = (TextView) findViewById(R.id.score8);
        score9 = (TextView) findViewById(R.id.score9);
        score10 = (TextView) findViewById(R.id.score10);


    }

}