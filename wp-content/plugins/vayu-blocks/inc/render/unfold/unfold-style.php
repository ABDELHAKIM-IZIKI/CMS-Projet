<?php 

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 


function vayu_unfold_style($attr){

    $css = "";

    $css .= ".wp-block-vayu-blocks-unfold{";
        //padding
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
			$padding = isset($attr['padding']) ? $attr['padding'] : 0;
			$paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
			$css .= "padding: {$padding}{$paddingUnit};";
		}
        //margin
		if (isset($attr['marginType']) && 'unlinked' === $attr['marginType']) {
			$marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
			$marginTop = isset($attr['marginTop']) ? $attr['marginTop'] : 0;
			$marginBottom = isset($attr['marginBottom']) ? $attr['marginBottom'] : 0;
            $marginLeft = isset($attr['marginLeft']) ? $attr['marginLeft'] : 0;
            $marginRight = isset($attr['marginRight']) ? $attr['marginRight'] : 0;
			$css .= "
            margin-top: {$marginTop}{$marginUnit}; 
			margin-bottom: {$marginBottom}{$marginUnit}; 
            margin-left: {$marginLeft}{$marginUnit}; 
            margin-right: {$marginRight}{$marginUnit}; 
		    ";
		} else {
			$margin = isset($attr['margin']) ? $attr['margin'] : 0;
			$marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
			$css .= "margin: {$margin}{$marginUnit}; 
		   ";
		}  
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

    //border
		$css .= isset( $attr['borderType'] ) ? "border-style:{$attr['borderType'] };" : '';
        $css .= isset( $attr['borderColor'] ) ? "border-color:{$attr['borderColor'] };" : '';
    //border-width
		if (isset($attr['borderWidthType']) && 'unlinked' === $attr['borderWidthType']) {
			$borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
			$borderWidthTop = isset($attr['borderWidthTop']) ? $attr['borderWidthTop'] : 0;
			$borderWidthRight = isset($attr['borderWidthRight']) ? $attr['borderWidthRight'] : 0;
			$borderWidthBottom = isset($attr['borderWidthBottom']) ? $attr['borderWidthBottom'] : 0;
			$borderWidthLeft = isset($attr['borderWidthLeft']) ? $attr['borderWidthLeft'] : 0;
			$css .= "border-top-width: {$borderWidthTop}{$borderWidthUnit}; 
			border-right-width: {$borderWidthRight}{$borderWidthUnit}; 
			border-bottom-width: {$borderWidthBottom}{$borderWidthUnit}; 
			border-left-width: {$borderWidthLeft}{$borderWidthUnit}; 
		   ";
		} else {
			$borderWidth = isset($attr['borderWidth']) ? $attr['borderWidth'] : 0;
			$borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
			$css .= "border-width: {$borderWidth}{$borderWidthUnit}; ";
		}
    
        //border-radius
		if (isset($attr['borderRadiusType']) && 'unlinked' === $attr['borderRadiusType']) {
			$borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
			$borderRadiusTop = isset($attr['borderRadiusTop']) ? $attr['borderRadiusTop'] : 0;
			$borderRadiusRight = isset($attr['borderRadiusRight']) ? $attr['borderRadiusRight'] : 0;
			$borderRadiusBottom = isset($attr['borderRadiusBottom']) ? $attr['borderRadiusBottom'] : 0;
			$borderRadiusLeft = isset($attr['borderRadiusLeft']) ? $attr['borderRadiusLeft'] : 0;
			$css .= "border-top-right-radius: {$borderRadiusTop}{$borderRadiusUnit}; 
			  border-top-left-radius: {$borderRadiusRight}{$borderRadiusUnit};
			  border-bottom-right-radius: {$borderRadiusBottom}{$borderRadiusUnit};
			  border-bottom-left-radius: {$borderRadiusLeft}{$borderRadiusUnit};
			 ";
		} else {
			$borderRadius = isset($attr['borderRadius']) ? $attr['borderRadius'] : 0;
			$borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
			$css .= "border-radius: {$borderRadius}{$borderRadiusUnit};";
		}
        //box shadow
        if (isset($attr['boxShadow'])){
			$css .= "box-shadow: ". (isset($attr['boxShadowHorizontal']) ? $attr['boxShadowHorizontal'] : '0') ."px  ". (isset($attr['boxShadowVertical']) ? $attr['boxShadowVertical'] : '0') ."px ". (isset($attr['boxShadowBlur']) ? $attr['boxShadowBlur'] : '5') ."px ". (isset($attr['boxShadowSpread']) ? $attr['boxShadowSpread'] : '1') ."px  ". vayu_hex2rgba((isset($attr['boxShadowColor']) ? $attr['boxShadowColor'] : '#fff'), (isset($attr['boxShadowColorOpacity']) ? $attr['boxShadowColorOpacity'] : '50') ) .";";
		} 

        // z-index
        $css .= (isset($attr['zindex']) ? "z-index:{$attr['zindex']};}" : '');

    $css .= "}";


    $css .=".wp-block-vayu-blocks-unfold::after{";
    //overlay
    if ( isset( $attr['overlaybackgroundType'] ) && $attr['overlaybackgroundType'] == 'image' ) {
        $css .= isset( $attr['overlaybackgroundImage']['url'] ) ? "background-image: url({$attr['overlaybackgroundImage']['url']});" : '';
        $css .= isset( $attr['overlaybackgroundAttachment']) ? "background-attachment: {$attr['overlaybackgroundAttachment']};" : 'background-attachment:scroll;';
        $css .= isset( $attr['overlaybackgroundRepeat']) ? "background-repeat: {$attr['overlaybackgroundRepeat']};" : 'background-repeat:repeat;';
        $css .= isset( $attr['overlaybackgroundSize']) ? "background-size: {$attr['overlaybackgroundSize']};" : 'background-size:auto;';
        $css .= isset($attr['overlaybackgroundPosition']) ? "background-position-x: " . ($attr['overlaybackgroundPosition']['x'] * 100) . "%; background-position-y: " . ($attr['overlaybackgroundPosition']['y'] * 100) . "%;" : '';
    }elseif( isset( $attr['overlaybackgroundType'] ) && $attr['overlaybackgroundType'] == 'gradient' ){
        $css .= isset( $attr['overlaybackgroundGradient'] ) ? "background-image:{$attr['overlaybackgroundGradient']};" : 'background-image:linear-gradient(90deg,rgba(54,209,220,1) 0%,rgba(91,134,229,1) 100%)';  
    }else{
        $css .= isset( $attr['overlaybackgroundColor'] ) ? "background-color:{$attr['overlaybackgroundColor']};" : '';
    }
    $css .="}";

     /**************/
     //Hover
    /**************/

    $css .=".wp-block-vayu-blocks-unfold:hover::after{";
    //overlay
    if ( isset( $attr['overlaybackgroundTypeHvr'] ) && $attr['overlaybackgroundTypeHvr'] == 'image' ) {
        $css .= isset( $attr['overlaybackgroundImageHvr']['url'] ) ? "background-image: url({$attr['overlaybackgroundImageHvr']['url']});" : '';
        $css .= isset( $attr['overlaybackgroundAttachmentHvr']) ? "background-attachment: {$attr['overlaybackgroundAttachmentHvr']};" : 'background-attachment:scroll;';
        $css .= isset( $attr['overlaybackgroundRepeatHvr']) ? "background-repeat: {$attr['overlaybackgroundRepeatHvr']};" : 'background-repeat:repeat;';
        $css .= isset( $attr['overlaybackgroundSizeHvr']) ? "background-size: {$attr['overlaybackgroundSizeHvr']};" : 'background-size:auto;';
        $css .= isset($attr['overlaybackgroundPositionHvr']) ? "background-position-x: " . ($attr['overlaybackgroundPositionHvr']['x'] * 100) . "%; background-position-y: " . ($attr['overlaybackgroundPositionHvr']['y'] * 100) . "%;" : '';
    }elseif( isset( $attr['overlaybackgroundTypeHvr'] ) && $attr['overlaybackgroundType'] == 'gradient' ){
        $css .= isset( $attr['overlaybackgroundGradientHvr'] ) ? "background-image:{$attr['overlaybackgroundGradientHvr']};" : 'background-image:linear-gradient(90deg,rgba(54,209,220,1) 0%,rgba(91,134,229,1) 100%)';  
    }else{
        $css .= isset( $attr['overlaybackgroundColorHvr'] ) ? "background-color:{$attr['overlaybackgroundColorHvr']};" : '';
    }
    $css .="}";

    $css .= ".wp-block-vayu-blocks-unfold:hover{";
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
        //border hover
        $css .= isset( $attr['borderHvrType'] ) ? "border-style:{$attr['borderHvrType'] };" : '';
        $css .= isset( $attr['borderColorHvr'] ) ? "border-color:{$attr['borderColorHvr'] };" : '';
    
        //border-width hover
        if (isset($attr['borderWidthHvrType']) && 'unlinked' === $attr['borderWidthHvrType']) {
            $borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
            $borderWidthHvrTop = isset($attr['borderWidthHvrTop']) ? $attr['borderWidthHvrTop'] : '';
            $borderWidthHvrRight = isset($attr['borderWidthHvrRight']) ? $attr['borderWidthHvrRight'] : '';
            $borderWidthHvrBottom = isset($attr['borderWidthHvrBottom']) ? $attr['borderWidthHvrBottom'] : '';
            $borderWidthHvrLeft = isset($attr['borderWidthHvrLeft']) ? $attr['borderWidthHvrLeft'] : '';
            $css .= "border-top-width: {$borderWidthHvrTop}{$borderWidthHvrUnit}; 
             border-right-width: {$borderWidthHvrRight}{$borderWidthHvrUnit};
             border-bottom-width: {$borderWidthHvrBottom}{$borderWidthHvrUnit}; 
             border-left-width: {$borderWidthHvrLeft}{$borderWidthHvrUnit}; 
            ";
        } elseif(isset($attr['borderWidthHvr'])) {
            $borderWidthHvr = isset($attr['borderWidthHvr']) ? $attr['borderWidthHvr'] : '';
            $borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
            $css .= "border-width: {$borderWidthHvr}{$borderWidthHvrUnit};";
        }

        //border-radius hover
        if (isset($attr['borderRadiusHvrType']) && 'unlinked' === $attr['borderRadiusHvrType']) {
            $borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
            $borderRadiusHvrTop = isset($attr['borderRadiusHvrTop']) ? $attr['borderRadiusHvrTop'] : '';
            $borderRadiusHvrRight = isset($attr['borderRadiusHvrRight']) ? $attr['borderRadiusHvrRight'] : '';
            $borderRadiusHvrBottom = isset($attr['borderRadiusHvrBottom']) ? $attr['borderRadiusHvrBottom'] : '';
            $borderRadiusHvrLeft = isset($attr['borderRadiusHvrLeft']) ? $attr['borderRadiusHvrLeft'] : '';
            $css .= "border-top-right-radius: {$borderRadiusHvrTop}{$borderRadiusHvrUnit};
             border-top-left-radius: {$borderRadiusHvrRight}{$borderRadiusHvrUnit}; 
             border-bottom-right-radius: {$borderRadiusHvrBottom}{$borderRadiusHvrUnit}; 
             border-bottom-left-radius: {$borderRadiusHvrLeft}{$borderRadiusHvrUnit}; 
            ";
        } elseif(isset($attr['borderRadiusHvr'])) {
            $borderRadiusHvr = isset($attr['borderRadiusHvr']) ? $attr['borderRadiusHvr'] : '';
            $borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
            $css .= "border-radius: {$borderRadiusHvr}{$borderRadiusHvrUnit};";
        }

        //box hvr shadow
        if (isset($attr['boxShadowColorHvr'])){
            $css .= "box-shadow: ". (isset($attr['boxShadowHorizontalHvr']) ? $attr['boxShadowHorizontalHvr'] : '0') ."px  ". (isset($attr['boxShadowVerticalHvr']) ? $attr['boxShadowVerticalHvr'] : '0') ."px ". (isset($attr['boxShadowBlurHvr']) ? $attr['boxShadowBlurHvr'] : '5') ."px ". (isset($attr['boxShadowSpreadHvr']) ? $attr['boxShadowSpreadHvr'] : '1') ."px  ". vayu_hex2rgba((isset($attr['boxShadowColorHvr']) ? $attr['boxShadowColorHvr'] : '#fff'), (isset($attr['boxShadowColorOpacityHvr']) ? $attr['boxShadowColorOpacityHvr'] : '50') ) ." ;";
        }



    $css .= "}";

    //button content
    $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn{";
    //padding
		if (isset($attr['paddingBtnWrapType']) && 'unlinked' === $attr['paddingBtnWrapType']) {
			$paddingBtnWrapUnit = isset($attr['paddingBtnWrapUnit']) ? $attr['paddingBtnWrapUnit'] : 'px';
			$paddingBtnWrapTop = isset($attr['paddingBtnWrapTop']) ? $attr['paddingBtnWrapTop'] : 0;
			$paddingBtnWrapRight = isset($attr['paddingBtnWrapRight']) ? $attr['paddingBtnWrapRight'] : 0;
			$paddingBtnWrapBottom = isset($attr['paddingBtnWrapBottom']) ? $attr['paddingBtnWrapBottom'] : 0;
			$paddingBtnWrapLeft = isset($attr['paddingBtnWrapLeft']) ? $attr['paddingBtnWrapLeft'] : 0;
			$css .= "padding-top: {$paddingBtnWrapTop}{$paddingBtnWrapUnit}; 
			padding-right: {$paddingBtnWrapRight}{$paddingBtnWrapUnit}; 
			padding-bottom: {$paddingBtnWrapBottom}{$paddingBtnWrapUnit}; 
			padding-left: {$paddingBtnWrapLeft}{$paddingBtnWrapUnit}; 
		    ";
		} else {
			$paddingBtnWrap = isset($attr['paddingBtnWrap']) ? $attr['paddingBtnWrap'] : 20;
			$paddingBtnWrapUnit = isset($attr['paddingBtnWrapUnit']) ? $attr['paddingBtnWrapUnit'] : 'px';
			$css .= "padding: {$paddingBtnWrap}{$paddingBtnWrapUnit};";
		}
        $css .= "}";

    
        if (isset($attr['contentMinHgt'])) {
            $contentMinHgtUnit = isset($attr['contentMinHgtUnit']) ? $attr['contentMinHgtUnit'] : 'px';
            $css .= ".wp-block-vayu-blocks-unfold .unfold-content{max-height: {$attr['contentMinHgt']}{$contentMinHgtUnit}; }";
        }else{
            $css .= ".wp-block-vayu-blocks-unfold .unfold-content{max-height: 150px; }";
        }
    
        if (isset($attr['contentGradient'])) {
            $css .= ".wp-block-vayu-blocks-unfold .unfold-content:not(.unfolded)::after { background: {$attr['contentGradient']}; }";
        } 
        $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button{";
        //Btnpadding
        if (isset($attr['paddingBtnType']) && 'unlinked' === $attr['paddingBtnType']) {
            $paddingBtnUnit = isset($attr['paddingBtnUnit']) ? $attr['paddingBtnUnit'] : 'px';
            $paddingBtnTop = isset($attr['paddingBtnTop']) ? $attr['paddingBtnTop'] : 10;
            $paddingBtnRight = isset($attr['paddingBtnRight']) ? $attr['paddingBtnRight'] : 20;
            $paddingBtnBottom = isset($attr['paddingBtnBottom']) ? $attr['paddingBtnBottom'] : 10;
            $paddingBtnLeft = isset($attr['paddingBtnLeft']) ? $attr['paddingBtnLeft'] : 20;
            $css .= "padding-top: {$paddingBtnTop}{$paddingBtnUnit}; 
            padding-right: {$paddingBtnRight}{$paddingBtnUnit}; 
            padding-bottom: {$paddingBtnBottom}{$paddingBtnUnit}; 
            padding-left: {$paddingBtnLeft}{$paddingBtnUnit}; 
            ";
        } else {
            $paddingBtn = isset($attr['paddingBtn']) ? $attr['paddingBtn'] : '';
            $paddingBtnUnit = isset($attr['paddingBtnUnit']) ? $attr['paddingBtnUnit'] : 'px';
            $css .= "padding: {$paddingBtn}{$paddingBtnUnit};";
        }

        $css .= isset( $attr['btnClr'] ) ? "color:{$attr['btnClr']};" : 'color:#fff;';

        if ( isset( $attr['backgroundBtnType'] ) && $attr['backgroundBtnType'] == 'image' ) {
            $css .= isset( $attr['backgroundBtnImage']['url'] ) ? "background-image: url({$attr['backgroundBtnImage']['url']});" : '';
            $css .= isset( $attr['backgroundBtnAttachment']) ? "background-attachment: {$attr['backgroundBtnAttachment']};" : 'background-attachment:scroll;';
            $css .= isset( $attr['backgroundBtnRepeat']) ? "background-repeat: {$attr['backgroundBtnRepeat']};" : 'background-repeat:repeat;';
            $css .= isset( $attr['backgroundBtnSize']) ? "background-size: {$attr['backgroundBtnSize']};" : 'background-size:auto;';
            $css .= isset($attr['backgroundBtnPosition']) ? "background-position-x: " . ($attr['backgroundBtnPosition']['x'] * 100) . "%; background-position-y: " . ($attr['backgroundBtnPosition']['y'] * 100) . "%;" : '';
        }elseif( isset( $attr['backgroundBtnType'] ) && $attr['backgroundType'] == 'gradient' ){
            $css .= isset( $attr['backgroundBtnGradient'] ) ? "background-image:{$attr['backgroundBtnGradient']};" : 'background-image:linear-gradient(90deg,rgba(54,209,220,1) 0%,rgba(91,134,229,1) 100%)';  
        }else{
            $css .= isset( $attr['backgroundBtnColor'] ) ? "background-color:{$attr['backgroundBtnColor']};" : 'background-color:#111;';
        }

        //button border
		$css .= isset( $attr['borderBtnType'] ) ? "border-style:{$attr['borderBtnType'] };" : '';
        $css .= isset( $attr['borderBtnColor'] ) ? "border-color:{$attr['borderBtnColor'] };" : '';
        //button border-width
		if (isset($attr['borderBtnWidthType']) && 'unlinked' === $attr['borderBtnWidthType']) {
			$borderBtnWidthUnit = isset($attr['borderBtnWidthUnit']) ? $attr['borderBtnWidthUnit'] : 'px';
			$borderBtnWidthTop = isset($attr['borderBtnWidthTop']) ? $attr['borderBtnWidthTop'] : 0;
			$borderBtnWidthRight = isset($attr['borderBtnWidthRight']) ? $attr['borderBtnWidthRight'] : 0;
			$borderBtnWidthBottom = isset($attr['borderBtnWidthBottom']) ? $attr['borderBtnWidthBottom'] : 0;
			$borderBtnWidthLeft = isset($attr['borderBtnWidthLeft']) ? $attr['borderBtnWidthLeft'] : 0;
			$css .= "border-top-width: {$borderBtnWidthTop}{$borderBtnWidthUnit}; 
			border-right-width: {$borderBtnWidthRight}{$borderBtnWidthUnit}; 
			border-bottom-width: {$borderBtnWidthBottom}{$borderBtnWidthUnit}; 
			border-left-width: {$borderBtnWidthLeft}{$borderBtnWidthUnit}; 
		   ";
		} else {
			$borderBtnWidth = isset($attr['borderBtnWidth']) ? $attr['borderBtnWidth'] : 0;
			$borderBtnWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderBtnWidthUnit'] : 'px';
			$css .= "border-width: {$borderBtnWidth}{$borderBtnWidthUnit}; ";
		}
    
        //button border-radius
		if (isset($attr['borderBtnRadiusType']) && 'unlinked' === $attr['borderBtnRadiusType']) {
			$borderBtnRadiusUnit = isset($attr['borderBtnRadiusUnit']) ? $attr['borderBtnRadiusUnit'] : 'px';
			$borderBtnRadiusTop = isset($attr['borderBtnRadiusTop']) ? $attr['borderBtnRadiusTop'] : 7;
			$borderBtnRadiusRight = isset($attr['borderBtnRadiusRight']) ? $attr['borderBtnRadiusRight'] : 7;
			$borderBtnRadiusBottom = isset($attr['borderBtnRadiusBottom']) ? $attr['borderBtnRadiusBottom'] : 7;
			$borderBtnRadiusLeft = isset($attr['borderBtnRadiusLeft']) ? $attr['borderBtnRadiusLeft'] : 7;
			$css .= "border-top-right-radius: {$borderBtnRadiusTop}{$borderBtnRadiusUnit}; 
			  border-top-left-radius: {$borderBtnRadiusRight}{$borderBtnRadiusUnit};
			  border-bottom-right-radius: {$borderBtnRadiusBottom}{$borderBtnRadiusUnit};
			  border-bottom-left-radius: {$borderBtnRadiusLeft}{$borderBtnRadiusUnit};
			 ";
		} else {
			$borderBtnRadius = isset($attr['borderBtnRadius']) ? $attr['borderBtnRadius'] : 7;
			$borderBtnRadiusUnit = isset($attr['borderBtnRadiusUnit']) ? $attr['borderBtnRadiusUnit'] : 'px';
			$css .= "border-radius: {$borderBtnRadius}{$borderBtnRadiusUnit};";
		}
        //button box shadow
        if (isset($attr['boxShadowBtn'])){
			$css .= "box-shadow: ". (isset($attr['boxShadowBtnHorizontal']) ? $attr['boxShadowBtnHorizontal'] : '0') ."px  ". (isset($attr['boxShadowBtnVertical']) ? $attr['boxShadowBtnVertical'] : '0') ."px ". (isset($attr['boxShadowBtnBlur']) ? $attr['boxShadowBtnBlur'] : '5') ."px ". (isset($attr['boxShadowBtnSpread']) ? $attr['boxShadowBtnSpread'] : '1') ."px  ". vayu_hex2rgba((isset($attr['boxShadowBtnColor']) ? $attr['boxShadowBtnColor'] : '#fff'), (isset($attr['boxShadowBtnColorOpacity']) ? $attr['boxShadowBtnColorOpacity'] : '50') ) .";";
		} 

        // Font size
		if (isset($attr['fontSize'])) {
			$fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
			$css .= "font-size: {$attr['fontSize']}{$fontSizeUnit}; ";
		}

        // Line height
		if (isset($attr['lineHeight'])) {
			$lineHeightUnit = isset($attr['lineHeightUnit']) ? $attr['lineHeightUnit'] : 'px';
			$css .= "line-height: {$attr['lineHeight']}{$lineHeightUnit}; ";
		}

		// Letter spacing
		if (isset($attr['letterSpacing'])) {
			$letterSpacingUnit = isset($attr['letterSpacingUnit']) ? $attr['letterSpacingUnit'] : 'px';
			$css .= "letter-spacing: {$attr['letterSpacing']}{$letterSpacingUnit}; ";
		}

		// Font family
		if (isset($attr['fontFamily'])) {
			$css .= "font-family: '{$attr['fontFamily']}', sans-serif; ";
		}

		if (isset($attr['fontVariant'])) {
			$fontVariant = isset($attr['fontVariant']) ? $attr['fontVariant'] : 'normal';
			$css .= "font-weight:{$fontVariant}; ";
		}

    $css .= "}";

    $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button:hover{";

            $css .= isset( $attr['btnHvrClr'] ) ? "color:{$attr['btnHvrClr']};" : 'color:#fff;';

           if ( isset( $attr['backgroundBtnTypeHvr'] ) && $attr['backgroundBtnTypeHvr'] == 'image' ) {
                $css .= isset( $attr['backgroundBtnImageHvr']['url'] ) ? "background-image: url({$attr['backgroundBtnImageHvr']['url']});" : '';
                $css .= isset( $attr['backgroundBtnAttachmentHvr']) ? "background-attachment: {$attr['backgroundBtnAttachmentHvr']};" : 'background-attachment:scroll;';
                $css .= isset( $attr['backgroundBtnRepeatHvr']) ? "background-repeat: {$attr['backgroundBtnRepeatHvr']};" : 'background-repeat:repeat;';
                $css .= isset( $attr['backgroundBtnSizeHvr']) ? "background-size: {$attr['backgroundBtnSizeHvr']};" : 'background-size:auto;';
                $css .= isset($attr['backgroundBtnPositionHvr']) ? "background-position-x: " . ($attr['backgroundBtnPositionHvr']['x'] * 100) . "%; background-position-y: " . ($attr['backgroundBtnPositionHvr']['y'] * 100) . "%;" : '';
            }elseif( isset( $attr['backgroundBtnTypeHvr'] ) && $attr['backgroundType'] == 'gradient' ){
                $css .= isset( $attr['backgroundBtnGradientHvr'] ) ? "background-image:{$attr['backgroundBtnGradientHvr']};" : 'background-image:linear-gradient(90deg,rgba(54,209,220,1) 0%,rgba(91,134,229,1) 100%)';  
            }else{
                $css .= isset( $attr['backgroundBtnColorHvr'] ) ? "background-color:{$attr['backgroundBtnColorHvr']};" : 'background-color:#111;';
            }

            //button border
		$css .= isset( $attr['borderBtnHvrType'] ) ? "border-style:{$attr['borderBtnHvrType'] };" : '';
        $css .= isset( $attr['borderBtnHvrColor'] ) ? "border-color:{$attr['borderBtnHvrColor'] };" : '';
        //button border-width
		if (isset($attr['borderBtnWidthHvrType']) && 'unlinked' === $attr['borderBtnWidthHvrType']) {
			$borderBtnWidthHvrUnit = isset($attr['borderBtnWidthHvrUnit']) ? $attr['borderBtnWidthHvrUnit'] : 'px';
			$borderBtnWidthHvrTop = isset($attr['borderBtnWidthHvrTop']) ? $attr['borderBtnWidthHvrTop'] : 0;
			$borderBtnWidthHvrRight = isset($attr['borderBtnWidthHvrRight']) ? $attr['borderBtnWidthHvrRight'] : 0;
			$borderBtnWidthHvrBottom = isset($attr['borderBtnWidthHvrBottom']) ? $attr['borderBtnWidthHvrBottom'] : 0;
			$borderBtnWidthHvrLeft = isset($attr['borderBtnWidthHvrLeft']) ? $attr['borderBtnWidthHvrLeft'] : 0;
			$css .= "border-top-width: {$borderBtnWidthHvrTop}{$borderBtnWidthHvrUnit}; 
			border-right-width: {$borderBtnWidthHvrRight}{$borderBtnWidthHvrUnit}; 
			border-bottom-width: {$borderBtnWidthHvrBottom}{$borderBtnWidthHvrUnit}; 
			border-left-width: {$borderBtnWidthHvrLeft}{$borderBtnWidthHvrUnit}; 
		   ";
		} else {
			$borderBtnWidthHvr = isset($attr['borderBtnWidthHvr']) ? $attr['borderBtnWidthHvr'] : 0;
			$borderBtnWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderBtnWidthHvrUnit'] : 'px';
			$css .= "border-width: {$borderBtnWidthHvr}{$borderBtnWidthHvrUnit}; ";
		}
    
        //button border-radius
		if (isset($attr['borderBtnRadiusHvrType']) && 'unlinked' === $attr['borderBtnRadiusHvrType']) {
			$borderBtnRadiusHvrUnit = isset($attr['borderBtnRadiusHvrUnit']) ? $attr['borderBtnRadiusHvrUnit'] : 'px';
			$borderBtnRadiusHvrTop = isset($attr['borderBtnRadiusHvrTop']) ? $attr['borderBtnRadiusHvrTop'] : 7;
			$borderBtnRadiusHvrRight = isset($attr['borderBtnRadiusHvrRight']) ? $attr['borderBtnRadiusHvrRight'] : 7;
			$borderBtnRadiusHvrBottom = isset($attr['borderBtnRadiusHvrBottom']) ? $attr['borderBtnRadiusHvrBottom'] : 7;
			$borderBtnRadiusHvrLeft = isset($attr['borderBtnRadiusHvrLeft']) ? $attr['borderBtnRadiusHvrLeft'] : 7;
			$css .= "border-top-right-radius: {$borderBtnRadiusHvrTop}{$borderBtnRadiusHvrUnit}; 
			  border-top-left-radius: {$borderBtnRadiusHvrRight}{$borderBtnRadiusHvrUnit};
			  border-bottom-right-radius: {$borderBtnRadiusHvrBottom}{$borderBtnRadiusHvrUnit};
			  border-bottom-left-radius: {$borderBtnRadiusHvrLeft}{$borderBtnRadiusHvrUnit};
			 ";
		} else {
			$borderBtnRadiusHvr = isset($attr['borderBtnRadiusHvr']) ? $attr['borderBtnRadiusHvr'] : 7;
			$borderBtnRadiusHvrUnit = isset($attr['borderBtnRadiusHvrUnit']) ? $attr['borderBtnRadiusHvrUnit'] : 'px';
			$css .= "border-radius: {$borderBtnRadiusHvr}{$borderBtnRadiusHvrUnit};";
		}
        //button box shadow
        if (isset($attr['boxShadowBtnHvr'])){
			$css .= "box-shadow: ". (isset($attr['boxShadowBtnHorizontalHvr']) ? $attr['boxShadowBtnHorizontalHvr'] : '0') ."px  ". (isset($attr['boxShadowBtnVerticalHvr']) ? $attr['boxShadowBtnVerticalHvr'] : '0') ."px ". (isset($attr['boxShadowBtnBlurHvr']) ? $attr['boxShadowBtnBlurHvr'] : '5') ."px ". (isset($attr['boxShadowBtnSpreadHvr']) ? $attr['boxShadowBtnSpreadHvr'] : '1') ."px  ". vayu_hex2rgba((isset($attr['boxShadowBtnColorHvr']) ? $attr['boxShadowBtnColorHvr'] : '#fff'), (isset($attr['boxShadowBtnColorOpacityHvr']) ? $attr['boxShadowBtnColorOpacityHvr'] : '50') ) .";";
		} 

    $css .= "}";

    if (isset($attr['fontSize'])){
    $fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
    $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-unfold-icon span,
    .wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-fold-icon span{";
    $css .= "font-size: {$attr['fontSize']}{$fontSizeUnit}; height:auto;width:auto;line-height:normal;";
    $css .= "}";
    }

    if (isset($attr['iconFontSize'])){
        $iconFontSizeUnit = isset($attr['iconFontSizeUnit']) ? $attr['iconFontSizeUnit'] : 'px';
        $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-unfold-icon span,
        .wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-fold-icon span{";
        $css .= "margin-right: {$attr['iconFontSize']}{$iconFontSizeUnit};";
        $css .= "}";
        }



    /******************/
    // Tablet style
    /******************/
    $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {";

    $css .= ".wp-block-vayu-blocks-unfold{";
    //padding
    if (isset($attr['paddingTypeTablet']) && 'unlinked' === $attr['paddingTypeTablet']) {
        $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
        $paddingTopTablet = isset($attr['paddingTopTablet']) ? $attr['paddingTopTablet'] : 0;
        $paddingRightTablet = isset($attr['paddingRightTablet']) ? $attr['paddingRightTablet'] : 0;
        $paddingBottomTablet = isset($attr['paddingBottomTablet']) ? $attr['paddingBottom'] : 0;
        $paddingLeftTablet = isset($attr['paddingLeftTablet']) ? $attr['paddingLeftTablet'] : 0;
        $css .= "padding-top: {$paddingTopTablet}{$paddingUnit}; 
        padding-right: {$paddingRightTablet}{$paddingUnit}; 
        padding-bottom: {$paddingBottomTablet}{$paddingUnit}; 
        padding-left: {$paddingLeftTablet}{$paddingUnit}; 
        ";
    } else {
        $paddingTablet = isset($attr['paddingTablet']) ? $attr['paddingTablet'] : 0;
        $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
        $css .= "padding: {$paddingTablet}{$paddingUnit};";
    }
    //margin
    if (isset($attr['marginTypeTablet']) && 'unlinked' === $attr['marginTypeTablet']) {
        $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
        $marginTopTablet = isset($attr['marginTopTablet']) ? $attr['marginTopTablet'] : 0;
        $marginBottomTablet = isset($attr['marginBottomTablet']) ? $attr['marginBottomTablet'] : 0;
        $marginLeftTablet = isset($attr['marginLeftTablet']) ? $attr['marginLeftTablet'] : 0;
        $marginRightTablet = isset($attr['marginRightTablet']) ? $attr['marginRightTablet'] : 0;
        $css .= "
        margin-top: {$marginTopTablet}{$marginUnit}; 
        margin-bottom: {$marginBottomTablet}{$marginUnit}; 
        margin-left: {$marginLeftTablet}{$marginUnit}; 
        margin-right: {$marginRightTablet}{$marginUnit}; 
        ";
    } else {
        $marginTablet = isset($attr['marginTablet']) ? $attr['marginTablet'] : 0;
        $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
        $css .= "margin: {$marginTablet}{$marginUnit}; 
       ";
    }

    //border-width
		if (isset($attr['borderWidthTypeTablet']) && 'unlinked' === $attr['borderWidthTypeTablet']) {
			$borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
			$borderWidthTopTablet = isset($attr['borderWidthTopTablet']) ? $attr['borderWidthTopTablet'] : 0;
			$borderWidthRightTablet = isset($attr['borderWidthRightTablet']) ? $attr['borderWidthRightTablet'] : 0;
			$borderWidthBottomTablet = isset($attr['borderWidthBottomTablet']) ? $attr['borderWidthBottomTablet'] : 0;
			$borderWidthLeftTablet = isset($attr['borderWidthLeftTablet']) ? $attr['borderWidthLeftTablet'] : 0;
			$css .= "border-top-width: {$borderWidthTopTablet}{$borderWidthUnit}; 
			border-right-width: {$borderWidthRightTablet}{$borderWidthUnit}; 
			border-bottom-width: {$borderWidthBottomTablet}{$borderWidthUnit}; 
			border-left-width: {$borderWidthLeftTablet}{$borderWidthUnit}; 
		   ";
		} else {
			$borderWidthTablet = isset($attr['borderWidthTablet']) ? $attr['borderWidthTablet'] : 0;
			$borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
			$css .= "border-width: {$borderWidthTablet}{$borderWidthUnit}; ";
		}
    
        //border-radius
		if (isset($attr['borderRadiusTypeTablet']) && 'unlinked' === $attr['borderRadiusTypeTablet']) {
			$borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
			$borderRadiusTopTablet = isset($attr['borderRadiusTopTablet']) ? $attr['borderRadiusTopTablet'] : 0;
			$borderRadiusRightTablet = isset($attr['borderRadiusRightTablet']) ? $attr['borderRadiusRightTablet'] : 0;
			$borderRadiusBottomTablet = isset($attr['borderRadiusBottomTablet']) ? $attr['borderRadiusBottomTablet'] : 0;
			$borderRadiusLeftTablet = isset($attr['borderRadiusLeftTablet']) ? $attr['borderRadiusLeftTablet'] : 0;
			$css .= "border-top-right-radius: {$borderRadiusTopTablet}{$borderRadiusUnit}; 
			  border-top-left-radius: {$borderRadiusRightTablet}{$borderRadiusUnit};
			  border-bottom-right-radius: {$borderRadiusBottomTablet}{$borderRadiusUnit};
			  border-bottom-left-radius: {$borderRadiusLeftTablet}{$borderRadiusUnit};
			 ";
		} else {
			$borderRadiusTablet = isset($attr['borderRadiusTablet']) ? $attr['borderRadiusTablet'] : 0;
			$borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
			$css .= "border-radius: {$borderRadiusTablet}{$borderRadiusUnit};";
		}

         // z-index
         $css .= (isset($attr['zindexTablet']) ? "z-index:{$attr['zindexTablet']};}" : '');

         $css .="}";
         //button content
         $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn{";
         //padding
		if (isset($attr['paddingBtnWrapTypeTablet']) && 'unlinked' === $attr['paddingBtnWrapTypeTablet']) {
			$paddingBtnWrapUnit = isset($attr['paddingBtnWrapUnit']) ? $attr['paddingBtnWrapUnit'] : 'px';
			$paddingBtnWrapTopTablet = isset($attr['paddingBtnWrapTopTablet']) ? $attr['paddingBtnWrapTopTablet'] : 0;
			$paddingBtnWrapRightTablet = isset($attr['paddingBtnWrapRightTablet']) ? $attr['paddingBtnWrapRightTablet'] : 0;
			$paddingBtnWrapBottomTablet = isset($attr['paddingBtnWrapBottomTablet']) ? $attr['paddingBtnWrapBottomTablet'] : 0;
			$paddingBtnWrapLeftTablet = isset($attr['paddingBtnWrapLeftTablet']) ? $attr['paddingBtnWrapLeftTablet'] : 0;
			$css .= "padding-top: {$paddingBtnWrapTopTablet}{$paddingBtnWrapUnit}; 
			padding-right: {$paddingBtnWrapRightTablet}{$paddingBtnWrapUnit}; 
			padding-bottom: {$paddingBtnWrapBottomTablet}{$paddingBtnWrapUnit}; 
			padding-left: {$paddingBtnWrapLeftTablet}{$paddingBtnWrapUnit}; 
		    ";
		} else {
			$paddingBtnWrapTablet = isset($attr['paddingBtnWrapTablet']) ? $attr['paddingBtnWrapTablet'] : '';
			$paddingBtnWrapUnit = isset($attr['paddingBtnWrapUnit']) ? $attr['paddingBtnWrapUnit'] : 'px';
			$css .= "padding: {$paddingBtnWrapTablet}{$paddingBtnWrapUnit};";
		}
        $css .= "}";

    
        if (isset($attr['contentMinHgtTablet'])) {
            $contentMinHgtUnit = isset($attr['contentMinHgtUnit']) ? $attr['contentMinHgtUnit'] : 'px';
            $css .= ".wp-block-vayu-blocks-unfold .unfold-content{max-height: {$attr['contentMinHgtTablet']}{$contentMinHgtUnit}; }";
        }else{
            $css .= ".wp-block-vayu-blocks-unfold .unfold-content{max-height: 150px; }";
        }
        

        $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button{";
        //Btnpadding
        if (isset($attr['paddingBtnTypeTablet']) && 'unlinked' === $attr['paddingBtnTypeTablet']) {
            $paddingBtnUnit = isset($attr['paddingBtnUnit']) ? $attr['paddingBtnUnit'] : 'px';
            $paddingBtnTopTablet = isset($attr['paddingBtnTopTablet']) ? $attr['paddingBtnTopTablet'] : 10;
            $paddingBtnRightTablet = isset($attr['paddingBtnRightTablet']) ? $attr['paddingBtnRightTablet'] : 20;
            $paddingBtnBottomTablet = isset($attr['paddingBtnBottomTablet']) ? $attr['paddingBtnBottomTablet'] : 10;
            $paddingBtnLeftTablet = isset($attr['paddingBtnLeftTablet']) ? $attr['paddingBtnLeftTablet'] : 20;
            $css .= "padding-top: {$paddingBtnTopTablet}{$paddingBtnUnit}; 
            padding-right: {$paddingBtnRightTablet}{$paddingBtnUnit}; 
            padding-bottom: {$paddingBtnBottomTablet}{$paddingBtnUnit}; 
            padding-left: {$paddingBtnLeftTablet}{$paddingBtnUnit}; 
            ";
        } else {
            $paddingBtnTablet = isset($attr['paddingBtnTablet']) ? $attr['paddingBtnTablet'] : '';
            $paddingBtnUnit = isset($attr['paddingBtnUnit']) ? $attr['paddingBtnUnit'] : 'px';
            $css .= "padding: {$paddingBtnTablet}{$paddingBtnUnit};";
        }

        //button border-width
		if (isset($attr['borderBtnWidthTypeTablet']) && 'unlinked' === $attr['borderBtnWidthTypeTablet']) {
			$borderBtnWidthUnit = isset($attr['borderBtnWidthUnit']) ? $attr['borderBtnWidthUnit'] : 'px';
			$borderBtnWidthTopTablet = isset($attr['borderBtnWidthTopTablet']) ? $attr['borderBtnWidthTopTablet'] : 0;
			$borderBtnWidthRightTablet = isset($attr['borderBtnWidthRightTablet']) ? $attr['borderBtnWidthRightTablet'] : 0;
			$borderBtnWidthBottomTablet = isset($attr['borderBtnWidthBottomTablet']) ? $attr['borderBtnWidthBottomTablet'] : 0;
			$borderBtnWidthLeftTablet = isset($attr['borderBtnWidthLeftTablet']) ? $attr['borderBtnWidthLeftTablet'] : 0;
			$css .= "border-top-width: {$borderBtnWidthTopTablet}{$borderBtnWidthUnit}; 
			border-right-width: {$borderBtnWidthRightTablet}{$borderBtnWidthUnit}; 
			border-bottom-width: {$borderBtnWidthBottomTablet}{$borderBtnWidthUnit}; 
			border-left-width: {$borderBtnWidthLeftTablet}{$borderBtnWidthUnit}; 
		   ";
		} else {
			$borderBtnWidthTablet = isset($attr['borderBtnWidthTablet']) ? $attr['borderBtnWidthTablet'] : 0;
			$borderBtnWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderBtnWidthUnit'] : 'px';
			$css .= "border-width: {$borderBtnWidthTablet}{$borderBtnWidthUnit}; ";
		}
    
        //button border-radius
		if (isset($attr['borderBtnRadiusTypeTablet']) && 'unlinked' === $attr['borderBtnRadiusTypeTablet']) {
			$borderBtnRadiusUnit = isset($attr['borderBtnRadiusUnit']) ? $attr['borderBtnRadiusUnit'] : 'px';
			$borderBtnRadiusTopTablet = isset($attr['borderBtnRadiusTopTablet']) ? $attr['borderBtnRadiusTopTablet'] : 0;
			$borderBtnRadiusRightTablet = isset($attr['borderBtnRadiusRightTablet']) ? $attr['borderBtnRadiusRightTablet'] : 0;
			$borderBtnRadiusBottomTablet = isset($attr['borderBtnRadiusBottomTablet']) ? $attr['borderBtnRadiusBottomTablet'] : 0;
			$borderBtnRadiusLeftTablet = isset($attr['borderBtnRadiusLeftTablet']) ? $attr['borderBtnRadiusLeftTablet'] : 0;
			$css .= "border-top-right-radius: {$borderBtnRadiusTopTablet}{$borderBtnRadiusUnit}; 
			  border-top-left-radius: {$borderBtnRadiusRightTablet}{$borderBtnRadiusUnit};
			  border-bottom-right-radius: {$borderBtnRadiusBottomTablet}{$borderBtnRadiusUnit};
			  border-bottom-left-radius: {$borderBtnRadiusLeftTablet}{$borderBtnRadiusUnit};
			 ";
		} else {
			$borderBtnRadiusTablet = isset($attr['borderBtnRadiusTablet']) ? $attr['borderBtnRadiusTablet'] : 0;
			$borderBtnRadiusUnit = isset($attr['borderBtnRadiusUnit']) ? $attr['borderBtnRadiusUnit'] : 'px';
			$css .= "border-radius: {$borderBtnRadiusTablet}{$borderBtnRadiusUnit};";
		}
        

        // Font size
		if (isset($attr['fontSizeTablet'])) {
			$fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
			$css .= "font-size: {$attr['fontSizeTablet']}{$fontSizeUnit}; ";
		}

        // Line height
		if (isset($attr['lineHeightTablet'])) {
			$lineHeightUnit = isset($attr['lineHeightUnit']) ? $attr['lineHeightUnit'] : 'px';
			$css .= "line-height: {$attr['lineHeightTablet']}{$lineHeightUnit}; ";
		}

		// Letter spacing
		if (isset($attr['letterSpacingTablet'])) {
			$letterSpacingUnit = isset($attr['letterSpacingUnit']) ? $attr['letterSpacingUnit'] : 'px';
			$css .= "letter-spacing: {$attr['letterSpacingTablet']}{$letterSpacingUnit}; ";
		}

        
        $css .= "}";

        $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button:hover{";
        //button border-width
		if (isset($attr['borderBtnWidthHvrTypeTablet']) && 'unlinked' === $attr['borderBtnWidthHvrTypeTablet']) {
			$borderBtnWidthHvrUnit = isset($attr['borderBtnWidthHvrUnit']) ? $attr['borderBtnWidthHvrUnit'] : 'px';
			$borderBtnWidthHvrTopTablet = isset($attr['borderBtnWidthHvrTopTablet']) ? $attr['borderBtnWidthHvrTopTablet'] : 0;
			$borderBtnWidthHvrRightTablet = isset($attr['borderBtnWidthHvrRightTablet']) ? $attr['borderBtnWidthHvrRightTablet'] : 0;
			$borderBtnWidthHvrBottomTablet = isset($attr['borderBtnWidthHvrBottomTablet']) ? $attr['borderBtnWidthHvrBottomTablet'] : 0;
			$borderBtnWidthHvrLeftTablet = isset($attr['borderBtnWidthHvrLeftTablet']) ? $attr['borderBtnWidthHvrLeftTablet'] : 0;
			$css .= "border-top-width: {$borderBtnWidthHvrTopTablet}{$borderBtnWidthHvrUnit}; 
			border-right-width: {$borderBtnWidthHvrRightTablet}{$borderBtnWidthHvrUnit}; 
			border-bottom-width: {$borderBtnWidthHvrBottomTablet}{$borderBtnWidthHvrUnit}; 
			border-left-width: {$borderBtnWidthHvrLeftTablet}{$borderBtnWidthHvrUnit}; 
		   ";
		} else {
			$borderBtnWidthHvrTablet = isset($attr['borderBtnWidthHvrTablet']) ? $attr['borderBtnWidthHvrTablet'] : '';
			$borderBtnWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderBtnWidthHvrUnit'] : 'px';
			$css .= "border-width: {$borderBtnWidthHvrTablet}{$borderBtnWidthHvrUnit}; ";
		}
    
        //button border-radius
		if (isset($attr['borderBtnRadiusHvrTypeTablet']) && 'unlinked' === $attr['borderBtnRadiusHvrTypeTablet']) {
			$borderBtnRadiusHvrUnit = isset($attr['borderBtnRadiusHvrUnit']) ? $attr['borderBtnRadiusHvrUnit'] : 'px';
			$borderBtnRadiusHvrTopTablet = isset($attr['borderBtnRadiusHvrTopTablet']) ? $attr['borderBtnRadiusHvrTopTablet'] : 0;
			$borderBtnRadiusHvrRightTablet = isset($attr['borderBtnRadiusHvrRightTablet']) ? $attr['borderBtnRadiusHvrRightTablet'] : 0;
			$borderBtnRadiusHvrBottomTablet = isset($attr['borderBtnRadiusHvrBottomTablet']) ? $attr['borderBtnRadiusHvrBottomTablet'] : 0;
			$borderBtnRadiusHvrLeftTablet = isset($attr['borderBtnRadiusHvrLeftTablet']) ? $attr['borderBtnRadiusHvrLeftTablet'] : 0;
			$css .= "border-top-right-radius: {$borderBtnRadiusHvrTopTablet}{$borderBtnRadiusHvrUnit}; 
			  border-top-left-radius: {$borderBtnRadiusHvrRightTablet}{$borderBtnRadiusHvrUnit};
			  border-bottom-right-radius: {$borderBtnRadiusHvrBottomTablet}{$borderBtnRadiusHvrUnit};
			  border-bottom-left-radius: {$borderBtnRadiusHvrLeftTablet}{$borderBtnRadiusHvrUnit};
			 ";
		} else {
			$borderBtnRadiusHvrTablet = isset($attr['borderBtnRadiusHvrTablet']) ? $attr['borderBtnRadiusHvrTablet'] : 0;
			$borderBtnRadiusHvrUnit = isset($attr['borderBtnRadiusHvrUnit']) ? $attr['borderBtnRadiusHvrUnit'] : 'px';
			$css .= "border-radius: {$borderBtnRadiusHvrTablet}{$borderBtnRadiusHvrUnit};";
		}
        $css .= "}";

        if (isset($attr['fontSizeTablet'])){
            $fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
            $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-unfold-icon span,
            .wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-fold-icon span{";
            $css .= "font-size: {$attr['fontSizeTablet']}{$fontSizeUnit}; height:auto;width:auto;line-height:normal;";
            $css .= "}";
            }
        
            if (isset($attr['iconFontSizeTablet'])){
                $iconFontSizeUnit = isset($attr['iconFontSizeUnit']) ? $attr['iconFontSizeUnit'] : 'px';
                $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-unfold-icon span,
                .wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-fold-icon span{";
                $css .= "margin-right: {$attr['iconFontSizeTablet']}{$iconFontSizeUnit};";
                $css .= "}";
                }
    
    $css .= "}";
    /******************/
    // Mobile style
    /******************/
    $css .= "@media only screen and (max-width: 767px) {";

    $css .= ".wp-block-vayu-blocks-unfold{";
    //padding
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
        $paddingMobile = isset($attr['paddingMobile']) ? $attr['paddingMobile'] : 0;
        $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
        $css .= "padding: {$paddingMobile}{$paddingUnit};";
    }
    
    //margin
    if (isset($attr['marginTypeMobile']) && 'unlinked' === $attr['marginTypeMobile']) {
        $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
        $marginTopMobile = isset($attr['marginTopMobile']) ? $attr['marginTopMobile'] : 0;
        $marginBottomMobile = isset($attr['marginBottomMobile']) ? $attr['marginBottomMobile'] : 0;
        $marginLeftMobile = isset($attr['marginLeftMobile']) ? $attr['marginLeftMobile'] : 0;
        $marginRightMobile = isset($attr['marginRightMobile']) ? $attr['marginRightMobile'] : 0;
        $css .= "
        margin-top: {$marginTopMobile}{$marginUnit}; 
        margin-bottom: {$marginBottomMobile}{$marginUnit}; 
        margin-left: {$marginLeftMobile}{$marginUnit}; 
        margin-right: {$marginRightMobile}{$marginUnit}; 
        ";
    } else {
        $marginMobile = isset($attr['marginMobile']) ? $attr['marginMobile'] : 0;
        $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
        $css .= "margin: {$marginMobile}{$marginUnit};";
    }

    //border-width
    if (isset($attr['borderWidthTypeMobile']) && 'unlinked' === $attr['borderWidthTypeMobile']) {
        $borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
        $borderWidthTopMobile = isset($attr['borderWidthTopMobile']) ? $attr['borderWidthTopMobile'] : 0;
        $borderWidthRightMobile = isset($attr['borderWidthRightMobile']) ? $attr['borderWidthRightMobile'] : 0;
        $borderWidthBottomMobile = isset($attr['borderWidthBottomMobile']) ? $attr['borderWidthBottomMobile'] : 0;
        $borderWidthLeftMobile = isset($attr['borderWidthLeftMobile']) ? $attr['borderWidthLeftMobile'] : 0;
        $css .= "border-top-width: {$borderWidthTopMobile}{$borderWidthUnit}; 
        border-right-width: {$borderWidthRightMobile}{$borderWidthUnit}; 
        border-bottom-width: {$borderWidthBottomMobile}{$borderWidthUnit}; 
        border-left-width: {$borderWidthLeftMobile}{$borderWidthUnit}; 
        ";
    } else {
        $borderWidthMobile = isset($attr['borderWidthMobile']) ? $attr['borderWidthMobile'] : 0;
        $borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
        $css .= "border-width: {$borderWidthMobile}{$borderWidthUnit};";
    }

    //border-radius
    if (isset($attr['borderRadiusTypeMobile']) && 'unlinked' === $attr['borderRadiusTypeMobile']) {
        $borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
        $borderRadiusTopMobile = isset($attr['borderRadiusTopMobile']) ? $attr['borderRadiusTopMobile'] : 0;
        $borderRadiusRightMobile = isset($attr['borderRadiusRightMobile']) ? $attr['borderRadiusRightMobile'] : 0;
        $borderRadiusBottomMobile = isset($attr['borderRadiusBottomMobile']) ? $attr['borderRadiusBottomMobile'] : 0;
        $borderRadiusLeftMobile = isset($attr['borderRadiusLeftMobile']) ? $attr['borderRadiusLeftMobile'] : 0;
        $css .= "border-top-right-radius: {$borderRadiusTopMobile}{$borderRadiusUnit}; 
        border-top-left-radius: {$borderRadiusRightMobile}{$borderRadiusUnit};
        border-bottom-right-radius: {$borderRadiusBottomMobile}{$borderRadiusUnit};
        border-bottom-left-radius: {$borderRadiusLeftMobile}{$borderRadiusUnit};
        ";
    } else {
        $borderRadiusMobile = isset($attr['borderRadiusMobile']) ? $attr['borderRadiusMobile'] : 0;
        $borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
        $css .= "border-radius: {$borderRadiusMobile}{$borderRadiusUnit};";
    }

    // z-index
    $css .= (isset($attr['zindexMobile']) ? "z-index:{$attr['zindexMobile']};" : '');

    $css .= "}";

    //button content
    $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn{";
    //padding
    if (isset($attr['paddingBtnWrapTypeMobile']) && 'unlinked' === $attr['paddingBtnWrapTypeMobile']) {
        $paddingBtnWrapUnit = isset($attr['paddingBtnWrapUnit']) ? $attr['paddingBtnWrapUnit'] : 'px';
        $paddingBtnWrapTopMobile = isset($attr['paddingBtnWrapTopMobile']) ? $attr['paddingBtnWrapTopMobile'] : 0;
        $paddingBtnWrapRightMobile = isset($attr['paddingBtnWrapRightMobile']) ? $attr['paddingBtnWrapRightMobile'] : 0;
        $paddingBtnWrapBottomMobile = isset($attr['paddingBtnWrapBottomMobile']) ? $attr['paddingBtnWrapBottomMobile'] : 0;
        $paddingBtnWrapLeftMobile = isset($attr['paddingBtnWrapLeftMobile']) ? $attr['paddingBtnWrapLeftMobile'] : 0;
        $css .= "padding-top: {$paddingBtnWrapTopMobile}{$paddingBtnWrapUnit}; 
            padding-right: {$paddingBtnWrapRightMobile}{$paddingBtnWrapUnit}; 
            padding-bottom: {$paddingBtnWrapBottomMobile}{$paddingBtnWrapUnit}; 
            padding-left: {$paddingBtnWrapLeftMobile}{$paddingBtnWrapUnit}; 
        ";
    } else {
        $paddingBtnWrapMobile = isset($attr['paddingBtnWrapMobile']) ? $attr['paddingBtnWrapMobile'] : '';
        $paddingBtnWrapUnit = isset($attr['paddingBtnWrapUnit']) ? $attr['paddingBtnWrapUnit'] : 'px';
        $css .= "padding: {$paddingBtnWrapMobile}{$paddingBtnWrapUnit};";
    }
    $css .= "}";

    
    
    if (isset($attr['contentMinHgtMobile'])) {
        $contentMinHgtUnit = isset($attr['contentMinHgtUnit']) ? $attr['contentMinHgtUnit'] : 'px';
        $css .= ".wp-block-vayu-blocks-unfold .unfold-content{max-height: {$attr['contentMinHgtMobile']}{$contentMinHgtUnit}; }";
    } else {
        $css .= ".wp-block-vayu-blocks-unfold .unfold-content{max-height: 150px; }";
    }
   
    

    $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button{";
    // Btn padding
    if (isset($attr['paddingBtnTypeMobile']) && 'unlinked' === $attr['paddingBtnTypeMobile']) {
        $paddingBtnUnit = isset($attr['paddingBtnUnit']) ? $attr['paddingBtnUnit'] : 'px';
        $paddingBtnTopMobile = isset($attr['paddingBtnTopMobile']) ? $attr['paddingBtnTopMobile'] : 10;
        $paddingBtnRightMobile = isset($attr['paddingBtnRightMobile']) ? $attr['paddingBtnRightMobile'] : 20;
        $paddingBtnBottomMobile = isset($attr['paddingBtnBottomMobile']) ? $attr['paddingBtnBottomMobile'] : 10;
        $paddingBtnLeftMobile = isset($attr['paddingBtnLeftMobile']) ? $attr['paddingBtnLeftMobile'] : 20;
        $css .= "padding-top: {$paddingBtnTopMobile}{$paddingBtnUnit}; 
            padding-right: {$paddingBtnRightMobile}{$paddingBtnUnit}; 
            padding-bottom: {$paddingBtnBottomMobile}{$paddingBtnUnit}; 
            padding-left: {$paddingBtnLeftMobile}{$paddingBtnUnit}; 
        ";
    } else {
        $paddingBtnMobile = isset($attr['paddingBtnMobile']) ? $attr['paddingBtnMobile'] : '';
        $paddingBtnUnit = isset($attr['paddingBtnUnit']) ? $attr['paddingBtnUnit'] : 'px';
        $css .= "padding: {$paddingBtnMobile}{$paddingBtnUnit};";
    }
    
    // Button border-width
    if (isset($attr['borderBtnWidthTypeMobile']) && 'unlinked' === $attr['borderBtnWidthTypeMobile']) {
        $borderBtnWidthUnit = isset($attr['borderBtnWidthUnit']) ? $attr['borderBtnWidthUnit'] : 'px';
        $borderBtnWidthTopMobile = isset($attr['borderBtnWidthTopMobile']) ? $attr['borderBtnWidthTopMobile'] : 0;
        $borderBtnWidthRightMobile = isset($attr['borderBtnWidthRightMobile']) ? $attr['borderBtnWidthRightMobile'] : 0;
        $borderBtnWidthBottomMobile = isset($attr['borderBtnWidthBottomMobile']) ? $attr['borderBtnWidthBottomMobile'] : 0;
        $borderBtnWidthLeftMobile = isset($attr['borderBtnWidthLeftMobile']) ? $attr['borderBtnWidthLeftMobile'] : 0;
        $css .= "border-top-width: {$borderBtnWidthTopMobile}{$borderBtnWidthUnit}; 
            border-right-width: {$borderBtnWidthRightMobile}{$borderBtnWidthUnit}; 
            border-bottom-width: {$borderBtnWidthBottomMobile}{$borderBtnWidthUnit}; 
            border-left-width: {$borderBtnWidthLeftMobile}{$borderBtnWidthUnit}; 
        ";
    } else {
        $borderBtnWidthMobile = isset($attr['borderBtnWidthMobile']) ? $attr['borderBtnWidthMobile'] : 0;
        $borderBtnWidthUnit = isset($attr['borderBtnWidthUnit']) ? $attr['borderBtnWidthUnit'] : 'px';
        $css .= "border-width: {$borderBtnWidthMobile}{$borderBtnWidthUnit}; ";
    }
    
    // Button border-radius
    if (isset($attr['borderBtnRadiusTypeMobile']) && 'unlinked' === $attr['borderBtnRadiusTypeMobile']) {
        $borderBtnRadiusUnit = isset($attr['borderBtnRadiusUnit']) ? $attr['borderBtnRadiusUnit'] : 'px';
        $borderBtnRadiusTopMobile = isset($attr['borderBtnRadiusTopMobile']) ? $attr['borderBtnRadiusTopMobile'] : 0;
        $borderBtnRadiusRightMobile = isset($attr['borderBtnRadiusRightMobile']) ? $attr['borderBtnRadiusRightMobile'] : 0;
        $borderBtnRadiusBottomMobile = isset($attr['borderBtnRadiusBottomMobile']) ? $attr['borderBtnRadiusBottomMobile'] : 0;
        $borderBtnRadiusLeftMobile = isset($attr['borderBtnRadiusLeftMobile']) ? $attr['borderBtnRadiusLeftMobile'] : 0;
        $css .= "border-top-right-radius: {$borderBtnRadiusTopMobile}{$borderBtnRadiusUnit}; 
            border-top-left-radius: {$borderBtnRadiusRightMobile}{$borderBtnRadiusUnit};
            border-bottom-right-radius: {$borderBtnRadiusBottomMobile}{$borderBtnRadiusUnit};
            border-bottom-left-radius: {$borderBtnRadiusLeftMobile}{$borderBtnRadiusUnit};
        ";
    } else {
        $borderBtnRadiusMobile = isset($attr['borderBtnRadiusMobile']) ? $attr['borderBtnRadiusMobile'] : 0;
        $borderBtnRadiusUnit = isset($attr['borderBtnRadiusUnit']) ? $attr['borderBtnRadiusUnit'] : 'px';
        $css .= "border-radius: {$borderBtnRadiusMobile}{$borderBtnRadiusUnit};";
    }
    
    // Font size
    if (isset($attr['fontSizeMobile'])) {
        $fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
        $css .= "font-size: {$attr['fontSizeMobile']}{$fontSizeUnit}; ";
    }
    
    // Line height
    if (isset($attr['lineHeightMobile'])) {
        $lineHeightUnit = isset($attr['lineHeightUnit']) ? $attr['lineHeightUnit'] : 'px';
        $css .= "line-height: {$attr['lineHeightMobile']}{$lineHeightUnit}; ";
    }
    
    // Letter spacing
    if (isset($attr['letterSpacingMobile'])) {
        $letterSpacingUnit = isset($attr['letterSpacingUnit']) ? $attr['letterSpacingUnit'] : 'px';
        $css .= "letter-spacing: {$attr['letterSpacingMobile']}{$letterSpacingUnit}; ";
    }
    
    $css .= "}";
    
    $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button:hover {";
        
    // button border-width on hover (mobile)
    if (isset($attr['borderBtnWidthHvrTypeMobile']) && 'unlinked' === $attr['borderBtnWidthHvrTypeMobile']) {
        $borderBtnWidthHvrUnit = isset($attr['borderBtnWidthHvrUnit']) ? $attr['borderBtnWidthHvrUnit'] : 'px';
        $borderBtnWidthHvrTopMobile = isset($attr['borderBtnWidthHvrTopMobile']) ? $attr['borderBtnWidthHvrTopMobile'] : 0;
        $borderBtnWidthHvrRightMobile = isset($attr['borderBtnWidthHvrRightMobile']) ? $attr['borderBtnWidthHvrRightMobile'] : 0;
        $borderBtnWidthHvrBottomMobile = isset($attr['borderBtnWidthHvrBottomMobile']) ? $attr['borderBtnWidthHvrBottomMobile'] : 0;
        $borderBtnWidthHvrLeftMobile = isset($attr['borderBtnWidthHvrLeftMobile']) ? $attr['borderBtnWidthHvrLeftMobile'] : 0;
        $css .= "border-top-width: {$borderBtnWidthHvrTopMobile}{$borderBtnWidthHvrUnit}; 
                 border-right-width: {$borderBtnWidthHvrRightMobile}{$borderBtnWidthHvrUnit}; 
                 border-bottom-width: {$borderBtnWidthHvrBottomMobile}{$borderBtnWidthHvrUnit}; 
                 border-left-width: {$borderBtnWidthHvrLeftMobile}{$borderBtnWidthHvrUnit}; 
                ";
    } else {
        $borderBtnWidthHvrMobile = isset($attr['borderBtnWidthHvrMobile']) ? $attr['borderBtnWidthHvrMobile'] : 0;
        $borderBtnWidthHvrUnit = isset($attr['borderBtnWidthHvrUnit']) ? $attr['borderBtnWidthHvrUnit'] : 'px';
        $css .= "border-width: {$borderBtnWidthHvrMobile}{$borderBtnWidthHvrUnit}; ";
    }
    
    // button border-radius on hover (mobile)
    if (isset($attr['borderBtnRadiusHvrTypeMobile']) && 'unlinked' === $attr['borderBtnRadiusHvrTypeMobile']) {
        $borderBtnRadiusHvrUnit = isset($attr['borderBtnRadiusHvrUnit']) ? $attr['borderBtnRadiusHvrUnit'] : 'px';
        $borderBtnRadiusHvrTopMobile = isset($attr['borderBtnRadiusHvrTopMobile']) ? $attr['borderBtnRadiusHvrTopMobile'] : 0;
        $borderBtnRadiusHvrRightMobile = isset($attr['borderBtnRadiusHvrRightMobile']) ? $attr['borderBtnRadiusHvrRightMobile'] : 0;
        $borderBtnRadiusHvrBottomMobile = isset($attr['borderBtnRadiusHvrBottomMobile']) ? $attr['borderBtnRadiusHvrBottomMobile'] : 0;
        $borderBtnRadiusHvrLeftMobile = isset($attr['borderBtnRadiusHvrLeftMobile']) ? $attr['borderBtnRadiusHvrLeftMobile'] : 0;
        $css .= "border-top-right-radius: {$borderBtnRadiusHvrTopMobile}{$borderBtnRadiusHvrUnit}; 
                 border-top-left-radius: {$borderBtnRadiusHvrRightMobile}{$borderBtnRadiusHvrUnit};
                 border-bottom-right-radius: {$borderBtnRadiusHvrBottomMobile}{$borderBtnRadiusHvrUnit};
                 border-bottom-left-radius: {$borderBtnRadiusHvrLeftMobile}{$borderBtnRadiusHvrUnit};
                ";
    } else {
        $borderBtnRadiusHvrMobile = isset($attr['borderBtnRadiusHvrMobile']) ? $attr['borderBtnRadiusHvrMobile'] : 0;
        $borderBtnRadiusHvrUnit = isset($attr['borderBtnRadiusHvrUnit']) ? $attr['borderBtnRadiusHvrUnit'] : 'px';
        $css .= "border-radius: {$borderBtnRadiusHvrMobile}{$borderBtnRadiusHvrUnit};";
    }
    
    $css .= "}";

    if (isset($attr['fontSizeMobile'])){
        $fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
        $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-unfold-icon span,
        .wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-fold-icon span{";
        $css .= "font-size: {$attr['fontSizeMobile']}{$fontSizeUnit}; height:auto;width:auto;line-height:normal;";
        $css .= "}";
        }
    
        if (isset($attr['iconFontSizeMobile'])){
            $iconFontSizeUnit = isset($attr['iconFontSizeUnit']) ? $attr['iconFontSizeUnit'] : 'px';
            $css .= ".wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-unfold-icon span,
            .wp-block-vayu-blocks-unfold .unfold-content-btn .unfold-button .btn-fold-icon span{";
            $css .= "margin-right: {$attr['iconFontSizeMobile']}{$iconFontSizeUnit};";
            $css .= "}";
            }
    

    
    $css .= "}";

    if (isset($attr['responsiveTogHideDesktop']) && $attr['responsiveTogHideDesktop'] == true){
        $css .= "@media only screen and (min-width: 1024px) {.wp-block-vayu-blocks-unfold{display:none;}}";
    }
    //hide on Tablet
    if (isset($attr['responsiveTogHideTablet']) && $attr['responsiveTogHideTablet'] == true){
        $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) { .wp-block-vayu-blocks-unfold{display:none;}}";
    }
    //hide on Mobile
    if (isset($attr['responsiveTogHideMobile']) && $attr['responsiveTogHideMobile'] == true){
        $css .= "@media only screen and (max-width: 767px) {.wp-block-vayu-blocks-unfold{display:none;}}";
    }

    return $css;


}