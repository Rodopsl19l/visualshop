$(document).ready(function () {
    $("#newerContentAlert").hide();

    new WOW().init();

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll <= 350) {
            $("#navbar").addClass("navbar-transparent");
            $("#navbar").removeClass("navbar-visible");
        } else {
            $("#navbar").addClass("navbar-visible");
            $("#navbar").removeClass("navbar-transparent");
        }
    });

    $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1:8000/api/posts/getNewer',
        success: function(data) {
            var code = data['code']

            if(code == 200) {
                var postsLength = data['data'].posts.length;
                if(postsLength != 0) {
                    var posts = data['data'].posts

                    for(i = 0; i < postsLength; i++) {
                        var contentName = posts[i]['name']
                        var contentDescription = posts[i]['description']

                        var postImages = posts[i].post_images
                        var contentPreviewImage = postImages[0].url

                        $("#newerContentCards").append(
                            "<div class='card'>" +
                                "<img src='" + contentPreviewImage + "' class='card-img-top'>" +
                                    "<div class='card-body'>" +
                                        "<h5 class='card-title'>" + contentName + "</h5>" +
                                        "<p class='card-text'>" + contentDescription + "</p>" +
                                    "</div>" +
                            "</div>"
                        )
                    }
                } else {
                    $("#newerContentAlert").show()
                }
            } else if(code == 500) {
                alert(data['data'])
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown)
        }
    })
})
