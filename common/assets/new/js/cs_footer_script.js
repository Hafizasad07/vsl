$(document).ready(function () {
    $('.phone-mask').mask('(999) 999-9999');

});
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}



function getLocation(obj) {
    getAddressInfoByZip(obj.value);
}

function response(obj) {
    console.log(obj);
}

function getAddressInfoByZip(zip) {
    if (zip.length >= 5 && typeof google != 'undefined') {
        var addr = {};
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': zip}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results.length >= 1) {
                    for (var ii = 0; ii < results[0].address_components.length; ii++) {
                        var street_number = route = street = city = state = zipcode = country = formatted_address = '';
                        var types = results[0].address_components[ii].types.join(",");
                        if (types == "street_number") {
                            addr.street_number = results[0].address_components[ii].long_name;
                        }
                        if (types == "route" || types == "point_of_interest,establishment") {
                            addr.route = results[0].address_components[ii].long_name;
                        }
                        if (types == "sublocality,political" || types == "locality,political" || types == "neighborhood,political" || types == "administrative_area_level_3,political") {
                            addr.city = (city == '' || types == "locality,political") ? results[0].address_components[ii].long_name : city;

                            document.getElementsByClassName("billing_city")[0].value = addr.city;
                            document.getElementsByClassName("billing_city")[1].value = addr.city;
                        }
                        if (types == "administrative_area_level_1,political") {
                            addr.state = results[0].address_components[ii].short_name;

                            document.getElementsByClassName("billing_state")[0].value = addr.state;
                            document.getElementsByClassName("billing_state")[1].value = addr.state;
                        }
                        if (types == "postal_code" || types == "postal_code_prefix,postal_code") {
                            addr.zipcode = results[0].address_components[ii].long_name;
                        }
                        if (types == "country,political") {
                            addr.country = results[0].address_components[ii].long_name;

                            //document.getElementsByClassName("Contact0Country")[0].value = addr.country;
                            //document.getElementsByClassName("Contact0Country")[1].value = addr.country;
                        }
                    }
                    addr.success = true;
                    /*for (name in addr) {
                     console.log('### google maps api ### ' + name + ': ' + addr[name]);
                     }
                     response(addr);*/

                } else {
                    response({success: false});
                }
            } else {
                response({success: false});
            }
        });
    } else {
        response({success: false});
    }
}

/// function for cookie
function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

var ___hashAdded = 1;
var ___location  = window.location;
$(document).ready(function(){

    function addHash()
    {
        window.location.href = window.location + '#';
    }
    function addHashes()
    {
        if(window.location.href.indexOf('##') == '-1'){
            setTimeout(addHash, 1000);
            setTimeout(addHash, 1100);

            if(___hashAdded == 1){
                ___hashAdded+=2;
            }
        }
    }


    if(___hashAdded == 1) {
        addHashes();
    }

    function isMobile() {
        var isMobile = false; //initiate as false
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
            || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

        return isMobile;
    }




    var getQueryString = function ( field, url ) {
        var href = url ? url : window.location.href;
        var reg = new RegExp( '[?&]' + field + '=([^&#]*)', 'i' );
        var string = reg.exec(href);
        return string ? string[1] : null;
    };

    var ei = getQueryString('ei');

    if ( ei != null && ei == 'f' ){
        //console.log('dont show ie');
    }else{

        (function(history){
            const pushState = history.pushState;
            history.pushState = function(state) {
                if (typeof history.onpushstate == "function") {
                    history.onpushstate({state: state});
                }
                if(___hashAdded >= 1) {
                    setTimeout(addHashes, 2000);
                }
                return pushState.apply(history, arguments);
            }
        })(window.history);

        setTimeout(function(){

            document.addEventListener("mouseleave", function(e){
                if( e.clientY < 0 )
                {
                    open_exit_splash();
                }
            }, false);

        }, 20000);

        setTimeout(function(){
            $("#copyRightNote").html($("#copyRightNote").html() + "!");

            window.onhashchange = function(e) {
                /*alert("onhashchange");*/
                if( isMobile() ) {

                    if( (e.oldURL.indexOf("###")  > '-1')  || (e.oldURL.indexOf("#%23%23")   > '-1')
                        || (e.oldURL.indexOf("##")  > '-1')  || (e.oldURL.indexOf("#%23")   > '-1')) {
                        open_exit_splash();
                        e.preventDefault();
                        return false;
                    }
                }else {
                    if(e.oldURL.indexOf("##")  > '-1' ) {
                        /* open_exit_splash();
                         e.preventDefault();
                         return false;*/
                    }
                }
            }


        }, 20000);
    }


});


function conitnueWatching() {
    $('#exitSplashModal').modal("hide");
    play_video()
}
function open_exit_splash() {

    $('#exitSplashModal').modal("show");
    stop_video()
}
function stop_video() {
    /* window._wq = window._wq || [];
     _wq.push({ id: "Ja2THbW2Q1M", onReady: function(video) {

             video.pause()
         }});*/
}
function play_video() {
    /*window._wq = window._wq || [];
    _wq.push({ id: "Ja2THbW2Q1M", onReady: function(video) {

            video.play();
        }});*/
}
function prepareFrame() {
    target = document.getElementById("youtube_placeholder");
    var ifrm = document.createElement("iframe");
    ifrm.setAttribute("src", "https://www.youtube.com/embed/Ja2THbW2Q1M?&theme=dark&autohide=2&modestbranding=1&showinfo=0&rel=0");
    ifrm.setAttribute("frameborder","0");

    //document.body.appendChild(ifrm);
    //target.appendChild(ifrm);
    target.insertBefore( ifrm, target.firstChild )


}
prepareFrame();
