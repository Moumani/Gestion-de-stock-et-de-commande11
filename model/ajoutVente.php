<?php
include 'connexion.php';
include_once 'function.php'; 

// Vérifier si les données du formulaire sont remplies
if(
    !empty($_POST["id_produit"])
    && !empty($_POST['id_client'])
    && !empty($_POST['quantité_vente'])
    && !empty($_POST['prix_vente'])
) {
    $produit = getProduit($_POST['id_produit']);

    if (!empty($produit) && is_array($produit)) {
        if($_POST['quantité_vente']>$produit['quantité_produit']) {
        $_SESSION['message']['text'] = "la quantité à vendre n'est pas disponible";
        $_SESSION['message']['type']="danger";
        }else{
            $sql="INSERT into vente(id_produit,id_client,quantité_vente,prix_vente)
            VALUES(?,?,?,?)";
    $req = $connexion->prepare($sql);
    // Exécuter la requête avec les données du formulaire
    $req->execute(array(
        $_POST['id_produit'],
        $_POST['id_client'],
        $_POST['quantité_vente'],
        $_POST['prix_vente']
    ));
    // Vérifier si la requête a réussi
    if ($req->rowCount() != 0) {
        $sql = "UPDATE produit SET quantité_produit = quantité_produit - ? WHERE id_produit = ?";
        $req = $connexion->prepare($sql);
    
        $req->execute(array(             
            $_POST['quantité_vente'],
            $_POST['id_produit'],   
        ));
    
        if ($req->rowCount() != 0) {
            $_SESSION['message']['text'] = "Vente effectuée avec succès";
            $_SESSION['message']['type'] = "success";
        } else {
            $_SESSION['message']['text'] = "Impossible de mettre à jour la quantité de produits";
            $_SESSION['message']['type'] = "danger";
        }
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de la vente";
        $_SESSION['message']['type'] = "danger";
    }
        }
    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire n'est pas enregistrée";
    $_SESSION['message']['type']="danger";
    
}

header('Location: ../vue/vente.php');