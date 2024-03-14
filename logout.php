<?php
include_once("include/factory.php");
Auth::logout();
header("Location: login.php");