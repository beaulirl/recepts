<?php
session_start();
require_once __DIR__ .'/vendor/autoload.php';
$b = new MySqlConnection(ConfigurationManager::get('db_host'),ConfigurationManager::get('db_user'),
ConfigurationManager::get('db_passw'), ConfigurationManager::get('db_name'));
$b->SetConnection();
$b->SetTableName(ConfigurationManager::get('user'));
$user = new User($b);
if(isset($_POST['send'])){
$b->SetTableName(ConfigurationManager::get('db_tbname'));	
$a = new Dish($b);
$a->createDish($_POST["name"], $_POST["type"], $_POST["recept"], $_SESSION["mail"]);
$b->SetTableName(ConfigurationManager::get('db_tbname2'));
$f = new Ingredient($b);
$f->createIngredient($_POST["ingredient"], $_POST["fats"], $_POST["price"], $_POST["quantity"]);
$b->SetTableName(ConfigurationManager::get('pivot'));
$g = new Pivot($a, $f, $b);
$g->createPivotData();
$b->SetTableName(ConfigurationManager::get('pivot_user'));
$u = new PivotUser($user, $a, $b);
$cm = $user->getId($_SESSION["mail"]);
$u->createPivotUserData($cm);
}
if(isset($_POST['msg'])){
$b->SetTableName(ConfigurationManager::get('db_tbname'));		
$a = new Dish($b);	
function FormString($dish)
{
	$string = "";
	foreach ($dish as $f => $name) :
	$string .= $name."\n";
	endforeach;
	return $string;
}
$first = $a->getRandDish(Dish::FIRST_DISH);
$second = $a->getRandDish(Dish::SECOND_DISH);
$salad = $a->getRandDish(Dish::SALAD);
$desert = $a->getRandDish(Dish::DESERT);
$sum = $first['price'] + $second['price'] + $salad['price'] + $desert['price'];
echo FormString($first). "</br>" .FormString($second). "</br>" .FormString($salad). "</br>" .FormString($desert). "</br>". $sum;
}


if(isset($_POST["submit"]))
{
    $user->createUser($_POST["username"], $_POST["passw"], $_POST["email"]);
    header('Location: index.php');
}
if(isset($_POST["login"]))
{
	$value = $user->findUser($_POST["e_mail"], $_POST["pasw"]);
	if(is_int($value))
	{
		$_SESSION["mail"] = $_POST["e_mail"];
        header('Location: index.php/');
	}
	else echo "Такой пользователь не зарегестрирован";
}