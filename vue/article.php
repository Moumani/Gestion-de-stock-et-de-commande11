<?php
include 'entete.php';

if(!empty($_GET['id_produit'])){
  $produit=getProduit($_GET['id_produit']);
}

?>

<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id']) ? "../model/modifArticle.php" : "../model/ajoutArticle.php" ?>" method="post">
                <label for="Nom_produit">Nom de l'article</label>
                <input value="<?=!empty($_GET['id_produit']) ? $produit['Nom_produit'] :"" ?>"  type="text" name="Nom_produit" id="Nom_produit" placeholder="Veuillez saisir le nom">
                <input value="<?=!empty($_GET['id_produit']) ? $produit['id_produit'] :"" ?>"  type="hidden" name="id_produit" id="id_produit">

                <label for="catégorie_produit">Catégorie</label>
                <select name="catégorie_produit" id="catégorie_produit">
                  <option <?=!empty($_GET['id_produit']) && $produit['catégorie_produit']=="ordinateur" ? "selected" :"" ?> value="ordinateur">Ordinateur</option>
                  <option <?=!empty($_GET['id_produit']) && $produit['catégorie_produit']=="vehicule" ? "selected" :"" ?> value="vehicule">Vehicule</option>
                  <option <?=!empty($_GET['id_produit']) && $produit['catégorie_produit']=="chaussure" ? "selected" :"" ?> value="chaussure">Chaussure</option>
                  <option <?=!empty($_GET['id_produit']) && $produit['catégorie_produit']=="appareil electronique" ? "selected" :"" ?> value="appareil electronique">Appareil electronique</option>
                  <option <?=!empty($_GET['id_produit']) && $produit['catégorie_produit']=="habit" ? "selected" :"" ?> value="habit">Habit</option>
                </select>

                <label for="quantité_produit">Quantité</label>
                <input value="<?=!empty($_GET['id_produit']) ? $produit['quantité_produit'] :"" ?>"  type="number" name="quantité_produit" id="quantité_produit" placeholder="Veuillez saisir la quantité">

                <label for="PU_produit">Prix Unitaire</label>
                <input value="<?=!empty($_GET['id_produit']) ? $produit['PU_produit'] :"" ?>"  type="number"  name="PU_produit" id="PU_produit" placeholder="Veuillez saisir le prix">

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
              <th>Nom article</th>
              <th>Catégorie</th>
              <th>Quantité</th>
              <th>Prix Unitaire</th>
              <th>Action</th>
            </tr>
            <?php 
               $produit=getProduit();

               if(!empty($produit) && is_array($produit)){
                foreach ($produit as $key => $value) {
                  ?>
                  <tr>
                    <td><?= $value['Nom_produit'] ?></td> 
                    <td><?= $value['catégorie_produit'] ?></td> 
                    <td><?= $value['quantité_produit'] ?></td> 
                    <td><?= $value['PU_produit'] ?></td> 
                    <td><a href="?id_produit=<?= $value['id_produit'] ?>"><i class='bx bx-edit-alt'></i></a></td> 
                </tr>
                  <?php
                }
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