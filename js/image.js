$(document).ready(function () {
    $("body").on('submit', '#uploadForm', (function (e) {
        e.preventDefault();
        // get file - returns array of obj
        let file = $('#file').prop('files');
        //get name 
        let name = file[0].name
   
        // create formData obj instance
        let formData = new FormData();
        let ext = name.split('.').pop().toLowerCase();
        //check extension
        if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid Image File");
        } else {
            $.ajax({
                    url: "php/includes/admin/insert_image.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false
                })
                .done(function (data) {
                    console.log(data);
                    alert("Data inserted successfully");
                })
                .fail(function (xhr) {
                    console.log("error " + xhr.responseText + " " + xhr.responseStatus);
                })
        }


    }));

});