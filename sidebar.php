<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _SKutu Foundation
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="medium-4 columns show-for-medium-up" id="sidebar" role="navigation"><!-- Foundation .medium-4 .columns start -->
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
</aside><!-- Foundation .medium-4 .columns end -->
