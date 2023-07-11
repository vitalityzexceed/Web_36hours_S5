<main id="main" class="main">
  

<!-- Résultat Planning -->
<div class="card">
  <div class="card-body">
    <form action="<?php echo site_url('controlleur_client/demandeCode'); ?>" method="post">
        
            <div class="card-body">
            <div class="">
                <div class="">
                <label for="inputNumber" class="">Code</label>
                <div class="col-sm-10">
                    <input type="test" class="form-control" name = "code" required>
                </div>
                </div>
            <br>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Valider</button>
            </div>
            <br>
            <?php
            if(isset($_GET["error"])){
                ?>
                    <button class="btn btn-danger" ><?= $_GET["error"] ?></button>
                <?php
            }

            if(isset($_GET["succes"])){
                ?>
                    <button class="btn btn-success" >En attente de transaction</button>
                <?php
            }
        ?>
    </form>
    <h5 class="card-title">Tous les code</h5>
    <!-- Tableau avec bordure -->
    <table class="table table-bordered  table-striped">
      <thead>
        <tr>
           <th scope="col" id="header-cell">Code</th>
           <th scope="col" id="header-cell">Prix</th>
        </tr>
        </thead>
      <tbody>
        <?php
        foreach($all_code as $code) {
            ?>
                 <tr>
                    <td><?= $code["code"] ?> </td>
                    <td class="text-end"><?=  number_format($code["prix"], 0, '.', ' '); ?></td>
                </tr>
            <?php
        }
        ?>
       

        </tbody>
    </table>
  </div>
</main>