<form action="Registration.php" method="post">           
<h2>Signup</h2>
<input type="text" id="uname" class="form" placeholder="Username" name="username">
<input type="text" id="email" class="form" placeholder="E-mail" name="email">  
<input type="password" id="passw" class="form" placeholder="Password" name="passw">
<input type="password" id="cpassw" class="form" placeholder="Confirm password" name="cpassw">
<input type="hidden" name="sbmt" />
<button type="submit" class="btn" name="submit" >Signup</button>                        
</form>
<?php require_once("main.php"); ?>