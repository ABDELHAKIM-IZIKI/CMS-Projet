<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function generate_inline_slider_styles($attr) {
    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    // Generate the class selector by concatenating '.' with the unique ID
    $wrapper = '.wp_block_vayu-blocks-advance-slider-main.vayu-block-' . $uniqueId;

    //Main div
    $css .= "$wrapper {";

        $css .= "--swiper-navigation-backgroundTablet: " . esc_attr($attr['navigationbackgroundTablet']) . " !important;";
        $css .= "--swiper-navigation-backgroundMobile: " . esc_attr($attr['navigationbackgroundMobile']) . " !important;";
        $css .= "--swiper-navigation-sizeTablet: " . esc_attr($attr['navigationsizeTablet']) . "px !important;";
        $css .= "--swiper-navigation-sizeMobile: " . esc_attr($attr['navigationsizeMobile']) . "px !important;";
        $css .= "--swiper-navigation-navigationtopTablet: " . esc_attr($attr['navigationtopTablet']) . "% !important;";
        $css .= "--swiper-navigation-navigationtopMobile: " . esc_attr($attr['navigationtopMobile']) . "% !important;";
        $css .= "--swiper-navigation-rightarrowTablet: " . esc_attr($attr['rightarrowTablet']) . "px !important;";
        $css .= "--swiper-navigation-rightarrowMobile: " . esc_attr($attr['rightarrowMobile']) . "px !important;";
        $css .= "--swiper-pagination-bullet-widthTablet: " . esc_attr($attr['bulletsizeTablet']) . "px !important;";
        $css .= "--swiper-pagination-bullet-heightTablet: " . esc_attr($attr['bulletsizeTablet']) . "px !important;";
        $css .= "--swiper-pagination-bullet-widthMobile: " . esc_attr($attr['bulletsizeMobile']) . "px !important;";
        $css .= "--swiper-pagination-bullet-heightMobile: " . esc_attr($attr['bulletsizeMobile']) . "px !important;";
        $css .= "--swiper-pagination-dots-placeTablet: " . esc_attr($attr['dotsplaceTablet']) . "% !important;";
        $css .= "--swiper-pagination-dots-placeMobile: " . esc_attr($attr['dotsplaceMobile']) . "% !important;";    

        $css .= "--swiper-pagination-fraction-color: " . esc_attr($attr['numberscolor']) . " !important;";
        $css .= "--swiper-pagination-color: " . esc_attr($attr['paginationbackground']) . " !important;";
        $css .= "--swiper-pagination-bullet-inactive-color: " . esc_attr($attr['paginationinactivebackground']) . " !important;";
        $css .= "--swiper-pagination-bullet-inactive-opacity: 1 !important;";
        $css .= "--swiper-pagination-top: " . esc_attr($attr['paginationtop']) . "% !important;";
        $css .= "--swiper-pagination-topTablet: " . esc_attr($attr['paginationtopTablet']) . "% !important;";
        $css .= "--swiper-pagination-topMobile: " . esc_attr($attr['paginationtopMobile']) . "% !important;";
        $css .= "--swiper-pagination-bullet-width: " . esc_attr($attr['bulletsize']) . "px !important;";
        $css .= "--swiper-pagination-bullet-height: " . esc_attr($attr['bulletsize']) . "px !important;";
        $css .= "--swiper-navigation-size: " . esc_attr($attr['navigationsize']) . "px !important;";

        $css .= "width: " . esc_attr($attr['customWidth']) . esc_attr($attr['customWidthUnit']) . ";";
        
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
   
    // Add media query for tablet screens
    $css .= "@media (max-width: 768px) {";
        $css .= "$wrapper {";
            $css .= "width: " . esc_attr($attr['customWidthTablet']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "}";
    $css .= "}";

    // Add media query for Mobile screens
    $css .= "@media (max-width: 300px) {";
        $css .= "$wrapper {";
            $css .= "width: " . esc_attr($attr['customWidthMobile']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "}";
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

    //scrollbar
    $css .= ".wp-block-vayu-blocks-advance-slider .swiper-scrollbar-drag {";
        $css .= "height: " . esc_attr($attr['scrollheight']) . "px !important;";
        $css .= "background: " . esc_attr($attr['scroll']) . ";";
    $css .= "}";

    $css .= ".wp-block-vayu-blocks-advance-slider .swiper-scrollbar {";
        $css .= "width: 100% !important;";
        $css .= "background: " . esc_attr($attr['scrollBox']) . ";";
        $css .= "align-content: center !important;"; // This property is not standard for scrollbar
        $css .= "left: 0 !important;"; // Percent not necessary for a scrollbar
        $css .= "top: " . esc_attr($attr['scrolltop']) . "% !important;";
        $css .= "height: " . esc_attr($attr['scrollheight']) . "px !important;";
        $css .= "opacity: 0;";
        $css .= "transition: all 0.5s ease;";
    $css .= "}";

    $css .= ".swiper:hover .swiper-scrollbar {";
        $css .= "opacity: 1 !important;";
    $css .= "}";

    $displayopacity  = 1;

    if ($attr['navigationtype'] === 'hover') {
        $displayopacity = 0;
    }
    
    // Navigation
    $css .= ".swiper-button-next, .swiper-button-prev {";
        $css .= "width:0 !important;";
        $css .= "height:0 !important;";

        $css .= "background: " . esc_attr($attr['navigationbackground']) . " !important;";
        $css .= "color: " . esc_attr($attr['navigationcolor']) . ";";
        $css .= "top: " . esc_attr($attr['navigationtop']) . "% !important;"; // Added space for proper CSS syntax
        $css .= "border-top: " . esc_attr($attr['navigationborder']['topwidth']) . " " . esc_attr($attr['navigationborder']['topstyle']) . " " . esc_attr($attr['navigationborder']['topcolor']) . ";";
        $css .= "border-bottom: " . esc_attr($attr['navigationborder']['bottomwidth']) . " " . esc_attr($attr['navigationborder']['bottomstyle']) . " " . esc_attr($attr['navigationborder']['bottomcolor']) . ";";
        $css .= "border-left: " . esc_attr($attr['navigationborder']['leftwidth']) . " " . esc_attr($attr['navigationborder']['leftstyle']) . " " . esc_attr($attr['navigationborder']['leftcolor']) . ";";
        $css .= "border-right: " . esc_attr($attr['navigationborder']['rightwidth']) . " " . esc_attr($attr['navigationborder']['rightstyle']) . " " . esc_attr($attr['navigationborder']['rightcolor']) . ";";
        $css .= "border-radius: " . esc_attr($attr['navigationborderRadius']['top']) . " " . esc_attr($attr['navigationborderRadius']['right']) . " " . esc_attr($attr['navigationborderRadius']['bottom']) . " " . esc_attr($attr['navigationborderRadius']['left']) . ";";
        $css .= "padding: " . esc_attr($attr['navigationpadding']['top']) . " " . esc_attr($attr['navigationpadding']['right']) . " " . esc_attr($attr['navigationpadding']['bottom']) . " " . esc_attr($attr['navigationpadding']['left']) . ";";
        $css .= "opacity: $displayopacity;"; // Ensuring displayopacity is escaped correctly
    $css .= "}";
    
    // Tablet Navigation
    $css .= "@media (max-width: 768px) {";
        $css .= ".swiper-button-next, .swiper-button-prev {";
            $css .= "background: " . esc_attr($attr['navigationbackgroundTablet']) . " !important;";
            $css .= "top: " . esc_attr($attr['navigationtopTablet']) . "% !important;";
        $css .= "}";

        $css .= ".swiper-button-next:after, .swiper-button-prev:after {";
            $css .= "font-size: " . esc_attr($attr['navigationsizeTablet']) . "px !important;";
        $css .= "}";

        $css .= ".swiper-button-next {";
            $css .= "right: " . esc_attr($attr['rightarrowTablet']) . "px !important;"; // Fixed interpolating arrow size
        $css .= "}";
    
        $css .= ".swiper-button-prev {";
            $css .= "left: " . esc_attr($attr['rightarrowTablet']) . "px !important;"; // Fixed interpolating arrow size
        $css .= "}";

            // Pagination
        $css .= ".swiper-pagination-bullets-dynamic {";
            $css .= "font-size: " . esc_attr($attr['bulletsizeTablet']) . "px !important;"; // Fixed interpolation
        $css .= "}";

        $css .= ".swiper-pagination-fraction {";
            $css .= "font-size: " . esc_attr($attr['bulletsizeTablet']) . "px !important;"; // Fixed interpolation
        $css .= "}";

        $css .= ".swiper-pagination {";
            $css .= "left: " . esc_attr($attr['dotsplaceTablet']) . "% !important;"; // Fixed interpolation and added percentage
        $css .= "}";

    $css .= "}";

    // Mobile Navigation
    $css .= "@media (max-width: 480px) {";
        $css .= ".swiper-button-next, .swiper-button-prev {";
            $css .= "background: " . esc_attr($attr['navigationbackgroundMobile']) . " !important;";
            $css .= "top: " . esc_attr($attr['navigationtopMobile']) . "% !important;";
        $css .= "}";

        $css .= ".swiper-button-next:after, .swiper-button-prev:after {";
            $css .= "font-size: " . esc_attr($attr['navigationsizeMobile']) . "px !important;";
        $css .= "}";

        $css .= ".swiper-button-next {";
            $css .= "right: " . esc_attr($attr['rightarrowMobile']) . "px !important;"; // Fixed interpolating arrow size
        $css .= "}";

        $css .= ".swiper-button-prev {";
            $css .= "left: " . esc_attr($attr['rightarrowMobile']) . "px !important;"; // Fixed interpolating arrow size
        $css .= "}";

        // Pagination
        $css .= ".swiper-pagination-bullets-dynamic {";
            $css .= "font-size: " . esc_attr($attr['bulletsizeMobile']) . "px !important;"; // Fixed interpolation
        $css .= "}";

        $css .= ".swiper-pagination-fraction {";
            $css .= "font-size: " . esc_attr($attr['bulletsizeMobile']) . "px !important;"; // Fixed interpolation
        $css .= "}";

        $css .= ".swiper-pagination {";
            $css .= "left: " . esc_attr($attr['dotsplaceMobile']) . "% !important;"; // Fixed interpolation and added percentage
        $css .= "}";

    $css .= "}";

    $css .= ".swiper-button-next:after, .swiper-button-prev:after {";
        $css .= "font-size: " . esc_attr($attr['navigationsize']) . "px !important;";
    $css .= "}";
    
    $css .= ".swiper-button-next {";
        $css .= "right: " . esc_attr($attr['rightarrow']) . "px !important;"; // Fixed interpolating arrow size
        $css .= "transition: all 0.5s ease;";
    $css .= "}";
    
    $css .= ".swiper-button-prev {";
        $css .= "left: " . esc_attr($attr['rightarrow']) . "px !important;"; // Fixed interpolating arrow size
        $css .= "transition: all 0.5s ease;";
    $css .= "}";
    
    $css .= ".swiper-wrapper {";
        $css .= "align-items: center;";
    $css .= "}";
    
    $css .= ".swiper:hover .swiper-button-next {";
        $css .= "opacity: 1 !important;";
    $css .= "}";
    
    $css .= ".swiper:hover .swiper-button-prev {";
        $css .= "opacity: 1 !important;";
    $css .= "}";

    // Pagination
    $css .= ".swiper-pagination-bullets-dynamic {";
        $css .= "font-size: " . esc_attr($attr['bulletsize']) . "px !important;"; // Fixed interpolation
    $css .= "}";

    $css .= ".swiper-pagination {"; // Fixed interpolation and added percentage
        $css .= "width: 100% !important;";
        $css .= "height: 70px !important;";
        $css .= "left: 50% !important;";
        $css .= "transform: translate(-50%);";
        $css .= "left: " . esc_attr($attr['dotsplace']) . "% !important;";
    $css .= "}";

    $displaypaginationprogressopacity = 1;
    if ($attr['progresshover']) {
        $displaypaginationprogressopacity = 0;
    }

    $css .= ".swiper-pagination-progressbar {";
        $css .= "width: 100% !important;";
        $css .= "left: 50% !important;";
        $css .= "opacity: " . esc_attr($displaypaginationprogressopacity) . " !important;"; // Fixed interpolation
        $css .= "transition: all 0.5s ease;";
    $css .= "}";

    $css .= ".swiper-pagination-progressbar-fill {";
        $css .= "background: " . esc_attr($attr['progresscolor']) . " !important;"; // Fixed interpolation
    $css .= "}";

    $css .= ".swiper:hover .swiper-pagination-progressbar {";
        $css .= "opacity: 1 !important;";
    $css .= "}";

    $css .= ".swiper-pagination-fraction {";
        $css .= "font-size: " . esc_attr($attr['bulletsize']) . "px !important;"; // Fixed interpolation
    $css .= "}";

    return $css;
}
