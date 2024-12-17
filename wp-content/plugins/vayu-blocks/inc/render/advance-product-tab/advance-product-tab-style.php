<?php 

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_advance_product_tab_style($attr){ 

	$css = '';

    if(isset( $attr['uniqueID'] )){

        if (isset($attr['productCol'])) {

        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-item-wrap{";
            
        $css .= "grid-template-columns:repeat({$attr['productCol']},1fr)";

        $css .= "}";

        }

        //tab

        $showTab = isset($attr['showTab']) ? $attr['showTab'] : true;
        if($showTab):
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-cat-filter ul.category-tabs{";
        $css .= isset( $attr['tabAlign'] ) ? "justify-content:{$attr['tabAlign'] };" : 'justify-content:center;';
        $css .= "}";

        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-cat-filter ul.category-tabs li{";
        $css .= isset( $attr['tabColor'] ) ? "color:{$attr['tabColor'] };" : 'color:#111;';
        $css .= isset( $attr['tabBgColor'] ) ? "background:{$attr['tabBgColor'] };" : 'background:transparent;';
        $css .= isset( $attr['tabborderType'] ) ? "border-style:{$attr['tabborderType'] };" : '';
        $css .= isset( $attr['tabBorderColor'] ) ? "border-color:{$attr['tabBorderColor'] };" : '';
        //tabborder-width
		if (isset($attr['tabBorderWidthType']) && 'unlinked' === $attr['tabBorderWidthType']) {
			$tabBorderWidthUnit = isset($attr['tabBorderWidthUnit']) ? $attr['tabBorderWidthUnit'] : 'px';
			$tabBorderWidthTop = isset($attr['tabBorderWidthTop']) ? $attr['tabBorderWidthTop'] : 0;
			$tabBorderWidthRight = isset($attr['tabBorderWidthRight']) ? $attr['tabBorderWidthRight'] : 0;
			$tabBorderWidthBottom = isset($attr['tabBorderWidthBottom']) ? $attr['tabBorderWidthBottom'] : 0;
			$tabBorderWidthLeft = isset($attr['tabBorderWidthLeft']) ? $attr['tabBorderWidthLeft'] : 0;
			$css .= "border-top-width: {$tabBorderWidthTop}{$tabBorderWidthUnit}; 
			border-right-width: {$tabBorderWidthRight}{$tabBorderWidthUnit}; 
			border-bottom-width: {$tabBorderWidthBottom}{$tabBorderWidthUnit}; 
			border-left-width: {$tabBorderWidthLeft}{$tabBorderWidthUnit}; 
		   ";
		} else {
			$tabBorderWidth = isset($attr['tabBorderWidth']) ? $attr['tabBorderWidth'] : 0;
			$tabBorderWidthUnit = isset($attr['tabBorderWidthUnit']) ? $attr['tabBorderWidthUnit'] : 'px';
			$css .= "border-width: {$tabBorderWidth}{$tabBorderWidthUnit}; ";
		}
        
        //tabBorder-radius
		if (isset($attr['tabBorderRadiusType']) && 'unlinked' === $attr['tabBorderRadiusType']) {
			$tabBorderRadiusUnit = isset($attr['tabBorderRadiusUnit']) ? $attr['tabBorderRadiusUnit'] : 'px';
			$tabBorderRadiusTop = isset($attr['tabBorderRadiusTop']) ? $attr['tabBorderRadiusTop'] : 0;
			$tabBorderRadiusRight = isset($attr['tabBorderRadiusRight']) ? $attr['tabBorderRadiusRight'] : 0;
			$tabBorderRadiusBottom = isset($attr['tabBorderRadiusBottom']) ? $attr['tabBorderRadiusBottom'] : 0;
			$tabBorderRadiusLeft = isset($attr['tabBorderRadiusLeft']) ? $attr['tabBorderRadiusLeft'] : 0;
			$css .= "border-top-right-radius: {$tabBorderRadiusTop}{$tabBorderRadiusUnit}; 
            border-top-left-radius: {$tabBorderRadiusRight}{$tabBorderRadiusUnit};
            border-bottom-right-radius: {$tabBorderRadiusBottom}{$tabBorderRadiusUnit};
            border-bottom-left-radius: {$tabBorderRadiusLeft}{$tabBorderRadiusUnit};
			 ";
		} else {
			$tabBorderRadius = isset($attr['tabBorderRadius']) ? $attr['tabBorderRadius'] : 0;
			$tabBorderRadiusUnit = isset($attr['tabBorderRadiusUnit']) ? $attr['tabBorderRadiusUnit'] : 'px';
			$css .= "border-radius: {$tabBorderRadius}{$tabBorderRadiusUnit};";
		}

        //tabPadding
		if (isset($attr['tabPaddingType']) && 'unlinked' === $attr['tabPaddingType']) {
			$tabPaddingUnit = isset($attr['tabPaddingUnit']) ? $attr['tabPaddingUnit'] : 'px';
			$tabPaddingTop = isset($attr['tabPaddingTop']) ? $attr['tabPaddingTop'] : 0;
			$tabPaddingRight = isset($attr['tabPaddingRight']) ? $attr['tabPaddingRight'] : 0;
			$tabPaddingBottom = isset($attr['tabPaddingBottom']) ? $attr['tabPaddingBottom'] : 0;
			$tabPaddingLeft = isset($attr['tabPaddingLeft']) ? $attr['tabPaddingLeft'] : 0;
			$css .= "padding-top: {$tabPaddingTop}{$tabPaddingUnit}; 
			padding-right: {$tabPaddingRight}{$tabPaddingUnit}; 
			padding-bottom: {$tabPaddingBottom}{$tabPaddingUnit}; 
			padding-left: {$tabPaddingLeft}{$tabPaddingUnit}; 
		    ";
		} else {
			$tabPadding = isset($attr['tabPadding']) ? $attr['tabPadding'] : 10;
			$tabPaddingUnit = isset($attr['tabPaddingUnit']) ? $attr['tabPaddingUnit'] : 'px';
			$css .= "padding: {$tabPadding}{$tabPaddingUnit};";
		}

        //tabMargin
		if (isset($attr['tabMarginType']) && 'unlinked' === $attr['tabMarginType']) {
			$tabMarginUnit = isset($attr['tabMarginUnit']) ? $attr['tabMarginUnit'] : 'px';
			$tabMarginTop = isset($attr['tabMarginTop']) ? $attr['tabMarginTop'] : 8;
			$tabMarginBottom = isset($attr['tabMarginBottom']) ? $attr['tabMarginBottom'] : 8;
            $tabMarginLeft = isset($attr['tabMarginLeft']) ? $attr['tabMarginLeft'] : 8;
            $tabMarginRight = isset($attr['tabMarginRight']) ? $attr['tabMarginRight'] : 8;
			$css .= "
            margin-top: {$tabMarginTop}{$tabMarginUnit}; 
			margin-bottom: {$tabMarginBottom}{$tabMarginUnit}; 
			margin-left: {$tabMarginLeft}{$tabMarginUnit}; 
			margin-right: {$tabMarginRight}{$tabMarginUnit}; 
		    ";
		} else {
			$tabMargin = isset($attr['tabMargin']) ? $attr['tabMargin'] : 8;
			$tabMarginUnit = isset($attr['tabMarginUnit']) ? $attr['tabMarginUnit'] : 'px';
			$css .= " margin: {$tabMargin}{$tabMarginUnit}; 
		   ";
		}

        // tab typography
        
        $css .= "font-family: " . (isset($attr['tabfontFamily']) ? $attr['tabfontFamily'] : 'inherit') . ';';
        $css .= "font-weight: " . (isset($attr['tabfontVariant']) ? $attr['tabfontVariant'] : 'inherit') . ';';
        $css .= "font-style: " . (isset($attr['tabfontStyle']) ? $attr['tabfontStyle'] : 'normal') . ';';
        $css .= "text-transform: " . (isset($attr['tabtextTransform']) ? $attr['tabtextTransform'] : 'none') . ';';

        // Font Size
		if (isset($attr['tabfontSize'])) {
			$tabfontSizeUnit = isset($attr['tabfontSizeUnit']) ? $attr['tabfontSizeUnit'] : 'px';
			$css .= "font-size: {$attr['tabfontSize']}{$tabfontSizeUnit}; ";
		}
		// Line Height
		if (isset($attr['tablineHeight'])) {
			$tablineHeightUnit = isset($attr['tablineHeightUnit']) ? $attr['tablineHeightUnit'] : 'px';
			$css .= "line-height: {$attr['tablineHeight']}{$tablineHeightUnit}; ";
		}
		// Letter Spacing
		if (isset($attr['tabletterSpacing'])) {
			$tabletterSpacingUnit = isset($attr['tabletterSpacingUnit']) ? $attr['tabletterSpacingUnit'] : 'px';
			$css .= "letter-spacing: {$attr['tabletterSpacing']}{$tabletterSpacingUnit}; ";
		}

        
        $css .= "}";

        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-cat-filter ul.category-tabs li:hover,.wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-cat-filter ul.category-tabs li.active{";
        $css .= isset( $attr['tabColorHvr'] ) ? "color:{$attr['tabColorHvr'] };" : 'color:#111;';
        $css .= isset( $attr['tabBgColorHvr'] ) ? "background:{$attr['tabBgColorHvr'] };" : 'background:transparent;';
        $css .= isset( $attr['tabBorderColorHvr'] ) ? "border-color:{$attr['tabBorderColorHvr'] };" : '';
        $css .= "}";
        endif;

        //product box
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-item{";
        $css .= isset( $attr['productAlign'] ) ? "text-align:{$attr['productAlign'] };" : 'text-align:center;';
        $css .= "}";
        
        // product-box-padding
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-item .th-product-block-content-wrap{";
        if (isset($attr['productPaddingType']) && 'unlinked' === $attr['productPaddingType']) {
			$productPaddingUnit = isset($attr['productPaddingUnit']) ? $attr['productPaddingUnit'] : 'px';
			$productPaddingTop = isset($attr['productPaddingTop']) ? $attr['productPaddingTop'] : 0;
			$productPaddingRight = isset($attr['productPaddingRight']) ? $attr['productPaddingRight'] : 0;
			$productPaddingBottom = isset($attr['productPaddingBottom']) ? $attr['productPaddingBottom'] : 0;
			$productPaddingLeft = isset($attr['productPaddingLeft']) ? $attr['productPaddingLeft'] : 0;
			$css .= "padding-top: {$productPaddingTop}{$productPaddingUnit}; 
			padding-right: {$productPaddingRight}{$productPaddingUnit}; 
			padding-bottom: {$productPaddingBottom}{$productPaddingUnit}; 
			padding-left: {$productPaddingLeft}{$productPaddingUnit}; 
		    ";
		} else {
			$productPadding = isset($attr['productPadding']) ? $attr['productPadding'] : 10;
			$productPaddingUnit = isset($attr['productPaddingUnit']) ? $attr['productPaddingUnit'] : 'px';
			$css .= "padding: {$productPadding}{$productPaddingUnit};";
		}
         // product-box-border-radius
        if (isset($attr['productBrdrRadiusType']) && 'unlinked' === $attr['productBrdrRadiusType']) {
			$productBrdrRadiusUnit = isset($attr['productBrdrRadiusUnit']) ? $attr['productBrdrRadiusUnit'] : 'px';
			$productBrdrRadiusTop = isset($attr['productBrdrRadiusTop']) ? $attr['productBrdrRadiusTop'] : 0;
			$productBrdrRadiusRight = isset($attr['productBrdrRadiusRight']) ? $attr['productBrdrRadiusRight'] : 0;
			$productBrdrRadiusBottom = isset($attr['productBrdrRadiusBottom']) ? $attr['productBrdrRadiusBottom'] : 0;
			$productBrdrRadiusLeft = isset($attr['productBrdrRadiusLeft']) ? $attr['productBrdrRadiusLeft'] : 0;
			$css .= "border-top-right-radius: {$productBrdrRadiusTop}{$productBrdrRadiusUnit}; 
            border-top-left-radius: {$productBrdrRadiusRight}{$productBrdrRadiusUnit};
            border-bottom-right-radius: {$productBrdrRadiusBottom}{$productBrdrRadiusUnit};
            border-bottom-left-radius: {$productBrdrRadiusLeft}{$productBrdrRadiusUnit};
			 ";
		} else {
			$productBrdrRadius = isset($attr['productBrdrRadius']) ? $attr['productBrdrRadius'] : 0;
			$productBrdrRadiusUnit = isset($attr['productBrdrRadiusUnit']) ? $attr['productBrdrRadiusUnit'] : 'px';
			$css .= "border-radius: {$productBrdrRadius}{$productBrdrRadiusUnit};";
		}

        //bg color
        $css .= isset( $attr['productboxClr'] ) ? "background:{$attr['productboxClr'] };" : '';
        
        //box shadow

        if (isset($attr['boxShadow'])){
			$css .= "box-shadow: ". (isset($attr['boxShadowHorizontal']) ? $attr['boxShadowHorizontal'] : '0') ."px  ". (isset($attr['boxShadowVertical']) ? $attr['boxShadowVertical'] : '0') ."px ". (isset($attr['boxShadowBlur']) ? $attr['boxShadowBlur'] : '5') ."px ". (isset($attr['boxShadowSpread']) ? $attr['boxShadowSpread'] : '1') ."px  ". vayu_hex2rgba((isset($attr['boxShadowColor']) ? $attr['boxShadowColor'] : '#fff'), (isset($attr['boxShadowColorOpacity']) ? $attr['boxShadowColorOpacity'] : '50') ) .";";
		}

        $css .= "}";

        //gap
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-block-product-item-wrap{";
        $elementGap = isset($attr['elementGap']) ? $attr['elementGap'] : 20;
        $elementGapUnit = isset($attr['elementGapUnit']) ? $attr['elementGapUnit'] : 'px';
        $css .= "grid-row-gap: {$elementGap}{$elementGapUnit};";
        $css .= "grid-column-gap: {$elementGap}{$elementGapUnit};";
        $css .= "}";

        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-item .th-product-block-content-wrap:hover{";
        $css .= isset( $attr['productboxHvrClr'] ) ? "background:{$attr['productboxHvrClr'] };" : '';
        $css .= "}"; 
        
        if(isset( $attr['catTxtColor'] )):
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-cat a{";
        $css .= "color:{$attr['catTxtColor']}";
        $css .= "}";
        endif;

        if(isset( $attr['catTxtColorHvr'] )):
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-cat a:hover{";
        $css .= "color:{$attr['catTxtColorHvr']}";
        $css .= "}";
        endif;

        if(isset( $attr['productTitleColor'] )):
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-title a{";
            $css .= "color:{$attr['productTitleColor']}";
            $css .= "}";
            endif;
    
            if(isset( $attr['productTitleColorHvr'] )):
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-title a:hover{";
            $css .= "color:{$attr['productTitleColorHvr']}";
            $css .= "}";
            endif;

            if(isset( $attr['priceColor'] )):
                $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-item .th-product-price span{";
                $css .= "color:{$attr['priceColor']}";
                $css .= "}";
                endif;
        
            if(isset( $attr['priceDelColor'] )):
                $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-price del,.wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-price del span{";
                $css .= "color:{$attr['priceDelColor']}";
                $css .= "}";
                endif;

        //rating

        if(isset( $attr['ratingColor'] )):
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-rating.woocommerce .star-rating{";
            $css .= "color:{$attr['ratingColor']}";
            $css .= "}";
            endif;

        //button

        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-add-btn a{";
        $css .= isset( $attr['buttonTxtClr'] ) ? "color:{$attr['buttonTxtClr'] };" : 'color:#fff;';
        $css .= isset( $attr['buttonBgClr'] ) ? "background:{$attr['buttonBgClr'] };" : '';
        $css .= isset( $attr['buttonBrdrClr'] ) ? "border-color:{$attr['buttonBrdrClr'] };" : '';
        $css .= isset( $attr['buttonBrdrType'] ) ? "border-style:{$attr['buttonBrdrType'] };" : '';
        
          //border-width
		if (isset($attr['buttonborderWidthType']) && 'unlinked' === $attr['buttonborderWidthType']) {
			$buttonborderWidthUnit = isset($attr['buttonborderWidthUnit']) ? $attr['buttonborderWidthUnit'] : 'px';
			$buttonborderWidthTop = isset($attr['buttonborderWidthTop']) ? $attr['buttonborderWidthTop'] : 0;
			$buttonborderWidthRight = isset($attr['buttonborderWidthRight']) ? $attr['buttonborderWidthRight'] : 0;
			$buttonborderWidthBottom = isset($attr['buttonborderWidthBottom']) ? $attr['buttonborderWidthBottom'] : 0;
			$buttonborderWidthLeft = isset($attr['buttonborderWidthLeft']) ? $attr['buttonborderWidthLeft'] : 0;
			$css .= "border-top-width: {$buttonborderWidthTop}{$buttonborderWidthUnit}; 
			border-right-width: {$buttonborderWidthRight}{$buttonborderWidthUnit}; 
			border-bottom-width: {$buttonborderWidthBottom}{$buttonborderWidthUnit}; 
			border-left-width: {$buttonborderWidthLeft}{$buttonborderWidthUnit}; 
		   ";
		} else {
			$buttonborderWidth = isset($attr['buttonborderWidth']) ? $attr['buttonborderWidth'] : 0;
			$buttonborderWidthUnit = isset($attr['buttonborderWidthUnit']) ? $attr['buttonborderWidthUnit'] : 'px';
			$css .= "border-width: {$buttonborderWidth}{$buttonborderWidthUnit}; ";
		}
        
        //Border-radius
		if (isset($attr['buttonBrdrRadiusType']) && 'unlinked' === $attr['buttonBrdrRadiusType']) {
			$buttonBrdrRadiusUnit = isset($attr['buttonBrdrRadiusUnit']) ? $attr['buttonBrdrRadiusUnit'] : 'px';
			$buttonBrdrRadiusTop = isset($attr['buttonBrdrRadiusTop']) ? $attr['buttonBrdrRadiusTop'] : 20;
			$buttonBrdrRadiusRight = isset($attr['buttonBrdrRadiusRight']) ? $attr['buttonBrdrRadiusRight'] : 20;
			$buttonBrdrRadiusBottom = isset($attr['buttonBrdrRadiusBottom']) ? $attr['buttonBrdrRadiusBottom'] : 20;
			$buttonBrdrRadiusLeft = isset($attr['buttonBrdrRadiusLeft']) ? $attr['buttonBrdrRadiusLeft'] : 20;
			$css .= "border-top-right-radius: {$buttonBrdrRadiusTop}{$buttonBrdrRadiusUnit}; 
            border-top-left-radius: {$buttonBrdrRadiusRight}{$buttonBrdrRadiusUnit};
            border-bottom-right-radius: {$buttonBrdrRadiusBottom}{$buttonBrdrRadiusUnit};
            border-bottom-left-radius: {$buttonBrdrRadiusLeft}{$buttonBrdrRadiusUnit};
			 ";
		} else {
			$buttonBrdrRadius = isset($attr['buttonBrdrRadius']) ? $attr['buttonBrdrRadius'] : 0;
			$buttonBrdrRadiusUnit = isset($attr['buttonBrdrRadiusUnit']) ? $attr['buttonBrdrRadiusUnit'] : 'px';
			$css .= "border-radius: {$buttonBrdrRadius}{$buttonBrdrRadiusUnit};";
		}
        $css .= "}";

        // product-box-padding
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-item .th-product-block-content-wrap{";
            if (isset($attr['productPaddingType']) && 'unlinked' === $attr['productPaddingType']) {
                $productPaddingUnit = isset($attr['productPaddingUnit']) ? $attr['productPaddingUnit'] : 'px';
                $productPaddingTop = isset($attr['productPaddingTop']) ? $attr['productPaddingTop'] : 0;
                $productPaddingRight = isset($attr['productPaddingRight']) ? $attr['productPaddingRight'] : 0;
                $productPaddingBottom = isset($attr['productPaddingBottom']) ? $attr['productPaddingBottom'] : 0;
                $productPaddingLeft = isset($attr['productPaddingLeft']) ? $attr['productPaddingLeft'] : 0;
                $css .= "padding-top: {$productPaddingTop}{$productPaddingUnit}; 
                padding-right: {$productPaddingRight}{$productPaddingUnit}; 
                padding-bottom: {$productPaddingBottom}{$productPaddingUnit}; 
                padding-left: {$productPaddingLeft}{$productPaddingUnit}; 
                ";
            } else {
                $productPadding = isset($attr['productPadding']) ? $attr['productPadding'] : 10;
                $productPaddingUnit = isset($attr['productPaddingUnit']) ? $attr['productPaddingUnit'] : 'px';
                $css .= "padding: {$productPadding}{$productPaddingUnit};";
            }
        
        $css .= "}";

        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-add-btn a:hover{";
        $css .= isset( $attr['buttonTxtClrHvr'] ) ? "color:{$attr['buttonTxtClrHvr'] };" : '';
        $css .= isset( $attr['buttonBgClrHvr'] ) ? "background:{$attr['buttonBgClrHvr'] };" : '';
        $css .= isset( $attr['buttonBrdrClrHvr'] ) ? "border-color:{$attr['buttonBrdrClrHvr'] };" : '';
        $css .= "}";

        //padding
         $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-wrapper{";
            if (isset($attr['paddingType']) && 'unlinked' === $attr['paddingType']) {
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $paddingTop = isset($attr['paddingTop']) ? $attr['paddingTop'] : 0;
                $paddingRight = isset($attr['paddingRight']) ? $attr['paddingRight'] : 0;
                $paddingBottom = isset($attr['paddingBottom']) ? $attr['paddingBottom'] : 0;
                $paddingLeft = isset($attr['paddingLeft']) ? $attr['paddingLeft'] : 0;
                $css .= "padding-top: {$paddingTop}{$paddingUnit}; 
                padding-right: {$paddingRight}{$paddingUnit}; 
                padding-bottom: {$paddingBottom}{$paddingUnit}; 
                padding-left: {$paddingLeft}{$paddingUnit}; 
                ";
            } else {
                $padding = isset($attr['padding']) ? $attr['padding'] : 10;
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $css .= "padding: {$padding}{$paddingUnit};";
            }
         $css .= "}";

         //margin
         $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-wrapper{";
            if (isset($attr['marginType']) && 'unlinked' === $attr['marginType']) {
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $marginTop = isset($attr['marginTop']) ? $attr['marginTop'] : 0;
                $marginRight = isset($attr['marginRight']) ? $attr['marginRight'] : 0;
                $marginBottom = isset($attr['marginBottom']) ? $attr['marginBottom'] : 0;
                $marginLeft = isset($attr['marginLeft']) ? $attr['marginLeft'] : 0;
                $css .= "margin-top: {$marginTop}{$marginUnit}; 
                margin-right: {$marginRight}{$marginUnit}; 
                margin-bottom: {$marginBottom}{$marginUnit}; 
                margin-left: {$marginLeft}{$marginUnit}; 
                ";
            } else {
                $margin = isset($attr['margin']) ? $attr['margin'] : 0;
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $css .= "margin: {$margin}{$marginUnit};";
            }
         $css .= "}";


        if(isset($attr['widthType']) && 'inlinewidth' === $attr['widthType'] ){
            
            
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']}{";
            $css .= "display: inline-flex;";
            $css .= "}";
    

        }
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']}{";
        //background
        if ( isset( $attr['backgroundType'] ) && $attr['backgroundType'] == 'image' ) {
        
			$css .= isset( $attr['backgroundImage']['url'] ) ? "background-image: url({$attr['backgroundImage']['url']});" : '';
			$css .= isset( $attr['backgroundAttachment']) ? "background-attachment: {$attr['backgroundAttachment']};" : 'background-attachment:scroll;';
			$css .= isset( $attr['backgroundRepeat']) ? "background-repeat: {$attr['backgroundRepeat']};" : 'background-repeat:repeat;';
			$css .= isset( $attr['backgroundSize']) ? "background-size: {$attr['backgroundSize']};" : 'background-size:auto;';
			$css .= isset($attr['backgroundPosition']) ? "background-position-x: " . ($attr['backgroundPosition']['x'] * 100) . "%; background-position-y: " . ($attr['backgroundPosition']['y'] * 100) . "%;" : '';
		}elseif( isset( $attr['backgroundType'] ) && $attr['backgroundType'] == 'gradient' ){
			$css .= isset( $attr['backgroundGradient'] ) ? "background-image:{$attr['backgroundGradient']};" : 'background-image:linear-gradient(90deg,rgba(54,209,220,1) 0%,rgba(91,134,229,1) 100%)';  
		}else{
			$css .= isset( $attr['backgroundColor'] ) ? "background-color:{$attr['backgroundColor']};" : '';
		}
        $css .= "}";

        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']}:hover{";
            //hvr background
            if ( isset( $attr['backgroundTypeHvr'] ) && $attr['backgroundTypeHvr'] == 'image' ) {
                    $css .= isset( $attr['backgroundImageHvr']['url'] ) ? "background-image: url({$attr['backgroundImageHvr']['url']});" : '';
                    $css .= isset( $attr['backgroundAttachmentHvr']) ? "background-attachment: {$attr['backgroundAttachmentHvr']};" : '';
                    $css .= isset( $attr['backgroundRepeatHvr']) ? "background-repeat: {$attr['backgroundRepeatHvr']};" : '';
                    $css .= isset( $attr['backgroundSizeHvr']) ? "background-size: {$attr['backgroundSizeHvr']};" : '';
                    $css .= isset( $attr['backgroundPositionHvr']) ? "background-position-x: {$attr['backgroundPositionHvr']['x']}%; background-position-y: {$attr['backgroundPositionHvr']['y']}%;" : '';
            }
            elseif( isset( $attr['backgroundTypeHvr'] ) && $attr['backgroundTypeHvr'] == 'gradient' ){
                    $css .= isset( $attr['backgroundGradientHvr'] ) ? "background-image:{$attr['backgroundGradientHvr']};" : '';  
            }else{
                    $css .= isset( $attr['backgroundColorHvr'] ) ? "background-color:{$attr['backgroundColorHvr']};" : '';
            }
        $css .= "}";    
        // overlay
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .wp-block-th-blocks-overlay{";
            if ( isset( $attr['overlaybackgroundType'] ) && $attr['overlaybackgroundType'] == 'image' ) {
                $css .= isset( $attr['overlaybackgroundImage']['url'] ) ? "background-image: url({$attr['overlaybackgroundImage']['url']});" : '';
                $css .= isset( $attr['overlaybackgroundAttachment']) ? "background-attachment: {$attr['overlaybackgroundAttachment']};" : 'background-attachment:scroll;';
                $css .= isset( $attr['overlaybackgroundRepeat']) ? "background-repeat: {$attr['overlaybackgroundRepeat']};" : 'background-repeat:repeat;';
                $css .= isset( $attr['overlaybackgroundSize']) ? "background-size: {$attr['overlaybackgroundSize']};" : 'background-size:auto;';
                $css .= isset($attr['overlaybackgroundPosition']) ? "background-position-x: " . ($attr['overlaybackgroundPosition']['x'] * 100) . "%; background-position-y: " . ($attr['overlaybackgroundPosition']['y'] * 100) . "%;" : '';
            }elseif( isset( $attr['overlaybackgroundType'] ) && $attr['overlaybackgroundType'] == 'gradient' ){
                $css .= isset( $attr['overlaybackgroundGradient'] ) ? "background-image:{$attr['overlaybackgroundGradient']};" : '';  
            }else{
                $css .= isset( $attr['overlaybackgroundColor'] ) ? "background-color:{$attr['overlaybackgroundColor']};" : '';
            }
         $css .= "}";

         // overlay hover
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']}:hover .wp-block-th-blocks-container-overlay{";
            if ( isset( $attr['overlaybackgroundTypeHvr'] ) && $attr['overlaybackgroundTypeHvr'] == 'image' ) {
                $css .= isset( $attr['overlaybackgroundImageHvr']['url'] ) ? "background-image: url({$attr['overlaybackgroundImageHvr']['url']});" : '';
                $css .= isset( $attr['overlaybackgroundAttachmentHvr']) ? "background-attachment: {$attr['overlaybackgroundAttachmentHvr']};" : 'background-attachment:scroll;';
                $css .= isset( $attr['overlaybackgroundRepeatHvr']) ? "background-repeat: {$attr['overlaybackgroundRepeatHvr']};" : 'background-repeat:repeat;';
                $css .= isset( $attr['overlaybackgroundSizeHvr']) ? "background-size: {$attr['overlaybackgroundSizeHvr']};" : 'background-size:auto;';
                $css .= isset($attr['overlaybackgroundPositionHvr']) ? "background-position-x: " . ($attr['overlaybackgroundPositionHvr']['x'] * 100) . "%; background-position-y: " . ($attr['overlaybackgroundPositionHvr']['y'] * 100) . "%;" : '';
			}elseif( isset( $attr['overlaybackgroundTypeHvr'] ) && $attr['overlaybackgroundTypeHvr'] == 'gradient' ){
                $css .= isset( $attr['overlaybackgroundGradientHvr'] ) ? "background-image:{$attr['overlaybackgroundGradientHvr']};" : '';  
            }else{
                $css .= isset( $attr['overlaybackgroundColorHvr'] ) ? "background-color:{$attr['overlaybackgroundColorHvr']};" : '';
            }
        $css .= "}";

        //transition duration
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']}{";
		$css .= "transition: all ". (isset($attr['transitionAll']) ? $attr['transitionAll'] : '0.2' ). "s ease;";
        $css .= "}";

        // typography
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-cat{";
        
        $css .= "font-family: " . (isset($attr['catfontFamily']) ? $attr['catfontFamily'] : 'inherit') . ';';
        $css .= "font-weight: " . (isset($attr['catfontVariant']) ? $attr['catfontVariant'] : 'inherit') . ';';
        $css .= "font-style: " . (isset($attr['catfontStyle']) ? $attr['catfontStyle'] : 'normal') . ';';
        $css .= "text-transform: " . (isset($attr['cattextTransform']) ? $attr['cattextTransform'] : 'none') . ';';

        // Font Size
        if (isset($attr['catfontSize'])) {
            $catfontSizeUnit = isset($attr['catfontSizeUnit']) ? $attr['catfontSizeUnit'] : 'px';
            $css .= "font-size: {$attr['catfontSize']}{$catfontSizeUnit}; ";
        }
        // Line Height
        if (isset($attr['catlineHeight'])) {
            $catlineHeightUnit = isset($attr['catlineHeightUnit']) ? $attr['catlineHeightUnit'] : 'px';
            $css .= "line-height: {$attr['catlineHeight']}{$catlineHeightUnit}; ";
        }

        // Letter Spacing
        if (isset($attr['catletterSpacing'])) {
            $catletterSpacingUnit = isset($attr['catletterSpacingUnit']) ? $attr['catletterSpacingUnit'] : 'px';
            $css .= "letter-spacing: {$attr['catletterSpacing']}{$catletterSpacingUnit}; ";
        }
        $css .= "}";

        // typography
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-title a{";
            $css .= "font-family: " . (isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : 'inherit') . ';';
            $css .= "font-weight: " . (isset($attr['titlefontVariant']) ? $attr['titlefontVariant'] : 'inherit') . ';';
            $css .= "font-style: " . (isset($attr['titlefontStyle']) ? $attr['titlefontStyle'] : 'normal') . ';';
            $css .= "text-transform: " . (isset($attr['titletextTransform']) ? $attr['titletextTransform'] : 'none') . ';';
            // Font Size
            if (isset($attr['titlefontSize'])) {
                $titlefontSizeUnit = isset($attr['titlefontSizeUnit']) ? $attr['titlefontSizeUnit'] : 'px';
                $css .= "font-size: {$attr['titlefontSize']}{$titlefontSizeUnit}; ";
            }
            // Line Height
            if (isset($attr['titlelineHeight'])) {
                $titlelineHeightUnit = isset($attr['titlelineHeightUnit']) ? $attr['titlelineHeightUnit'] : 'px';
                $css .= "line-height: {$attr['titlelineHeight']}{$titlelineHeightUnit}; ";
            }
    
            // Letter Spacing
            if (isset($attr['titleletterSpacing'])) {
                $titleletterSpacingUnit = isset($attr['titleletterSpacingUnit']) ? $attr['titleletterSpacingUnit'] : 'px';
                $css .= "letter-spacing: {$attr['titleletterSpacing']}{$titleletterSpacingUnit}; ";
            }
        $css .= "}";

        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-price span{";
            $css .= "font-family: " . (isset($attr['pricefontFamily']) ? $attr['pricefontFamily'] : 'inherit') . ';';
            $css .= "font-weight: " . (isset($attr['pricefontVariant']) ? $attr['pricefontVariant'] : 'inherit') . ';';
            $css .= "font-style: " . (isset($attr['pricefontStyle']) ? $attr['pricefontStyle'] : 'normal') . ';';
            $css .= "text-transform: " . (isset($attr['pricetextTransform']) ? $attr['pricetextTransform'] : 'none') . ';';
            // Font Size
            if (isset($attr['pricefontSize'])) {
                $pricefontSizeUnit = isset($attr['pricefontSizeUnit']) ? $attr['pricefontSizeUnit'] : 'px';
                $css .= "font-size: {$attr['pricefontSize']}{$pricefontSizeUnit}; ";
            }
            // Line Height
            if (isset($attr['pricelineHeight'])) {
                $pricelineHeightUnit = isset($attr['pricelineHeightUnit']) ? $attr['pricelineHeightUnit'] : 'px';
                $css .= "line-height: {$attr['pricelineHeight']}{$pricelineHeightUnit}; ";
            }
    
            // Letter Spacing
            if (isset($attr['priceletterSpacing'])) {
                $priceletterSpacingUnit = isset($attr['priceletterSpacingUnit']) ? $attr['priceletterSpacingUnit'] : 'px';
                $css .= "letter-spacing: {$attr['priceletterSpacing']}{$priceletterSpacingUnit}; ";
            }
        $css .= "}";

        // rating font size

        if (isset($attr['ratingfontSize'])) {
            $ratingfontSizeUnit = isset($attr['ratingfontSizeUnit']) ? $attr['ratingfontSizeUnit'] : 'px';
            $css .= "font-size: {$attr['ratingfontSize']}{$ratingfontSizeUnit}; ";
        }
        
        // Line Height
        if (isset($attr['ratinglineHeight'])) {
            $ratinglineHeightUnit = isset($attr['ratinglineHeightUnit']) ? $attr['ratinglineHeightUnit'] : 'px';
            $css .= "line-height: {$attr['ratinglineHeight']}{$ratinglineHeightUnit}; ";
        }

        // Letter Spacing
        if (isset($attr['ratingletterSpacing'])) {
            $ratingletterSpacingUnit = isset($attr['ratingletterSpacingUnit']) ? $attr['ratingletterSpacingUnit'] : 'px';
            $css .= "letter-spacing: {$attr['ratingletterSpacing']}{$ratingletterSpacingUnit}; ";
        }

            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-add-btn a{";
            $css .= "font-family: " . (isset($attr['buttonfontFamily']) ? $attr['buttonfontFamily'] : 'inherit') . ';';
            $css .= "font-weight: " . (isset($attr['buttonfontVariant']) ? $attr['buttonfontVariant'] : 'inherit') . ';';
            $css .= "font-style: " . (isset($attr['buttonfontStyle']) ? $attr['buttonfontStyle'] : 'normal') . ';';
            $css .= "text-transform: " . (isset($attr['buttontextTransform']) ? $attr['buttontextTransform'] : 'none') . ';';
           
            // Font Size
            if (isset($attr['buttonfontSize'])) {
                $buttonfontSizeUnit = isset($attr['buttonfontSizeUnit']) ? $attr['buttonfontSizeUnit'] : 'px';
                $css .= "font-size: {$attr['buttonfontSize']}{$buttonfontSizeUnit}; ";
            }
            // Line Height
            if (isset($attr['buttonlineHeight'])) {
                $buttonlineHeightUnit = isset($attr['buttonlineHeightUnit']) ? $attr['buttonlineHeightUnit'] : 'px';
                $css .= "line-height: {$attr['buttonlineHeight']}{$buttonlineHeightUnit}; ";
            }
            // Letter Spacing
            if (isset($attr['buttonletterSpacing'])) {
                $buttonletterSpacingUnit = isset($attr['buttonletterSpacingUnit']) ? $attr['buttonletterSpacingUnit'] : 'px';
                $css .= "letter-spacing: {$attr['buttonletterSpacing']}{$buttonletterSpacingUnit}; ";
            }
        $css .= "}";

        if (isset($attr['saleClr'])) {
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-sale{";
            $css .= "color: {$attr['saleClr']};";
            $css .= "}";
        }

        if (isset($attr['saleBgClr'])) {
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-sale{";
            $css .= "background: {$attr['saleBgClr']};";
            $css .= "}";
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-sale.style2:before{";
            $css .= "border-right-color: {$attr['saleBgClr']};border-left-color: {$attr['saleBgClr']};";
            $css .= "}";
        }

        if (isset($attr['postMetaClr'])) {
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-meta .th-icons,.wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-meta .th-icons a{";
            $css .= "color: {$attr['postMetaClr']};";
            $css .= "}";
        }

        if (isset($attr['postMetaBgClr'])) {
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-meta .th-icons{";
            $css .= "background: {$attr['postMetaBgClr']};";
            $css .= "}";
        }

        if (isset($attr['postMetaHvrClr'])) {
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-meta .th-icons:hover,.wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-meta .th-icons:hover a{";
            $css .= "color: {$attr['postMetaHvrClr']};";
            $css .= "}";
        }

        if (isset($attr['postMetaBgHvrClr'])) {
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-meta .th-icons:hover{";
            $css .= "background: {$attr['postMetaBgHvrClr']};";
            $css .= "}";
        }

        //end desktop view
        
        // tablet view
        $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {";
        
            if (isset($attr['productCol'])) {

                $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-item-wrap{";
                    
                $css .= "grid-template-columns:repeat({$attr['productColTablet']},1fr)";
        
                $css .= "}";
        
                }   

                if($showTab):
                    $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-cat-filter ul.category-tabs{";
                        $css .= isset( $attr['tabAlignTablet'] ) ? "justify-content:{$attr['tabAlignTablet'] };" : 'justify-content:center;';
                        $css .= "}";
                    $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-cat-filter ul.category-tabs li{";
                     //tabborder-width
                        if (isset($attr['tabBorderWidthTypeTablet']) && 'unlinked' === $attr['tabBorderWidthTypeTablet']) {
                            $tabBorderWidthUnitTablet = isset($attr['tabBorderWidthUnitTablet']) ? $attr['tabBorderWidthUnitTablet'] : 'px';
                            $tabBorderWidthTopTablet = isset($attr['tabBorderWidthTopTablet']) ? $attr['tabBorderWidthTopTablet'] : 0;
                            $tabBorderWidthRightTablet = isset($attr['tabBorderWidthRightTablet']) ? $attr['tabBorderWidthRightTablet'] : 0;
                            $tabBorderWidthBottomTablet = isset($attr['tabBorderWidthBottomTablet']) ? $attr['tabBorderWidthBottomTablet'] : 0;
                            $tabBorderWidthLeftTablet = isset($attr['tabBorderWidthLeftTablet']) ? $attr['tabBorderWidthLeftTablet'] : 0;
                            $css .= "border-top-width: {$tabBorderWidthTopTablet}{$tabBorderWidthUnit}; 
                            border-right-width: {$tabBorderWidthRightTablet}{$tabBorderWidthUnitTablet}; 
                            border-bottom-width: {$tabBorderWidthBottomTablet}{$tabBorderWidthUnitTablet}; 
                            border-left-width: {$tabBorderWidthLeftTablet}{$tabBorderWidthUnit}; 
                        ";
                        } else {
                            $tabBorderWidthTablet = isset($attr['tabBorderWidthTablet']) ? $attr['tabBorderWidthTablet'] : 0;
                            $tabBorderWidthUnit = isset($attr['tabBorderWidthUnit']) ? $attr['tabBorderWidthUnit'] : 'px';
                            $css .= "border-width: {$tabBorderWidthTablet}{$tabBorderWidthUnit}; ";
                        }
                        
                        //tabBorder-radius
                        if (isset($attr['tabBorderRadiusTypeTablet']) && 'unlinked' === $attr['tabBorderRadiusTypeTablet']) {
                            $tabBorderRadiusUnit = isset($attr['tabBorderRadiusUnit']) ? $attr['tabBorderRadiusUnit'] : 'px';
                            $tabBorderRadiusTopTablet = isset($attr['tabBorderRadiusTopTablet']) ? $attr['tabBorderRadiusTopTablet'] : 0;
                            $tabBorderRadiusRightTablet = isset($attr['tabBorderRadiusRightTablet']) ? $attr['tabBorderRadiusRightTablet'] : 0;
                            $tabBorderRadiusBottomTablet = isset($attr['tabBorderRadiusBottomTablet']) ? $attr['tabBorderRadiusBottomTablet'] : 0;
                            $tabBorderRadiusLeftTablet = isset($attr['tabBorderRadiusLeftTablet']) ? $attr['tabBorderRadiusLeftTablet'] : 0;
                            $css .= "border-top-right-radius: {$tabBorderRadiusTopTablet}{$tabBorderRadiusUnit}; 
                            border-top-left-radius: {$tabBorderRadiusRightTablet}{$tabBorderRadiusUnit};
                            border-bottom-right-radius: {$tabBorderRadiusBottomTablet}{$tabBorderRadiusUnit};
                            border-bottom-left-radius: {$tabBorderRadiusLeftTablet}{$tabBorderRadiusUnit};
                            ";
                        } else {
                            $tabBorderRadiusTablet = isset($attr['tabBorderRadiusTablet']) ? $attr['tabBorderRadiusTablet'] : 0;
                            $tabBorderRadiusUnit = isset($attr['tabBorderRadiusUnit']) ? $attr['tabBorderRadiusUnit'] : 'px';
                            $css .= "border-radius: {$tabBorderRadiusTablet}{$tabBorderRadiusUnit};";
                        }

                        //tabPadding
                        if (isset($attr['tabPaddingTypeTablet']) && 'unlinked' === $attr['tabPaddingTypeTablet']) {
                            $tabPaddingUnit = isset($attr['tabPaddingUnit']) ? $attr['tabPaddingUnit'] : 'px';
                            $tabPaddingTopTablet = isset($attr['tabPaddingTopTablet']) ? $attr['tabPaddingTopTablet'] : 0;
                            $tabPaddingRightTablet = isset($attr['tabPaddingRightTablet']) ? $attr['tabPaddingRightTablet'] : 0;
                            $tabPaddingBottomTablet = isset($attr['tabPaddingBottomTablet']) ? $attr['tabPaddingBottomTablet'] : 0;
                            $tabPaddingLeftTablet = isset($attr['tabPaddingLeftTablet']) ? $attr['tabPaddingLeftTablet'] : 0;
                            $css .= "padding-top: {$tabPaddingTopTablet}{$tabPaddingUnit}; 
                            padding-right: {$tabPaddingRightTablet}{$tabPaddingUnit}; 
                            padding-bottom: {$tabPaddingBottomTablet}{$tabPaddingUnit}; 
                            padding-left: {$tabPaddingLeftTablet}{$tabPaddingUnit}; 
                            ";
                        } else {
                            $tabPaddingTablet = isset($attr['tabPaddingTablet']) ? $attr['tabPadding'] : 10;
                            $tabPaddingUnit = isset($attr['tabPaddingUnit']) ? $attr['tabPaddingUnit'] : 'px';
                            $css .= "padding: {$tabPaddingTablet}{$tabPaddingUnit};";
                        }

                        //tabMargin
                        if (isset($attr['tabMarginTypeTablet']) && 'unlinked' === $attr['tabMarginType']) {
                            $tabMarginUnit = isset($attr['tabMarginUnit']) ? $attr['tabMarginUnit'] : 'px';
                            $tabMarginTopTablet = isset($attr['tabMarginTopTablet']) ? $attr['tabMarginTopTablet'] : 8;
                            $tabMarginBottomTablet = isset($attr['tabMarginBottomTablet']) ? $attr['tabMarginBottomTablet'] : 8;
                            $tabMarginLeftTablet = isset($attr['tabMarginLeftTablet']) ? $attr['tabMarginLeftTablet'] : 8;
                            $tabMarginRightTablet = isset($attr['tabMarginRightTablet']) ? $attr['tabMarginRightTablet'] : 8;
                            $css .= "
                            margin-top: {$tabMarginTopTablet}{$tabMarginUnit}; 
                            margin-bottom: {$tabMarginBottomTablet}{$tabMarginUnit}; 
                            margin-left: {$tabMarginLeftTablet}{$tabMarginUnit}; 
                            margin-right: {$tabMarginRightTablet}{$tabMarginUnit}; 
                            ";
                        } else {
                            $tabMarginTablet = isset($attr['tabMarginTablet']) ? $attr['tabMarginTablet'] : 8;
                            $tabMarginUnit = isset($attr['tabMarginUnit']) ? $attr['tabMarginUnit'] : 'px';
                            $css .= " margin: {$tabMarginTablet}{$tabMarginUnit}; 
                        ";
                        }
                    $css .= "}";
                endif;

            // product-box-padding
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-item .th-product-block-content-wrap{";
            if (isset($attr['productPaddingTypeTablet']) && 'unlinked' === $attr['productPaddingTypeTablet']) {
                $productPaddingUnit = isset($attr['productPaddingUnit']) ? $attr['productPaddingUnit'] : 'px';
                $productPaddingTopTablet = isset($attr['productPaddingTopTablet']) ? $attr['productPaddingTopTablet'] : 0;
                $productPaddingRightTablet = isset($attr['productPaddingRightTablet']) ? $attr['productPaddingRightTablet'] : 0;
                $productPaddingBottomTablet = isset($attr['productPaddingBottomTablet']) ? $attr['productPaddingBottomTablet'] : 0;
                $productPaddingLeftTablet = isset($attr['productPaddingLeftTablet']) ? $attr['productPaddingLeftTablet'] : 0;
                $css .= "padding-top: {$productPaddingTopTablet}{$productPaddingUnit}; 
                padding-right: {$productPaddingRightTablet}{$productPaddingUnit}; 
                padding-bottom: {$productPaddingBottomTablet}{$productPaddingUnit}; 
                padding-left: {$productPaddingLeftTablet}{$productPaddingUnit}; 
                ";
            } else {
                $productPaddingTablet = isset($attr['productPaddingTablet']) ? $attr['productPaddingTablet'] : 10;
                $productPaddingUnit = isset($attr['productPaddingUnit']) ? $attr['productPaddingUnit'] : 'px';
                $css .= "padding: {$productPaddingTablet}{$productPaddingUnit};";
            }
             // product-box-border-radius
            if (isset($attr['productBrdrRadiusTypeTablet']) && 'unlinked' === $attr['productBrdrRadiusTypeTablet']) {
                $productBrdrRadiusUnit = isset($attr['productBrdrRadiusUnit']) ? $attr['productBrdrRadiusUnit'] : 'px';
                $productBrdrRadiusTopTablet = isset($attr['productBrdrRadiusTopTablet']) ? $attr['productBrdrRadiusTopTablet'] : 0;
                $productBrdrRadiusRightTablet = isset($attr['productBrdrRadiusRightTablet']) ? $attr['productBrdrRadiusRightTablet'] : 0;
                $productBrdrRadiusBottomTablet = isset($attr['productBrdrRadiusBottomTablet']) ? $attr['productBrdrRadiusBottomTablet'] : 0;
                $productBrdrRadiusLeftTablet = isset($attr['productBrdrRadiusLeftTablet']) ? $attr['productBrdrRadiusLeftTablet'] : 0;
                $css .= "border-top-right-radius: {$productBrdrRadiusTopTablet}{$productBrdrRadiusUnit}; 
                border-top-left-radius: {$productBrdrRadiusRightTablet}{$productBrdrRadiusUnit};
                border-bottom-right-radius: {$productBrdrRadiusBottomTablet}{$productBrdrRadiusUnit};
                border-bottom-left-radius: {$productBrdrRadiusLeftTablet}{$productBrdrRadiusUnit};
                 ";
            } else {
                $productBrdrRadiusTablet = isset($attr['productBrdrRadiusTablet']) ? $attr['productBrdrRadiusTablet'] : 0;
                $productBrdrRadiusUnit = isset($attr['productBrdrRadiusUnit']) ? $attr['productBrdrRadiusUnit'] : 'px';
                $css .= "border-radius: {$productBrdrRadiusTablet}{$productBrdrRadiusUnit};";
            }
    
        $css .= "}";

        //gap
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-block-product-item-wrap{";
            $elementGapTablet = isset($attr['elementGapTablet']) ? $attr['elementGapTablet'] : 20;
            $elementGapUnit = isset($attr['elementGapUnit']) ? $attr['elementGapUnit'] : 'px';
            $css .= "grid-row-gap: {$elementGapTablet}{$elementGapUnit};";
            $css .= "grid-column-gap: {$elementGapTablet}{$elementGapUnit};";
            $css .= "}";

        //padding
        $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-wrapper{";
            if (isset($attr['paddingTypeTablet']) && 'unlinked' === $attr['paddingTypeTablet']) {
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $paddingTopTablet = isset($attr['paddingTopTablet']) ? $attr['paddingTopTablet'] : 0;
                $paddingRightTablet = isset($attr['paddingRightTablet']) ? $attr['paddingRightTablet'] : 0;
                $paddingBottomTablet = isset($attr['paddingBottomTablet']) ? $attr['paddingBottomTablet'] : 0;
                $paddingLeftTablet = isset($attr['paddingLeftTablet']) ? $attr['paddingLeftTablet'] : 0;
                $css .= "padding-top: {$paddingTopTablet}{$paddingUnit}; 
                padding-right: {$paddingRightTablet}{$paddingUnit}; 
                padding-bottom: {$paddingBottomTablet}{$paddingUnit}; 
                padding-left: {$paddingLeftTablet}{$paddingUnit}; 
                ";
            } else {
                $paddingTablet = isset($attr['paddingTablet']) ? $attr['paddingTablet'] : 10;
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $css .= "padding: {$paddingTablet}{$paddingUnit};";
         }
         $css .= "}";
         //margin
         $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-wrapper{";
            if (isset($attr['marginTypeTablet']) && 'unlinked' === $attr['marginType']) {
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $marginTopTablet = isset($attr['marginTopTablet']) ? $attr['marginTopTablet'] : 0;
                $marginRightTablet = isset($attr['marginRightTablet']) ? $attr['marginRightTablet'] : 0;
                $marginBottomTablet = isset($attr['marginBottomTablet']) ? $attr['marginBottomTablet'] : 0;
                $marginLeftTablet = isset($attr['marginLeftTablet']) ? $attr['marginLeftTablet'] : 0;
                $css .= "margin-top: {$marginTopTablet}{$marginUnit}; 
                margin-right: {$marginRightTablet}{$marginUnit}; 
                margin-bottom: {$marginBottomTablet}{$marginUnit}; 
                margin-left: {$marginLeftTablet}{$marginUnit}; 
                ";
            } else {
                $marginTablet = isset($attr['marginTablet']) ? $attr['marginTablet'] : 0;
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $css .= "margin: {$marginTablet}{$marginUnit};";
            }
         $css .= "}";    

         

        // typography

        // Font Size
		if (isset($attr['tabfontSizeTablet'])) {
			$tabfontSizeUnit = isset($attr['tabfontSizeUnit']) ? $attr['tabfontSizeUnit'] : 'px';
			$css .= "font-size: {$attr['tabfontSizeTablet']}{$tabfontSizeUnit}; ";
		}
		// Line Height
		if (isset($attr['tablineHeightTablet'])) {
			$tablineHeightUnit = isset($attr['tablineHeightUnit']) ? $attr['tablineHeightUnit'] : 'px';
			$css .= "line-height: {$attr['tablineHeightTablet']}{$tablineHeightUnit}; ";
		}

		// Letter Spacing
		if (isset($attr['tabletterSpacingTablet'])) {
			$tabletterSpacingUnit = isset($attr['tabletterSpacingUnit']) ? $attr['tabletterSpacingUnit'] : 'px';
			$css .= "letter-spacing: {$attr['tabletterSpacingTablet']}{$tabletterSpacingUnit}; ";
		}

         $css .= "}";
        
            // mobile view
            $css .= "@media only screen and (max-width: 767px){";
             
            if (isset($attr['productCol'])) {

            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-item-wrap{";
                
            $css .= "grid-template-columns:repeat({$attr['productColMobile']},1fr)";
    
            $css .= "}";
    
            }

            if($showTab):
                $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-cat-filter ul.category-tabs{";
                    $css .= isset( $attr['tabAlignMobile'] ) ? "justify-content:{$attr['tabAlignMobile'] };" : 'justify-content:center;';
                    $css .= "}";
                $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-cat-filter ul.category-tabs li{";
                 //tabborder-width
                    if (isset($attr['tabBorderWidthTypeMobile']) && 'unlinked' === $attr['tabBorderWidthTypeMobile']) {
                        $tabBorderWidthUnitMobile = isset($attr['tabBorderWidthUnitMobile']) ? $attr['tabBorderWidthUnitMobile'] : 'px';
                        $tabBorderWidthTopMobile = isset($attr['tabBorderWidthTopMobile']) ? $attr['tabBorderWidthTopMobile'] : 0;
                        $tabBorderWidthRightMobile = isset($attr['tabBorderWidthRightMobile']) ? $attr['tabBorderWidthRightMobile'] : 0;
                        $tabBorderWidthBottomMobile = isset($attr['tabBorderWidthBottomMobile']) ? $attr['tabBorderWidthBottomMobile'] : 0;
                        $tabBorderWidthLeftMobile = isset($attr['tabBorderWidthLeftMobile']) ? $attr['tabBorderWidthLeftMobile'] : 0;
                        $css .= "border-top-width: {$tabBorderWidthTopMobile}{$tabBorderWidthUnit}; 
                        border-right-width: {$tabBorderWidthRightMobile}{$tabBorderWidthUnitMobile}; 
                        border-bottom-width: {$tabBorderWidthBottomMobile}{$tabBorderWidthUnitMobile}; 
                        border-left-width: {$tabBorderWidthLeftMobile}{$tabBorderWidthUnit}; 
                    ";
                    } else {
                        $tabBorderWidthMobile = isset($attr['tabBorderWidthMobile']) ? $attr['tabBorderWidthMobile'] : 0;
                        $tabBorderWidthUnit = isset($attr['tabBorderWidthUnit']) ? $attr['tabBorderWidthUnit'] : 'px';
                        $css .= "border-width: {$tabBorderWidthMobile}{$tabBorderWidthUnit}; ";
                    }
                    
                    //tabBorder-radius
                    if (isset($attr['tabBorderRadiusTypeMobile']) && 'unlinked' === $attr['tabBorderRadiusTypeMobile']) {
                        $tabBorderRadiusUnit = isset($attr['tabBorderRadiusUnit']) ? $attr['tabBorderRadiusUnit'] : 'px';
                        $tabBorderRadiusTopMobile = isset($attr['tabBorderRadiusTopMobile']) ? $attr['tabBorderRadiusTopMobile'] : 0;
                        $tabBorderRadiusRightMobile = isset($attr['tabBorderRadiusRightMobile']) ? $attr['tabBorderRadiusRightMobile'] : 0;
                        $tabBorderRadiusBottomMobile = isset($attr['tabBorderRadiusBottomMobile']) ? $attr['tabBorderRadiusBottomMobile'] : 0;
                        $tabBorderRadiusLeftMobile = isset($attr['tabBorderRadiusLeftMobile']) ? $attr['tabBorderRadiusLeftMobile'] : 0;
                        $css .= "border-top-right-radius: {$tabBorderRadiusTopMobile}{$tabBorderRadiusUnit}; 
                        border-top-left-radius: {$tabBorderRadiusRightMobile}{$tabBorderRadiusUnit};
                        border-bottom-right-radius: {$tabBorderRadiusBottomMobile}{$tabBorderRadiusUnit};
                        border-bottom-left-radius: {$tabBorderRadiusLeftMobile}{$tabBorderRadiusUnit};
                        ";
                    } else {
                        $tabBorderRadiusMobile = isset($attr['tabBorderRadiusMobile']) ? $attr['tabBorderRadiusMobile'] : 0;
                        $tabBorderRadiusUnit = isset($attr['tabBorderRadiusUnit']) ? $attr['tabBorderRadiusUnit'] : 'px';
                        $css .= "border-radius: {$tabBorderRadiusMobile}{$tabBorderRadiusUnit};";
                    }

                    //tabPadding
                    if (isset($attr['tabPaddingTypeMobile']) && 'unlinked' === $attr['tabPaddingTypeMobile']) {
                        $tabPaddingUnit = isset($attr['tabPaddingUnit']) ? $attr['tabPaddingUnit'] : 'px';
                        $tabPaddingTopMobile = isset($attr['tabPaddingTopMobile']) ? $attr['tabPaddingTopMobile'] : 0;
                        $tabPaddingRightMobile = isset($attr['tabPaddingRightMobile']) ? $attr['tabPaddingRightMobile'] : 0;
                        $tabPaddingBottomMobile = isset($attr['tabPaddingBottomMobile']) ? $attr['tabPaddingBottomMobile'] : 0;
                        $tabPaddingLeftMobile = isset($attr['tabPaddingLeftMobile']) ? $attr['tabPaddingLeftMobile'] : 0;
                        $css .= "padding-top: {$tabPaddingTopMobile}{$tabPaddingUnit}; 
                        padding-right: {$tabPaddingRightMobile}{$tabPaddingUnit}; 
                        padding-bottom: {$tabPaddingBottomMobile}{$tabPaddingUnit}; 
                        padding-left: {$tabPaddingLeftMobile}{$tabPaddingUnit}; 
                        ";
                    } else {
                        $tabPaddingMobile = isset($attr['tabPaddingMobile']) ? $attr['tabPaddingMobile'] : 10;
                        $tabPaddingUnit = isset($attr['tabPaddingUnit']) ? $attr['tabPaddingUnit'] : 'px';
                        $css .= "padding: {$tabPaddingMobile}{$tabPaddingUnit};";
                    }

                    //tabMargin
                    if (isset($attr['tabMarginTypeMobile']) && 'unlinked' === $attr['tabMarginType']) {
                        $tabMarginUnit = isset($attr['tabMarginUnit']) ? $attr['tabMarginUnit'] : 'px';
                        $tabMarginTopMobile = isset($attr['tabMarginTopMobile']) ? $attr['tabMarginTopMobile'] : 8;
                        $tabMarginBottomMobile = isset($attr['tabMarginBottomMobile']) ? $attr['tabMarginBottomMobile'] : 8;
                        $tabMarginLeftMobile = isset($attr['tabMarginLeftMobile']) ? $attr['tabMarginLeftMobile'] : 8;
                        $tabMarginRightMobile = isset($attr['tabMarginRightMobile']) ? $attr['tabMarginRightMobile'] : 8;
                        $css .= "
                        margin-top: {$tabMarginTopMobile}{$tabMarginUnit}; 
                        margin-bottom: {$tabMarginBottomMobile}{$tabMarginUnit}; 
                        margin-left: {$tabMarginLeftMobile}{$tabMarginUnit}; 
                        margin-right: {$tabMarginRightMobile}{$tabMarginUnit}; 
                        ";
                    } else {
                        $tabMarginMobile = isset($attr['tabMarginMobile']) ? $attr['tabMarginMobile'] : 8;
                        $tabMarginUnit = isset($attr['tabMarginUnit']) ? $attr['tabMarginUnit'] : 'px';
                        $css .= " margin: {$tabMarginMobile}{$tabMarginUnit}; 
                    ";
                    }
                $css .= "}";
            endif;

            // product-box-padding
           $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-item .th-product-block-content-wrap{";
            if (isset($attr['productPaddingTypeMobile']) && 'unlinked' === $attr['productPaddingTypeMobile']) {
                $productPaddingUnit = isset($attr['productPaddingUnit']) ? $attr['productPaddingUnit'] : 'px';
                $productPaddingTopMobile = isset($attr['productPaddingTopMobile']) ? $attr['productPaddingTopMobile'] : 0;
                $productPaddingRightMobile = isset($attr['productPaddingRightMobile']) ? $attr['productPaddingRightMobile'] : 0;
                $productPaddingBottomMobile = isset($attr['productPaddingBottomMobile']) ? $attr['productPaddingBottomMobile'] : 0;
                $productPaddingLeftMobile = isset($attr['productPaddingLeftMobile']) ? $attr['productPaddingLeftMobile'] : 0;
                $css .= "padding-top: {$productPaddingTopMobile}{$productPaddingUnit}; 
                padding-right: {$productPaddingRightMobile}{$productPaddingUnit}; 
                padding-bottom: {$productPaddingBottomMobile}{$productPaddingUnit}; 
                padding-left: {$productPaddingLeftMobile}{$productPaddingUnit}; 
                ";
            } else {
                $productPaddingMobile = isset($attr['productPaddingMobile']) ? $attr['productPaddingMobile'] : 10;
                $productPaddingUnit = isset($attr['productPaddingUnit']) ? $attr['productPaddingUnit'] : 'px';
                $css .= "padding: {$productPaddingMobile}{$productPaddingUnit};";
            }
             // product-box-border-radius
            if (isset($attr['productBrdrRadiusTypeMobile']) && 'unlinked' === $attr['productBrdrRadiusTypeMobile']) {
                $productBrdrRadiusUnit = isset($attr['productBrdrRadiusUnit']) ? $attr['productBrdrRadiusUnit'] : 'px';
                $productBrdrRadiusTopMobile = isset($attr['productBrdrRadiusTopMobile']) ? $attr['productBrdrRadiusTopMobile'] : 0;
                $productBrdrRadiusRightMobile = isset($attr['productBrdrRadiusRightMobile']) ? $attr['productBrdrRadiusRightMobile'] : 0;
                $productBrdrRadiusBottomMobile = isset($attr['productBrdrRadiusBottomMobile']) ? $attr['productBrdrRadiusBottomMobile'] : 0;
                $productBrdrRadiusLeftMobile = isset($attr['productBrdrRadiusLeftMobile']) ? $attr['productBrdrRadiusLeftMobile'] : 0;
                $css .= "border-top-right-radius: {$productBrdrRadiusTopMobile}{$productBrdrRadiusUnit}; 
                border-top-left-radius: {$productBrdrRadiusRightMobile}{$productBrdrRadiusUnit};
                border-bottom-right-radius: {$productBrdrRadiusBottomMobile}{$productBrdrRadiusUnit};
                border-bottom-left-radius: {$productBrdrRadiusLeftMobile}{$productBrdrRadiusUnit};
                 ";
            } else {
                $productBrdrRadiusMobile = isset($attr['productBrdrRadiusMobile']) ? $attr['productBrdrRadiusMobile'] : 0;
                $productBrdrRadiusUnit = isset($attr['productBrdrRadiusUnit']) ? $attr['productBrdrRadiusUnit'] : 'px';
                $css .= "border-radius: {$productBrdrRadiusMobile}{$productBrdrRadiusUnit};";
            }
            $css .= "}";

            //gap
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-product-content .th-product-block-product-item-wrap{";
            $elementGapMobile = isset($attr['elementGapMobile']) ? $attr['elementGapMobile'] : 20;
            $elementGapUnit = isset($attr['elementGapUnit']) ? $attr['elementGapUnit'] : 'px';
            $css .= "grid-row-gap: {$elementGapMobile}{$elementGapUnit};";
            $css .= "grid-column-gap: {$elementGapMobile}{$elementGapUnit};";
            $css .= "}";

            //padding
            $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-wrapper{";
            if (isset($attr['paddingTypeMobile']) && 'unlinked' === $attr['paddingTypeMobile']) {
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $paddingTopMobile = isset($attr['paddingTopMobile']) ? $attr['paddingTopMobile'] : 0;
                $paddingRightMobile = isset($attr['paddingRightMobile']) ? $attr['paddingRightMobile'] : 0;
                $paddingBottomMobile = isset($attr['paddingBottomMobile']) ? $attr['paddingBottomMobile'] : 0;
                $paddingLeftMobile = isset($attr['paddingLeftMobile']) ? $attr['paddingLeftMobile'] : 0;
                $css .= "padding-top: {$paddingTopMobile}{$paddingUnit}; 
                padding-right: {$paddingRightMobile}{$paddingUnit}; 
                padding-bottom: {$paddingBottomMobile}{$paddingUnit}; 
                padding-left: {$paddingLeftMobile}{$paddingUnit}; 
                ";
            } else {
                $paddingMobile = isset($attr['paddingMobile']) ? $attr['paddingMobile'] : 10;
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $css .= "padding: {$paddingMobile}{$paddingUnit};";
         }
         $css .= "}";
         //margin
         $css .= ".wp-block-th-advance-product-tag-{$attr['uniqueID']} .th-product-block-wrapper{";
            if (isset($attr['marginTypeMobile']) && 'unlinked' === $attr['marginType']){
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $marginTopMobile = isset($attr['marginTopMobile']) ? $attr['marginTopMobile'] : 0;
                $marginRightMobile = isset($attr['marginRightMobile']) ? $attr['marginRightMobile'] : 0;
                $marginBottomMobile = isset($attr['marginBottomMobile']) ? $attr['marginBottomMobile'] : 0;
                $marginLeftMobile = isset($attr['marginLeftMobile']) ? $attr['marginLeftMobile'] : 0;
                $css .= "margin-top: {$marginTopMobile}{$marginUnit}; 
                margin-right: {$marginRightMobile}{$marginUnit}; 
                margin-bottom: {$marginBottomMobile}{$marginUnit}; 
                margin-left: {$marginLeftMobile}{$marginUnit}; 
                ";
            } else {
                $marginMobile = isset($attr['marginMobile']) ? $attr['marginMobile'] : 0;
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $css .= "margin: {$marginMobile}{$marginUnit};";
            }
         $css .= "}"; 

       
        // typography

        // Font Size
		if (isset($attr['tabfontSizeMobile'])) {
			$tabfontSizeUnit = isset($attr['tabfontSizeUnit']) ? $attr['tabfontSizeUnit'] : 'px';
			$css .= "font-size: {$attr['tabfontSizeMobile']}{$tabfontSizeUnit}; ";
		}
		// Line Height
		if (isset($attr['tablineHeightMobile'])) {
			$tablineHeightUnit = isset($attr['tablineHeightUnit']) ? $attr['tablineHeightUnit'] : 'px';
			$css .= "line-height: {$attr['tablineHeightMobile']}{$tablineHeightUnit}; ";
		}
		// Letter Spacing
		if (isset($attr['tabletterSpacingMobile'])) {
			$tabletterSpacingUnit = isset($attr['tabletterSpacingUnit']) ? $attr['tabletterSpacingUnit'] : 'px';
			$css .= "letter-spacing: {$attr['tabletterSpacingMobile']}{$tabletterSpacingUnit}; ";
		}

        $css .= "}";

        if (isset($attr['responsiveTogHideDesktop']) && $attr['responsiveTogHideDesktop'] == true){
            $css .= "@media only screen and (min-width: 1024px) {.wp-block-th-advance-product-tag-{$attr['uniqueID']}{display:none;}}";
        }
        //hide on Tablet
        if (isset($attr['responsiveTogHideTablet']) && $attr['responsiveTogHideTablet'] == true){
            $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) { .wp-block-th-advance-product-tag-{$attr['uniqueID']}{display:none;}}";
        }
        //hide on Mobile
        if (isset($attr['responsiveTogHideMobile']) && $attr['responsiveTogHideMobile'] == true){
            $css .= "@media only screen and (max-width: 767px) {.wp-block-th-advance-product-tag-{$attr['uniqueID']}{display:none;}}";
        }

    }

    return $css;

}