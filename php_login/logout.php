<?php
require_once 'includes/session.php';

startSecureSession();
logout();

header('Location: login.php');
exit;
