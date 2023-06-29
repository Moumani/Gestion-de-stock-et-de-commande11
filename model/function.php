
<?php
include 'connexion.php';

function getProduit($id=null)
{
    if(!empty($id)){
        $sql="SELECT * FROM produit where id_produit=?"; // added a space between SELECT and *

        $req=$GLOBALS['connexion']->prepare($sql);

        $req->execute(array($id));

        return $req->fetch();
    } else {
        $sql="SELECT * FROM produit";
    
        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute();
    
        return $req->fetchAll();
    }
}




function getClient($id_client=null)
{
    if(!empty($id_client)){
        $sql="SELECT * FROM client where id_client=?"; // added a space between SELECT and *

        $req=$GLOBALS['connexion']->prepare($sql);

        $req->execute(array($id_client));

        return $req->fetch();
    } else {
        $sql="SELECT * FROM client";
    
        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute();
    
        return $req->fetchAll();
    }
}

function getVente($id=null)
{
    if(!empty($id)){
        $sql="SELECT Nom_produit, nom_client, v.quantité_vente, prix_vente, date_vente, v.id_vente, PU_produit,Localisation_client,telephone_client
        FROM client AS c, vente AS v, produit AS a WHERE v.id_produit=a.id_produit AND v.id_client=c.id_client AND v.id_vente=?";

        $req=$GLOBALS['connexion']->prepare($sql);

        $req->execute(array($id));

        return $req->fetch();
    } else {
        $sql="SELECT Nom_produit, nom_client, v.quantité_vente, prix_vente,date_vente, v.id_vente
        FROM client AS c, vente AS v, produit AS a WHERE v.id_produit=a.id_produit AND v.id_client=c.id_client";
    
        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute();
    
        return $req->fetchAll();
    }
}

function getFournisseur($id_client=null)
{
    if(!empty($id_client)){
        $sql="SELECT * FROM fournisseur where id_fournisseur=?"; // added a space between SELECT and *

        $req=$GLOBALS['connexion']->prepare($sql);

        $req->execute(array($id_client));

        return $req->fetch();
    } else {
        $sql="SELECT * FROM fournisseur";
    
        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute();
    
        return $req->fetchAll();
    }
}






