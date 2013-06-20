// Richard Favors
// ICT 4510
// 10/30/12
// This script collects the input values and validates them. Then the script displays them. Also adds fancybox features to the image.
$(document).ready(function() {
	$('#map').goMap({
		latitude : 40.823923,
		longitude : -73.952334,
		zoom : 15
	}); // end goMap
	$.goMap.createMarker({
		latitude : 40.823923,
		longitude : -73.952334,
		title : 'Home',
		html : {
			content : '<h2>My home</h2>',
			popup : true
		}
	}); //end createMarker
			
	 $(".tweet").tweet({
            username: "iamjaronhitz",
            avatar_size: 32,
            count: 1,
            loading_text: "loading tweets..."
       }); // end twitter plugin
    $('ul.nav').superfish(); 
	$('#toggleDiv').hide();
	$('#toggleField').toggle(
	      function() {
		    $('#toggleDiv').show('slow');	
		  }, //end first click 
		  function() {
		    $('#toggleDiv').hide('slow');	
		  } //end second click
	    ); // end toggle
    $('#myImage').fancybox();
	$('#myForm').validate({
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
		},//end messages
        submitHandler: function(form) { 
            doAjax();
        } // end submitHandler
	}); // end validate();
var getFormValues = function() {
	var formData = $('#myForm').serialize();
	
	return formData;
}

var doAjax = function() {
	  $.ajax({
        url: "process.php",
        type: "post",
        data: getFormValues(),
        dataType: "json",
        success: function(response){
            display(response);
        }});
	
}

var display = function(response) {
	var data = '';
	
	$.each(response,function(fieldName, value) {
		
	   data += '<p>' + fieldName + ': ' + value + '</p>';
	});
  $('#message').empty().append(data);
  $('#myForm').empty();
}

}); // end ready