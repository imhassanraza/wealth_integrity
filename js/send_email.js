$("#request_form").validate({
    rules: {
        name: "required",
        email: "required email",
        message: "required",
    },
    messages: {
        name: "Enter your name.",
        message: "Enter your message.",
        email: {
            required: "Enter your email",
            email: "Please enter a valid email address.",
        }
    }
})

$("#submit_request").click(function() {

    if ($("#request_form").valid()) {



        var btn = $("#submit_request");

        var form_data = $("#request_form").serialize();
        btn.text('Please wait...').addClass('disabled').attr('disabled', 'true');

        $.ajax({
            url: 'send_mail.php',
            type: 'post',
            data: form_data,
            dataType: 'json',
            success: function(status) {

                btn.text('Submit').removeClass('disabled').removeAttr('disabled');

                if (status.msg == 'success') {
                    $("#error_message").hide();
                    $("#success_message").text(status.response).show();
                    $('#request_form')[0].reset();
                } else if (status.msg == 'error') {
                    $("#success_message").hide();
                    $("#error_message").text(status.response).show();
                }

            }
        });
    }

});