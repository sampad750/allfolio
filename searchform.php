<?php

add_filter( 'get_search_form', function ( $form ) {
	$value = get_search_query() ? get_search_query() : '';
	$form  = '<div class="widget-search-content"><form action="' . esc_url( home_url( "/" ) ) . '" class="subscribe-form">
                <input type="search" name="s" placeholder="' . esc_attr__( 'Search', 'allfolio' ) . '" value="' . esc_attr( $value ) . '">
                <button class="search-icon"><i class="fas fa-search"></i></button>
             </form></div>';
	return $form;
} );