<?php
/**
 * Plugin Name:       Ete Simple Scroll Top
 * Plugin URI:        https://wordpress.com/plugins/ete-simple-scroll-top/
 * Description:       Ete Simple Scroll Top plugin will help you to enable Back    to Top button to your Wordpress website.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      8.2
 * Author:            Shamima Haque
 * Author URI:        https://shamima.xyz/
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.en.html
 * Update URI:        https://github.com/shamimahaque34
 * Text Domain:       esst
 */

 // Including CSS
 function esst_enqueue_style()
 {
    wp_enqueue_style('esst-style',plugins_url('css/esst-style.css',__FILE__));
 }
 add_action( "wp_enqueue_scripts","esst_enqueue_style" );


 // Including Javascript
 function esst_enqueue_scripts()
 {  
    wp_enqueue_script('jquery');
    wp_enqueue_script('esst-plugin',plugins_url('js/esst-plugin.js',__FILE__),array(),'1.0.0',true);
 }
 add_action( "wp_enqueue_scripts","esst_enqueue_scripts" );

 //jQuery Plugin Settings Activation

 function esst_scroll_script(){
    ?> 
    <script>
    jQuery(document).ready(function(){
        jQuery.scrollUp();
    });
    </script>
<?php }

add_action( "wp_footer","esst_scroll_script" );

// Plugin Customization Sattings
add_action( "customize_register", "esst_scroll_to_top" );
function esst_scroll_to_top($wp_customize){
  $wp_customize-> add_section('esst_scroll_top_section', array(
    'title' => __('Scroll To Top', 'shamimahaque'),
    'description' => 'Simple Scroll to top plugin will help you to enable Back to Top button to your WordPress website.',
  ));

  $wp_customize ->add_setting('esst_default_color', array(
    'default' => '#000000',
  ));
  $wp_customize->add_control('esst_default_color', array(
      'label'   => 'Background Color',
      'section' => 'esst_scroll_top_section',
      'type'    => 'color',
  ));
  // Adding Rounded Corner
  $wp_customize ->add_setting('esst_rounded_corner', array(
    'default' => '5px',
    'description' => 'If you need fully rounded or circular then use 25px here.',
  ));
  $wp_customize->add_control('esst_rounded_corner', array(
      'label'   => 'Rounded Corner',
      'section' => 'esst_scroll_top_section',
      'type'    => 'text',
  ));
}

// Theme CSS Customization
function esst_theme_color_cus(){
   ?>
   <style>
     #scrollUp {
     background-color: <?php print get_theme_mod("esst_default_color"); ?>;
     border-radius: <?php print get_theme_mod("esst_rounded_corner"); ?>;
   }
   </style>
   <?php 
 }
 add_action('wp_head', 'esst_theme_color_cus');
 
?>