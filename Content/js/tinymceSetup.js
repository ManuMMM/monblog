/* 
 * TinyMCE Setup
 */

tinymce.init({
    selector: '#txtPost',
    setup: function (editor) { editor.on('change', function () { editor.save(); }); },
    plugins: "wordcount",
    branding: false
}); 
