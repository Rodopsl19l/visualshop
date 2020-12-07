$(document).ready(function () {
    $("#requiredField").hide();
    $("#postError").hide()

    var contentId = $("#contentId").data('value')

    $.ajax({
        type: 'GET',
        url: window.location.origin + '/api/posts/' + contentId,
        success: function(data) {
            var code = data['code']

            if(code == 200) {
                var postLength = data['data'].post

                if(postLength != 0) {
                    var post = data['data'].post

                    var contentName = post.name
                    var contentDescription = post.description

                    var postImages = post.post_images

                    var imageOneId = postImages[0].id
                    var imageOneUrl = postImages[0].url

                    var imageTwoId = postImages[1].id
                    var imageTwoUrl = postImages[1].url

                    var imageThreeId = postImages[2].id
                    var imageThreeUrl = postImages[2].url

                    var postVideo = post.post_video

                    var videoOneId = postVideo[0].id
                    var videoOneUrl = postVideo[0].url

                    var published = post.published

                    $("#name").val(contentName)
                    $("#description").val(contentDescription)
                    $("#imageOne").attr('data-value', imageOneId)
                    $("#imageOneImage").attr('src', window.location.origin + '/' + imageOneUrl)
                    $("#imageTwo").attr('data-value', imageTwoId)
                    $("#imageTwoImage").attr('src', window.location.origin + '/' + imageTwoUrl)
                    $("#imageThree").attr('data-value', imageThreeId)
                    $("#imageThreeImage").attr('src', window.location.origin + '/' + imageThreeUrl)
                    $("#videoOne").attr('data-value', videoOneId)
                    $("#videoOneVideo").attr('src', window.location.origin + '/' + videoOneUrl)

                    if(published == 1) {
                        $("#publish").prop('checked', true)
                    }
                }
            } else if(code == 500) {
                alert(data['data'])
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown)
        }
    })

    $("#btnEdit").click(function(e) {
        var name = $("#name").val()
        var description = $("#description").val()
        var imageOne = $("#imageOne")[0].files[0]
        var imageTwo = $("#imageTwo")[0].files[0]
        var imageThree = $("#imageThree")[0].files[0]
        var videoOne = $("#videoOne")[0].files[0]
        var published = $("input[name=publish]:checked").length

        var imageOneEdited = false
        var imageTwoEdited = false
        var imageThreeEdited = false
        var videoOneEdited = false

        if(name.length != 0 && description.length != 0) {
            if(imageOne != undefined) {
                var formData = new FormData()
                var imageOneId  = $("#imageOne").data('value')
                formData.append('id', imageOneId)
                formData.append('image', imageOne)

                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/api/postImages/editImage',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        var code = data.code

                        if(code === 200) {
                            imageOneEdited = true
                        } else {
                            imageOneEdited = false
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        imageOneEdited = false
                    }
                })
            } else {
                imageOneEdited = true
            }

            if(imageTwo != undefined) {
                var formData = new FormData()
                var imageTwoId  = $("#imageTwo").data('value')
                formData.append('id', imageTwoId)
                formData.append('image', imageTwo)

                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/api/postImages/editImage',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        var code = data['code']

                        if(code == 200) {
                            imageTwoEdited = true
                        } else if(code == 500) {
                            imageTwoEdited = false
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        imageTwoEdited = false
                    }
                })
            } else {
                imageTwoEdited = true
            }

            if(imageThree != undefined) {
                var formData = new FormData()
                var imageThreeId  = $("#imageThree").data('value')
                formData.append('id', imageThreeId)
                formData.append('image', imageThree)

                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/api/postImages/editImage',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(formData.get('id'), formData.get('image'), data)
                        var code = data['code']

                        if(code == 200) {
                            imageThreeEdited = true
                        } else if(code == 500) {
                            imageThreeEdited = false
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        imageThreeEdited = false
                    }
                })
            } else {
                imageThreeEdited = true
            }

            if(videoOne != undefined) {
                var formData = new FormData()
                var videoOneId  = $("#videoOne").data('value')
                formData.append('id', videoOneId)
                formData.append('video', videoOne)

                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/api/postVideos/editVideo',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        var code = data['code']

                        if(code == 200) {
                            videoOneEdited = true
                        } else if(code == 500) {
                            videoOneEdited = false
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        videoOneEdited = false
                    }
                })
            } else {
                videoOneEdited = true
            }

            $.ajax({
                type: 'PUT',
                url: window.location.origin + '/api/posts/' + contentId,
                data: {
                    'name' : name,
                    'description' : description,
                    'published' : published
                },
                success: function(data) {
                    var code = data['code']

                    if(code == 200) {
                        alert('Contenido actualizado correctamente')

                        window.location.href = '/admin'
                    } else if(code == 500) {
                        $("#postError").hide()
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown)
                }
            })
        } else {
            $("#requiredField").show()

            if(name.length == 0) {
                $("#name").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#name").css({"border-style": "none"})
            }

            if(description.length == 0) {
                $("#description").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#description").css({"border-style": "none"})
            }
        }
    })
})
