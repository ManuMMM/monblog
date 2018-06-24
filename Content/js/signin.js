/* 
 * AJAX call for signin
 */

$(document).ready(function(){
    $("#signinForm").on("submit", function(event){
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
        passwordConfirmation = $(this).find("input[name=passwordConfirmation]").val();
        email = $(this).find("input[name=email]").val();
        usernameInput = $(this).find("input[name=username]");
        passwordInput = $(this).find("input[name=password]");
        passwordConfirmationInput = $(this).find("input[name=passwordConfirmation]");
        emailInput = $(this).find("input[name=email]");
        url = $(this).attr("action");
        // Check if the two inputs aren't empty and then do an Ajax call in post
        if(username.trim() != '' && password.trim() != '' && passwordConfirmation.trim() != '' && email.trim() != ''){
            $.post(url,{username:username,password:password,passwordConfirmation:passwordConfirmation,email:email}, function(data){
                // Hide the Loader (CSS)
                $(".loaderOverlay").fadeOut();
                if(data.state == "success"){
                    // Close the Login modal
                    $("#closeSignin").click();
                    // Display a message to confirm the registration
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
                        // Put the focus on the input to correct
                        passwordConfirmationInput.addClass("errorFocus");
                    }
                    if(data.errorEmail){
                        // Display a error message under the email input
                        emailInput.after(data.errorEmail);
                        // Put the focus on the input to correct
                        emailInput.addClass("errorFocus");
                    }
                }
            }, "json");
        }else{
            if(username.trim() == ''){
                // Display a error message under the username input
                usernameInput.after("Veuillez renseigner votre identifiant");
                // Put the focus on the input to correct
                usernameInput.addClass("errorFocus");
            }else if(password.trim() == ''){
                // Display a error message under the password input
                passwordInput.after("Veuillez renseigner votre mot de passe");
                // Put the focus on the input to correct
                passwordInput.addClass("errorFocus");
            }else if(passwordConfirmation.trim() == ''){
                // Display a error message above the passwordConfirmation input
                passwordConfirmationInput.after("Veuillez renseigner votre mot de passe");
                // Put the focus on the input to correct
                passwordConfirmationInput.addClass("errorFocus");
            }else{
                // Display a error message under the email input
                emailInput.after("Veuillez renseigner votre email");
                // Put the focus on the input to correct
                emailInput.addClass("errorFocus");
            }
        }
    });
});


