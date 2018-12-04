tinymce.init({
    selector: 'textarea',
    language_url : '/langs/zh_CN.js',
    height:'500px',
    plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons template paste textcolor'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
    images_upload_url: '/postAcceptor',
    images_upload_base_path: '/',
    images_upload_credentials: true

});