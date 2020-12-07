$(document).ready(function () {
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

    $("#commentRequiredField").hide()

    var contentId = $("#contentId").data('value')
    var userId = $("#userId").data('value')
    var globalUserContentId = 0
    var followId

    $.ajax({
        type: 'GET',
        url: window.location.origin + '/api/posts/' + contentId,
        success: function(data) {
            var code = data['code']

            if(code == 200) {
                var contentName = data['data']['post'].name
                var contentDescription = data['data']['post'].description
                var contentImageOne = data['data']['post']['post_images'][0].url
                var contentImageTwo = data['data']['post']['post_images'][1].url
                var contentImageThree = data['data']['post']['post_images'][2].url
                var contentVideoOne = data['data']['post']['post_video'][0].url
                var userContentImage = data['data']['post']['user'][0].profile_photo_path
                var userContentId = data['data']['post']['user'][0].id
                globalUserContentId = userContentId
                var userContentName = data['data']['post']['user'][0].name
                var userContentLastname = data['data']['post']['user'][0].lastname
                var userContentUsername = data['data']['post']['user'][0].username
                var userContentEmail = data['data']['post']['user'][0].email
                var userContentPhone = data['data']['post']['user'][0].phone

                $("#contentName").text(contentName)
                $("#contentDescription").text(contentDescription)
                $("#contentImageOne").attr('src', window.location.origin + '/' + contentImageOne)
                $("#contentImageTwo").attr('src', window.location.origin + '/' + contentImageTwo)
                $("#contentImageThree").attr('src', window.location.origin + '/' + contentImageThree)
                $("#contentVideoOne").attr('src', window.location.origin + '/' + contentVideoOne)
                if(userContentImage == null) {
                    $("#userContentImage").attr('src', window.location.origin + '/' + 'storage/img/defaultUserImage.jpg')
                } else {
                    $("#userContentImage").attr('src', window.location.origin + '/' + userContentImage)
                }

                $("#userContentName").text('Nombre: ' + userContentName + ' ' + userContentLastname + ' (' + userContentUsername + ')')
                $("#userContentEmail").text('Correo: ' + userContentEmail)
                $("#userContentPhone").text('Teléfono: ' + userContentPhone)

                if(userContentId == userId) {
                    $("#btnFollowUser").hide()
                    $("#btnUnfollowUser").hide()
                } else {
                    $.ajax({
                        type: 'POST',
                        url: window.location.origin + '/api/followers/findByFollower',
                        data: {
                            'user_id_follower': userId,
                            'user_id_following': userContentId,
                        },
                        success: function(data) {
                            var code = data['code']

                            if(code == 200) {
                                followId = data['data'][0].id
                                $("#btnFollowUser").hide()
                            } else {
                                $("#btnUnfollowUser").hide()
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {

                        }
                    })
                }

                var comments = data['data']['post']['comments']
                var commentsLength = comments.length
                console.log(commentsLength)

                for(var i = 0; i < commentsLength; i++) {
                    var userCommentName = comments[i]['user'].name
                    var userCommentLastname = comments[i]['user'].lastname
                    var userCommentUsername = comments[i]['user'].username
                    var userCommentImage = comments[i]['user'].profile_photo_path
                    var userCommentComment = comments[i].content
                    var userCommentDate = comments[i].created_at

                    if(userCommentImage == null) {
                        userCommentImage = window.location.origin + '/storage/img/defaultUserImage.jpg'
                    } else  {
                        userCommentImage = window.location.origin + '/' + userCommentImage
                    }

                    $("#singleComment").append(
                        "<div class='row singleComment'>" +
                            "<div class='col-4 col-md-1'>" +
                                "<img id='userCommentImage' class='card-img-top userCommentImage' src='" + userCommentImage + "'>" +
                            "</div>" +

                            "<div class='col-8 col-md-11'>" +
                                "<div id='userCommentName' class='userCommentName'>" +
                                userCommentName + ' ' + userCommentLastname + ' (' + userCommentUsername + ')' +
                                "</div>" +

                                "<div id='userCommentComment' class='userCommentComment'>" +
                                    userCommentComment +
                                "</div>" +

                                "<div id='userCommentDate' class='userCommentDate'>" +
                                    userCommentDate +
                                "</div>" +
                            "</div>" +
                        "</div>"
                    )
                }
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown)
        }
    })

    $("#btnFollowUser").click(function(e) {
        e.preventDefault()

        $.ajax({
            type: 'POST',
            url: window.location.origin + '/api/followers',
            data: {
                'user_id_follower': userId,
                'user_id_following': globalUserContentId,
            },
            success: function(data) {
                var code = data['code']

                if(code == 200) {
                    alert(data['data'])

                    window.location.href = '/'
                } else {
                    alert(data['data'])
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('error')
            }
        })
    })

    $("#btnUnfollowUser").click(function(e) {
        e.preventDefault()

        $.ajax({
            type: 'DELETE',
            url: window.location.origin + '/api/followers/' + followId,
            success: function(data) {
                var code = data['code']

                if(code == 200) {
                    alert(data['data'])

                    window.location.href = '/'
                } else {
                    alert(data['data'])
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('error')
            }
        })
    })

    $("#btnCreateComment").click(function(e) {
        e.preventDefault();

        var comment = $("#comment").val()

        if(comment.length != 0) {
            $("#commentRequiredField").hide()
            $("#comment").css({"border-style": "none"})

            $.ajax({
                type: 'POST',
                url: window.location.origin + '/api/comments',
                data: {
                    'post_id': contentId,
                    'user_id': userId,
                    'content': comment,
                },
                success: function(data) {
                    var code = data['code']

                    if(code == 200) {
                        alert('comentario agregado')
                    } else {
                        alert(data['data'])
                    }
                }
            })
        } else {
            $("#commentRequiredField").show()

            if(comment.length == 0) {
                $("#comment").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#comment").css({"border-style": "none"})
            }
        }
    })
})
