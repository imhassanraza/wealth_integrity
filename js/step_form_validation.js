    $("#msform").validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        // rules: {}
        rules: {
            email: "email",
        },
        email: {
            email: "Please enter a valid email address.",
        }
    });

    var current_fs, next_fs, previous_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").click(function(){
        if($("#msform").valid()) {
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(++current);

        }
    });

    $(".previous").click(function(){
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        previous_fs.show();
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
    }


    $("#customCheck1").click(function () {
        if ($(this).is(":checked")) {
            $("#div_end_date1").hide();
            $("#e_date1").val("");
        } else {
            $("#div_end_date1").show();
        }
    });
    $("#customCheck2").click(function () {
        if ($(this).is(":checked")) {
            $("#div_end_date2").hide();
            $("#e_date2").val("");
        } else {
            $("#div_end_date2").show();
        }
    });
    $("#customCheck3").click(function () {
        if ($(this).is(":checked")) {
            $("#div_end_date3").hide();
            $("#e_date3").val("");
        } else {
            $("#div_end_date3").show();
        }
    });


    $(document).on('click', '#btn_save_and_email', function () {
        var btn = $("#btn_save_and_email");
        var form_data = $("#msform").serialize();
        btn.text('Please wait...').addClass('disabled').attr('disabled', 'true');
        $.ajax({
            url: 'send_job_email.php',
            type: 'post',
            data: form_data,
            dataType: 'json',
            success: function(status) {
                btn.text('Submit').removeClass('disabled').removeAttr('disabled');
                if (status.msg == 'success') {
                    $("#error_message").hide();
                    $("#success_message").text(status.response).show();
                    $('#msform')[0].reset();
                    setTimeout(function(){
                        location.reload();
                    }, 5000);
                } else if (status.msg == 'error') {
                    $("#success_message").hide();
                    $("#error_message").text(status.response).show();
                }
            }
        });
    })