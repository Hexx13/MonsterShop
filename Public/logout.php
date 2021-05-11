<?php
 $_SESSION = null;
 session_destroy();
 header("location: login.php");
?>
