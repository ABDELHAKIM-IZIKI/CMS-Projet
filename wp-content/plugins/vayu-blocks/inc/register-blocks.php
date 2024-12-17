<?php
class Vayu_Blocks_Register {
    public function __construct() {
        add_action( 'init', array( $this, 'vayu_register_blocks' ) );


    }

public function vayu_register_blocks() {

$options = (new VAYU_BLOCKS_OPTION_PANEL())->get_option();

    $blocks = array(
        // array(
        //     'name'           => 'vayu-blocks/advance-container',
        //     'script_handle'  => 'advance-container',
        //     'editor_style'   => 'advance-container-editor-style',
        //     'frontend_style' => 'advance-container-frontend-style',
        //     'status'         => $options['container']['isActive'],
        //     'localize_data'  => array(
        //         'homeUrl' => get_home_url(),
        //         'container_width' => $options['global']['containerWidth'],
        //         'container_gap' => $options['global']['containerGap'],
        //         'container_padding' => $options['global']['containerPadding'],
        //     ),
        // ),
        array(
            'name'           => 'vayu-blocks/advance-heading',
            'script_handle'  => 'advance-heading',
            'editor_style'   => 'advance-heading/index',
            'frontend_style' => 'advance-heading-frontend-style',
            'status'         => $options['heading']['isActive'],
        ),
        // array(
        //     'name'           => 'vayu-blocks/advance-spacer',
        //     'script_handle'  => 'advance-spacer',
        //     'editor_style'   => 'advance-spacer-editor-style',
        //     'frontend_style' => 'advance-spacer-frontend-style',
        //     'status'         => $options['spacer']['isActive'],
        // ),
        // array(
        //     'name'           => 'vayu-blocks/advance-button',
        //     'script_handle'  => 'advance-button',
        //     'editor_style'   => 'advance-button-editor-style',
        //     'frontend_style' => 'advance-button-frontend-style',
        //     'status'         => $options['button']['isActive'],
        // ),
        // array(
        //      'name'            => 'vayu-blocks/advance-slider',
        //      'script_handle'   => 'advance-slider',
        //      'editor_style'   => 'advance-slider-editor-style',
        //      'frontend_style' => 'advance-slider-frontend-style',
        //      'status'          => $options['advanceSlider']['isActive'],
        //      'render_callback' => 'vayu_blocks_advance_slider_render'
        // ),
        // array(
        //     'name'            => 'vayu-blocks/advance-query-loop',
        //     'script_handle'   => 'advance-query-loop',
        //     'editor_style'    => '',
        //     'frontend_style'  => '',
        //     'status'          => $options['advanceQueryLoop']['isActive'],
        //     //'render_callback' => 'vayu_blocks_advance_query_loop_render'
        // ),
        
    );

    // Check if WooCommerce is active
    if (class_exists('WooCommerce')) {
        // Add the 'vayu-blocks/advance-product' block registration array
        // $blocks[] = array(
        //     'name'            => 'vayu-blocks/advance-product',
        //     'script_handle'   => 'advance-product',
        //     'editor_style'    => 'advance-product-editor-style',
        //     'frontend_style'  => 'advance-product-frontend-style',
        //     'status'         =>  $options['product']['isActive'],
        //     'render_callback' => array( 
        //         new Vayu_Advance_Product_Tab(),
        //         'render_callback'
        //     )
        // );
    }


    // if ( ! empty( $block['editor_style'] ) ) {
    //    // Register editor
    //     wp_register_style(
    //         $block['editor_style'],
    //         VAYU_BLOCKS_URL . 'public/build/index.css',
    //         array( 'wp-edit-blocks' ),
    //         filemtime( VAYU_BLOCKS_PATH . '/public/build/index.css' )
    //     );

    //       wp_register_script(
    //         $block['script_handle'],
    //         VAYU_BLOCKS_URL . 'public/build/index.js',
    //         array( 'wp-blocks', 'wp-element', 'wp-editor' ),
    //         filemtime( VAYU_BLOCKS_PATH . '/public/build/index.js' )
    //     );

    //     }


    foreach (  $blocks as $key => $block ) { 

if ( isset( $block['status'] ) && ( $block['status'] == 1 ) ) {
        // Register JavaScript file
        wp_register_script(
            $block['script_handle'],
            VAYU_BLOCKS_URL . 'public/build/' . $block['script_handle'] . '.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor' ),
            filemtime( VAYU_BLOCKS_PATH . '/public/build/block/' . $block['script_handle'] . '.js' )
        );
        if ( ! empty( $block['editor_style'] ) ) {
        // Register editor
        wp_register_style(
            $block['editor_style'],
            VAYU_BLOCKS_URL . 'public/build/' . $block['script_handle'] . '.css',
            array( 'wp-edit-blocks' ),
            filemtime( VAYU_BLOCKS_PATH . '/public/build/block/' . $block['script_handle'] . '.css' )
        );
        }
        if ( ! empty( $block['frontend_style'] ) ) {
        // Register front end block style
        wp_register_style(
            $block['frontend_style'],
            VAYU_BLOCKS_URL . 'public/build/style-' . $block['script_handle'] . '.css',
            array(),
            filemtime( VAYU_BLOCKS_PATH . '/public/build/style-' . $block['script_handle'] . '.css' )
        );
        }

        // Localize the script with data
        if ( isset( $block['localize_data'] ) && ! is_null( $block['localize_data'] ) ) {
            wp_localize_script(
                $block['script_handle'],
                'ThBlockData',
                $block['localize_data']
            );
        }

        // Prepare the arguments for registering the block
            $block_args = array(
                'editor_script' => $block['script_handle']
            );

            // Add editor style if it's set
            if ( ! empty( $block['editor_style'] ) ) {
                $block_args['editor_style'] = $block['editor_style'];
            }

            // Add frontend style if it's set
            if ( ! empty( $block['frontend_style'] ) ) {
                $block_args['style'] = $block['frontend_style'];
            }


        // Check if the render callback is set and not null
        if ( isset( $block['render_callback'] ) && ! is_null( $block['render_callback'] ) ) {
            $block_args['render_callback'] = $block['render_callback'];
           
        }

        // Register each block
        register_block_type( $block['name'], $block_args );
    }

    }
}


}