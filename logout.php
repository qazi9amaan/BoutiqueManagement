<?php
require_once 'libraries/config/config.php';
session_start();
session_destroy();

header('Location:index.php');
exit;

 ?>