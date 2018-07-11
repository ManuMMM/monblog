/* 
 *  Ajax to moderate comment
 */

$(document).ready(function(){
    $("#listCommentsToModerate").on("submit", ".moderateCommentForm", function(event){
        event.preventDefault();
        // Display a loader (CSS)
        $(".loaderOverlay").show();
        // Declare variables
        comment = $(this).find("input[name=comment]").val();
        url = $(this).attr("action");
        // Check if the two inputs aren't empty and then do an Ajax call in post
        if(comment.trim() != ''){
            $.post(url,{comment:comment}, function(data){
                // Hide the Loader (CSS)
                $(".loaderOverlay").fadeOut();
                if(data.state == "moderated"){
                    // Add the line for the of the updated article in the table
                    $("#" + data.linetoedit).after(data.datanewline);
                    // Remove the old line which was edited from the table
                    $("#" + data.linetoedit).remove();
                    // Add the tooltip to the 'validated' icon
                    $('.tooltip-moderated').tooltip({title: "Commentaire modéré"});
                    // Display a message to confirm the moderation of the comment
                    $("#messageSuccess").html(data.return).fadeIn().delay(5000).fadeOut();
                }else{
                    $("#messageFail").html(data.return).fadeIn().delay(5000).fadeOut();
                }
            }, "json");
        }else{
            $("#messageFail").html(data.return).fadeIn().delay(5000).fadeOut();
        }
    });
});


