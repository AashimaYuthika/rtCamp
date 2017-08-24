<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>Facebook Albums</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Saira" rel="stylesheet">
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/main.css" rel="stylesheet" >
<link href="css/responsive.css" rel="stylesheet" >
    <script src="js/spin.min.js"></script>
   <script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!----//End-slider-script---->
                        
<script type="text/javascript">
				$(window).load(function() { 
				$('#status').fadeOut(); 
				$('#preloader').delay(350).fadeOut('slow'); 
				$('body').delay(350).css({'overflow':'visible'});
				})
				//]]>
		</script> 

</head>
    	
  <?php
      include_once('fbconfig.php');
  
        use Facebook\GraphObject;
		use Facebook\GraphSessionInfo;
		use Facebook\Entities\AccessToken;
		use Facebook\HttpClients\FacebookHttpable;
		use Facebook\HttpClients\FacebookCurl;
		use Facebook\HttpClients\FacebookCurlHttpClient;
		use Facebook\FacebookSession;
		use Facebook\FacebookRedirectLoginHelper;
		use Facebook\FacebookRequest;
		use Facebook\FacebookResponse;
		use Facebook\FacebookSDKException;
		use Facebook\FacebookRequestException;
		use Facebook\FacebookAuthorizationException;
  //session create
   $google_session_token = "";
   try{
       if(isset($session)){
           $_SESSION['login_info'] = $session;
           $_SESSION['fb_token']=$session ->getToken();
           
           $user = datafromfacebook("/me" );
           
           $_SESSION['user_id']= $user['id'];
           $_SESSION['username']=$user['name'];
       
			if ( isset( $_SESSION['google_session_token'] ) ) {
				$google_session_token = $_SESSION['google_session_token'];
			}
  
  
  ?>
  <body>
     <!--user info name and logout details -->
	 </br>
	 </br>
       <div class="header text-center">
            <div id="header_con">
				<img class="img-circle"
						src="https://graph.facebook.com/<?php echo $user['id']; ?>/picture"
						style="margin-right: 10px; " alt="" /><br>
						<h3><?php echo $user['name']; ?></h3>                           
                 <a href="logout.php" class="btn"><button type="button" class="btn">Logout</button></a>
      
   
    
            </div>
    </div>
	
     <!-- nave bar -->
       <div class="header-section">
			<!----- start-header---->
			<div id="home" class="header">
				<div class="container">
						<!----start-top-nav---->
								<button type="button" class="btn"><a href="#" id="download-all-albums">Download All</a></button>&nbsp; 
								<button type="button" class="btn"><a href="#" id="download-selected-albums">Download Selected</a></button></br>
						<div class="clearfix"> </div>
				</div>
			</div>
      </div>
       
      <!-- album selected jumbotron box --> 
		 <h3>Albums Selected :0</h3>
     
     <!-- Album download report window -->   
     <div class="">
         <span id="loader" ></span>
       <div class="modal fade" id="download-modal" tabindex="-1"
					role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Albums Report</h4>
							</div>
							<div class="modal-body" id="display-response">
								<!-- Response is displayed over here -->
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default"
									data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
   </div>
         </div>
     
    
          
          
        <div class="row">
            
        </div>
      <?php
		$albums = datafromfacebook( "/me/albums" );
		
		if (! empty ( $albums )) {
			
			foreach ( $albums ['data'] as $album ) {
				$album = ( array ) $album;
				
				$album_photo = datafromfacebook( '/' . $album ['id'] . '/photos?fields=source' );
				if (! empty ( $album_photo )) {
					foreach ( $album_photo ['data'] as $alb ) {
						$alb = ( array ) $alb;
					}
					
					?>
                    <div class="col-sm-4 col-md-4">
						<span> <a href="#"><?php echo $album['name']; ?></a>
						</span>
						
						<div class="input-group" style="">
							<span class="input-group-addon input-sm"> 
                                                            <input
								class="select-album btn btn-info" type="checkbox"
								value="<?php echo $album['id'].','.$album['name'];?>" />
							</span> &nbsp;
							<button type = "button" rel="<?php echo $album['id'].','.$album['name'];?>"
								class="single-download btn btn-sm"
								title="Download Album">
								<span class="glyphicon glyphicon-save"></span>
							</button>
						</div>
						
						<div class='thumbnail'
							style='overflow: hidden; height: 200px; width: 210px; padding-bottom: 1%; '>
							<div
								style='overflow: hidden; height: 200px; width: 210px; padding-bottom: 1%;'>
								<a href="slide.php?ida=<?php echo $album['id']; ?>"> <img
									src="<?php  echo $alb['source']; ?> " /></a>
							</div>
						</div>
					</div>
                      <?php
				}
			}
		}
 }else{
     
     ?>
            
          <div id="preloader">
			<div id="status">&nbsp;</div>
	  </div>    

                
       <!-- main page slider and login info -->            
          <div  class="text-center">
		<a href="<?php echo $helper->getLoginUrl (array("user_photos","public_profile"));?>">
		<button  type="button" class="btn btn-primary"> <h3>Login to Facebook</h3> </button></a> 

        </div>
            
            
              
  <?php
   } 
   }catch ( Exception $ex ) {
	echo $ex;
}
  ?>      
        </div>     
        
        
    </body>   
    
    
