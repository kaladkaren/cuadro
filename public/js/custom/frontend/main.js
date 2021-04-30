var slider3 = {slidesToShow: 3, slidesToScroll: 3, autoplay: true, autoplaySpeed: 3000, infinite: true, arrows: true, responsive: [{breakpoint: 601, settings: {slidesToShow:1,slidesToScroll:1}}]}

//header active nav
if(window.location.pathname === "/") {
    $('header .pagewrapper nav ul li:first-child').addClass('active');
}else {
    $("header nav ul li a").each(function(){
        if(window.location.pathname !== "/" && $(this).attr('href').indexOf(window.location.pathname) > 0) {
            $(this).closest('li').addClass('active');
        }
    });
}

//mobile header active
$("#mobnav").click(function(){
    if(!$('header').hasClass('active')) {
        $('header .mob-dropdown').slideDown(200);
        $('header').addClass('active');
    }
});
$("#close-nav").click(function(){
    if ($('header').hasClass('active')) {
        $('header .mob-dropdown').slideUp(200);
        $('header').removeClass('active');
    }
});

//desktop open faq
$(".faq-desk").click(function(){
    $('.faq-desktop').fadeIn(200);
});
//desktop faq close
$(".faq-desktop .faq-lbox-cont .clsbtn").click(function(){
    $(".faq-list li.active .faq-content").slideUp(200);
    $(".faq-list li.active").removeClass('active');
    $('.faq-desktop').fadeOut(200);
});
//open faq mobile
$(".faq").click(function(){
    $('header .mob-dropdown .menu').fadeOut(200, function(){
        $('header .mob-dropdown .faqs').fadeIn(200);
    })
});
//faq footer
$(".faq-footer").click(function(){
    if ($(window).width() > 999) {
        $('.faq-desktop').fadeIn(200);
    } 
    else {
        if(!$('header').hasClass('active')) {
            $("header .mob-dropdown .menu").fadeOut(100);
            $("header .mob-dropdown .faqs").fadeIn(100);
            $('header .mob-dropdown').slideDown(400);
            $('header').addClass('active');
        }
    }
});
//close faq section mobile
$("#close-faq").click(function(){
    $(".faq-list li.active .faq-content").slideUp(200);
    $(".faq-list li.active").removeClass('active');
    $('header .mob-dropdown .faqs').fadeOut(200, function(){
        $('header .mob-dropdown .menu').fadeIn(200);
    })
});

//faqs tabs
$(".faq-top").click(function(){
    if (!($(this).closest('li').hasClass('active'))) {
        $(".faq-list li.active .faq-content").slideUp(200);
        $(".faq-list li.active").removeClass('active');
        $(this).next('.faq-content').slideDown(200);
        $(this).closest('li').addClass('active')
    }else {
        $(this).next('.faq-content').slideUp(200);
        $(this).closest('li').removeClass('active')
    }
});

//accord tabs
$(".accord-top").click(function(){
    if (!($(this).closest('li').hasClass('active'))) {
        $(".accordion li.active .accord-content").slideUp(200);
        $(".accordion li.active").removeClass('active');
        $(this).next('.accord-content').slideDown(200);
        $(this).closest('li').addClass('active')
    }else {
        $(this).next('.accord-content').slideUp(200);
        $(this).closest('li').removeClass('active')
    }
});

// sliders responsive
if($(window).width() <= 999) {
    //home projects list
    // if($(".project-list").length)
    //     $(".project-list").slick(slider3)
}
$(window).resize(function(){
    if($(window).width() <= 999) {
        //home projects list
        // if($(".project-list").length)
        //     $(".project-list").slick(slider3)

        if ($('.faq-desktop').css('display') === 'block')
            $('.faq-desktop').fadeOut(100);
    }
    else{
        //home projects list
        // if($(".project-list").length)
        //     $(".project-list").slick('unslick');
    }
});
$(window).on('orientationchange', function(){
    if($(window).width() <= 999) {
        //home projects list
        // if($(".project-list").length)
        //     $(".project-list").slick(slider3)
        
        if ($('.faq-desktop').css('display') === 'block')
            $('.faq-desktop').fadeOut(100);
    }
    else{
        //home projects list
        // if($(".project-list").length)
        //     $(".project-list").slick('unslick')
    }
})

//pagination simple
$(".pagination li a").each(function(){
    if($(this).attr('href') === window.location.search) {
        $(".pagination li").removeClass('active');
        $(this).closest('li').addClass('active');
    }
})





//DITO LAHAT NG GET STARTED FUNCTIONS 
//GET STARTED FUNCTIONS
//hide footer in get started

//STEP 2 global variables
var cropindex = 0;

