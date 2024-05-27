(function($) {
    $.fn.animateProgress = function(progress, duration, callback) {
        return this.each(function() {
            $(this).animate({
                width: progress + '%'
            }, {
                duration: duration,
                easing: 'linear',
                step: function(progress) {
                    var labelEl = $('.ui-label', this),
                        valueEl = $('.value', labelEl);
                    if (Math.ceil(progress) < 0 && $('.ui-label', this).is(":visible")) {
                        labelEl.hide();
                    } else {
                        if (labelEl.is(":hidden")) {
                            labelEl.fadeIn();
                        };
                    }
                    if (Math.ceil(progress) == 100) {
                        labelEl.text('Done');
                        setTimeout(function() {
                            labelEl.fadeOut();
                        }, 1000);
                    } else {
                        valueEl.text(Math.ceil(progress) + '%');
                    }
                },
                complete: function(scope, i, elem) {
                    if (callback) {
                        callback.call(this, i, elem);
                    };
                }
            });
        });
    };
})(jQuery);

function run_slide() {
    var duration = 20000;
    var slide = duration / 6;
    $("#slideshow > div:gt(0)").hide();
    setInterval(function() {
        $('#slideshow > div:first').fadeOut(1000).next().fadeIn(1000).end().appendTo('#slideshow');
    }, 5000);
    $('#progress_bar_slides .ui-label').hide();
    $('#progress_bar_slides').css('width', '0%');
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("1");
        $('#loading_1').fadeOut(400);
        $('#tick_1').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("2");
        $('#loading_2').fadeOut(400);
        $('#tick_2').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("3");
        $('#loading_3').fadeOut(400);
        $('#tick_3').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("4");
        $('#loading_4').fadeOut(400);
        $('#tick_4').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("5");
        $('#loading_5').fadeOut(400);
        $('#tick_5').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("6");
        $('#loading_6').fadeOut(400);
        $('#tick_6').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '100%');
        setTimeout("redirect_func()", 1000);
    });
    $('#progress_bar_full .ui-progress .ui-label').hide();
    $('#progress_bar_full .ui-progress').css('width', '0%');
    $('#progress_bar_full .ui-progress').animateProgress(100, duration);
}

function getCookieValue(a) {
    var b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
    return b ? b.pop() : '';
}

function run_slide_secure(options, em) {

        $('.progress_box').show();
        var duration = 20000;
        var slide = duration / 12;
        $('#progress_bar_slides .ui-label').hide();
        $('#progress_bar_slides').css('width', '0%');
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("1test");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_1').hide();
            $('#sec_2').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("2");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_2').hide();
            $('#sec_3').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("3");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_3').hide();
            $('#sec_4').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("4");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_4').hide();
            $('#sec_5').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("5");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_5').hide();
            $('#sec_6').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("6");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_6').hide();
            $('#sec_7').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("7");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_7').hide();
            $('#sec_8').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("8");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_8').hide();
            $('#sec_9').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("9");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_9').hide();
            $('#sec_10').show();
        });
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("10");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_10').hide();
            $('#sec_11').show();
        })
        $('#progress_bar_slides').animateProgress(100, slide, function() {
            console.log("11");
            $('#progress_bar_slides').css('width', '0%');
            $('#sec_11').hide();
            $('#sec_12').show();
        });
        $('#progress_bar_slides').animateProgress(100, '1565.66', function() {
            console.log("12");
            $('#progress_bar_slides').css('width', '100%');
            setTimeout($('#frmsignup').ajaxSubmit(options), 200);
        });
        $('#progress_bar_full .ui-progress .ui-label').hide();
        $('#progress_bar_full .ui-progress').css('width', '0%');
        $('#progress_bar_full .ui-progress').animateProgress(100, duration);

}

function run_slide_m() {
    var duration = 20000;
    var slide = duration / 6;
    $("#slideshow > div:gt(0)").hide();
    setInterval(function() {
        $('#slideshow > div:first').fadeOut(1000).next().fadeIn(1000).end().appendTo('#slideshow');
    }, 5000);
    $('#progress_bar_slides .ui-label').hide();
    $('#progress_bar_slides').css('width', '0%');
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("1");
        $('#loading_1').fadeOut(400);
        $('#tick_1').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("2");
        $('#loading_2').fadeOut(400);
        $('#tick_2').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("3");
        $('#loading_3').fadeOut(400);
        $('#tick_3').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("4");
        $('#loading_4').fadeOut(400);
        $('#tick_4').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("5");
        $('#loading_5').fadeOut(400);
        $('#tick_5').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '0%');
    });
    $('#progress_bar_slides').animateProgress(100, slide, function() {
        console.log("6");
        $('#loading_6').fadeOut(400);
        $('#tick_6').delay(400).fadeIn();
        $('#progress_bar_slides').css('width', '100%');
        setTimeout("open_3rdmodal()", 500);
    });
    $('#progress_bar_full .ui-progress .ui-label').hide();
    $('#progress_bar_full .ui-progress').css('width', '0%');
    $('#progress_bar_full .ui-progress').animateProgress(100, duration);
}

function redirect_func() {
    console.log("complte");
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val()
    var email = $('#email').val()
    var zip = $('#zip').val()
    redirect_to("http://creditsecret.org/securecheckout-1b/index.php?inf_field_FirstName=" + firstname + "&inf_field_LastName=" + lastname + "&inf_field_Email=" + email + "&inf_field_PostalCode=" + zip);
}

function open_3rdmodal() {
    $("#popUpFrm2").modal("hide");
    $("#popUpFrm3").modal({
        backdrop: 'static',
        keyboard: false
    });
}