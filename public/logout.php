<?php
require_once('./vendor/autoload.php');
require_once('./functions.php');
session_start(); //important section

unset($_SESSION['logged_in']);
header("location: index.php");