
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
    <?php require_once __DIR__ .'/vendor/autoload.php';
    if (isset($_GET['out']) && $_GET['out'] == 1) {
        session_unset();
        header('Location: index.php');
    }   
    
    if (isset($_SESSION["mail"])) { ?>


    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">   
                <a href="/?out=1" class="btn btn-default navbar-btn navbar-right">Exit</a>
                <p class="navbar-text">You login as <?php echo $_SESSION["mail"]; ?></p>
            </div> 
        </div>
    </nav>    
    <?php }  
    else { ?>
    <nav class="navbar navbar-default" role="navigation">
        <div id="navbar" class="navbar-collapse collapse">        
            <ul class="nav navbar-nav navbar-right">
                <li><a type="button" data-toggle="modal" data-target="#loginModal">
                    <span class="glyphicon glyphicon-log-in"></span> Login</a>
                </li>
            </ul>
        </div>
    </nav>
<?php } ?> 
    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login </h4>
            </div>
            <div class="modal-body">
            <form class="form-inline" action="index.php" method="post">
                <div class="form-group">
                    <label class="sr-only" for="email">Email adress</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="e_mail">
                </div> 
                <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="password" name="pasw"> 
                </div>
                <button type="submit" class="btn btn-primary btn-sm" name="login">Sign in</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>What are you cooking?</h2>
                <form action="index.php" method="post" >           
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    <hr>
                    <div class="form-group">    
                        <select class="form-control" multiple name="type">
                            <option disabled>Choose a tipe</option>
                            <?php $types = require('dish_type_dict.php');
                            foreach($types as $type => $v): ?>
                            <option value="<?php echo $type; ?>"><?= $v ?></option>
                            <?php endforeach; ?>
                       </select>
                    </div>
                    <hr>
                    <div class="input-group">
                        <input type="text" class="form-control" id="recept" placeholder="Link" name="recept">
                    </div>
                    <hr>
                    <div class="input-group col-md-4">
                        <input class="form-control" id="ingredient" type="text" placeholder="Ingredient" name="ingredient"></li>
                        <input class="form-control" id="fats" type="text" placeholder="Fat" name="fats"></li>
                        <input class="form-control" id="quantity" type="text" placeholder="Quantity" name="quantity"></li>
                        <input class="form-control" id="price" type="text" placeholder="Price" name="price"></li>
                    </div>
                    <button class="btn btn-default" type="submit" name="add">Add</button>
                    <hr>
                    <button class="btn btn-default" type="submit" name="send">Send</button>           
            </div>

            <div class="col-md-4">
                <h2>What can I cook?</h2>
                <button type="submit" id="week" class="btn btn-success btn-lg" name="msg" >This week</button>
                <hr>
                <div class="row">
                    <p><?php if (isset($form_string)) echo $form_string; ?></p>
                </div>
            </div>
                </form> 

            <div class="col-md-4">
                <h2>All my recepies:</h2>
                <?php if (isset($recepts_array)) { $recepts = $recepts_array;
                foreach($recepts as $type): ?>
                <p><?php echo $type; ?></p>
                <?php endforeach; } ?>
            </div>
    </div>
            
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="app.js"></script>
</body>

</html>

