<?php
require_once("ConfigurationManager.php");
require_once("MySqlConnection.php");
require_once("User.php");

if(isset($_POST["submit"]))
{
    $connect = new MySqlConnection(ConfigurationManager::get('db_host'),ConfigurationManager::get('db_user'),
    ConfigurationManager::get('db_passw'), ConfigurationManager::get('db_name'));
    $connect->SetConnection();
    $connect->SetTableName(ConfigurationManager::get('user'));
    $user = new User($connect);
    $user->createUser($_POST["username"], $_POST["passw"], $_POST["email"]);
}