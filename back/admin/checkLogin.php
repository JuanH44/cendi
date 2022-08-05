<?php
session_start();

if (!isset($_SESSION['user'])) {
	header('Location: ../../front/html/login.html');
}
?>