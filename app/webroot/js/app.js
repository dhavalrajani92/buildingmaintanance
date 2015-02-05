angular.module('BuildingMaintenance', [])
        .controller('LoginController', ['$scope', function ($scope) {
                $scope.login = function () {
                    $("#add-form").validate({
                        onkeyup: false,
                        errorClass: 'error-message',
                        validClass: 'valid',
                        rules: {
                            "data[User][email]": {required: true, email: true},
                            "data[User][password]": {required: true}
                        },
                        messages: {
                            "data[User][email]": {required: ENTER_EMAIL, email: ENTER_VALID_EMAIL},
                            "data[User][password]": {required: ENTER_PASSWORD, minlength: ERROR_MIN_PASSWORD_LENGTH, maxlength: ERROR_MAX_PASSWORD_LENGTH}
                        },
                        submitHandler: function (form) {
                            $("#loading_main").show();
                            $('#submit').attr('disabled', true);
                            $.ajax({
                                url: SITE_URL + "ajaxs/validate_login",
                                data: $(form).serialize(),
                                type: "POST",
                                success: function (response) {
                                    var response_object = jQuery.parseJSON(response);
                                    if (response_object.msg == 'success') {
                                        window.location.href = DASHBOARD_URL;
                                    }
                                    else if (response_object.msg == 'error') {

                                    }
                                    else if (response_object.msg == 'modal_error') {
                                        $("#loading_main").hide();
                                        $('#submit').attr('disabled', false);
                                        var i = 0;
                                        $.each(response_object.error_info, function (field, error) {
                                            if (field != "null") {
                                                $("#" + field + "_validation").addClass("error-message");
                                                $("#" + field + "_validation").html(error);
                                                $("#" + field + "_validation").show();
                                            }
                                        });
                                    }
                                },
                                error: function (x, e) {
                                    if (x.status == "403") {
                                        window.location.reload();
                                    }
                                }
                            });
                        }
                    });
                };

            }]);

