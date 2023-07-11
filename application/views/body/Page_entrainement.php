<main id="main" class="main">
  
<div class="col-md-12"> 
      <a  href="<?php echo site_url('Controlleur_parametrer/vers_parametre_entrainement'); ?>">
       <div class="col-sm-6">
            <div class="textdiv" style="background-color: #c7dbff00;">
                <p id="added">  <i class="bi bi-plus-circle"></i>
  </i>Ajouter</p>
            </div>
        </div>
    </a>
</div>
<!-- Résultat Planning -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Liste parametrage</h5>
    <!-- Tableau avec bordure -->
    <table class="table table-bordered  table-striped">
      <thead>
        <tr>
           <th scope="col" id="header-cell">nom objectif</th>
           <th scope="col" id="header-cell">genre</th>
           <th scope="col" id="header-cell">type entrainement</th>
           <th scope="col" id="header-cell">poids1</th>
           <th scope="col" id="header-cell">poids2</th>
           <th scope="col" id="header-cell">taille1</th>
           <th scope="col" id="header-cell">taille2</th>
           <th scope="col" id="header-cell">Estimation</th>
      </tr>
        </thead>
      <tbody>
        <?php
        foreach($v_entrainement as $v_entrainemen) {
          ?>
              <tr> 
                <td><?= $v_entrainemen["nom_objectif"] ?></td>
               
                <td><?= $v_entrainemen["genre"] ?></td>
               
                <td><?= $v_entrainemen["type_entrainement"] ?></td>
                <td class="text-end"><?=  number_format($v_entrainemen["poids1"], 0, '.', ' '); ?></td>
    
                <td class="text-end"><?=  number_format($v_entrainemen["poids2"], 0, '.', ' '); ?></td>
               
                <td class="text-end"><?=  number_format($v_entrainemen["taille1"], 0, '.', ' '); ?></td>
    
                <td class="text-end"><?=  number_format($v_entrainemen["taille2"], 0, '.', ' '); ?></td>
    
                <td class="text-end"><?=  number_format($v_entrainemen["estimation"], 0, '.', ' '); ?></td>

              </tr>
          <?php
        }
        ?>
          <tr></tr>
        </tbody>
    </table>
  </div>
</main>