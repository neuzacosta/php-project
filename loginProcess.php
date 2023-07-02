<?php
include 'db.php';
include 'includes/header.php';
include 'includes/script.php';
include 'includes/footer.php';
session_start();
$username = $_POST['username'];
$psw = $_POST['psw'];
// BINARY -> MySQL queries não são case-sensitive por defeito. 
$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and BINARY psw='$psw'");
$row = mysqli_fetch_array($result);
if (is_array($row)) {
    header("Location: hm.php");
} else {
    echo '<script language="javascript">';
    echo 'alert("Username ou Password inválidos.");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
}
?>