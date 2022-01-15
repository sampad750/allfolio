<?php
$opt                    = get_option( 'allfolio_opt' );
$blog_layout            = $opt['blog_layout'] ?? 'list';
$thumb_size             = $blog_layout == 'list' ? 'allfolio_770x400' : 'full';
$blog_continue_read     = $opt['blog_continue_read'] ?? __( 'Continue Reading', 'allfolio' );
$post_title_length      = isset( $opt['post_title_length'] ) ? $opt['post_title_length'] : '';
$is_post_date           = isset( $opt['is_post_date'] ) ? $opt['is_post_date'] : '1';
$is_post_meta           = isset( $opt['is_post_meta'] ) ? $opt['is_post_meta'] : '1';
?>

<div <?php post_class( 'blogs blogs-std mb-75' ) ?>>
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
        echo '<p class="sticky-label">' . esc_html__( 'Featured', 'allfolio' ) . '</p>';
        }
        if ( $is_post_date == '1' ) {
            if ( $is_post_meta == '1' ) { ?>
                <span class="date-tag mb-10"><?php the_time(get_option('date_format')); ?></span>
                <?php
            }
        }
        $title = get_the_title();
        if ( ! empty( $title ) ) :
            ?>
            <h3 class="blog-title mb-15">
                <a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title_attribute()) ?>">
                    <?php Allfolio_helper()->limit_latter( get_the_title(), $post_title_length, '' ); ?>
                </a>
            </h3>
            <?php
        endif;
        echo strip_shortcodes( Allfolio_helper()->excerpt( 'blog_excerpt', false ) );
        ?>
        <a class="theme_btn blog-btn" href="<?php the_permalink(); ?>">
            <?php echo esc_html( $blog_continue_read ); ?> <i class="far fa-chevron-right"></i>
        </a>
    </div>
</div>