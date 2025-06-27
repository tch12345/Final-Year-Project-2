<?php
require "Config/session.php";

$_SESSION = array();
session_destroy();

header("Location: index.php"); // 或 index.php，看你需要
exit;