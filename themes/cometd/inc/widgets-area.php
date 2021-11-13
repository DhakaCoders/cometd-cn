<?php 

function deploy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Widget', 'mbc' ),
		'id'            => 'post-widget',
		'description'   => __( 'Add widgets here to appear in your blog page.', 'mbc' ),
		'before_widget' => '<aside><div class="sidebar-widget">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'deploy_widgets_init' );
