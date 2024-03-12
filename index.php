<?php
include_once("include/factory.php");

if(!Auth::isAuthenticated()){
    header( "location: login.php");
    exit();
}