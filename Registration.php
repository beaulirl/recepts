<link href="css/bootstrap.min.css" rel="stylesheet">
<form role="form" class="form-horizontal" action="Registration.php" method="post">    
<div class="container">        
<h2>Регистрация</h2>
<div class="form-group">	
  <input type="text" id="uname" class="form-control" placeholder="Username" name="username">
</div>  
<div class="form-group">	
  <input type="text" id="email" class="form-control" placeholder="E-mail" name="email">  
</div>  
<div class="form-group">	
  <input type="password" id="passw" class="form-control" placeholder="Password" name="passw">
</div>  
<div class="form-group">	
  <input type="password" id="cpassw" class="form-control" placeholder="Confirm password" name="cpassw">
</div>
<div class="form-group">	
  <button type="submit" class="btn btn-info" name="submit" >Signup</button> 
</div>                         
</form>
</div>  
<?php require_once __DIR__ .'/vendor/autoload.php'; ?>