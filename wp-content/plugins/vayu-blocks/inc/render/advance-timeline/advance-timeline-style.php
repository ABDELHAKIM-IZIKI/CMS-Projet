<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function generate_inline_advance_timeline_styles($attr) {

    $css = '';

    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  
    $uniqueId = $attr['uniqueId'];

    // Generate the class selector by concatenating '.' with the unique ID
    $wrapper = '.vayu-blocks-advance-timeline-main-container' . esc_attr($uniqueId);

    $inline = '.vayu_blocks_advance-timeline__wrapper';

    $css .= ".wp_block_vayu-blocks-advance-timeline-main {";
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

        $css .= "--scroller-width-mode:" . esc_attr($attr['scrollbarwidth']) . ";";
        $css .= "--scroller-height-mode:" . esc_attr($attr['scrollbarheight']) . ";";
        $css .= "--scroller-color-mode:" . esc_attr($attr['thumbbg']) . ";";
        $css .= "--scroller-hvrcolor-mode: " . ( !empty($attr['thumbbghvr']) ? esc_attr($attr['thumbbghvr']) : esc_attr($attr['thumbbg']) ) . ";";
        $css .= "--scroller-track-mode:" . esc_attr($attr['trackbg']) . ";";
        // Correctly concatenate the border radius
        $css .= "--scrollerradius-icon-borderRadius: " 
            . esc_attr($attr['scrollerradius']['top'] ?? '0') . " " 
            . esc_attr($attr['scrollerradius']['right'] ?? '0') . " " 
            . esc_attr($attr['scrollerradius']['bottom'] ?? '0') . " " 
            . esc_attr($attr['scrollerradius']['left'] ?? '0') . ";";

        $css .= "--box-color-timeline-tablet:" . esc_attr($attr['boxcolorTablet']) . ";";
        $css .= "--box-color-timeline-mobile:" . esc_attr($attr['boxcolorMobile']) . ";";
        $css .= "--box-date-color-tablet:" . esc_attr($attr['datecolorTablet']) . ";";
        $css .= "--gapchild-margin-timeline-child-tablet:" . esc_attr($attr['gapchildTablet']) . "px;";
        $css .= "--gapchild-margin-timeline-child-mobile:" . esc_attr($attr['gapchildMobile']) . "px;";
        $css .= "--icon-size-color-size-tablet:" . esc_attr($attr['iconsizeTablet']) . "px;";
        $css .= "--icon-size-color-size-mobile:" . esc_attr($attr['iconsizeMobile']) . "px;";
        $css .= "--connector-thickness-width-tablet:" . esc_attr($attr['thicknessTablet']) . "px;";
        $css .= "--connector-thickness-width-mobile:" . esc_attr($attr['thicknessMobile']) . "px;";
        $css .= "--date-bnackrgiund-color:" . esc_attr($attr['datebackgroundcolor']) . ";";
        $css .= "--date-bnackrgiund-color-tablet:" . esc_attr($attr['datebackgroundcolorTablet']) . ";";
        $css .= "--date-bnackrgiund-color-mobile:" . esc_attr($attr['datebackgroundcolorMobile']) . ";";
        $css .= "--date-bnackrgiund-hover-color: " . ( !empty($attr['datebackgroundcolorhvr']) ? esc_attr($attr['datebackgroundcolorhvr']) : esc_attr($attr['datebackgroundcolor']) ) . ";";
        $css .= "--date-bnackrgiund-hover-color-tablet: " . ( !empty($attr['datebackgroundcolorhvrTablet']) ? esc_attr($attr['datebackgroundcolorhvrTablet']) : esc_attr($attr['datebackgroundcolorTablet']) ) . ";";
        $css .= "--date-bnackrgiund-hover-color-mobile: " . ( !empty($attr['datebackgroundcolorhvrMobile']) ? esc_attr($attr['datebackgroundcolorhvrMobile']) : esc_attr($attr['datebackgroundcolorMobile']) ) . ";";
        $css .= "--icon-backgoruond-color-active:" . esc_attr($attr['iconhvrcolor']) . ";";
        $css .= "--icon-icon-color-fill-mode-active:" . esc_attr($attr['iconiconhvrcolor']) . ";";

        // Set 'dateshow' based on 'showdate' attribute
        $dateshow = isset($attr['showdate']) && $attr['showdate'] ? 'block' : 'none';

        // Set 'connectorshow' based on 'connector' attribute
        $connectorshow = isset($attr['connector']) && $attr['connector'] ? 'block' : 'none';

        $css .= "--box-date-hover-color: " . ( !empty($attr['datehvrcolor']) ? esc_attr($attr['datehvrcolor']) : esc_attr($attr['datecolor']) ) . ";";
        $css .= "--box-date-hover-color-mobile: " . ( !empty($attr['datehvrcolorMobile']) ? esc_attr($attr['datehvrcolorMobile']) : esc_attr($attr['datecolorMobile']) ) . ";";
        $css .= "--box-date-hover-color-tablet: " . ( !empty($attr['datehvrcolorTablet']) ? esc_attr($attr['datehvrcolorTablet']) : esc_attr($attr['datecolorTablet']) ) . ";";        
        
        $css .= "--date-show-display: " . esc_attr($dateshow) . ";";

        // Timeline date borders
        $css .= "--timeline-date-border-top: " . esc_attr($attr['dateborder']['topwidth'] ?? '1px') . " " 
        . esc_attr($attr['dateborder']['topstyle'] ?? 'solid') . " " 
        . esc_attr($attr['dateborder']['topcolor'] ?? '#000') . ";";

        $css .= "--timeline-date-border-bottom: " . esc_attr($attr['dateborder']['bottomwidth'] ?? '1px') . " " 
        . esc_attr($attr['dateborder']['bottomstyle'] ?? 'solid') . " " 
        . esc_attr($attr['dateborder']['bottomcolor'] ?? '#000') . ";";

        $css .= "--timeline-date-border-left: " . esc_attr($attr['dateborder']['leftwidth'] ?? '1px') . " " 
        . esc_attr($attr['dateborder']['leftstyle'] ?? 'solid') . " " 
        . esc_attr($attr['dateborder']['leftcolor'] ?? '#000') . ";";

        $css .= "--timeline-date-border-right: " . esc_attr($attr['dateborder']['rightwidth'] ?? '1px') . " " 
        . esc_attr($attr['dateborder']['rightstyle'] ?? 'solid') . " " 
        . esc_attr($attr['dateborder']['rightcolor'] ?? '#000') . ";";
            
        $css .= "--timeline-date-borderRadius: " . esc_attr($attr['dateborderRadius']['top'] ?? '0') . " " 
        . esc_attr($attr['dateborderRadius']['right'] ?? '0') . " " 
        . esc_attr($attr['dateborderRadius']['left'] ?? '0') . " " 
        . esc_attr($attr['dateborderRadius']['bottom'] ?? '0') . ";";

        // Date padding
        $css .= "--date-padding-date-date: " . esc_attr($attr['datepadding']['top'] ?? '0') . " " 
            . esc_attr($attr['datepadding']['left'] ?? '0') . " " 
            . esc_attr($attr['datepadding']['bottom'] ?? '0') . " " 
            . esc_attr($attr['boxpadding']['right'] ?? '0') . ";";

        // Connector visibility
        $css .= "--connector-display-true-false: " . esc_attr($connectorshow) . ";";

        // Alignment for timeline layout
        $alignment = 'center';
        if (isset($attr['timelinelayout'])) {
            if (in_array($attr['timelinelayout'], ['layout-7', 'layout-11'])) {
                $alignment = 'flex-start';
            } elseif (in_array($attr['timelinelayout'], ['layout-8', 'layout-12'])) {
                $alignment = 'flex-end';
            }
        }
        $css .= "--alignItems-box-main-timeline-child: " . esc_attr($alignment) . ";";

        // Define CSS variables for icon colors
        $css .= "--icon-active-color: " . esc_attr($attr['iconhvrcolor']) . ";";
        $css .= "--icon-icon-active-color: " . esc_attr($attr['iconiconhvrcolor']) . ";";

        $leftWidth = isset($attr['boxborder']['leftwidth']) ? esc_attr($attr['boxborder']['leftwidth']) : '';
        $rightWidth = isset($attr['boxborder']['rightwidth']) ? esc_attr($attr['boxborder']['rightwidth']) : '';
        
        if($leftWidth){
            $css .= "--left-arrow-calc-with-border: calc(-" . $leftWidth . " - 10px);";
        }else{
            $css .= "--left-arrow-calc-with-border: -10px;";
        }
        if($rightWidth){
            $css .= "--right-arrow-calc-with-border: calc(-" . $rightWidth . " - 10px);";
        }else{
            $css .= "--right-arrow-calc-with-border: -10px;";
        }
        
        // Box and border colors
        $css .= "--box-color-timeline: " . esc_attr($attr['boxcolor']) . ";";
        // For hover colors with conditional logic
        $css .= "--box-hover-color-timeline: " . ( isset($attr['boxhvrcolor']) && $attr['boxhvrcolor'] ? esc_attr($attr['boxhvrcolor']) : esc_attr($attr['boxcolor']) ) . ";";
        $css .= "--box-hover-color-timeline-tablet: " . ( isset($attr['boxhvrcolorTablet']) && $attr['boxhvrcolorTablet'] ? esc_attr($attr['boxhvrcolorTablet']) : esc_attr($attr['boxcolorTablet']) ) . ";";
        $css .= "--box-hover-color-timeline-mobile: " . ( isset($attr['boxhvrcolorMobile']) && $attr['boxhvrcolorMobile'] ? esc_attr($attr['boxhvrcolorMobile']) : esc_attr($attr['boxcolorMobile']) ) . ";";

        // Border settings with default fallback values if any attribute is missing
        $css .= "--timeline-box-border-top: " . esc_attr($attr['boxborder']['topwidth'] ?? '1px') . " "
        . esc_attr($attr['boxborder']['topstyle'] ?? 'solid') . " "
        . esc_attr($attr['boxborder']['topcolor'] ?? '#000') . ";";

        $css .= "--timeline-box-border-bottom: " . esc_attr($attr['boxborder']['bottomwidth'] ?? '1px') . " "
        . esc_attr($attr['boxborder']['bottomstyle'] ?? 'solid') . " "
        . esc_attr($attr['boxborder']['bottomcolor'] ?? '#000') . ";";

        $css .= "--timeline-box-border-left: " . esc_attr($attr['boxborder']['leftwidth'] ?? '1px') . " "
        . esc_attr($attr['boxborder']['leftstyle'] ?? 'solid') . " "
        . esc_attr($attr['boxborder']['leftcolor'] ?? '#000') . ";";

        $css .= "--timeline-box-border-right: " . esc_attr($attr['boxborder']['rightwidth'] ?? '1px') . " "
        . esc_attr($attr['boxborder']['rightstyle'] ?? 'solid') . " "
        . esc_attr($attr['boxborder']['rightcolor'] ?? '#000') . ";";

        // Border radius
        $css .= "--timeline-box-borderRadius: " . esc_attr($attr['boxborderRadius']['top']) . " " . esc_attr($attr['boxborderRadius']['right']) . " " . esc_attr($attr['boxborderRadius']['left']) . " " . esc_attr($attr['boxborderRadius']['bottom']) . ";";

        // Padding and margin
        $css .= "--box-padding-box-box: " . esc_attr($attr['boxpadding']['top']) . " " . esc_attr($attr['boxpadding']['left']) . " " . esc_attr($attr['boxpadding']['bottom']) . " " . esc_attr($attr['boxpadding']['right']) . ";";
        $css .= "--box-margin-box-box: " . esc_attr($attr['boxmargin']['top']) . " " . esc_attr($attr['boxmargin']['left']) . " " . esc_attr($attr['boxmargin']['bottom']) . " " . esc_attr($attr['boxmargin']['right']) . ";";

        
        // Alignment settings
        // Default alignment values
        $datealignmentHorizontal = 'center';
        $datealignmentVertical = 'center';
        $datealignmentTabletHorizontal = 'center';
        $datealignmentTabletVertical = 'center';
        $datealignmentMobileHorizontal = 'center';
        $datealignmentMobileVertical = 'center';

        // Check if 'datealignment' attribute exists and split it for horizontal and vertical alignment
        if (isset($attr['datealignment'])) {
            list($horizontal, $vertical) = explode(' ', $attr['datealignment']);
            if ($horizontal === 'bottom') {
                $horizontal = 'end';
            }
            $datealignmentHorizontal = $horizontal ?: 'center'; // Default to 'center' if undefined
            $datealignmentVertical = $vertical ?: 'center';     // Default to 'center' if undefined
        }

        // Check if 'datealignmenttablet' attribute exists and split it for tablet horizontal and vertical alignment
        if (isset($attr['datealignmenttablet'])) {
            list($horizontal, $vertical) = explode(' ', $attr['datealignmenttablet']);
            if ($horizontal === 'bottom') {
                $horizontal = 'end';
            }
            $datealignmentTabletHorizontal = $horizontal ?: 'center'; // Default to 'center' if undefined
            $datealignmentTabletVertical = $vertical ?: 'center';     // Default to 'center' if undefined
        }

        // Check if 'datealignmentmobile' attribute exists and split it for mobile horizontal and vertical alignment
        if (isset($attr['datealignmentmobile'])) {
            list($horizontal, $vertical) = explode(' ', $attr['datealignmentmobile']);
            if ($horizontal === 'bottom') {
                $horizontal = 'end';
            }
            $datealignmentMobileHorizontal = $horizontal ?: 'center'; // Default to 'center' if undefined
            $datealignmentMobileVertical = $vertical ?: 'center';     // Default to 'center' if undefined
        }

        // CSS styling for date alignment
        $css .= "--date-alignment-horizontal: " . esc_attr($datealignmentHorizontal) . ";";
        $css .= "--date-alignment-tablet-horizontal: " . esc_attr($datealignmentTabletHorizontal) . ";";
        $css .= "--date-alignment-mobile-horizontal: " . esc_attr($datealignmentMobileHorizontal) . ";";
        $css .= "--date-alignment-vertical: " . esc_attr($datealignmentVertical) . ";";
        $css .= "--date-alignment-tablet-vertical: " . esc_attr($datealignmentTabletVertical) . ";";
        $css .= "--date-alignment-mobile-vertical: " . esc_attr($datealignmentMobileVertical) . ";";


        // Date font properties
        $css .= "--box-date-font: " . esc_attr($attr['datefont']) . ";";
        $css .= "--box-date-size: " . esc_attr($attr['datesize']) . "px;";
        $css .= "--box-date-appearance: " . esc_attr($attr['dateappearance']) . ";";
        $css .= "--box-date-letterSpacing: " . esc_attr($attr['dateletterSpacing']) . ";";
        $css .= "--box-date-color: " . esc_attr($attr['datecolor']) . ";";

        // Icon settings
        $css .= "--icon-alignment-horizontal: " . esc_attr($attr['iconalignment']) . ";";
        $css .= "--icon-alignment-tablet-horizontal: " . esc_attr($attr['iconalignmenttablet']) . ";";
        $css .= "--icon-alignment-mobile-horizontal: " . esc_attr($attr['iconalignmentmobile']) . ";";
        $css .= "--icon-backgoruond-color: " . esc_attr($attr['iconcolor']) . ";";
        $css .= "--icon-hover-backgoruond-color: " . esc_attr($attr['iconhvrcolor']) . ";";
        $css .= "--icon-size-color-size: " . esc_attr($attr['iconsize']) . "px;";
        $css .= "--icon-icon-color-fill-mode:" . esc_attr($attr['iconiconcolor']) . ";";

        // Connector settings
        $css .= "--connector-thickness-width: " . esc_attr($attr['thickness']) . "px;";
        $css .= "--connector-backgroound-color: " . esc_attr($attr['connectorcolor']) . ";";
        $css .= "--connector-hover-backgroound-color: " . esc_attr($attr['connectorhvrcolor']) . ";";

        // Gap child margin
        $css .= "--gapchild-margin-timeline-child: " . esc_attr($attr['gapchild']) . "px;";

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
        
    $css .= "}";

    // Connector CSS
    $css .= "$wrapper .vayu-blocks-connector {";

        $connectorHeight = isset($attr['final_connector_height']) ? (int)$attr['final_connector_height'] : 100; // Default height 100px
        $connectorTop = isset($attr['final_connector_top']) ? (int)$attr['final_connector_top'] : 0; // Default top 0px
        $connectorLeft = isset($attr['final_connector_left']) ? esc_attr($attr['final_connector_left']) : 0; // Default left 0px
        $iconHeight = isset($attr['iconHeight']) ? (int)$attr['iconHeight'] : 20; // Default icon height, set to 20px if not defined
        $thickness = isset($attr['thickness']) ? (int)$attr['thickness'] : 5; // Default thickness, set to 5px if not defined
        $connectorWidth = isset($attr['final_connector_width']) ? (int)$attr['final_connector_width'] : 50; // Default connector width, set to 50px if not defined
        $totalHeightBack = isset($attr['totalHeightback']) ? (int)$attr['totalHeightback'] : 100; // Total height back value, set to 100px if not defined
        
        // Layout condition (1-6)
        if (in_array($attr['timelinelayout'], ['layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6'])) {
            // Calculate height for layouts 1 to 6
            $connectorHeight = $connectorHeight - $connectorTop - ($iconHeight * 2);
            if ($connectorHeight < 0) $connectorHeight = 0; // Ensure no negative height
        
            // Calculate top
            $connectorTop = $connectorTop + $iconHeight;
        
            // Calculate left
            $connectorLeft = $connectorLeft + ($connectorWidth * 0.75) - ($thickness * 0.5);
        
            // Output the CSS for layouts 1-6
            $css .= "height: " . $connectorHeight . "px;";
            $css .= "top: " . $connectorTop . "px;";
            $css .= "left: 50%;";

            // Layout condition (1-6)
        if (in_array($attr['timelinelayout'], ['layout-5'])) {
            $css .= "left: 47px;";
        }
        if (in_array($attr['timelinelayout'], ['layout-6'])) {
            $css .= "left: calc(100% - 47px);";
        }

        }
        // Layout condition (7-12)
        elseif (in_array($attr['timelinelayout'], ['layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'])) {
            // Adjust width and height for layouts 7-12
            $css .= "display: none;";
        }
    
    $css .= "}";


    if ($attr['touch']!='scroll') {
        
        $css .= ".vayu_blocks_advance-timeline_block_main .wp-block-vayu-blocks-advance-timeline {";

        $css .= "display: flex; ";
        $css .= "overflow-x: auto; ";
        $css .= "overflow-y: hidden;";
            $css .= "  scroll-snap-type: x mandatory;";
            $css .= "  -webkit-overflow-scrolling: touch;";
            $css .= "  cursor: grab;";
        $css .= "}";

    
        $css .= ".vayu_blocks_advance-timeline_block_main .wp-block-vayu-blocks-advance-timeline:active {";
            $css .= "  cursor: grabbing; /* Show grabbing cursor when active */";
        $css .= "}";
     }

    if($attr['touch']==='touch'){
        $css .= ".vayu_blocks_advance-timeline_block_main .wp-block-vayu-blocks-advance-timeline::-webkit-scrollbar {";
            $css .= "  display: none !important; /* Hide scrollbar */";
            $css .= "  width: 0px !important; /* Set width to 0px to hide it */";
        $css .= "}";
     }

   
    
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