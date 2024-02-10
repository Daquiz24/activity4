<?php
session_start();
session_unset();
session_destroy();

header("refresh:2;url=../index.php"); // Redirect after 2 seconds
exit();
?>
