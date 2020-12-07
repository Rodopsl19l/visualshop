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

    $("#requiredField").hide();
    $("#userError").hide()

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
                    $("#profileImage").attr('src', window.location.origin + '/' + '../storage/img/defaultUserImage.jpg')
                }

                if(coverImage == null) {
                    $("#coverCoverImage").attr('data-img-src', 'img/defaultCoverImage.jpg')
                    $("#coverImage").attr('src', window.location.origin + '/' + '../storage/img/defaultCoverImage.jpg')
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

    })
})
