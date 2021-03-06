<?php
?>
<!DOCTYPE html>
<html lang='en'>
   <head>
      <meta charset='utf-8' />
      <title>Sample HTML5 Media Player</title>
      <link href='media-player.css' rel='stylesheet' />
      <script src='media-player.js'></script>
   </head>
   <body>
   	<script type="text/javascript" src="Script/VideoPlayer2.0"></script>
      <div id='media-player'>
         <video id='media-video' controls>
            <source src='parrots.mp4' type='video/mp4'>
            <source src='parrots.webm' type='video/webm'>
         </video>
         <div id='media-controls'>
         	<progress id='progress-bar' min='0' max='100' value='0'>0% played</progress>
   			<button id='play-pause-button' class='play' title='play'onclick='togglePlayPause();'>Play</button>
   			<button id='stop-button' class='stop' title='stop' onclick='stopPlayer();'>Stop</button>
         	<button id='volume-inc-button' class='volume-plus' title='increase volume' onclick='changeVolume("+");'>Increase volume</button>
			<button id='volume-dec-button' class='volume-minus' title='decrease volume' onclick='changeVolume("-");'>Decrease volume</button>
         	<button id='mute-button' class='mute' title='mute'onclick='toggleMute();'>Mute</button>
         	<button id='replay-button' class='replay' title='replay' onclick='replayMedia();'>Replay</button>
         </div>
      </div>
      
   </body>
</html>