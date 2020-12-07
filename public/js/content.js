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
                $("#userContentImage").attr('src', window.location.origin + '/' + 'storage/img/defaultUserImage.jpg')
                $("#userContentName").text('Nombre: ' + userContentName + ' ' + userContentLastname + ' (' + userContentUsername + ')')
                $("#userContentEmail").text('Correo: ' + userContentEmail)
                $("#userContentPhone").text('Teléfono: ' + userContentPhone)

                var comments = data['data']['post']['comments']
                var commentsLength = comments.length
                console.log(commentsLength)

                for(var i = 0; i < commentsLength; i++) {
                    var userCommentName = comments[i]['user'].name
                    var userCommentLastname = comments[i]['user'].lastname
                    var userCommentUsername = comments[i]['user'].username
                    var userCommentComment = comments[i].content
                    var userCommentDate = comments[i].created_at

                    $("#singleComment").append(
                        "<div class='row singleComment'>" +
                            "<div class='col-1'>" +
                                "<img id='userCommentImage' class='card-img-top userCommentImage' src='../storage/img/defaultUserImage.jpg'>" +
                            "</div>" +

                            "<div class='col-11'>" +
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
