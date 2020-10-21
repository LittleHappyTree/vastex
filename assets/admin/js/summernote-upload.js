$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        callbacks: {
            onImageUpload: function(image) {
                uploadImage(image[0]);
            }
        }
    });
    
    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: baseUrl+"admin/upload_image",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $('#summernote').summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
});