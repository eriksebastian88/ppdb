<?php
// session_start();
if(!isset($_SESSION['username'])){
    echo '<script language="javascript">alert("Anda harus login dulu!");document.location="login";</script>';
}
?>