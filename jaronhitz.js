// JavaScript Document
$(document).ready(function() {
	$(".nav").navPlugin({
		'itemWidth': 120,
		'itemHeight': 30
	}); // navigation menu
	
	 $(".tweet").tweet({
            username: "iamjaronhitz",
            avatar_size: 32,
            count: 3,
            loading_text: "loading tweets...",
			intro_text: "<h3>Latest Tweets (@IamJaronHitz)</h3>"
       }); // end twitter plugin
	   
	   Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
	   
	   if ($('#galleria').length !=0) {
       Galleria.run('#galleria', {
        transition: 'fadeslide',
		transitionSpeed: 400,
		lightbox: true,
		extend: function() {
            var gallery = this; // "this" is the gallery instance
            $('.slideshow').click(function() {
            gallery.playToggle();
			return false;
        });
		},
		dataConfig: function(img) {
        return {
            description: $(img).next('p').html()
        }
        },
		autoplay: true
       });
	   };
	   $('#contactform').validate({
		rules: {
			email: {
				required:true,
				email:true
			}
		}, //end rules
		messages: {
			email: {
			    required: "Please supply your e-mail address.",
			    email: "This is not a valid e-mail address."
			}
		}//end messages
	}); // end validate();
	   
});