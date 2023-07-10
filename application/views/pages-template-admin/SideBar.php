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
      <a class="nav-link collapsed" href="<?php echo site_url('Controlleur_admin/vers_AddEntrainement'); ?>">
      <i class="bi bi-plus-circle"></i>
  <span>Entrainement</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo site_url('controlleur_user/index'); ?>">
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
