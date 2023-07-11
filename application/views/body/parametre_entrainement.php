<main id="main" class="main">

  <section class="section">
    <div class="row">

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Entrainement Parametrer</h5>

            <!-- Vertical Form -->
            <form action="<?php echo site_url('Controlleur_parametrer/traitement_ajout_parametrer'); ?>" class="row g-3 needs-validation" novalidate method="post">
              <div class="col-12">
                <label for="inputPoids1" class="form-label">Poids 1</label>
                <input type="text" class="form-control" id="Poids1" name="poids1">
              </div>
              <div class="col-12">
                <label for="inputPoids2" class="form-label">Poids 2</label>
                <input type="text" class="form-control" id="Poids2" name="poids2">
              </div>
              <div class="col-12">
                <label for="inputTaille1" class="form-label">Taille 1</label>
                <input type="text" class="form-control" id="Taille1" name="taille1">
              </div>
              <div class="col-12">
                <label for="inputTaille2" class="form-label">Taille 2</label>
                <input type="text" class="form-control" id="Taille2" name="taille2">
              </div>

            <div class="col-12">
            <label class="">Objectif</label>
              
                    <select  class="form-select" name="id_objectif">
                        <?php
                            foreach ($objectifs as $objectif) 
                        { 
                        ?>
                            <option value="<?= $objectif['id_objectif'] ?>">
                                <?= $objectif['nom_objectif'] ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                
                </div>
            <div class="col-12">
            <label class=""> Genre:</label>
                    <select class = "form-select" name="id_genre">
                        <?php
                            foreach ($genre as $genres) 
                        { 
                        ?>
                            <option value="<?= $genres['id_genre'] ?>">
                                <?= $genres['genre'] ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-12">
                <label class=""> Type Entrainement : </label> 
                    <select class = "form-select" name="id_type_entrainement">
                        <?php
                            foreach ($type_entrainement as $type_entrainements) 
                        { 
                        ?>
                            <option value="<?= $type_entrainements['id_type_entrainement'] ?>">
                                <?= $type_entrainements['type_entrainement'] ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                
                <div class="col-12">
                <label class=""> Nom regime :  </label>   
                    <select class = "form-select" name="id_regime">
                        <?php
                            foreach ($regime as $regimes) 
                        { 
                        ?>
                            <option value="<?= $regimes['id_regime'] ?>">
                                <?= $regimes['nom_regime'] ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
              <div class="col-12">
                <label for="inputEstimation" class="form-label">Estimation</label>
                <input type="text" class="form-control" id="Estimation" name="estimation">
              </div>
           
           </div>
              </fieldset>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">valider</button>
              </div>
            </form><!-- Vertical Form -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>
