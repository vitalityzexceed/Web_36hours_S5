<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    $this->load->view("pages-template-admin/Header");
    $this->load->view("body/$pages");
    $this->load->view("pages-template-admin/SideBar");
    $this->load->view("pages-template-admin/footer");
?>