php
<?php
include 'connexion.php';

// Vérifier si les données du formulaire sont remplies
if(
    !empty($_POST["nom_fournisseur"])
    && !empty($_POST['adresse_fournisseur'])
    && !empty($_POST['telephone_founisseur'])
    && !empty($_POST['email_fournisseur'])
    
    
)
{
    // Préparer la requête SQL pour insérer les données dans la table client
    $sql="INSERT into $nom_base_de_donne.client(nom_fournisseur,adresse_fournisseur,telephone_founisseur,email_fournisseur)
            VALUES(?,?,?,?)"; 
    $red=$connexion->prepare($sql);

    // Exécuter la requête avec les données du formulaire
    $red->execute(array(
        $_POST['nom_fournisseur'],
        $_POST['adresse_fournisseur'],
        $_POST['telephone_founisseur'],
        $_POST['email_fournisseur'],
        $_POST['registrecommunal'],
      
        
    ));

    // Vérifier si la requête a réussi
    if($red->rowCount()!=0) {
        $_SESSION['message']['text'] = "fournisseur ajouté avec succès";
        $_SESSION['message']['type']="success";
   
    }else{
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout d'un fournisseur";
        $_SESSION['message']['type']="danger";

    }
} else {
    $_SESSION['message']['text'] = "Une inf ormation obligatoire n'est pas enregistrée";
    $_SESSION['message']['type']="danger";
    
}

header('Location: ../vue/Fournisseur.php');