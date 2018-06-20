<?php $this->title = "Jean Forteroche"; ?>

<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        // Declaring variables
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Calling the login function
        $usermanager = new UserManager();
        $logged = $usermanager->login($username, $password);
        if($logged == "Vous êtes maintenant connecté !"){
            header('location:index.php?action=');
        }
        else{
            $message = 'Identifiant ou mot de passe incorrect';
        }
    }
?>

<form action="index.php?action=loginpage" method="post">
    <div class="form-group">
        <?php if(isset($message)){echo $message;} ?>
    </div>
    <div class="form-group">
        <i class="fa fa-user"></i>
        <input type="text" class="form-control" name="username" id="username" <?php if(isset($username)) { ?>value="<?php echo $username; ?>"<?php } ?> placeholder="Identifiant" required/>
    </div>
    <div class="form-group">
        <i class="fa fa-lock"></i>
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required/>
    </div>
    <div class="form-group">
        <input type="checkbox" name="rememberMe" id="rememberMe"><label for="rememberMe">Se souvenir de moi</label><br>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary btn-block btn-lg" value="Se connecter" />
    </div>
    <p>
        Vous n'avez pas de compte ? <a href="index.php?action=signinpage">S'inscrire</a>
    </p>
</form>