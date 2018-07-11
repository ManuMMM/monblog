/* 
 * Update the data of the modal to fit if it's either a creation of a new post or an edition of an existing post
 */

function urldecode(url){
    return decodeURIComponent(url.replace(/\+/g, ' '));
}

// Event on the opening of the modal, set content in textarea if needed (if we edit a post)
$(document).ready(function(){
    $('#modalPost').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        // Extract info from data-* attributes
        var title = urldecode(button.data('titlepost'));
        var content = urldecode(button.data('contentpost'));
        var id = button.data('idpost');
        var modal = $(this);
        if(content.length > 1){
            modal.find('h4.modal-title').text('Modification de "' + title + '"');
            $( "#postForm" ).attr( "action", "index.php?action=updatepost" );
            $("#postFormId").attr("value", id);
            $("#btn-submitPost").val("Modifier")
        }else{
            modal.find('h4.modal-title').text('Nouvel Article');
            $( "#postForm" ).attr( "action", "index.php?action=addpost" );
            $("#btn-submitPost").val("Publier")
        }
        modal.find('#title').val(title);
        tinyMCE.activeEditor.setContent(content);      
    });
 });
