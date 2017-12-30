 jQuery(document).ready(function($){
     $('.js-freelancer-form-validate').parsley();
    
    
    $('.js-freelancer-auth-login-form').on('submit', function (e) {
        ls.ajax.submit(aRouter.fauth + 'ajax-login', $(this), function ( response ) {
            response.sUrlRedirect && (window.location = response.sUrlRedirect);
        });

        e.preventDefault();
    });
 });
 
