<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function generate_inline_image_styles($attr) {

    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    // Generate the class selector by concatenating '.' with the unique ID
    $wrapper = '.vayu-blocks-image-main-container' . esc_attr($uniqueId);

    $inline = '.vayu_blocks_image__wrapper';

    $css .= ".wp_block_vayu-blocks-image-flip-main {";
        // Check if 'widthType' attribute is set to 'customwidth' and apply the width accordingly
        $css .= "width: " . esc_attr($attr['customWidth']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "margin-left: auto !important;";
        $css .= "margin-right: auto !important;";
        
    $css .= "}";
    
    // Add media query for tablet screens
    $css .= "@media (max-width: 768px) {";
        $css .= ".th-image-flip-main-wp-editor-wrapper {";
            $css .= "width: " . esc_attr($attr['customWidthTablet']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "}";
    $css .= "}";

    // Add media query for Mobile screens
    $css .= "@media (max-width: 300px) {";
        $css .= ".th-image-flip-main-wp-editor-wrapper {";
            $css .= "width: " . esc_attr($attr['customWidthMobile']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "}";
    $css .= "}";

    //Main div
    $css .= "$wrapper {";

        // Desktop Padding
        $paddingUnit = isset($attr['paddingUnit']) ? esc_attr($attr['paddingUnit']) : 'px';
        $css .= isset($attr['buttonpaddingTop']) ? "padding-top: " . esc_attr($attr['buttonpaddingTop']) . $paddingUnit . ";" : '';
        $css .= isset($attr['buttonpaddingBottom']) ? "padding-bottom: " . esc_attr($attr['buttonpaddingBottom']) . $paddingUnit . ";" : '';
        $css .= isset($attr['buttonpaddingLeft']) ? "padding-left: " . esc_attr($attr['buttonpaddingLeft']) . $paddingUnit . ";" : '';
        $css .= isset($attr['buttonpaddingRight']) ? "padding-right: " . esc_attr($attr['buttonpaddingRight']) . $paddingUnit . ";" : '';

        // Desktop Padding
        $marginUnit = isset($attr['marginUnit']) ? esc_attr($attr['marginUnit']) : 'px';
        $css .= isset($attr['marginTop']) ? "margin-top: " . esc_attr($attr['marginTop']) . $marginUnit . ";" : '';
        $css .= isset($attr['marginBottom']) ? "margin-bottom: " . esc_attr($attr['marginBottom']) . $marginUnit . ";" : '';
        $css .= isset($attr['marginLeft']) ? "margin-left: " . esc_attr($attr['marginLeft']) . $marginUnit . ";" : '';
        $css .= isset($attr['marginRight']) ? "margin-right: " . esc_attr($attr['marginRight']) . $marginUnit . ";" : '';

        // Position and Z-index
        $css .= isset($attr['position']) ? "position: " . esc_attr($attr['position']) . ";" : '';
        $css .= isset($attr['zIndex']) ? "z-index: " . esc_attr($attr['zIndex']) . ";" : '';

        // Alignment and Order
        $css .= isset($attr['selfAlign']) ? "align-self: " . esc_attr($attr['selfAlign']) . ";" : '';
        $css .= isset($attr['order']) && $attr['order'] === 'custom' && isset($attr['customOrder']) ? "order: " . esc_attr($attr['customOrder']) . ";" : '';


        // Top border
        if (isset($attr['advanceborder']['topwidth'], $attr['advanceborder']['topstyle'], $attr['advanceborder']['topcolor'])) {
            $css .= "border-top: " . esc_attr($attr['advanceborder']['topwidth']) . " " . esc_attr($attr['advanceborder']['topstyle']) . " " . esc_attr($attr['advanceborder']['topcolor']) . ";";
        }

        // Bottom border
        if (isset($attr['advanceborder']['bottomwidth'], $attr['advanceborder']['bottomstyle'], $attr['advanceborder']['bottomcolor'])) {
            $css .= "border-bottom: " . esc_attr($attr['advanceborder']['bottomwidth']) . " " . esc_attr($attr['advanceborder']['bottomstyle']) . " " . esc_attr($attr['advanceborder']['bottomcolor']) . ";";
        }

        // Left border
        if (isset($attr['advanceborder']['leftwidth'], $attr['advanceborder']['leftstyle'], $attr['advanceborder']['leftcolor'])) {
            $css .= "border-left: " . esc_attr($attr['advanceborder']['leftwidth']) . " " . esc_attr($attr['advanceborder']['leftstyle']) . " " . esc_attr($attr['advanceborder']['leftcolor']) . ";";
        }

        // Right border
        if (isset($attr['advanceborder']['rightwidth'], $attr['advanceborder']['rightstyle'], $attr['advanceborder']['rightcolor'])) {
            $css .= "border-right: " . esc_attr($attr['advanceborder']['rightwidth']) . " " . esc_attr($attr['advanceborder']['rightstyle']) . " " . esc_attr($attr['advanceborder']['rightcolor']) . ";";
        }

        // Apply individual border-radius values if not a circle
        if (isset($attr['advanceRadius']['top'], $attr['advanceRadius']['right'], $attr['advanceRadius']['bottom'], $attr['advanceRadius']['left'])) {
            $css .= "border-radius: " . esc_attr($attr['advanceRadius']['top']) . " " . esc_attr($attr['advanceRadius']['right']) . " " . esc_attr($attr['advanceRadius']['bottom']) . " " . esc_attr($attr['advanceRadius']['left']) . ";";
        }

        // Box-shadow
        if (isset($attr['boxShadow']) && $attr['boxShadow']) {
            $boxShadowColor = 'rgba(' . implode(', ', [
                hexdec(substr($attr['boxShadowColor'], 1, 2)), // Red
                hexdec(substr($attr['boxShadowColor'], 3, 2)), // Green
                hexdec(substr($attr['boxShadowColor'], 5, 2))  // Blue
            ]) . ', ' . ((float) $attr['boxShadowColorOpacity'] / 100) . ')';
            $css .= "box-shadow: " . esc_attr($attr['boxShadowHorizontal']) . 'px ' .
                                esc_attr($attr['boxShadowVertical']) . 'px ' .
                                esc_attr($attr['boxShadowBlur']) . 'px ' .
                                esc_attr($attr['boxShadowSpread']) . 'px ' .
                                $boxShadowColor . ";";
        } else {
            $css .= "box-shadow: none;";
        }

        // Background
        if (isset($attr['backgroundType'])) {
            if ($attr['backgroundType'] === 'color' && isset($attr['backgroundColor'])) {
                $css .= "background: " . esc_attr($attr['backgroundColor']) . ";";
            } elseif ($attr['backgroundType'] === 'gradient' && isset($attr['backgroundGradient'])) {
                $css .= "background: " . esc_attr($attr['backgroundGradient']) . ";";
            } elseif (isset($attr['backgroundImage']) && isset($attr['backgroundImage']['url'])) {
                $css .= "background: url(" . esc_url($attr['backgroundImage']['url']) . ");";
            } else {
                $css .= "background: none;";
            }
        } elseif(isset($attr['backgroundColor'])) { 
            $css .= "background: " . esc_attr($attr['backgroundColor']) . ";";
        }

        // Background properties
        $css .= isset($attr['backgroundPosition']) ? "background-position: " . esc_attr($attr['backgroundPosition']['x']) . ',' . esc_attr($attr['backgroundPosition']['y']) . ";" : 'background-position: 50%, 50%;';
        $css .= isset($attr['backgroundAttachment']) ? "background-attachment: " . esc_attr($attr['backgroundAttachment']) . ";" : '';
        $css .= isset($attr['backgroundRepeat']) ? "background-repeat: " . esc_attr($attr['backgroundRepeat']) . ";" : '';
        $css .= isset($attr['backgroundSize']) ? "background-size: " . esc_attr($attr['backgroundSize']) . ";" : '';

        // Transition
        $css .= "transition-duration: " . (isset($attr['transitionAll']) ? esc_attr($attr['transitionAll']) : '0') . "s;";
        
        // Grid properties
        $css .= "display: grid;";
        $gridTemplateColumns = isset($attr['pg_postLayoutColumns']) ? esc_attr($attr['pg_postLayoutColumns']) : 'auto-fit';
        $css .= "grid-template-columns: repeat({$gridTemplateColumns}, 1fr);";
        $gridGapUp = isset($attr['pg_gapup']) ? esc_attr($attr['pg_gapup']) . "px" : '16px'; // Default value '16px' or whatever default you prefer
        $gridGap = isset($attr['pg_gap']) ? esc_attr($attr['pg_gap']) . "px" : '16px'; // Default value '16px' or whatever default you prefer
        //$css .= "grid-gap: {$gridGapUp} {$gridGap};";
        //$css .= "grid-auto-rows: minmax(100px, auto);";
        
    $css .= "}";
     
    //Hover 
    $css .= "$wrapper:hover {";

       // Top border
        if (
            isset($attr['advanceborderhvr']['topwidth']) && !empty($attr['advanceborderhvr']['topwidth']) &&
            isset($attr['advanceborderhvr']['topstyle']) && !empty($attr['advanceborderhvr']['topstyle']) &&
            isset($attr['advanceborderhvr']['topcolor']) && !empty($attr['advanceborderhvr']['topcolor'])
        ) {
            $css .= "border-top: " . esc_attr($attr['advanceborderhvr']['topwidth']) . " " . esc_attr($attr['advanceborderhvr']['topstyle']) . " " . esc_attr($attr['advanceborderhvr']['topcolor']) . ";";
        }


        // Bottom border
        if (
            isset($attr['advanceborderhvr']['bottomwidth']) && !empty($attr['advanceborderhvr']['bottomwidth']) &&
            isset($attr['advanceborderhvr']['bottomstyle']) && !empty($attr['advanceborderhvr']['bottomstyle']) &&
            isset($attr['advanceborderhvr']['bottomcolor']) && !empty($attr['advanceborderhvr']['bottomcolor'])
        ) {
            $css .= "border-bottom: " . esc_attr($attr['advanceborderhvr']['bottomwidth']) . " " . esc_attr($attr['advanceborderhvr']['bottomstyle']) . " " . esc_attr($attr['advanceborderhvr']['bottomcolor']) . ";";
        }

        // Left border
        if (
            isset($attr['advanceborderhvr']['leftwidth']) && !empty($attr['advanceborderhvr']['leftwidth']) &&
            isset($attr['advanceborderhvr']['leftstyle']) && !empty($attr['advanceborderhvr']['leftstyle']) &&
            isset($attr['advanceborderhvr']['leftcolor']) && !empty($attr['advanceborderhvr']['leftcolor'])
        ) {
            $css .= "border-left: " . esc_attr($attr['advanceborderhvr']['leftwidth']) . " " . esc_attr($attr['advanceborderhvr']['leftstyle']) . " " . esc_attr($attr['advanceborderhvr']['leftcolor']) . ";";
        }

        // Right border
        if (
            isset($attr['advanceborderhvr']['rightwidth']) && !empty($attr['advanceborderhvr']['rightwidth']) &&
            isset($attr['advanceborderhvr']['rightstyle']) && !empty($attr['advanceborderhvr']['rightstyle']) &&
            isset($attr['advanceborderhvr']['rightcolor']) && !empty($attr['advanceborderhvr']['rightcolor'])
        ) {
            $css .= "border-right: " . esc_attr($attr['advanceborderhvr']['rightwidth']) . " " . esc_attr($attr['advanceborderhvr']['rightstyle']) . " " . esc_attr($attr['advanceborderhvr']['rightcolor']) . ";";
        }


        // Apply individual border-radius values if all values are set and not empty
        if (
            isset($attr['advanceRadiushvr']['top']) && ($attr['advanceRadiushvr']['top'])!='0px' ||
            isset($attr['advanceRadiushvr']['right']) && ($attr['advanceRadiushvr']['right']) !='0px' ||
            isset($attr['advanceRadiushvr']['bottom']) && ($attr['advanceRadiushvr']['bottom']) !='0px' ||
            isset($attr['advanceRadiushvr']['left']) && ($attr['advanceRadiushvr']['left'])!='0px'
        ) {
            $css .= "border-radius: " . esc_attr($attr['advanceRadiushvr']['top']) . " " . esc_attr($attr['advanceRadiushvr']['right']) . " " . esc_attr($attr['advanceRadiushvr']['bottom']) . " " . esc_attr($attr['advanceRadiushvr']['left']) . ";";
        }

        if(!empty($attr['boxShadowColorHvr'])){
        // Box-shadow
        if (isset($attr['boxShadowHvr']) && $attr['boxShadowHvr']) {
            // Ensure the boxShadowColorHvr and boxShadowColorOpacityHvr keys are set
            if (isset($attr['boxShadowColorHvr'], $attr['boxShadowColorOpacityHvr'])) {
                $boxShadowColor = 'rgba(' . implode(', ', [
                    hexdec(substr($attr['boxShadowColorHvr'], 1, 2)), // Red
                    hexdec(substr($attr['boxShadowColorHvr'], 3, 2)), // Green
                    hexdec(substr($attr['boxShadowColorHvr'], 5, 2))  // Blue
                ]) . ', ' . ((float) $attr['boxShadowColorOpacityHvr'] / 100) . ')';
            } else {
                $boxShadowColor = 'rgba(0, 0, 0, 0)'; // Default value in case of missing color
            }

            // Ensure each box shadow dimension key is set, use a default value if not
            $boxShadowHorizontal = isset($attr['boxShadowHorizontalHvr']) ? esc_attr($attr['boxShadowHorizontalHvr']) : '0';
            $boxShadowVertical = isset($attr['boxShadowVerticalHvr']) ? esc_attr($attr['boxShadowVerticalHvr']) : '0';
            $boxShadowBlur = isset($attr['boxShadowBlurHvr']) ? esc_attr($attr['boxShadowBlurHvr']) : '0';
            $boxShadowSpread = isset($attr['boxShadowSpreadHvr']) ? esc_attr($attr['boxShadowSpreadHvr']) : '0';

            if(!empty($boxShadowColor)){
                $css .= "box-shadow: " . $boxShadowHorizontal . 'px ' .
                $boxShadowVertical . 'px ' .
                $boxShadowBlur . 'px ' .
                $boxShadowSpread . 'px ' .
                $boxShadowColor . ";";
            }

        }
        }

        // Background
        if (isset($attr['backgroundTypeHvr'])) {
            if ($attr['backgroundTypeHvr'] === 'color' && isset($attr['backgroundColorHvr'])) {
                $css .= "background: " . esc_attr($attr['backgroundColorHvr']) . ";";
            } elseif ($attr['backgroundTypeHvr'] === 'gradient' && isset($attr['backgroundGradientHvr'])) {
                $css .= "background: " . esc_attr($attr['backgroundGradientHvr']) . ";";
            } elseif (isset($attr['backgroundImageHvr']) && isset($attr['backgroundImageHvr']['url'])) {
                $css .= "background: url(" . esc_url($attr['backgroundImageHvr']['url']) . ");";
            } else {
                $css .= "background: none;";
            }
        } elseif(isset($attr['backgroundColorHvr'])) { 
            $css .= "background: " . esc_attr($attr['backgroundColorHvr']) . ";";
        }

        // Background position, attachment, repeat, size
        $css .= isset($attr['backgroundPositionHvr']) ? "background-position: " . esc_attr($attr['backgroundPositionHvr']['x'] . ',' . $attr['backgroundPositionHvr']['y']) . ";" : '';
        $css .= isset($attr['backgroundAttachmentHvr']) ? "background-attachment: " . esc_attr($attr['backgroundAttachmentHvr']) . ";" : '';
        $css .= isset($attr['backgroundRepeatHvr']) ? "background-repeat: " . esc_attr($attr['backgroundRepeatHvr']) . ";" : '';
        $css .= isset($attr['backgroundSizeHvr']) ? "background-size: " . esc_attr($attr['backgroundSizeHvr']) . ";" : '';

        // Transition
        $css .= "transition: all 0.3s ease-in-out;";
            
    $css .= "}";

    $css .= ".vayu_blocks_image_flip-duotone-filters {";
        $css .= "display: none;";
        $css .= "height: 0;";
    $css .= "}";

    // Effect 3 CSS rule
    $css .= ".vayu_block_styling-effect3::after {";
        $css .= "background:" . esc_attr($attr['wrapppereffect3color']) . ";";
        $css .= "box-shadow: 1rem 1rem 2rem " . esc_attr($attr['wrapppereffect3color']) . ";";
    $css .= "}";

    // Effect 10 CSS rule
    $css .= ".vayu_block_styling-effect10 {";
        $css .= "background:" . esc_attr($attr['wrapppereffect3color']) . ";";
    $css .= "}";

    $css .= ".vayu_block_styling-effect10 {";
        $css .= " box-shadow:
        1px 1px 0 1px " . esc_attr($attr['wrapppereffect3color']) . ",
        -1px 0 28px 0 rgba(34, 33, 81, 0.01),
        28px 28px 28px 0 rgba(34, 33, 81, 0.25) !important;";
    $css .= "}";
    
    $css .= ".vayu_block_styling-effect10:hover {";
        $css .= " box-shadow:
        1px 1px 0 1px " . esc_attr($attr['wrapppereffect3color']) . ",
        -1px 0 28px 0 rgba(34, 33, 81, 0.01),
        54px 54px 28px -10px rgba(34, 33, 81, 0.15) !important;";
    $css .= "}";

    // Append CSS rules to $css
    $css .= "$wrapper $inline {";
        // $css .= " overflow: hidden;";
        if (!empty($attr['imagewidth'])) {
            $css .= "width: " . esc_attr($attr['imagewidth']) . ";";
        } else {
            $css .= "width: auto;";
        }
        
        if (!empty($attr['imageheight'])) {
            $css .= "height: " . esc_attr($attr['imageheight']) . ";";
        } else {
            $css .= "height: auto;";
        }
    
        $css .= " position: relative;";
        $css .= "perspective: 1000px;";
        $css .= "transform-style: preserve-3d;";

                 // Box-shadow
       if (isset($attr['imageboxShadow']) && $attr['imageboxShadowColor']) {
        
        $boxShadowColor = 'rgba(' . implode(', ', [
            hexdec(substr($attr['imageboxShadowColor'], 1, 2)), // Red
            hexdec(substr($attr['imageboxShadowColor'], 3, 2)), // Green
            hexdec(substr($attr['imageboxShadowColor'], 5, 2))  // Blue
        ]) . ', ' . ((float) $attr['imageboxShadowColorOpacity'] / 100) . ')';
        $css .= "box-shadow: " . esc_attr($attr['imageboxShadowHorizontal']) . 'px ' .
                            esc_attr($attr['imageboxShadowVertical']) . 'px ' .
                            esc_attr($attr['imageboxShadowBlur']) . 'px ' .
                            esc_attr($attr['imageboxShadowSpread']) . 'px ' .
                            $boxShadowColor . ";";
        } else {
            $css .= "box-shadow: none;";
        }
        
        
    $css .= "}";

    $css .= "$wrapper .vayu_blocks_rotating_div{";
        $rotation = esc_attr($attr['rotation']) % 360; // This will ensure the value is within 0-359
        $css .= "transform: rotate( " . $rotation . "deg) !important;";
    $css .= "}";
    
    // Assuming $attr['imagetransitiontime'] contains the transition time value
    $transitionTime = isset($attr['imagetransitiontime']) ? esc_attr($attr['imagetransitiontime']) : '0.5'; // Default to 0.5s if not set
    // Append CSS rules to $css
    $css .= "$wrapper .vayu_blocks__image_image {";

        if($attr['imagehvreffect'] === 'flip-front' || $attr['imagehvreffect']) {
            $css .= "backface-visibility: hidden;";
        }

        if (!empty($attr['imagewidth'])) {
            $css .= "width: " . esc_attr($attr['imagewidth']) . ";";
        } else {
            $css .= "width: auto;";
           $css .= "max-width: 100%;";
        }
        
        if (!empty($attr['imageheight'])) {
            $css .= "height: " . esc_attr($attr['imageheight']) . ";";
        } else {
            $css .= "height: auto;";
        }

        $css .= "box-sizing: border-box;";
        
        $css .= "    transition: transform {$transitionTime}s ease, filter {$transitionTime}s ease, opacity {$transitionTime}s ease;";

        $css .= "    opacity: 1;"; // Assuming a default opacity value
        $css .= "    object-fit: " . esc_attr($attr['imagebackgroundSize']) . ";"; // Assuming this controls object-fit

        // Apply focal point if it exists, default to center
        $css .= "    object-position: " . (isset($attr['focalPoint']) ? esc_attr($attr['focalPoint']['x'] * 100) : '50') . "% " . (isset($attr['focalPoint']) ? esc_attr($attr['focalPoint']['y'] * 100) : '50') . "%;";

        // Apply aspect ratio if it exists
        if ($attr['imageaspectratio'] !== 'none') {
            if ($attr['imageaspectratio'] === 'original') {
                $css .= "    aspect-ratio: auto;"; // Maintain original aspect ratio
            } else {
                $css .= "    aspect-ratio: " . str_replace('/', '/', esc_attr($attr['imageaspectratio'])) . ";";
            }
        } else {
            $css .= "    aspect-ratio: auto;";
        }

       // Apply duotone filter if it exists and is a valid array or string
        if (isset($attr['duotone']) && !empty($attr['duotone'])) {
            // If duotone is a string, apply it directly
            if (is_string($attr['duotone'])) {
                $css .= "    filter: url(" . esc_attr($attr['duotone']) . ") !important;";
            } 
            // If duotone is an array with more than one value, apply it as a filter
            elseif (is_array($attr['duotone']) && count($attr['duotone']) > 1) {
                $css .= "    filter: url(" . esc_attr($attr['duotone'][0]) . ") ;";
            }
        }

        if ($attr['overlaybordertype'] === 'color') {
            // Apply individual border-radius values
            if (isset($attr['imageborderRadius']['top'], $attr['imageborderRadius']['right'], $attr['imageborderRadius']['bottom'], $attr['imageborderRadius']['left'])) {
                $css .= "border-radius: " . esc_attr($attr['imageborderRadius']['top']) . " " . esc_attr($attr['imageborderRadius']['right']) . " " . esc_attr($attr['imageborderRadius']['bottom']) . " " . esc_attr($attr['imageborderRadius']['left']) . ";";
            }
        }

         // Box-shadow
       if (isset($attr['imageboxShadow']) && $attr['imageboxShadow']) {
        $boxShadowColor = 'rgba(' . implode(', ', [
            hexdec(substr($attr['imageboxShadowColor'], 1, 2)), // Red
            hexdec(substr($attr['imageboxShadowColor'], 3, 2)), // Green
            hexdec(substr($attr['imageboxShadowColor'], 5, 2))  // Blue
        ]) . ', ' . ((float) $attr['imageboxShadowColorOpacity'] / 100) . ')';
        $css .= "box-shadow: " . esc_attr($attr['imageboxShadowHorizontal']) . 'px ' .
                            esc_attr($attr['imageboxShadowVertical']) . 'px ' .
                            esc_attr($attr['imageboxShadowBlur']) . 'px ' .
                            esc_attr($attr['imageboxShadowSpread']) . 'px ' .
                            $boxShadowColor . ";";
        } else {
            $css .= "box-shadow: none;";
        }

    $css .= "}";

    // Append CSS rules to $css
    $css .= "$wrapper .vayu_blocks_image_image-container_image {";
        $css .= "    transition: transform {$transitionTime}s ease, filter {$transitionTime}s ease, opacity {$transitionTime}s ease;";
        $css .= "justify-content: center;";
        $css .= "display: flex;";
        $css .= "align-items: center;";
    
    $css .= "}";

    // Append hover effect CSS rules
    $css .= " $wrapper $inline:hover .vayu_blocks__image_image {";
        $css .= "    transform: var(--image-hover-effect-transform, none);";
        $css .= "    filter: var(--image-filter-effect, none);";
        $css .= "    opacity: var(--image-hover-effect-opacity, 1);";
    $css .= "}";

    $css .= " .vayu_blocks_image_image-container {";
        $css .= "justify-content: " . (
            $attr['imagealignment'] === 'center' ? 'center' :
            ($attr['imagealignment'] === 'left' ? 'flex-start' :
            ($attr['imagealignment'] === 'right' ? 'flex-end' : 'center'))
        ) . ";";
    $css .= "}";

    $css .= ".flip-front {";
        $css .= "  --image-hover-effect-transform: rotateY(180deg);";
    $css .= "}";

    $css .= ".flip-back {";
        $css .= "  --image-hover-effect-transform: rotateX(180deg);";
    $css .= "}";
        
    $css .= ".flip-front-left {";
        $css .= "  --image-hover-effect-transform: rotateY(-180deg);";
    $css .= "}";

    $css .= ".flip-back-bottom {";
        $css .= "  --image-hover-effect-transform: rotateX(-180deg);";
    $css .= "}";

    /* Grayscale */
    $css .= ".grayScale {";
        $css .= "    --image-filter-effect: grayscale(100%);";
    $css .= "}";

    /* Grayscale reverse hover */
    $css .= ".grayScalereverse {";
        $css .= "    filter: grayscale(100%) !important;";
        $css .= "    transition: filter " . esc_attr($attr['imagetransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".grayScalereverse:hover {";
        $css .= "filter: none;";
    $css .= "}";

    /* Sepia */
    $css .= ".sepia {";
        $css .= "    --image-filter-effect: sepia(100%);";
    $css .= "}";

    /* Zoom-in and Zoom-out effects */
    $css .= ".zoom-in {";
        $css .= "    --image-hover-effect-transform: scale(1.5);";
    $css .= "}";

    $css .= ".zoom-out {";
        $css .= "    --image-hover-effect-transform: scale(0.8);";
    $css .= "}";

    /* Fade-in and Fade-out effects */
    $css .= ".fade-in {";
        $css .= "    --image-hover-effect-opacity: 1;";
    $css .= "}";

    $css .= ".fade-out {";
        $css .= "    --image-hover-effect-opacity: 0.5;";
    $css .= "}";

    /* Slide effects */
    $css .= ".slide-up {";
        $css .= "    --image-hover-effect-transform: translateY(-10px);";
    $css .= "}";

    $css .= ".slide-down {";
        $css .= "    --image-hover-effect-transform: translateY(10px);";
    $css .= "}";

    $css .= ".slide-left {";
        $css .= "    --image-hover-effect-transform: translateX(-10px);";
    $css .= "}";

    $css .= ".slide-right {";
        $css .= "    --image-hover-effect-transform: translateX(10px);";
    $css .= "}";

    /* Flip effects */
    $css .= ".flip-horizontal {";
        $css .= "    --image-hover-effect-transform: rotateY(180deg);";
    $css .= "}";

    $css .= ".flip-vertical {";
        $css .= "    --image-hover-effect-transform: rotateX(180deg);";
    $css .= "}";

    /* Rotate */
    $css .= ".rotate {";
        $css .= "    --image-hover-effect-transform: rotate(-30deg);";
    $css .= "}";

    /* Blur */
    $css .= ".blur {";
        $css .= "    --image-filter-effect: blur(3px);";
    $css .= "}";

    /* Shine */
    $css .= ".shine {";
        $css .= "    --image-filter-effect: grayscale(100%);";
    $css .= "}";

    if($attr['overlayshow']){
        /* Hover the image and show the overlay */
        $css .= "$wrapper .vayu_blocks_overlay_main_wrapper_image:hover {";
                if($attr['overlayhvrcolor']){
                    $css .= "background: " . esc_attr($attr['overlayhvrcolor']) . " !important;";
                    $css .= "opacity: " . esc_attr($attr['overlayOpacityhvr']) . " !important;";
                }
        $css .= "}";
    }

    //inerrblok animation
    /* Initially set the paragraph opacity to 0 and position it below */
    $css .= "$wrapper .vayu-blocks-para-innerblock {";
        $css .= "opacity: 0;";
        $css .= "transform: translateY(20px);";  /* Move paragraph further down */
        $css .= "transition: opacity 0.6s ease, transform 0.6s ease;";  /* Longer and smoother transition */
    $css .= "}";

    /* Heading is in its original place initially */
    $css .= "$wrapper .vayu-blocks-heading-innerblock {";
        $css .= "transform: translate3d(0, 24px, 0);";  /* Move heading slightly down initially */
        $css .= "transition: transform 0.6s ease;";  /* Longer transition */
    $css .= "}";

    /* On hover, move heading up and make paragraph visible with a smooth 3D effect */
    $css .= "$wrapper .vayu_blocks_overlay_main_wrapper_image:hover .vayu-blocks-heading-innerblock {";
        $css .= "transform: translateY(0px);";  /* Move heading 10px up for more noticeable movement */
    $css .= "}";

    $css .= "$wrapper .vayu_blocks_overlay_main_wrapper_image:hover .vayu-blocks-para-innerblock {";
        $css .= "opacity: 1;";
        $css .= "transform: translateY(0);";  /* Bring paragraph to its original position with smoother 3D effect */
    $css .= "}";

    /* On hover out, move paragraph back down and fade out smoothly */
    $css .= "$wrapper .vayu_blocks_overlay_main_wrapper_image:not(:hover) .vayu-blocks-para-innerblock {";
        $css .= "opacity: 0;";
        $css .= "transform: translateY(20px);";  /* Move paragraph back down */
        $css .= "transition: opacity 0.6s ease, transform 0.6s ease;";  /* Smooth transition */
    $css .= "}";
    
    /* Overlay styles */
    $css .= "$wrapper .vayu_blocks_overlay_main_wrapper_image {";
        if($attr['overlayshow']){
            $css .= "background-color: " . esc_attr($attr['overlaycolor']) . ";";
            $css .= "opacity: " . esc_attr($attr['overlayOpacity']) . " !important;";
        }
       
        $css .= "width: " . esc_attr($attr['overlaywidth']) . ";";
        $css .= "height: " . esc_attr($attr['overlayheight']) . ";";
        $css .= "position: absolute;";
        $css .= "top: " . esc_attr($attr['overlaytop']) . ";";
        $css .= "left: " . esc_attr($attr['overlayleft']) . ";";
        $css .= "transition: " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
        $css .= "opacity: 1; ";
       
        $css .= "z-index: 10;";
        $css .= "display: flex;";
        
        $css .= "box-sizing: border-box;";

        if($attr['frameshow']){
            if ($attr['overlaybordertype'] === 'color') {
                // Top border
                if (isset($attr['imageborder']['topwidth'], $attr['imageborder']['topstyle'], $attr['imageborder']['topcolor'])) {
                    $css .= "border-top: " . esc_attr($attr['imageborder']['topwidth']) . " " . esc_attr($attr['imageborder']['topstyle']) . " " . esc_attr($attr['imageborder']['topcolor']) . ";";
                }
            
                // Bottom border
                if (isset($attr['imageborder']['bottomwidth'], $attr['imageborder']['bottomstyle'], $attr['imageborder']['bottomcolor'])) {
                    $css .= "border-bottom: " . esc_attr($attr['imageborder']['bottomwidth']) . " " . esc_attr($attr['imageborder']['bottomstyle']) . " " . esc_attr($attr['imageborder']['bottomcolor']) . ";";
                }
            
                // Left border
                if (isset($attr['imageborder']['leftwidth'], $attr['imageborder']['leftstyle'], $attr['imageborder']['leftcolor'])) {
                    $css .= "border-left: " . esc_attr($attr['imageborder']['leftwidth']) . " " . esc_attr($attr['imageborder']['leftstyle']) . " " . esc_attr($attr['imageborder']['leftcolor']) . ";";
                }
            
                // Right border
                if (isset($attr['imageborder']['rightwidth'], $attr['imageborder']['rightstyle'], $attr['imageborder']['rightcolor'])) {
                    $css .= "border-right: " . esc_attr($attr['imageborder']['rightwidth']) . " " . esc_attr($attr['imageborder']['rightstyle']) . " " . esc_attr($attr['imageborder']['rightcolor']) . ";";
                }
            
                // Apply individual border-radius values
                if (isset($attr['imageborderRadius']['top'], $attr['imageborderRadius']['right'], $attr['imageborderRadius']['bottom'], $attr['imageborderRadius']['left'])) {
                    $css .= "border-radius: " . esc_attr($attr['imageborderRadius']['top']) . " " . esc_attr($attr['imageborderRadius']['right']) . " " . esc_attr($attr['imageborderRadius']['bottom']) . " " . esc_attr($attr['imageborderRadius']['left']) . ";";
                }
            } elseif ($attr['overlaybordertype'] === 'gradient') {
                
                $css .= "border-image: " . esc_attr($attr['overlaybordergradient']) . " 30% / " . esc_attr($attr['overlaygradienttop']) . " " . esc_attr($attr['overlaygradientbottom']) . " " . esc_attr($attr['overlaygradientleft']) . " " . esc_attr($attr['overlaygradientright']) . ";"; // Corrected the syntax

            }elseif ($attr['overlaybordertype'] === 'image') {
                $borderImage = $attr['overlayborderimagetype'] === 'custom' 
                    ? 'url(' . esc_url($attr['overlayborderimage']) . ') ' . esc_attr($attr['borderimagesize']) . '% / ' . esc_attr($attr['overlayimagetop']) . ' ' . esc_attr($attr['overlayimagebottom']) . ' ' . esc_attr($attr['overlayimageleft']) . ' ' . esc_attr($attr['overlayimageright']) . ' / ' . esc_attr($attr['borderimageoutset']) . 'px ' . esc_attr($attr['overlayspace'])
                    : ($attr['overlayborderimagetype'] === 'image1'
                        ? 'url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKE3oR0_1fMluZWzbUZo_e-0O-Rkdq6xNudQ&s) ' . esc_attr($attr['borderimagesize']) . '% / ' . esc_attr($attr['overlayimagetop']) . ' ' . esc_attr($attr['overlayimagebottom']) . ' ' . esc_attr($attr['overlayimageleft']) . ' ' . esc_attr($attr['overlayimageright']) . ' / ' . esc_attr($attr['borderimageoutset']) . 'px ' . esc_attr($attr['overlayspace'])
                        : ($attr['overlayborderimagetype'] === 'image2'
                            ? 'url(https://t4.ftcdn.net/jpg/00/90/22/23/360_F_90222304_MnOvAi5X9Rr2ywonhlSpaDPWD0MmLgiY.jpg) ' . esc_attr($attr['borderimagesize']) . '% / ' . esc_attr($attr['overlayimagetop']) . ' ' . esc_attr($attr['overlayimagebottom']) . ' ' . esc_attr($attr['overlayimageleft']) . ' ' . esc_attr($attr['overlayimageright']) . ' / ' . esc_attr($attr['borderimageoutset']) . 'px ' . esc_attr($attr['overlayspace'])
                            : ($attr['overlayborderimagetype'] === 'image3'
                                ? 'url(https://www.w3schools.com/cssref/border.png) ' . esc_attr($attr['borderimagesize']) . '% / ' . esc_attr($attr['overlayimagetop']) . ' ' . esc_attr($attr['overlayimagebottom']) . ' ' . esc_attr($attr['overlayimageleft']) . ' ' . esc_attr($attr['overlayimageright']) . ' /' . esc_attr($attr['borderimageoutset']) . 'px ' . esc_attr($attr['overlayspace'])
                                : ($attr['overlayborderimagetype'] === 'image4'
                                    ? 'url(https://w7.pngwing.com/pngs/169/875/png-transparent-frame-diamond-lace-border-border-frame-symmetry-thumbnail.png) ' . esc_attr($attr['borderimagesize']) . '% / ' . esc_attr($attr['overlayimagetop']) . ' ' . esc_attr($attr['overlayimagebottom']) . ' ' . esc_attr($attr['overlayimageleft']) . ' ' . esc_attr($attr['overlayimageright']) . '/' . esc_attr($attr['borderimageoutset']) . 'px ' . esc_attr($attr['overlayspace'])
                                    : 'none'))));
            
                $css .= "border-image: " . $borderImage . ";"; // Use the determined border image
            }
        }

        $overlayalignmenttablet = explode(' ', $attr['overlayalignment']); // Split the string
        $vertical = $overlayalignmenttablet[0]; // First part (vertical)
        $horizontal = $overlayalignmenttablet[1]; // Second part (horizontal)

        $css .= "align-items: " . (
            $vertical === 'center' ? 'center' :
            ($vertical === 'top' ? 'self-start' :
            ($vertical === 'bottom' ? 'self-end' : 'center'))
        ) . ";";

        $css .= "justify-content: " . (
            $horizontal === 'center' ? 'center' :
            ($horizontal === 'left' ? 'flex-start' :
            ($horizontal === 'right' ? 'flex-end' : 'center'))
        ) . ";";
        
    $css .= "}";

    // Determine the SVG based on the maskshape attribute
    switch (esc_attr($attr['maskshape'])) {
        case 'circle':
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><circle cx="240" cy="190" r="184"/></svg>';
            break;
        case 'diamond':
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><rect x="106.001" y="56.001" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 275.3553 494.0559)" width="267.998" height="267.999"/></svg>';
            break;
        case 'hexagone':
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><polygon points="79.386,97.269 240,4.538 400.614,97.269 400.614,282.73 240,375.462 79.386,282.73 "/></svg>';
            break;
        case 'rounded':
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><path d="M421,309.436C421,343.437,393.437,371,359.436,371H120.564C86.563,371,59,343.437,59,309.436V70.564C59,36.563,86.563,9,120.564,9h238.871C393.437,9,421,36.563,421,70.564V309.436z"/></svg>';
            break;
        case 'bob1':
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><path d="M47.846,184.442c-87.942,134.709,80.073,196.702,186.331,196.702c104.494,0,222.582-39.417,222.582-160.557C456.758-91.25,198.783-46.776,47.846,184.442z"/></svg>';
            break;
        case 'bob2':
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><path d="M393.879,31.896c96.935,41.811,41.553,265.103-29.118,320.414c-74.443,58.259-320.428,32.36-330.586-185.032C29.551,68.561,183.588-58.822,393.879,31.896z"/></svg>';
            break;
        case 'bob3':
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><path d="M141.699,9.958c37.611-41.211,253.977,90.988,263.995,181.115c10.016,90.134-215.692,232.896-280.453,172.106C69.045,310.428,39.531,121.932,141.699,9.958z"/></svg>';
            break;
        case 'bob4':
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 480 380" enable-background="new 0 0 480 380" xml:space="preserve"><g><path d="M69.19,26.334C54.496,39.876,42.91,57.185,35.302,75.221c-10.718,25.408-15.268,52.962-18.384,80.363c-10.069,88.57,17.375,190.72,112.557,217.96c63.844,18.273,133.074-0.437,191.492-27.517c85.828-39.789,206.786-163.646,105.685-255.719C372.3,40.81,284.499,59.485,220.248,32.528c-30.103-12.63-58.445-35.896-92.778-33.125C105.078,1.21,85.272,11.517,69.19,26.334z"/></g></svg>';
            break;
        default:
            $svg = '';
            break;
    }

    // Encode the SVG to Base64
    $svgBase64 = base64_encode($svg);

    // Create a Data URL
    $imagePath = "data:image/svg+xml;base64,{$svgBase64}";

    $css .= "$wrapper .maskshapeimage{";
        $css .= "mask-image: url($imagePath);";
        $css .= "-webkit-mask-image: url($imagePath);";
        $css .= "mask-size: " . esc_attr($attr['masksize']) . " ;";
        $css .= "-webkit-mask-size: " . esc_attr($attr['masksize']) . ";";
        $css .= " mask-repeat: " . esc_attr($attr['maskrepeat']) . ";";
        $css .= "-webkit-mask-repeat: " . esc_attr($attr['maskrepeat']) . ";";
        $css .= "mask-position: " . esc_attr($attr['maskposition']) . ";";
        $css .= "-webkit-mask-position: " . esc_attr($attr['maskposition']) . ";";
    $css .= "}";

    /* Custom overlay hover effects */
    $css .= ".overlayfade-in {";
        $css .= "opacity: 0;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayfade-in {";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".overlayfade-in-up {";
        $css .= "transform: translateY(100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayfade-in-up {";
        $css .= "transform: translateY(0); ";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".overlayzoom-in-circle {";
        $css .= "transform: scale(0); ";
        $css .= "opacity: 0;";
        $css .= "border-radius: 50%; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= "$wrapper .$inline:hover .overlayzoom-in-circle {";
        $css .= "transform: scale(1); ";
        $css .= "opacity: 1;";
        $css .= "border-radius: " . esc_attr($attr['imageborderRadius']['top']) . " " . esc_attr($attr['imageborderRadius']['right']) . " " . esc_attr($attr['imageborderRadius']['bottom']) . " " . esc_attr($attr['imageborderRadius']['left']) . ";";
    $css .= "}";

    /* Repeat the same approach for other effects */

    $css .= ".overlayfade-in-down {";
        $css .= "transform: translateY(-100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayfade-in-down {";
        $css .= "transform: translateY(0); ";
        $css .= "opacity: 1; ";
    $css .= "}";

    $css .= ".overlayfade-in-left {";
        $css .= "transform: translateX(-100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayfade-in-left {";
        $css .= "transform: translateX(0); ";
        $css .= "opacity: 1; ";
    $css .= "}";

    $css .= ".overlayfade-in-right {";
        $css .= "transform: translateX(100%); ";
        $css .= "opacity: 0; ";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
        $css .= "}";

        $css .= ".$inline:hover .overlayfade-in-right {";
        $css .= "transform: translateX(0); ";
        $css .= "opacity: 1; ";
    $css .= "}";

    /* Flip effects */
    $css .= ".overlayflip-horizontal {";
        $css .= "transform: rotateY(-90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-horizontal {";
        $css .= "transform: rotateY(0);";
    $css .= "}";

    $css .= ".overlayflip-horizontal-left {";
        $css .= "transform: rotateY(90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-horizontal-left {";
        $css .= "transform: rotateY(0);";
    $css .= "}";

    $css .= ".overlayflip-vertical {";
        $css .= "transform: rotateX(-90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-vertical {";
        $css .= "transform: rotateX(0);";
    $css .= "}";

    $css .= ".overlayflip-vertical-bottom {";
        $css .= "transform: rotateX(90deg);";
    $css .= "}";

    $css .= ".$inline:hover .overlayflip-vertical-bottom {";
        $css .= "transform: rotateX(0);";
    $css .= "}";
    
    /* Zoom effects */
    $css .= ".overlayzoom-in-up {";
        $css .= "transform: scale(0.5) translateY(-50%);";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayzoom-in-up {";
        $css .= "transform: scale(1) translateY(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    /* Other zoom-in effects with the same pattern... */

    $css .= ".overlayzoom-in-left {";
        $css .= "transform: scale(0.5) translateX(-50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayzoom-in-left {";
        $css .= "transform: scale(1) translateX(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".overlayzoom-in-right {";
        $css .= "transform: scale(0.5) translateX(50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayzoom-in-right {";
        $css .= "transform: scale(1) translateX(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    /* Continue the pattern for overlayzoom-in-down */
    $css .= ".overlayzoom-in-down {";
        $css .= "transform: scale(0.5) translateY(50%); ";
        $css .= "opacity: 0;";
        $css .= "transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";

    $css .= ".$inline:hover .overlayzoom-in-down {";
        $css .= "transform: scale(1) translateY(0);";
        $css .= "opacity: 1;";
    $css .= "}";

    $css .= ".vayu_blocks_inner_content-image {";
        $css .= "position: absolute;";
        $css .= "width: 100%;";
        $css .= "height: 100%;";
        $css .= "top: 0;";
        $css .= "left: 0;";
        $css .= "display: flex;";
        $css .= "align-items: center;";
        $css .= "justify-content: center;";
    $css .= "}";

    $transitionTime = isset($attr['overlaytransitiontime']) ? esc_attr($attr['overlaytransitiontime']) : 0;
    $transitionDelay = max(0, $transitionTime - ($transitionTime / 2));
    
    $css .= "$wrapper .vayu_block_animation_overlay_inside {";
        $css .= "    transition-delay: " . $transitionDelay . "s !important;";
        $css .= "    animation-fill-mode: forwards !important;";
        $css .= "    opacity: 0;";
        $css .= "    transition: transform " . esc_attr($attr['overlaytransitiontime']) . "s ease, opacity " . esc_attr($attr['overlaytransitiontime']) . "s ease;";
    $css .= "}";
    
    $css .= "$wrapper .$inline:hover .vayu_block_animation_overlay_inside {";
        $css .= "    opacity: 1;";
    $css .= "}";

    $css .= "$wrapper .vayu_block_caption {";
        $css .= "text-align: " . esc_attr($attr['captionalignment']) . ";";
    $css .= "}";

    $css .= "$wrapper .vayu_block_caption_text_para {";
        $css .= "font-size: " . esc_attr($attr['captionsize']) . ";";
        $css .= "font-weight: " . esc_attr($attr['captionfontweight']) . ";";
        $css .= "color: " . esc_attr($attr['captioncolor']) . ";";
    $css .= "}";

    $overlayalignmenttablet = explode(' ', $attr['overlayalignmenttablet']); // Split the string
    $vertical = $overlayalignmenttablet[0]; // First part (vertical)
    $horizontal = $overlayalignmenttablet[1]; // Second part (horizontal)


    // for tablet
    $css .= "@media (max-width: 1024px) {

        $wrapper {
            width: " . (isset($attr['customWidthTablet']) ? esc_attr($attr['customWidthTablet']) . esc_attr($attr['customWidthUnit']) : 'auto') . ";

            grid-template-columns: repeat(" . (isset($attr['pg_postLayoutColumnsTablet']) ? $attr['pg_postLayoutColumnsTablet'] : 2) . ", 1fr);
            padding-top: " . (isset($attr['buttonpaddingTopTablet']) ? esc_attr($attr['buttonpaddingTopTablet']) . esc_attr($attr['paddingUnit']) : '0') . ";
            padding-bottom: " . (isset($attr['buttonpaddingBottomTablet']) ? esc_attr($attr['buttonpaddingBottomTablet']) . esc_attr($attr['paddingUnit']) : '0') . ";
            padding-left: " . (isset($attr['buttonpaddingLeftTablet']) ? esc_attr($attr['buttonpaddingLeftTablet']) . esc_attr($attr['paddingUnit']) : '0') . ";
            padding-right: " . (isset($attr['buttonpaddingRightTablet']) ? esc_attr($attr['buttonpaddingRightTablet']) . esc_attr($attr['paddingUnit']) : '0') . ";
        
            margin-top: " . (isset($attr['marginTopTablet']) ? esc_attr($attr['marginTopTablet']) . esc_attr($attr['marginUnit']) : '0') . ";
            margin-bottom: " . (isset($attr['marginBottomTablet']) ? esc_attr($attr['marginBottomTablet']) . esc_attr($attr['marginUnit']) : '0') . ";
            margin-left: " . (isset($attr['marginLeftTablet']) ? esc_attr($attr['marginLeftTablet']) . esc_attr($attr['marginUnit']) : '0') . ";
            margin-right: " . (isset($attr['marginRightTablet']) ? esc_attr($attr['marginRightTablet']) . esc_attr($attr['marginUnit']) : '0') . ";
            margin-left: auto !important;
            margin-right: auto !important;

            grid-gap: " . (isset($attr['pg_gapupTablet']) ? esc_attr($attr['pg_gapupTablet']) . 'px ' . esc_attr($attr['pg_gapTablet']) . 'px' : '0') . ";

            border-top-left-radius: " . (isset($attr['pg_postTopBorderRadiusTablet']) ? esc_attr($attr['pg_postTopBorderRadiusTablet']) . "px" : '0') . ";
            border-bottom-left-radius: " . (isset($attr['pg_postBottomBorderRadiusTablet']) ? esc_attr($attr['pg_postBottomBorderRadiusTablet']) . "px" : '0') . ";
            border-bottom-right-radius: " . (isset($attr['pg_postLeftBorderRadiusTablet']) ? esc_attr($attr['pg_postLeftBorderRadiusTablet']) . "px" : '0') . ";
            border-top-right-radius: " . (isset($attr['pg_postRightBorderRadiusTablet']) ? esc_attr($attr['pg_postRightBorderRadiusTablet']) . "px" : '0') . ";
        }

        $wrapper $inline {
            width: " . (isset($attr['imagewidthtablet']) ? esc_attr($attr['imagewidthtablet']) : 'auto') . ";
            height: " . (isset($attr['imageheighttablet']) ? esc_attr($attr['imageheighttablet']) : 'auto') . ";
        }

        $wrapper .vayu_blocks__image_image {
            aspect-ratio: " . ($attr['imageaspectratiotablet'] !== 'none' 
                ? ($attr['imageaspectratiotablet'] === 'original' 
                    ? 'auto' 
                    : str_replace(':', '/', esc_attr($attr['imageaspectratiotablet']))) 
                : 'auto') . ";
        }

        $wrapper .vayu_blocks_overlay_main_wrapper_image  {

            align-items: " . (
                $vertical === 'center' ? 'center' :
                ($vertical === 'top' ? 'self-start' :
                ($vertical === 'bottom' ? 'self-end' : 'center'))
            ) . ";

            justify-content: " . (
                $horizontal === 'center' ? 'center' :
                ($horizontal === 'left' ? 'flex-start' :
                ($horizontal === 'right' ? 'flex-end' : 'center'))
            ) . ";

        }

         .vayu_blocks_image_image-container{
            justify-content: " . (
                $attr['imagealignmenttablet'] === 'center' ? 'center' :
                ($attr['imagealignmenttablet'] === 'left' ? 'flex-start' :
                ($attr['imagealignmenttablet'] === 'right' ? 'flex-end' : 'center'))
            ) . ";
        }
            
        $wrapper .vayu_blocks_overlay_main_wrapper_image{
            width: " . (isset($attr['overlaywidthtablet']) ? esc_attr($attr['overlaywidthtablet']) : 'auto') . ";
            height: " . (isset($attr['overlayheighttablet']) ? esc_attr($attr['overlayheighttablet']) : 'auto') . ";
            left: " . (isset($attr['overlaylefttablet']) ? esc_attr($attr['overlaylefttablet']) : 'auto') . ";
            top: " . (isset($attr['overlaytoptablet']) ? esc_attr($attr['overlaytoptablet']) : 'auto') . ";
        }

    }";

    $overlayalignmentmobile = explode(' ', $attr['overlayalignmentmobile']); // Split the string
    $verticalmobile = $overlayalignmentmobile[0]; // First part (vertical)
    $horizontalmobile = $overlayalignmentmobile[1]; // Second part (horizontal)

   // for mobile
    $css .= "@media (max-width: 500px) {
        $wrapper {
            width: " . (isset($attr['customWidthMobile']) ? esc_attr($attr['customWidthMobile']) . esc_attr($attr['customWidthUnit']) : 'auto') . ";

            grid-template-columns: repeat(" . (isset($attr['pg_postLayoutColumnsMobile']) ? $attr['pg_postLayoutColumnsMobile'] : 1) . ", 1fr);
            padding-top: " . (isset($attr['buttonpaddingTopMobile']) ? esc_attr($attr['buttonpaddingTopMobile']) . esc_attr($attr['paddingUnit']) : '0') . ";
            padding-bottom: " . (isset($attr['buttonpaddingBottomMobile']) ? esc_attr($attr['buttonpaddingBottomMobile']) . esc_attr($attr['paddingUnit']) : '0') . ";
            padding-left: " . (isset($attr['buttonpaddingLeftMobile']) ? esc_attr($attr['buttonpaddingLeftMobile']) . esc_attr($attr['paddingUnit']) : '0') . ";
            padding-right: " . (isset($attr['buttonpaddingRightMobile']) ? esc_attr($attr['buttonpaddingRightMobile']) . esc_attr($attr['paddingUnit']) : '0') . ";
            margin-top: " . (isset($attr['marginTopMobile']) ? esc_attr($attr['marginTopMobile']) . esc_attr($attr['marginUnit']) : '0') . ";
            margin-bottom: " . (isset($attr['marginBottomMobile']) ? esc_attr($attr['marginBottomMobile']) . esc_attr($attr['marginUnit']) : '0') . ";
            margin-left: " . (isset($attr['marginLeftMobile']) ? esc_attr($attr['marginLeftMobile']) . esc_attr($attr['marginUnit']) : '0') . ";
            margin-right: " . (isset($attr['marginRightMobile']) ? esc_attr($attr['marginRightMobile']) . esc_attr($attr['marginUnit']) : '0') . ";
            grid-template-rows: repeat(" . (isset($attr['pg_numberOfRowMobile']) ? $attr['pg_numberOfRowMobile'] : 2) . ", minmax(100px, 1fr));
            grid-gap: " . (isset($attr['pg_gapupMobile']) ? esc_attr($attr['pg_gapupMobile']) . 'px ' . esc_attr($attr['pg_gapMobile']) . 'px' : '0') . ";

            border-top-left-radius: " . (isset($attr['pg_postTopBorderRadiusMobile']) ? esc_attr($attr['pg_postTopBorderRadiusMobile']) . "px" : '0') . ";
            border-bottom-left-radius: " . (isset($attr['pg_postBottomBorderRadiusMobile']) ? esc_attr($attr['pg_postBottomBorderRadiusMobile']) . "px" : '0') . ";
            border-bottom-right-radius: " . (isset($attr['pg_postLeftBorderRadiusMobile']) ? esc_attr($attr['pg_postLeftBorderRadiusMobile']) . "px" : '0') . ";
            border-top-right-radius: " . (isset($attr['pg_postRightBorderRadiusMobile']) ? esc_attr($attr['pg_postRightBorderRadiusMobile']) . "px" : '0') . ";
        }

        $wrapper $inline {
            width: " . (isset($attr['imagewidthmobile']) ? esc_attr($attr['imagewidthmobile']) : 'auto') . ";
            height: " . (isset($attr['imageheightmobile']) ? esc_attr($attr['imageheightmobile']) : 'auto') . ";
        }

        $wrapper .vayu_blocks__image_image {
            aspect-ratio: " . ($attr['imageaspectratiomobile'] !== 'none' 
                ? ($attr['imageaspectratiomobile'] === 'original' 
                    ? 'auto' 
                    : str_replace(':', '/', esc_attr($attr['imageaspectratiomobile']))) 
                : 'auto') . ";
        }

        $wrapper .vayu_blocks_overlay_main_wrapper_image  {

            align-items: " . (
                $verticalmobile === 'center' ? 'center' :
                ($verticalmobile === 'top' ? 'self-start' :
                ($verticalmobile === 'bottom' ? 'self-end' : 'center'))
            ) . ";

            justify-content: " . (
                $horizontalmobile === 'center' ? 'center' :
                ($horizontalmobile === 'left' ? 'flex-start' :
                ($horizontalmobile === 'right' ? 'flex-end' : 'center'))
            ) . ";
        }

        .vayu_blocks_image_image-container{

            justify-content: " . (
                $attr['imagealignmentmobile'] === 'center' ? 'center' :
                ($attr['imagealignmentmobile'] === 'left' ? 'flex-start' :
                ($attr['imagealignmentmobile'] === 'right' ? 'flex-end' : 'center'))
            ) . ";
        }

        $wrapper .vayu_blocks_overlay_main_wrapper_image{
            width: " . (isset($attr['overlaywidthmobile']) ? esc_attr($attr['overlaywidthmobile']) : 'auto') . ";
            height: " . (isset($attr['overlayheightmobile']) ? esc_attr($attr['overlayheightmobile']) : 'auto') . ";
            left: " . (isset($attr['overlayleftmobile']) ? esc_attr($attr['overlayleftmobile']) : 'auto') . ";
            top: " . (isset($attr['overlaytopmobile']) ? esc_attr($attr['overlaytopmobile']) : 'auto') . ";
        }

    }";
    
    return $css;
}
