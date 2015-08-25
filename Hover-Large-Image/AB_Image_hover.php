<?php
/*
Plugin Name: Gallery Image ON hover pop-up
Description: Gallery Image  will show lager and on Hover.
Author: Shakil HOssain
Author URI: www.webspreed.com
Version:1.0.1
*/
add_action('wp_head','ab_hover_css');
function ab_hover_css(){
echo "<link rel='stylesheet'  href='".plugins_url( 'ab_hover.css', __FILE__ )."' type='text/css' media='all' />";
echo "<link rel='stylesheet'  href='".plugins_url( 'magnic.css', __FILE__ )."' type='text/css' media='all' />";
echo "<script src='".plugins_url( 'magnific.min.js', __FILE__ )."'></script>";
echo "<script src='".plugins_url( 'ab_hover.js', __FILE__ )."'></script>";
}
add_action( 'after_setup_theme', 'ab_override_gallery' );
function ab_override_gallery() {
    remove_shortcode( 'gallery' );
    add_shortcode('gallery', 'ab_gallery_shortcode');  
}

function ab_gallery_shortcode($attr) {
?>
<?php $att = explode(',',$attr['ids']); ?>
<ul class="hoverbox">
<?php foreach($att as $att2) : ?>
<?php $img = wp_get_attachment_image_src( $att2, 'full' ); ?>
<?php $img2 = wp_get_attachment_image_src( $att2, 'large' ); ?>
<?php $attachment_title = get_the_title($att2); ?>
<li>
<div style="width:0px;height:0px;overflow:hidden;"><img src="<?php echo $img[0]; ?>"/></div>
<a title="<?php echo $attachment_title; ?>" href="<?php echo $img[0]; ?>"><img alt="description" src="<?php echo $img2[0]; ?>"></a>
</li>
<?php endforeach; ?>
</ul>
<div style="clear:both;height:10px;width:100%;"></div>
<?php
}