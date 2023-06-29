<?php
include 'entete.php';


if (!empty($_GET['id_vente'])) {
  $id_vente= getVente($_GET['id_vente']);
}


?>


  <div class="home-content">
    <div class="page">
      <div class="cote-a-cote">
        <h2>Appak Control</h2>
        <div>
        <p>Recu N° #: <?= $id_vente['id_vente'] ?> </p>
        </div>
      </div>
    </div>
    <div class="overview-boxes">
      <div class="box">
        <table class="mtable">
          <tr>
            <th>Article</th>
            <th>Client</th>
            <th>Quantité</th>
            <th>Prix </th>
            <th>Date</th>
            <th>Action</th>
          </tr>        
          <?php 
          $id_vente=getVente();

          if(!empty($id_vente) && is_array($id_vente)) {
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
          }
          ?>
        </table>
      </div>
    </div>
  </div>


