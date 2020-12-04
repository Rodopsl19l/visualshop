$(document).ready(function () {
    $("#requiredField").hide()
    $("#emailNotFound").hide()
    $("#forgotPasswordError").hide()
    $("#enterPassword").hide()

    $("#btnValidateEmail").click(function (e) {
        e.preventDefault()

        var email = $("#email").val()

        if(email.length != 0) {
            $.ajax({
                type: 'POST',
                url: 'http://127.0.0.1:8000/api/users/login',
                data: {
                    'email': email,
                    'password': password,
                },
                success: function(data) {
                    var code = data['code']

                    if(code == 200) {
                        $.redirect('login/redirect', {
                            'email': email,
                            'password': password
                        })
                    } else if(code == 403) {
                        $("#incorrectPassword").show()
                    } else {
                        $("#emailNotFound").show()
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#loginError").show()
                }
            })
        } else {
            $("#requiredField").show()

            if(email.length == 0) {
                $("#email").css({"border-style": "solid", "border-color": "red"})
            } else {
                $("#email").css({"border-style": "none"})
            }
        }
    })
})
