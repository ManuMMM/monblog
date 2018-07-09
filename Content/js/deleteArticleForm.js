/* 
 * Ajax call to delete
 */

$(document).ready(function(){
    // Ajax delete Post
    $("#listPosts").on("submit", ".deleteArticleForm", function(event){
        event.preventDefault();
        // Display a loader (CSS)
        $(".loaderOverlay").show();
        // Declare variables
        id = $(this).find("input[name=id]").val();
        url = $(this).attr("action");
        // Check if the two inputs aren't empty and then do an Ajax call in post
        if(id.trim() != ''){
            $.post(url,{id:id}, function(data){
                // Hide the Loader (CSS)
                $(".loaderOverlay").fadeOut();
                if(data.state == "delete"){
                    // Close the Post modal
                    $("#closePost").click();
                    // Remove the old line which was edited from the table
                    $("#" + data.linetoedit).remove();
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


