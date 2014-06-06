$(document).ready(function(){
        
        stop_post_form();
        
        $("#bt_link").click(function (){
		  var rg =  $('#long_url').val();
		  var reg = /^http\:\/\/(?!:\/\/)([a-zA-Z0-9]+\.)?[a-zA-Z0-9][a-zA-Z0-9-]+\.[a-zA-Z]{2,6}?/;
		   
		  if ( reg.test(rg))
		     {
				 console.info(true);
				 var f = $('form').serializeArray();
				  $.ajax({
									   type: "POST",
									   url: "./site/details",
									   data: f,
									   //dataType: "json",
										success: function(data,h,p){
										           //alert("succses");
                                                  var short_url = "<a id=\"copy-description\" href="+data+">"+data+"<\a>";				                                                                                
										           $("#result").html(short_url);
										          
										},
									error: function(){		        
										        //alert("failure");
										        var err_ajax = "<h1 style=\"color:red\">Ошибка ajax соединения !!!<\h>"; 
												$("#result").html(err_ajax);
										        
										}
										
							         });
			 }
			 else
			 {
				 //console.info(false);
				 var mes_err = "<h1 style=\"color:red\">Ошибка валидации, будте внимательны !!!<\h>"; 
				 $("#result").html(mes_err);
			 }	 	  
		   
		   

        
        
        });


		function stop_post_form() {	
			$('form').submit(function(e){
				   e.preventDefault(e);          
				   //return false;
			       console.log('stop post form');
			 });
			
		}	


});
