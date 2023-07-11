<!-- Sidebar -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Pages</li>


    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo site_url('Controlleur_admin/vers_ListeRegime'); ?>">
      <i class="bi bi-list-ul"></i>
        <span>Liste regime</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo site_url('Controlleur_admin/vers_ListeElement'); ?>">
        <i class="bi bi-list-ol"></i>
       <span>Liste Element</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo site_url('Controlleur_admin/vers_AddActivite'); ?>">
      <i class="bi bi-plus-circle"></i>
  <span>Ajout Activite sportive</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo site_url('Controlleur_admin/vers_AddTypeEntrainement'); ?>">
      <i class="bi bi-plus-circle"></i>
  <span>Ajout type d'entraînement</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo site_url('Controlleur_admin/vers_AddEntrainementActivite'); ?>">
      <i class="bi bi-plus-circle"></i>
  <span>Ajout Entrainement-Activité</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo site_url('Controlleur_admin/transaction'); ?>">
      <i class="bi bi-plus-circle"></i>
      <span>Transaction</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo site_url('controlleur_user/deconnexion'); ?>">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Logout</span>
      </a>
    </li>

  </ul>
</aside>
<!-- End Sidebar -->

<!-- Template Main JS File -->
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</body>

</html>
