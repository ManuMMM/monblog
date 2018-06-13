<?php $this->title = "Jean Forteroche"; ?>

<?php
    // Checking if we have $_POST values availaible
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordConfirmation']) && isset($_POST['email'])){
        // Declaring variables (trimming the username & the email)
        $username = $_POST['username'];
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $passwordConfirmation = $_POST['passwordConfirmation'];
        // Checking if the email is correct
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
            // Check that pass & passconfirmation are the same
            if($password == $passwordConfirmation) {
                // Checking if the username is unique
                $usermanager = new UserManager();
                $checked = $usermanager->validUsername($username);
                if($checked){
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $user = new User(array('username' => $username, 'passwordHash' => $passwordHash, 'email' => $email));
                    $usermanager->signin($user);
                    header('location:index.php?action=loginpage');
                }
                else {
                    $message = 'Cet identifiant est déjà utilisé';
                    $username = NULL;
                    $_SESSION['focus']['username'] = true;
                }
            }
            else {
                $message = 'Vos mots de passe ne sont pas identique.';
                $password = NULL;
                $_SESSION['focus']['password'] = true;
            }
        } else {
            $message = 'Votre adresse e-mail n\'est pas valide.';
            $email = NULL;
            $_SESSION['focus']['email'] = true;
        }
        
        // Set the autofocus to the first element which needs to be corrected and unset the others
        if(isset($_SESSION['focus'])){
            if($_SESSION['focus']['username']){
                $_SESSION['focus']['password'] = FALSE;
                $_SESSION['focus']['passwordConfirmation'] = FALSE;
                $_SESSION['focus']['email'] = FALSE;
            }
            elseif ($_SESSION['focus']['password']){
                $_SESSION['focus']['passwordConfirmation'] = FALSE;
                $_SESSION['focus']['email'] = FALSE;
            }
            else {
                $_SESSION['focus']['email'] = FALSE;
            }
        }
    }
?>
<?php
    if(isset($message)){
        echo $message;
    }
?>

<form action="index.php?action=signinpage" method="post">
    <p>
        <input type="text" name="username" id="username" <?php if(isset($username)) { ?>value="<?php echo $username; ?>"<?php } ?> placeholder="Identifiant" <?php if($_SESSION['focus']['username']) { ?> autofocus <?php } ?> required/><br>
        <input type="password" name="password" id="password" <?php if(isset($password)) { ?>value="<?php echo $password; ?>"<?php } ?> placeholder="Mot de passe" <?php if($_SESSION['focus']['password']) { ?> autofocus <?php } ?> required/><br>
        <input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Confirmation du mot de passe" <?php if($_SESSION['focus']['passwordConfirmation']) { ?> autofocus <?php } ?> required/><br>
        <input type="text" name="email" id="email" pattern="^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$" <?php if(isset($email)) { ?>value="<?php echo $email; ?>"<?php } ?> placeholder="Email" <?php if($_SESSION['focus']['email']) { ?> autofocus <?php } ?> required/><br><br>
        <input type="submit" value="S'inscrire" />
    </p>
    <p>
        Déja inscrit ? <a href="index.php?action=loginpage">Se connecter</a>
    </p>
</form>
