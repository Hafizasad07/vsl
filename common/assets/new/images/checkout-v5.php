<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Secure Checkout - Credit Secrets</title>
    <meta name="description" content="Title"/>
    <meta name="author" content="">
    <meta name="keywords" content=""/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-75241181-3', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->	 



<?php require_once('/app/web/wp-content/root/pl-integration.php'); ?>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<header class="checkout-header">

    <div class="row header-box">

        <div class="col-md-1 hidden-sm hidden-xs">&nbsp;</div>
        <div class="col-md-6"><a href="https://creditsecrets.com/contact-us/" target="_blank">Contact Us </a> | Order By Phone: (800) 254-2925</div>
    </div>
 
</header><!-- /header -->


<div class="hero-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 style="font-size: 32px;"> Join More Than 250,000 Others Like You, Who Are<br>Already Changing Their Lives With Credit Secrets...</h1>
                    
            </div>
        </div>
    </div>
</div>


<div class="checkout-main-body">
    <div class="container">
        <div class="section1">
            <div class="row">

                <div class="col-md-4 col-md-push-8 checkout-main-body-right-gutter">
                    <div class="payment-form">
                        <img src="images/payment-form-ttl.png" class="img-responsive payment-form-ttl" alt="">
                        <form id='orderForm' name='orderForm'
                              action="https://core.thefunnelbot.com/track/charge2optionsorder" method='post'>
                            <input type="hidden" name="CreditCard0CardType" id="CreditCard0CardType"/>
                            <input type="hidden" name="ip_address" id="ip_address" value="<?php echo $_GET['ip_address'];?>"/>
							<input type='hidden' name='inf_field_Email' id='inf_field_Email' value="<?php echo $_GET['inf_field_Email'];?>">
							<input type='hidden' name='cid' id='cid' value="<?php echo $_GET['cid'];?>">
							<input type='hidden' name='vid' id='vid' value="<?php echo $_GET['vid'];?>">
							<input type='hidden' name='sid' id='sid' value="<?php echo $_GET['sid'];?>">
							<input type='hidden' name='src1' id='src1' value="<?php echo $_GET['src1'];?>">
							<input type='hidden' name='subid1' id='subid1' value="<?php echo $_GET['subid1'];?>">
							<input type='hidden' name='subid2' id='subid2' value="<?php echo $_GET['subid2'];?>">
							<input type='hidden' name='landingvid' id='landingvid' value="<?php echo $_GET['landingvid'];?>">
							<input type='hidden' name='transaction_id' id='transaction_id' value="<?php echo $_GET['transaction_id'];?>">
							<input type="hidden" name="Contact0FirstName" id="Contact0FirstName" value="<?php echo $_GET['Contact0FirstName'];?>">
							<input type="hidden" name="Contact0LastName" id="Contact0LastName" value="<?php echo $_GET['Contact0LastName'];?>">
							<input type="hidden" name="Contact0Email" id="Contact0Email" value="<?php echo $_GET['Contact0Email'];?>">
							<input type="hidden" name="Contact0Phone" id="Contact0Phone" value="<?php echo $_GET['Contact0Phone'];?>">
							<input type="hidden" name="Contact0StreetAddress1" id="Contact0StreetAddress1" value="<?php echo $_GET['Contact0StreetAddress1'];?>">
							<input type="hidden" name="Contact0PostalCode" id="Contact0PostalCode" value="<?php echo $_GET['Contact0PostalCode'];?>">
							<input type="hidden" name="Contact0City" id="Contact0City" value="<?php echo $_GET['Contact0City'];?>">
							<input type="hidden" name="Contact0State" id="Contact0State" value="<?php echo $_GET['Contact0State'];?>">
							<input type="hidden" name="Contact0Country" id="Contact0Country" value="<?php echo $_GET['Contact0Country'];?>">
							<input type='hidden' name='post_id' id='post_id' value="HOEkgEmuS0gOHq84">
							<input type='hidden' name='app_name' id='app_name' value="nx300">
							<input type='hidden' name='PurchaseType' id='PurchaseType' value="option1">
                            <div class="card-accept">
                                <span>We Accept:</span>
                                <img src="images/cards.png" alt="">
                            </div>
                            <div class="form-group">
                                <label>Card Number</label>
                                <input type="text" name="CreditCard0CardNumber" id="CreditCard0CardNumber"
                                       onchange="populateCardType();" class="form-control" required="required"
                                       placeholder="- - - -  - - - -  - - - -  - - - -"/>
                            </div>
                            <div class="form-group">
                                <label>Expiration Date</label>
                                <div class="ex-date-row">
                                    <div class="left-month">
                                        <!--<input class="form-control" type="text" name="month" value="" placeholder="Month">-->
                                        <select name="CreditCard0ExpirationMonth" id="CreditCard0ExpirationMonth"
                                                class="form-control">
                                            <option selected="selected" label="01 (Jan)" value="01">01 (Jan)
                                            </option>
                                            <option label="02 (Feb)" value="02">02 (Feb)
                                            </option>
                                            <option label="03 (Mar)" value="03">03 (Mar)
                                            </option>
                                            <option label="04 (Apr)" value="04">04 (Apr)
                                            </option>
                                            <option label="05 (May)" value="05">05 (May)
                                            </option>
                                            <option label="06 (Jun)" value="06">06 (Jun)
                                            </option>
                                            <option label="07 (Jul)" value="07">07 (Jul)
                                            </option>
                                            <option label="08 (Aug)" value="08">08 (Aug)
                                            </option>
                                            <option label="09 (Sept)" value="09">09 (Sept)
                                            </option>
                                            <option label="10 (Oct)" value="10">10 (Oct)
                                            </option>
                                            <option label="11 (Nov)" value="11">11 (Nov)
                                            </option>
                                            <option label="12 (Dec)" value="12">12 (Dec)
                                            </option>

                                        </select>
                                    </div>
                                    <span class="ex-date-slash">/</span>
                                    <div class="right-year">
                                        <!--<input class="form-control" type="text" name="year" value="" placeholder="Year">-->
                                        <select name="CreditCard0ExpirationYear" id="CreditCard0ExpirationYear"
                                                class="form-control">
                                            <option value="2017" selected>2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2026">2027</option>
                                            <option value="2026">2028</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>CVV Code</label>
                                <div class="row">
                                    <div class="col-xs-6 ex-date-right-gutter">

                                        <input type="text" name="CreditCard0VerificationCode" required="required"
                                               id="CreditCard0VerificationCode" class="form-control" placeholder="000"/>
                                    </div>
                                    <div class="col-xs-6 ex-date-left-gutter">
                                        <a href="#" class="wht-this">What is this?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="audiobook_box">
                                    <div class="audiobook_heading">
                                        <img style="display: inline; margin-top:-3px; margin-right:5px;" src="images/Green-animated-arrow-right.gif" alt="" width="16" />
                                        <input type="checkbox" name="audiobook_check" id="audiobook_check">
                                        <span>Yes! I'll Take It</span>

                                    </div>
                                    <div class="audiobook_description">
                                        <span class="red bl one_time_offer">ONE TIME OFFER:</span>
                                        <span>
                                                                 Enjoy listening to the all-new Credit Secrets Audiobook! Filled with even more advanced credit boosting secrets and strategies, not found in your book. Normally $27, but today as our newest Credit Secrets member, you can <b>add it onto your order for only $12.95!</b>
                                                            </span>
                                    </div>
                                </div>
                            </div>

							
					

							<button type="submit" id="submitbutton"><img src="images/place-order-btn.png"
																		 class="img-responsive pulse" alt=""></button>

							<div class="text-center" id="loader">
								<img src="images/loader1.gif">
								<p>Here We Go! Your Order Is Being Processed. This May Take Up To 30 Seconds. Don't Go
									Anywhere! An Important Message Is Up Next...</p>
							</div>
							<img src="images/security.png" class="img-responsive security-img" alt="">
							<img src="images/insureship.png" class="img-responsive ship-img" alt="">
							<p>Your purchase is protected against loss, damage and theft with secure shipping insurance.
								You will be billed $1.99 in a separate transaction.</p>
							
                        </form>
                    </div>

                    

                    
                </div>

                <div class="col-md-8 col-md-pull-4">
                 
                    <div class="product-table">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="images/bundle2.png" class="img-responsive product-img" alt="">
                            </div>
                            <div class="col-sm-8">
                                <div class="product-details">
                                    <div class="product-name">
                                        <h3>Credit <span>Secrets</span></h3>
                                        <p><span>Start Improving Your Credit Today:</span> Get started right away with Credit Secrets <br>
                                            </p>
                                    </div>
                                    <div class="price-box">
                                        <h2>Price</h2>
                                        <h3 class="book_price">$39.95</h3>
                                    </div>
                                    <div class="shipping-box">
                                        <h3>Shipping & Handling:</h3>
                                        <h4>FREE</h4>
                                    </div>
                                    <div class="access-box hidden">
                                        <h3>Audiobook:</h3>
                                        <h4>$12.95</h4>
                                    </div>
									
                                    <div class="total-box">
                                        <h3>TOTAL</h3>
                                        <h4 class="total_price">$39.95</h4>
                                    </div>
                                    <img src="images/security-checkout.png" class="img-responsive security-checkout"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h1 class="getting-head">Plus You’re Getting These Exclusive Bonuses:</h1>

                    <div class="getting-boxes">
                        <div class="getting-box getting-box1">
                            <div class="row">
                                <div class="col-sm-3 getting-box-right-gutter">
                                    <div class="getting-box-left">
                                        <h1>1</h1>
                                        <div class="getting-img">
                                            <img src="images/icon1.png" class="img-responsive" style="max-width: 60px;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 getting-box-left-gutter">
                                    <div class="getting-box-right">
                                        <h3>Credit Secrets Guide To Business Credit ($39.95 Value)</h3>
                                        <p>If you've ever though of starting your own home business, the Credit Secrets Guide to Building Business Credit can help you get there. You'll discover how starting a business allows you to secure business loans and lines of credit for doing something you love.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="getting-box getting-box2">
                            <div class="row">
                                <div class="col-sm-3 getting-box-right-gutter">
                                    <div class="getting-box-left">
                                        <h1>2</h1>
                                        <div class="getting-img">
                                            <img src="images/icon2.png" class="img-responsive" style="max-width: 60px;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 getting-box-left-gutter">
                                    <div class="getting-box-right">
                                        <h3>Credit Secrets Quickstart Guide ($19.95 Value)</h3>
                                        <p>This QuickStart Guide could have you seeing improvements before you even get to the main Credit Secrets book! This short but powerful guide will show you step-by-step how to get started toward improving your scores... in the simplest and easiest way possible</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="getting-box getting-box3">
                            <div class="row">
                                <div class="col-sm-3 getting-box-right-gutter">
                                    <div class="getting-box-left">
                                        <h1>3</h1>
                                        <div class="getting-img">
                                            <img src="images/icon3.png" class="img-responsive" style="max-width: 60px;" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-9 getting-box-left-gutter">
                                    <div class="getting-box-right">
                                        <h3>Secret Money Method ($29.95 Value)</h3>
                                        <p>How to get up to $12,500 worth of new available credit in under an hour. You'll discover little known online sources where you can build up your available credit, even if your scores are low. Available credit makes up 35% of your credit score - these sources will show you how you can get more.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                       

                       <center> <img src="images/guar.png" style="max-width: 100%;" class="img-responsive"></center>

                 <!--       <div class="checkout-videos">
                            <div class="row">
                                <div class="col-sm-6 checkout-video-parent-right-gutter">
                                    <div class="single-checkout-video">
                                        <div class="row">
                                            <div class="col-xs-7 single-checkout-video-right-gutter">
                                                <a href="#"><img src="images/check-vid1.png" class="img-responsive"
                                                                 alt=""></a>
                                            </div>
                                            <div class="col-xs-5 single-checkout-video-left-gutter">
                                                <p>How Steven Fixed His Credit With The Credit Secret</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 checkout-video-parent-left-gutter">
                                    <div class="single-checkout-video">
                                        <div class="row">
                                            <div class="col-xs-7 single-checkout-video-right-gutter">
                                                <a href="#"><img src="images/check-vid2.png" class="img-responsive"
                                                                 alt=""></a>
                                            </div>
                                            <div class="col-xs-5 single-checkout-video-left-gutter">
                                                <p>How Dan Raised His Score And Removed All Of His Negative Accounts</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="section-2">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec2-heading">
                        <h2>These Current Members Have Already Changed Their Lives With This Secret</h2>
                        <h1>..... Will You Be Next?</h1>
                    </div>
                </div>
            </div>

            <div class="sec2-images-block">
                <div class="row">
                    <div class="col-md-3 col-xs-6 sec2-images-block-gutter">
                        <img src="images/sec2-img1.png" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-3 col-xs-6 sec2-images-block-gutter">
                        <img src="images/sec2-img2.png" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-3 col-xs-6 sec2-images-block-gutter">
                        <img src="images/sec2-img3.png" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-3 col-xs-6 sec2-images-block-gutter">
                        <img src="images/sec2-img4.png" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="featured-on">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Featured On:</span>
                <img src="images/featured-on-icon1.png" class="img-responsive" alt="">
                <img src="images/featured-on-icon2.png" class="img-responsive" alt="">
                <img src="images/featured-on-icon3.png" class="img-responsive" alt="">
                <img src="images/featured-on-icon4.png" class="img-responsive" alt="">
                <img src="images/featured-on-icon5.png" class="img-responsive" alt="">
            </div>
        </div>
    </div>
