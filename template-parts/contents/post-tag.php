<?php

$opt                  = get_option( 'allfolio_opt' );
$is_post_meta         = isset( $opt['is_post_meta'] ) ? $opt['is_post_meta'] : '1';
$is_post_reading_time = isset( $opt['is_post_reading_time'] ) ? $opt['is_post_reading_time'] : '1';
$is_post_cat          = isset( $opt['is_post_cat'] ) ? $opt['is_post_cat'] : '1';

if ( $is_post_reading_time == '1' ) {
	if ( $is_post_meta == '1' ) { ?>
        <a href="<?php Allfolio_helper()->day_link(); ?>"><?php Allfolio_helper()->reading_time(); ?></a>
		<?php
	}
}

if ( $is_post_cat == '1' && has_category() ) {
	if ( $is_post_meta == '1' ) { ?>

        <span class="tag mb-25">
             <a href="<?php Allfolio_helper()->first_category_link(); ?>">
                <?php Allfolio_helper()->first_category(); ?>
             </a>
        </span>

		<?php
	}
}