<?php get_header(); ?>

<div id="primary" class="hfeed">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php $mediaType = get_post_meta($post->ID, 'tz_portfolio_type', true); ?>
	<!--BEGIN .hentry -->
	<div <?php post_class() ?> id="post-<?php the_ID(); ?>" data-portfolioType="<?php echo strtolower($mediaType); ?>">
	    
	    <?php $portfolioURL = get_post_meta($post->ID, 'tz_portfolio_url', true); ?>
		
		<h1 class="entry-title-single-portfolio">
		    <?php the_title(); ?>
		    <?php if( !empty($portfolioURL) ) { ?>
		        <a target="_blank" href="<?php echo $portfolioURL; ?>"></a>
		    <?php } ?>
		</h1>
		
		
		
		<!-- BEGIN .entry-content -->
		<div class="entry-content-single-portfolio">
    		
    		<?php the_content(); ?>
		
    		<!-- BEGIN .entry-meta -->
    		<div class="entry-meta">
    		    
    		    <?php 
    		        // get the meta information and display if supplied
    		        $portfolioDate = get_post_meta($post->ID, 'tz_portfolio_date', true); 
    		        $portfolioClient = get_post_meta($post->ID, 'tz_portfolio_client', true);
                    
                    if( !empty($portfolioDate) ) {
                        echo '<h4>' . __('Date', 'framework') . '</h4>';
                        echo '<p>' . $portfolioDate . '</p>';
                    }
		            
		            if( !empty($portfolioClient) ) {
		                echo '<h4>' . __('Client', 'framework') . '</h4>';
		                echo '<p>' . $portfolioClient . '</p>';
		            }
		            
		            the_terms($post->ID, 'skill-type', '<h4>' . __('Skills', 'framework') . '</h4>', '<br />', ''); 
		        ?>
		        
    		<!-- END .entry-meta -->
    		</div>
		
		<!-- END .entry-content -->
		</div>
		<?php // get the media elements
		    
		    switch( $mediaType ) {
                case "Image":
                    tz_image($post->ID, 'portfolio-main');
                    break;
                    
                case "Slideshow":
                    tz_gallery($post->ID, 'portfolio-main');
                    break;

                case "Video":
                    $embed = get_post_meta($post->ID, 'tz_portfolio_embed_code', true);
                    if( !empty($embed) ) {
                    	echo "<div class='video-frame'>";
                        echo stripslashes(htmlspecialchars_decode($embed));
                        echo "</div>";
                    } else {
                        tz_video($post->ID);
                    }
                    break;

                case "Audio":
                    tz_audio($post->ID);
                    break;

                default:
                    break;
            }
		?>
		<?php $related_ports = get_option('tz_portfolio_related');
		if( !empty($related_ports) || $related_ports != '0' ) { 
		    $related = get_posts_related_by_taxonomy($post->ID, 'skill-type', array('posts_per_page' => $related_ports));
		    $i = 0;
		    
		    if( $related->have_posts() ) : 
		?>
		<!-- BEGIN .entry-related -->
		<div class="entry-related">
		
			<h2 class="related-title"><?php _e('Related Projects', 'framework') ?></h2>
			
			<ul>
			
	        <?php while( $related->have_posts() ) : $related->the_post(); ?>
	            <li<?php if($i%3==2) { echo ' class="omega"'; } ?>>
	            <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
	    		<div class="post-thumb">
	    			<a title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
	    			    <?php the_post_thumbnail('portfolio-thumb'); ?>
	    			</a>
	    		</div>
	    		<?php } ?>
			
	    		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'framework'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
				</li>	
				<?php $i++; ?>		
	        <?php endwhile; ?>
	        </ul>
        
		<!-- END .entry-related -->
		</div>
		
    		<?php endif; wp_reset_postdata(); ?>
		<?php } ?>
				
	<!-- END .hentry -->
    </div>

<?php endwhile; ?>

        <!--BEGIN .navigation .single-portfolio-navigation -->
        <div class="navigation single-portfolio-navigation clearfix">

      <!--  	<div class="nav-next"><?php next_post_link('&larr; %link'); ?></div>
        	<div class="nav-previous"><?php previous_post_link('%link &rarr;'); ?></div>

        <!--END .navigation .single-portfolio-navigation -->
        </div>

<?php endif; ?>

<!--END #primary .hfeed-->
</div>

<?php get_footer(); ?>