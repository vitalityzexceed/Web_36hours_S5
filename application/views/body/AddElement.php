<main id="main" class="main">
  
<section class="section">
      <div class="row">
        

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Element</h5>

              <!-- Vertical Form -->
              <form action="<?= site_url("controlleur_admin/ajout_element") ?>" class="row g-3 needs-validation" novalidate method="post">

                <div class="col-12">
                  <label for="Nom" class="form-label">Nom de l'Element</label>
                  <input type="text" class="form-control" id="Nom" name ="nom">
                </div>
                <div class="col-12">
                  <label for="Prix" class="form-label">Prix de l'Element </label>
                  <input type="text" class="form-control" id="Prix" name="prix">
                </div>
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