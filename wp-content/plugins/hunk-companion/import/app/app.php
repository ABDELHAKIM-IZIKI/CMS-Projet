<?php
//  Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class HUNK_COMPANION_SITES_APP{

  /**
   * Constructor
   *
   * @since 1.0.0
   */
  public function __construct() {
    add_action( 'rest_api_init', array( $this, 'register_routes' ) );

    add_action( 'wp_ajax_hunk_companion_handler_data', array( $this, 'import_data') );
    add_action( 'wp_ajax_hunk_companion_import_xml', array( $this, 'import_xml') ); 
    add_action( 'wp_ajax_hunk_companion_import_cutomizer', array( $this, 'init_cutomizer') );
    add_action( 'wp_ajax_hunk_companion_mport_options', array( $this, 'init_options') );
    add_action( 'wp_ajax_hunk_companion_import_widgets', array( $this, 'init_widgets' ) );
    add_action( 'wp_ajax_hunk_companion_sites_core', array( $this, 'init_site_url' ) );

  }

    public function register_routes() {

        register_rest_route( 'hc/v1', 'themehunk-import', array(
          'methods' => 'POST',
          'callback' => array( $this, 'tp_install' ),
          'permission_callback' => function () {
          // Check if the user is logged in
          if ( ! is_user_logged_in() ) {
              return false;
          }

    // Debug: Log the user role and capabilities to see what they have
    $current_user = wp_get_current_user();
    // error_log( 'Current user: ' . $current_user->user_login );
    // error_log( 'User roles: ' . implode( ', ', $current_user->roles ) );
    // error_log( 'User capabilities: ' . print_r( $current_user->allcaps, true ) );

    // Ensure the user has the 'install_plugins' capability
    if ( ! current_user_can( 'install_plugins' ) ) {
        return false;
    }

      // Get the nonce from the request header
            $nonce = $request->get_header('X-WP-Nonce');

            // Verify the nonce
            if ( ! wp_verify_nonce( $nonce, 'hc_import_nonce' ) ) {
                return false;
            }

    return true; // Permission granted
},

      ) );


        register_rest_route( 'ai/v1', 'ai-site-import', array(
          'methods' => 'POST',
          'callback' =>  array( $this, 'data_import' ),
          'login_user_id' => get_current_user_id(),
          'permission_callback' => function () {
    // Check if the user is logged in
    if ( ! is_user_logged_in() ) {
        return false;
    }

    // Debug: Log the user role and capabilities to see what they have

    // Ensure the user has the 'install_plugins' capability
    if ( ! current_user_can( 'install_plugins' ) ) {
        return false;
    }

            // Get the nonce from the request header 
            // $nonce = $request->get_header('X-WP-Nonce');

            // // Verify the nonce
            // if ( ! wp_verify_nonce( $nonce, 'hc_import_nonce' ) ) {
            //     return new WP_REST_Response( 'Unauthorized: Invalid nonce', 401 );
            // }

          return true; // Permission granted
},

      ) );


    }


  public function tp_install(WP_REST_Request $request){
      $request = $request->get_params();
      $params  = $request['params'];
      new HUNK_COMPANION_SITES_BUILDER_SETUP($params);
      return json_encode( site_url());
  }

  public function data_import(WP_REST_Request $request){
      
        $atrs = $request->get_attributes();
        $request = $request->get_params();
        $params  = $request['params'];
         
        new HUNK_COMPANION_SITES_IMPORT($params,$atrs['login_user_id']);
      
        return json_encode(site_url());
  }



  public function import_data() {

    if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'hc_import_nonce' ) ) {
      wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
      wp_die();
  }

    if(isset( $_POST['data'] ) && current_user_can('manage_options')){

            $return = sanitize_url(  json_decode( wp_unslash( $_POST['data'] ))->data );
            HUNK_COMPANION_SITES_IMPORT::instance()->get_import_data($return);
            wp_send_json_success( $return );
          } else{
            wp_send_json_success( array('status'=>false) );

          }
  }


  public function import_xml() {

    if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'hc_import_nonce' ) ) {
      wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
      wp_die();
  }

    if(isset( $_POST['data'] ) && current_user_can('manage_options')){

          $return = sanitize_url(  json_decode( wp_unslash( $_POST['data'] ))->data );

        HUNK_COMPANION_SITES_IMPORT::instance()->import_xml_data($return);
        wp_send_json_success( $return );
      } else{
        wp_send_json_success( array('status'=>false) );

      }
  }

  public  function init_cutomizer() {

    if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'hc_import_nonce' ) ) {
      wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
      wp_die();
  }

    if(isset( $_POST['data'] ) && current_user_can('manage_options')){
    
            $data = wp_unslash( $_POST['data']);
            $data = json_decode($data)->data;
          HUNK_COMPANION_SITES_IMPORT::instance()->import_customizer($data);
      }

 }

  public function init_options() {

    if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'hc_import_nonce' ) ) {
      wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
      wp_die();
  }

    if(isset( $_POST['data'] ) && current_user_can('manage_options')){

          $data = wp_unslash( $_POST['data']);
          $data = json_decode($data)->data;
        HUNK_COMPANION_SITES_IMPORT::instance()->import_options($data);
        exit();
    }
  }

  public function init_widgets() {

    if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'hc_import_nonce' ) ) {
      wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
      wp_die();
  }

    if(isset( $_POST['data'] ) && current_user_can('manage_options')){

            $data = stripslashes( $_POST['data']);
              $data = json_decode($data)->data;
              HUNK_COMPANION_SITES_IMPORT::instance()->import_widgets($data);
          exit();
      }
 }

  public function init_site_url(){

    if ( ! isset( $_POST['security'] ) || ! wp_verify_nonce( $_POST['security'], 'hc_import_nonce' ) ) {
      wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
      wp_die();
  }

    if(isset( $_POST['data'] ) && current_user_can('manage_options')){

            $data = stripslashes( $_POST['data']);

            $data = json_decode($data)->data;
            $core = new HUNK_COMPANION_SITES_BUILDER_CORE();
            $core->core_data($data);
          }

  }

}

$obj = New HUNK_COMPANION_SITES_APP();