</html>
<script type="text/javascript">

$( document ).ready(function() {
				var opts = {
				  lines: 13 // The number of lines to draw
, length: 56 // The length of each line
, width: 22 // The line thickness
, radius: 42 // The radius of the inner circle
, scale: 1 // Scales overall size of the spinner
, corners: 1 // Corner roundness (0..1)
, color: '#000' // #rgb or #rrggbb or array of colors
, opacity: 0.25 // Opacity of the lines
, rotate: 0 // The rotation offset
, direction: 1 // 1: clockwise, -1: counterclockwise
, speed: 1 // Rounds per second
, trail: 60 // Afterglow percentage
, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
, zIndex: 2e9 // The z-index (defaults to 2000000000)
, className: 'spinner' // The CSS class to assign to the spinner
, top: '70%' // Top position relative to parent
, left: '50%' // Left position relative to parent
, shadow: false // Whether to render a shadow
, hwaccel: false // Whether to use hardware acceleration
, position: 'absolute' // Element positioning Element positioning // Left position relative to parent
				};
				var target = document.getElementById('loader');

					
	function append_download_link(url) {
           var spinner = new Spinner(opts).spin(target);
					$.ajax({
						url:url,
						success:function(result){
                                                        
							$("#display-response").html(result);
                                                        spinner.stop();
							$("#download-modal").modal({
								show: true
							});
						}
					});
				}
    
	$("#download-all-albums").on("click", function() {
        append_download_link("download_album.php?zip=1&all_albums=all_albums");

	});
//single download
    				$(".single-download").on("click", function() {
        
					var rel = $(this).attr("rel");
					var album = rel.split(",");

					append_download_link("download_album.php?zip=1&single_album="+album[0]+","+album[1]);
				});

  //giffy and selective function  
     var count=0;
     
    
    $('input[type="checkbox').click(function() {
       
        
        if ($(this).is(':checked') ) {
           count++;
                     
            
        }
       if(!$(this).is(':checked')){
            count--;
          
        }
        function display(){
            $("h3").html("Albums Selected :" +count);
            
           
        }
        
        display();
         
    });
    
    
    
    //get selected data/lib
    
    function get_all_selected_albums() {
        
					var selected_albums;
					var i = 0;
					$(".select-album").each(function () {
						if ($(this).is(":checked")) {
							if (!selected_albums) {
								selected_albums = $(this).val();
							} else {
								selected_albums = selected_albums + "/" + $(this).val();
							}
						}
					});
					return selected_albums;
				}
//selected data
    $("#download-selected-albums").on("click", function() {
        
					var selected_albums = get_all_selected_albums();
					append_download_link("download_album.php?zip=1&selected_albums="+selected_albums);
				});
                                
                                function getParameterByName(name) {
					name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
					var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
						results = regex.exec(location.search);
					return results === null ? "null" : decodeURIComponent(results[1].replace(/\+/g, " "));
				}

				function display_message( response ) {
					if ( response == 1 ) {
						$("#display-response").html('<div class="alert alert-success" role="alert">Album(s) is successfully moved to Picasa</div>');
						$("#download-modal").modal({
							show: true
						});
					} else if ( response == 0 ) {
						console.log(response);
						$("#display-response").html('<div class="alert alert-danger" role="alert">Due to some reasons album(s) is not moves to Picasa</div>');
						$("#download-modal").modal({
							show: true
						});
					}
				}

				get_params();

				function get_params() {
					var response = getParameterByName('response');
					display_message(response);
				}                
	});			
                                                          
</script>
