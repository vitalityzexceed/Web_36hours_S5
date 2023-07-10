<main id="main" class="main">
  
<div class="col-md-12">
    <a href="<?php echo site_url('Controlleur_admin/vers_AddRegime'); ?>">
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
           <th scope="col" id="header-cell">element 2</th>
           <th scope="col" id="header-cell">element 3</th>
        </tr>
        </thead>
      <tbody>
        <tr>
           <td>RegimeA </td>
          <td>RegimeB</td>
          <td><div class="btn btn-info"><i class="bi bi-pencil-fill"></i></div>&nbsp;&nbsp;&nbsp;<div class="btn btn-danger"><i class="bi bi-trash-fill"></i></div>
            </td>    
          </tr>
</div>
        </tbody>
    </table>
  </div>
</main>