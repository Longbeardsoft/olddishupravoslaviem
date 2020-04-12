<?php 
   $data = $VK->api ( "audio.get", "", array ('uid' => $uid, 'token' => $_SESSION ['access_token'] ) );
     
            echo '<div id="loader"><img src="http://vk.com/images/upload.gif" alt="" width="32" height="8" border="0" /></div>';
           
            for($i = 0; $i < count ( $data [response] ); $i ++) {
                echo "<div class='showinfo'>
                <div>" . $data [response] [$i] [artist] . " - " . $data [response] [$i] [title] . "</div>
                <div style='display:none'>" . $data [response] [$i] [url] . "</div>
                <div>
                <object type=\"application/x-shockwave-flash\" data=\"dewplayer.swf?mp3=".$data [response] [$i] [url]."\" width=\"200\" height=\"20\" id=\"dewplayer\"
                name=\"dewplayer\">
                <param name=\"movie\" value=\"dewplayer.swf\" />
                <param name=\"flashvars\" value=\"dewplayer.swf?mp3=".$data [response] [$i] [url]."\" />
                <param name=\"wmode\" value=\"transparent\" />
                </object>
                </div>
                <br />Продолжительность: " . $data [response] [$i] [duration] . "</div>";
