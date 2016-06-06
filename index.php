<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recepts</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
<?php
require_once __DIR__ .'/vendor/autoload.php';?>
  <div class="container-fluid">
   <div class="row">
    <?php
    if (isset($_SESSION["mail"])) {
    ?>
   </div>
  </div>
  <nav class="navbar navbar-default" role="navigation">
   <div class="container-fluid">
    <div class="navbar-header">   
     <a href="/?out=1" class="btn btn-default navbar-btn navbar-right">Выход</a>
     <p class="navbar-text">Вы зашли как <?php echo $_SESSION["mail"]; ?></p>
    </div> 
   </div>
  </nav>
  <div class="container">
   <div class="row">
    <div class="col-md-4">
     <h2>Какие блюда вы готовите?</h2>
      <form action="index.php" method="post" >           
       <div class="input-group input-group-lg">
        <input type="text" class="form-control" placeholder="Название" name="name">
       </div>
  <hr>
       <div class="form-group">    
        <select class="form-control" multiple name="type">
         <option disabled>Выберите тип</option>
         <?php $types = require('dish_type_dict.php');
         foreach($types as $type => $v): ?>
         <option value="<?php echo $type; ?>"><?= $v ?></option>
         <?php endforeach; ?>
        </select>
       </div>
  <hr>
       <div class="input-group">
        <input type="text" class="form-control" id="recept" placeholder="Ссылка на рецепт" name="recept">
       </div>
  <hr>
       <div class="input-group col-md-4">
        <input class="form-control" id="ingredient" type="text" placeholder="Ингредиент" name="ingredient"></li>
        <input class="form-control" id="fats" type="text" placeholder="Жирность" name="fats"></li>
        <input class="form-control" id="quantity" type="text" placeholder="Количество" name="quantity"></li>
        <input class="form-control" id="price" type="text" placeholder="Цена" name="price"></li>
       </div>
            <button class="btn btn-default" type="submit" name="send">Отправить</button>           
    </div>
    <div class="col-md-4">
     <h2>Что приготовить?</h2>
     <button type="submit" id="week" class="btn btn-success btn-lg" name="msg" >На этой неделе</button>
     <hr>
     <div class="row">
      <p><?php if (isset($form_string)) echo $form_string; ?></p>
     </div>
    </div>
      </form> 
    <div class="col-md-4">
     <h2>Все мои рецепты:</h2>
     <?php if (isset($recepts_array)) { $recepts = $recepts_array;
     foreach($recepts as $type): ?>
     <p><?php echo $type; ?></p>
     <?php endforeach; } ?>
    </div>
   </div>
            
<?php
if (isset($_GET['out']) && $_GET['out'] == 1) {
   header('Location: index.php/out=1');
   session_unset();
   header('Location: index.php');
 }   
} 
 else {
?>

<form role="form" action="Registration.php" method="post">
<div class="form-group">    
  <input class="btn btn-lg btn-success" type="submit" name="reg" value="Регистрация"> 
</div>
</form>
<form role="form" action="Login.php" method="post">
<div class="form-group">   
  <input class="btn btn-lg btn-primary" type="submit" name="log" value="Авторизация">
</div>  
</form>

<?php } ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="app.js"></script>
  </body>
</html>

