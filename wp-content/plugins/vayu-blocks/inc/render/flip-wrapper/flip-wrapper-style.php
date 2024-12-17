<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


function generate_inline_flip_wrapper_styles($attr) {

    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    // Generate the class selector by concatenating '.' with the unique ID
    $wrapper = '.vayu-blocks-front_image-main-container-for-front' . esc_attr($uniqueId);

    $css .= ".vayu_blocks_front_image_wrapper-for-front{";
        if($attr['parentBlock'] === 'vayu-blocks/advance-slider'){
            $css .= "padding: 30px;";
            if (!empty($attr['heightwrapper'])) {
                $css .= "height: " . esc_attr($attr['heightwrapper']) . "px;";
            } else {
                $css .= "height: auto;";
            }            
        }
    $css .= "}";

    $css .= ".wp_block_vayu-blocks-front-image-main {";
        $css .= "backface-visibility: hidden;";
        $css .= "overflow: hidden;"; 
    $css .= "}";
    
    //Main div
    $css .= "$wrapper {";

        if($attr['parentBlock'] === 'vayu-blocks/advance-slider'){
            $css .= "padding: 20px;";
            if (!empty($attr['heightwrapper'])) {
                $css .= "height: " . esc_attr($attr['heightwrapper']) . "px ;";
            } else {
                $css .= "height: auto;";
            }            
        }

        $css .= "perspective: 1000px;";

        $css .= "width: " . esc_attr($attr['customWidth']) . esc_attr($attr['customWidthUnit']) . ";";

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
    


        if ($attr['advancebordertype'] === 'color') {
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

        } elseif ($attr['advancebordertype'] === 'gradient') {
            
            $css .= "border-image: " . esc_attr($attr['advancebordergradient']) . " 30% / " . esc_attr($attr['advancegradienttop']) . " " . esc_attr($attr['advancegradientbottom']) . " " . esc_attr($attr['advancegradientleft']) . " " . esc_attr($attr['advancegradientright']) . ";"; // Corrected the syntax

            $border_outset = esc_attr($attr['advancegradientborderimageoutset']) + esc_attr($attr['advancegradienttop']);
            $css .= 'border-image-outset: ' . $border_outset . 'px;';



        }elseif ($attr['advancebordertype'] === 'image') {
            $borderImage = $attr['advanceborderimagetype'] === 'custom' 
                ? 'url(' . esc_url($attr['advanceborderimage']) . ') ' . esc_attr($attr['advanceborderimagesize']) . '% / ' . esc_attr($attr['advanceimagetop']) . ' ' . esc_attr($attr['advanceimagebottom']) . ' ' . esc_attr($attr['advanceimageleft']) . ' ' . esc_attr($attr['advanceimageright']) . ' / ' . esc_attr($attr['advanceborderimageoutset']) . 'px ' . esc_attr($attr['advancespace'])
                : ($attr['advanceborderimagetype'] === 'image1'
                    ? 'url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKE3oR0_1fMluZWzbUZo_e-0O-Rkdq6xNudQ&s) ' . esc_attr($attr['advanceborderimagesize']) . '% / ' . esc_attr($attr['advanceimagetop']) . ' ' . esc_attr($attr['advanceimagebottom']) . ' ' . esc_attr($attr['advanceimageleft']) . ' ' . esc_attr($attr['advanceimageright']) . ' / ' . esc_attr($attr['advanceborderimageoutset']) . 'px ' . esc_attr($attr['advancespace'])
                    : ($attr['advanceborderimagetype'] === 'image2'
                        ? 'url(https://t4.ftcdn.net/jpg/00/90/22/23/360_F_90222304_MnOvAi5X9Rr2ywonhlSpaDPWD0MmLgiY.jpg) ' . esc_attr($attr['advanceborderimagesize']) . '% / ' . esc_attr($attr['advanceimagetop']) . ' ' . esc_attr($attr['advanceimagebottom']) . ' ' . esc_attr($attr['advanceimageleft']) . ' ' . esc_attr($attr['advanceimageright']) . ' / ' . esc_attr($attr['advanceborderimageoutset']) . 'px ' . esc_attr($attr['advancespace'])
                        : ($attr['advanceborderimagetype'] === 'image3'
                            ? 'url(https://www.w3schools.com/cssref/border.png) ' . esc_attr($attr['advanceborderimagesize']) . '% / ' . esc_attr($attr['advanceimagetop']) . ' ' . esc_attr($attr['advanceimagebottom']) . ' ' . esc_attr($attr['advanceimageleft']) . ' ' . esc_attr($attr['advanceimageright']) . ' /' . esc_attr($attr['advanceborderimageoutset']) . 'px ' . esc_attr($attr['advancespace'])
                            : ($attr['advanceborderimagetype'] === 'image4'
                                ? 'url(https://w7.pngwing.com/pngs/169/875/png-transparent-frame-diamond-lace-border-border-frame-symmetry-thumbnail.png) ' . esc_attr($attr['advanceborderimagesize']) . '% / ' . esc_attr($attr['advanceimagetop']) . ' ' . esc_attr($attr['advanceimagebottom']) . ' ' . esc_attr($attr['advanceimageleft']) . ' ' . esc_attr($attr['advanceimageright']) . '/' . esc_attr($attr['advanceborderimageoutset']) . 'px ' . esc_attr($attr['advancespace'])
                                : 'none'))));
        
            $css .= "border-image: " . $borderImage . ";"; // Use the determined border image
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
       $css .= isset($attr['backgroundPosition']) ? 
       "background-position: " . (esc_attr($attr['backgroundPosition']['x']) * 100) . '%,' . (esc_attr($attr['backgroundPosition']['y']) * 100) . '%;' : 
       'background-position: 50%, 50%;';
   
       $css .= isset($attr['backgroundAttachment']) ? "background-attachment: " . esc_attr($attr['backgroundAttachment']) . ";" : '';
       $css .= isset($attr['backgroundRepeat']) ? "background-repeat: " . esc_attr($attr['backgroundRepeat']) . ";" : '';
       $css .= isset($attr['backgroundSize']) ? "background-size: " . esc_attr($attr['backgroundSize']) . ";" : '';

       // Transition
       $css .= "transition-duration: " . (isset($attr['transitionAll']) ? esc_attr($attr['transitionAll']) : '0') . "s;";
  
    $css .= "}";
     
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
        
    }";
    
    // Add media query for tablet screens
    $css .= "@media (max-width: 768px) {";
        $css .= ".th-front-image-main-wp-editor-wrapper {";
            $css .= "width: " . esc_attr($attr['customWidthTablet']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "}";
    $css .= "}";
    
    // Add media query for Mobile screens
    $css .= "@media (max-width: 300px) {";
        $css .= ".th-front-image-main-wp-editor-wrapper {";
            $css .= "width: " . esc_attr($attr['customWidthMobile']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "}";
    $css .= "}";

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

    }";

    return $css;
}
