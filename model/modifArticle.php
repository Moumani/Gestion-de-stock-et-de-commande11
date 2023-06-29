
<?php
include 'connexion.php';

// Vérifier si les données du formulaire sont remplies
if(
    !empty($_POST["Nom_produit"])
    && !empty($_POST['catégorie_produit'])
    && !empty($_POST['quantité_produit'])
    && !empty($_POST['PU_produit'])
    && !empty($_POST['id_produit'])

) {
    // Préparer la requête SQL pour insérer les données dans la table produit
    $sql = "UPDATE produit SET Nom_produit=?, catégorie_produit=?,quantité_produit=?,PU_produit=? WHERE id_produit=?";
    $red=$connexion->prepare($sql);

    // Exécuter la requête avec les données du formulaire
    $red->execute(array(
        $_POST['Nom_produit'],
        $_POST['catégorie_produit'],
        $_POST['quantité_produit'],
        $_POST['PU_produit'],
        $_POST['id_produit']
    ));


    // Vérifier si la requête a réussi
    if($red->rowCount()!=0) {
        $_SESSION['message']['text'] = "article modifier avec succès";
        $_SESSION['message']['type']="success";
   
    }else{
        $_SESSION['message']['text'] = "rien n'a été modifié";
        $_SESSION['message']['type']="warning";

    }
} else {
    $_SESSION['message']['text'] = "Une information obligatoire n'est pas enregistrée";
    $_SESSION['message']['type']="danger";
    
}

header('Location: ../vue/article.php');