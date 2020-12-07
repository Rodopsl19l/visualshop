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

    var id = $("#id").data('value')

    console.log(id)

    $.ajax({
        type: 'GET',
        url: window.location.origin + '/api/posts/getByUser/' + id,
        success: function(data) {
            var code = data['code']

            if(code == 200) {
                var postsLength = data['data'].posts.length;
                if(postsLength != 0) {
                    $("#contentCards").show()

                    var user = data['data'].user
                    var userName = user.name
                    var userLastname = user.lastname
                    var userUsername = user.username
                    var userProfileImage = user.profile_photo_path
                    var userCoverImage = user.cover_photo_path

                    if(userCoverImage == null) {
                        $("#banner").css({"background": "url('" + window.location.origin + '/' + '../storage/img/defaultCoverImage.jpg' +"')"})
                    } else {
                        $("#banner").css({"background": "url('" + window.location.origin + '/' + userCoverImage +"')"})
                    }

                    if(userProfileImage == null) {
                        $("#coverProfileImage").attr('src', window.location.origin + '/storage/img/defaultUserImage.jpg')
                    } else {
                        $("#coverProfileImage").attr('src', window.location.origin + '/' + userProfileImage)
                    }

                    $("#coverName").text(userName + ' ' + userLastname)
                    $("#coverUsername").text(userUsername)

                    var posts = data['data'].posts

                    for(i = 0; i < postsLength; i++) {
                        var contentId = posts[i].id
                        var contentName = posts[i]['name']
                        var contentDescription = posts[i]['description']

                        var postImages = posts[i].post_images
                        var contentPreviewImage = postImages[0].url

                        $("#contentCards").append(
                            "<div class='card'>" +
                                "<img src='" + '../' + contentPreviewImage + "' class='card-img-top'>" +
                                "<div class='card-body'>" +
                                    "<h5 class='card-title'>" + contentName + "</h5>" +
                                    "<p class='card-text'>" + contentDescription + "</p>" +
                                "</div>" +
                                "<div class='btn-group' role='group'>" +
                                    "<a class='btnViewContent' href='/content/"+ contentId + "'>Ver completo</a>" +
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
