<?php
$opt = get_option( 'allfolio_opt' );
?>

<!-- slide-bar start -->
<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
    </div>

    <!-- side-mobile-menu start -->
    <nav class="side-mobile-menu">
		<?php
		if ( has_nav_menu( 'main_menu' ) ) {
			wp_nav_menu( array(
				'menu'           => '',
				'theme_location' => 'main_menu',
				'container'      => null,
				'menu_class'     => "",
				'menu_id'        => 'mobile-menu-active',
				'walker'         => new Allfolio_Mobile_Nav_Walker(),
				'depth'          => 2
			) );
		}
		?>
    </nav>

    <!-- side-mobile-menu end -->
</aside>