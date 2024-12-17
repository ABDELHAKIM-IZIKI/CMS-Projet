<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


function generate_inline_flip_box_styles($attr) {

    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];
    // Check if the 'innerBlockUniqueIds' attribute is set and has the required index
    if (!empty($attr['innerBlockUniqueIds']) && isset($attr['innerBlockUniqueIds'][1])) {
        $uniqueIdback = $attr['innerBlockUniqueIds'][1];
    } else {
        $uniqueIdback = 'default-value'; // Fallback value if index is missing
    }

    // Check if the 'innerBlockUniqueIds' attribute is set and has the required index
    if (!empty($attr['innerBlockUniqueIds']) && isset($attr['innerBlockUniqueIds'][0])) {
        $uniqueIdfront = $attr['innerBlockUniqueIds'][0];
    } else {
        $uniqueIdfront = 'default-value'; // Fallback value if index is missing
    }

    // Generate the class selector by concatenating '.' with the unique ID
    $wrapper = '.vayu-blocks-image-flip-main-container-for-front' . esc_attr($uniqueId);

    $css .= ".wp_block_vayu-blocks-image-flip-main {";
        // // Check if 'widthType' attribute is set to 'customwidth' and apply the width accordingly
        // $css .= "width: " . esc_attr($attr['customWidth']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "margin-left: auto !important;";
        $css .= "margin-right: auto !important;";
    $css .= "}";
    
    //Main div
    $css .= "$wrapper {";

        $css .= "perspective: 1000px;";

        $css .= "width: " . esc_attr($attr['customWidth']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "height: " . esc_attr($attr['customHeight']) . esc_attr($attr['customHeightUnit']) . ";";

        $css .= "max-width:100%;";
        
        $css .= "margin-left:auto !important;";
        $css .= "margin-right:auto !important;";
        
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
       

       // Border
       $borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
       $css .= isset($attr['borderType']) ? "border-style: " . esc_attr($attr['borderType']) . ";" : '';
       $css .= isset($attr['borderWidthTop']) ? "border-top-width: " . esc_attr($attr['borderWidthTop']) . $borderWidthUnit . ";" : '';
       $css .= isset($attr['borderWidthBottom']) ? "border-bottom-width: " . esc_attr($attr['borderWidthBottom']) . $borderWidthUnit . ";" : '';
       $css .= isset($attr['borderWidthLeft']) ? "border-left-width: " . esc_attr($attr['borderWidthLeft']) . $borderWidthUnit . ";" : '';
       $css .= isset($attr['borderWidthRight']) ? "border-right-width: " . esc_attr($attr['borderWidthRight']) . $borderWidthUnit . ";" : '';
       $css .= isset($attr['borderColor']) ? "border-color: " . esc_attr($attr['borderColor']) . ";" : '';

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
       

        
    $css .= "}";
     
    //Hover 
    $css .= "$wrapper:hover {";

        // Top border
        if (isset($attr['advanceborderhvr']['topwidth'], $attr['advanceborderhvr']['topstyle'], $attr['advanceborderhvr']['topcolor'])) {
            $css .= "border-top: " . esc_attr($attr['advanceborderhvr']['topwidth']) . " " . esc_attr($attr['advanceborderhvr']['topstyle']) . " " . esc_attr($attr['advanceborderhvr']['topcolor']) . ";";
        }

        // Bottom border
        if (isset($attr['advanceborderhvr']['bottomwidth'], $attr['advanceborderhvr']['bottomstyle'], $attr['advanceborderhvr']['bottomcolor'])) {
            $css .= "border-bottom: " . esc_attr($attr['advanceborderhvr']['bottomwidth']) . " " . esc_attr($attr['advanceborderhvr']['bottomstyle']) . " " . esc_attr($attr['advanceborderhvr']['bottomcolor']) . ";";
        }

        // Left border
        if (isset($attr['advanceborderhvr']['leftwidth'], $attr['advanceborderhvr']['leftstyle'], $attr['advanceborderhvr']['leftcolor'])) {
            $css .= "border-left: " . esc_attr($attr['advanceborderhvr']['leftwidth']) . " " . esc_attr($attr['advanceborderhvr']['leftstyle']) . " " . esc_attr($attr['advanceborderhvr']['leftcolor']) . ";";
        }

        // Right border
        if (isset($attr['advanceborderhvr']['rightwidth'], $attr['advanceborderhvr']['rightstyle'], $attr['advanceborderhvr']['rightcolor'])) {
            $css .= "border-right: " . esc_attr($attr['advanceborderhvr']['rightwidth']) . " " . esc_attr($attr['advanceborderhvr']['rightstyle']) . " " . esc_attr($attr['advanceborderhvr']['rightcolor']) . ";";
        }

        // Apply individual border-radius values if not a circle
        if (isset($attr['advanceRadiushvr']['top'], $attr['advanceRadiushvr']['right'], $attr['advanceRadiushvr']['bottom'], $attr['advanceRadiushvr']['left'])) {
            $css .= "border-radius: " . esc_attr($attr['advanceRadiushvr']['top']) . " " . esc_attr($attr['advanceRadiushvr']['right']) . " " . esc_attr($attr['advanceRadiushvr']['bottom']) . " " . esc_attr($attr['advanceRadiushvr']['left']) . ";";
        }
   
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

            $css .= "box-shadow: " . $boxShadowHorizontal . 'px ' .
                                    $boxShadowVertical . 'px ' .
                                    $boxShadowBlur . 'px ' .
                                    $boxShadowSpread . 'px ' .
                                    $boxShadowColor . ";";
        } else {
            $css .= "box-shadow: none;";
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

   $css .= "$wrapper .vayu_blocks_image_flip_wrapper-for-front{";

        if ($attr['imageborderradiuscircle'] === 'circle') {
            // Apply a border-radius of 50% for circular images
            $css .= "border-radius: 50%;";
        } else {
            // Apply individual border-radius values if not a circle
            if (isset($attr['imageborderRadius']['top'], $attr['imageborderRadius']['right'], $attr['imageborderRadius']['bottom'], $attr['imageborderRadius']['left'])) {
                $css .= "border-radius: " . esc_attr($attr['imageborderRadius']['top']) . " " . esc_attr($attr['imageborderRadius']['right']) . " " . esc_attr($attr['imageborderRadius']['bottom']) . " " . esc_attr($attr['imageborderRadius']['left']) . ";";
            }
        }

        $css .= "height: 100%;";

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


    $transformstyle = 'none';
    // Determine the transform style based on the image hover effect

    if($attr['imagehvreffect'] === 'flip'){
        if ($attr['flipside'] === 'right') {
            $transformstyle = 'rotateY(180deg)';
        } elseif ($attr['flipside'] === 'left') {
            $transformstyle = 'rotateY(-180deg)';
        } elseif ($attr['flipside'] === 'top') {
            $transformstyle = 'rotateX(180deg)';
        } elseif ($attr['flipside'] === 'bottom') {
            $transformstyle = 'rotateX(-180deg)';
        } 
    }elseif ($attr['imagehvreffect'] === 'flip-z') {
        $transformstyle = 'rotateX(180deg) rotateZ(90deg)';
    } elseif ($attr['imagehvreffect'] === 'flip-x') {
        $transformstyle = 'rotateY(180deg) rotateZ(90deg)';
    } elseif ($attr['imagehvreffect'] === 'zoom-in') {
        $transformstyle = 'scale(0.5)';
    } else if($attr['imagehvreffect'] === 'slide'){
        if ($attr['flipside'] === 'right') {
            $transformstyle = 'translateX(105%)';
        } elseif ($attr['flipside'] === 'left') {
            $transformstyle = 'translateX(-105%)';
        } elseif ($attr['flipside'] === 'top') {
            $transformstyle = 'translateY(-105%)';
        } elseif ($attr['flipside'] === 'bottom') {
            $transformstyle = 'translateY(105%)';
        } 
    } else if($attr['imagehvreffect'] === 'push'){
        if ($attr['flipside'] === 'right') {
            $transformstyle = 'translateX(90%)';
        } elseif ($attr['flipside'] === 'left') {
            $transformstyle = 'translateX(-90%)';
        } elseif ($attr['flipside'] === 'top') {
            $transformstyle = 'translateY(90%)';
        } elseif ($attr['flipside'] === 'bottom') {
            $transformstyle = 'translateY(-90%)';
        } 
    }
    
    $css .= "$wrapper .vayu_blocks_flip-box-back {";
        $css .= "transform: $transformstyle;"; // Ensure $transformstyle is valid
    $css .= "}";

    $css .=".vayu-blocks-front_image-main-container-for-front$uniqueIdback{";
        $css .= "transform: unset !important;";
    $css .= "}";

    $css .=".vayu-blocks-front_image-main-container-for-front$uniqueIdback .wp-block-vayu-blocks-flip-wrapper{";
        $css .= "transform: unset !important;";
    $css .= "}";

     $css .=".vayu_blocks_image_flip_wrapper-for-front:hover .vayu_blocks_flip-box-inner_animation_div_push_animation-top ..vayu_blocks_front_image_wrapper-for-front .vayu_blocks_flip-box-front{";
         $css .= "transform: unset !important;";
    $css .= "}";

    $css .=".vayu-blocks-front_image-main-container-for-front$uniqueIdfront{";
        $css .= "transform: unset !important;";
    $css .= "}";

   $overlayalignmenttablet = explode(' ', $attr['overlayalignmenttablet']); // Split the string
   $vertical = $overlayalignmenttablet[0]; // First part (vertical)
   $horizontal = $overlayalignmenttablet[1]; // Second part (horizontal)
   
    //for tablet
    $css .= "@media (max-width: 1024px) {

        $wrapper {
            width: " . (isset($attr['customWidthTablet']) ? esc_attr($attr['customWidthTablet']) . esc_attr($attr['customWidthUnit']) : '') . ";

            grid-template-columns: repeat(" . (isset($attr['pg_postLayoutColumnsTablet']) ? $attr['pg_postLayoutColumnsTablet'] : 2) . ", 1fr);
            padding-top: " . (isset($attr['buttonpaddingTopTablet']) ? esc_attr($attr['buttonpaddingTopTablet']) . esc_attr($attr['paddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['buttonpaddingBottomTablet']) ? esc_attr($attr['buttonpaddingBottomTablet']) . esc_attr($attr['paddingUnit']) : '') . ";
            padding-left: " . (isset($attr['buttonpaddingLeftTablet']) ? esc_attr($attr['buttonpaddingLeftTablet']) . esc_attr($attr['paddingUnit']) : '') . ";
            padding-right: " . (isset($attr['buttonpaddingRightTablet']) ? esc_attr($attr['buttonpaddingRightTablet']) . esc_attr($attr['paddingUnit']) : '') . ";
    
            margin-top: " . (isset($attr['marginTopTablet']) ? esc_attr($attr['marginTopTablet']) . esc_attr($attr['marginUnit']) : '') . ";
            margin-bottom: " . (isset($attr['marginBottomTablet']) ? esc_attr($attr['marginBottomTablet']) . esc_attr($attr['marginUnit']) : '') . ";
            margin-left: " . (isset($attr['marginLeftTablet']) ? esc_attr($attr['marginLeftTablet']) . esc_attr($attr['marginUnit']) : '') . ";
            margin-right: " . (isset($attr['marginRightTablet']) ? esc_attr($attr['marginRightTablet']) . esc_attr($attr['marginUnit']) : '') . ";   
            margin-left: auto !important;
            margin-right: auto !important;

            grid-gap: " . (isset($attr['pg_gapupTablet']) ? esc_attr($attr['pg_gapupTablet']) . 'px ' . esc_attr($attr['pg_gapTablet']) . 'px' : '') . ";

            border-top-left-radius: " . (isset($attr['pg_postTopBorderRadiusTablet']) ? esc_attr($attr['pg_postTopBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_postBottomBorderRadiusTablet']) ? esc_attr($attr['pg_postBottomBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_postLeftBorderRadiusTablet']) ? esc_attr($attr['pg_postLeftBorderRadiusTablet']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_postRightBorderRadiusTablet']) ? esc_attr($attr['pg_postRightBorderRadiusTablet']) . "px" : '') . ";
   
        }

        $wrapper .vayu_blocks_image_flip_wrapper-for-front{
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
        
    }";
    
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
    
    $overlayalignmentmobile = explode(' ', $attr['overlayalignmentmobile']); // Split the string
    $verticalmobile = $overlayalignmentmobile[0]; // First part (vertical)
    $horizontalmobile = $overlayalignmentmobile[1]; // Second part (horizontal)

    //for mobile
    $css .= "@media (max-width: 400px) {

        $wrapper {
            width: " . (isset($attr['customWidthMobile']) ? esc_attr($attr['customWidthMobile']) . esc_attr($attr['customWidthUnit']) : '') . ";

            grid-template-columns: repeat(" . (isset($attr['pg_postLayoutColumnsMobile']) ? $attr['pg_postLayoutColumnsMobile'] : 1) . ", 1fr);
            padding-top: " . (isset($attr['buttonpaddingTopMobile']) ? esc_attr($attr['buttonpaddingTopMobile']) . esc_attr($attr['paddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['buttonpaddingBottomMobile']) ? esc_attr($attr['buttonpaddingBottomMobile']) . esc_attr($attr['paddingUnit']) : '') . ";
            padding-left: " . (isset($attr['buttonpaddingLeftMobile']) ? esc_attr($attr['buttonpaddingLeftMobile']) . esc_attr($attr['paddingUnit']) : '') . ";
            padding-right: " . (isset($attr['buttonpaddingRightMobile']) ? esc_attr($attr['buttonpaddingRightMobile']) . esc_attr($attr['paddingUnit']) : '') . ";
            margin-top: " . (isset($attr['marginTopMobile']) ? esc_attr($attr['marginTopMobile']) . esc_attr($attr['marginUnit']) : '') . ";
            margin-bottom: " . (isset($attr['marginBottomMobile']) ? esc_attr($attr['marginBottomMobile']) . esc_attr($attr['marginUnit']) : '') . ";
            margin-left: " . (isset($attr['marginLeftMobile']) ? esc_attr($attr['marginLeftMobile']) . esc_attr($attr['marginUnit']) : '') . ";
            margin-right: " . (isset($attr['marginRightMobile']) ? esc_attr($attr['marginRightMobile']) . esc_attr($attr['marginUnit']) : '') . ";
            grid-template-rows: repeat(" . (isset($attr['pg_numberOfRowMobile']) ? $attr['pg_numberOfRowMobile'] : 2) . ", minmax(100px, 1fr));
            grid-gap: " . (isset($attr['pg_gapupMobile']) ? esc_attr($attr['pg_gapupMobile']) . 'px ' . esc_attr($attr['pg_gapMobile']) . 'px' : '') . ";

           
            border-top-left-radius: " . (isset($attr['pg_postTopBorderRadiusMobile']) ? esc_attr($attr['pg_postTopBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_postBottomBorderRadiusMobile']) ? esc_attr($attr['pg_postBottomBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_postLeftBorderRadiusMobile']) ? esc_attr($attr['pg_postLeftBorderRadiusMobile']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_postRightBorderRadiusMobile']) ? esc_attr($attr['pg_postRightBorderRadiusMobile']) . "px" : '') . ";
          
        }

        $wrapper .vayu_blocks_image_flip_wrapper-for-front{
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

    }";

    return $css;
}
