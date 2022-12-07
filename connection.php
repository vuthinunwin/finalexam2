<?php
session_start();
$username = "";
$email    = "";
$errors = array();
$id = "";
$db = mysqli_connect('localhost', 'root', '', 'final2');
