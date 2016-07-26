    $(document).ready(function () {
        $("img.imgFade").mouseover(function () {
            $(this).fadeTo(300, 1);
        });
        $("img.imgFade").mouseout(function () {
            $(this).fadeTo(300, 0.5);
        });

//      Flickr images opacity
        $(".flickrImg").mouseover(function () {
            $(this).fadeTo(300, 1);
        });
        $(".flickrImg").mouseout(function () {
            $(this).fadeTo(300, 0.7);
        });

    });
    // navigation bar
    $(document).ready(function () {
        setBindings();
    });
function setBindings() {
    $('nav a').click(function (e) {
//            prevents the default animation
        e.preventDefault();
        var contentId = "index_" + e.currentTarget.id;
//            alert(contentId);
        $('html,body').animate({
            scrollTop: $("#" + contentId).offset().top
        }, 1200);

    })
}
    //jQuery images
    $(document).ready(function () {
        var n = 1;
        $('#slide' + n).appear();
        $('#slide' + n).on('appear', function () {
            function removeClass() {
                if ($('#slide' + n).hasClass('transparent')) {
                    $("#slide" + n).mouseover(function(){$(this).fadeTo(300,0.9);});
                    $("#slide" + n).mouseout(function(){$(this).fadeTo(300,1);});
                    $("#slide" + n).delay(n + 0).fadeTo(20, 1);
                    n = n + 1;
                }
            }
            removeClass(n);
        });
        function resize(id) {
            var factor = 2;
            $(id).animate({
                top: '-=' + $(id).height() / factor,
                left: '-=' + $(id).width() / factor,
                width: $(id).width() * factor
            });
        }

        $("#content_web img").mouseover(function () {
            resize($(this).attr("id"));
        });

    })
;
