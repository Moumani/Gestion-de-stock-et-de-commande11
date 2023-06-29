php
<?php
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
    
)
{
    // Préparer la requête SQL pour insérer les données dans la table client
    $sql="INSERT into $nom_base_de_donne.client(nom_client,Localisation_client,telephone_client,matricefiscal_client, registrecommunal, email_client, siteweb_client)
            VALUES(?,?,?,?,?,?,?)"; 
    $red=$connexion->prepare($sql);

    // Exécuter la requête avec les données du formulaire
    $red->execute(array(
        $_POST['nom_client'],
        $_POST['Localisation_client'],
        $_POST['telephone_client'],
        $_POST['matricefiscal_client'],
        $_POST['registrecommunal'],
        $_POST['email_client'],
        $_POST['siteweb_client']
        
    ));

    // Vérifier si la requête a réussi
    if($red->rowCount()!=0) {
        $_SESSION['message']['text'] = "client ajouté avec succès";
        $_SESSION['message']['type']="success";
   
    }else{
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout d'un client";
        $_SESSION['message']['type']="danger";

    }
} else {
    $_SESSION['message']['text'] = "Une inf ormation obligatoire n'est pas enregistrée";
    $_SESSION['message']['type']="danger";
    
}

header('Location: ../vue/client.php');