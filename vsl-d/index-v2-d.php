<?php
include_once '../common/initialize.php';
@include_once '../common/pixels/google_campaign_ad_pixel.php';
$qs = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : "";


$substringToExclude = "rt_variation_id";

//if (strpos($_SERVER["REQUEST_URI"], $substringToExclude) === false) {
    // If the substring is not found in REQUEST_URI, call the test_log function
   // test_log('::Redirection to ' . $_SERVER["REQUEST_URI"] . " is from " . $_SERVER["HTTP_REFERER"]);
//}

$qs = str_replace("dbvid=", "dbrefvid=", $qs);
$qs = str_replace("dbfid=", "dbreffid=", $qs);
$qs = isset($qs) ? '?' . $qs : $qs;
$ptype = "vsl";
$cId = 1;
$fname = "yt";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php @include_once("../common/pixels/hyros-pixel.php") ?>
<?php @include_once("../common/head_pixel.php") ?>

<script type="text/javascript">
(function (v, i, d, a, l, y, t, c, s) {
    y='_'+d.toLowerCase();c=d+'L';if(!v[d]){v[d]={};}if(!v[c]){v[c]={};}if(!v[y]){v[y]={};}var vl='Loader',vli=v[y][vl],vsl=v[c][vl + 'Script'],vlf=v[c][vl + 'Loaded'],ve='Embed';
    if (!vsl){vsl=function(u,cb){
        if(t){cb();return;}s=i.createElement("script");s.type="text/javascript";s.async=1;s.src=u;
        if(s.readyState){s.onreadystatechange=function(){if(s.readyState==="loaded"||s.readyState=="complete"){s.onreadystatechange=null;vlf=1;cb();}};}else{s.onload=function(){vlf=1;cb();};}
        i.getElementsByTagName("head")[0].appendChild(s);
    };}
    vsl(l+'loader.min.js',function(){if(!vli){var vlc=v[c][vl];vli=new vlc();}vli.loadScript(l+'player.min.js',function(){var vec=v[d][ve];t=new vec();t.run(a);});});
})(window, document, 'Vidalytics', 'vidalytics_embed_7A4_LDNSgC1dyJnI', 'https://quick.vidalytics.com/embeds/XCINKccT/7A4_LDNSgC1dyJnI/');
</script>
   
<meta name="robots" content="noindex">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name=viewport content="width=device-width, initial-scale=1.0" />

    <title>FREE VIDEO Reveals...</title>
 
    <link href="<?php echo ASSETS_PATH ?>/secret/css/ps-new2.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo ASSETS_PATH ?>/secret/css/ui.progress-bar-download.css" media="screen">
	<link rel="stylesheet" href="<?php echo ASSETS_PATH ?>/secret/css/normalize.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH ?>/secret/css/asPieProgress.min.css">
	<link rel="stylesheet" href="<?php echo ASSETS_PATH ?>/secret/css/modal.min.css">
	
	<!-- Main CSS STEPS-->
	
	<link rel="stylesheet" href="<?php echo ASSETS_PATH ?>/secret/assets/css/jquery-steps.min.css" >
    <link rel="stylesheet" href="<?php echo ASSETS_PATH ?>/secret/assets/css/bootstrap.min.css" >
    <!--<link rel="stylesheet" href="assets/css/circle-progress.css" >-->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH ?>/secret/assets/css/style.css?v=3.1" >
	<script src="<?php echo ASSETS_PATH ?>/secret/assets/js/jquery-3.2.1.min.js"></script>

    <!-- jQuery (necessary for jQuery plugins) -->
   
    <!-- for form builder -->
	
    <!-- desktop css      -->

    <link rel="stylesheet" href="vsl-d-style.css">
<script type="text/javascript">


var cookieExpiration = 30; // cookie stays in browser this many days
function WriteCookie(name,value)
{
	var exp = '';
	var today = new Date();
	var expdate = today.getTime() + (cookieExpiration * 24 * 60 * 60 * 1000);
	today.setTime(expdate);
	exp = '; expires=' + today.toGMTString();
	document.cookie = name + "=" + value + '; path=/' + exp;
}

function showit() { document.getElementById('hiddencontent').style.display="block"; }

</script>


<script>

function setCookie(cname, cvalue, cexpire) {
document.cookie = cname + '=' + escape(cvalue) +
(typeof cexpire == 'date' ? 'expires=' + cexpire.toGMTString() : '') +
';path=/;domain=creditsecret.org';
}


var getQueryString = function ( field, url ) {
								var href = url ? url : window.location.href;
								var reg = new RegExp( '[?&]' + field + '=([^&#]*)', 'i' );
								var string = reg.exec(href);
								return string ? string[1] : null;
							};

		var transId = getQueryString('transaction_id');

		if ( transId != null){


		    setCookie('TransId',transId,'1');


		}

</script>


<style type="text/css">
  .bottomlink a {
    color: #dddddd;
  }

  .form-check label {
    float: left;
}
</style>




<style type="text/css">
    *{ margin: 0; padding: 0;}
body{
	font-family: "Open Sans","Arial", sans-serif;
}

  .opt {
    margin: 0 auto;
    max-width: 800px;
	margin-top:60px;

	border-top-left-radius: 8px;
	border-top-right-radius: 8px;

	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 0px;
    background-color: #ffffff;
	padding-bottom: 0px;
  }


  .opt .center{display: block;
    margin-left: auto;
    margin-right: auto}


  @media (max-width:500px) {
   .opt {
        	margin-top:-190px;
    }
	.modal-body 
  {width: 82%!important;}
  #noLeave{width: 82%!important;}
}

  .container-1100 {
    margin: 0 auto;
    max-width: 66.875em;
    padding: 0 1em
  }

  .testimonial-wrapper {
    width: 100%;
    background-color: #209DD2;
    padding: 0px 0 5px 0;
    height:250px;
    margin: 0;
    bottom: 0;
    left: 0;
    right: 0
}

@media (max-width:43.75em) {
    .testimonial-wrapper {
        position: relative
    }
}

.testimonial-container {
    display: none;
    height: 5em;
    padding: 14px 0;
    overflow: hidden;
    position: relative;
    color: #fff;
	margin-top:20px;
}

.testimonial-container:after,
.testimonial-container:before {
    content: " ";
    display: table;
    line-height: 0
}

.testimonial-container:after {
    clear: both
}

@media (max-width:43.75em) {
    .testimonial-container {
        height: auto
    }
}

.testimonial-container .aside {
    min-height: 1px;
    padding-left: 1em;
    padding-right: 1em;
    box-sizing: border-box
}

@media (min-width:43.75em) {
    .testimonial-container .aside {
        float: left;
        width: 42.66666667%
    }
}

.testimonial-container .aside .aside-interior {
    overflow: hidden
}

.testimonial-container .aside img {
    float: left;
	width:50px;
	height:50px;
}

