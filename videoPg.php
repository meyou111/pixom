<?php
session_start();
include 'Api/Connect.php';
include 'Api/comment-section/comments.php';
include 'Api/check-select.php';
include 'Api/master.php';
date_default_timezone_set('Europe/London');
?>
<!DOCTYPE HTML>
<html>
<head>

<title>Pixom | Main</title>

<link rel="icon" type="image/png" href="img/Pixom-icon.png"/>

<link rel="stylesheet" type="text/css" href="Style/videoPg.css?v=1.9">
<link rel="stylesheet" type="text/css" href="Style/MainHeader.css?v=2.1">
<link rel="stylesheet" type="text/css" href="Style/SocialHub.css?v=2.0">
<link rel="stylesheet" type="text/css" href="Style/Scrollbar.css?v=1.0">
<link rel="stylesheet" type="text/css" href="Style/Shop.css?v=1.3">
<link rel="stylesheet" type="text/css" href="Style/media_player.css?v=1.8">

<script type="text/javascript" src="Scripts/jQuery/jquery-3.2.1.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var commentCount = 4;
		$("#show-more").click(function () {
			commentCount += 2;
			$(".comment-box").load("Api/comment-section/load-comment.php", {
				newCommentCount: commentCount,
				selectedShow : "Alien Covenant"
			});
		});
	});
</script>
<script src="Scripts/media_player.js"></script>
</head>
<body>
 	<?php include 'include/Overall/MainHeader.php';?> 
	<div id="video-banner-container">
		<div id="trailerDetails">
			<div id="trailer">
				<a style="font-family: arial, sans-seirf;font-size: 22px; color: white;">Trailer </a>
			</div>
			
			<div id="vid-description">
				<h3><strong>Description</strong></h3>
				<p>The crew of the colony ship Covenant, bound for a remote planet on the far side of the galaxy, discovers what they think is an uncharted paradise, 
      			but is actually a dark, dangerous world. When they uncover a threat beyond their imagination, they must attempt a harrowing escape.</p>
      		
			</div>
		</div>
		<div id="movie-img">
			<img id="vid-pic" src="img/Movies/Ailen-covenant.jpg">
			<p style="font-family: arial, sans-seirf; font-size: 28px; color: white;">Alien Covenant</p>
		</div>
		<div id="nav">
			<button class="nav-btn">Favourite</button>
			<button onclick="toggleFullScreen()" id="play-btn" class="nav-btn">Play</button>
			<button class="nav-btn">Who's Watching</button>
			<button class="nav-btn">Invite</button>
		</div>
	</div>
				<video id="VideoPlayer"  src="Video/Alien- Covenant _ Official Trailer [HD] _ 20th Century FOX.mp4">
				</video>
				<div id="main-video-player-controls" onMouseOver="mediaControlsShow()" onMouseOut="mediaControlsHide()">
				    <button id="playpausebtn" onclick="playPause(this,'VideoPlayer')" style="margin-top: 5px; postion: absolute;"><img class="play-btn"src="img/Media_player/play1.png"></button>
				    <input id="seekslider" type="range" min="0" max="100" value="0" step="1" >
				    <span id="curtimetext" style="margin-bottom: 5px;">00:00</span> / <span id="durtimetext">00:00</span>
				    <button id="mutebtn" onclick="mute(this,'VideoPlayer')"><img class='mute1-btn'src='img/Media_player/sound-orange.png'></button>
				    <button id="fullscreenbtn" onclick="fullscreen()"><img class='fscrn-btn'src='img/Media_player/fullscreen-orange.png'></button>
				</div>
	<div id="comment-section">
		<?php echo 
			"<form method='POST' action='".setComment($conn)."'>
				<input type='hidden' name='movie_name' value='Alien Covenant'>
				<input type='hidden' name='user_name' value='".$user['fname']."'>
				<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
				<textarea id='comment-box' name='user_comment' placeholder='Write a review?'></textarea><br>
				<button id='submit-btn' type='submit' name='commentSubmit'>Submit</button>
			</form>"; 
		?>
		<br><br>
		<?php getComments('Alien Covenant', $user['fname']); ?>
		<button id="show-more">Show More Comments</button>
	</div>
	<script type="text/javascript">
			function toggleFullScreen(){
			if(vid.requestFullScreen){
					vid.requestFullScreen();
			} else if(vid.webkitRequestFullScreen) {
					vid.webkitRequestFullScreen();
			}else if(vid.mozRequestFullScreen) {
					vid.mozRequestFullScreen();
			}
		</script>
		<script>
			var timeout = null;
			$('#play-btn').on('click', function () { document.getElementById("main-video-player-controls").style.display = "block"; });
			$('#fullscreenbtn').on('click', function () { document.getElementById("main-video-player-controls").style.display = "none"; });

			function fullscreen() {
			    var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
			        (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
			        (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
			        (document.msFullscreenElement && document.msFullscreenElement !== null);

			    function mediacontrolbar(){
					var timeout = null;
					$(document).on('mousemove', function() {
					    if (timeout !== null) {
					        $('#video_controls_bar').fadeIn(500);
					        clearTimeout(timeout);
					    }
		
					    timeout = setTimeout(function() {
					        $('#video_controls_bar').fadeOut(200);
					    }, 3000);
					});
				}
	
			    var docElm = document.documentElement;
			    if (!isInFullScreen) {
			        if (docElm.requestFullscreen) {
			            docElm.requestFullscreen();
			        } else if (docElm.mozRequestFullScreen) {
			            docElm.mozRequestFullScreen();
			        } else if (docElm.webkitRequestFullScreen) {
			            docElm.webkitRequestFullScreen();
			        } else if (docElm.msRequestFullscreen) {
			            docElm.msRequestFullscreen();
			        }
			    } else {
			        if (document.exitFullscreen) {
			            document.exitFullscreen();
			        } else if (document.webkitExitFullscreen) {
			            document.webkitExitFullscreen();
			        } else if (document.mozCancelFullScreen) {
			            document.mozCancelFullScreen();
			        } else if (document.msExitFullscreen) {
			            document.msExitFullscreen();
			        }
			    }
			}
		</script>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       