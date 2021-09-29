<?php
session_start();
logout();
function logout() {
    session_destroy();
    header("Location: login.php");
}
?>