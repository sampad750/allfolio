<?php
// Theme settings options
$opt                = get_option('allfolio_opt' );
$preloader_quotes   = !empty($opt['preloader_quotes']) ? $opt['preloader_quotes'] : '';
wp_enqueue_script('allfolio-preloader');
?>

<!-- Preloader -->
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="round_spinner">
            <div class="spinner"></div>
            <?php if ( !empty($opt['preloader_logo']['url']) ) : ?>
                <div class="text">
                    <img src="<?php echo esc_url($opt['preloader_logo']['url']) ?>" alt="<?php echo esc_attr__('Preloader logo','allfolio'); ?>" />
                </div>
            <?php endif; ?>
        </div>
        <?php if ( !empty($opt['preloader_title']) ) : ?>
            <h2 class="head"> <?php echo wp_kses_post($opt['preloader_title']) ?> </h2>
        <?php endif; ?>
        <p></p>
    </div>
</div>


    <!-- Preloader -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="img/logo.png" alt="">
                </div>
            </div>
            <h2 class="head">Did You Know?</h2>
            <p></p>
        </div>
    </div>