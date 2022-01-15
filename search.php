<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package allfolio
 */

get_header();

$opt             = get_option( 'allfolio_opt' );
$blog_column     = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$blog_layout_opt = ! empty( $opt['blog_layout'] ) ? $opt['blog_layout'] : 'list';
$blog_layout     = ! empty( $_GET['blog_layout'] ) ? $_GET['blog_layout'] : $blog_layout_opt;
$sec_class       = '';
if ( $blog_layout == 'list' ) {
	$sec_class   = 'blog-standard-area fix pt-80 pb-75 pt-md-20 pb-md-60 pt-xs-20';
} elseif ( $blog_layout == 'grid' ) {
	$sec_class   = 'blog-area pt-80 pb-75 pt-md-0 pb-md-35 pt-xs-0 pb-xs-35';
	$blog_column = '12';
}
?>

    <section class="<?php echo esc_attr( $sec_class ) ?>">
        <div class="container">
            <div class="row">
				<?php
				if ( $blog_layout == 'list' ) {
					?>
                    <div class="col-lg-<?php echo esc_attr( $blog_column ) ?>">
						<?php
						if ( have_posts() ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/contents/content', get_post_format() );
							endwhile; ?>

                            <div class="mt-100 mb-115 mb-md-75 mb-xs-75">
								<?php Allfolio_helper()->pagination(); ?>
                            </div>

							<?php
						} else {
							get_template_part( 'template-parts/contents/content', 'none' );
						}
						?>
                    </div>
					<?php
					get_sidebar();
				} elseif ( $blog_layout == 'grid' ) {
					?>
                    <div class="col-lg-<?php echo esc_attr( $blog_column ) ?>">
                        <div class="row">
							<?php
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/contents/content-grid', get_post_format() );
                                endwhile;
							?>
                        </div>
                        <div class="pagination-area mt-70 mb-35 content-grid-pagination">
							<?php Allfolio_helper()->pagination(); ?>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
    </section>
<?php
get_footer();