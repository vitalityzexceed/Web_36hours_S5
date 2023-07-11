<main id="main" class="main">
  
<section class="section">
      <div class="row">
        

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">REGIME</h5>

              <!-- Vertical Form -->
              <form action="<?php echo site_url('controlleur_regime/traitement_ajout_regime'); ?>" class="row g-3 needs-validation" novalidate method="post">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Nom Regime</label>
                  <input type="text" class="form-control" id="Nom" name="nom">
                </div>
                <div></div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label pt-0">Elements à inclure : </legend>
                  <div class="col-sm-10">
                    <?php
                      foreach ($listeelements as $element) 
                      { 
                    ?>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="elementstoinclude[]" id="gridRadios1" value="<?= $element['id_element'] ?>">
                        <label class="form-check-label" for="gridRadios1">
                          <?= $element['nom_element'] ?>
                        </label>
                      </div>
                    <?php
                      }
                    ?>
                  </div>
                </fieldset>
                <div class="text-center">
                  <button type="reset" class="btn btn-secondary">annuler</button>
                  <button type="submit" class="btn btn-primary">valider</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>

          

          

        </div>
      </div>
    </section>
</main>