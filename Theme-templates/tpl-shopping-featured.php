<?php 
/*********

Template Name: Member-Shopping-Featured-Template

*********/
?>

<?php get_header(); ?>
<div id="content">

	<div id="contentleft">
		<h1 style="color:<?php echo get_option('general_bg'); ?>;"><?php echo get_the_title(); ?></h1>
		<?php if ( is_user_logged_in() ) {?>
		<?php $current_user = wp_get_current_user(); ?>
			<div class="portal_container">
				<div class="portal_left">
					<ul class="category_list" style="background:<?php echo get_option('general_bg'); ?>;">
						<a href="<?php echo get_option('siteurl'); ?>/featured/"><li id="for_featured" class="portal_cat_list" onmouseover="j(this).css('background','<?php echo get_option('hover_bg'); ?>');" onmouseout="j(this).css('background','<?php echo get_option('general_bg'); ?>');" >Featured</li></a>
						<a href="<?php echo get_option('siteurl'); ?>/favourites/"><li id="for_favourites" class="portal_cat_list" onmouseover="j(this).css('background','<?php echo get_option('hover_bg'); ?>');" onmouseout="j(this).css('background','<?php echo get_option('general_bg'); ?>');">Favourites</li></a>
						<?php 
							$taxonomy_name = 'store_cat';
							$store_categories = get_terms($taxonomy_name); 
							foreach($store_categories as $key => $store_category) { 
							$valid_active_posts = get_posts(array('post_type' => 'stores', 'posts_per_page' => -1 ,'order' => 'ASC' ,'tax_query' => array( array( 'taxonomy' => $taxonomy_name, 'field' => 'term_id', 'terms' => $store_category->term_id)),'meta_query' => array( array( 'key' => 'active_section_check_box','value' => 'inactivestore', 'compare' => 'NOT LIKE' )))); 
							$counted_query = count($valid_active_posts);
							if( $counted_query != 0 ){?>
							<a href="<?php echo get_term_link($store_category); ?>"><li id="<?php echo $store_category->term_id; ?>" class="portal_cat_list" onmouseover="j(this).css('background','<?php echo get_option('hover_bg'); ?>');" onmouseout="j(this).css('background','<?php echo get_option('general_bg'); ?>');"><?php echo $store_category->name; ?></li></a>
						<?php } 
						 }	?>
					</ul>
				</div>
				<div class="portal_right">
				<?php $queried_category = get_queried_object(); ?>
					<div class="category_show_container">
						<h2 class="dynamic_heading" style="background:<?php echo get_option('hover_bg'); ?>;">Featured</h2>
						<!-- static -->
						<div class="inner_portal_store_static">
							<div class="logo_store_static">
								<p>Store</p>
							</div>
							<div class="logo_store_static">
								<p>Store Name</p>
							</div>
							<div class="logo_store_static">
								<p>Description</p>
							</div>
							<div class="logo_store_static">
								<p>Offer</p>
							</div>
							<div class="logo_store_static">
								<p>Favourite</p>
							</div>
						</div>	
						<!-- dynamic -->
						<?php 	$term_cat_id = $queried_category->term_id;
								$favourite_data = get_user_meta($current_user->ID, 'user_favourite_store');
								$query = 'post_type=stores&posts_per_page=-1&meta_key=sort_number&orderby=meta_value&order=ASC';
								$the_query = new WP_Query( $query );
								if ( $the_query->have_posts() ) :
								while ( $the_query->have_posts() ) : $the_query->the_post();
								//foreach($store_posts as $store_post){
								$active_section_check_box = get_post_meta( $post->ID, 'active_section_check_box', true );
								if($active_section_check_box == 'activestore'){
								
								$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'product_page_list');
								$trimmed_words = wp_trim_words($post->post_content, 11);
								$featured_checkbox = get_post_meta( $post->ID, 'featured_checkbox', true );
								
								$sort_number[] = get_post_meta( $post->ID, 'sort_number', true );
								
								$store_offer_code = get_post_meta( $post->ID, 'store_offer_code', true );
								$store_offer_start = strtotime(get_post_meta( $post->ID, 'store_offer_start', true ));
								$store_offer_end = strtotime(get_post_meta( $post->ID, 'store_offer_end', true ));
								$today_date = strtotime(date("m/d/Y"));
								if(!empty($featured_checkbox)){
								if(($today_date >= $store_offer_start) && ($today_date <= $store_offer_end)) { ?>
						<div class="dynamic_category_container">					
							<div class="inner_portal_store">
								<div class="logo_store">
								<?php $store_affialiate_link = get_post_meta( $post->ID, 'store_affialiate_link', true ); ?>
								<a href="<?php if ( strpos($store_affialiate_link,'http://' ) == false ) {  $final_url = 'http://' . $store_affialiate_link; echo $final_url; } else { echo $store_affialiate_link; } ?>" target="_blank">								
									<img height="200" width="200" src="<?php echo $url[0]; ?>">
								</a>
								</div>
								<div class="logo_store">
									<h3 style="border:none;margin: 30% 0;"><?php echo $post->post_title; ?></h3>
								</div>
								<div class="logo_store">
									<p><?php echo $trimmed_words; ?></p>
								</div>
								<div class="logo_store">
									<h3 style="border:none;margin: 30% 0;"><?php echo $store_offer_code; ?></h3>
								</div>
								<div class="logo_store">
									<input id="<?php echo $post->ID; ?>" class="favourite_check" type="checkbox" name="favourite_check" value="32" <?php if(in_array($post->ID, $favourite_data)){ echo 'checked'; }?> />
									<span class="<?php echo $post->ID; ?>_notification"></span>
								</div>
							</div>
						</div><!-- dynamic_category_container -->
						<?php } 
							} 
							} //active status
						//} // for each
						endwhile;
						endif;
						
						// Reset Post Data
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		<?php } else { ?>
		<p>Please <a href="<?php echo get_option('home'); ?>/login/" >Login</a> To View Store Page</p>
		<?php } ?>
	</div>
	

</div>

<?php get_footer(); ?>