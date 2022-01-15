<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package allfolio
 */

get_header();
while ( have_posts() ) : the_post();
	$member_info        = function_exists( 'get_field' ) ? get_Field( 'member_info' ) : '';
	$share_links        = function_exists( 'get_field' ) ? get_Field( 'share_links' ) : '';
	$btn_text           = function_exists( 'get_field' ) ? get_Field( 'btn_text' ) : '';
	$team_position      = function_exists( 'get_field' ) ? get_Field( 'team_position' ) : '';
	$btn_url            = function_exists( 'get_field' ) ? get_Field( 'btn_url' ) : '';
	$socials            = function_exists( 'get_field' ) ? get_Field( 'social_links' ) : '';

	$socia_fb           = !empty($socials['team_facebook']) ? $socials['team_facebook'] : '';
	$socia_twt          = !empty($socials['team_twitter']) ? $socials['team_twitter'] : '';
	$socia_linked       = !empty($socials['team_twitter']) ? $socials['team_linkedin'] : '';
	$socia_pint         = !empty($socials['team_twitter']) ? $socials['team_pinterest'] : '';

?>
    <!--video-area start-->

    <section class="team-member-single">
        <div class="container">
            <div class="row team-member-container">
                <div class="col-lg-6 author-column">
					<?php the_post_thumbnail(); ?>
                </div>
                <div class="col-lg-6">
                    <div class="team-member-details">
                        <h2> <?php the_title(); ?> </h2>
						<?php if ( has_excerpt() ) {
							the_excerpt();
						} ?>
                        <div class="team-member-info">
							<?php
                                if ( ! empty( $team_position ) ) { ?>
                                    <p>
                                        <b><?php echo esc_html__( 'Position', 'allfolio' ); ?>:</b>
                                        <?php echo esc_html( $team_position ); ?>
                                    </p>
                                <?php }
                                if ( ! empty( $member_info ) ) :
                                    foreach ( $member_info as $member_infos ) :
                                        ?>
                                        <p>
                                            <b><?php echo esc_html( $member_infos['info_label'] ); ?>:</b>
                                            <?php echo esc_html( $member_infos['info_value'] ); ?>
                                        </p>
                                    <?php
                                    endforeach;
                                endif;
							?>
                            <div class="social_links">
								<?php if ( ! empty( $socia_fb ) ) { ?>
                                    <a href="<?php echo esc_url($socia_fb) ?>"><i class="fab fa-facebook-f"></i></a>
								<?php }
								if ( ! empty( $socia_twt ) ) { ?>
                                    <a href="<?php echo esc_url($socia_twt) ?>"><i class="fab fa-twitter"></i></a>
								<?php }
								if ( ! empty( $socia_linked ) ) { ?>
                                    <a href="<?php echo esc_url($socia_linked) ?>"><i class="fab fa-linkedin-in"></i></a>
								<?php }
								if ( ! empty( $socia_pint ) ) { ?>
                                    <a href="<?php echo esc_url($socia_pint) ?>"><i class="fab fa-pinterest"></i></a>
								<?php } ?>
                            </div>

							<?php if ( ! empty( $btn_text ) ) { ?>
                                <p>
                                    <a href="<?php echo esc_url( $btn_url ) ?>" class="cv_download" download><?php echo esc_html( $btn_text ) ?>
                                        <img src="<?php echo ALLFOLIO_DIR_IMG ?>/team_btn.svg" alt="<?php echo esc_attr__( 'Download Icon', 'allfolio' ) ?>" class="download-black-icon"/>
                                        <img src="<?php echo ALLFOLIO_DIR_IMG ?>/download_white.svg" alt="<?php echo esc_attr__( 'Download Icon', 'allfolio' ) ?>" class="download-hover-icon"/>
                                    </a>
                                </p>
							<?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container team-member-content-wrapper">
		<?php the_content(); ?>
    </div>

<?php
endwhile;
wp_reset_postdata();
get_footer();