</div>


<footer class="checkout-footer">
    <div class="footer_top_texts">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p>Unauthorized duplication or publication of any materials from this site is expressly prohibited.
                        All product names, logos, and brands are property of their respective owners. All company,
                        product and service names used in this website are for identification purposes only. Use of
                        these names, logos, and brands does not imply endorsement. The views and information contained
                        within this website are provided for informational purposes only, are not meant as financial
                        advice, and represent the current good-faith views of the authors at the time of publication.
                        Every effort has been made to accurately represent this product and its potential. Examples and
                        testimonials in these materials are not to be interpreted as a promise or guarantee of results.
                        This product's potential is entirely dependent on the person using it, and their current
                        situation. In a recent survey of our membership, the average credit score increase was reported
                        by members as 61 points in 60 to 90 days. CreditSecret.com is not a credit repair organization
                        as defined under federal or state law, namely, the CROA. This website does not offer or provide
                        credit repair services or personal advice or assistance with rebuilding or improving your credit
                        score, report or rating. We do not offer any personalized consultation regarding credit or
                        personal finances whatsoever.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p class="copyright">Copyright © 2017 <span>CreditSecrets.com.</span> All Rights Reserved</p>
                </div>
                <div class="col-sm-6">
                    <div class="footer_right_links text-right">
                        <a href="https://creditsecrets.com/terms-of-service/" target="_blank">Terms & Conditions</a><span>|</span>
                        <a href="javascript:;" data-toggle="modal" data-target="#contact-us">Contact Us</a><span>|</span>
                        <a href="https://creditsecrets.com/privacy-policy/" target="_blank">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--statr contact us pop up -->
