<?php 
/**
 * @package Orange Feature Plugin
 */
/*
Plugin Name: Orange Feature Plugin
Plugin URI: https://quickandeasylighting.com/
Description: Orange Feature Plugin - Testing a plugin
Version:1.0.0
Author: Josiah Orange
Author URI: http://orangedesigns.co.uk/
License: GPLv2 or later
Text Domain: orangefeature
*/

//security code

if ( ! defined('ABSPATH') ) {
    die;
}

defined( 'ABSPATH' ) or die('Nothing to see here');



//personal code

$chooseJson = file_get_contents(plugin_dir_path( __FILE__ ) . '/json/ofChoose.json');
$howtoJson = file_get_contents(plugin_dir_path( __FILE__ ) . '/json/ofHowto.json');
$ofHowto = json_decode($howtoJson, true);
$ofChoose = json_decode($chooseJson, true);






//plugin code main

class OrangeFeature
{


    //settings page stuff 

    public $plugin;

    function __construct(){
        

       //initial json file creation
        
      /*  $ofChoose = array("Artwork"=>OrangeFeatureChoose::$Artwork, "Bathroom"=>OrangeFeatureChoose::$Bathroom, "Bedroom"=>OrangeFeatureChoose::$Bedroom,"Ceiling"=>OrangeFeatureChoose::$Ceiling, "Kitchen"=>OrangeFeatureChoose::$Kitchen, "Livingroom"=>OrangeFeatureChoose::$Livingroom,"Outdoor"=>OrangeFeatureChoose::$Outdoor, "Pendant"=>OrangeFeatureChoose::$Pendant,"Recessed"=>OrangeFeatureChoose::$Recessed, "Wall"=>OrangeFeatureChoose::$Wall,);
        $chooseJson = json_encode($ofChoose);

       $ofHowto = array("Artwork"=>OrangeFeatureHowto::$Artwork, "Bathroom"=>OrangeFeatureHowto::$Bathroom, "Bedroom"=>OrangeFeatureHowto::$Bedroom,"Ceiling"=>OrangeFeatureHowto::$Ceiling, "Kitchen"=>OrangeFeatureHowto::$Kitchen, "Livingroom"=>OrangeFeatureHowto::$Livingroom,"Outdoor"=>OrangeFeatureHowto::$Outdoor, "Pendant"=>OrangeFeatureHowto::$Pendant,"Recessed"=>OrangeFeatureHowto::$Recessed, "Wall"=>OrangeFeatureHowto::$Wall,);
        $howtoJson = json_encode($ofHowto); 

     //   $ofHowto = array("Artwork"=>24, "Bathroom"=>24, "Bedroom"=>24,"Ceiling"=>24, "Kitchen"=>24, "Livingroom"=>24,"Outdoor"=>24, "Pendant"=>24,"Recessed"=>24, "Wall"=>24,);
      //  $howtoJson = json_encode($ofHowto);

           file_put_contents(plugin_dir_path( __FILE__ ) . '/json/ofChoose.json', $chooseJson);
        file_put_contents(plugin_dir_path( __FILE__ ) . '/json/ofHowto.json', $howtoJson); */



    }

    function register(){

        //script enqueues
        add_action('admin_enqueue_scripts', array( $this, 'enqueue'));
        
      
        //admin and settings
        $this->plugin = plugin_basename( __FILE__ );
        add_action( 'admin_menu', array( $this, 'add_admin_pages'));
        add_filter("plugin_action_links_$this->plugin", array( $this, 'settings_link') );

    }

//admin and settings

    
    public function settings_link( $links ){
        $settings_link = '<a href="admin.php?page=orangefeature">Settings</a>';
        array_push( $links, $settings_link);
        return $links;

    }

    public function add_admin_pages(){
        add_menu_page('Orange Feature Plugin', 'Orange Featured',  'manage_options', 'orangefeature', array( $this, 'admin_index'), 'dashicons-screenoptions', 110);
    }

    public function admin_index(){
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
     }



//activate and deactivate and uninstall


    function activate(){
        
        flush_rewrite_rules();

    }
    function deactivate() {
        flush_rewrite_rules();


    }


//script enqueues

    function enqueue(){
        
        wp_enqueue_style('orangefeatstyle', plugins_url( '/assets/orangefeatstyle.css', __FILE__), array(), false, 'all');
        wp_enqueue_script('orangefeatscript', plugins_url( '/assets/orangefeatscript.js', __FILE__));

 
    }






}

//starting the plugin

if (class_exists('OrangeFeature')){
   
    $orangeFeature = new OrangeFeature();
    $orangeFeature->register();




  

}





//activation
register_activation_hook( __FILE__, array($orangeFeature, 'activate'));


//deactivation
register_deactivation_hook( __FILE__, array($orangeFeature, 'deactivate'));

//uninstall



