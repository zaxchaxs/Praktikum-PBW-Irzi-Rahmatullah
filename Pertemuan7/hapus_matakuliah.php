<?php
include 'db.php';
$kodemk = $_GET['kodemk'];
$conn->query("DELETE FROM matakuliah WHERE kodemk='$kodemk'");
header("Location: index.php");
?>