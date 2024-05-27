/**
 * @Script js for (Template/Project Name)
 *
 * @project     - Project Name
 * @author      - 
 * @created_by  - 
 * @created_at  - 
 * @modified_by -
 */


/**
 * ========================================================
 * this function execute when window properly loaded
 * ===========================================================
 */

$(window).on('load', function () {

    // code should be execute here
    $(function () {
        $('#step-steps li > .border-line').on('click', function (event) {
            event.stopPropagation();
        });
    });

});



/**
 * ========================================================
 * this function execute when DOM element ready 
 * ===========================================================
 */

$(document).ready(function () {

    // code should be execute here

    // testimonial-active
    $(function () {
        if ($(".testimonial-slider-wrap").length) {
            $(".testimonial-slider-wrap").owlCarousel({
                items: 3,
                margin: 30,
                // stagePadding: 180,
                nav: false,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3500,
                animateOut: 'fadeOut',
                smartSpeed: 2500,
                navText: ["<img src='assets/img/arrow-left.svg' class='img-fluid' />", "<img src='assets/img/arrow-right-s.svg' class='img-fluid' />"],
                dots: true,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    767: {
                        items: 2
                    },
                    991: {
                        items: 2
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        }
    });



//asraful

    $(function () {
        if ($('#steps-wizard').length) {
            $('#steps-wizard').steps({
				
            });
        }
    });

//counter

$(function(){
    // var updateSliderCounter = function (slick, currentIndex) {
    //     currentSlide = slick.slickCurrentSlide() + 1;
    //     slidesCount = slick.slideCount;
    //     $(sliderCounter).text(currentSlide + '/' + slidesCount)
    // };

    var numberofClass = $(".step-border").length
    $('.total').text(numberofClass )

    // var doneCount = $(".done").length + 2
    // $('.totalactive').text(doneCount )


    // var g = $(".done")
    // for (var i = 0, len = g.length; i < len; i++) {

    //     (function (index) {
    //         g[i].onclick = function () {
    //             alert(index);
    //         }
    //     })(i);

    // }


    

})








    var current = 1;
    let steps = $("#step-steps").find("li.step-border");
    let completed = $(".done").length;
    //console.log(steps);
    // numSteps = steps.length,

    //     $("#count").text(numSteps);

    // console.log(completed++);

    function setProgressBar(pos) {
        console.log("Step: " + pos);
        $("#current-count").text(pos);
    }


    $(".btn-next").click(function () {
        // $(steps[current]).hide();
        $(steps[++current]).show();
        setProgressBar(current);
		
    });
	$(".verify-answer").click(function () {
        // $(steps[current]).hide();
        nextStep(6);
		
    });
	
    //$(".btn-prev").click(function () {
    //    // $(steps[current]).hide();
    //    $(steps[--current]).show();
    //    setProgressBar(current);
    //});



    // init $('#steps-wizard')
    // $(function () {
    //     if ($('#steps-wizard').length) {
    //         $('#steps-wizard').steps({
    //             onFinish: function () { alert('Complete'); }
    //         });
    //     }
    // });









});
