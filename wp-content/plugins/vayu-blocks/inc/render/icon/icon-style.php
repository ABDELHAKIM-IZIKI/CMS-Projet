<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function generate_inline_icon_styles($attr) {

    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    // Generate the class selector by concatenating '.' with the unique ID
    $wrapper = '.vayu-blocks-icon-main-container' . esc_attr($uniqueId);

    $inline = '.vayu_blocks_icon__wrapper';

    $css .= ".wp_block_vayu-blocks-icon-main {";
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

    // Ensure default box shadow attributes are set
    if ($attr['iconboxShadow']) {
        $newboxShadow = sprintf(
            '%dpx %dpx %dpx %dpx rgba(%d, %d, %d, %.2f)', 
            $attr['iconboxShadowHorizontal'], 
            $attr['iconboxShadowVertical'], 
            $attr['iconboxShadowBlur'], 
            $attr['iconboxShadowSpread'], 
            hexdec(substr($attr['iconboxShadowColor'], 1, 2)),  // Red
            hexdec(substr($attr['iconboxShadowColor'], 3, 2)),  // Green
            hexdec(substr($attr['iconboxShadowColor'], 5, 2)),  // Blue
            $attr['iconboxShadowColorOpacity'] / 100  // Opacity
        );
    } else {
        $newboxShadow = 'none';
    }

    if ($attr['iconboxShadowHvr']) {
        $hoverboxShadow = sprintf(
            '%dpx %dpx %dpx %dpx rgba(%d, %d, %d, %.2f)', 
            $attr['iconboxShadowHorizontalHvr'], 
            $attr['iconboxShadowVerticalHvr'], 
            $attr['iconboxShadowBlurHvr'], 
            $attr['iconboxShadowSpreadHvr'], 
            hexdec(substr($attr['iconboxShadowColorHvr'], 1, 2)),  // Red
            hexdec(substr($attr['iconboxShadowColorHvr'], 3, 2)),  // Green
            hexdec(substr($attr['iconboxShadowColorHvr'], 5, 2)),  // Blue
            $attr['iconboxShadowColorOpacityHvr'] / 100  // Opacity
        );
    } else {
        $hoverboxShadow = 'none';
    }

    //Main div
    $css .= "$wrapper {";

        $css  .= '--stroke-text-settings: ' . $attr['strokeWidthtext'] . 'px ' . $attr['stroketext'] . ';';
        $css  .= '--text-icon-settings-font: ' . $attr['textfont'] . ';';
        $css .= '--text-icon-settings-size: ' . $attr['textsize'] . 'px;';
        $css .= '--text-icon-settings-appearance: ' . $attr['textappearance'] . ';';
        $css .= '--text-icon-settings-letterSpacing: ' . $attr['letterSpacing'] . ';';
        $css .= '--text-icon-settings-textbackground: ' . $attr['textbackground'] . ';';
        $css .= '--text-icon-settings-textcolor: ' . $attr['textcolor'] . ';';
        $css .= '--text-icon-settings-textx: ' . $attr['textx'] . ';';
        $css .= '--text-icon-settings-texty: ' . $attr['texty'] . ';';

        $css .= '--icon-size-font: ' . $attr['fontSize'] . 'px;';
        $css .= '--icon-rotate-degree: ' . $attr['rotate'] . 'deg;';
        $css .= '--icon-color-svg: ' . $attr['color'] . ';';
        $css .= '--icon-hover-color-svg: ' . $attr['hoverColor'] . ';';
        $css .= '--backgorund-box-icon: ' . $attr['backgroundcolor'] . ';';
        $css .= '--backgorund-hover-box-icon: ' . $attr['backgroundhoverColor'] . ';';
        $css .= '--color-hover-box-icon: ' . $attr['hoverColor'] . ';';
        $css .= '--icon-padding-box-icon: ' . $attr['iconpadding']['top'] . ' ' . $attr['iconpadding']['left'] . ' ' . $attr['iconpadding']['bottom'] . ' ' . $attr['iconpadding']['right'] . ';';
        $css .= '--icon-margin-box-icon: ' . $attr['iconmargin']['top'] . ' ' . $attr['iconmargin']['left'] . ' ' . $attr['iconmargin']['bottom'] . ' ' . $attr['iconmargin']['right'] . ';';
        $css .= '--icon-box-icon-border-top: ' . $attr['iconborder']['topwidth'] . ' ' . $attr['iconborder']['topstyle'] . ' ' . $attr['iconborder']['topcolor'] . ';';
        $css .= '--icon-box-icon-border-bottom: ' . $attr['iconborder']['bottomwidth'] . ' ' . $attr['iconborder']['bottomstyle'] . ' ' . $attr['iconborder']['bottomcolor'] . ';';
        $css .= '--icon-box-icon-border-left: ' . $attr['iconborder']['leftwidth'] . ' ' . $attr['iconborder']['leftstyle'] . ' ' . $attr['iconborder']['leftcolor'] . ';';
        $css .= '--icon-box-icon-border-right: ' . $attr['iconborder']['rightwidth'] . ' ' . $attr['iconborder']['rightstyle'] . ' ' . $attr['iconborder']['rightcolor'] . ';';
        $css .= '--icon-box-icon-borderRadius: ' . $attr['iconRadius']['top'] . ' ' . $attr['iconRadius']['right'] . ' ' . $attr['iconRadius']['left'] . ' ' . $attr['iconRadius']['bottom'] . ';';
        $css .= '--icon-box-icon-boxShadow: ' . $newboxShadow . ';'; // Assuming $newboxShadow is already set
        $css .= '--icon-box-icon-hover-boxShadow: ' . $hoverboxShadow . ';'; // Assuming $hoverboxShadow is already set
        $css .= '--icon-box-icon-border-hover-top: ' . $attr['iconborderhvr']['topwidth'] . ' ' . $attr['iconborderhvr']['topstyle'] . ' ' . $attr['iconborderhvr']['topcolor'] . ';';
        $css .= '--icon-box-icon-border-hover-bottom: ' . $attr['iconborderhvr']['bottomwidth'] . ' ' . $attr['iconborderhvr']['bottomstyle'] . ' ' . $attr['iconborderhvr']['bottomcolor'] . ';';
        $css .= '--icon-box-icon-border-hover-left: ' . $attr['iconborderhvr']['leftwidth'] . ' ' . $attr['iconborderhvr']['leftstyle'] . ' ' . $attr['iconborderhvr']['leftcolor'] . ';';
        $css .= '--icon-box-icon-border-hover-right: ' . $attr['iconborderhvr']['rightwidth'] . ' ' . $attr['iconborderhvr']['rightstyle'] . ' ' . $attr['iconborderhvr']['rightcolor'] . ';';
        $css .= '--icon-box-icon-hover-borderRadius: ' . $attr['iconRadiushvr']['top'] . ' ' . $attr['iconRadiushvr']['right'] . ' ' . $attr['iconRadiushvr']['left'] . ' ' . $attr['iconRadiushvr']['bottom'] . ';';

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
        
        // Flex properties
        $css .= "display: flex;";
        $css .= "justify-content: center;";
        $css .= "align-items: {$attr['alignment']};";
        
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

    $css .= ".vayu_blocks_icon_block_main_icon_front_svg{";
        $css .= "transform: " . 
            ($attr['flipHorizontal'] ? "scaleX(-1) " : "") . 
            ($attr['flipVertical'] ? "scaleY(-1)" : "") . " !important;";
    $css .= "}";

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


    }";
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

    }";
    
    return $css;
}
