<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login Client</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
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
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="">
                  <span class="d-none d-lg-block">KOTRANA</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small">Entrer votre nom utilisateur & mot de passe</p>
                  </div>

                  <form action="<?php echo site_url('controlleur_user/traitement_connexion_client'); ?>" class="row g-3 needs-validation" novalidate method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nom utilisateur</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nom" class="form-control" id="yourUsername" value="jean" required>
                        <div class="invalid-feedback">Veuillez entrer votre nom utilisateur.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">mot de passe</label>
                      <input type="password" name="pswd" class="form-control" id="yourPassword" value="jean123" required>
                      <div class="invalid-feedback">Veuillez entrer votre mot de passe!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
              
                    <div class="col-12">
                      <p class="small mb-0">Pas de Compte? <a href="<?php echo site_url('controlleur_user/vers_inscription_client'); ?>">Creer votre Compte</a></p>
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


</body>

</html>
