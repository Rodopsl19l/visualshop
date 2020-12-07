$(document).ready(function () {
    $("#newerContentAlert").hide()
    $("#followingAlert").hide()

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

    var userId = $("#userId").data('value')

    $.ajax({
        type: 'GET',
        url: window.location.origin + '/api/posts/getNewer',
        success: function(data) {
            var code = data['code']

            if(code == 200) {
                var postsLength = data['data'].posts.length;
                if(postsLength != 0) {
                    var posts = data['data'].posts

                    for(i = 0; i < postsLength; i++) {
                        var contentId = posts[i]['id']
                        var contentName = posts[i]['name']
                        var contentDescription = posts[i]['description']

                        var postImages = posts[i].post_images
                        var contentPreviewImage = postImages[0].url

                        $("#newerContentCards").append(
                            "<div class='card' data-value='" + contentId + "'>" +
                                "<img src='" + contentPreviewImage + "' class='card-img-top'>" +
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
                    $("#newerContentAlert").show()
                }
            } else if(code == 500) {
                $("#newerContentAlert").show()
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown)
        }
    })

    $.ajax({
        type: 'GET',
        url: window.location.origin + '/api/followers/getAllFollowing/' + userId,
        success: function(data) {
            console.log("success")
            console.log(data)
            var code = data['code']

            if(code == 200) {
                var followingsLengrh = data['data'].length;
                if(followingsLengrh != 0) {
                    var followings = data['data']

                    for(i = 0; i < followingsLengrh; i++) {
                        var userFollowingId = followings[i]['user_following']['id']
                        var userFollowingName = followings[i]['user_following']['name']
                        var userFollowingLastname = followings[i]['user_following']['lastname']
                        var userFollowingUsername = followings[i]['user_following']['username']
                        var userFollowingImage = followings[i]['user_following']['profile_photo_path']

                        if(userFollowingImage == null) {
                            userFollowingImage = window.location.origin + '/storage/img/defaultUserImage.jpg'
                        }

                        $("#followingContentCards").append(
                            "<div class='card' data-value='" + userFollowingId + "'>" +
                                "<img src='" + userFollowingImage + "' class='card-img-top'>" +
                                "<div class='card-body'>" +
                                    "<h5 class='card-title'>" + userFollowingName + ' ' + userFollowingLastname + "</h5>" +
                                    "<p class='card-text'>" + userFollowingUsername + "</p>" +
                                "</div>" +
                                "<div class='btn-group' role='group'>" +
                                    "<a class='btnViewContent' href='/users/"+ userFollowingId + "'>Ver perfil</a>" +
                                "</div>" +
                            "</div>"
                        )
                    }
                } else {
                    $("#followingAlert").show()
                }
            } else if(code == 500) {
                $("#followingAlert").show()
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert('error');
        }
    })
})
