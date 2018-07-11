/* 
 * Ajax call to create or edit a post
 */

$(document).ready(function(){
    // Ajax new & edit Post
    $("#postForm").on("submit", function(event){
        event.preventDefault();
        // Display a loader (CSS)
        $(".loaderOverlay").show();
        // Remove all the active errors
        $(this).find(".error").remove();
        // Remove all the active error focus (through the errorFocus class)
        $(this).find(".errorFocus").removeClass("errorFocus");
        // Declare variables
        id = $(this).find("input[name=id]").val();
        title = $(this).find("input[name=title]").val();
        content = tinyMCE.activeEditor.getContent();
        titleInput = $(this).find("input[name=title]");
        contentInput = $(this).find("input[name=content]");
        url = $(this).attr("action");
        // Check if the two inputs aren't empty and then do an Ajax call in post
        if(title.trim() != '' && content.trim() != ''){
            $.post(url,{id:id,title:title,content:content}, function(data){
                // Hide the Loader (CSS)
                $(".loaderOverlay").fadeOut();
                if(data.state == "add"){
                    // Close the Post modal
                    $("#closePost").click();
                    // Add the line for the new article in the table
                    $("#listPosts").prepend(data.datanewline);
                    // Remove the last line in the table
                    $("#listPosts tr").last().remove();
                    // Add the tooltips to the 'edit' & 'delete' icons
                    $('.tooltip-edit').tooltip({title: "Editer"});
                    $('.tooltip-delete').tooltip({title: "Supprimer"});
                    // Display a message to confirm the connection
                    $("#messageSuccess").html(data.return).fadeIn().delay(5000).fadeOut();
                }else if(data.state == "edit"){
                    // Close the Post modal
                    $("#closePost").click();
                    // Add the line for the of the updated article in the table
                    $("#" + data.linetoedit).after(data.datanewline);
                    // Remove the old line which was edited from the table
                    $("#" + data.linetoedit).remove();
                    // Add the tooltips to the 'edit' & 'delete' icons
                    $('.tooltip-edit').tooltip({title: "Editer"});
                    $('.tooltip-delete').tooltip({title: "Supprimer"});
                    // Display a message to confirm the connection
                    $("#messageSuccess").html(data.return).fadeIn().delay(5000).fadeOut();
                }else{
                    $("#messageFail").html(data.return).fadeIn().delay(5000).fadeOut();
                }
            }, "json");
        }else{
            // Hide the Loader (CSS)
            $(".loaderOverlay").fadeOut();
            if(title.trim() == ''){
                // Display a error message under the title input
                titleInput.after("Veuillez renseigner le titre");
                // Put the focus on the input to correct
                titleInput.addClass("errorFocus");
            }else{
                // Display a error message under the content input
                tinyMCE.get('txtPost').after("Veuillez renseigner du contenu pour l'article");
                // Put the focus on the input to correct
                tinyMCE.get('txtPost').addClass("errorFocus");
            }
        }
    });
});


