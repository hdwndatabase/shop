<?php
session_start();
$_SESSION['cart'] = array();
var_dump(isset($_SESSION['cart']));