$(document).ready(function () {
    $("#contentAlert").hide();
    $("#contentCards").hide();

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
        url: 'http://127.0.0.1:8000/api/posts',
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
                                    "<button id='btnEditContent' type='button' class='btn btn-info' data-value='" + contentId + "'>Editar</button>" +
                                    "<button id='btnDeleteContent' type='button' class='btn btn-danger' data-value='" + contentId + "'>Eliminar</button>" +
                                "</div>" +
                            "</div>"
                        )
                    }

                    $("#contentCards").on('click', '#btnEditContent', function(e) {
                        e.preventDefault();

                        var editContentId = $("#btnEditContent").data('value')

                        alert("se quiere editar: " + editContentId)
                    })
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
