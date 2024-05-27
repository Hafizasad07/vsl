/**
 * Created by Asif on 8/19/2016.
 */
function show_message_box(id, text) {
    $("#msg_box" + id).fadeIn(3000);
    $("#msg_err" + id).html(text);
}
function autoHide(ele) {
    $(ele).delay(7000).fadeOut('slow');
}
function hide_message_box(id) {
    $("#msg_box" + id).hide();
}
function redirect_to(page) {
    window.location = page;
}
function hide_div(id) {
    $(id).hide();
}
function show_div(id) {
    $(id).fadeIn(3000);
}
function success_message(id, msg) {
    $("#successmsgBx" + id).fadeIn(3000);
    $("#msg_suc" + id).html(msg);
}
function autoHide(ele) {
    $(ele).delay(7000).fadeOut('slow');
}
function AddErrorCls(id) {
    $(id).addClass("error_border");
}
function RemoveErrorCls(id) {
    $(id).removeClass("error_border");
}
function ValueIsNull(id, msg, msgId) {
    var field_val = document.getElementById(id).value;
    if (field_val === "") {
        show_message_box(msgId, msg);
        AddErrorCls("#" + id);
        return true;
    } else {
        RemoveErrorCls("#" + id);
        return false;
    }
}

function saveIntoIs() {

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var error = 0;
    if ($('#firstname').val() === "") {
        AddErrorCls('#firstname');
        return false;
    }
    if ($('#lastname').val() === "") {
        AddErrorCls('#lastname');
        return false;
    }
    if ($('#email').val() === "") {
        AddErrorCls('#email');
        return false;
    } else if (document.getElementById('email').value != '') {

        var address = document.getElementById('email').value;
        if (reg.test(address) == false) {
            AddErrorCls('#email');
            //show_div("#invalidemail");
            return false;
        }
    }
    if ($('#zip').val() === "") {
        AddErrorCls('#zip');
        return false;
    }
    // alert(error);
    // if(error === 1){
    //     return false;
    // }
    hide_message_box(1);
    show_div("#loader");
    var querystring = $("#psfrm1").serialize();
    $('#psfrm1_submit_btn').attr('disabled','disabled');
    setTimeout(function() {
        $.ajax({
            type: 'POST',
            data: querystring,
            url: 'ajax.php',
            success: function(resp) {
                //console.log(resp);
                if (resp.indexOf('success') >= 0) {
                    hide_div("#loader");
                    $("#popUpFrm2").modal({backdrop: 'static', keyboard: false});

                    $("#popUpFrm").modal("hide");
                    run_slide();
                    //scanProcess();
                }else{
                   $('#psfrm1_submit_btn').removeAttr('disabled');
                    hide_div("#loader");
                    show_message_box(1,"There was a problem please try again!");
                }

            },
            error: function(resp) {
            }
        });
    }, 2000);

}
function saveIntoIs_m() {

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var error = 0;
    if ($('#firstname').val() === "") {
        AddErrorCls('#firstname');
        return false;
    }
    if ($('#lastname').val() === "") {
        AddErrorCls('#lastname');
        return false;
    }
    if ($('#email').val() === "") {
        AddErrorCls('#email');
        return false;
    } else if (document.getElementById('email').value != '') {

        var address = document.getElementById('email').value;
        if (reg.test(address) == false) {
            AddErrorCls('#email');
            //show_div("#invalidemail");
            return false;
        }
    }
    if ($('#zip').val() === "") {
        AddErrorCls('#zip');
        return false;
    }
    // alert(error);
    // if(error === 1){
    //     return false;
    // }
    hide_message_box(1);
    show_div("#loader");
    var querystring = $("#psfrm1").serialize();
    $('#psfrm1_submit_btn').attr('disabled','disabled');
    setTimeout(function() {
        $.ajax({
            type: 'POST',
            data: querystring,
            url: 'ajax.php',
            success: function(resp) {
               // console.log(resp);
                if (resp.indexOf('success') >= 0) {
                    hide_div("#loader");
                    $("#popUpFrm2").modal({backdrop: 'static', keyboard: false});
                    $("#popUpFrm").modal("hide");
                    run_slide_m();

                }else{
                    $('#psfrm1_submit_btn').removeAttr('disabled');
                    hide_div("#loader");
                    show_message_box(1,"There was a problem please try again!");
                }

            },
            error: function(resp) {
            }
        });
    }, 2000);

}

