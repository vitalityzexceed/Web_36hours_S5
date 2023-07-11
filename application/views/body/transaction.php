<main id="main" class="main">
  
<!-- Résultat Planning -->
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Transaction</h5>
    <!-- Tableau avec bordure -->
    <table class="table table-bordered  table-striped">
      <thead>
        <tr>
           <th scope="col" id="header-cell">Code</th>
           <th scope="col" id="header-cell">Prix</th>
           <th scope="col" id="header-cell">Utilisateur</th>
           <th scope="col" id="header-cell"></th>
           <th scope="col" id="header-cell"></th>
        </tr>
        </thead>
      <tbody>
       <?php
            foreach($transaction as $t) {
                $id_code_status = $t["id_code"];
                ?>
                    <tr>
                        <td><?= $t["code"] ?></td>
                        <td><?= number_format($t["prix"] , 0, '.', ' '); ?></td>
                        <td><?= $t["nom"] ?></td>
                        <td>  
                            <a href="<?= site_url("controlleur_admin/accept_transaction?id_code_status=$id_code_status") ?>"><button class="btn btn-success"><i class="bi bi-check"></i></button></a>
                        </td>
                        <td>
                            <a href="<?= site_url("controlleur_admin/deny_transaction?id_code_status=$id_code_status") ?>"><button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                        </td>
                    </tr>
                <?php
            }
       ?>
           
        </tbody>
    </table>
  </div>
</main>