<?php
$opt             = get_option( 'allfolio_opt' );
$action_btn_link = function_exists( 'get_field' ) ? get_field( 'action_btn_link' ) : '';
$is_menu_btn     = function_exists( 'get_field' ) ? get_field( 'is_menu_btn' ) : '';
$is_menu_btn_opt = ! empty( $opt['is_menu_btn'] ) ? $opt['is_menu_btn'] : '';
$is_menu_btn     = isset( $is_menu_btn ) ? $is_menu_btn : '1';

if ( is_singular( 'post' ) ) {
	$is_menu_btn = $is_menu_btn_opt;
}

// Button Title
$btn_title = '';

if ( ! empty( $action_btn_link['heading'] ) ) {
	$btn_title = $action_btn_link['heading'];
} else {
	$btn_title = ! empty( $opt['menu_btn_label'] ) ? $opt['menu_btn_label'] : '';
}

// Button URL
$btn_url = '#';
if ( ! empty( $action_btn_link['url'] ) ) {
	$btn_url = $action_btn_link['url'];
} else {
	$btn_url = ! empty( $opt['menu_btn_url'] ) ? $opt['menu_btn_url'] : '';
}

// Button Target
$btn_target = '';
if ( ! empty( $action_btn_link['target'] ) ) {
	$btn_target = "target='{$action_btn_link['target']}'";
} else {
	$btn_target = ! empty( $opt['menu_btn_target'] ) ? "target='{$opt['menu_btn_target']}'" : '';
}

?>

<?php
if ( $is_menu_btn == '1' && ! empty( $btn_title ) ) : ?>
    <a class="theme-btn btn-small" href="<?php echo esc_url( $btn_url ); ?>" <?php echo wp_kses_post( $btn_target ); ?> >
		<?php echo esc_html( $btn_title ); ?>
    </a>
<?php endif; ?>
