<?php
include 'db.php';
$npm = $_GET['npm'];
$conn->query("DELETE FROM mahasiswa WHERE npm='$npm'");
header("Location: index.php");
?>