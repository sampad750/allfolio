<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package allfolio
 */

get_header();
$comment_visibility  = ! comments_open() ? ' comments_off' : '';
$opt                 = get_option( 'allfolio_opt' );
$blog_column         = is_active_sidebar( 'sidebar_widgets' ) ? '8' : '12';
$is_single_post_meta = isset( $opt['is_single_post_meta'] ) ? $opt['is_single_post_meta'] : '1';
$is_social_share     = isset( $opt['is_social_share'] ) ? $opt['is_social_share'] : '1';
$is_post_tag         = isset( $opt['is_post_tag'] ) ? $opt['is_post_tag'] : '1';
$is_single_post_date = isset ( $opt['is_single_post_date'] ) ? $opt['is_single_post_date'] : '1';
$class               = $is_post_tag == '1' && has_tag() ? " text-md-right" : '';
$shareclass          = function_exists( 'allfolio_social_share' ) ? '6' : '12';
$tageclass           = has_tag() ? '6' : '12';
$is_single_post_meta  = isset( $opt['is_single_post_meta'] ) ? $opt['is_single_post_meta'] : '1';
$is_post_reading_time = isset( $opt['is_single_post_reading_time'] ) ? $opt['is_single_post_reading_time'] : '1';
$is_post_cat          = isset( $opt['is_single_cats'] ) ? $opt['is_single_cats'] : '1';

?>
    <section <?php post_class( 'blog-details-area fix pt-240 pb-0 pt-md-200 pb-md-60 pt-xs-150' . $comment_visibility ) ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="blogs mb-50">
                        <div class="blogs__content section-title blog_single_title_wrap">
							<?php
                                if ( $is_post_cat == '1' && has_category() ) {
                                    if ( $is_single_post_meta == '1' ) { ?>
                                        <span class="blog-single-cat">
                                             <a href="<?php Allfolio_helper()->first_category_link(); ?>">
                                                <?php Allfolio_helper()->first_category(); ?>
                                             </a>
                                        </span>
                                        <?php
                                    }
                                }
                                if ( $is_post_reading_time == '1' && $is_single_post_meta == '1' ) { ?>
                                    <span class="blog-single-reading-time"><?php Allfolio_helper()->reading_time(); ?></span>
                                    <?php
                                }
                                if ( ! empty( get_the_title() ) ) : ?>
                                    <h3 class="blog_single_heading"><?php the_title(); ?></h3>
                                <?php endif;
                                if ( $is_single_post_meta == '1' ) { ?>
                                <span class="blog_single_author"><span>Posted By</span>
                                    <?php
                                        $author_id = get_post_field('post_author', get_the_ID());
                                        echo get_the_author_meta('display_name', $author_id);
                                    ?>
                                </span>
                                <?php
                            }
							if ( $is_single_post_date == '1' ) {
								if ( $is_single_post_meta == '1' ) { ?>
                                   <span class="blog_single_date"><?php the_time( 'd M, Y' ); ?></span>
									<?php
								}
							}
							?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-<?php echo esc_attr($blog_column) ?>">
                    <div class="blogs-pad-wrapper">
                    <div class="blogs-std blog_single_item mb-75">
						<?php if ( has_post_thumbnail() ) : ?>
                            <div class="blogs__thumb mb-60">
								<?php the_post_thumbnail( 'full', array( 'class' => 'img-fluid' ) ); ?>
                            </div>
						<?php endif;
						while ( have_posts() ) : the_post();
							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'allfolio' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'allfolio' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						endwhile;
						wp_reset_postdata();
						?>
                    </div>
                    <div class="blog-share">
                        <div class="row">
							<?php
							if ( $is_post_tag == '1' && has_tag() ) :
								?>
                                <div class="col-lg-<?php echo esc_attr( $shareclass ); ?> col-md-6 col-12">
                                    <div class="share-tag mb-30">
										<?php the_tags( '<span>' . esc_html__( 'Tags : ', 'allfolio' ) . '</span>', ', ' ); ?>
                                    </div>
                                </div>
							<?php
							endif;
							if ( $is_social_share == '1' && function_exists( 'allfolio_social_share' ) ) :
								?>
                                <div class="col-lg-<?php echo esc_attr( $tageclass . $class ); ?> col-md-6 col-12">
                                    <div class="footer-social share-social mb-30">
										<?php allfolio_social_share(); ?>
                                    </div>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; ?>
                </div>
                </div>
				<?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php
get_footer();