<?php @include_once 'contactus-popup.php'?>
<!--end of contact us pop up -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/jquery.form.js"></script> <!--NEW-->
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js" type="text/javascript"></script>
<script type="text/javascript" src="https://l2.io/ip.js?var=myip"></script> <!--NEW-->
<!--Page Spacfic JS -->
<script>
    //alert(myip);
    $(document).ready(function () {
        $("#ip_address").val(myip);
        var options = {
            success: showResponse, // post-submit callback
            dataType: 'json'
        };

        // bind to the form's submit event
        $('#orderForm').submit(function () {
            // inside event callbacks 'this' is the DOM element so we first
            // wrap it in a jQuery object and then invoke ajaxSubmit

            
			$('#submitbutton').attr("disabled", true);
            $('#submitbutton').hide('fast');
            $('#loader').show('fast');
            $(this).ajaxSubmit(options);

            // !!! Important !!!
            // always return false to prevent standard browser submit and page navigation
            return false;

        });
    });

    // pre-submit callback

    // post-submit callback
    function showResponse(data) {

        if (data.success == false) {
            alert(data.message);
			$('#submitbutton').attr("disabled", false);
            $('#submitbutton').show('fast');
            $('#loader').hide('fast');
        }
        else {
            var redirect = data.redirect_to;
            window.location.replace(redirect);
        }
    }
