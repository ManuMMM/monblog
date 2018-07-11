/* 
 * AJAX call for login
 */

$(document).ready(function(){
    $("#loginForm").on("submit", function(event){
        event.preventDefault();
        // Display a loader (CSS)
        $(".loaderOverlay").show();
        // Remove all the active errors
        $(this).find(".error").remove();
        // Remove all the active error focus (through the errorFocus class)
        $(this).find(".errorFocus").removeClass("errorFocus");
        // Declare variables
        username = $(this).find("input[name=username]").val();
        password = $(this).find("input[name=password]").val();
        usernameInput = $(this).find("input[name=username]");
        passwordInput = $(this).find("input[name=password]");
        url = $(this).attr("action");
        // Check if the two inputs aren't empty and then do an Ajax call in post
        if(username.trim() != '' && password.trim() != ''){
            $.post(url,{username:username,password:password}, function(data){
                // Hide the Loader (CSS)
                $(".loaderOverlay").fadeOut();
                if(data.state == "success"){
                    // Close the Login modal
                    $("#closeLogin").click();
                    // Display the name of the logged user
                    $("#loginState").html('<li class="nav-item"><div class="btn btn btn-outline-primary mr-2"><i class="fa fa-user"></i> ' + username + '</div></li>');
                    // Display the log out button
                    $("#loginState").append('<a class="btn btn-outline-primary mr-2" href="index.php?action=logout">Se déconnecter</a>');
                    // Display the link to the admin panel (at the bottom of the page)
                    $("#footerBlog").append('<a href="index.php?action=admin">Admin</a>');
                    // Display a message to confirm the connection
                    $("#messageSuccess").html(data.return).fadeIn().delay(5000).fadeOut();
                }else{
                    if(data.errorUsername){
                        // Display a error message under the username input 
                        usernameInput.after(data.errorUsername);
                        // Put the focus on the input to correct
                        usernameInput.addClass("errorFocus");
                    }
                    if(data.errorPassword){
                        // Display a error message under the password input
                        passwordInput.after(data.errorPassword);
                        // Put the focus on the input to correct
                        passwordInput.addClass("errorFocus");
                    }
                }
            }, "json");
        }else{
            if(username.trim() == ''){
                // Display a error message under the username input
                usernameInput.after('<p class="error">Veuillez renseigner l\'identifiant</p>');
                // Put the focus on the input to correct
                usernameInput.addClass("errorFocus");
            }else{
                // Display a error message under the password input
                passwordInput.after('<p class="error">Veuillez renseigner le mot de passe</p>');
                // Put the focus on the input to correct
                passwordInput.addClass("errorFocus");
            }
        }
    });
});


