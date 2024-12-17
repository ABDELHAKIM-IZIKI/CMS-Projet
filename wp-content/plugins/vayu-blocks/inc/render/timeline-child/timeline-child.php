<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
     
class Vayu_blocks_timeline_child {

    private $attr; //attributes

    public function __construct($attr,$content) {
        $this->attr = $attr;
        $this->content = $content;
    }

    //Render
    public function render() {
        ob_start(); // Start output buffering
        echo $this->render_timeline_child();
        return ob_get_clean(); // Return the buffered output
    }

    private function render_timeline_child() {
        $attributes = $this->attr; // Access attributes
        $uniqueId = isset($attributes['uniqueId']) ? esc_attr($attributes['uniqueId']) : '';
        $layout = isset($attributes['layout_child']) ? $attributes['layout_child'] : '';
        $showdate = isset($attributes['showdate_child']) ? $attributes['showdate_child'] : false;
        $date = isset($attributes['date']) ? esc_html($attributes['date']) : '';
        $blockIndex = isset($attributes['blockIndex_child']) ? (int) esc_html($attributes['blockIndex_child']) : 0; // Get block index
        $printedIcon = isset($attributes['printedIcon_child']) ? htmlspecialchars_decode($attributes['printedIcon_child']) : '';
        // Check if blockIndex is even or odd
        $isEvenIndex = $blockIndex % 2 === 0;
        $isOddIndex = !$isEvenIndex;

        $content = $this->content;
    
        $timeline_child_html = '';


        // Layout 1
        if ($layout === 'layout-1') {
            $timeline_child_html .= '<article class="vayu-blocks-timeline__field">';
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">' . $content . '</div>';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow vayu_blocks-timeline__arrow-border-layout-1"></div>';
                $timeline_child_html .= '</div>';
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent"><div class="vayu_blocks-timeline__marker">';

                $timeline_child_html .= $printedIcon;

                $timeline_child_html .= '</div></div>';

                if ($showdate) {
                    $timeline_child_html .= '<div class="vayu_blocks__date-new-parent"><h1 class="vayu_blocks__date-new">' . $date . '</h1></div>';
                }
            $timeline_child_html .= '</article>';
        }
    
        // Layout 2
        if ($layout === 'layout-2') {
            $timeline_child_html .= '<article class="vayu-blocks-timeline__field vayu-blocks-flex-direction-row-reverse">';
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">' . $content . '</div>';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow vayu_blocks-timeline__arrow-border-layout-2"></div>';
                $timeline_child_html .= '</div>';

                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent"><div class="vayu_blocks-timeline__marker">' . $printedIcon . '</div></div>';

                if ($showdate) {
                    $timeline_child_html .= '<div class="vayu_blocks__date-new-parent"><h1 class="vayu_blocks__date-new">' . $date . '</h1></div>';
                }

            $timeline_child_html .= '</article>';
        }
    
        // Layout 3
        if ($layout === 'layout-3') {
            // Determine the classes based on even or odd index
            $arrowClass = $isEvenIndex ? 'vayu_blocks-timeline__arrow-border-layout-2' : 'vayu_blocks-timeline__arrow-border-layout-1';
            $directionClass = $isEvenIndex ? 'vayu-blocks-turn-right vayu-blocks-flex-direction-row-reverse' : '';
            
            $timeline_child_html .= '<article class="vayu-blocks-timeline__field ' . $directionClass . '">';
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">' . $content . '</div>';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow ' . $arrowClass . '"></div>';
                $timeline_child_html .= '</div>';

                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent"><div class="vayu_blocks-timeline__marker">' . $printedIcon . '</div></div>';

                $timeline_child_html .= '<div class="vayu_blocks__date-new-parent"><h1 style="display:' . ($showdate ? 'block' : 'none') . '" class="vayu_blocks__date-new">' . $date . '</h1></div>';

            $timeline_child_html .= '</article>';
        }
    
        // Layout 4
        if ($layout === 'layout-4') {

            $arrowClass = $isOddIndex ? 'vayu_blocks-timeline__arrow-border-layout-2' : 'vayu_blocks-timeline__arrow-border-layout-1';
            $directionClass = $isOddIndex ? 'vayu-blocks-turn-right vayu-blocks-flex-direction-row-reverse' : '';
            
            $timeline_child_html .= '<article class="vayu-blocks-timeline__field ' . $directionClass . '">';

                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">' . $content . '</div>';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow ' . $arrowClass . '"></div>';
                $timeline_child_html .= '</div>';

                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent"><div class="vayu_blocks-timeline__marker">' . $printedIcon . '</div></div>';

                $timeline_child_html .= '<div class="vayu_blocks__date-new-parent"><h1 style="display:' . ($showdate ? 'block' : 'none') . '" class="vayu_blocks__date-new">' . $date . '</h1></div>';

            $timeline_child_html .= '</article>';
        }
    
        // Layout 5
        if ($layout === 'layout-5') {
            $timeline_child_html .= '<article class="vayu-blocks-timeline__field vayu-blocks-flex-direction-row-reverse">';
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child-layout-5-6 vayu-blocks-styling-timeine-artile-div">';
                    if ($showdate) {
                        $timeline_child_html .= '<div class="vayu_blocks__date-new-parent"><h1 class="vayu_blocks__date-new">' . $date . '</h1></div>';
                    }
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">' . $content . '</div>';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow vayu_blocks-timeline__arrow-border-layout-2"></div>';
                $timeline_child_html .= '</div>';
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent"><div class="vayu_blocks-timeline__marker">' . $printedIcon . '</div></div>';

            $timeline_child_html .= '</article>';
        }
    
        // Layout 6
        if ($layout === 'layout-6') {
            $timeline_child_html .= '<article class="vayu-blocks-timeline__field">';
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child-layout-5-6 vayu-blocks-styling-timeine-artile-div">';
                    if ($showdate) {
                        $timeline_child_html .= '<div class="vayu_blocks__date-new-parent"><h1 class="vayu_blocks__date-new">' . $date . '</h1></div>';
                    }
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">' . $content . '</div>';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow vayu_blocks-timeline__arrow-border-layout-1"></div>';
                $timeline_child_html .= '</div>';
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent"><div class="vayu_blocks-timeline__marker">' . $printedIcon . '</div></div>';
            $timeline_child_html .= '</article>';
        }

        // Layout 7
        if ($layout === 'layout-7') {

            $timeline_child_html .= '<article class="vayu-blocks-timeline__field vayu-blocks-laytout-7-reverse vayu-blockls-layout-horizontal-width">';
    
                // Events inner content
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">';

                        // Add inner blocks template or any dynamic content if required.
                        $timeline_child_html .= $content;  // Replace $content with actual InnerBlocks equivalent

                    $timeline_child_html .= '</div>'; 

                    // Arrow specific to layout 7
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow vayu_blocks-timeline__arrow-border-layout-7"></div>';
                $timeline_child_html .= '</div>'; 


                // Marker for the timeline
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__marker vayu_blocks-timeline__marker-layout">' . $printedIcon . '</div>';
                $timeline_child_html .= '</div>';

                // Show date if $showdate is true
                if ($showdate) {
                    $timeline_child_html .= '<div class="vayu_blocks__date-new-parent">';
                        $timeline_child_html .= '<h1 class="vayu_blocks__date-new">' . $date . '</h1>';
                    $timeline_child_html .= '</div>';
                }

            $timeline_child_html .= '</article>'; // Closing article
        }

        // Layout 8
        if ($layout === 'layout-8') {
            $timeline_child_html .= '<article class="vayu-blocks-timeline__field vayu-blocks-laytout-8-reverse vayu-blockls-layout-horizontal-width">';
    
                // Events inner content
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">';
                        
                        // Assuming InnerBlocks content is handled elsewhere in PHP
                        // Add inner blocks template or any dynamic content if required.
                        $timeline_child_html .= $content;  // Replace $content with actual InnerBlocks equivalent

                    $timeline_child_html .= '</div>'; // Closing events-inner--content div
    
                    // Arrow specific to layout 8
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow vayu_blocks-timeline__arrow-border-layout-8"></div>';
                $timeline_child_html .= '</div>'; // Closing events-inner-new div
    
                // Marker for the timeline
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__marker vayu_blocks-timeline__marker-layout">' . $printedIcon . '</div>';
                $timeline_child_html .= '</div>'; // Closing parent div
    
                // Show date if $showdate is true
                if ($showdate) {
                    $timeline_child_html .= '<div class="vayu_blocks__date-new-parent">';
                        $timeline_child_html .= '<h1 class="vayu_blocks__date-new">' . $date . '</h1>';
                    $timeline_child_html .= '</div>';
                }

            $timeline_child_html .= '</article>'; // Closing article
        }

        // Layout 9
        if ($layout === 'layout-9') {
            // Check if it's an even index
            $is_even_index = $isEvenIndex ? 'vayu-blocks-turn-right-layout-9' : '';
            $is_even_index_arrow = $isEvenIndex ? 'vayu_blocks-timeline__arrow-border-layout-8' : 'vayu_blocks-timeline__arrow-border-layout-7';


            $timeline_child_html .= '<article class="vayu-blockls-layout-horizontal-width vayu-blocks-timeline__field vayu-blocks-laytout-7-reverse ' . $is_even_index . '">';
    
                // Events inner content
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">';
    
                        // Assuming InnerBlocks content is handled elsewhere in PHP
                        // Add inner blocks template or any dynamic content if required.
                        $timeline_child_html .= $content;  // Replace $content with actual InnerBlocks equivalent

                    $timeline_child_html .= '</div>'; // Closing events-inner--content div
    
                    // Arrow specific to layout 7 (same as layout-7)
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow ' . $is_even_index_arrow . '"></div>';
                $timeline_child_html .= '</div>'; // Closing events-inner-new div
    
                // Marker for the timeline
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__marker vayu_blocks-timeline__marker-layout">' . $printedIcon . '</div>';
                $timeline_child_html .= '</div>'; // Closing parent div
    
                if($showdate){
                    // Date section with dynamic padding based on even index
                    $padding_bottom = $isEvenIndex ? ($attributes['contentHeight'] - $attributes['dateHeight']) . 'px' : '0px';
                    $padding_top = $isEvenIndex ? '0px' : ($attributes['contentHeight'] - $attributes['dateHeight']) . 'px';
                }else{
                    // Date section with dynamic padding based on even index
                    $padding_bottom = $isEvenIndex ? ($attributes['contentHeight']) . 'px' : '0px';
                    $padding_top = $isEvenIndex ? '0px' : ($attributes['contentHeight']) . 'px';
                }
               
                $timeline_child_html .= '<div class="vayu_blocks__date-new-parent" style="padding-bottom: ' . $padding_bottom . '; padding-top: ' . $padding_top . ';">';
                    $timeline_child_html .= '<h1 class="vayu_blocks__date-new">' . $attributes['date'] . '</h1>';
                $timeline_child_html .= '</div>';

            $timeline_child_html .= '</article>'; // Closing article
        }

        // Layout 10
        if ($layout === 'layout-10') {
            // Check if it's an even index
            $is_even_index = $isEvenIndex ? 'vayu-blocks-turn-right-layout-10' : '';

            $is_even_index_arrow = $isEvenIndex ? 'vayu_blocks-timeline__arrow-border-layout-7' : 'vayu_blocks-timeline__arrow-border-layout-8';

            $timeline_child_html .= '<article class="vayu-blockls-layout-horizontal-width vayu-blocks-timeline__field vayu-blocks-laytout-8-reverse ' . $is_even_index . '">';
            
                // Events inner content
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">';
            
                        // Assuming InnerBlocks content is handled elsewhere in PHP
                        // Add inner blocks template or any dynamic content if required.
                        $timeline_child_html .= $content;  // Replace $content with actual InnerBlocks equivalent

                    $timeline_child_html .= '</div>'; // Closing events-inner--content div
            
                    // Arrow specific to layout 7 (same as layout-7)
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow ' . $is_even_index_arrow . '"></div>';
                $timeline_child_html .= '</div>'; // Closing events-inner-new div
            
                // Marker for the timeline
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__marker vayu_blocks-timeline__marker-layout">' . $printedIcon . '</div>';
                $timeline_child_html .= '</div>'; // Closing parent div
            
                if($showdate){
                    // Date section with dynamic padding based on even index
                    $padding_bottom = $isEvenIndex ? ($attributes['contentHeight'] - $attributes['dateHeight']) . 'px' : '0px';
                    $padding_top = $isEvenIndex ? '0px' : ($attributes['contentHeight'] - $attributes['dateHeight']) . 'px';
                }else{
                    // Date section with dynamic padding based on even index
                    $padding_bottom = $isEvenIndex ? ($attributes['contentHeight']) . 'px' : '0px';
                    $padding_top = $isEvenIndex ? '0px' : ($attributes['contentHeight']) . 'px';
                }

                $timeline_child_html .= '<div class="vayu_blocks__date-new-parent" style="padding-top: ' . $padding_bottom . '; padding-bottom: ' . $padding_top . ';">';
                    $timeline_child_html .= '<h1 class="vayu_blocks__date-new">' . $attributes['date'] . '</h1>';
                $timeline_child_html .= '</div>';

            $timeline_child_html .= '</article>'; // Closing article
        }

        // Layout 11
        if ($layout === 'layout-11') {
            // Add the class for layout-7-reverse
            $timeline_child_html .= '<article class="vayu-blockls-layout-horizontal-width vayu-blocks-timeline__field vayu-blocks-laytout-7-reverse">';
            
                // Events inner content
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">';

                        // Conditionally show the date
                        if ($showdate) {
                            $timeline_child_html .= '<div class="vayu_blocks__date-new-parent">';
                                $timeline_child_html .= '<h1 class="vayu_blocks__date-new">' . $attributes['date'] . '</h1>';
                            $timeline_child_html .= '</div>'; // Closing date-new-parent div
                        }

                        // Assuming InnerBlocks content is handled elsewhere in PHP
                        // Add inner blocks template or dynamic content
                        $timeline_child_html .= $content; // Replace $content with actual InnerBlocks equivalent

                    $timeline_child_html .= '</div>'; // Closing events-inner--content div

                    // Arrow specific to layout 7
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow vayu_blocks-timeline__arrow-border-layout-7"></div>';
                $timeline_child_html .= '</div>'; // Closing events-inner-new div
            
                // Marker for the timeline
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__marker vayu_blocks-timeline__marker-layout">' . $printedIcon . '</div>';
                $timeline_child_html .= '</div>'; // Closing parent div
            
            $timeline_child_html .= '</article>'; // Closing article
        }

        // Layout 12
        if ($layout === 'layout-12') {
            // Add the class for layout-8-reverse
            $timeline_child_html .= '<article class="vayu-blockls-layout-horizontal-width vayu-blocks-timeline__field vayu-blocks-laytout-8-reverse">';
            
                // Events inner content
                $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner-new vayu-blocks-flex-properties-timeline-child vayu-blocks-styling-timeine-artile-div">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__events-inner--content">';

                        // Conditionally show the date
                        if ($showdate) {
                            $timeline_child_html .= '<div class="vayu_blocks__date-new-parent">';
                            $timeline_child_html .= '<h1 class="vayu_blocks__date-new">' . $attributes['date'] . '</h1>';
                            $timeline_child_html .= '</div>'; // Closing date-new-parent div
                        }

                        // Assuming InnerBlocks content is handled elsewhere in PHP
                        // Add inner blocks template or dynamic content
                        $timeline_child_html .= $content; // Replace $content with actual InnerBlocks equivalent

                    $timeline_child_html .= '</div>'; // Closing events-inner--content div

                    // Arrow specific to layout 8
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__arrow vayu_blocks-timeline__arrow-border-layout-8"></div>';
                $timeline_child_html .= '</div>'; // Closing events-inner-new div
            
                // Marker for the timeline
                $timeline_child_html .= '<div class="vayu_blocks-timeline__parent">';
                    $timeline_child_html .= '<div class="vayu_blocks-timeline__marker vayu_blocks-timeline__marker-layout">' . $printedIcon . '</div>';
                $timeline_child_html .= '</div>'; // Closing parent div
            
            $timeline_child_html .= '</article>'; // Closing article
        }
    
        // Generate the div with dynamic class
        $timeline_child_html .= '<div class="vayu-blocks-connector-timeline-child">';
        $timeline_child_html .= '</div>';
        
        return '<div class="vayu-blocks-timeline-child-main-container' . $uniqueId . ' ">' . $timeline_child_html . '</div>';
    }
         
}

// Render callback for the block
function vayu_block_timeline_child_render($attr,$content) {
    // Include default attributes
    $default_attributes = include('defaultattributes.php');

    // Merge default attributes with provided attributes
    $attr = array_merge($default_attributes, $attr);

    // Initialize the image with the merged attributes
    $timeline_child = new Vayu_blocks_timeline_child($attr,$content);
    
    // Ensure className is sanitized and applied correctly
    $className = isset($attr['classNamemain']) ? esc_attr($attr['classNamemain']) : '';

    $animated = isset($attr['className']) ? esc_attr($attr['className']) : ''; // animation

    // Render and return the icon output inside a div with the dynamic class name
    return '<div class="wp_block_vayu-blocks-timeline-child-main ' . $className . ' ' . $animated . '">' . $timeline_child->render() . '</div>';
}