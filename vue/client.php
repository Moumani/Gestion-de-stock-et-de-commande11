<?php
include 'entete.php';

if(!empty($_GET['id_client'])){
  $client = getClient($_GET['id_client']);
}

?>

<div class="home-content">
      <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id_client']) ? "../model/modifClient.php" : "../model/ajoutClient.php" ?>" method="post">
                <label for="nom_client">Nom du client</label>
                <input value="<?=!empty($_GET['id_client']) ? $client['nom_client'] :"" ?>"  type="text" name="nom_client" id="nom_client" placeholder="Veuillez saisir le nom">
                <input value="<?=!empty($_GET['id_client']) ? $client['id_client'] :"" ?>"  type="hidden" name="id_client" id="id">

                <label for="Localisation_client">Localisation</label>
                <input value="<?=!empty($_GET['id_client']) ? $client['Localisation_client'] :"" ?>"  type="text" name="Localisation_client" id="Localisation_client" placeholder="Veuillez saisir la localisation">

                <label for="telephone_client">Téléphone</label>
                <input value="<?=!empty($_GET['id_client']) ? $client['telephone_client'] :"" ?>"  type="tel" name="telephone_client" id="telephone_client" placeholder="Veuillez saisir le N° de téléphone">

                <label for="matricefiscal_client">Matricule fiscal</label>
                <input value="<?=!empty($_GET['id_client']) ? $client['matricefiscal_client'] :"" ?>"  type="text"  name="matricefiscal_client" id="matricefiscal_client" placeholder="Veuillez saisir le matricul">

                <label for="registrecommunal">Registre communal</label>
                <input value="<?=!empty($_GET['id_client']) ? $client['registrecommunal'] :"" ?>"  type="text" name="registrecommunal" id="registrecommunal" placeholder="Veuillez saisir le registre">

                <label for="email_client">E-mail</label>
                <input value="<?=!empty($_GET['id_client']) ? $client['email_client'] :"" ?>"  type="email" name="email_client" id="email_client" placeholder="Veuillez saisir votre e-mail">

                <label for="siteweb_client">Site web</label>
                <input value="<?=!empty($_GET['id_client']) ? $client['siteweb_client'] :"" ?>"  type="text" name="siteweb_client" id="siteweb_client" placeholder="Veuillez saisir votre site web">

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
              <th>Matricul fiscale</th>
              <th>Registre communal</th>
              <th>E-mail</th>
              <th>Site web</th>
              <th>Action</th>
            </tr>
            <?php 
               $client=getClient();

               if(!empty($client) && is_array($client)){
                foreach ($client as $key => $value) {
                  ?>
                  <tr>
                    <td><?= $value['nom_client'] ?></td> 
                    <td><?= $value['Localisation_client'] ?></td> 
                    <td><?= $value['telephone_client'] ?></td> 
                    <td><?= $value['matricefiscal_client'] ?></td> 
                    <td><?= $value['registrecommunal'] ?></td>
                    <td><?= $value['email_client'] ?></td>
                    <td><?= $value['siteweb_client'] ?></td> 
                    <td><a href="?id_client=<?= $value['id_client'] ?>"><i class='bx bx-edit-alt'></i></a></td> 
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