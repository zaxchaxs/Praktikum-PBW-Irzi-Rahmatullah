<?php
// clear.php - Pembersihan Data Session
session_start();
session_destroy();
header("Location: index.php");
exit();
?>