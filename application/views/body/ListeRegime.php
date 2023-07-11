<main id="main" class="main">
  
<div class="col-md-12">
    <a href="<?php echo site_url('controlleur_admin/vers_AddRegime'); ?>">
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
    <h5 class="card-title">Liste des regimes</h5>
    <!-- Tableau avec bordure -->
    <table class="table table-bordered  table-striped">
      <?php
        foreach ($listeregimes as $regime) 
        { 
      ?>
        <thead>
          <tr>
            <th scope="col" id="header-cell"><?= $regime['nom_regime'] ?></th>
          </tr>
        </thead>
          <!-- elements du regime -->
          <?php
            foreach ($regime['elements'] as $element) 
            {
          ?>
              <tbody>
                <tr>
                  <td><?= $element->nom_element ?> </td>
                  <td><?= $element->prix_element ?> </td>
                  <td>
                    <a href="<?= site_url('controlleur_regime/vers_modif_regime')."?idregime=".$regime['id_regime'] ?>"><div class="btn btn-info"><i class="bi bi-pencil-fill"></i></div></a>&nbsp;&nbsp;&nbsp;<div class="btn btn-danger"><i class="bi bi-trash-fill"></i></div>
                  </td>    
                </tr>
              </tbody>
          <?php
            }
        }
          ?>
    </table>
  </div>
</main>