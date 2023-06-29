<?php
include 'entete.php';

if(!empty($_GET['id_vente'])){
  $vente=getVente($_GET['id_vente']);
}

?>

<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id_vente']) ? "../model/modifVente.php" : "../model/ajoutVente.php" ?>" method="post">
                
                <input value="<?= !empty($_GET['id_vente']) ? $vente['id_vente'] : "" ?>"  type="hidden" name="id_vente" id="id_vente">   

                <label for="id_produit">Article</label>
                <select onchange="setPrix()" name="id_produit" id="id_produit">
                <?php

                      $produit = getProduit(); // Correction de la variable $produit en $article
                     if (!empty($produit) && is_array($produit)) {
                        foreach ($produit as $key => $value) {
                             ?>
                             <option data-prix="<?= $value['PU_produit']?>" value="<?= $value['id_produit']?>"><?= $value['Nom_produit']. " - ". $value['quantité_produit']." disponible"?></option>
                             <?php
                         }
                 }

                ?>
              </select>


<label for="id_client">Client</label>
<select name="id_client" id="id_client">
<?php

    $client=getClient(); // Correction de la fonction getProduit() en getClient()
    if (!empty($client) && is_array($client)) {
        foreach($client as $key => $value) {
            ?>
            <option value="<?= $value['id_client']?>"><?= $value['nom_client']?></option>
            <?php
        }
    }

?>
</select>
                <label for="quantité_vente">Quantité</label>
                <input onkeyup="setPrix()" value="<?=!empty($_GET['id_vente']) ? $vente['quantité_vente'] :"" ?>"  type="number" name="quantité_vente" id="quantité_vente" placeholder="Veuillez saisir la quantité">

                <label for="prix_vente">Prix</label>
                <input value="<?=!empty($_GET['id_vente']) ? $vente['prix_vente'] :"" ?>"  type="number" size="50" name="prix_vente" id="prix_vente" placeholder="Veuillez saisir le prix">

                <button type=submit>Valider</button>

                <?php
                if(!empty($_SESSION['message']['text'])) {
                  ?>
                    <div class="alert <?= $_SESSION['message']['type']?>">
                       <?= $_SESSION['message']['text'] ?>
                    </div>
                  <?php
                }
                ?> 
            </from>
        </div>
        <div class="box">
          <table class="mtable">
            <tr>
              <th>article</th>
              <th>client</th>
              <th>Quantité</th>
              <th>Prix </th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            
<?php 
            
               $id_vente=getVente();

               if(!empty($id_vente) && is_array($id_vente)){
                foreach ($id_vente as $key => $value) {
                  ?>
                  <tr>
                    <td><?= $value['Nom_produit'] ?></td>  
                    <td><?= $value['nom_client'] ?></td>            
                    <td><?= $value['quantité_vente'] ?></td> 
                    <td><?= $value['prix_vente'] ?></td>
                    <td><?= date('d/m/Y H:i:s', strtotime($value['date_vente'])) ?></td>
                    <td><a href="recuVente.php?id=<?= $value['id_vente'] ?>"><i class='bx bxs-receipt'></i></a></td> 
                  </tr>
                  <?php 
                }
              } else { // ajout d'un bloc else pour gérer le cas où $vente est vide ou non un tableau
                echo "<p>Aucune vente trouvée.</p>";
              }
            ?>
          </table>
        </div>
      </div>
</div>
</section>

<?php
include 'pied.php';
?> 

<script>

function setPrix() {
  var produit = document.querySelector('#id_produit');
  var quantite = document.querySelector('#quantité_vente');
  var prix = document.querySelector('#prix_vente');

  var prixUnitaire = produit.options[produit.selectedIndex].getAttribute('data-prix');

  prix.value = Number(quantite.value) * Number(prixUnitaire);
}


</script>