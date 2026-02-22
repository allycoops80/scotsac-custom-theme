<?php
/**
 * Sidebar template.
 *
 * Displays the right-hand sidebar widget area.
 */

if ( ! is_active_sidebar( 'scotsac-sidebar' ) ) {
    return;
}
?>

<aside class="sidebars">
    <section class="region region-sidebar-second column sidebar">
        <?php dynamic_sidebar( 'scotsac-sidebar' ); ?>
    </section>
</aside>
