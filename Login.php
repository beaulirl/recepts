<form action="Login.php" method="post">           
<h2>Login</h2>
<input type="text" id="email" class="form" placeholder="E-mail" name="e_mail"> 
<input type="password" id="passw" class="form" placeholder="Password" name="pasw"> 
<button type="submit" class="btn" name="login" >Login</button>                        
</form>
<?php require_once __DIR__ .'/vendor/autoload.php'; ?>