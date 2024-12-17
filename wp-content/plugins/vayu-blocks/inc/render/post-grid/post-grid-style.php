<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function generate_inline_styles($attr) {
    $css = '';
    // Generate unique ID
    // Ensure 'pg_posts' key exists and is an array
    if (isset($attr['pg_posts']) && is_array($attr['pg_posts']) 
        && isset($attr['pg_posts'][0]) 
        && isset($attr['pg_posts'][0]['uniqueID'])) {
        
        $uniqueId = $attr['pg_posts'][0]['uniqueID'];
    } else {
        // Handle the case where 'uniqueID' is not available
        $uniqueId = 'default_value'; // Set a default value or handle as needed
    }
    //attributes-merge
    $default_attributes = include('defaultattributes.php');
    $attr = array_merge($default_attributes, $attr);  

    $wrapper = ".th-post-grid-wrapper-{$uniqueId}";
    $post = ".th-post-grid-inline-{$uniqueId}";
    
    $css .= ".th-post-grid-main-wp-editor-wrapper {";
        // Check if 'widthType' attribute is set to 'customwidth' and apply the width accordingly
        $css .= "width: " . esc_attr($attr['customWidth']) . esc_attr($attr['customWidthUnit']) . ";";
        
    $css .= "}";
    
     // Add media query for tablet screens
     $css .= "@media (max-width: 768px) {";
        $css .= ".th-post-grid-main-wp-editor-wrapper {";
            $css .= "width: " . esc_attr($attr['customWidthTablet']) . esc_attr($attr['customWidthUnit']) . ";";
        $css .= "}";
    $css .= "}";

    // Add media query for Mobile screens
    $css .= "@media (max-width: 300px) {";
        $css .= ".th-post-grid-main-wp-editor-wrapper {";
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
        $css .= "grid-gap: {$gridGapUp} {$gridGap};";
        $css .= "grid-auto-rows: minmax(100px, auto);";
        
    $css .= "}";

    //Post
    $css .= "$wrapper $post {";
        // $css .= " display: flex;
        // flex-direction: column;
        // justify-content: space-between;";
        // Line height
        $css .= "box-sizing: border-box;";
        $widthUnit = isset($attr['layoutcustomWidthUnit']) ? esc_attr($attr['layoutcustomWidthUnit']) : '%';

        $css .= isset($attr['layoutcustomWidth']) ? "width: " . esc_attr($attr['layoutcustomWidth']) . $widthUnit . ";" : '';


        $css .= isset($attr['pg_spacing']) ? "line-height: " . esc_attr($attr['pg_spacing']) . ";" : '';

        // Desktop Padding
        $paddingUnit = isset($attr['pg_layoutpaddingUnit']) ? esc_attr($attr['pg_layoutpaddingUnit']) : 'px';
        $css .= isset($attr['pg_layoutpaddingTop']) ? "padding-top: " . esc_attr($attr['pg_layoutpaddingTop']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_layoutpaddingBottom']) ? "padding-bottom: " . esc_attr($attr['pg_layoutpaddingBottom']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_layoutpaddingLeft']) ? "padding-left: " . esc_attr($attr['pg_layoutpaddingLeft']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_layoutpaddingRight']) ? "padding-right: " . esc_attr($attr['pg_layoutpaddingRight']) . $paddingUnit . ";" : '';
 
        
        if (isset($attr['layout_backgroundType'])) {
            if ($attr['layout_backgroundType'] === 'color' && isset($attr['layout_backgroundColor'])) {
                $css .= "background: " . esc_attr($attr['layout_backgroundColor']) . ";";
            } elseif ($attr['layout_backgroundType'] === 'gradient') {
                $css .= "background: " . (isset($attr['layout_backgroundGradient']) ? esc_attr($attr['layout_backgroundGradient']) : 'linear-gradient(135deg,#12c2e9 0%,#c471ed 50%,#f64f59 100%)') . ";";
            } elseif ($attr['layout_backgroundType'] === 'image'){
                $css .= "background: url(" . esc_url($attr['layout_backgroundImage']['url']) . ");";

            }
        } elseif (isset($attr['layout_backgroundColor'])) {
            $css .= "background: " . esc_attr($attr['layout_backgroundColor']) . ";";
        } else {
            $css .= "background: none;";
        }
    
        $borderRadiusUnit = isset($attr['pg_layoutBorderRadiusunit']) ? esc_attr($attr['pg_layoutBorderRadiusunit']) : 'px';

        // Border radius for layout
        $css .= isset($attr['pg_layoutTopBorderRadius']) ? "border-top-left-radius: " . esc_attr($attr['pg_layoutTopBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_layoutRightBorderRadius']) ? "border-top-right-radius: " . esc_attr($attr['pg_layoutRightBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_layoutBottomBorderRadius']) ? "border-bottom-right-radius: " . esc_attr($attr['pg_layoutBottomBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_layoutLeftBorderRadius']) ? "border-bottom-left-radius: " . esc_attr($attr['pg_layoutLeftBorderRadius']) . $borderRadiusUnit . ";" : '';
        
        
        // Font size
        $css .= isset($attr['pg_textSize']) ? "font-size: " . esc_attr($attr['pg_textSize']) . "px;" : '';
        
        // Border
        if (isset($attr['layoutTopborderType']) && isset($attr['pg_layoutTopBorder']) && isset($attr['pg_layoutTopBorderColor'])) {
            $css .= "border-top: " . esc_attr($attr['layoutTopborderType']) . ' ' . esc_attr($attr['pg_layoutTopBorder']) . " " . esc_attr($attr['pg_layoutTopBorderColor']) . ";";
        }
        if (isset($attr['layoutBottomborderType']) && isset($attr['pg_layoutBottomBorder']) && isset($attr['pg_layoutBottomBorderColor'])) {
            $css .= "border-bottom: " . esc_attr($attr['layoutBottomborderType']) . ' ' . esc_attr($attr['pg_layoutBottomBorder']) . " " . esc_attr($attr['pg_layoutBottomBorderColor']) . ";";
        }
        if (isset($attr['layoutLeftborderType']) && isset($attr['pg_layoutLeftBorder']) && isset($attr['pg_layoutLeftBorderColor'])) {
            $css .= "border-left: " . esc_attr($attr['layoutLeftborderType']) . ' ' . esc_attr($attr['pg_layoutLeftBorder']) . " " . esc_attr($attr['pg_layoutLeftBorderColor']) . ";";
        }
        if (isset($attr['layoutRightborderType']) && isset($attr['pg_layoutRightBorder']) && isset($attr['pg_layoutRightBorderColor'])) {
            $css .= "border-right: " . esc_attr($attr['layoutRightborderType']) . ' ' . esc_attr($attr['pg_layoutRightBorder']) . " " . esc_attr($attr['pg_layoutRightBorderColor']) . ";";
        }        
        
        // Text color
        $css .= isset($attr['pg_textColor']) ? "color: " . esc_attr($attr['pg_textColor']) . ";" : '';
        
        // Position
        $css .= "position: relative;";
        
        // Background attachment, repeat, size
        $css .= isset($attr['layout_backgroundAttachment']) ? "background-attachment: " . esc_attr($attr['layout_backgroundAttachment']) . ";" : '';
        $css .= isset($attr['layout_backgroundRepeat']) ? "background-repeat: " . esc_attr($attr['layout_backgroundRepeat']) . ";" : '';
        $css .= isset($attr['layout_backgroundSize']) ? "background-size: " . esc_attr($attr['layout_backgroundSize']) . ";" : '';
        
    $css .= "}";

    //Category
    $css .= "$wrapper $post .post-grid-category-style-new{";
        // Cursor
        $css .= "cursor: pointer;";

        // Padding
        $paddingUnit = isset($attr['categorypaddingUnit']) ? esc_attr($attr['categorypaddingUnit']) : 'px';
        $css .= isset($attr['pg_CategorypaddingTop']) ? "padding-top: " . esc_attr($attr['pg_CategorypaddingTop']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_CategorypaddingBottom']) ? "padding-bottom: " . esc_attr($attr['pg_CategorypaddingBottom']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_CategorypaddingLeft']) ? "padding-left: " . esc_attr($attr['pg_CategorypaddingLeft']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_CategorypaddingRight']) ? "padding-right: " . esc_attr($attr['pg_CategorypaddingRight']) . $paddingUnit . ";" : '';

         // Border radius for category
        $borderRadiusUnit = isset($attr['pg_categoryBorderRadiusunit']) ? esc_attr($attr['pg_categoryBorderRadiusunit']) : 'px';

        $css .= isset($attr['pg_categoryTopBorderRadius']) ? "border-top-left-radius: " . esc_attr($attr['pg_categoryTopBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_categoryRightBorderRadius']) ? "border-top-right-radius: " . esc_attr($attr['pg_categoryRightBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_categoryBottomBorderRadius']) ? "border-bottom-right-radius: " . esc_attr($attr['pg_categoryBottomBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_categoryLeftBorderRadius']) ? "border-bottom-left-radius: " . esc_attr($attr['pg_categoryLeftBorderRadius']) . $borderRadiusUnit . ";" : '';
        

        // Border
        $css .= isset($attr['categoryTopborderType']) && isset($attr['pg_categoryTopBorder']) && isset($attr['pg_categoryTopBorderColor']) ? 
        "border-top: " . esc_attr($attr['categoryTopborderType']) . ' ' . esc_attr($attr['pg_categoryTopBorder']) . " " . esc_attr($attr['pg_categoryTopBorderColor']) . ";" : '';
        $css .= isset($attr['categoryBottomborderType']) && isset($attr['pg_categoryBottomBorder']) && isset($attr['pg_categoryBottomBorderColor']) ? 
        "border-bottom: " . esc_attr($attr['categoryBottomborderType']) . ' ' . esc_attr($attr['pg_categoryBottomBorder']) . " " . esc_attr($attr['pg_categoryBottomBorderColor']) . ";" : '';
        $css .= isset($attr['categoryLeftborderType']) && isset($attr['pg_categoryLeftBorder']) && isset($attr['pg_categoryLeftBorderColor']) ? 
        "border-left: " . esc_attr($attr['categoryLeftborderType']) . ' ' . esc_attr($attr['pg_categoryLeftBorder']) . " " . esc_attr($attr['pg_categoryLeftBorderColor']) . ";" : '';
        $css .= isset($attr['categoryRightborderType']) && isset($attr['pg_categoryRightBorder']) && isset($attr['pg_categoryRightBorderColor']) ? 
        "border-right: " . esc_attr($attr['categoryRightborderType']) . ' ' . esc_attr($attr['pg_categoryRightBorder']) . " " . esc_attr($attr['pg_categoryRightBorderColor']) . ";" : '';

        $css .= "text-decoration: none;";
        $css .= "margin-left: 5px;";
        $css .= "font-weight: 600;";
        $css .= isset($attr['pg_spacing']) ? "margin-block-start: " . esc_attr($attr['pg_spacing']) . "%;" : '';
        $css .= "line-height: initial;";


        // Text color
        $css .= isset($attr['pg_categoryTextColor']) ? "color: " . esc_attr($attr['pg_categoryTextColor']) . ";" : '';

        // Background
        $css .= isset($attr['category_backgroundColor']) ? "background: " . esc_attr($attr['category_backgroundColor']) . ";" : '';

        // Font size
        $css .= isset($attr['pg_categoryTextSize']) ? "font-size: " . esc_attr($attr['pg_categoryTextSize']) . "px;" : '';

    $css .= "}";

    $css .= "$wrapper $post .post-grid-category-style-container {";
        $css .= isset($attr['pg_layoutalignment']) ? "justify-content: " . esc_attr($attr['pg_layoutalignment']) . ";" : '';
    $css .= "}";
        
    $css .= "$wrapper $post .vayu_blocks_title_post_grid {";
        $css .= "display:flex;";
        $css .= isset($attr['pg_layoutalignment']) ? "justify-content: " . esc_attr($attr['pg_layoutalignment']) . ";" : '';
    $css .= "}";

    $css .= "$wrapper $post .post-grid-tag-style-conatiner {";
        // $css .= "display:flex;";
        $css .= isset($attr['pg_layoutalignment']) ? "text-align: " . esc_attr($attr['pg_layoutalignment']) . ";" : '';
    $css .= "}";
   
    //Tag
    $css .= "$wrapper $post .post-grid-tag-style-conatiner .post-grid-tag-style-new{";
        // Cursor
        $css .= "cursor: pointer;";
        // Display
        $css .= "text-decoration: none;";
        $css .= "margin-left: 5px;";
        // Desktop Padding
        $paddingUnit = isset($attr['tagpaddingUnit']) ? esc_attr($attr['tagpaddingUnit']) : 'px';
        $css .= isset($attr['pg_TagpaddingTop']) ? "padding-top: " . esc_attr($attr['pg_TagpaddingTop']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_TagpaddingBottom']) ? "padding-bottom: " . esc_attr($attr['pg_TagpaddingBottom']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_TagpaddingLeft']) ? "padding-left: " . esc_attr($attr['pg_TagpaddingLeft']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_TagpaddingRight']) ? "padding-right: " . esc_attr($attr['pg_TagpaddingRight']) . $paddingUnit . ";" : '';
        
        // Font Weight and Box Sizing
        $css .= "font-weight: 600;";
        $css .= "box-sizing: border-box;";
        $css .= "line-Height: initial;"; 
        
        // Text Color
        $css .= isset($attr['pg_tagTextColor']) ? "color: " . esc_attr($attr['pg_tagTextColor']) . ";" : '';
        
        $css .= "background: " . esc_attr($attr['tag_backgroundColor']) . ";";
        
        // Font Size
        $css .= isset($attr['pg_tagTextSize']) ? "font-size: " . esc_attr($attr['pg_tagTextSize']) . "px;" : '';
        
        // Border radius for tags
        $borderRadiusUnit = isset($attr['pg_tagsBorderRadiusunit']) ? esc_attr($attr['pg_tagsBorderRadiusunit']) : 'px';

        $css .= isset($attr['pg_tagsTopBorderRadius']) ? "border-top-left-radius: " . esc_attr($attr['pg_tagsTopBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_tagsRightBorderRadius']) ? "border-top-right-radius: " . esc_attr($attr['pg_tagsRightBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_tagsBottomBorderRadius']) ? "border-bottom-right-radius: " . esc_attr($attr['pg_tagsBottomBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_tagsLeftBorderRadius']) ? "border-bottom-left-radius: " . esc_attr($attr['pg_tagsLeftBorderRadius']) . $borderRadiusUnit . ";" : '';
        
            
        // Border
        $css .= isset($attr['tagTopborderType']) && isset($attr['pg_tagTopBorder']) && isset($attr['pg_tagTopBorderColor']) ? 
            "border-top: " . esc_attr($attr['tagTopborderType']) . ' ' . esc_attr($attr['pg_tagTopBorder']) . " " . esc_attr($attr['pg_tagTopBorderColor']) . ";" : '';
        $css .= isset($attr['tagBottomborderType']) && isset($attr['pg_tagBottomBorder']) && isset($attr['pg_tagBottomBorderColor']) ? 
            "border-bottom: " . esc_attr($attr['tagBottomborderType']) . ' ' . esc_attr($attr['pg_tagBottomBorder']) . " " . esc_attr($attr['pg_tagBottomBorderColor']) . ";" : '';
        $css .= isset($attr['tagLeftborderType']) && isset($attr['pg_tagLeftBorder']) && isset($attr['pg_tagLeftBorderColor']) ? 
            "border-left: " . esc_attr($attr['tagLeftborderType']) . ' ' . esc_attr($attr['pg_tagLeftBorder']) . " " . esc_attr($attr['pg_tagLeftBorderColor']) . ";" : '';
        $css .= isset($attr['tagRightborderType']) && isset($attr['pg_tagRightBorder']) && isset($attr['pg_tagRightBorderColor']) ? 
            "border-right: " . esc_attr($attr['tagRightborderType']) . ' ' . esc_attr($attr['pg_tagRightBorder']) . " " . esc_attr($attr['pg_tagRightBorderColor']) . ";" : '';
        
    $css .= "}";
        
    //Featured Image
    $css .= "$wrapper $post .post-grid-image{";
        $css .= "display: block;";
        $css .= "width: 100%;";
        $css .= "height: auto;";

      // Border radius for featuredImage
      $borderRadiusUnit = isset($attr['pg_featuredImageBorderRadiusunit']) ? esc_attr($attr['pg_featuredImageBorderRadiusunit']) : 'px';

      $css .= isset($attr['pg_featuredImageTopBorderRadius']) ? "border-top-left-radius: " . esc_attr($attr['pg_featuredImageTopBorderRadius']) . $borderRadiusUnit . ";" : '';
      $css .= isset($attr['pg_featuredImageRightBorderRadius']) ? "border-top-right-radius: " . esc_attr($attr['pg_featuredImageRightBorderRadius']) . $borderRadiusUnit . ";" : '';
      $css .= isset($attr['pg_featuredImageBottomBorderRadius']) ? "border-bottom-right-radius: " . esc_attr($attr['pg_featuredImageBottomBorderRadius']) . $borderRadiusUnit . ";" : '';
      $css .= isset($attr['pg_featuredImageLeftBorderRadius']) ? "border-bottom-left-radius: " . esc_attr($attr['pg_featuredImageLeftBorderRadius']) . $borderRadiusUnit . ";" : '';
      
        // Border
        $css .= isset($attr['featuredImageTopborderType']) && isset($attr['pg_featuredImageTopBorder']) && isset($attr['pg_featuredImageTopBorderColor']) ? 
            "border-top: " . esc_attr($attr['featuredImageTopborderType']) . ' ' . esc_attr($attr['pg_featuredImageTopBorder']) . " " . esc_attr($attr['pg_featuredImageTopBorderColor']) . ";" : '';
        $css .= isset($attr['featuredImageBottomborderType']) && isset($attr['pg_featuredImageBottomBorder']) && isset($attr['pg_featuredImageBottomBorderColor']) ? 
            "border-bottom: " . esc_attr($attr['featuredImageBottomborderType']) . ' ' . esc_attr($attr['pg_featuredImageBottomBorder']) . " " . esc_attr($attr['pg_featuredImageBottomBorderColor']) . ";" : '';
        $css .= isset($attr['featuredImageLeftborderType']) && isset($attr['pg_featuredImageLeftBorder']) && isset($attr['pg_featuredImageLeftBorderColor']) ? 
            "border-left: " . esc_attr($attr['featuredImageLeftborderType']) . ' ' . esc_attr($attr['pg_featuredImageLeftBorder']) . " " . esc_attr($attr['pg_featuredImageLeftBorderColor']) . ";" : '';
        $css .= isset($attr['featuredImageRightborderType']) && isset($attr['pg_featuredImageRightBorder']) && isset($attr['pg_featuredImageRightBorderColor']) ? 
            "border-right: " . esc_attr($attr['featuredImageRightborderType']) . ' ' . esc_attr($attr['pg_featuredImageRightBorder']) . " " . esc_attr($attr['pg_featuredImageRightBorderColor']) . ";" : '';
        
    $css .= "}";
     
    //Title Tag
    $css .= "$wrapper $post {$attr['pg_blockTitleTag']}{";
        if (isset($attr['titlechoice']) && $attr['titlechoice'] === 'color') {
            // Apply color style if titlechoice is 'color'
            if (isset($attr['pg_TitleColor'])) {
                $css .= "color: " . esc_attr($attr['pg_TitleColor']) . ";";
            }
        } elseif (isset($attr['titlechoice']) && $attr['titlechoice'] === 'gradient') {
            // Apply gradient style if titlechoice is 'gradient'
            if (isset($attr['pg_TitleColor'])) {
                $css .= "background: " . esc_attr($attr['pg_TitleColor']) . " !important;";
                $css .= "-webkit-background-clip: text !important;";
                $css .= "-webkit-text-fill-color: transparent !important;";
                $css .= "background-clip: text !important;";
            }
        }

        $css .= isset($attr['pg_TitleSize']) ? "font-size: " . esc_attr($attr['pg_TitleSize']) . "px;" : '';
       
        $css .= isset($attr['pg_spacing']) ? "margin-block-start: " . esc_attr($attr['pg_spacing']) . "%;" : '';

        $css .= "margin-left: 5px;";
        $css .= isset($attr['pg_TitlelineHeight']) ? "line-height: " . esc_attr($attr['pg_TitlelineHeight']) . ";" : '';
        $css .= "margin-block-end: 0.07em;";
        $css .= "font-weight: 600;";

        // Ensure text wraps properly
        $css .= "overflow-wrap: break-word;"; // Break words if needed
        $css .= "word-break: break-word;"; // Break long words if necessary

    $css .= "}";
     
    //Title Tag
    $css .= "$wrapper $post {$attr['pg_blockTitleTag']} a{";

        if (isset($attr['titlechoice']) && $attr['titlechoice'] === 'color') {
            // Apply color style if titlechoice is 'color'
            if (isset($attr['pg_TitleColor'])) {
                $css .= "color: " . esc_attr($attr['pg_TitleColor']) . ";";
            }
        } elseif (isset($attr['titlechoice']) && $attr['titlechoice'] === 'gradient') {
            // Apply gradient style if titlechoice is 'gradient'
            if (isset($attr['pg_TitleColor'])) {
                $css .= "background: " . esc_attr($attr['pg_TitleColor']) . " !important;";
                $css .= "-webkit-background-clip: text !important;";
                $css .= "-webkit-text-fill-color: transparent !important;";
                $css .= "background-clip: text !important;";
            }
        }
    $css .= "}";

    //author-date-container
    $css .= "$wrapper $post .post-grid-author-date-container{";
        $css .= "    display: flex;";
        $css .= "    align-items: flex-start;";
        $css .= "    flex-wrap: wrap;";
        $css .= "    margin-left:2px;";
        $css .= isset($attr['pg_layoutalignment']) ? "justify-content: " . esc_attr($attr['pg_layoutalignment']) . ";" : '';

    $css .= "}";

    //author-date-container
    $css .= "$wrapper $post .post-grid-author-date-container .datecontainer{";
        $css .= "    display: flex;";
        $css .= "    align-items: center;";
        $css .= "    flex-wrap: wrap;";
    $css .= "}";

    //author-image
    $css .= "$wrapper $post .post-grid-author-date-container .post-grid-author-image {";
        $css .= "    width: 20px;";
        $css .= "    border-radius: 50%;";
        $css .= "transform: scale(" . esc_attr($attr['pg_authorImageScale']) . ");";
    $css .= "}";
      
    //author-span
    $css .= "$wrapper $post .post-grid-author-date-container .post-grid-author-span{";
        $css .= "    text-decoration: none;";
        $css .= "font-size: " . esc_attr($attr['pg_authorTextSize']) . "px;";
        $css .= "color: " . esc_attr($attr['pg_authorTextColor']) . ";";
        // Cursor
        $css .= "cursor: pointer;";
        $css .= "    margin-right: 10px;";
    $css .= "}";

    //date-image
    $css .= "$wrapper $post .post-grid-author-date-container .post-grid-date-image{";
        $css .= "transform: scale(" . esc_attr($attr['pg_dateImageScale']) . ");";
        $css .= "width: 20px;";
      
    $css .= "}";
        
    //date-span
    $css .= "$wrapper $post .post-grid-author-date-container .post-grid-date-span{";
        $css .= "font-size: " . esc_attr($attr['pg_dateTextSize']) . "px;";
        $css .= "color: " . esc_attr($attr['pg_dateColor']) . ";";
    $css .= "}";
        
    //content
    $css .= "$wrapper $post .post-grid-excerpt-view{";

        // Font Weight
        $css .= isset($attr['pg_ContentWeight']) ? "font-weight: " . esc_attr($attr['pg_ContentWeight']) . ";" : '';

        // Text Color
        $css .= isset($attr['pg_textColor']) ? "color: " . esc_attr($attr['pg_textColor']) . ";" : '';
        
        // Font Size
        $css .= isset($attr['pg_textSize']) ? "font-size: " . esc_attr($attr['pg_textSize']) . "px;" : '';
        
        // Line Height
        $css .= isset($attr['pg_lineHeight']) ? "line-height: " . esc_attr($attr['pg_lineHeight']) . ";" : '';
        
        // Margin Left
        $css .= "margin-left: 5px;";


        $css .= isset($attr['pg_layoutalignment']) ? "text-align: " . esc_attr($attr['pg_layoutalignment']) . ";" : '';
        
    $css .= "}";
        
    //pagination
    $css .= ".page-numbers-{$uniqueId} {";
        // Padding
        $paddingUnit = isset($attr['paginationpaddingUnit']) ? esc_attr($attr['paginationpaddingUnit']) : 'px';
        $css .= isset($attr['pg_PaginationpaddingTop']) ? "padding-top: " . esc_attr($attr['pg_PaginationpaddingTop']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_PaginationpaddingBottom']) ? "padding-bottom: " . esc_attr($attr['pg_PaginationpaddingBottom']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_PaginationpaddingLeft']) ? "padding-left: " . esc_attr($attr['pg_PaginationpaddingLeft']) . $paddingUnit . ";" : '';
        $css .= isset($attr['pg_PaginationpaddingRight']) ? "padding-right: " . esc_attr($attr['pg_PaginationpaddingRight']) . $paddingUnit . ";" : '';
        
        // Cursor
        $css .= "cursor: pointer;";
        
        // Font size
        $css .= isset($attr['pg_PaginationSize']) ? "font-size: " . esc_attr($attr['pg_PaginationSize']) . "px;" : '';
        
        // Color
        $css .= isset($attr['pg_PaginationColor']) ? "color: " . esc_attr($attr['pg_PaginationColor']) . ";" : '';
        // Background
        $css .= isset($attr['pg_PaginationbackgroundColor']) ? "background: " . esc_attr($attr['pg_PaginationbackgroundColor']) . ";" : '';
        
        // Margin
        $css .= "margin: 20px 5px;";
        $css .="text-decoration: none;";
        
        $borderRadiusUnit = isset($attr['pg_PaginationpaddingUnit']) ? esc_attr($attr['pg_PaginationpaddingUnit']) : 'px';

        // Border radius for pagination
        $css .= isset($attr['pg_paginationTopBorderRadius']) ? "border-top-left-radius: " . esc_attr($attr['pg_paginationTopBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_paginationBottomBorderRadius']) ? "border-bottom-left-radius: " . esc_attr($attr['pg_paginationBottomBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_paginationLeftBorderRadius']) ? "border-bottom-right-radius: " . esc_attr($attr['pg_paginationLeftBorderRadius']) . $borderRadiusUnit . ";" : '';
        $css .= isset($attr['pg_paginationRightBorderRadius']) ? "border-top-right-radius: " . esc_attr($attr['pg_paginationRightBorderRadius']) . $borderRadiusUnit . ";" : '';
        
        // Border
        $css .= isset($attr['PaginationTopborderType']) && isset($attr['pg_paginationTopBorder']) && isset($attr['pg_paginationTopBorderColor']) ? 
        "border-top: " . esc_attr($attr['PaginationTopborderType']) . ' ' . esc_attr($attr['pg_paginationTopBorder']) . " " . esc_attr($attr['pg_paginationTopBorderColor']) . ";" : '';
        $css .= isset($attr['PaginationBottomborderType']) && isset($attr['pg_paginationBottomBorder']) && isset($attr['pg_paginationBottomBorderColor']) ? 
        "border-bottom: " . esc_attr($attr['PaginationBottomborderType']) . ' ' . esc_attr($attr['pg_paginationBottomBorder']) . " " . esc_attr($attr['pg_paginationBottomBorderColor']) . ";" : '';
        $css .= isset($attr['PaginationLeftborderType']) && isset($attr['pg_paginationLeftBorder']) && isset($attr['pg_paginationLeftBorderColor']) ? 
        "border-left: " . esc_attr($attr['PaginationLeftborderType']) . ' ' . esc_attr($attr['pg_paginationLeftBorder']) . " " . esc_attr($attr['pg_paginationLeftBorderColor']) . ";" : '';
        $css .= isset($attr['PaginationRightborderType']) && isset($attr['pg_paginationRightBorder']) && isset($attr['pg_paginationRightBorderColor']) ? 
        "border-right: " . esc_attr($attr['PaginationRightborderType']) . ' ' . esc_attr($attr['pg_paginationRightBorder']) . " " . esc_attr($attr['pg_paginationRightBorderColor']) . ";" : '';

    $css .= "}"; 
        
    $css .= ".pagination{";  
        $css .= isset($attr['pg_Paginationalignment']) ? "text-align: " . esc_attr($attr['pg_Paginationalignment']) . ";" : '';
        $css .= "margin-top: 20px;";
        $css .= "margin-bottom: 30px;";
    $css .= "}"; 

    $css .= ".pagination a{";  
        $css .= "text-decoration: none;";
    $css .= "}"; 
     
    $css .= ".page-numbers.current span{";  
        $css .= isset($attr['pg_PaginationactiveColor']) ? "color: " . esc_attr($attr['pg_PaginationactiveColor']) . ";" : '';
        $css .= "trasform: scale(1.1);";
        $css .= "font-weight: bold;";
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

    // Start building the CSS string for hover styles
    $css .= "$wrapper $post {$attr['pg_blockTitleTag']} a:hover {";

        // Check if `titlechoicehvr` is set and apply styles accordingly
        if (isset($attr['titlechoicehvr']) && $attr['titlechoicehvr'] === 'color') {
            // Apply color style if titlechoicehvr is 'color'
            if (isset($attr['pg_TitleColorhvr'])) {
                $css .= "color: " . esc_attr($attr['pg_TitleColorhvr']) . " !important;";
            }
        } elseif (isset($attr['titlechoicehvr']) && $attr['titlechoicehvr'] === 'gradient') {
            // Apply gradient style if titlechoicehvr is 'gradient'
            if (isset($attr['pg_TitleColorhvr'])) {
                $css .= "background: " . esc_attr($attr['pg_TitleColorhvr']) . " !important;";
                $css .= "-webkit-background-clip: text !important;";
                $css .= "-webkit-text-fill-color: transparent !important;";
                $css .= "background-clip: text !important;";
            }
        }
        
    // Close the CSS rule
    $css .= "}";

    $css .= ".page-numbers:hover {";
        $css .= "color:" . $attr['pg_PaginationactiveColor'] . ";";
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
    
        $wrapper $post {
            width: " . (isset($attr['layoutcustomWidthTablet']) ? esc_attr($attr['layoutcustomWidthTablet']) . esc_attr($attr['layoutcustomWidthUnit']) : '') . ";
            padding-top: " . (isset($attr['pg_layoutpaddingTopTablet']) ? esc_attr($attr['pg_layoutpaddingTopTablet']) . esc_attr($attr['pg_layoutpaddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['pg_layoutpaddingBottomTablet']) ? esc_attr($attr['pg_layoutpaddingBottomTablet']) . esc_attr($attr['pg_layoutpaddingUnit']) : '') . ";
            padding-left: " . (isset($attr['pg_layoutpaddingLeftTablet']) ? esc_attr($attr['pg_layoutpaddingLeftTablet']) . esc_attr($attr['pg_layoutpaddingUnit']) : '') . ";
            padding-right: " . (isset($attr['pg_layoutpaddingRightTablet']) ? esc_attr($attr['pg_layoutpaddingRightTablet']) . esc_attr($attr['pg_layoutpaddingUnit']) : '') . ";
            border-top-left-radius: " . (isset($attr['pg_layoutTopBorderRadiusTablet']) ? esc_attr($attr['pg_layoutTopBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_layoutBottomBorderRadiusTablet']) ? esc_attr($attr['pg_layoutBottomBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_layoutRightBorderRadiusTablet']) ? esc_attr($attr['pg_layoutRightBorderRadiusTablet']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_layoutLeftBorderRadiusTablet']) ? esc_attr($attr['pg_layoutLeftBorderRadiusTablet']) . "px" : '') . ";

        }   

        $wrapper $post .post-grid-image{
            border-top-left-radius: " . (isset($attr['pg_featuredImageTopBorderRadiusTablet']) ? esc_attr($attr['pg_featuredImageTopBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_featuredImageBottomBorderRadiusTablet']) ? esc_attr($attr['pg_featuredImageBottomBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_featuredImageRightBorderRadiusTablet']) ? esc_attr($attr['pg_featuredImageRightBorderRadiusTablet']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_featuredImageLeftBorderRadiusTablet']) ? esc_attr($attr['pg_featuredImageLeftBorderRadiusTablet']) . "px" : '') . ";

        }

        $wrapper $post .post-grid-category-style-new {
            padding-top: " . (isset($attr['pg_CategorypaddingTopTablet']) ? esc_attr($attr['pg_CategorypaddingTopTablet']) . esc_attr($attr['categorypaddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['pg_CategorypaddingBottomTablet']) ? esc_attr($attr['pg_CategorypaddingBottomTablet']) . esc_attr($attr['categorypaddingUnit']) : '') . ";
            padding-left: " . (isset($attr['pg_CategorypaddingLeftTablet']) ? esc_attr($attr['pg_CategorypaddingLeftTablet']) . esc_attr($attr['categorypaddingUnit']) : '') . ";
            padding-right: " . (isset($attr['pg_CategorypaddingRightTablet']) ? esc_attr($attr['pg_CategorypaddingRightTablet']) . esc_attr($attr['categorypaddingUnit']) : '') . ";
            border-top-left-radius: " . (isset($attr['pg_categoryTopBorderRadiusTablet']) ? esc_attr($attr['pg_categoryTopBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_categoryBottomBorderRadiusTablet']) ? esc_attr($attr['pg_categoryBottomBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_categoryRightBorderRadiusTablet']) ? esc_attr($attr['pg_categoryRightBorderRadiusTablet']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_categoryLeftBorderRadiusTablet']) ? esc_attr($attr['pg_categoryLeftBorderRadiusTablet']) . "px" : '') . ";

       
        }

        $wrapper $post .post-grid-tag-style-new {
            padding-top: " . (isset($attr['pg_TagpaddingTopTablet']) ? esc_attr($attr['pg_TagpaddingTopTablet']) . esc_attr($attr['tagpaddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['pg_TagpaddingBottomTablet']) ? esc_attr($attr['pg_TagpaddingBottomTablet']) . esc_attr($attr['tagpaddingUnit']) : '') . ";
            padding-left: " . (isset($attr['pg_TagpaddingLeftTablet']) ? esc_attr($attr['pg_TagpaddingLeftTablet']) . esc_attr($attr['tagpaddingUnit']) : '') . ";
            padding-right: " . (isset($attr['pg_TagpaddingRightTablet']) ? esc_attr($attr['pg_TagpaddingRightTablet']) . esc_attr($attr['tagpaddingUnit']) : '') . ";
            border-top-left-radius: " . (isset($attr['pg_tagsTopBorderRadiusTablet']) ? esc_attr($attr['pg_tagsTopBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_tagsBottomBorderRadiusTablet']) ? esc_attr($attr['pg_tagsBottomBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_tagsRightBorderRadiusTablet']) ? esc_attr($attr['pg_tagsRightBorderRadiusTablet']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_tagsLeftBorderRadiusTablet']) ? esc_attr($attr['pg_tagsLeftBorderRadiusTablet']) . "px" : '') . ";

        }

        .page-numbers-{$uniqueId} {
            padding-top: " . (isset($attr['pg_PaginationpaddingTopTablet']) ? esc_attr($attr['pg_PaginationpaddingTopTablet']) . esc_attr($attr['pg_PaginationpaddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['pg_PaginationpaddingBottomTablet']) ? esc_attr($attr['pg_PaginationpaddingBottomTablet']) . esc_attr($attr['pg_PaginationpaddingUnit']) : '') . ";
            padding-left: " . (isset($attr['pg_PaginationpaddingLeftTablet']) ? esc_attr($attr['pg_PaginationpaddingLeftTablet']) . esc_attr($attr['pg_PaginationpaddingUnit']) : '') . ";
            padding-right: " . (isset($attr['pg_PaginationpaddingRightTablet']) ? esc_attr($attr['pg_PaginationpaddingRightTablet']) . esc_attr($attr['pg_PaginationpaddingUnit']) : '') . ";
            

            border-top-left-radius: " . (isset($attr['pg_paginationTopBorderRadiusTablet']) ? esc_attr($attr['pg_paginationTopBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_paginationBottomBorderRadiusTablet']) ? esc_attr($attr['pg_paginationBottomBorderRadiusTablet']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_paginationLeftBorderRadiusTablet']) ? esc_attr($attr['pg_paginationLeftBorderRadiusTablet']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_paginationRightBorderRadiusTablet']) ? esc_attr($attr['pg_paginationRightBorderRadiusTablet']) . "px" : '') . ";
        }
        

    }";
    
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
    
        $wrapper $post {
            width: " . (isset($attr['layoutcustomWidthMobile']) ? esc_attr($attr['layoutcustomWidthMobile']) . esc_attr($attr['layoutcustomWidthUnit']) : '') . ";
            padding-top: " . (isset($attr['pg_layoutpaddingTopMobile']) ? esc_attr($attr['pg_layoutpaddingTopMobile']) . (isset($attr['pg_layoutpaddingUnit']) ? esc_attr($attr['pg_layoutpaddingUnit']) : 'px') : '') . ";
            padding-bottom: " . (isset($attr['pg_layoutpaddingBottomMobile']) ? esc_attr($attr['pg_layoutpaddingBottomMobile']) . (isset($attr['pg_layoutpaddingUnit']) ? esc_attr($attr['pg_layoutpaddingUnit']) : 'px') : '') . ";
            padding-left: " . (isset($attr['pg_layoutpaddingLeftMobile']) ? esc_attr($attr['pg_layoutpaddingLeftMobile']) . (isset($attr['pg_layoutpaddingUnit']) ? esc_attr($attr['pg_layoutpaddingUnit']) : 'px') : '') . ";
            padding-right: " . (isset($attr['pg_layoutpaddingRightMobile']) ? esc_attr($attr['pg_layoutpaddingRightMobile']) . (isset($attr['pg_layoutpaddingUnit']) ? esc_attr($attr['pg_layoutpaddingUnit']) : 'px') : '') . ";
            border-top-left-radius: " . (isset($attr['pg_layoutTopBorderRadiusMobile']) ? esc_attr($attr['pg_layoutTopBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_layoutBottomBorderRadiusMobile']) ? esc_attr($attr['pg_layoutBottomBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_layoutRightBorderRadiusMobile']) ? esc_attr($attr['pg_layoutRightBorderRadiusMobile']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_layoutLeftBorderRadiusMobile']) ? esc_attr($attr['pg_layoutLeftBorderRadiusMobile']) . "px" : '') . ";

        }
    
        $wrapper $post .post-grid-image{
            border-top-left-radius: " . (isset($attr['pg_featuredImageTopBorderRadiusMobile']) ? esc_attr($attr['pg_featuredImageTopBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_featuredImageBottomBorderRadiusMobile']) ? esc_attr($attr['pg_featuredImageBottomBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_featuredImageRightBorderRadiusMobile']) ? esc_attr($attr['pg_featuredImageRightBorderRadiusMobile']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_featuredImageLeftBorderRadiusMobile']) ? esc_attr($attr['pg_featuredImageLeftBorderRadiusMobile']) . "px" : '') . ";

        }
    
        $wrapper $post .post-grid-category-style-new {
            padding-top: " . (isset($attr['pg_CategorypaddingTopMobile']) ? esc_attr($attr['pg_CategorypaddingTopMobile']) . esc_attr($attr['categorypaddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['pg_CategorypaddingBottomMobile']) ? esc_attr($attr['pg_CategorypaddingBottomMobile']) . esc_attr($attr['categorypaddingUnit']) : '') . ";
            padding-left: " . (isset($attr['pg_CategorypaddingLeftMobile']) ? esc_attr($attr['pg_CategorypaddingLeftMobile']) . esc_attr($attr['categorypaddingUnit']) : '') . ";
            padding-right: " . (isset($attr['pg_CategorypaddingRightMobile']) ? esc_attr($attr['pg_CategorypaddingRightMobile']) . esc_attr($attr['categorypaddingUnit']) : '') . ";
            border-top-left-radius: " . (isset($attr['pg_categoryTopBorderRadiusMobile']) ? esc_attr($attr['pg_categoryTopBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_categoryBottomBorderRadiusMobile']) ? esc_attr($attr['pg_categoryBottomBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_categoryRightBorderRadiusMobile']) ? esc_attr($attr['pg_categoryRightBorderRadiusMobile']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_categoryLeftBorderRadiusMobile']) ? esc_attr($attr['pg_categoryLeftBorderRadiusMobile']) . "px" : '') . ";
        }
    
        $wrapper $post .post-grid-tag-style-new {
            padding-top: " . (isset($attr['pg_TagpaddingTopMobile']) ? esc_attr($attr['pg_TagpaddingTopMobile']) . esc_attr($attr['tagpaddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['pg_TagpaddingBottomMobile']) ? esc_attr($attr['pg_TagpaddingBottomMobile']) . esc_attr($attr['tagpaddingUnit']) : '') . ";
            padding-left: " . (isset($attr['pg_TagpaddingLeftMobile']) ? esc_attr($attr['pg_TagpaddingLeftMobile']) . esc_attr($attr['tagpaddingUnit']) : '') . ";
            padding-right: " . (isset($attr['pg_TagpaddingRightMobile']) ? esc_attr($attr['pg_TagpaddingRightMobile']) . esc_attr($attr['tagpaddingUnit']) : '') . ";
            border-top-left-radius: " . (isset($attr['pg_tagsTopBorderRadiusMobile']) ? esc_attr($attr['pg_tagsTopBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_tagsBottomBorderRadiusMobile']) ? esc_attr($attr['pg_tagsBottomBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_tagsRightBorderRadiusMobile']) ? esc_attr($attr['pg_tagsRightBorderRadiusMobile']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_tagsLeftBorderRadiusMobile']) ? esc_attr($attr['pg_tagsLeftBorderRadiusMobile']) . "px" : '') . ";
        }

        .page-numbers-{$uniqueId} {
            padding-top: " . (isset($attr['pg_PaginationpaddingTopMobile']) ? esc_attr($attr['pg_PaginationpaddingTopMobile']) . esc_attr($attr['pg_PaginationpaddingUnit']) : '') . ";
            padding-bottom: " . (isset($attr['pg_PaginationpaddingBottomMobile']) ? esc_attr($attr['pg_PaginationpaddingBottomMobile']) . esc_attr($attr['pg_PaginationpaddingUnit']) : '') . ";
            padding-left: " . (isset($attr['pg_PaginationpaddingLeftMobile']) ? esc_attr($attr['pg_PaginationpaddingLeftMobile']) . esc_attr($attr['pg_PaginationpaddingUnit']) : '') . ";
            padding-right: " . (isset($attr['pg_PaginationpaddingRightMobile']) ? esc_attr($attr['pg_PaginationpaddingRightMobile']) . esc_attr($attr['pg_PaginationpaddingUnit']) : '') . ";
            border-top-left-radius: " . (isset($attr['pg_paginationTopBorderRadiusMobile']) ? esc_attr($attr['pg_paginationTopBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-left-radius: " . (isset($attr['pg_paginationBottomBorderRadiusMobile']) ? esc_attr($attr['pg_paginationBottomBorderRadiusMobile']) . "px" : '') . ";
            border-bottom-right-radius: " . (isset($attr['pg_paginationLeftBorderRadiusMobile']) ? esc_attr($attr['pg_paginationLeftBorderRadiusMobile']) . "px" : '') . ";
            border-top-right-radius: " . (isset($attr['pg_paginationRightBorderRadiusMobile']) ? esc_attr($attr['pg_paginationRightBorderRadiusMobile']) . "px" : '') . ";
        }

    }";
        
    return $css;
}
