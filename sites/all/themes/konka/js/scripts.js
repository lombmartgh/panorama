(function ($) {
    Drupal.behaviors.exampleModule = {
        attach: function (context, settings) {
            // Code to be run on page load, and
            // on ajax load added here
            //var URLactual = jQuery(location).attr('href');


            /**El Active el menu navegacion lateral***************/
            jQuery('.view-catalogo .views-field-php a').each(function () {
                if(jQuery(this).hasClass(Drupal.settings.tipo)){
                    jQuery(this).parent().parent().parent().addClass('active-navegacion');
                }

            });

            jQuery('.form-comments #comment-form #edit-actions').addClass('fa fa-comment-o');

            jQuery('.i18n-es.not-logged-in.page-user .partecontenido h2').html(Drupal.t('Cuenta de usuario'));
            jQuery('.i18n-en.not-logged-in.page-user .partecontenido h2').html(Drupal.t('User account'));
            //jQuery('.not-logged-in.page-user-reset .partecontenido h2').html(Drupal.t('User account'));

            jQuery('.views-row .views-field-field-images img').addClass('img-responsive');
            /***************Filtros expuestos de las vistas
             * Cada ves que se da un click en un checkbox se recoge el listado de valores de
             * checkbox checked pasandoselos al filtro
             *
             * ****************************************/

            /****************Ocultando el filtro expuesto marca de las vistas******************/
            jQuery('#views-exposed-form-productos-en-rebaja-y-nuevos-page-1').hide();
            jQuery('#views-exposed-form-productos-en-rebaja-y-nuevos-page-2').hide();
            jQuery('#views-exposed-form-productos-mas-comentados-page').hide();
            jQuery('#views-exposed-form-mas-visto-page').hide();
            /****
             * para el bloque de marcas
             * */
            jQuery(".view-brands.view-display-id-block .views-row .checkbox input[type=checkbox]").click(function () {

                //var ide = jQuery(this).attr('value');
                // jQuery(this).attr('checked', true);

                var checkboxValues = [];
                jQuery(".view-brands.view-display-id-block .views-row input[type=checkbox]:checked").each(
                    function () {
                        var valor = jQuery(this).attr('value');
                        checkboxValues.push(valor);
                    });

                /************Vista de los mas comentados**********************/
                jQuery("#views-exposed-form-productos-mas-comentados-page #edit-field-product-brands-tid").val(checkboxValues);
                jQuery("#edit-submit-productos-mas-comentados").click();

                /************Vista de los productos en rebajas y productos-categoria **********************/
                jQuery(".view-productos-en-rebaja-y-nuevos #edit-field-product-brands-tid-wrapper #edit-field-product-brands-tid").val(checkboxValues);
                jQuery("#edit-submit-productos-en-rebaja-y-nuevos").click();

                /************Vista de los productos mas vistos **********************/
                jQuery(".view-mas-visto #edit-field-product-brands-tid-wrapper #edit-field-product-brands-tid").val(checkboxValues);
                jQuery("#edit-submit-mas-visto").click();



                //alert(checkboxValues.join("\n"));
            });


            $('.buscador').hide();

            /***Modal del LOGIN USER***********************/
           /* if (jQuery('body').hasClass('logged-in')) {
                jQuery(".region-top .menu li.first").hide();
                jQuery(".region-top .menu li:nth-child(3)").hide();
            }*/
            //  alert('no sirve');

            jQuery('#login-user #block-user-login .form-item input').attr('class', 'form-control');
            jQuery(".region-top .menu li a[href='/#login-user']").attr('role', 'button');
            jQuery(".region-top .menu li a[href='/#login-user']").attr('role', 'button');
            //jQuery(".region-top .menu li a[href='/konka/#login-user']").addClass('comillas');
            jQuery(".i18n-en .region-top .menu li a[href='/en#login-user']").attr('data-toggle', 'modal');
            jQuery(".i18n-es .region-top .menu li a[href='/es#login-user']").attr('data-toggle', 'modal');
            jQuery(".logged-in.i18n-en .region-top .menu li a[href='/en#login-user']").parent().hide();
            jQuery(".logged-in.i18n-es .region-top .menu li a[href='/es#login-user']").parent().hide();
            jQuery("#user-login-form .form-item-name > input").attr('placeholder', Drupal.t('user'));
            jQuery("#user-login-form .form-item-pass > input").attr('placeholder', Drupal.t('password'));


            jQuery('#register-user .modal-body input').attr('class', 'form-control');
            jQuery(".i18n-en .region-top .menu li a[href='/en#register-user']").attr('role', 'button');
            jQuery(".i18n-es .region-top .menu li a[href='/es#register-user']").attr('data-toggle', 'modal');
            jQuery(".logged-in.i18n-en .region-top .menu li a[href='/en#register-user']").parent().hide();
            jQuery(".logged-in.i18n-es .region-top .menu li a[href='/es#register-user']").parent().hide();
            jQuery("#user-register-form .form-item-name > input").attr('placeholder', Drupal.t('user'));
            jQuery("#user-register-form .form-item-mail > input").attr('placeholder', Drupal.t('email'));

            // jQuery('#contact-form .modal-body input').attr('class','form-control');
            jQuery(".region-top .menu li a[href='/#contact-form']").attr('role', 'button');
            jQuery(".region-top .menu li a[href='/#contact-form']").attr('data-toggle', 'modal');
            // jQuery("#contact-form .form-item-name > input").attr('placeholder',Drupal.t('user'));
            // jQuery("#contact-form .form-item-mail > input").attr('placeholder',Drupal.t('email'));


            /**********menu********/
            jQuery('.tb-megamenu-submenu').addClass('col-xs-12')


            /******************Buscar*******************/
            jQuery("#search-not-mobile").click(function () {

                jQuery("#search").fadeToggle();

            });


            /*******************************************Botones Anclados**********************************************************/

            /*botones anclados*/
            //validando que el desplasamiento sea correcto tanto logeado o no
            if (jQuery('body').hasClass('not-logged-in')) {
                var desp_mision = -20;
                var desp_vision = -30;
                var desp_contacto = 20;
            } else if (jQuery('body').hasClass('logged-in')) {
                var desp_mision = 0;
                var desp_vision = 0;
                var desp_contacto = 0;
            }

            /*Efectos de transicion de paginas interiores a los links q estan en el front*/
            if (jQuery('body').hasClass('not-front')) {
                var url = window.location.hash;
                /*corriendo el scroll hasta las noticias*/
                if (url === '#mision') {
                    jQuery('html, body').animate({scrollTop: jQuery('#mision').offset().top - desp_mision}, 1000);
                }
                if (url === '#vision') {
                    jQuery('html, body').animate({scrollTop: jQuery('#vision').offset().top - desp_vision}, 1000);
                }
                if (url === '#contacto') {
                    jQuery('html, body').animate({scrollTop: jQuery('#contacto').offset().top - desp_contacto}, 1000);
                }

            }

            jQuery("#block-menu-menu-sobre-nosotros ul.menu li:nth-child(1) a").on("click", function () {
                jQuery('html, body').animate({scrollTop: jQuery('#vision').offset().top}, 1000);
            });
            jQuery("#block-menu-menu-sobre-nosotros ul.menu li:nth-child(2) a").on("click", function () {
                jQuery('html, body').animate({scrollTop: jQuery('#mision').offset().top}, 1000);
            });
            jQuery("#block-menu-menu-sobre-nosotros ul.menu li:nth-child(3) a").on("click", function () {
                jQuery('html, body').animate({scrollTop: jQuery('#contacto').offset().top}, 1000);
            });
            jQuery("#block-menu-menu-sobre-nosotros ul.menu li:nth-child(4) a").on("click", function () {
                jQuery('html, body').animate({scrollTop: jQuery('#contacto').offset().top}, 1000);
            });

            jQuery("#block-block-7 ul.nav li:nth-child(1) a").on("click", function () {
                jQuery('html, body').animate({scrollTop: jQuery('#mision').offset().top}, 1000);
            });
            jQuery("#block-block-7 ul.nav li:nth-child(2) a").on("click", function () {
                jQuery('html, body').animate({scrollTop: jQuery('#vision').offset().top}, 1000);
            });
            jQuery("#block-block-7 ul.nav li:nth-child(3) a").on("click", function () {
                jQuery('html, body').animate({scrollTop: jQuery('#contacto').offset().top}, 1000);
            });


            /*****
             * para el bloque de catalogos que muestra las taxonomias
             * */
            /* jQuery(".view-catalogo.view-display-id-block .views-field.views-field-php a").on('click', function () {

             var ide = jQuery(this).attr('data'); */

            /************Vista de los mas comentados**********************/
            /*jQuery("#views-exposed-form-productos-mas-comentados-page #edit-field-product-categories-tid").val(ide);
             jQuery("#edit-submit-productos-mas-comentados").click();*/

            /************Vista de los descuentos**********************/
            /* jQuery("#views-exposed-form-productos-en-rebaja-y-nuevos-page-1 #edit-field-product-categories-tid").val(ide);
             jQuery("#edit-submit-productos-en-rebaja-y-nuevos").click();*/


            // });

            if (jQuery('body').hasClass('page-productos-categoria-electrodomestic')) {

                if (jQuery('.parent a').hasClass('Electrodomestic')) {

                    jQuery(this).parent().addClass('active');

                }
            }


        }
    };
}(jQuery));
