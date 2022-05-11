        // $('.portfolio-item').isotope({
        //  	itemSelector: '.item',
        //  	layoutMode: 'fitRows'
        $(document).ready(function () {
            $('.content-text').css({
                "visibility": "hidden",
                "opacity": "0"
            });


            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });

            $(".item").hover(function () {
                $( $(this).find('.content-text')).css({
                    "visibility": "visible",
                    "opacity": "1"
                });
            }, function () {
            
                $( $(this).find('.content-text')).css({
                    "visibility": "hidden",
                    "opacity": "0"
                });
            });


        });