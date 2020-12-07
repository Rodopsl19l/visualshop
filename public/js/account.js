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

    $("#requiredField").hide()
    $("#userError").hide()
    $("#passwordsError").hide()

    var userId = $("#userId").data('value')

    $.ajax({
        type: 'GET',
        url: window.location.origin + '/api/users/' + userId,
        success: function(data) {
            var code = data.code

            if(code == 200) {
                var name = data['data']['user'].name
                var lastname = data['data']['user'].lastname
                var email = data['data']['user'].email
                var username = data['data']['user'].username
                var phone = data['data']['user'].phone
                var profileImage = data['data']['user'].profile_photo_path
                var coverImage = data['data']['user'].cover_photo_path
                var userTypeName = data['data']['user']['user_type'].name



                $("#coverName").text(name + ' ' + lastname)
                $("#coverUserType").text(userTypeName)

                if(profileImage == null) {
                    $("#coverProfileImage").attr('src', window.location.origin + '/' + '../storage/img/defaultUserImage.jpg')
                    $("#userProfileImage").attr('src', window.location.origin + '/' + '../storage/img/defaultUserImage.jpg')
                } else {
                    $("#coverProfileImage").attr('src', window.location.origin + '/' + profileImage)
                    $("#userProfileImage").attr('src', window.location.origin + '/' + profileImage)
                }

                if(coverImage == null) {
                    $("#banner").css({"background": "url('" + window.location.origin + '/' + '../storage/img/defaultCoverImage.jpg' +"')"})
                    $("#userCoverImage").attr('src', window.location.origin + '/' + '../storage/img/defaultCoverImage.jpg')
                } else {
                    $("#banner").css({"background": "url('" + window.location.origin + '/' + coverImage +"')"})
                    $("#userCoverImage").attr('src', window.location.origin + '/' + coverImage)
                }

                $("#name").val(name)
                $("#lastname").val(lastname)
                $("#email").val(email)
                $("#username").val(username)
                $("#phone").val(phone)
            } else {
                alert("Error al obtener la información")
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown)
        }
    })

    $("#btnEdit").click(function(e) {
        var name = $("#name").val()
        var lastname = $("#lastname").val()
        var email = $("#email").val()
        var username = $("#username").val()
        var password = $("#password").val()
        var confirmPassword = $("#confirmPassword").val()
        var phone = $("#phone").val()
        var profileImage = $("#profileImage").prop('files')[0];
        var coverImage = $("#coverImage")[0].files[0]

        if(name.length != 0 && lastname.length != 0 && email.length != 0 && username.length != 0 && phone.length != 0) {
            if(password.length != 0) {
                if(confirmPassword == password) {
                    var formData = new FormData()
                    formData.append('id', userId)
                    formData.append('name', name)
                    formData.append('lastname', lastname)
                    formData.append('email', email)
                    formData.append('username', username)
                    formData.append('password', 'no');
                    formData.append('phone', phone)

                    if(profileImage != undefined) {
                        formData.append('profileImage', profileImage)
                    }

                    if(coverImage != undefined) {
                        formData.append('coverImage', coverImage)
                    }

                    $.ajax({
                        type: 'POST',
                        url: window.location.origin + '/api/users/editUser',
                        data : formData,
                        contentType: false,
                        processData: false,
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
                } else {
                    $("#passwordsError").show()
                }
            } else {
                var formData = new FormData()
                formData.append('id', userId)
                formData.append('name', name)
                formData.append('lastname', lastname)
                formData.append('email', email)
                formData.append('username', username)
                formData.append('password', 'no');
                formData.append('phone', phone)

                if(profileImage != undefined) {
                    formData.append('profileImage', profileImage)
                }

                if(coverImage != undefined) {
                    formData.append('coverImage', coverImage)
                }

                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/api/users/editUser',
                    data : formData,
                    contentType: false,
                    processData: false,
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
            }
        } else {
            $("#requiredField").hide();

            if(name.length == 0) {
                $("#name").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#name").css({"border-style": "none"})
            }

            if(lastname.length == 0) {
                $("#lastname").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#lastname").css({"border-style": "none"})
            }

            if(email.length == 0) {
                $("#email").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#email").css({"border-style": "none"})
            }

            if(username.length == 0) {
                $("#username").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#username").css({"border-style": "none"})
            }

            if(phone.length == 0) {
                $("#phone").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#phone").css({"border-style": "none"})
            }
        }
    })
})
