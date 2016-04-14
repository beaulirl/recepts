<?php
require_once("ConfigurationManager.php");
require_once("MySqlConnection.php");
require_once("Dish.php");
require_once("Ingredient.php");
require_once("Pivot.php");
$b = new MySqlConnection(ConfigurationManager::get('db_host'),ConfigurationManager::get('db_user'),
ConfigurationManager::get('db_passw'), ConfigurationManager::get('db_name'));
$b->SetConnection();

//$c = new MySqlConnection(ConfigurationManager::get('db_host'),ConfigurationManager::get('db_user'),
//ConfigurationManager::get('db_passw'), ConfigurationManager::get('db_name'),ConfigurationManager::get('db_tbname2'));
//$c->SetConnection();

if(isset($_POST['send'])){
$b->SetTableName(ConfigurationManager::get('db_tbname'));	
$a = new Dish($b);
$a->createDish($_POST["name"], $_POST["type"], $_POST["recept"]);
$b->SetTableName(ConfigurationManager::get('db_tbname2'));
$f = new Ingredient($b);
$f->createIngredient($_POST["ingredient"], $_POST["fats"], $_POST["price"], $_POST["quantity"]);
$b->SetTableName(ConfigurationManager::get('pivot'));
$g = new Pivot($a, $f, $b);
$g->createPivotData();
}
if(isset($_POST['msg'])){
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
