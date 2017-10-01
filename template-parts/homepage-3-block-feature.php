<?php 

    if( function_exists( 'get_field' ) ){
        //mf = middle feature
        $mf1	= get_field('middle_feature_1', $post->ID );
        $mf2	= get_field('middle_feature_2', $post->ID );
        $mf3	= get_field('middle_feature_3', $post->ID );
    }

?>

<div class="pseudo-row">
    <div class="row mt-4 calloutContainer" >
        <div class="col-12 col-sm-4 callouts">
            <div class="text-center">
                <i class=" 
                    <?php if( !empty( $mf1['font_awesome_fa_values'] ) ){ echo $mf1['font_awesome_fa_values']; } else { echo 'fa fa-car'; } ?> 
                fa-4x" aria-hidden="true"></i>
            </div>
            <div>
                <h3><?php if( !empty( $mf1['title'] ) ){ echo $mf1['title']; } else { echo "Delivery"; } ?></h3>
            </div>
            <div class="textWrap">
                <p><?php if( !empty( $mf1['text'] ) ){ echo $mf1['text']; } else { echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et odio ornare, cursus nunc nec, vulputate dolor. Proin bibendum et enim vitae commodo. Aenean ultrices urna vel dolor tincidunt, eget tempus nunc sodales."; } ?></p>
            </div>
            <div>
                <a type="button" href="<?php if( !empty( $mf1['page_link'] ) ){ echo $mf1['page_link']; } else { echo '#'; } ?>" class="btn btn-primary btn-lg btn-block"><?php if( !empty( $mf1['Button Text'] ) ){ echo $mf1['Button Text']; } else { echo "Delivery Areas"; } ?></a>
            </div>
        </div>			
        <div class="col-12 col-sm-4 callouts">
            <div class="text-center">
                <i class=" 
                <?php if( !empty( $mf2['font_awesome_fa_values'] ) ){ echo $mf2['font_awesome_fa_values']; } else { echo 'fa fa-cutlery'; } ?>
                    fa-4x" aria-hidden="true"></i>
            </div>
            <div>
                <h3><?php if( !empty( $mf2['title'] ) ){ echo $mf2['title']; } else { echo "Catering and Parties"; } ?></h3>
            </div>
            <div class="textWrap">
            <p><?php if( !empty( $mf2['text'] ) ){ echo $mf2['text']; } else { echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et odio ornare, cursus nunc nec, vulputate dolor. Proin bibendum et enim vitae commodo. Aenean ultrices urna vel dolor tincidunt, eget tempus nunc sodales."; } ?></p>
            </div>
            <div>
                <a type="button" href="<?php if( !empty( $mf2['page_link'] ) ){ echo $mf2['page_link']; } else { echo '#'; } ?>" class="btn btn-primary btn-lg btn-block"><?php if( !empty( $mf2['Button Text'] ) ){ echo $mf2['Button Text']; } else { echo "Catering & Parties Options"; } ?></a>
            </div>
        </div>		
        <div class="col-12 col-sm-4 callouts">
            <div class="text-center">
                <i class=" 
                <?php if( !empty( $mf3['font_awesome_fa_values'] ) ){ echo $mf3['font_awesome_fa_values']; } else { echo 'fa fa-cutlery'; } ?>

                    fa-4x" aria-hidden="true"></i>
            </div>
            <div><h3><?php if( !empty( $mf3['title'] ) ){ echo $mf3['title']; } else { echo "Pizza by the Slice"; } ?></h3></div>
            <div class="textWrap">
            <p><?php if( !empty( $mf3['text'] ) ){ echo $mf3['text']; } else { echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et odio ornare, cursus nunc nec, vulputate dolor. Proin bibendum et enim vitae commodo. Aenean ultrices urna vel dolor tincidunt, eget tempus nunc sodales."; } ?></p>
            </div>
            <div>
                <a type="button" href="<?php if( !empty( $mf3['page_link'] ) ){ echo $mf3['page_link']; } else { echo '#'; } ?>" class="btn btn-primary btn-lg btn-block"><?php if( !empty( $mf3['Button Text'] ) ){ echo $mf3['Button Text']; } else { echo "Daily Specials"; } ?></a>
            </div>
        </div>
    </div>
</div> <!-- close div.pseudo-row -->