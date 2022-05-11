$(document).ready(function () {

    let url_string = window.location.href; //Get Current URL with Params
    let itemid = 'q'
    let image = 'q'
    let itemReference ='q'
    let ge = '2'
    // =================remove modal =================
    $('.modal__close').click(function () {
        // edit address
        $('.modal-delete-confirmation').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });



    // delete confirmation modal
    $('.deleteButton').click(function (e) {
        e.preventDefault();
        console.log("running twice");
        $('.modal-delete-confirmation').css({
            'visibility': 'visible',
            'opacity': '1'
        });

        itemReference = $(this)
          itemid = itemReference.attr('data-itemid');
           image =  itemReference.attr('data-image');
           console.log(itemid, image);
    });



    // delete confirmation button on modal
    $('.delete').click(function (e) {
        // e.preventDefault();
        console.log(image, itemid, itemReference.attr(  'data-image'), ge);
        $.ajax({
                url: '../php/includes/admin/delete_item.php',
                type: 'POST',
                dataType: 'JSON',
                data:{
                    itemid : itemid,
                    image  : image
                }
            })
            .done(function (data) {
                $('.modal-delete-confirmation').css({
                    'visibility': 'hidden',
                    'opacity': '0'
                });

                window.location.assign('/4MS/admin/items')
            })
            .fail(function (xhr, status, error) {
                console.log("error " + error + status + xhr.responseText + xhr.status);
            });
    });
});