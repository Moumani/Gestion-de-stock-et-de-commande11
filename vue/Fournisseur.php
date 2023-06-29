<?php
include 'entete.php';

if(!empty($_GET['id_fournisseur'])){
  $client = getFournisseur($_GET['id_fournisseur']);
}

?>

<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id_fournisseur']) ? "../model/modifFournisseur.php" : "../model/ajoutFournisseur.php" ?>" method="post">
                <label for="nom_client">Nom du client</label>
                <input value="<?=!empty($_GET['id_fournisseur']) ? $client['nom_fournisseur'] :"" ?>"  type="text" name="nom_fournisseur" id="nom_fournisseur" placeholder="Veuillez saisir le nom">
                <input value="<?=!empty($_GET['id_fournisseur']) ? $client['id_fournisseur'] :"" ?>"  type="hidden" name="id_fournisseur" id="id">

                <label for="Localisation_client">Localisation</label>
                <input value="<?=!empty($_GET['id_fournisseur']) ? $client['adresse_fournisseur'] :"" ?>"  type="text" name="adresse_fournisseur" id="adresse_fournisseur" placeholder="Veuillez saisir la localisation">

                <label for="telephone_fournisseur">Téléphone</label>
                <input value="<?=!empty($_GET['id_fournisseur']) ? $client['telephone_fournisseur'] :"" ?>"  type="tel" name="telephone_fournisseur" id="telephone_fournisseur" placeholder="Veuillez saisir le N° de téléphone">

                <label for="email_fournisseur">E-mail</label>
                <input value="<?=!empty($_GET['id_fournisseur']) ? $client['email_fournisseur'] :"" ?>"  type="email" name="email_fournisseur" id="email_fournisseur" placeholder="Veuillez saisir votre e-mail">

               
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
              <th>Nom client</th>
              <th>Localisation</th>
              <th>Téléphonne</th>
              <th>E-mail</th>
              
              <th>Action</th>
            </tr>
            <?php 
               $client=getFournisseur();

               if(!empty($client) && is_array($client)){
                foreach ($client as $key => $value) {
                  ?>
                  <tr>
                    <td><?= $value['nom_fournisseur'] ?></td> 
                    <td><?= $value['Localisation_fournisseur'] ?></td> 
                    <td><?= $value['telephone_fournisseur'] ?></td> 
               
                    <td><?= $value['email_fournisseur'] ?></td>
                   
                    <td><a href="?id_fournisseur=<?= $value['id_fournisseur'] ?>"><i class='bx bx-edit-alt'></i></a></td> 
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