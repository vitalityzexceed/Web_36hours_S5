<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inscription</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href=" <?= base_url('assets/img/logo.png') ?>" rel="icon">

  <link href=" <?= base_url('assets/img/logo.png') ?>" rel="apple-touch-icon">
  
  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?php echo site_url('home'); ?>" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="">
                  <span class="d-none d-lg-block">KOTRANA</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Creer votre compte</h5>
                    <p class="text-center small">Entrer vos information Personnelle </p>
                  </div>

                  <form action="<?php echo site_url('controlleur_user/traitement_inscription_client'); ?>" class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Votre Nom Utilisateur</label>
                      <input type="text" name="nom" class="form-control" id="yourName" value="wenzel" required>
                      <div class="invalid-feedback">veuillez entrer Votre Nom Utilisateur!</div>
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Votre Mot de Passe</label>
                      <input type="password" name="mdp" class="form-control" id="mdp" value="wenzel" required>
                      <div class="invalid-feedback">veuillez entrer Votre Mot de Passe!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Votre Email</label>
                      <input type="email" name="mail" class="form-control" id="yourEmail" value="wenzel@gmail.com" required>
                      <div class="invalid-feedback">Veuillez entrer  Votre Email!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourDateOfBirth" class="form-label">Date de naissance</label>
                      <input type="date" name="dtn" class="form-control" id="yourDateOfBirth" value="2003-07-10" required>
                      <div class="invalid-feedback">Veuillez entrer votre date de naissance!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourGender" class="form-label">Genre</label>
                      <select class="form-select" id="yourGender" name="genre">
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for="yourHeight" class="form-label">Longueur en cm</label>
                      <input type="number" name="taille" class="form-control" id="yourHeight" value="170" required>
                      <div class="invalid-feedback">Veuillez  entrer Votre  Taille!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourWeight" class="form-label">Poids en Kg</label>
                      <input type="number" name="poids" class="form-control" id="yourWeight" value="62" required>
                      <div class="invalid-feedback">Veuillez entrer votre Poids!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Creer le Compte</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Vous avez deja un Compte? <a href="<?php echo site_url('controlleur_user/vers_login_client'); ?>">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
