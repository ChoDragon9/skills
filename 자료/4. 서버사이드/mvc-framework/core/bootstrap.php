<?php
session_start();

// Load Core
include('./core/db.php');
include('./core/router.php');

// Load Config
include('./config/routes.php');

// Run Controller
include('./core/controller.php');
?>