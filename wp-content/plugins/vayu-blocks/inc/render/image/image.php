<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
     
class Vayu_blocks_image {

    private $attr; //attributes

    public function __construct($attr,$content) {
        $this->attr = $attr;
        $this->content = $content;
    }

    //Render
    public function render() {
        ob_start(); // Start output buffering

        // Output the SVG with duotone filters
        echo $this->render_svg_filters();
        echo $this->render_image();
    
        return ob_get_clean(); // Return the buffered output
    }

    //main container containing image and overlay
    private function render_image() {
        $attributes = $this->attr; // Access attributes
        $image_html = '';
        $uniqueId = isset($attributes['uniqueId']) ? esc_attr($attributes['uniqueId']) : '';
        $imageSrc = !empty($attributes['image']) ? esc_url($attributes['image']) :  plugins_url('../../assets/img/no-image.png', __FILE__);

        $imageAlt = isset($attributes['imagealttext']) ? esc_attr($attributes['imagealttext']) : 'Image ' . rand(1, 100);
        $imageHvrEffect = isset($attributes['imagehvreffect']) ? esc_attr($attributes['imagehvreffect']) : '';
        $imageHvrAnimation = isset($attributes['imagehvranimation']) ? esc_attr($attributes['imagehvranimation']) : '';
        $imageHvrFilter = isset($attributes['imagehvrfilter']) ? esc_attr($attributes['imagehvrfilter']) : '';
        $imagemaskshape = isset($attributes['maskshape']) && $attributes['maskshape'] !== 'none' ? 'maskshapeimage' : '';
        $wrapperanimation = isset($attributes['wrapperanimation']) ? esc_attr($attributes['wrapperanimation']) : '';
        $animation_classname = '';


        if ($attributes['animationsettings'] === 'without-hvr') {
            $animation_classname = $attributes['imagehvranimation'];
        } elseif ($attributes['animationsettings'] === 'with-hvr') {
            $animation_classname = $attributes['imagehvranimation'] . 'hvr';
        } elseif ($attributes['animationsettings'] === 'one-time') {
            $animation_classname = $attributes['imagehvranimation'] . 'onetime';
        }

        $image_html .= '<div class="vayu_blocks_image__wrapper ' . $wrapperanimation . ' " id='. $uniqueId .'>';
            $image_html .= '<div class="vayu_blocks_rotating_div">';
            $image_html .= '<div class="vayu_blocks_image_image_wrapping_container ' . $imageHvrFilter . ' ' . $imageHvrEffect . ' ' . $animation_classname . '" >';            
                $image_html .= '<img 
                                    src="' . $imageSrc . '" 
                                    alt="' . $imageAlt . '" 
                                    class="vayu_blocks__image_image ' . $imageHvrEffect . ' ' . $imageHvrFilter . ' '. $imagemaskshape .'" 
                                />';             
            $image_html .= '</div>';
            // Append the overlay HTML

            // Conditionally append overlay HTML
            if (!empty($attributes['overlayshow']) || !empty($attributes['frameshow'])) {
                $image_html .= $this->overlay(); // Ensure this method returns valid HTML
            }

        
        $image_html .= '</div>';
        $image_html .= '</div>';

        // Check if the 'caption' attribute is not empty
        if (!empty($attributes['caption'])) {
            // Append HTML for the caption
            $image_html .= '<div class="vayu_block_caption">';
                $image_html .= '<p class="vayu_block_caption_text_para">';
                    $image_html .= esc_html($attributes['captiontext']); // Use esc_html to properly escape HTML entities
                $image_html .= '</p>';
            $image_html .= '</div>';
        }
        
        $classhover='';
        if ($attributes['animationhover']) {
            $classhover = 'vayu_blocks_hover_can_apply';
        }
    
        return '<div class="vayu-blocks-image-main-container' . $uniqueId . ' ' . $classhover .' vayu_blocks_image_image-container">' . $image_html . '</div>';
    }
    
    //overlay
    private function overlay() {
        $attributes = $this->attr; // Access attributes
        $overlay = '';
        $imageHvrEffect = isset($attributes['imagehvreffect']) ? esc_attr($attributes['imagehvreffect']) : '';
        $imageHvrAnimation = isset($attributes['imagehvranimation']) ? esc_attr($attributes['imagehvranimation']) : '';
        $overlaywrapper = isset($attributes['overlaywrapper']) ? esc_attr($attributes['overlaywrapper']) : '';

        $animation_classname = '';

        if ($attributes['animationsettings'] === 'without-hvr') {
            $animation_classname = $attributes['imagehvranimation'];
        } elseif ($attributes['animationsettings'] === 'with-hvr') {
            $animation_classname = $attributes['imagehvranimation'] . 'hvr';
        } elseif ($attributes['animationsettings'] === 'one-time') {
            $animation_classname = $attributes['imagehvranimation'] . 'onetime';
        }

        $wrapperanimation = '';
        if($attributes['wrapperanimation'] === 'vayu_block_styling-effect7'){
            $wrapperanimation = 'vayu_block_styling-overlay-effect'; 
        }

        $imagemaskshape = isset($attributes['maskshape']) && $attributes['maskshape'] !== 'none' ? 'maskshapeimage' : '';

        $overlay .= '<div class="vayu_blocks_overlay_main_wrapper_image '. $wrapperanimation .' ' . $overlaywrapper .' ' . $imageHvrEffect . ' ' . $animation_classname . ' ' . $imagemaskshape . '">';
            if(!empty($attributes['overlayshow'])){
                $overlay .= '<div class="vayu_blocks_inner_content">';
                    $overlay .= $this->content;
                $overlay .= '</div>';  
            }

        $overlay .= '</div>';
    
        return $overlay;
    }
    
