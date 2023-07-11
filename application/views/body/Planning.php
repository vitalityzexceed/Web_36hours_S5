<?php 

?>

<main id="main" class="main">
    <!-- Résultat Planning -->
    <div class="card">

    <div>

    </div>
    <form action="<?php echo site_url('controlleur_client/vers_Planning'); ?>" method="post">
        
      <div class="card-body">
        <div class="">
            <label class="">Objectif</label>
            <div class="col-sm-10">
              <select class="form-select" name="id_objectif">
                <option value="1">Augmenter son poids</option>
                <option value="2">Reduire son poids</option>
              </select>
            </div>
          </div>

          <div class="">
            <label for="inputNumber" class="">Poids</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name = "poids" required>
            </div>
          </div>

        <br>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Proposer</button>
        </div>
      </form>
      <br>
      </div>
      <a href="<?= site_url('controlleur_client/vers_Planning_IMC') ?>"><button class="btn btn-primary" style="margin-left: 20px;">Atteindre son IMC</button></a>
        <div class="card-body">
            <h5 class="card-title">Résultat Planning  <a href="<?= site_url("controlleur_client/PDF_entrainement") ?>"><button class="btn btn-primary" style="margin-left: 30px;" >Voir Pdf</button></a></h5>
            <?php
              if(isset($_SESSION["message_IMC"])){
                  echo $_SESSION["message_IMC"];
              }
            ?>
            
            <!-- Tableau avec bordure -->
            
                
                    <?php foreach ($entrainement_jour as $ent): ?>
                    <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th scope="col" id="header-cell"></th>
                        <th scope="col" id="header-cell"><?php echo "Jour " . $ent["jour"]; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Regime</th>
                        <th>
                            <?php 
                            $regime = '';
                            foreach ($ent["regime"] as $ee) {
                                if ($regime == '') {
                                    $regime = $ee["nom_element"];
                                } else {
                                    $regime .= ', ' . $ee["nom_element"];
                                }
                            }
                            ?>
                            <p><u>Regime :</u></p>
                            <p><?php echo $regime; ?></p>
                        </th>
                    </tr>
                    <tr>
                        <td>Entrainement</td>


                          <td>  
                          <table class="table table-bordered table-striped">
                            <tr>
                              <th scope="col" id="header-cell" >Activite</th>    
                              <th scope="col" id="header-cell" >Nombre de répétitions</th>    
                              <th scope="col" id="header-cell" >Nombre de séances </th>    
                              </tr>
                              <?php foreach ($ent["entrainement"] as $ee): ?>
                                <tr>
                                  <td>  <p><?php echo $ee["nom_activite"]; ?> </p></td>    
                                  <td><p><?php echo $ee["nb_repetition"]; ?></p></td>    
                                  <td><p><?php echo $ee["nb_seances"]; ?></p></td>   
                              </tr>
                            
                              <?php endforeach; ?>
                        
                          </table>
                        </td>
                    </tr>

                    </tbody>
            </table>

                    <?php endforeach; ?>
 
                   
                          
                
        </div>
        <div>
          <style>
            .pagination {
              display: flex;
              justify-content: center;
              list-style-type: none;
              padding: 0;
            }

            .pagination li {
              margin: 0 5px;
            }

            .pagination a {
              color: #333;
              text-decoration: none;
              padding: 5px 10px;
              border: 1px solid #ccc;
              border-radius: 3px;
            }

            .pagination a:hover {
              background-color: #f5f5f5;
            }

            .pagination .active {
              background-color: #333;
              color: #fff;
            }
          </style>
        <nav>
          <ul class = "pagination">
          <?php
          for ($i=0; $i <$nb_pages ; $i++) { 
            $url = $i+1;
            ?>
              <li class="page-item"><a href="<?php echo site_url('controlleur_client/vers_Planning/'.$url); ?>"><?php echo $i+1; ?></a></li>
            <?php
          }
          ?>
          </ul>
        </nav> 
        </div>
        </div>
        <center><p>Prix total <?=  number_format($prix_total, 0, '.', ' '); ?>Ar</p></center>
        <center> <a href="<?= site_url("controlleur_client/payer") ?>"><button class="btn btn-primary" >Acheter Regime</button></a> </center>
        <?php
          if(isset($_GET["error"])){
            ?>
                <button class="btn btn-danger" ><?= $_GET["error"] ?></button>
            <?php
        }
        ?>

    </div>
</main>
