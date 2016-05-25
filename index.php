<?php require_once __DIR__ .'/vendor/autoload.php';?>
<link href="style.css" rel="stylesheet">
 <script src="app.js"></script>
<form action="index.php" method="post" >           
<h2>Какие блюда вы готовите?</h2>
<input id="name" type="text" placeholder="Название" name="name">
 <p><select  multiple name="type">
    <option disabled>Выберите тип</option>
    <?php $types = require('dish_type_dict.php');
    foreach($types as $type => $v): ?>
    <option value="<?php echo $type; ?>"><?= $v ?></option>
    <?php endforeach; ?>
   </select></p>
<input id="recept" type="text" placeholder="Ссылка на рецепт" name="recept">
<ul class="posts">
<li><input id="ingredient" type="text" placeholder="Ингредиент" name="ingredient"></li>
<li><input id="fats" type="text" placeholder="Жирность" name="fats"></li>
<li><input id="quantity" type="text" placeholder="Количество" name="quantity"></li>
<li><input id="price" type="text" placeholder="Цена" name="price"></li>

</ul>

<button type="submit" name="send">Отправить</button>                        
<button type="submit" name="msg">На этой неделе</button>
</form>

<form action="Registration.php">
    <input type="submit" name="reg" value="Регистрация">
</form>
<form action="Login.php" method="post">
    <input type="submit" name="log" value="Авторизация">
</form>

