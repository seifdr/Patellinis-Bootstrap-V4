<?php 
//Built in widgets 

	function footer_widgets_init() {
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Footer Widgets', 'strappresse' ),
				'id'            => 'patellinis-footer-widgets',
				'description'   => __('Footer widgets appear in the footer of each page.',  'strappress'),
				'before_widget' => '<div id="%1$s" class="%2$s col-12 col-sm-4 footer-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) 
		);
	}

	add_action( 'widgets_init', 'footer_widgets_init' );

