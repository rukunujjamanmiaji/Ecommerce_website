<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="appremi" />
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700,800,900|Roboto+Condensed:400|Poppins:600%2C400" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" href="http://cdn.leapinglogic.com/base/css/vendor.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
        <?php echo $this->element('/front/global/css'); ?>
        <link rel="stylesheet" type="text/css" href="/front/css/custom.css">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>App Remi :: Appointment Reminder</title>
    </head>
    <body class="stretched no-transition">
        <div id="wrapper" class="clearfix">
            <?php echo $this->element('front/global/header'); ?>
            <div class="page-container"><?php echo $this->fetch('content'); ?></div>
            <?php echo $this->element('front/global/footer'); ?>
             <script type="text/javascript" src="http://cdn.leapinglogic.com/base/js/vendor.min.js"></script>
            <?php echo $this->element('front/global/js'); ?>
            <script type="text/javascript" src="http://cdn.leapinglogic.com/base/js//functions.js"></script>
            <script type="text/javascript" src="/js/custom.js"></script>
        </div>
        <div id="gotoTop" class="icon-angle-up"></div>
        <script type="text/javascript">
            
        </script>
        <!--<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI"></script>
        <script type="text/javascript" src="/front_end/js/jquery.gmap.js"></script>-->
        <script>

//            jQuery(document).ready(function ($) {
//
//
//
//                function pricingSwitcher(elementCheck, elementParent, elementPricing) {
//
//                    elementParent.find('.pts-left,.pts-right').removeClass('pts-switch-active');
//
//                    elementPricing.find('.pts-switch-content-left,.pts-switch-content-right').addClass('hidden');
//
//
//
//                    if (elementCheck.filter(':checked').length > 0) {
//
//                        elementParent.find('.pts-right').addClass('pts-switch-active');
//
//                        elementPricing.find('.pts-switch-content-right').removeClass('hidden');
//
//                    } else {
//
//                        elementParent.find('.pts-left').addClass('pts-switch-active');
//
//                        elementPricing.find('.pts-switch-content-left').removeClass('hidden');
//
//                    }
//
//                }
//
//
//
//                $('.pts-switcher').each(function () {
//
//                    var element = $(this),
//                            elementCheck = element.find(':checkbox'),
//                            elementParent = $(this).parents('.pricing-tenure-switcher'),
//                            elementPricing = $(elementParent.attr('data-container'));
//
//
//
//                    pricingSwitcher(elementCheck, elementParent, elementPricing);
//
//
//
//                    elementCheck.on('change', function () {
//
//                        pricingSwitcher(elementCheck, elementParent, elementPricing);
//
//                    });
//
//                });
//
//
//
//                // Get Started From Validation
//
//                var getStartedForm = $('#get-started-form'),
//                        getStartedFormAlert = getStartedForm.attr('data-alert-type'),
//                        getStartedFormLoader = getStartedForm.attr('data-loader'),
//                        getStartedFormResult = getStartedForm.find('.contact-form-result'),
//                        getStartedFormRedirect = getStartedForm.attr('data-redirect');
//
//
//
//                getStartedForm.validate({
//                    submitHandler: function (form) {
//
//
//
//                        getStartedFormResult.hide();
//
//
//
//                        if (getStartedFormLoader == 'button') {
//
//                            var defButton = $(form).find('button'),
//                                    defButtonText = defButton.html();
//
//
//
//                            defButton.html('<i class="icon-line-loader icon-spin nomargin"></i>');
//
//                        } else {
//
//                            $(form).find('.form-process').fadeIn();
//
//                        }
//
//
//
//                        $(form).ajaxSubmit({
//                            target: getStartedFormResult,
//                            dataType: 'json',
//                            resetForm: true,
//                            success: function (data) {
//
//                                if (getStartedFormLoader == 'button') {
//
//                                    defButton.html(defButtonText);
//
//                                } else {
//
//                                    $(form).find('.form-process').fadeOut();
//
//                                }
//
//                                if (data.alert != 'error' && getStartedFormRedirect) {
//
//                                    window.location.replace(getStartedFormRedirect);
//
//                                    return true;
//
//                                }
//
//                                if (getStartedFormAlert == 'inline') {
//
//                                    if (data.alert == 'error') {
//
//                                        var alertType = 'alert-danger';
//
//                                    } else {
//
//                                        var alertType = 'alert-success';
//
//                                    }
//
//
//
//                                    getStartedFormResult.addClass('alert ' + alertType).html(data.message).slideDown(400);
//
//                                } else {
//
//                                    getStartedFormResult.attr('data-notify-type', data.alert).attr('data-notify-msg', data.message).html('');
//
//                                    SEMICOLON.widget.notifications(getStartedFormResult);
//
//                                }
//
//                            }
//
//                        });
//
//                    }
//
//                });
//
//
//
//                $('[data-pricing-plan]').click(function () {
//
//                    getStartedForm.find('#get-started-form-package').val($(this).attr('data-pricing-plan'));
//
//                    getStartedForm.find('#modal-get-started-package').html($(this).attr('data-pricing-plan'));
//
//                });
//
//
//
//            });

        </script>
        


        <script>
