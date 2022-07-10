var handlerChangePassword = function () {
    this.initialize = function () {
        registerEvents();

    };

    var registerEvents = function () {
        $("#newPassword").on('keyup', function (e) {
            e.preventDefault();
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([!,@,#,$,%,^,&,*,_,+,=,-])/;
            if ($('#newPassword').val().trim().length >= 8 && $('#newPassword').val().trim().length <= 64) {
                document.getElementById("rule1").checked = true;
            } else {
                document.getElementById("rule1").checked = false;
            }
            if ($('#newPassword').val().trim().match(alphabets)) {
                document.getElementById("rule2").checked = true;
            } else {
                document.getElementById("rule2").checked = false;
            }
            if ($('#newPassword').val().trim().match(number)) {
                document.getElementById("rule3").checked = true;
            } else {
                document.getElementById("rule3").checked = false;
            }
            if ($('#newPassword').val().trim().match(special_characters)) {
                document.getElementById("rule4").checked = true;
            } else {
                document.getElementById("rule4").checked = false;
            }
        });
        $("#toggle__newPassword").on('click', function (e) {
            e.preventDefault();
            let newPassword = document.getElementById("newPassword");
            $(this).toggleClass("fa-eye fa-eye-slash");
            if (newPassword.type === "password") {
                newPassword.type = "text";

            } else {
                newPassword.type = "password";
            }
        });

        $("#toggle__oldPassword").on('click', function (e) {
            e.preventDefault();
            let oldPassword = document.getElementById("oldPassword");
            $(this).toggleClass("fa-eye fa-eye-slash");
            if (oldPassword.type === "password") {
                oldPassword.type = "text";

            } else {
                oldPassword.type = "password";
            }
        });

        $("#toggle__confirmPassword").on('click', function (e) {
            e.preventDefault();
            let confirmPassword = document.getElementById("new_confirm_password");
            $(this).toggleClass("fa-eye fa-eye-slash");
            if (confirmPassword.type === "password") {
                confirmPassword.type = "text";

            } else {
                confirmPassword.type = "password";
            }
        });
    }
}
