$(document).ready(function () {
    $("#requiredField").hide();
    $("#postError").hide()

    $("#btnCreate").click(function (e) {
        e.preventDefault()

        var userId = $("#userId").data('value')
        var name = $("#name").val()
        var description = $("#description").val()
        var imageOne = $("#imageOne")[0].files[0]
        var imageTwo = $("#imageTwo")[0].files[0]
        var imageThree = $("#imageThree")[0].files[0]
        var videoOne = $("#videoOne")[0].files[0]
        var publish = $("input[name=publish]:checked").length

        if(name.length != 0 && description.length != 0 && imageOne != undefined && imageTwo != undefined && imageThree != undefined && videoOne != undefined) {
            var formData = new FormData()
            formData.append('user_id', userId)
            formData.append('name', name)
            formData.append('description', description)
            formData.append('imageOne', imageOne)
            formData.append('imageTwo', imageTwo)
            formData.append('imageThree', imageThree)
            formData.append('videoOne', videoOne)
            formData.append('published', publish)

            $.ajax({
                type: 'POST',
                url: window.location.origin + '/api/posts',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    var code = data['code']

                    if(code == 200) {
                        window.location.href = "/admin"
                    } else if(code == 500) {
                        alert(data['data'])
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

            if(imageOne == undefined) {
                $("#imageOne").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#imageOne").css({"border-style": "none"})
            }

            if(imageTwo == undefined) {
                $("#imageTwo").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#imageTwo").css({"border-style": "none"})
            }

            if(imageThree == undefined) {
                $("#imageThree").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#imageThree").css({"border-style": "none"})
            }

            if(videoOne == undefined) {
                $("#videoOne").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#videoOne").css({"border-style": "none"})
            }
        }
    })
})
