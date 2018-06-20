<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- Latest compiled JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="Content/style.css" />
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script>
            tinymce.init({
                selector: '#txtPost',
                setup: function (editor) { editor.on('change', function () { editor.save(); }); },
                plugins: "wordcount",
                branding: false
            }); 
        </script>
        <script>
            // AJAX for signin & login
            $(document).ready(function(){
                $("#loginForm").on("submit", function(event){
                    event.preventDefault();
                    username = $(this).find("input[name=username]").val();
                    password = $(this).find("input[name=password]").val();
                    usernameInput = $(this).find("input[name=username]");
                    passwordInput = $(this).find("input[name=password]");
                    url = $(this).attr("action");
                    if(username.trim() != '' && password.trim() != ''){
                        $.post(url,{username:username,password:password}, function(data){
                            if(data.state == "success"){
                                $("#closeLogin").click();
                                $("#loginState").html('<li class="nav-item"><div class="btn btn btn-outline-primary mr-2"><i class="fa fa-user"></i> ' + username + '</div></li>');
                                $("#loginState").append('<a class="btn btn-outline-primary mr-2" href="index.php?action=logout">Se déconnecter</a>');
                                $("#footerBlog").append('<a href="index.php?action=admin">Admin</a>');
                                $("#messageSuccess").html(data.return).fadeIn().delay(5000).fadeOut();
                            }else{
                                alert("Echec" + data.return);
                            }
                        }, "json");
                    }else{
                        if(username.trim() == ''){
                            usernameInput.after("Veuillez renseigner l'identifiant");
                        }else{
                            passwordInput.after("Veuillez renseigner le mot de passe");
                        }
                    }
                });
                $("#signinForm").on("submit", function(event){
                    event.preventDefault();
                    username = $(this).find("input[name=username]").val();
                    password = $(this).find("input[name=password]").val();
                    passwordConfirmation = $(this).find("input[name=passwordConfirmation]").val();
                    email = $(this).find("input[name=email]").val();
                    usernameInput = $(this).find("input[name=username]");
                    passwordInput = $(this).find("input[name=password]");
                    passwordConfirmationInput = $(this).find("input[name=passwordConfirmation]");
                    emailInput = $(this).find("input[name=email]");
                    url = $(this).attr("action");
                    if(username.trim() != '' && password.trim() != '' && passwordConfirmation.trim() != '' && email.trim() != ''){
                        $.post(url,{username:username,password:password,passwordConfirmation:passwordConfirmation,email:email}, function(data){
                            if(data.state == "success"){
                                $("#closeSignin").click();
                                $("#messageSuccess").html(data.return).fadeIn().delay(5000).fadeOut();
                            }else{
                                alert("Echec" + data.return);
                            }
                        }, "json");
                    }else{
                        if(username.trim() == ''){
                            usernameInput.after("Veuillez renseigner votre identifiant");
                        }else if(password.trim() == ''){
                            passwordInput.after("Veuillez renseigner votre mot de passe");
                        }else if(passwordConfirmation.trim() == ''){
                            passwordConfirmationInput.after("Veuillez renseigner votre mot de passe");
                        }else{
                            emailInput.after("Veuillez renseigner votre email");
                        }
                    }
                });
            });
        </script>
        <title><?= $title ?></title>   <!-- Specific element -->
    </head>
    <body>
        <!-- #global -->
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titleBlog">Jean Forteroche</h1></a><?php if(isset($_SESSION['session']['username'])){ echo $_SESSION['session']['username'].' '; ?> <a href="index.php?action=logout">Se déconnecter</a> <?php } else {?> <a href="index.php?action=loginpage">Se connecter</a> <?php } ?>
                <p>Bienvenue sur mon modeste blog.</p>
            </header>
            <!-- Navigation bar -->
            <nav id="navigationMenu" class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" role="navigation">
                <a class="navbar-brand" href="index.php"><img src="Content/images/writepen.jpg" id="logo" alt="Billet simple pour l'Alaska"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav mr-auto">
                        <li></li>
                    </ul>                    
                    <ul class="navbar-nav" id="loginState">
                        <?php if(isset($_SESSION['session']['username'])){ ?>
                        <li class="nav-item"><div class="btn btn btn-outline-primary mr-2"><i class="fa fa-user"></i> <?php echo $_SESSION['session']['username'] ?></div></li>
                        <?php } ?>
                        <li class="nav-item">                                
                            <!-- Shows username if logged otherwise shows the button to trigger the modalLogin -->
                            <?php if(isset($_SESSION['session']['username'])){?> <a class="btn btn-outline-primary mr-2" href="index.php?action=logout">Se déconnecter</a> <?php } else {?> <button type="button" class="btn btn-outline-primary mr-2" data-toggle="modal" data-target="#modalLogin">Se connecter</button> <?php } ?>
                        </li>
                    </ul>
                </div>
            </nav><!-- End Navigation bar -->
            <!-- #globalMargin -->
            <div id="globalMargin">
                <div id="content">
                    <!-- Modal Log In -->
                    <div id="modalLogin" class="modal fade">
                        <div class="modal-dialog modal-login">
                            <div class="modal-content">
                                <div class="modal-header">				
                                    <h4 class="modal-title">Connexion Membre</h4>
                                    <button id="closeLogin" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="loginForm" action="index.php?action=login" method="post">
                                        <div class="form-group">
                                            <i class="fa fa-user"></i>
                                            <input type="text" class="form-control" name="username" placeholder="Identifiant" required="required">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-lock"></i>
                                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required="required">					
                                        </div>
                                        <div class="form-group">
                                            <label for="rememberMe"><input type="checkbox" name="rememberMe" id="rememberMe"> Se souvenir de moi</label><br>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block btn-lg" id="submitLogin" value="Se connecter">
                                        </div>
                                    </form>				

                                </div>
                                <div class="modal-footer">
                                    <p>Vous n'avez pas de compte ?</p>
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal"  data-toggle="modal" data-target="#modalSignin">S'inscrire</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Modal Log In -->
                    <!-- Modal Sign In -->
                    <div id="modalSignin" class="modal fade">
                        <div class="modal-dialog modal-login">
                            <div class="modal-content">
                                <div class="modal-header">				
                                    <h4 class="modal-title">Inscription</h4>
                                    <button id="closeSignin" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="signinForm" action="index.php?action=signin" method="post">
                                        <div class="form-group">
                                            <i class="fa fa-user"></i>
                                            <input type="text" class="form-control" name="username" placeholder="Identifiant" required="required">
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-lock"></i>
                                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required="required">					
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-lock"></i>
                                            <input type="password" class="form-control" name="passwordConfirmation" placeholder="Confirmer mot de passe" required="required">					
                                        </div>
                                        <div class="form-group">
                                            <i class="fas fa-at" aria-hidden="true"></i>
                                            <input type="text" class="form-control" name="email" placeholder="Email" required="required">					
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block btn-lg" value="S'inscrire">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <p>Vous avez déjà un compte ?</p>
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal"  data-toggle="modal" data-target="#modalLogin">Se connecter</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Modal Sign In -->
                    <!-- Message success (Sign in / Log in) -->
                    <div id="messageSuccess" class="alert alert-success" style="display: none;"></div>
                    <!-- Specific element -->
                    <?= $content ?>
                </div>
                <footer id="footerBlog">
                    Blog realisé avec PHP, JAVASCRIPT, jQUERY, HTML5 et CSS.
                    <?php if(isset($_SESSION['session']['accreditation']) && $_SESSION['session']['accreditation'] == 1){ ?> <a href="index.php?action=admin">Admin</a> <?php } ?>
                </footer>
            </div> <!-- End #globalMargin -->
        </div> <!-- End #global -->
    </body>
</html>