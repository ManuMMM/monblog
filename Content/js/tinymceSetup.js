/* 
 * TinyMCE Setup
 */

//  Setting to keep the values of hidden textarea in sync as changes are made via TinyMCE editor
tinymce.init({
    selector: '#txtPost',
    setup: function (editor) { editor.on('change', function () { editor.save(); }); },
    plugins: "wordcount",
    branding: false,
    height : "40vh"
});