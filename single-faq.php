<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package allfolio
 */

get_header();
$opt                = get_option( 'allfolio_opt' );
$is_dark_mode       = isset( $opt['is_dark_mode'] ) ? $opt['is_dark_mode'] : '';
$is_dark_mode_block = !empty( $is_dark_mode == 1 ) ? 'dark-block-wrapper' : '';
while ( have_posts() ) : the_post(); ?>
    <div class="faqs-inner-page">
        <div class="shapes shape-two"></div>
        <div class="shapes shape-three"></div>
        <div class="shapes shape-four"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="all-faqs">
                        <div class="faqs-all-qus md-m0">
                            <div class="article-preview <?php echo esc_attr($is_dark_mode_block)?>">
                                <div class="d-flex">
									<?php echo get_avatar( get_the_author_meta( 'ID' ), 40, 'gravatar_default', 'avatar', [ 'class' => 'avatar-img' ] ); ?>
                                    <div>
                                        <h3 class="font-rubik"><?php the_title(); ?></h3>
                                        <div class="avatar-info">
											<?php
                                                if ( $opt['is_faq_author'] ) {
											        echo esc_html__( 'Written by ', 'allfolio' );
                                                    the_author();
                                                }
                                            ?>
                                            <br>
											<?php
                                                if ( $opt['is_faq_date'] ) {
                                                    the_time( 'j M, Y' );
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="article-details">
									<?php the_content(); ?>
                                </div> <!-- /.article-details -->
                            </div> <!-- /.article-preview -->
                        </div> <!-- /.faqs-all-qus -->
                    </div> <!-- /.all-faqs -->
                </div>
            </div>
        </div>
    </div> <!-- /.faqs-inner-page -->
<?php
endwhile;
wp_reset_postdata();
get_footer();