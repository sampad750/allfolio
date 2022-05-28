<?php

/**
 * Template Name: Allfolio Full Screen Slider
 */

get_header();
?>
<!-- Full Page Slider -->
<div id="fullpage" class="full-page-slide">
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            the_content();
        endwhile;
        ?>
    </div>
</div>
<?php
get_footer('empty');
