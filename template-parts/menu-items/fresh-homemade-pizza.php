<?php

	if( is_tag() ){
		$tagTitle = single_tag_title("", false);
		$isGF = ( !empty( $tagTitle ) && strtolower( $tagTitle ) == 'gluten free' )? TRUE : FALSE;
	} else {
		$isGF = FALSE;
	}

	if( ( strtolower( $category->name ) == "fresh homemade pizza" ) && ( $fhp_counter == "1" ) ){
			?>

			<div class="row hidden-xs-down">
				<?php if( !$isGF ){ ?>
					<div class="col-6"></div><div class="col-2 text-center simulatedH4">14"</div><div class="col-2 text-center simulatedH4">16"</div><div class="col-2 text-center simulatedH4">20"</div>
				<?php } else { ?>
					<div class="col-6"></div><div class="col-2 text-center simulatedH4">10"</div><div class="col-4 text-center simulatedH4">&nbsp;</div>
				<?php } ?>
			</div>

			<?php
		}
	?>
	<div class='menuItem'>
		<div class="row">
			<div class="col-12 col-sm-6">	
				<h4 class="under"><?php the_title(); ?></h4>
				<?php echo get_field('description'); ?></div>
				<?php if( !$isGF ){ ?>
					<div class="col-4 col-sm-2 text-center simulatedH4"><small class="hidden-sm-up red">14"</small>$<?php echo get_field('14_price'); ?></div><div class="col-4 col-sm-2 text-center simulatedH4"><small class="hidden-sm-up">16"</small>$<?php echo get_field('16_price'); ?></div><div class="col-4 col-sm-2 text-center simulatedH4"><small class="hidden-sm-up">20"</small>$<?php echo get_field('20_price'); ?></div>
				<?php } else { ?>
					<div class="col-4 col-sm-2 text-center simulatedH4">
						<small class="hidden-sm-up">10"</small>$<?php echo get_field('14_price'); ?>
					</div>
				<?php } ?>
		</div>
		<?php 

		//look( get_fields() );
		
		if( get_field('addition_toppings') ){
			// the_sub_field('additional_topping_description');
		?>
			<div class="row">
				<div class="col-12 col-sm-6">	
					<?php echo the_field('additional_topping_description'); ?></div>
					<?php if( !$isGF ){ ?>
					<div class="col-4 col-sm-2 text-center"><small class="hidden-sm-up">14"</small>$<?php echo get_field('14_ap_price'); ?></div><div class="col-4 col-sm-2 text-center"><small class="hidden-sm-up">16"</small>$<?php echo get_field('16_additional_topping_price'); ?></div><div class="col-4 col-sm-2 text-center"><small class="hidden-sm-up">20"</small>$<?php echo get_field('20_additional_topping_price'); ?></div>
					<?php } else { ?>
						<div class="col-4 col-sm-2 text-center">
							$<?php echo get_field('14_ap_price'); ?>
						</div>
					<?php } ?>
			</div>
		<?php 
		} 

	?>
	</div>
