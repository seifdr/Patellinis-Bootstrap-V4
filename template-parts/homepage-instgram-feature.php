<?php

$access_token 	= "2103923722.1677ed0.a10dd41c280b4070b314d6fe9eace2e2";
$photo_count	= 4;
        
$json_link		= "https://api.instagram.com/v1/users/self/media/recent/?";
$json_link	   .= "access_token={$access_token}&count={$photo_count}";

//  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$json_link);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

$json = $result;

//host wont allow allow_url_include=On in php config so we have to use curl.
//$json = file_get_contents( $json_link, true );

if(  $json !== false ){

    $obj =	json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
?>

<div id="igTitle" class="row">
    <div class="col-12"><h2 class="text-center">Pizza Social</h2></div>
</div>
<div class="row igContainer">
<?php 

    for ($i=0; $i < 4; $i++) { 

        // look( $obj['data'][$i] );

        echo '<div class="col-6 col-sm-3">';
            echo '<a href="'. $obj['data'][$i]['link'] .'" class="thumbnail col-12">';
                echo '<img src="'. $obj['data'][$i]['images']['low_resolution']['url'] .'" alt="...">';
            echo '</a>';
            echo '<div class="row"><div class="col-12 col-sm-12 col-md-12 col-lg-6"><p class="text-left"><i class="fa fa-heart red" aria-hidden="true"></i>&nbsp;'. $obj['data'][$i]['likes']['count'] .'&nbsp;Likes</p></div>';
            echo '<div class="hidden-md-down col-lg-6"><p class="text-right">'. $obj['data'][$i]['comments']['count'] .'&nbsp;Comments</p></div></div>';
            echo '<div class="row"><p class="col-12 text-center">'. $obj['data'][$i]['caption']['text'] .'</p></div>';
        echo '</div>';	
        
        if ( ( $i+1 ) % 2 == 0 ) {
            ?>
                <div class="clearfix hidden-sm-up"></div>
            <?php
        }
        
    }
} else {
    //json is false / curl broke
    echo '<div class="row"><div class="col-12"><br /></div></div>';
}

?>		

</div>

<div class="row">
<div class="col-12"><p class="text-center">Follow <a href="https://www.instagram.com/patellinis/">@Patellinis</a> on Instagram</p></div>
</div>