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
$is_footer_block    = isset( $opt['cs_footer_visibility'] ) ? $opt['cs_footer_visibility'] : '1';
$is_dark_mode       = isset( $opt['is_dark_mode'] ) ? $opt['is_dark_mode'] : '';
$is_dark_mode_block = !empty( $is_dark_mode == 1 ) ? 'dark-block-wrapper' : '';
while ( have_posts() ) : the_post();
	$is_case_study_video  = function_exists( 'get_field' ) ? get_Field( 'is_video' ) : '';
	$case_study_video_url = function_exists( 'get_field' ) ? get_Field( 'video_url' ) : '';
	$project_attributes   = function_exists( 'get_field' ) ? get_Field( 'project_attributes' ) : '';
	$share_links          = function_exists( 'get_field' ) ? get_Field( 'share_links' ) : '';
?>
    <!--video-area start-->
	<?php if ( has_post_thumbnail( get_the_ID() ) || $is_case_study_video == "Show" ) : ?>
        <section class="video-area pt-35 pb-85 pt-md-0 pt-xs-0 pb-xs-30">
            <div class="container custom-container-subs">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="video-wrapper overlay-soft text-center" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?>);">
                            <div class="video-content">
								<?php
								if ( $is_case_study_video == "Show" )  :
									wp_enqueue_style( 'magnific-popup' );
									wp_enqueue_script( 'magnific-popup' );
									?>
                                    <h2 class="video-title mb-40"><?php echo esc_html__('Watch Video','allfolio') ?></h2>
                                    <a href="<?php echo esc_attr($case_study_video_url); ?>" class="popup-video cs-popup-video">
                                        <img src="<?php echo ALLFOLIO_DIR_IMG; ?>/play2.svg" alt="<?php echo esc_attr__('Play Icon','allfolio') ?>">
                                    </a>
								    <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
	<?php endif; ?>
    <!--video-area end-->

    <!--case-details-area start-->
    <section class="case-details-area pb-50 pb-md-20 pt-xs-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
					<?php the_content(); ?>
                </div>
                <div class="col-lg-4">
                    <ul class="case-info pl-45 pl-xs-0">
						<?php
                            if ( ! empty( $project_attributes ) ) :
                                foreach ( $project_attributes as $project_attribute ) :
                                    ?>
                                    <li>
                                        <span> <?php echo esc_html( $project_attribute['title'] ); ?> </span>
                                        <h5> <?php echo esc_html( $project_attribute['value']); ?> </h5>
                                    </li>
                                <?php endforeach;
                            endif;

                            if ( ! empty( $share_links == "Show" ) && function_exists( 'allfolio_social_share' )  ) :
                                ?>
                                <li>
                                    <div class="footer-social case-study-share">
	                                    <?php allfolio_social_share(); ?>
                                    </div>
                                </li>
                            <?php
						endif;
						?>
                    </ul>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <!--case-details-area end-->
<?php
endwhile;
wp_reset_postdata();

if ( $is_footer_block == '1' ) {
	?>
    <section class="subscribe-letter-area pt-50 pb-115">
        <div class="container">
            <div class="subs-letter-bg grey-bg-soft pt-65 pb-55 <?php echo esc_attr($is_dark_mode_block) ?>">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="subscribe-wrapper">
                            <div class="section-title text-center">

                                <?php if ( ! empty( $opt['cs_page_title'] ) ) : ?>
                                    <h3 class="mb-25 cs_footer_title"><?php echo wp_kses_post( $opt['cs_page_title'] ); ?></h3>
								<?php endif;

								if ( ! empty( $opt['cs_page_subtitle'] ) ) : ?>
                                    <h4 class="sub-title mb-50 cs_footer_subtitle"><?php echo esc_html( $opt['cs_page_subtitle'] ); ?></h4>
								<?php endif;

								if ( ! empty( $opt['cs_page_btn'] ) ) : ?>
                                    <a href="<?php echo esc_attr($opt['cs_page_btnurl']); ?>" class="theme_btn sub-btn cs_footer_btn">
                                        <?php echo esc_html( $opt['cs_page_btn'] ); ?>
                                    </a>
								<?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }
get_footer();