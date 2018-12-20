<?php 
/**
 * Resource results partial template.
 *
 * @package understrap
 */
?>

    <div class="col-md-6 col-lg-4 product-flex">
		<?php
			$taxinfo = get_the_terms( $query->post, array('resource_type'));
			$resource_type = $taxinfo[0]->slug;
			$category = $resource_type;
			?>

			<div class="blog-tile ">
				<a href="<?php the_permalink(); ?>" <?php if($category == 'media'): ?>target="_blank"<?php endif; ?> class="blog-tile__tile-link">
				</a>
				<div class="blog-tile__thumb">

					<?php
					
					$workImage = get_field('tile_image');

						if( !empty($workImage) ):

						// vars
						$url = $workImage['url'];
						$alt = $workImage['alt'];

						?>
						<a href="<?php the_permalink(); ?>">
					
							<div class="blog-tile__thumb">
								<div class="background-image-holder" style="background-image:url('<?php echo $url; ?>')">
									<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
								</div>
							</div>
						</a>
					<?php endif; ?>
					<?php if( $category ): ?>
					<div class="icon" style="position:absolute; height: 1em; width: 1em; bottom:0; left: 0; background-color:white; display:flex; flex-direction: row; align-items: center; justify-content: center;">
						<?php if($category == "white-papers"): ?>
							<i class="fas fa-file" style="font-size:0.5em; color:#ef0d33;"></i>
						<?php endif; ?>
						<?php if($category == 'case-studies'): ?>
							<i class="fas fa-file" style="font-size:0.5em; color:#ef0d33;"></i>
						<?php endif; ?>
						<?php if($category == 'event'): ?>
							<i class="fas fa-calendar" style="font-size:0.5em; color:#ef0d33"></i>
						<?php endif; ?>
						<?php if($category == 'video'): ?>
							<i class="fas fa-video" style="font-size:0.5em; color:#ef0d33"></i>
						<?php endif; ?>
						<?php if($category == 'media'): ?>
							<i class="fas fa-microphone" style="font-size:0.5em; color:#ef0d33"></i>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				</div>
					<div class="blog-tile__content">
						<h5><?php the_title(); ?></h5>
						<?php if(get_field('description')): ?>
							<p><?php the_field('description'); ?></p>
						<?php endif; ?>
						<a class="btn" <?php if($category == 'media'): ?>target="_blank"<?php endif; ?> href="<?php the_permalink(); ?>">
						<?php if($category == 'video'): ?>
							Watch
						<?php else: ?>
							Read
						<?php endif; ?>
						
						
						</a>
					</div>
			</div>

		</div>

<?php

?>