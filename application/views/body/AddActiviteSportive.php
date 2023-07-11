<main id="main" class="main">
  
<section class="section">
      <div class="row">
        

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Activite Sportive</h5>

              <!-- Vertical Form -->
              <form action="<?php echo site_url('Controlleur_sport/traitement_ajout_activite'); ?>" class="row g-3 needs-validation" novalidate method="post">
                <div class="col-12">
                  <div></div>
                  <input type="text" class="form-control" name="nom_activite" id="nom_activite" placeholder="Nom activité" required>
                </div>
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