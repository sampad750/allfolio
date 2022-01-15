<?php

$opt                = get_option( 'allfolio_opt' );
$thumb_size         = !empty( $opt['blog_layout'] == 'list' ) ? 'allfolio_770x400' : 'full';
$blog_continue_read = ! empty( $opt['blog_continue_read'] ) ? $opt['blog_continue_read'] : __( 'Continue Reading', 'allfolio' );
$post_title_length  = isset( $opt['post_title_length'] ) ? $opt['post_title_length'] : '';
$is_post_date       = isset( $opt['is_post_date'] ) ? $opt['is_post_date'] : '1';
$is_post_meta       = isset( $opt['is_post_meta'] ) ? $opt['is_post_meta'] : '1';

?>

<div <?php post_class('blogs blogs-std mb-75') ?>>

    <?php if ( has_post_thumbnail() ) : ?>
    <div class="blogs__thumb mb-35">
        <?php
            if ( ! is_search() ) {
                the_post_thumbnail( $thumb_size );
            }
        ?>
    </div>
	<?php endif; ?>

    <div class="blogs__content">
		<?php

            if ( is_sticky() ) {
                echo '<p class="sticky-label">'.esc_html__( 'Featured', 'allfolio' ).'</p>';
            }
            if ( $is_post_date == '1' ) {
                if ( $is_post_meta == '1' ) { ?>
                    <span class="date-tag mb-20"><?php the_time( 'd M, Y' ); ?></span>
                    <?php
                }
            }

		?>
        <a href="<?php the_permalink(); ?>">
            <?php the_title('<h3 class="blog-heading mb-15">','</h3>'); ?>
        </a>
        <h5 class="mb-25">
            <?php echo strip_shortcodes( Allfolio_helper()->excerpt( 'blog_excerpt', false ) ); ?>
        </h5>
        <a class="theme_btn blog-btn" href="<?php the_permalink(); ?>">
            <?php echo esc_html( $blog_continue_read ); ?> <i class="far fa-chevron-right"></i>
        </a>

    </div>
</div>