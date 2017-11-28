<?php
session_start();
if ($_SESSION['uname']) include ("main.htm");
else echo 'please come through login';
?>