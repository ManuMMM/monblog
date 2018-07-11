/* 
 * Tooltip Setup
 */

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();    
});

$(document).ready(function(){
    $('.tooltip-add').tooltip({title: "Ajouter"});
    $('.tooltip-edit').tooltip({title: "Editer"});
    $('.tooltip-delete').tooltip({title: "Supprimer"});
    $('.tooltip-allow').tooltip({title: "Autoriser"});
    $('.tooltip-moderated').tooltip({title: "Commentaire modéré"});
});
