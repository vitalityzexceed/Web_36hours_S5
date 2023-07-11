<main id="main" class="main">
  
<section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Entraînement & Activité</h5>
              <!-- Vertical Form -->
                <form action="<?php echo site_url('Controlleur_sport/traitement_insertion_entrainement_activite'); ?>" class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-12">
                        <label for="idtype" class="form-label">Type d'entrainement</label>
                        <select name="id_type_entrainement">
                            <?php
                                foreach ($typesentrainement as $typeentrainement) 
                                { 
                            ?>
                                <option value="<?= $typeentrainement['id_type_entrainement'] ?>">
                                    <?= $typeentrainement['type_entrainement'] ?>
                                </option>
                            <?php
                                }
                            ?>  
                        </select>
                    </div>
                    <div class="col-12">
                    <label for="idtype" class="form-label">Activité sportive</label>
                        <select name="id_activite_sportif">
                            <?php
                                foreach ($activitessportif as $activitesportif) 
                                { 
                            ?>
                                <option value="<?= $activitesportif['id_activite_sportif'] ?>">
                                    <?= $activitesportif['nom_activite'] ?>
                                </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <select name="id_genre">
                            <?php
                                foreach ($genres as $genre) 
                                { 
                            ?>
                                <option value="<?= $genre['id_genre'] ?>">
                                    <?= $genre['genre'] ?>
                                </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="type" class="form-label">Nb répétitions</label>
                        <input type="number" min="0" max="100" class="form-control" id="nb_repetition" name="nb_repetition">
                    </div>
                    <div class="col-12">
                        <label for="type" class="form-label">Nb séances</label>
                        <input type="number" min="0" max="100" class="form-control" id="nb_seances" name="nb_seances">
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