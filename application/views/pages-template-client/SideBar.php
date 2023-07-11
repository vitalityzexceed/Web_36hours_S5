<!-- Sidebar -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      
      <a class="nav-link collapsed" href="<?= site_url("controlleur_client/vers_Planning");?>">
      <i class="bi bi-grid"></i>
         <span>Planning</span>
      </a>
    </li>
    <li>
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="<?php echo site_url('controlleur_client/listeCode'); ?>">
          <i class="bi bi-menu-button-wide"></i><span>Inserer Code</span></i>
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