    // Svg filters for duotone
    private function render_svg_filters() {
        return '<div class="vayu_blocks_image_flip-duotone-filters">
        <svg  xmlns="http://www.w3.org/2000/svg">
                            {/* Orange and Red */}
                            <filter id="duotone-orange-red">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.8 1"></feFuncR>
                                    <feFuncG type="table" tableValues="0.5 0.7"></feFuncG>
                                    <feFuncB type="table" tableValues="0.3 0.5"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Red and Green */}
                            <filter id="duotone-red-green">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.7 1"></feFuncR>
                                    <feFuncG type="table" tableValues="0.3 0.8"></feFuncG>
                                    <feFuncB type="table" tableValues="0.3 0.7"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Black and White */}
                            <filter id="duotone-black-white">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.5 1"></feFuncR>
                                    <feFuncG type="table" tableValues="0.5 1"></feFuncG>
                                    <feFuncB type="table" tableValues="0.5 1"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Blue and Red */}
                            <filter id="duotone-blue-red">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.6 0.9"></feFuncR>
                                    <feFuncG type="table" tableValues="0.2 0.3"></feFuncG>
                                    <feFuncB type="table" tableValues="0.5 0.8"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Purple and Yellow */}
                            <filter id="duotone-purple-yellow">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.5 0.8"></feFuncR>
                                    <feFuncG type="table" tableValues="0.2 0.7"></feFuncG>
                                    <feFuncB type="table" tableValues="0.5 0.3"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Orange and Teal */}
                            <filter id="duotone-orange-teal">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.8 0.5"></feFuncR>
                                    <feFuncG type="table" tableValues="0.5 0.7"></feFuncG>
                                    <feFuncB type="table" tableValues="0.4 0.5"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Pink and Blue */}
                            <filter id="duotone-pink-blue">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.7 0.4"></feFuncR>
                                    <feFuncG type="table" tableValues="0.3 0.5"></feFuncG>
                                    <feFuncB type="table" tableValues="0.6 0.7"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Cyan and Magenta */}
                            <filter id="duotone-cyan-magenta">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.0 0.7"></feFuncR>
                                    <feFuncG type="table" tableValues="0.7 0.2"></feFuncG>
                                    <feFuncB type="table" tableValues="0.9 0.6"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Yellow and Black */}
                            <filter id="duotone-yellow-black">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="1 0.3"></feFuncR>
                                    <feFuncG type="table" tableValues="0.7 0.3"></feFuncG>
                                    <feFuncB type="table" tableValues="0.1 0.1"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Light Blue and Light Green */}
                            <filter id="duotone-lightblue-lightgreen">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.6 0.6"></feFuncR>
                                    <feFuncG type="table" tableValues="0.8 0.9"></feFuncG>
                                    <feFuncB type="table" tableValues="0.8 0.6"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                            {/* Gray and Yellow */}
                            <filter id="duotone-gray-yellow">
                                <feColorMatrix type="matrix" result="gray"
                                    values="1 0 0 0 0
                                            1 0 0 0 0
                                            1 0 0 0 0
                                            0 0 0 1 0" />
                                <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
                                    <feFuncR type="table" tableValues="0.6 1"></feFuncR>
                                    <feFuncG type="table" tableValues="0.6 1"></feFuncG>
                                    <feFuncB type="table" tableValues="0.6 0.3"></feFuncB>
                                    <feFuncA type="table" tableValues="0 1"></feFuncA>
                                </feComponentTransfer>
                            </filter>

                        </svg> </div>';
    }
}

// Render callback for the block
function vayu_block_image_render($attr,$content) {
    // Include default attributes
    $default_attributes = include('defaultattributes.php');

    // Merge default attributes with provided attributes
    $attr = array_merge($default_attributes, $attr);

    // Initialize the image with the merged attributes
    $image = new Vayu_blocks_image($attr,$content);
    
    // Ensure className is sanitized and applied correctly
    $className = isset($attr['classNamemain']) ? esc_attr($attr['classNamemain']) : '';

    $animated = isset($attr['className']) ? esc_attr($attr['className']) : ''; // animation

    // Render and return the image output inside a div with the dynamic class name
    return '<div class="wp_block_vayu-blocks-image-main ' . $className . ' ' . $animated . '">' . $image->render() . '</div>';
} 