<main id="main" class="main">
  
<div class="col-md-12"> 
    <a href="<?php echo site_url('Controlleur_admin/vers_AddElement'); ?>">
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
    <h5 class="card-title">Résultat Planning</h5>
    <!-- Tableau avec bordure -->
    <table class="table table-bordered  table-striped">
      <thead>
        <tr>
           <th scope="col" id="header-cell">element 1</th>
           <th scope="col" id="header-cell">Prix</th>
        </tr>
        </thead>
      <tbody>
        <?php
        foreach($listeelements as $element) {
          ?>
              <tr>
                <td><?= $element["nom_element"] ?></td>
                <td class="text-end"><?=  number_format($element["prix_element"], 0, '.', ' '); ?></td>
    
              </tr>
          <?php
        }
        ?>
          <tr></tr>
        </tbody>
    </table>
  </div>
</main>