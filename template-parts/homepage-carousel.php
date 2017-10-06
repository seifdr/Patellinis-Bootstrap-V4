<div class="row">
    <div class="col-12">
    <?php 
        if( function_exists( 'get_field' ) ){

            $imgC = get_field('image_carousel');

            if( count( $imgC > 0 ) ){
    ?>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php 
                        if(  count( $imgC > 0 ) ){
                            for ($i=0; $i < count( $imgC ) ; $i++) { 
                                echo '<li data-target="#carousel-example-generic" data-slide-to="'. $i++ .'"';
                                if ( $i == 0 ){ echo ' class="active" '; };
                                echo ' ></li>';	
                            }
                        }
                    ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                <?php 
                    for ($i=0; $i < count( $imgC ); $i++) { 
                            echo '<div class="carousel-item ';
                                if( $i == 0 ){ echo ' active '; }
                            echo '">';
                                echo '<img class="d-block img-fluid" src="'. $imgC[$i]['image']['url'] .'" alt="'. $imgC[$i]['image']['alt'] .'">';
                                echo '<div class="carousel-caption ';
                                
                                if( $imgC[$i]['caption_position'] == "1" ){ echo ' cc-left '; } elseif ( $imgC[$i]['caption_position'] == "2" ){ echo ' cc-right '; } else { echo " center "; }
                                echo '">';
        
                                echo '<div class="inner-carousel-caption">';
                                   
                                    echo "<h1>". $imgC[$i]['primary_text'] ."</h1>";
                                    echo "<p class='secondaryText' >". $imgC[$i]['secondary_text'] . "</p>";
                                    
                                    if( !empty( $imgC[$i]['button_text'] ) ){
                                        echo "<a href='". $imgC[$i]['page_link'] ."' type='button' class='btn btn-primary btn-lg d-none d-lg-inline-block'>". $imgC[$i]['button_text'] ."</a>";

                                        echo "<a href='". $imgC[$i]['page_link'] ."' type='button' class='btn btn-primary btn-md d-none d-md-inline-block d-lg-none'>". $imgC[$i]['button_text'] ."</a>";

                                        echo "<a href='". $imgC[$i]['page_link'] ."' type='button' class='btn btn-primary btn-sm d-none d-sm-inline-block d-md-none'>". $imgC[$i]['button_text'] ."</a>";
                                    }
                                echo '</div>';

                                echo '</div>';
                            echo '</div>';
                    }

                ?>
                </div>
                <?php if(  count( $imgC > 1 ) ){ ?>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <?php }  ?>
                </div>
            <?php
                    } // end if( count( $imgC ) > 0 ) 

                }
            ?>
    </div>
</div>