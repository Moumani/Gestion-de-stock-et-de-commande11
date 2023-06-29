<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifier si les données du formulaire sont remplies
if(
    !empty($_POST["nom_client"])
    && !empty($_POST['Localisation_client'])
    && !empty($_POST['telephone_client'])
    && !empty($_POST['matricefiscal_client'])
    && !empty($_POST['registrecommunal'])
    && !empty($_POST['email_client'])
    && !empty($_POST['siteweb_client'])
    && !empty($_POST['id_client']) // Ajouter cette condition pour vérifier l'identifiant du client

) {
    // Préparer la requête SQL pour mettre à jour les données dans la table client
    $sql = "UPDATE client SET nom_client=?,Localisation_client=?,telephone_client=?,matricefiscal_client=?, registrecommunal=?, email_client=?, siteweb_client=? WHERE id_client=?";
    $red=$connexion->prepare($sql);

    // Exécuter la requête avec les données du formulaire
    $red->execute(array(
        $_POST['nom_client'],
        $_POST['Localisation_client'],
        $_POST['telephone_client'],
        $_POST['matricefiscal_client'],
        $_POST['registrecommunal'],
        $_POST['email_client'],
        $_POST['siteweb_client'],
        $_POST['id_client'] // Ajouter cette valeur pour identifier le client à modifier
    ));


    // Vérifier si la requête a réussi
    if($red->rowCount()!=0) {
        $_SESSION['message']['text'] = "Client modifié avec succès";
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
header('Location: ../vue/client.php');

// L'erreur dans le code était que l'identifiant du client n'était pas vérifié ni passé dans la requête SQL.
