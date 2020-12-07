$(document).ready(function () {
    $("#contentAlert").hide();
    $("#contentCards").hide();

    new WOW().init();

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll <= 50) {
            $("#navbar").addClass("navbar-transparent");
            $("#navbar").removeClass("navbar-visible");
        } else {
            $("#navbar").addClass("navbar-visible");
            $("#navbar").removeClass("navbar-transparent");
        }
    });

    $.ajax({
        type: 'GET',
        url: window.location.origin + '/api/posts',
        success: function(data) {
            var code = data['code']

            if(code == 200) {
                var postsLength = data['data'].posts.length;
                if(postsLength != 0) {
                    $("#contentCards").show()

                    var posts = data['data'].posts

                    for(i = 0; i < postsLength; i++) {
                        var contentId = posts[i].id
                        var contentName = posts[i]['name']
                        var contentDescription = posts[i]['description']

                        var postImages = posts[i].post_images
                        var contentPreviewImage = postImages[0].url

                        $("#contentCards").append(
                            "<div class='card'>" +
                                "<img src='" + contentPreviewImage + "' class='card-img-top'>" +
                                "<div class='card-body'>" +
                                    "<h5 class='card-title'>" + contentName + "</h5>" +
                                    "<p class='card-text'>" + contentDescription + "</p>" +
                                "</div>" +
                                "<div class='btn-group' role='group'>" +
                                    "<a class='btnEdit' href='/admin/edit/"+ contentId + "'>Editar</a>" +
                                    "<a class='btnDelete' href='/admin/edit/"+ contentId + "'>Eliminar</a>" +
                                "</div>" +
                            "</div>"
                        )
                    }
                } else {
                    $("#contentAlert").show()
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
