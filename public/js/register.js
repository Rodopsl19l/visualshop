$(document).ready(function () {
    $("#requiredField").hide()
    $("#passwordsMatch").hide()
    $("#registerError").hide()

    $("#btnRegister").click(function (e) {
        e.preventDefault()

        var name = $("#name").val()
        var lastname = $("#lastname").val()
        var email = $("#email").val()
        var username = $("#username").val()
        var password = $("#password").val()
        var confirmPassword = $("#confirmPassword").val()
        var phone = $("#phone").val()

        if(name.length != 0 && lastname.length != 0 && email.length != 0 && username.length != 0 && password.length != 0 && confirmPassword.length != 0 && phone.length != 0) {
            if(password === confirmPassword) {
                $.ajax({
                    type: 'POST',
                    url: window.location.origin + '/api/users/',
                    data: {
                        'user_type_id': 2,
                        'name': name,
                        'lastname': lastname,
                        'email': email,
                        'username': username,
                        'password': password,
                        'phone': phone
                    },
                    success: function(data) {
                        var code = data['code']

                        if(code == 200) {
                            $.redirect('login/redirect', {
                                'email': email,
                                'password': password
                            })
                        } else {
                            $("#registerError").show()
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $("#registerError").show()
                    }
                })
            } else {
                $("#passwordsMatch").show()
                $("#password").css({"border-style": "solid", "border-color": "red"})
                $("#confirmPassword").css({"border-style": "solid", "border-color": "red"})
            }
        } else {
            $("#requiredField").show()

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

            if(password.length == 0) {
                $("#password").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#password").css({"border-style": "none"})
            }

            if(confirmPassword.length == 0) {
                $("#confirmPassword").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#confirmPassword").css({"border-style": "none"})
            }

            if(phone.length == 0) {
                $("#phone").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#phone").css({"border-style": "none"})
            }
        }
    })
})
