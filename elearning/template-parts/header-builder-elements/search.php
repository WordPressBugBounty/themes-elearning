<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="tg-header-action <?php elearning_css_class( 'elearning_header_search_class' ); ?>">
	<a href="#" class="tg-header-search__toggle">
		<i class="tg-icon tg-icon-search"></i>
	</a>
	<?php get_search_form( true ); ?>
</div>
