<?php 
    if( function_exists( 'get_field' ) ){
        //bf = bottom feature
        $bf_image	= get_field('bottom_feature_image', $post->ID );
?>
<div class="pseudo-row" >
        <div class="row bottomFeature mt-4">
            <div class="col-12 col-sm-6">
                <h2><?php echo get_field('bottom_feature_title') ?></h2>
                <p><?php echo get_field('bottom_feature_text'); ?></p>
            </div>
            <div class="col-12 col-sm-6">
            <?php  
                
                echo "<img class='img-responsive'";
                    
                    if( !empty( $bf_image['alt'] ) ){
                        echo " alt=\"". $bf_image['alt'] ."\" ";	
                    }
                
                echo " src='". esc_attr( $bf_image['url'] )  ."' />" 
            ?>
            </div>
        </div>
</div>        
<?php 

    } // close if get_field exists
?>