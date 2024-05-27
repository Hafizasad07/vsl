/**
 * Created by Asif on 8/19/2016.
 */
function hide_div(id) {
    $(id).hide();
}
function show_div(id) {
    $(id).fadeIn(3000);
}
function autoHide(ele) {
    $(ele).delay(7000).fadeOut('slow');
}
function AddErrorInfo(id, msg) {
    $(id).addClass("error_border");
    $(id).attr("data-toggle", "tooltip");
    $(id).attr("data-placement", "top");
    $(id).attr("title", msg);
    $(id).tooltip('enable');
    $(id).tooltip('show');
}
function removeErrorInfo(id) {
    $(id).removeClass("error_border");
    $(id).removeAttr("data-toggle");
    $(id).removeAttr("data-placement");
    $(id).removeAttr("title");
    $(id).tooltip('disable');
}

function ValueIsNull(id, msg, fcs) {
    if (!$(id).length) {
        return false;
    }
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if ($(id).val() === "" || $(id).val().trim() === '') {
        AddErrorInfo(id, msg);
        if($(id).val().trim() === ''){
            $(id).val("");
        }
        if (fcs == 1) {
            $(id).focus()
        }

        return true;
    } else {
        if ($(id).is('[type="email"]')) {
            var address = $(id).val();
            if (reg.test(address) == false) {
                console.log("Please enter a valid email");
                AddErrorInfo(id, "Please enter a valid email");
                if (fcs == 1) {
                    $(id).focus();
                }
                return true;
            }
        }
        removeErrorInfo(id);
        return false;
    }
}
function selectRadio(name, msg, fcs) {
    var value = $('input[name="'+name+'"]').filter(':checked').val();
    if($('input[name="'+name+'"]').is(':checked')){
        if(value != ""){
            console.log('hi1');
            $('input[name="'+name+'"]').parent().removeClass("error_border");
            $('input[name="'+name+'"]').parent().removeAttr("data-toggle");
            $('input[name="'+name+'"]').parent().removeAttr("data-placement");
            $('input[name="'+name+'"]').parent().removeAttr("title");
            $('input[name="'+name+'"]').parent().tooltip('disable');
            return false;
        }else{
            console.log('Oo');
            return true;
        }
        console.log('hi2');
        return false;
    }else{
        console.log('go');
        //$('input[name="'+name+'"]').focus();
        $('input[name="'+name+'"]').parent().addClass("error_border");
        $('input[name="'+name+'"]').parent().attr("data-toggle", "tooltip");
        $('input[name="'+name+'"]').parent().attr("data-placement", "top");
        $('input[name="'+name+'"]').parent().attr("title", msg);
        $('input[name="'+name+'"]').parent().tooltip('enable');
        $('input[name="'+name+'"]').parent().tooltip('show');
        return true;
    }
    console.log('hi3');
    $('input[name="'+name+'"]').parent().removeClass("error_border");
    $('input[name="'+name+'"]').parent().removeAttr("data-toggle");
    $('input[name="'+name+'"]').parent().removeAttr("data-placement");
    $('input[name="'+name+'"]').parent().removeAttr("title");
    $('input[name="'+name+'"]').parent().tooltip('disable');
    return false;
}
function checkTravelKitForm() {

    if (ValueIsNull('#fname', "Please enter first name", 1)) { return false; }
    if (ValueIsNull('#lname', "Please enter last name", 1)) { return false; }
    if (ValueIsNull('#email', "Please enter email", 1)) { return false; }
    if (ValueIsNull('#address', "Please enter address", 1)) {return false; }
    if (ValueIsNull('#city', "Please enter city", 1)) { return false;}
    if (ValueIsNull('#country', "Please enter country", 1)) { return false; }
    if (ValueIsNull('#state', "Please enter zip", 1)) { return false; }
    if (ValueIsNull('#ccn', "Please enter credit card number", 1)) {
        return false;
    }else{
        var ccn = document.getElementById("ccn").value;
        if(!isValidCardNumber(ccn)){
            alert("Invalid credit card number. Please check your input and try again");
            $('#ccn').focus()
            return false;
        }
    }
    if (ValueIsNull('#ccname', "Please enter credit card name", 1)) { return false; }
    if(isExpiryDate(document.getElementById("exp2").value,document.getElementById("exp1").value)==false){
        alert("Credit Card expiry date is in the past! Please adjust your input.");
        $('#exp1').focus()
        return false;
    }
    if (ValueIsNull('#cvv', "Please enter card verification code", 1)) {return false;}
    return true;  // Submit
}


$(".validate_frm input").focusin(function () {
    $(this).removeClass('error_border');
});
$(".validate_frm input").focusout(function () {
    var name = $(this).attr("name");
    var msg = "Please enter " + name;
    ValueIsNull(this, msg);
});
function foucsevent(ele) {
    var msg = $(ele).attr("title");
    if ($(ele).is('[filed_req="1"]')) {
        ValueIsNull(ele, msg)
    }
}


