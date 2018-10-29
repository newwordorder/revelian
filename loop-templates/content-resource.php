<?php 
/**
 * Resource results partial template.
 *
 * @package understrap
 */
?>

    <div class="col-md-6 col-lg-4">
		<?php
			$taxinfo = get_the_terms( $query->post, array('resource_type'));
			$resource_type = $taxinfo[0]->name;
			?>

			<div class="blog-tile">
				<a href="<?php the_permalink(); ?>" class="blog-tile__tile-link">
				</a>
				<div class="blog-tile__thumb">

					<?php
					$category = $resource_type;
					$workImage = get_field('background_image_background_image');

						if( !empty($workImage) ):

						// vars
						$url = $workImage['url'];
						$alt = $workImage['alt'];

						?>
						<a href="<?php the_permalink(); ?>">
					
							<div class="blog-tile__thumb">
								<div class="background-image-holder" >
									<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>"/>
								</div>
							</div>
						</a>
					<?php endif; ?>
					<?php if( $category ): ?>
					<div class="icon" style="position:absolute; height: 1em; width: 1em; bottom:0; left: 0; background-color:white; display:flex; flex-direction: row; align-items: center; justify-content: center;">
						<?php if($category == 'Case Study' || $category == "White paper"): ?>
						<i class="fas fa-file" style="font-size:0.5em; color:#ef0d33;"></i>
						<?php endif; ?>
						<?php if($category == 'Event'): ?>
						<i class="fas fa-calendar" style="font-size:0.5em; color:#ef0d33"></i>
						<?php endif; ?>
						<?php if($category == 'Video'): ?>
						<i class="fas fa-video" style="font-size:0.5em; color:#ef0d33"></i>
						<?php endif; ?>
						<?php if($category == 'Media'): ?>
						<i class="fas fa-microphone" style="font-size:0.5em; color:#ef0d33"></i>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				</div>
					<div class="blog-tile__content">
						<h5><?php the_title(); ?></h5>
						<a class="btn" href="<?php the_permalink(); ?>">Read</a>
					</div>
			</div>

		</div>

<?php

?>