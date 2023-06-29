<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifier si les données du formulaire sont remplies
if(
    !empty($_POST["nom_fournisseur"])
    && !empty($_POST['adresse_fournisseur'])
    && !empty($_POST['telephone_founisseur'])
    && !empty($_POST['email_fournisseur'])
    && !empty($_POST['id_fournisseur']) // Ajouter cette condition pour vérifier l'identifiant du client

) {
    // Préparer la requête SQL pour mettre à jour les données dans la table client
    $sql = "UPDATE fournisseur SET nom_fournisseur=?,adresse_fournisseur=?,telephone_founisseur=?,email_fournisseur=? WHERE id_fournisseur=?";
    $red=$connexion->prepare($sql);

    // Exécuter la requête avec les données du formulaire
    $red->execute(array(
        $_POST['nom_fournisseur'],
        $_POST['adresse_fournisseur'],
        $_POST['telephone_founisseur'],
        $_POST['email_fournisseur'],
        $_POST['id_fournisseur'] // Ajouter cette valeur pour identifier le client à modifier
    ));


    // Vérifier si la requête a réussi
    if($red->rowCount()!=0) {
        $_SESSION['message']['text'] = "fournisseur modifié avec succès";
        $_SESSION['message']['type']="success";
   
    }else{
        $_SESSION['message']['text'] = "Rien n'a été modifié";
        $_SESSION['message']['type']="warning";

    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire n'est pas renseignée";
    $_SESSION['message']['type']="danger";
    
}

// Rediriger vers la page des clients
header('Location: ../vue/Fournisseur.php');

// L'erreur dans le code était que l'identifiant du client n'était pas vérifié ni passé dans la requête SQL.