</script>

<script>
    var myip;
    function ip_callback(o) {
        myip = o.host;
        alert(myip);
    }
</script>
<script type="text/javascript" language="javascript">
    //total_price
    $(document).ready(function () {
        $('#audiobook_check').change(function () {
            if ($(this).is(":checked")) {
                //$(".book_price").html("$41.92");
                $(".total_price").html("$52.90");
                $('#PurchaseType').val("option2");
				$(".access-box.hidden").removeClass("hidden");
				$(".product2.hidden").removeClass("hidden");
				
            } else {
                //$(".book_price").html("$31.95");
                $(".total_price").html("$39.95");

                $('#PurchaseType').val("option1");
				$(".access-box:not(.hidden)").addClass("hidden");
				$(".product2:not(.hidden)").addClass("hidden");
            }

        });
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


</script>
<script>

    function getCreditCardType(accountNumber) {

        //start without knowing the credit card type
        var result = "";

        //first check for MasterCard
        if (/^5[1-5]/.test(accountNumber)) {
            result = "MasterCard";
        }

        // check for Discover

        if (/^6/.test(accountNumber)) {
            result = "Discover";
        }

        //then check for Visa
        else if (/^4/.test(accountNumber)) {
            result = "Visa";
        }

        //then check for AmEx
        else if (/^3[47]/.test(accountNumber)) {
            result = "American Express";
        }

        return result;
    }

    function populateCardType() {


        var cc = document.getElementById('CreditCard0CardNumber').value;

        if (cc != "") {

            var ct = getCreditCardType(cc);
            document.getElementById('CreditCard0CardType').value = ct;

        }
    }
</script>


<script type="text/javascript">
var clicky_site_ids = clicky_site_ids || [];
clicky_site_ids.push(101080275);
(function() {
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  s.src = '//static.getclicky.com/js';
  ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
})();
</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/101080275ns.gif" /></p></noscript>

<script type="text/javascript">
    adroll_adv_id = "O7BVBCWRGJGDJNVJH5SSJX";
    adroll_pix_id = "OOUDVOFBMFC7BOKV4VQT7Z";
    /* OPTIONAL: provide email to improve user identification */
    /* adroll_email = "username@example.com"; */
    (function () {
        var _onload = function(){
            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
            var scr = document.createElement("script");
            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
            scr.setAttribute('async', 'true');
            scr.type = "text/javascript";
            scr.src = host + "/j/roundtrip.js";
            ((document.getElementsByTagName('head') || [null])[0] ||
                document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        };
        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        else {window.attachEvent('onload', _onload)}
    }());
</script>
<!-- Hotjar Tracking Code for https://creditsecrets.com/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:694994,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</body>
</html>