@media (max-width:30em) {
    .testimonial-container .aside img {
        width: 50px
    }
}

.testimonial-container .aside p {
    font-size: 14px;
    margin-top:16px;
	font-weight: 700;
    text-align: center
}

@media (max-width:30em) {
    .testimonial-container .aside p {
        font-size: 12px
    }
}

@media (min-width:700px) {
    .testimonial-container .aside {
        height: 100%;
        border-right: 1px solid #fff
    }
}

@media (max-width:699px) {
    .testimonial-container .aside {
        overflow: hidden;
        padding: 0 2em .2em;
        border-bottom: 1px solid #fff
    }
    .testimonial-container .aside .aside-interior {
        margin: 0 auto
    }
    .testimonial-container .aside img {

        margin: 0
    }
    .testimonial-container .aside p {
        margin-top: 0;
		    margin-top: 16px;
        padding: .45em 0 0
    }
}

.testimonial-container .testimonials {
    min-height: 1px;
    padding-left: 1em;
    padding-right: 1em;
    box-sizing: border-box;
    overflow: hidden;
    padding-left: 2.5em
}

@media (min-width:43.75em) {
    .testimonial-container .testimonials {
        float: left;
        width: 56.33333333%;
		font-size:12px;
    }
}

.testimonial-container .testimonials .text {
    position: absolute;
    display:none;

}

.testimonial-container .testimonials .text.active-text {

    margin-left: 0
}

.testimonial-container .testimonials .text p {
    font-size: 1.2em;
    font-weight: 500;
    padding: 0;
    margin: .2em 0 0 0
}
.displaNone{ display: none}
@media (max-width:699px) {
    .testimonial-container .testimonials {
        background-position: 0 .83em;
        position: relative;
        height: 80px;
        padding-left: 0
    }
    .testimonial-container .testimonials .text p {
        padding-left: 0;
        padding-right: 1em;
        font-size: 1em;
        text-align: center;
        padding: 0 2em;
        margin: 1.3em 0 0 0
    }
}

@media (max-width:30em) {
    .testimonial-container .testimonials {
        height: 250px
    }
}

.testimonial-container .testimonials .text {
    position: absolute;

}

.testimonial-container .testimonials .text.active-text {

}

.testimonial-container .testimonials .text p {
    font-size: 1.2em;
    font-weight: 500;
    padding: 0;
    margin: .2em 0 0 0
}

@media (max-width:699px) {
    .testimonial-container .testimonials {
        background-position: 0 .83em;
        position: relative;
        height: 80px;
        padding-left: 0
    }
    .testimonial-container .testimonials .text p {
        padding-left: 0;
        padding-right: 1em;
        font-size: 1em;
        text-align: center;
        padding: 0 2em;
        margin: 1.3em 0 0 0
    }
}

@media (max-width:30em) {
    .testimonial-container .testimonials {
        height: 250px;
    }
}

