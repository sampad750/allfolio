<?php
$thumb_size           = is_active_sidebar( 'sidebar_widgets' ) ? 'allfolio_370x220' : 'full';
$opt                  = get_option( 'allfolio_opt' );
$post_title_length    = isset( $opt['post_title_length'] ) ? $opt['post_title_length'] : '';
$is_post_meta         = isset( $opt['is_post_meta'] ) ? $opt['is_post_meta'] : '1';
$is_post_reading_time = isset( $opt['is_post_reading_time'] ) ? $opt['is_post_reading_time'] : '1';
$is_post_cat          = isset( $opt['is_post_cat'] ) ? $opt['is_post_cat'] : '1';
$blog_column          = ! empty( $opt['blog_column'] ) ? $opt['blog_column'] : '6';

$allowed_html = array(
	'a'      => array(
		'href'  => array(),
		'title' => array()
	),
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
	'iframe' => array(
		'src' => array(),
	)
);
?>
<div <?php post_class( 'blogs blogs-std mb-75 blog_link_post' ) ?>>

    <div class="blogs__content">
		<?php
		if ( is_sticky() ) {
			echo '<p class="sticky-label">' . esc_html__( 'Featured', 'allfolio' ) . '</p>';
		}
		$title = get_the_title();
		if ( ! empty( $title ) ) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php esc_attr(the_title_attribute()) ?>">
                <p> <?php Allfolio_helper()->limit_latter( get_the_title(), $post_title_length, '' ); ?> </p>
            </a>
		<?php endif; ?>
    </div>

</div>