<?php get_header( 'corissue' ); 
/* 
* COR 2015 theme corissue single page template.
* removed unused post-entry meta (date, comments, etc)
* 	see below REM comment
*
*
*/

?>

<div class="content-out">	
<div class="clear"></div>	
	<div class="wrap">
		<div class="content">
			<div class="content-in">
			<div id="issueWrapper">
			
			<?php //if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php 				
		// Grab the plugin global, remove filtering for now...
		global $agora_mw_auth_plugin;
		// Remove the filter
		remove_filter( 'the_content', array($agora_mw_auth_plugin, 'content_filter'), 999);				
		
		// check for agora allow
		// check that the class exists 
		if(class_exists('agora_auth_container')) {
			$auth_container = new agora_auth_container($post_id);
			$auth_container = apply_filters( 'agora_middleware_check_permission', $auth_container);
			if($auth_container->is_allowed()) {
				// show the content.
				$args = array( 'post_type' => 'corissue', 'order' => 'DEC' , 'post_status' => 'publish' );
				$corissue_posts = get_posts( $args );			
				if ($corissue_posts) {
					foreach ( $corissue_posts as $post ) { 
						setup_postdata( $post );				
						?>
						<div class="listUnit">
							<div class="issueListWrapper">
								<div class="issueHeaderWrapper">
									<span class="issueHeader"><?php the_title(); ?></span>
									<span class="issueDate"><?php echo get_the_date('F, Y'); ?></span>
								</div> <!-- end class issueHeaderWrapper -->
								<div class="issueThumb">
									<a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_post_thumbnail() ?></a>
								</div>
								<div class="issueList">
									<ul>
										<div class="fullIssue">	
											<?php
												// get issue links
												$issueLinks = get_post_meta($post->ID);
												// default post title as a link
												$fullIssueLink = get_permalink( $post->ID );
												// if issue has a full issue pdf available, change link
												foreach ($issueLinks as $key => $value){
													if ( strpos( $key, "Full Issue" ) !== false ) {
														$fullIssueLink = $value[0];
													}
												}
												echo '<li><a href="' . $fullIssueLink . '" target="_blank">Full Issue</a></li>';
											?>
											
										</div>
										<hr class="hrListTop">
										<?php 
										$downloadItems = get_post_meta($post->ID);
										foreach ( $downloadItems as $downloadItem => $downloadItemLink ) {
											if( !isset($downloadItemLink[0]) ) continue;
											if( in_array($downloadItem,array(
												"Full Issue",
												"_edit_lock",
												"_edit_last",
												"_name",
												"_thumbnail_id")
											) ) continue;

											// Check the file extension and assign class
											$dlIcon = '';
											switch (substr($downloadItemLink[0], -4)) {
												case ".pdf": 
													$dlIcon = 'iconPdf'; 
													break;

												case ".doc": 
												case "docx": 
													$dlIcon = 'iconDoc'; 
													break;

												case ".xls": 
												case "xlsx": 
													$dlIcon = 'iconXls'; 
													break;
												// added default
												default:
													$dlIcon = 'iconDoc'; 
													break;
												}
												echo '<li class="'. $dlIcon .'"><a href="'.$downloadItemLink[0].'" target="_blank">'.$downloadItem.'</a></li>';
											}
										?>
									</ul>
								</div>
							</div><!-- end class issueListWrapper -->
						</div><!-- end class listUnit -->						
					<?php
					}
					wp_reset_postdata();	
				}
				echo '</div><!-- end issueWrapper-->';
				get_sidebar( 'corissue' );			
				echo '</div> <!-- end content-in -->';		
			// end of agora is_allowed to see
			} 
			else {
				// agora says not allowed to see
				echo '<br /><span style="color: Red;">ERROR - Not allowed to see content.</span>';	
				echo '<div class="agoraLoginPage">';
				echo do_shortcode( '[agora_middleware_login]' );
				echo '</div>';
			}	
		}
		else {
			// uh-oh, redirect to home_url()?
			echo 'ERROR - No plugin found.';
			wp_redirect( home_url() ); 
			exit;
		}
		?>		
		</div><!-- end content -->
	</div><!-- end wrap -->
</div><!-- end content-out -->

<div class="clear"></div>

<?php get_footer(); ?>
