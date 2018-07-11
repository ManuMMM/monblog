/* 
 * TinyMCE Setup
 */

//  Setting to keep the values of hidden textarea in sync as changes are made via TinyMCE editor
tinymce.init({
    selector: '#txtPost',
    setup: function (editor) { editor.on('change', function () { editor.save(); }); },
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools wordcount"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    // imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ],
    branding: false,
    height : "40vh"
});