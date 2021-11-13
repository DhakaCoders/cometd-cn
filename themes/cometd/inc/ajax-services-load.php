<?php
/*
 * initial posts dispaly
 */
function script_load_more($args = array()) {
	$results = cbv_load_more_a($args);
  $output = '';
	$output .='<div class="mbc-service-grds">';
  $output .='<ul class="reset-list clearfix" id="ajax-content">';
	$output .= $results['output'];
  $output .= '</ul>';
	$output .= '</div>';
	if( $results['btn'] ){
	  $output .= '<div class="mbc-service-btn">';
	  $output .= '<div class="ajaxloading" id="ajxaloader1" style="display:none"><img src="'.get_template_directory_uri().'/assets/images/loading.gif" alt="loader"></div>';
	  $output .= '<a class="mbc-transparent-btn" href="#" id="loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" >find out more</a>';
	  $output .= '</div>';
	}
return $output;
}
/*
 * create short code.
 */
add_shortcode('ajax_services', 'script_load_more');

function cbv_load_more_a($args, $catslug = '') {
	
	//number of posts per page default
	$num = 8;
	//page number
	$query = new WP_Query(array( 
	    'post_type'=> 'service',
	    'post_status' => 'publish',
	    'posts_per_page' =>$num,
	    'order'=> 'DESC'
	  ) 
	);

	$output = '';
	$totalpost = $query->found_posts;
	if($query->have_posts()): 
			$i = 1;
	    while($query->have_posts()): $query->the_post(); 
	      $thumbID = get_post_thumbnail_id(get_the_ID());
	      $thumb = !empty($thumbID)? cbv_get_image_src($thumbID): services_placeholder();
	      $thumbtag = !empty($thumbID)? cbv_get_image_tag($thumbID): services_placeholder('tag');
				$output .='<li>';
				$output .='<div class="mbc-service-grd-item">';
				$output .='<a href="'.get_the_permalink().'" class="overlay-link"></a>';
				$output .='<div class="mbc-service-grd-item-img-ctlr mHc">';
				$output .='<div class="mbc-service-grd-item-img inline-bg" style="background:url('.$thumb.')">';
				$output .= $thumbtag;
				$output .='</div>';
				$output .='</div>';
				$output .='<div class="mbc-service-grd-item-des mHc1">';
				$output .='<h3 class="mbc-service-grd-des-title fl-h5"><a href="'.get_the_permalink().'"><span>'.$i.'.</span>'.get_the_title().'</a></h3>';
				$output .='</div>';
				$output .='</div>';
				$output .='</li>';
				$i++;
	   endwhile; 
	  else:
	  	$output .='<div class="no-result">No Result.</div>';
	  endif; 
	wp_reset_postdata();
	if( $totalpost > $num ) 
		$show_btn = true;
	else
		$show_btn = false;
	return array('btn'=> $show_btn, 'output' => $output);
}

/*
 * load more script call back
 */
function ajax_script_load_more($args, $catslug = '') {
	//init ajax
	$ajax = false;
	//check ajax call or not
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	$ajax = true;
	}
	
	//number of posts per page default
	$num = 8;
	//page number
	if( isset($_POST['page']) ){
		$paged = $_POST['page'] + 1;
	}else{
		$paged = 1;
	}
	$query = new WP_Query(array( 
	    'post_type'=> 'service',
	    'post_status' => 'publish',
	    'posts_per_page' =>$num,
	    'paged'=>$paged,
	    'order'=> 'DESC'
	  ) 
	);
  if($query->have_posts()): 
  		$i = $num+1;
      while($query->have_posts()): $query->the_post(); 
        $thumbID = get_post_thumbnail_id(get_the_ID());
        $thumb = !empty($thumbID)? cbv_get_image_src($thumbID): news_placeholder();
        $thumbtag = !empty($thumbID)? cbv_get_image_tag($thumbID): news_placeholder('tag');
				echo '<li>';
				echo '<div class="mbc-service-grd-item">';
				echo '<a href="'.get_the_permalink().'" class="overlay-link"></a>';
				echo '<div class="mbc-service-grd-item-img-ctlr mHc">';
				echo '<div class="mbc-service-grd-item-img inline-bg" style="background:url('.$thumb.')">';
				echo $thumbtag;
				echo '</div>';
				echo '</div>';
				echo '<div class="mbc-service-grd-item-des mHc1">';
				echo '<h3 class="mbc-service-grd-des-title fl-h5"><a href="'.get_the_permalink().'"><span>'.$i.'.</span>'.get_the_title().'</a></h3>';
				echo '</div>';
				echo '</div>';
				echo '</li>';
				$i++;
     endwhile; 
    endif;  
wp_reset_postdata();
//check ajax call
if($ajax) wp_die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_ajax_script_load_more', 'ajax_script_load_more');
add_action('wp_ajax_ajax_script_load_more', 'ajax_script_load_more');
/*
 * enqueue js script
 */
add_action( 'wp_enqueue_scripts', 'ajax_enqueue_script' );
/*
 * enqueue js script call back
 */
function ajax_enqueue_script() {
    wp_enqueue_script( 'script_ajax', get_theme_file_uri( 'assets/js/ajax-scripts.js' ), array( 'jquery' ), '1.0', true );
}

