<?php

$opt                  = get_option( 'allfolio_opt' );
$thumb_size           = !empty( $opt['blog_layout'] == 'grid' ) ? 'allfolio_360x270' : 'full';
$post_title_length    = isset( $opt['post_title_length'] ) ? $opt['post_title_length'] : '';
$is_post_meta         = isset( $opt['is_post_meta'] ) ? $opt['is_post_meta'] : '1';
$is_post_reading_time = isset( $opt['is_post_reading_time'] ) ? $opt['is_post_reading_time'] : '1';
$is_post_cat          = isset( $opt['is_post_cat'] ) ? $opt['is_post_cat'] : '1';
$blog_column          = ! empty( $opt['blog_column'] ) ? $opt['blog_column'] : '6';

?>

<div class="col-lg-<?php echo esc_attr( $blog_column ) ?> col-md-4 col-sm-12">
    <div <?php post_class( 'blogs mb-50' ) ?>>
        <div class="blogs-mask-img">
            <div class="blogs__thumb mb-40">
				<?php
				if ( ! is_search() ) {
					the_post_thumbnail( $thumb_size );
				}
				?>
            </div>
        </div>
        <div class="blogs__content">
			<?php include( 'post-tag.php' );
			$title = get_the_title();
			if ( ! empty( $title ) ) : ?>
                <h3 class="blog-title mb-10">
                    <a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title_attribute()) ?>">
						<?php Allfolio_helper()->limit_latter( get_the_title(), $post_title_length, '' ); ?>
                    </a>
                </h3>
			<?php endif; ?>
            <a class="blog-btn" href="<?php the_permalink(); ?>">
                <img src="<?php echo ALLFOLIO_DIR_IMG ?>/icon12.svg" alt="<?php echo esc_attr__( 'Read More', 'allfolio' ) ?>">
            </a>
        </div>
    </div>
</div>