if(window.location.pathname.indexOf('get-started') > 0 && $("footer").length) {
    $('footer').css('display', 'none')
}
//click step 1
$('.pick-options li').click(function(){
    if(!$(this).hasClass('active')){
        $('.pick-options li').removeClass('active');
        $(this).addClass('active');
    }
})
//picking for me or someone else
$("input[name='options']").change(function(){
    if($(this).val() === 'for-me') {
        //enable only for me sections
        $("#special-someone-form").removeClass('active-form');
        $("#special-someone-checkout").removeClass('active-checkout');
        $("#for-me-form").addClass('active-form');
        $("#for-me-checkout").addClass('active-checkout');

    }else if ($(this).val() === 'special-someone') {
        //enable only special someone sections
        $("#for-me-form").removeClass('active-form');
        $("#for-me-checkout").removeClass('active-checkout');
        $("#special-someone-form").addClass('active-form');
        $("#special-someone-checkout").addClass('active-checkout');
    }
    //enable button
    if($(this).val() !== "" && $(".step-1 .navigation .next-btn").is(':disabled')) {
        $(".step-1 .navigation .next-btn").prop('disabled', false);
    }
});

//navigation for steps
var steps = $(".steps");
var current = 0;
$(".navigation .next-btn").click(function(){
    if(current < steps.length){
        $(steps[current]).fadeOut(200,function(){
            $(steps[current]).removeClass('active-step');
            ++current;
            $(steps[current]).fadeIn(200);
            $(steps[current]).addClass('active-step');
        })
    }
});
$(".navigation .back-btn").click(function(){
    if(current > 0){
        $(steps[current]).fadeOut(200,function(){
            $(steps[current]).removeClass('active-step');
            --current;
            $(steps[current]).fadeIn(200);
            $(steps[current]).addClass('active-step');
        })
    }
});
//CHECKOUT BTN
$(".checkout-btn").click(function(){
    if(current < steps.length){
        $(steps[current]).fadeOut(200,function(){
            $(steps[current]).removeClass('active-step');
            ++current;
            $(steps[current]).fadeIn(200);
            $(steps[current]).addClass('active-step');
        })
    }
})

//file upload step 2
//use [0] when accessing properties
var filesUploaded = [];

$("#computer-upload").change(function(){
    var $files = $('#computer-upload')[0];
    //creates file element
    for (var i = 0; i < $files.files.length; i++) {
        createFileElement($files.files.item(i));
        filesUploaded.push($files.files.item(i));
        //creates image url
        // console.log(URL.createObjectURL(filesUploaded[i]))
    }

    //adds remove file uploaded event
    $(".files .remove").each(function(){
        if(!$(this).hasClass('has-event')) {

            //remove file function
            $(this).click(function(){
                $(this).closest('li').remove();
                //checks if empty, disable next button
                if($('.files li').length <= 0) {
                    $(".step-2 .next-btn").prop('disabled', true);
                }

                //remove stored file
                $(filesUploaded).each(function(index){
                    console.log($(this)[0].name);
                });
            });

            $(this).addClass('has-event');
        }
    });

    //enable next button
    if($('.files li').length > 0) {
        $(".step-2 .next-btn").prop('disabled', false);
    }
});

//CREATE FILE ELEMENT STEP 2
function createFileElement(file) {
    var toappend = '<li><a href="#" target="_blank">'+ file.name +'</a><span class="remove"></span></li>';
    $(".step-2 .files").append(toappend);
    return;
}   

//FRAMES SELECTION
$("input[name='frame_options']").change(function(){
    $framesel = $(this);
    //sets name of frame
    $('.frame-result-name').html($(this).val());

    //set frame for ui
    $('.frames-container .frame-above.active-frame').removeClass('active-frame');
    $('.frames-container .frame-above').each(function(){
        console.log($(this).data('frame-name') + ', ' + $framesel.val().toLowerCase());
        if($(this).data('frame-name') === $framesel.val().toLowerCase() && !$(this).hasClass('active-frame')){
            $(this).addClass('active-frame');
        }
    });
});

//STEP 3  ADD SINGLE EVENT
$(".single-input-file").change(function(){
    $image = $(this).closest('.single-container').find('.pic-original');
    $image2 = $(this).closest('.single-container').find('.pic-used');

    //sets uploaded image as image inside
    // var url = URL.createObjectURL($('.single-input-file')[$(this).index()].files[0]);
    // $image.attr('src', url);
    // $image2.attr('src', url);

    $(this).closest('.single-container').addClass('result');
});

//STEP 3 REMOVE SINGLE EVENT
$('.remove-photo-btn').click(function(){
    $removeIndex = $(this).closest('.single-container').index();
    console.log($removeIndex);
    $('.step-3 .photos-section .container').slick('slickRemove', $removeIndex);
});

//STEP 3 SLIDER OPTIONS
var photoSlider = {
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: false,
    variableWidth: true,
    swipe: true,
    responsive : [
        {
            breakpoint: 1000,
            settings: {
                slidesToShow: 1,
                centerMode: true
            }
        }
    ]
}

//STEP 3 SLIDER INIT
var isSliding = false;
$(".step-3 .photos-section .container").slick(photoSlider);
$(".step-3 .photos-section .container").on('beforeChange', function(){isSliding = true});
$(".step-3 .photos-section .container").on('afterChange', function(){isSliding = false});

