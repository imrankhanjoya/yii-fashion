<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 10/06/18
 * Time: 5:42 PM
 */

?>
HEllo ths is me
<?php if( is_active_sidebar( 'widgetized-page-before-content-widget-area' ) ) : ?>
    <aside class="widgetized-page-before-content-widget-area">
        <?php dynamic_sidebar( 'widgetized-page-before-content-widget-area' ); ?>
    </aside>
<?php endif; ?>