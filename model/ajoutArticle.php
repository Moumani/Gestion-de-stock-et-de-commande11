
<?php
include 'connexion.php';

// Vérifier si les données du formulaire sont remplies
if(
    !empty($_POST["Nom_produit"])
    && !empty($_POST['catégorie_produit'])
    && !empty($_POST['quantité_produit'])
    && !empty($_POST['PU_produit'])
) {
    // Préparer la requête SQL pour insérer les données dans la table produit
    $sql="INSERT INTO produit(Nom_produit,catégorie_produit,quantité_produit,PU_produit)
            VALUES(?,?,?,?)";
    $req=$connexion->prepare($sql);

    // Exécuter la requête avec les données du formulaire
    $req->execute(array(
        $_POST['Nom_produit'],
        $_POST['catégorie_produit'],
        $_POST['quantité_produit'],
        $_POST['PU_produit']
    ));

    // Vérifier si la requête a réussi
    if($req->rowCount()!=0) {
        $_SESSION['message']['text'] = "article ajouté avec succès";
        $_SESSION['message']['type']="success";
   
    }else{
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout de l'article";
        $_SESSION['message']['type']="danger";

    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire n'est pas enregistrée";
    $_SESSION['message']['type']="danger";
    
}

header('Location: ../vue/article.php');