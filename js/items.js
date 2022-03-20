$(document).ready(function () {


    $("#search").focus(function () {
        if ($('#search').val() === '') {
            /* Reset Search Options to avoid duplication */
            $('#datalistOptions').html('')
        }
    });


    $('#search').on('input', function (e) {
        /* Reset Search Options to avoid duplication */
        $('#datalistOptions').html('')

        $.ajax({
                url: 'php/includes/search_item.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    search: $('#search').val()
                }
            })
            .done(function (data) {
                $.map(data, function (val, index) {
                    $('#datalistOptions').append($("<option class='option'>")
                        .attr('data-itemid', '/4MS/comments?itemid=' + val.id).val(val.name))
                });

                if (checkExists($('#search').val()) === true) {
                    let href = $('#datalistOptions').find('option').attr('data-itemid')
                    window.location.assign(href); // assign to not clear pages history compare to .replace

                }
            })

       
    });


    function checkExists(inputValue) {
        // let x = document.getElementById("datalistOptions");
        let x = $('#datalistOptions')[0] // $() returns array [0, length], [0]index: is the html
   
        let i;
        let flag;
        for (i = 0; i < x.options.length; i++) {
            if (inputValue == x.options[i].value) {
                flag = true;
            }
        }
        return flag;
    }
});