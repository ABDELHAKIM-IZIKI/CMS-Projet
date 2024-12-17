<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
     
class Vayu_blocks_advance_timeline {

    private $attr; //attributes

    public function __construct($attr,$content) {
        $this->attr = $attr;
        $this->content = $content;
    }

    //Render
    public function render() {
        ob_start(); // Start output buffering
        echo $this->render_advance_timeline();
        return ob_get_clean(); // Return the buffered output
    }

    //main container containing icon and overlay
    private function render_advance_timeline() {
        $attributes = $this->attr; // Access attributes
        $uniqueId = isset($attributes['uniqueId']) ? esc_attr($attributes['uniqueId']) : '';
        $content = $this->content;
        $classnametouch ='';
        if($attributes['touch']!='scroll'){
            $classnametouch = 'vayu_blocks_touch_class';
        }

        $timelinelayout = isset($attributes['timelinelayout']) ? esc_attr($attributes['timelinelayout']) : '';
        $layoutclass = '';
        $connectorclass = '';

        if($timelinelayout==='layout-7' || $timelinelayout==='layout-8' || $timelinelayout==='layout-9' || $timelinelayout==='layout-10' || $timelinelayout==='layout-11' || $timelinelayout==='layout-12'){
            $layoutclass = 'vayu-blocks-laytout-7-advance-timeline';
            $connectorclass = 'vayu-blocks-laytout-7-advance-timeline-connector';
        }

        // Start building HTML output
        $advance_timeline_html = '';

        $advance_timeline_html .= '<div class="vayu_blocks_advance-timeline_block_main ' . esc_attr($layoutclass) . '" id="' . $uniqueId . '">';

            $advance_timeline_html .= $content;

            if( $attributes['connector']){
                $advance_timeline_html .= '
                    <div class="vayu-blocks-connector  ' . esc_attr($connectorclass) . '">
                        <div class="vayu-blocks-connector-scroll"></div>
                    </div>
                ';
            }

        $advance_timeline_html .= '</div>';
        
        return '<div class="vayu-blocks-advance-timeline-main-container' . $uniqueId . '  ' . esc_attr($classnametouch) . '">' . $advance_timeline_html . '</div>';
    }
      
}

// Render callback for the block
function vayu_block_advance_timeline_render($attr,$content) {
    // Include default attributes
    $default_attributes = include('defaultattributes.php');

    // Merge default attributes with provided attributes
    $attr = array_merge($default_attributes, $attr);

    // Initialize the image with the merged attributes
    $advance_timeline = new Vayu_blocks_advance_timeline($attr,$content);
    
    // Ensure className is sanitized and applied correctly
    $className = isset($attr['classNamemain']) ? esc_attr($attr['classNamemain']) : '';

    $animated = isset($attr['className']) ? esc_attr($attr['className']) : ''; // animation

    // Render and return the icon output inside a div with the dynamic class name
    return '<div class="wp_block_vayu-blocks-advance-timeline-main ' . $className . ' ' . $animated . '">' . $advance_timeline->render() . '</div>';
}