//
//            var tpj = jQuery;
//
//
//
//            var revapi5;
//
//            tpj(document).ready(function () {
//
//                if (tpj("#rev_slider_5_1").revolution == undefined) {
//
//                    revslider_showDoubleJqueryError("#rev_slider_5_1");
//
//                } else {
//
//                    revapi5 = tpj("#rev_slider_5_1").show().revolution({
//                        sliderType: "hero",
//                        jsFileLocation: "/front_end/include/rs-plugin/js/",
//                        sliderLayout: "fullwidth",
//                        dottedOverlay: "none",
//                        delay: 9000,
//                        navigation: {
//                        },
//                        responsiveLevels: [1240, 1024, 778, 480],
//                        visibilityLevels: [1240, 1024, 778, 480],
//                        gridwidth: [1240, 1024, 778, 480],
//                        gridheight: [868, 768, 1060, 1220],
//                        lazyType: "none",
//                        scrolleffect: {
//                            fade: "on",
//                            blur: "on",
//                            maxblur: "20",
//                            on_layers: "on",
//                            direction: "top",
//                            multiplicator_layers: "1.6",
//                            tilt: "10",
//                        },
//                        parallax: {
//                            type: "scroll",
//                            origo: "slidercenter",
//                            speed: 400,
//                            levels: [5, 10, 15, 20, 25, 30, 35, 40, -5, -10, -15, -20, -25, -30, -35, 55],
//                            disable_onmobile: "on"
//
//                        },
//                        shadow: 0,
//                        spinner: "off",
//                        autoHeight: "off",
//                        disableProgressBar: "on",
//                        hideThumbsOnMobile: "off",
//                        hideSliderAtLimit: 0,
//                        hideCaptionAtLimit: 0,
//                        hideAllCaptionAtLilmit: 0,
//                        debugMode: false,
//                        fallbacks: {
//                            simplifyAll: "off",
//                            disableFocusListener: false,
//                        }
//
//                    });
//
//                    //Fade out not Focused Elements on Hover
//
//                    jQuery('body').on('mouseenter', '.tp-selecttoggle', function () {
//
//                        jQuery(this).addClass("selected");
//
//                        jQuery('.tp-selecttoggle').each(function () {
//
//                            var _ = jQuery(this);
//
//                            if (!_.hasClass("selected"))
//                                punchgs.TweenLite.to(_, 0.5, {autoAlpha: 0.35, ease: punchgs.Power2.easeInOut, overwrite: "auto"});
//
//                        });
//
//                    });
//
//
//
//                    //Fade in all Elements on Blur
//
//                    jQuery('body').on('mouseleave', '.tp-selecttoggle', function () {
//
//                        jQuery(this).removeClass("selected");
//
//                        jQuery('.tp-selecttoggle').each(function () {
//
//                            var _ = jQuery(this);
//
//                            punchgs.TweenLite.to(_, 0.5, {autoAlpha: 1, ease: punchgs.Power2.easeInOut, overwrite: "auto"});
//
//                        });
//
//                    });
//
//                }
//
//                RsPolyfoldAddOn(tpj, revapi5, {position: "top", color: "#ffffff", scroll: true, height: 150, range: "slider", point: "center", placement: 1, responsive: true, negative: true, leftWidth: 0.35, rightWidth: 0.35, inverted: false, animated: false});
//
//                RsPolyfoldAddOn(tpj, revapi5, {position: "bottom", color: "#ffffff", scroll: true, height: 150, range: "slider", point: "center", placement: 1, responsive: true, negative: true, leftWidth: 0.35, rightWidth: 0.35, inverted: false, animated: false});
//
//            });/*ready*/

        </script>

        <script type="text/javascript">



//            jQuery('#google-map').gMap({
//                address: 'Melbourne, Australia',
//                maptype: 'ROADMAP',
//                zoom: 14,
//                markers: [
//                    {
//                        address: "Melbourne, Australia",
//                        html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
//                        icon: {
//                            image: "images/icons/map-icon-red.png",
//                            iconsize: [32, 39],
//                            iconanchor: [32, 39]
//
//                        }
//
//                    }
//
//                ],
//                doubleclickzoom: false,
//                controls: {
//                    panControl: true,
//                    zoomControl: true,
//                    mapTypeControl: true,
//                    scaleControl: false,
//                    streetViewControl: false,
//                    overviewMapControl: false
//
//                }
//
//            });



        </script>   

    </body>
</html>