<link href="css/bootstrap.min.css" rel="stylesheet">
<form role="form" class="form-horisontal" action="Login.php" method="post">
<div class="container"> 
<h2>Авторизация</h2>       
<div class="form-group">	
  <label class="sr-only" for="exampleInputEmail1">Email</label>
  <input type="text" id="email" class="form-control" placeholder="E-mail" name="e_mail">
</div>
<div class="form-group">	
  <label class="sr-only" for="exampleInputPassword1">Пароль</label>	
  <input type="password" id="passw" class="form-control" placeholder="Password" name="pasw">
</div>
<div class="form-group">
   <button type="submit" class="btn btn-info" name="login" >Войти</button>   
</div>                     
</form>
</div>  
<?php require_once __DIR__ .'/vendor/autoload.php'; ?>