//STEP 3 ADDING NEW PANES
$(".add-new-single").click(function(){
    //check if not sliding before adding
    createPaneElement();
});

//STEP 3 CREATE NEW PANE ELELEMNT
function createPaneElement () {
    //counter for ids
    var counter = 3;
    var paneElement = `<li class="single-container">
                        <!--UPLOAD-->
                        <div class="upload-pane">
                            <ul class="inner-upload-options">
                                <!--INCREMENT COUNTER PER PHOTO SECTION-->
                                <li><input type="file" accept="image/*" id="photo-cp-upload-`+counter+`" class="single-input-file">
                                    <label for="photo-cp-upload-`+counter+`" class="upload-pc"><img src="./images/cam.png" class="logo" alt="camera">Upload photos from my phone or computer</label>
                                </li>
                                <li><button class="upload-fb"><img src="./images/fb.png" class="logo" alt="camera">Import from Facebook</button></li>
                                <li><button class="upload-ig"><img src="./images/ig.png"  class="logo"alt="camera">Import from Instagram</button></li>
                            </ul>
                        </div>
                        <!--IF HAS UPLOADED SHOW THIS-->
                        <div class="photo-pane">
                            <div class="result-photo">
                                <!--ORIGINAL UPLOADED PHOTO FOR CROPPER HIDDEN-->
                                <img src="./images/sample.jpg" alt="orginal photo" class="pic-original">
                                <!--RESULT PHOTO FROM CROP-->
                                <img src="./images/sample.jpg" alt="pic to use" class="pic-used">
                                <!--FRAMES-->
                                <div class="frames-container">
                                <img src="./images/best-seller.png" alt="frame to use" data-frame-name="bestseller" class="frame-above active-frame">
                                <img src="./images/midnight.png" alt="frame to use" data-frame-name="midnight" class="frame-above">
                                <img src="./images/natural.png" alt="frame to use" data-frame-name="natural" class="frame-above">
                                <img src="./images/snow.png" alt="frame to use" data-frame-name="snow" class="frame-above">
                                <img src="./images/infinity.png" alt="frame to use" data-frame-name="infinity" class="frame-above">
                                </div>
                            </div>
                            <ul class="photo-options">
                                <li><button class="adjust-crop-btn">Adjust Crop</button></li>
                                <li><button class="remove-photo-btn">Remove</button></li>
                            </ul>
                        </div>
                    </li>`;
    if(!isSliding) {
        
        $addindex = $(".step-3 .photos-section .container .single-container").length-1
        $addeventindex = $(".step-3 .photos-section .container .single-container").length;
        $(".step-3 .photos-section .container").slick('slickAdd', paneElement, $addindex);

        //ADDING EVENTS TO NEWLY ADDED ELEMENT
        $newel = $('.step-3 .photos-section .container .single-container')[$addeventindex];

        //FILE UPLOAD EVENT
        $($newel).find('.single-input-file').change(function(){
            $image = $(this).closest('.single-container').find('.pic-original');
            $image2 = $(this).closest('.single-container').find('.pic-used');
        
            //sets uploaded image as image inside
            // var url = URL.createObjectURL($('.single-input-file')[$(this).index()].files[0]);
            // $image.attr('src', url);
            // $image2.attr('src', url);
        
            $(this).closest('.single-container').addClass('result');
        });

        //CROPPER EVENT
        $($newel).find('.adjust-crop-btn').click(function(){
            cropindex = $(this).closest('.single-container').index();
            var $image = $(this).closest('.photo-pane').find('.pic-original');
            //UPDATE CROPPER TO CROP IMAGE
            $("#maincropper").croppie("bind", {
                url: $image.attr('src')
              });
            $(".cropper-popup").fadeIn(200);
        });

        //REMOVE EVENT
        $($newel).find('.remove-photo-btn').click(function(){
            $removeIndex = $(this).closest('.single-container').index();
            $('.step-3 .photos-section .container').slick('slickRemove', $removeIndex);
        })
    }
}


//CROPPER STUFF HERE
//CROPPER INITIALIZE
$("#maincropper").croppie({
    viewport: {
        width: 240,
        height: 240
    },
    boundary: { width: 300, height: 300}
})

//SHOW CROPPER
$(".adjust-crop-btn").click(function(){
    cropindex = $(this).closest('.single-container').index();
    var $image = $(this).closest('.photo-pane').find('.pic-original');
    //UPDATE CROPPER TO CROP IMAGE
    $("#maincropper").croppie("bind", {
        url: $image.attr('src')
      });
    $(".cropper-popup").fadeIn(200);
});

//CROPPER GET RESULT
$("#done-crop").click(function(){
    var passcropped = $($('.single-container')[cropindex]).find('.pic-used');
    $("#maincropper").croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(resp) {$(passcropped).attr('src', resp)});
    $(".cropper-popup").fadeOut(200);
});

//HIDE CROPPER
$("#back-crop").click(function(){
    $(".cropper-popup").fadeOut(200);
})