.pie_progress {
      width: 180px;
      margin: 10px auto;
    }
    @media all and (max-width: 768px) {
      .pie_progress {
        width: 60%;
        max-width: 180px;
      }
    }
    /*FOR NAV TOP MENU*/
    nav{margin:0 auto 10px;padding:0;overflow:hidden;background-color:#333;font-family:Tahoma;font-size:13.5px;padding:10px 10px 0}
    nav ul{list-style-type:none;float:right}
    nav .logo_div{float:left;margin-top:3px}
    nav ul li{float:left}
    nav ul li a{display:inline-block;color:#BBB;text-align:center;padding:14px 16px;text-decoration:none}
    nav ul li a:hover{background-color:#111}
    #nav-toggle{background:none;position:absolute;top:-9px;right:0;line-height:45px;padding:5px 15px 0 15px;
        color:#FFF;border:none;font-size:1.5em;font-weight:bolder;cursor:pointer;outline:none;z-index:10000000000000}
@media only screen and (max-width:414px) {
    nav{padding:10px;}
    nav ul{float: none;display:none;    margin-top: 23px;}
    nav ul li{ float: none; display: block; border-bottom: 1px solid; font-size: 16px;}
    nav ul li a {display: block; padding: 10px;}
    nav .logo_div{ float: none; display: none;}
    .toggle_menu{ display:block;}

}

#noLeave{
	width:100%;
	max-width:330px!important;
}
.show{
	visibility:none
}
</style>

<style>
.flexrow {
   display: flex;
   flex-direction: row;
   justify-content: space-around;
}
.flexcol {

   flex-direction: column;

}
.flexcol div{
	margin-top:15px;
}
@media (min-width: 768px) {
	.fixed{
		margin-left:60px;margin-right:60px
	}
}
</style>

<script src="<?php echo ASSETS_PATH ?>/secret/assets/js/script.js"></script>





    <script src="<?php echo ASSETS_PATH ?>/secret/js/progress_download2.js"></script>





	





    

<?php //require_once('/app/web/wp-content/root/pl-integration.php'); ?>
</head>

<body style="background-color: black;" >
<?php @include_once("../common/body_pixel.php") ?>
<?php @require_once "../common/loader_old.php" ?>
<input type="hidden" name="reason" id="reason" value="Credit Card">

<!-- The Modal -->
<div class="modal" id="myModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">

		<div id="video-popup-inside">
			  <h1><span class="wait">WAIT!</span></h1>
			  <h2>By clicking out of this page you'll forfeit the chance to learn about this
				exciting and exclusive opportunity that could <u><strong>raise your credit score<br> in as little as 30 days!</strong></u>
				</h2>
				<br>
			  <div id="noLeave" onclick="$('.modal').modal('hide');">Continue Watching</div>
		<!--	  <div id="yesLeave">
				 <a href="https://thesmartmoneysecret.com/readme/">Read transcript</a>
			  </div>-->
       </div>

      </div>



    </div>
  </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>

  <style>

  </style>
  
<style type="text/css">@import url(https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900);</style>
<style type="text/css">.databot-tracking-overlay{z-index:10001;position:fixed;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,.5);cursor:pointer}.databot-tracking-loader{font-family:inherit;position:fixed!important;z-index:10002;background:#fbfbfb;box-shadow:0 2px 3px rgba(0,0,0,.1);float:left;font-size:16px;left:50%;margin:0 auto;padding:24px 32px;position:relative;text-align:center;top:50%;-webkit-transform:translateY(-50%) translateX(-50%);transform:translateY(-50%) translateX(-50%);width:320px}.databot-tracking-loader h1{color:#111;font-size:24px;font-weight:400;margin:8px 0 24px;text-align:center}.databot-tracking-loader p{color:#303030;font-weight:300;line-height:24px;margin:8px 0 24px;text-align:center}@keyframes lds-gear{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}50%{-webkit-transform:rotate(180deg);transform:rotate(180deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@-webkit-keyframes lds-gear{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}50%{-webkit-transform:rotate(180deg);transform:rotate(180deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}.databot-tracking-loader .lds-gear>div{-webkit-transform-origin:100px 100px;transform-origin:100px 100px;-webkit-animation:lds-gear 1s infinite linear;animation:lds-gear 1s infinite linear;position:relative}.databot-tracking-loader .lds-gear>div div{position:absolute;width:26px;height:192px;background:#2ecc71;left:100px;top:100px;-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.databot-tracking-loader .lds-gear>div div:first-child{width:152px;height:152px;border-radius:50%}.databot-tracking-loader .lds-gear>div div:nth-child(3){-webkit-transform:translate(-50%,-50%) rotate(30deg);transform:translate(-50%,-50%) rotate(30deg)}.databot-tracking-loader .lds-gear>div div:nth-child(4){-webkit-transform:translate(-50%,-50%) rotate(60deg);transform:translate(-50%,-50%) rotate(60deg)}.databot-tracking-loader .lds-gear>div div:nth-child(5){-webkit-transform:translate(-50%,-50%) rotate(90deg);transform:translate(-50%,-50%) rotate(90deg)}.databot-tracking-loader .lds-gear>div div:nth-child(6){-webkit-transform:translate(-50%,-50%) rotate(120deg);transform:translate(-50%,-50%) rotate(120deg)}.databot-tracking-loader .lds-gear>div div:nth-child(7){-webkit-transform:translate(-50%,-50%) rotate(150deg);transform:translate(-50%,-50%) rotate(150deg)}.databot-tracking-loader .lds-gear>div div:nth-child(8){width:80px;height:80px;background:#fff;border-radius:50%}.databot-tracking-loader .lds-gear{width:59px!important;height:59px!important;-webkit-transform:translate(-29.5px,-29.5px) scale(.295) translate(29.5px,29.5px);transform:translate(-29.5px,-29.5px) scale(.295) translate(29.5px,29.5px)}</style><style type="text/css">#dbmodal .modal[aria-hidden=true]{display:none}#dbmodal .modal{font-family:-apple-system,BlinkMacSystemFont,avenir next,avenir,helvetica neue,helvetica,ubuntu,roboto,noto,segoe ui,arial,sans-serif}#dbmodal .modal__overlay{position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,.6);display:flex;justify-content:center;align-items:center;z-index:9999!important}#dbmodal .modal__container{background-color:#fff;padding:30px;max-width:500px;max-height:100vh;border-radius:4px;overflow-y:auto;box-sizing:border-box}#dbmodal .modal__header{display:flex;justify-content:space-between;align-items:center}#dbmodal .modal__title{margin-top:0;margin-bottom:0;font-weight:600;font-size:1.25rem;line-height:1.25;color:#00449e;box-sizing:border-box}#dbmodal .modal__close{background:transparent;border:0}#dbmodal .modal__header .modal__close:before{content:"\2715"}#dbmodal .modal__content{margin-top:.5rem;margin-bottom:.8rem;line-height:1.5;color:rgba(0,0,0,.8)}#dbmodal .modal__btn{font-size:.875rem;padding:.5rem 1rem;background-color:#e6e6e6;color:rgba(0,0,0,.8);border-radius:.25rem;border-style:none;border-width:0;cursor:pointer;-webkit-appearance:button;text-transform:none;overflow:visible;line-height:1.15;margin:0;will-change:transform;-moz-osx-font-smoothing:grayscale;-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-transform:translateZ(0);transform:translateZ(0);transition:-webkit-transform .25s ease-out;transition:transform .25s ease-out;transition:transform .25s ease-out,-webkit-transform .25s ease-out}#dbmodal .modal__btn:focus,#dbmodal .modal__btn:hover{-webkit-transform:scale(1.05);transform:scale(1.05)}#dbmodal .modal__btn-primary{background-color:#00449e;color:#fff}#dbmodal .modal__footer{text-align:center;margin-top:.3rem}#dbmodal a{color:#1e90ff}</style><style type="text/css">#dbmodal .modal__btn{min-width:300px;margin-top:20px}#dbmodal input[type=text],select{width:100%;margin-bottom:10px;padding:10px;border:1px solid #ccc}#dbmodal .hide{display:none}#dbmodal .show{display:block}#dbmodal .row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin:0 -16px}#dbmodal .col{-ms-flex:1;flex:1;display:flex;align-items:center;justify-content:center}#dbmodal .col-25{-ms-flex:25%;flex:25%}#dbmodal .col-50{-ms-flex:50%;flex:50%}#dbmodal .col-75{-ms-flex:75%;flex:75%}#dbmodal .col-100{-ms-flex:100%;flex:100%}#dbmodal .col,.col-25,.col-50,.col-75,.col-100{padding:0 16px}</style><style type="text/css">#dbmodal .modal__btn{min-width:300px;margin-top:20px}#dbmodal input[type=text],select{width:100%;margin-bottom:10px;padding:10px;border:1px solid #ccc}#dbmodal .hide{display:none}#dbmodal .show{display:block}#dbmodal .row{display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin:0 -16px}#dbmodal .col{-ms-flex:1;flex:1;display:flex;align-items:center;justify-content:center}#dbmodal .col-25{-ms-flex:25%;flex:25%}#dbmodal .col-50{-ms-flex:50%;flex:50%}#dbmodal .col-75{-ms-flex:75%;flex:75%}#dbmodal .col-100{-ms-flex:100%;flex:100%}#dbmodal .col,.col-25,.col-50,.col-75,.col-100{padding:0 16px}</style>
<div id="databot-tracking-loader" class="databot-tracking-loader" style="display:none"> <p>Your request is being processed. Please wait..</p> <div class="lds-css" style="padding-left:40%"> <div class="lds-gear" style=""> <div> <div></div> <div></div> <div></div> <div></div> <div></div> <div></div> <div></div> <div></div> </div> </div> </div> </div>

<div align="center">
  <p><img src="https://creditsecrets.com/secret/soundon.jpg" class="img-responsive" style="max-width:300px;"></p>
    <center><h1 style="font-size: calc(24px + 6 * ((100vw - 320px) / 680));color: white;font-weight: 700; max-width: 800px; padding: 10px;">Upgrade Your Car, Your Home, And Your Credit Score In 2024, By Doing This Simple <u>5-Min Trick</u> Once Daily... </h1></center>
  <p>&nbsp;</p>
    <center>
        <div class="video-d-style">
        <!-- <div id="vidalytics_embed_1BxVR37PXiPMaLFG" style="width: 100%; position:relative; padding-top: 177.94%;"></div> -->
        <div id="vidalytics_embed_7A4_LDNSgC1dyJnI" class="video-frame"></div>

        </div>
    </center>
</div>
</div>

<p>&nbsp;</p>
<div style="margin-top:50px"></div>
<div id="hiddencontent" style="display:none">

<div class="opt">
    <div class="step1">
        <h2>IMPORTANT:</h2>
        <em><h3>Before we can approve your access to this exclusive program,
            we need to ask you a few quick questions</h3></em>
        <p class="yellowBg_p">When you have access to this powerful system, you'll have the ability to live a life most
            people could only dream of... No matter how bad your credit is today. <b>Credit Secrets</b> could be your first step towards a life of financial freedom... But because this
            system is so powerful, we need you to answer a few questions before we can approve your access</p>
       <div id="link1">
       
	   <!--<a href="javascript:void(0)"  onclick="window.location.replace('https://creditsecrets.com/secret/steps.php')" ><img src="<?php echo ASSETS_PATH ?>/secret/images/continue.png" class="center" style="width:70%; height:106px"/></a>-->
	   <a href="javascript:void(0)"  onclick="nextStep(2);" ><img src="<?php echo ASSETS_PATH ?>/secret/images/continue.png" class="center" style="width:70%; height:106px"/></a>
       
	   </div>

    </div><!-- <div class="rules_box"> -->
	
	
	<!-- Updated Design -->
	<section class="fixed py-5 form-builder-details step2 displaNone"  id="main-section" style="height:inherit;padding-bottom:0 !important">
        <div class="pb-3 mb-3 rounded ideal-card-wrapper">

            <div class="ideal-card-body">
                <div class="step-app form-builder-steps-wizard position-relative" id="steps-wizard">

                    <div class="pt-4 step-top">

                        <div class="step-header ">
                            <div class="gap-2 mb-3 d-flex align-items-center">
                                <h4 class="mb-0 text-white ps-4 pe-2 fs-5 fw-bold">Question</h4>
                                <div class="px-2 slides-numbers bg-red is-radius-8" style="display: block;">
                                    <span id="current-count" class="text-white totalactive fw-medium fs-6">1</span> <span
                                        class="px-1 text-white fw-medium fs-6">of</span> <span
                                        class="text-white total fw-medium fs-6">3</span>
                                </div>
                            </div>
                        </div>

                        <ul id="step-steps"
                            class="gap-2 pb-3 mx-4 step-steps d-flex justify-content-between list-unstyled"
                            style="max-width: 600px; background-color:initial;">
                            <li data-step-target="step1" class="step-border">

                            </li>
                            <li data-step-target="step2" class="step-border">

                            </li>
                            <li data-step-target="step3" class="step-border">

                            </li>
                            <li data-step-target="step4">

                            </li>
                            <li data-step-target="step5">

                            </li>

                        </ul>
                    </div>


                    <div class="px-0 border-0 step-content">
					
						
							<div class="step-tab-panel" data-step="step1">
								<div class="ideal-card" >
									<div class="px-3 py-1 ideal-card-body">
										<div class="media-wrap">
											<h1 class=" fs-36 fw-bold text-clr-black1 firstStepHeading">Do you agree to use
												this
												System Ethically?</h1>
											<p class="mt-3 mb-0 fs-18 text-clr-black2 firstStepContent">This system is
												designed to remove
												unproven, inaccurate marks from
												your credit
												report. If you plan on opening new cards
												just to default on them, knowing you can just use this secret again,
												do not order this system.</p>
										</div>
										<div class="step-footer justify-content-end">
											<div class="next-back" data-step-action="next" class="step-btn">

												<a class="float-right my-4 btn btn-outline-primary stage-next-btn btn-next">YES</a>
												
											   
											</div>
											<a class="float-left my-4 btn btn-outline-primary stage-back-btn " href="javascript:void(0)" onclick="alert('Sorry! In Order To Access This Powerful Program, You Must Agree To These Rules')">NO</a>
								  
										</div>

										<!--<div class="py-2 d-flex align-items-center justify-content-center">
											<img src="assets/img/step-bottom-logo.svg" class="img-fluid" alt="">
										</div>-->
									</div>
								</div>
							</div>
							<div class="px-3 py-1 step-tab-panel" data-step="step2">
								<div class="media-wrap">
									<h1 class=" fs-36 fw-bold text-clr-black1 firstStepHeading">Do you agree to use this
										System Responsibly?</h1>
									<p class="mt-3 mb-0 fs-18 text-clr-black2 firstStepContent">As your credit score rises,
										you
										may receive offers for low-interest loans, credit cards etc; and may
										see your current
										credit lines dramatically increase. Please do not accept offers of
										money you can't pay back.</p>
								</div>
								<div class="step-footer justify-content-end">
	   

									<div class="next-back" data-step-action="next" class="step-btn">
										<a class="float-right my-4 btn btn-outline-primary stage-next-btn btn-next">YES</a>
									</div>
									
										<a class="float-left my-4 btn btn-outline-primary stage-back-btn btn-prev" href="javascript:void(0)" onclick="alert('Sorry! In Order To Access This Powerful Program, You Must Agree To These Rules')">NO</a>
									
								</div>
								<!--<div class="py-2 d-flex align-items-center justify-content-center">
									<img src="assets/img/step-bottom-logo.svg" class="img-fluid" alt="">
								</div>-->
							</div>
							<div class="px-3 py-1 step-tab-panel" data-step="step3">
								<div class="media-wrap">
									<h1 class=" fs-36 fw-bold text-clr-black1 firstStepHeading">Do you agree to "Pay it
										Forward"?</h1>
									<p class="mt-3 mb-0 fs-18 text-clr-black2 firstStepContent">After you've finished using
										Credit
										Secrets to improve your credit, we ask that you pass it along to
										someone you know who
										needs it...A friend, family member, or anyone else it can help like
										it helped you</p>
								</div>
								<div class="step-footer justify-content-end">
									<div data-step-action="next" class="next-back step-btn">
										<a class="float-right my-4 btn btn-outline-primary stage-next-btn ">YES</a>
									</div>
									
									<a class="float-left my-4 btn btn-outline-primary stage-back-btn btn-prev" href="javascript:void(0)" onclick="alert('Sorry! In Order To Access This Powerful Program, You Must Agree To These Rules')">NO</a>
									
								</div>
								<!--<div class="py-2 d-flex align-items-center justify-content-center">
									<img src="assets/img/step-bottom-logo.svg" class="img-fluid" alt="">
								</div>-->
							</div>
							<div class="px-3 py-1 step-tab-panel" data-step="step4">
								<div class="media-wrap">
									<h1 class=" fs-36 fw-bold text-clr-black1 firstStepHeading">What is your primary reason
										for ordering Credit Secrets today?</h1>
									<div class="flex-wrap gap-3 mt-3 d-flex align-items-start gap-lg-5 ">
										<div>
											<div class="form-check">
												<input class="form-check-input" value="New Home" type="radio" name="flexRadioDefault"
													id="flexRadioDefault2">
												<label class="form-check-label text-clr-black2 fs-18 fw-medium"
													for="flexRadioDefault2">
													New Home
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" value="Home Refinance" type="radio" name="flexRadioDefault"
													id="flexRadioDefault3">
												<label class="form-check-label text-clr-black2 fs-18 fw-medium"
													for="flexRadioDefault3">
													Home Refinance
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" value="Auto Loan" type="radio" name="flexRadioDefault"
													id="flexRadioDefault4">
												<label class="form-check-label text-clr-black2 fs-18 fw-medium"
													for="flexRadioDefault4">
													Auto Loan
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" value="Personal Loan" type="radio" name="flexRadioDefault"
													id="flexRadioDefault5">
												<label class="form-check-label text-clr-black2 fs-18 fw-medium"
													for="flexRadioDefault5">
													Personal Loan
												</label>
											</div>
										<!-- </div>
										<div> -->
											<div class="form-check">
												<input class="form-check-input" value="Credit Card" type="radio" name="flexRadioDefault"
													id="flexRadioDefault6">
												<label
													class="form-check-label text-clr-black2 fs-18 fw-medium"
													for="flexRadioDefault6">
													Credit Card
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" value="Get Business Credit" type="radio" name="flexRadioDefault"
													id="flexRadioDefault7">
												<label
													class="form-check-label text-clr-black2 fs-18 fw-medium"
													for="flexRadioDefault7">
													Get Business Credit
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" value="Other" type="radio" name="flexRadioDefault"
													id="flexRadioDefault8">
												<label
													class="form-check-label text-clr-black2 fs-18 fw-medium"
													for="flexRadioDefault8">
													Other
												</label>
											</div>

										</div>
									</div>
								</div>
								<div class="step-footer justify-content-end">
									<div class="next-back step-btn" data-step-action="next">
										<a class="float-right my-4 btn btn-outline-primary stage-next-btn verify-answer">Next <span
												class="pb-1 ps-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path d="M14.4299 5.92999L20.4999 12L14.4299 18.07" stroke="white"
														stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
														stroke-linejoin="round" />
													<path d="M3.5 12H20.33" stroke="white" stroke-width="2"
														stroke-miterlimit="10" stroke-linecap="round"
														stroke-linejoin="round" />
												</svg>

											</span></a>
									</div>

								</div>
							</div>
						
						
						<div class="px-3 py-1 step-tab-panel" data-step="step5">
							<div class="media-wrap">
                                <div class="progress-circle" >
									<div class="pie_progress--slow" role="progressbar">
									  <span class="pie_progress__number">0%</span>
									</div>
								</div>
                            </div>
							<h1 class="mt-4 text-center fs-30 fw-bold text-clr-black1">Verifying Your Answers
							</h1>
							<div class="next-back step-btn" style="display:none">
								<a href="javascript:void(0)"
									class="float-right my-4 btn btn-outline-primary stage-next-btn">Next <span
										class="ps-2">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M14.4299 5.92999L20.4999 12L14.4299 18.07" stroke="white"
												stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
												stroke-linejoin="round" />
											<path d="M3.5 12H20.33" stroke="white" stroke-width="2"
												stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
										</svg>

									</span>	
								</a>
							</div>

			   
							
						</div>
						
                        
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    
	<div class="py-5 form-builder-details" id="wrapper1" style="display:none">
        <div class="container2">
            <!-- stages-header -->
                <div class="step-container">

                    <div class="pt-4 step-top">
                        <div class="congratulation-bg" style="background-image: url(assets/img/congratulation.png);">
                            <div class="text-center congratulation-header">
                                <h2 class="text-white fs-36 fw-bold">Congratulations</h2>
                                <p>You now qualify to access this program</p>
                            </div>
                        </div>

                    </div>
					<form id='fnform' name='frmsignup' action="#" class="signup_from" method='post'>
                        <input type="hidden" name="campaign_id" value="<?= $campaign_id ?>">
                        <input type="hidden" name="ad_id" value="<?= $ad_id ?>">
                        <input type="hidden" name="reason" id="reason" value="Credit Card">
						<input type="hidden" class="form-control" id="tag_ids" name="tag_ids" value="1383">
						<input type='hidden'  name='custom.reason_for_buying_sms' id='custom.reason_for_buying_sms' value="" />
                        <input type="hidden" id="ptype" name="ptype" value="<?= $ptype ?>"/>
<input type="hidden" id="cId" name="cId" value="<?= $cId ?>"/>
<input type="hidden" id="fname" name="fname" value="<?= $fname ?>">
						<div class="px-3 py-1 stage-content-item disabled">
							<!-- stage 3 content inside start -->
							<div class="stage-content-item-block stageThree">
								<div class="media-wrap">

									<h2 class="pt-3 pb-2 text-center fs-30 fw-bold text-clr-black1">Step 1: Enter Your Email</h2>
								</div>
								<div class="from-group">
									<input type="email" class="form-control" name='email' id='email' required placeholder='Email (Where to send your login)'>
								</div>
							</div>
							<section id="stageThree"></section>
							<!-- stage 3 content inside finish -->

							<div class="next-back">
								<input type="submit" id="submitbutton" class="float-right my-4 btn btn-outline-primary stage-next-btn" value="Next Step" /> 
								<!--<a class="float-right my-4 btn btn-outline-primary stage-next-btn" type="submit">Submit
									

								</a> -->

							</div>
							<!--<div class="d-flex align-items-center justify-content-center">
								<img src="assets/img/step-bottom-logo.svg" class="img-fluid" alt="">
							</div> -->
						</div>
					</form>
                </div>

            </div>
    </div>
	
	<!-- End Updated Design -->



	 <!--<div class="step2 displayNone">

	 <div class="header">
      <h1>QUESTION</h1>
	 <img src="<?php echo ASSETS_PATH ?>/secret/images/steps.png"/>
      </div>

	  <div id="link2" class="displayNone">
	  <p class="noBg_p">This system is designed to remove unproven, inaccurate marks from your credit report. If you plan on opening new cards just to default on them,knowing you can just use this secret again, do not order this system</p>
      <h3>Do You Agree To Use This System Ethically?</h3>
	  <a href="javascript:void(0)" onclick="onclick=nextStep(3)"><img src="<?php echo ASSETS_PATH ?>/secret/images/yes.png" class="center yes-btn" /></a>
       <a href="javascript:void(0)" onclick="alert('Sorry! In Order To Access This Powerful Program, You Must Agree To These Rules')" ><img src="<?php echo ASSETS_PATH ?>/secret/images/no.png" class="center no-btn" /></a>
	   </div>

    </div>


	 <div class="step3 displayNone">

	 <div class="header">
      <h1>QUESTION</h1>
	 <img src="<?php echo ASSETS_PATH ?>/secret/images/steps2.png"/>
      </div>
	  <div id="link3" class="displayNone">
	  <p class="noBg_p">As your credit score rises, you may receive offers for low-interest loans, credit cards etc; and may see your current credit lines dramatically increase. Please do not accept offers of money you can't pay back</p>
      <h3>Do You Agree To Use This System Responsibly?</h3>
	  <a href="javascript:void(0)" onclick="onclick=nextStep(4)"><img src="<?php echo ASSETS_PATH ?>/secret/images/yes.png" class="center yes-btn" /></a>
       <a href="javascript:void(0)" onclick="alert('Sorry! In Order To Access This Powerful Program, You Must Agree To These Rules')" ><img src="<?php echo ASSETS_PATH ?>/secret/images/no.png" class="center no-btn" /></a>
	  </div>


    </div>

	<div class="step4 displayNone">

	 <div class="header">
      <h1>QUESTION</h1>
	 <img src="<?php echo ASSETS_PATH ?>/secret/images/steps3.png"/>
      </div>
	  <div id="link4" class="displayNone">
	  <p class="noBg_p">After you've finished using Credit Secrets to improve your credit, we ask that you pass it along to someone you know who needs it...A friend, family member, or anyone else it can help <b>like it helped you</b> </p>

      <h3>Do You Agree To "Pay It Forward"?</h3>
	   <a href="javascript:void(0)" onclick="onclick=nextStep(5)"><img src="<?php echo ASSETS_PATH ?>/secret/images/yes.png" class="center yes-btn" /></a>
       <a href="javascript:void(0)" onclick="alert('Sorry! In Order To Access This Powerful Program, You Must Agree To These Rules')" ><img src="<?php echo ASSETS_PATH ?>/secret/images/no.png" class="center no-btn" /></a>

	   </div>

    </div>


<div class="step5 displayNone" >


      <h3>What is your Primary Reason For Ordering Credit Secrets Today?</h3>

	   <div class="flexrow">
	     <div class="flexcol" >
		   <div><input type="radio" name="option" class="form-radio" value="New Home"> New Home </div>
		   <div><input type="radio" name="option" class="form-radio" value="Home Refinance"> Home Refinance </div>
		   <div><input type="radio" name="option" class="form-radio" value="Auto Loan"> Auto Loan </div>
             <div><input type="radio" name="option" class="form-radio" value="Personal Loan"> Personal Loan </div>

         </div>

	    <div class="flexcol" >
           <div><input type="radio" name="option" class="form-radio" value="Credit Card"> Credit Card </div>
 		   <div><input type="radio" name="option" class="form-radio" value="Get Business Credit"> Get Business Credit </div>
 		   <div><input type="radio" name="option" class="form-radio" value="Other"> Other</div>

		   </div>
       </div> -->


	  <!-- <a href="javascript:void(0)" onclick="onclick=nextStep(6)"><img src="<?php echo ASSETS_PATH ?>/secret/images/submit_questions.png" class="center yes-btn" /></a> -->

    <!--</div> -->

	<!--<div class="step6 displayNone">

	 <div class="header">
        <h1>QUESTION</h1>
	    <img src="<?php echo ASSETS_PATH ?>/secret/images/steps4.png"/>
	 </div>
	        <div id="link5" class="displayNone">
	  <div class="progress-circle">
	     <div class="pie_progress--slow" role="progressbar">
          <span class="pie_progress__number">0%</span>
        </div>

		<span>VERIFYING ANSWERS</span>
	  </div>
    </div>

    </div>




<div id="optin-form-outer" class="step7 displayNone">

	 <h2>CONGRATULATIONS</h2>
        <h3>You Now Qualify To Access This Program</h3>
  <div id="link6" class="displayNone">
		<span id="step1_span">STEP 1:Enter Your Email</span>
	  <form id='frmsignup' name='frmsignup' action="" method='post'>
		<input type="hidden" class="form-control" id="tag_ids" name="tag_ids" value="1383">
		<input type='email' class="infusion-field-input-container email" name='email' id='email' required placeholder='Email'/>
		<input type='hidden'  name='custom.reason_for_buying_sms' id='custom.reason_for_buying_sms' value="" />

		<input type="image" id="submitbutton" src="<?php echo ASSETS_PATH ?>/secret/images/next-step.png" alt="Submit Form" class="img-responsive center" />
        <br />
        <div class="continue progress_box displayNone" style="background: none!important;">

            <div class="main_sec">

                <div id="slides">
                    <div class="" id="progress_bar_slides">
                        <div class=""

                             style="width: 44.1244%; overflow: hidden;"></div>

                    </div>

                    <div class="ui-progress-bar ui-container"

                         id="progress_bar_full">

                        <div class="ui-progress"

                             style="width: 44.1244%; overflow: hidden;"></div>

                    </div>

                </div>

                <div class="clear"></div>

            </div>

            <br/>

            <center>





                <table id="sec_1">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/loaders/loader5.gif"/></td>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/2.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_2" class="displayNone">

                    <tr>

                        <td><img style="" src="<?php echo ASSETS_PATH ?>/secret/images/secure/checkmark1.png"/></td>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/2.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_3" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/loaders/loader5.gif"/></td>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/3.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_4" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/checkmark1.png"/></td>

                        <td>

                            <img src="<?php echo ASSETS_PATH ?>/secret/images/secure/3.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_5" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/loaders/loader5.gif"/></td>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/5.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_6" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/checkmark1.png"/></td>

                        <td>

                            <img src="<?php echo ASSETS_PATH ?>/secret/images/secure/5.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_7" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/loaders/loader5.gif"/></td>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/7.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_8" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/checkmark1.png"/></td>

                        <td>

                            <img src="<?php echo ASSETS_PATH ?>/secret/images/secure/7.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_9" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/loaders/loader5.gif"/></td>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/9.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_10" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/checkmark1.png"/></td>

                        <td>

                            <img src="<?php echo ASSETS_PATH ?>/secret/images/secure/9.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_11" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/loaders/loader5.gif"/></td>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/11.png"/>

                        </td>

                    </tr>

                </table>

                <table id="sec_12" class="displayNone">

                    <tr>

                        <td><img src="<?php echo ASSETS_PATH ?>/secret/images/secure/checkmark1.png"/></td>

                        <td>

                            <img src="<?php echo ASSETS_PATH ?>/secret/images/secure/11.png"/>

                        </td>

                    </tr>

                </table>



            </center>

        </div>
</form>

   </div>
    <p>&nbsp;</p>
</div> -->

<!--
<p style="align-content:center;">
 -->



<center><br /><p><img src="<?php echo ASSETS_PATH ?>/secret/images/security2.png" style="max-width: 320px;"></p></center>

<div>

</div>









<div class="testimonial-wrapper">
	<div class="container-1100 testimonial-container" style="display: block;">
	<div class="aside">
	<div class="aside-interior">
	<img src="<?php echo ASSETS_PATH ?>/secret/images/certifications.png" alt="Customer Satisfaction">
	<p>What Current Members Are Saying</p>
	</div>
	</div>

	<div class="testimonials">
	<div id="t1" class="text active-text">
	<p><em>�Friday we went to see how much we would get pre-approved for a new car. We got a $30,000 at 2.04% interest rate�</em></p>
	<p><b>Misty W. - Converse, TX</b></p>
	</div>
	<div id="t2" class="text">
	<p><em>�This simple program really works for those who do the work in the appropriate steps�</em></p>
	<p><b>Jeremy R. - Arvada, CO</b></p>
	</div>
	<div id="t3" class="text">
	<p><em>�I got a letter today saying they would remove the debit from my credit report� YEEEHAAAW�. Movin� on UP� I LOVE THIS PROGRAM!!!�</em><b> Misty W. - Converse, TX</b></p>
	</div>
	<div id="t4" class="text">
	<p><em>�This program really does work if you follow the process to the "T"! Bought this 2017 Ford Fusion yesterday�</em></p>
	<p><b>Tony H. - Bolingbrook, Illinois</b></p>
	</div>
	<div id="t5" class="text">
	<p><em>�New $5,000 line of credit... #smcwin�</em></p>
	<p><b>Bryan Tate - Las Vegas, NV</b></p>
	</div>
	<div id="t6" class="text">
	<p><em>�I checked my Equifax report this morning, and all my medical collections have been deleted�</em></p>
	<p><b>Lori H. - Summerville, SC</b></p>
	</div>
	<div id="t7" class="text">
	<p><em>�#smcwin Just got my wife approved for a Navy Federal Card for 14.8k�</em></p>
	<p><b>Brian M. - Cape May Court House, NJ</b></p>
	</div>
	<div id="text8" class="text">
	<p><em>�I got 2 public records off my report from Equifax!�</em></p>
	<p><b>Andy S. - Oklahoma City, OK</b></p>
	</div>
	<div id="text9" class="text">
	<p><em>�Derogatory information deleted from Trans Union credit report. Feeling thankful for finding this group.�</em></p>
	<p><b>Tyrone B. - Monroe, PA</b></p>
	</div>
	<div id="text10" class="text">
	<p><em>�My credit scores are going up! This is really working!�</em></p>
	<p><b>Sie�o C. - Hayward, CA</b></p>
	</div>

	</div>
	</div>
</div>

</div>





<font size="2" color="gray" face="arial">
<p style="color:#333; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif" align="center">&nbsp;</p>



<!--
<center><img src="https://creditsecret.org/wp-content/uploads/2018/09/1-family-A.jpg" class="img-responsive" >
<img src="https://creditsecret.org/wp-content/uploads/2018/09/1-family-B.jpg" class="img-responsive" >
<img src="https://creditsecret.org/wp-content/uploads/2018/09/1-family-C.jpg" class="img-responsive" >
</center> -->


</div> <!-- hiddencontent -->


<div class="testimonials-text"><p align="justify">
<justify>
<font size="2" color="gray" face="arial">Testimonials, case studies, and examples found on this page are results that have been forwarded to us by users of Credit Secrets and related products, and may not reflect the typical purchaser's experience, may not apply to the average person and are not intended to represent or guarantee that anyone will achieve the same or similar results.</font>
<br />
<br />

<!--
<font size="2" color="gray" face="arial"> ClickBank is the retailer of products on this site. CLICKBANK� is a registered trademark
of Click Sales Inc., a Delaware corporation located at 1444 S. Entertainment Ave., Suite
410 Boise, ID 83709, USA and used by permission. ClickBank's role as retailer does not
constitute an endorsement, approval or review of these products or any claim, statement or
opinion used in promotion of these products. </font>  -->
<br />
<br />
<font size="2" color="gray" face="arial">� 2024 CreditSecrets.com  All rights reserved. Unauthorized duplication or publication of any materials from this site is expressly prohibited. All product names, logos, and brands are property of their respective owners. All company, product and service names used in this website are for identification purposes only. Use of these names, logos, and brands does not imply endorsement. The views and information contained within this website are provided for informational purposes only, are not meant as financial advice, and represent the current good-faith views of the authors at the time of publication. The above statements are a representation of vendor's experiences, and are narrated by a third party voice actor. Every effort has been made to accurately represent this product and its potential. Examples and testimonials in these materials are not to be interpreted as a promise or guarantee of results. This product's potential is entirely dependent on the person using it, and their current situation. CreditSecret.org is not a credit repair organization as defined under federal or state law, namely, the CROA. This website does not offer or provide credit repair services or personal advice or assistance with rebuilding or improving your credit score, report or rating. We do not offer any personalized consultation regarding credit or personal finances whatsoever.<br />
<br /></justify>
</font></p></div>
<p class="bottomlink" align="center">
	<font size="2" face="arial" color="#ffffff">
	<a target="_blank" href="https://creditsecret.org/terms-of-service/">Terms</a>
	|
	<a target="_blank" href="https://creditsecret.org/privacy-policy/">Privacy Policy</a> |

    <p>&nbsp;</p>
     <p>&nbsp;</p>
      <p>&nbsp;</p>

	<!-- |
	<a target="_blank" href="https://creditsecret.org/contact-us/">Support</a> -->
	<!--|
	 <a href="http://creditsecret.org/vip/">Affiliates </a> -->
	</font>
</p>
<script src="<?php echo ASSETS_PATH ?>/secret/js/modal.min.js"></script>
<script src="<?php echo ASSETS_PATH ?>/secret/assets/js/bootstrap.bundle.min.js"></script>
<script src='<?php echo ASSETS_PATH ?>/secret/assets/js/jquery-steps.min.js'></script>

<script type="text/javascript">
    $( document ).ready(function() {
        $("#rule_btn_1").click(function(e) {
            e.preventDefault();
            if($(this).attr("next")==4){ // if last RULE then show form
                $(".ruleBtn_box").hide();
                //$("#rule_3").hide();
                $("#optin-form-outer").fadeIn("slow");
            }
            var currentstep = "#rule_" + $(this).attr("next");
            var previusstep = $(this).attr("next") - 1;
            var previusstep = "#rule_" + previusstep;
            var nextstep = $(this).attr("next");//last Rule
            var nextstep = parseInt(nextstep) + 1;//last Rule
            $(this).attr( "next",nextstep);
            $(previusstep).hide();
            $(currentstep).fadeIn("slow");

            });
    });

</script>
<script type="text/javascript">
// <!--
// var beenherecookie = 'beenhere_private';
// var beenherebegin = document.cookie.indexOf(beenherecookie);
// if (beenherebegin > -1) { showit(); }
// else
// {
// 	//var min = 1;
// 	var min = 28;
// 	setTimeout("showit()", 60*1000*min);
// 	//set to 1000 X number of desired delay seconds. So 2 minutes (120 seconds) is 120 X 1000 = 120000
// 	WriteCookie("beenhere_private","yes");
// }
//-->


var min = 28*60;
    var videoInterval = setInterval(function(){


        const videoPlayer = document.getElementsByTagName("video")[0];
        if(videoPlayer)
        {
            
            if(videoPlayer.currentTime >= min){
                showit();
                clearInterval(videoInterval);
            }
        }

    },1000);


</script>







<!-- <script src="//cdn.taboola.com/libtrc/infoupllc-sc1/tfa.js"></script> -->


<script type="text/javascript">
    // adroll_adv_id = "ELF3VEOPGNA5FCDKP3DAVB";
    // adroll_pix_id = "VFZ6RBEE4RDRXPJS4QUO2C";
    // (function () {
    //     var _onload = function(){
    //         if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
    //         if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
    //         var scr = document.createElement("script");
    //         var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
    //         scr.setAttribute('async', 'true');
    //         scr.type = "text/javascript";
    //         scr.src = host + "/j/roundtrip.js";
    //         ((document.getElementsByTagName('head') || [null])[0] ||
    //             document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
    //     };
    //     if (window.addEventListener) {window.addEventListener('load', _onload, false);}
    //     else {window.attachEvent('onload', _onload)}
    // }());
</script>

<script>
(function() {
  var a = $('.testimonials').children();
  var index = 0;
  run()

  function run() {
    a.filter('.active-text').fadeOut().removeClass('active-text');
    a.eq(index).fadeIn(500).addClass('active-text');
    index = (index + 1) % a.length; // Wraps around if it hits the end
    setTimeout(run, 6000);
  }
})();
</script>

<script>
$('#link1').fadeIn(500);
function nextStep(s){
	//alert(s);
	/*var previousStep = (parseInt(Number(s)-1));
	var nextStep = parseInt(Number(s))


	$('.step'+previousStep).fadeOut(500);
	$('.step'+previousStep).addClass('displayNone');
	$('.step'+nextStep).removeClass('displayNone');


	$('.step'+nextStep).fadeIn();
	$('#link'+nextStep).fadeIn(500);


	if(s == 6){
		$('.pie_progress').asPieProgress('reset');
	    $('.pie_progress').asPieProgress('start');
	}*/
	var previousStep = (parseInt(Number(s)-1));
	var nextStep = parseInt(Number(s))
	
	if(s==6){
		$('.pie_progress').asPieProgress('reset');
	    $('.pie_progress').asPieProgress('start');
	}else{
		$('.step'+previousStep).fadeOut(500);
		$('.step'+previousStep).addClass('displayNone');
		
		$('.step'+nextStep).removeClass('displayNone');
		//$('.step'+nextStep).addClass('center');
		$('.step'+nextStep).fadeIn();
	}
	
	
	
}
</script>

<script type="text/javascript" src="<?php echo ASSETS_PATH ?>/secret/js/jquery-asPieProgress.min.js"></script>

<script type="text/javascript">
    /*jQuery(function($) {


      $('.pie_progress').asPieProgress({
        namespace: 'pie_progress'
      });
      // Example with grater loading time - loads longer
      $('.pie_progress--slow').asPieProgress({
        namespace: 'pie_progress',
        goal: 1000,
        min: 0,
        max: 1000,
        speed: 100,
        easing: 'linear',
		barcolor: '#66C429',
        barsize: '10',
		numberCallback: function numberCallback(n) {
		  var percentage = Math.round(this.getPercentage(n));
		 if(percentage == 100){
			 setTimeout(function(){ nextStep(7); }, 3000);

					 }
			return parseInt(percentage) + '%';

},
contentCallback: null
      });




    });*/
	
	    jQuery(function($) {


		  $('.pie_progress').asPieProgress({
			namespace: 'pie_progress'
		  });
		  // Example with grater loading time - loads longer
		  $('.pie_progress--slow').asPieProgress({
			namespace: 'pie_progress',
			goal: 1000,
			min: 0,
			max: 1000,
			speed: 100,
			easing: 'linear',
			barcolor: '#66C429',
			barsize: '10',
			numberCallback: function numberCallback(n) {
			  var percentage = Math.round(this.getPercentage(n));
			  console.log('percentage outer');
			 if(percentage == 100){
				 setTimeout(function(){ 
					console.log('percentage');
					document.getElementById('main-section').style = "display:none;"
					document.getElementById('wrapper1').style = "display:block";
					//$('#main-section').fadeIn(500);
					//$('#wrapper').fadeOut(500);
					

				 }, 3000);

						 }
				return parseInt(percentage) + '%';

			},
			contentCallback: null
		  });
	});
	
    jQuery(document).ready(function($) {
    $('#nav-toggle').click(function() {

        $('#site-navigation1').slideToggle();
    });
    });
  </script>


 <script>


            $(function() {

    var origTitle, animatedTitle, timer;

    function animateTitle(newTitle) {
      var currentState = false;
      origTitle = document.title;  // save original title
      animatedTitle = "?? (1)" + origTitle;
      timer = setInterval(startAnimation, 2000);

      function startAnimation() {
      // animate between the original and the new title
      document.title = currentState ? origTitle : animatedTitle;
      currentState = !currentState;
      }
    }

    function restoreTitle() {
      clearInterval(timer);
      document.title = origTitle; // restore original title
    }

    // Change page title on blur
    $(window).blur(function() {
      animateTitle();
    });

    // Change page title back on focus
    $(window).focus(function() {
      restoreTitle();
    });

  });
            </script>

<script>

$(document).ready(function() {



    $('input:radio[name=flexRadioDefault]').change(function() {
        if(typeof this.value !=="undefined" && this.value !==null){
            let tag_ids_val = '';
            if($("#tag_ids").val() !==null){
                tag_ids_val = $("#tag_ids").val();
            }
            switch (this.value) {
                case 'New Home':
                    tag_ids_val += ',1593';
                    break;
                case 'New Car':
                    tag_ids_val += ',1595';
                    break;
                case 'Personal Loan':
                    tag_ids_val += ',1597';
                    break;
                case 'Credit Card':
                    tag_ids_val += ',1599';
                    break;
                case 'Get Business Credit':
                    tag_ids_val += ',1601';
                    break;
                case 'Home Refinance':
                    tag_ids_val += ',1603';
                    break;
                case 'Auto Loan':
                    tag_ids_val += ',1605';
                    break;
                default:
                    break;
            }
            $("#tag_ids").val(tag_ids_val);
        }
		document.getElementById('reason').value = this.value;
		//nextStep(6);
    });
});

</script>
<script src="<?php echo COMMON_DIR ?>/funnel/funnel.js"></script>

</body>

<script type="module" id="funnel_rotator" 
      rotator_id="6572b3c654eda74cc6823993" 
      variation_id="6572b3c654eda74cc6823997" 
      crossorigin src="https://funnel-rotator.s3.amazonaws.com/pixel/rt_pixel.js">
      </script>

</html>
