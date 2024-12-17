<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_advance_container_style($attr){

    $css = '';

    if(isset( $attr['uniqueID'] )){
	

		$options = (new VAYU_BLOCKS_OPTION_PANEL())->get_option();
		// Access the container settings
		$container_width = $options['global']['containerWidth'];
		$container_gap   = $options['global']['containerGap'];
		$globalpadding   = $options['global']['containerPadding'];

        
		$css .= ".th-c{$attr['uniqueID']}.boxed-content > .th-inside-content-wrap{";
        // boxed-width
		if (isset($attr['boxedcontentWidth'])) {
			$boxedcontentWidthUnit = isset($attr['boxedcontentWidthUnit']) ? $attr['boxedcontentWidthUnit'] : 'px';
			$css .= "max-width: {$attr['boxedcontentWidth']}{$boxedcontentWidthUnit}; margin: auto;";

		}else{
            $css .= "max-width:{$container_width}px;margin: auto;";
        }
        $css .= "}";

        $css .= ".th-c{$attr['uniqueID']}.fullwidth-content{";
            // full-width
            if (isset($attr['fullcontentWidth'])) {
                $fullcontentWidthUnit = isset($attr['fullcontentWidthUnit']) ? $attr['fullcontentWidthUnit'] : '%';
                $css .= "max-width: 100%;
				width: {$attr['fullcontentWidth']}{$fullcontentWidthUnit};
				margin-left: auto;
				margin-right: auto; ";
            }else{
                $css .= "max-width:100%;
				
				margin-left: auto;
				margin-right: auto;";
            }
       $css .= "}";


       $css .= ".th-c{$attr['uniqueID']}{";
      
       // min-height
       if (isset($attr['contentMinHgt'])) {
            $contentMinHgtUnit = isset($attr['contentMinHgtUnit']) ? $attr['contentMinHgtUnit'] : 'px';
            $css .= "min-height: {$attr['contentMinHgt']}{$contentMinHgtUnit}; ";
        }else{
            $css .= "min-height:auto;";
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
			$padding = isset($attr['padding']) ? $attr['padding'] : $globalpadding;
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

        //z-index
		$css .= isset( $attr['zindex'] ) ? "z-index:{$attr['zindex'] };" : '';

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
		
		//transition duration
		$css .= "transition: all ". (isset($attr['transitionAll']) ? $attr['transitionAll'] : '0.2' ). "s ease;";
        //position property

		$css .= "position: " . (isset($attr['position']) ? $attr['position'] : 'relative' ). ";";
		
		if(isset($attr['horizontalOrientation']) && 'left' === $attr['horizontalOrientation']  && 'relative' !== $attr['position']){
			$horizontalOrientationOffset = isset($attr['horizontalOrientationOffset']) ? $attr['horizontalOrientationOffset'] : '0';
			$horizontalOrientationOffsetUnit = isset($attr['horizontalOrientationOffsetUnit']) ? $attr['horizontalOrientationOffsetUnit'] : 'px';
            $css .= "left: {$horizontalOrientationOffset}{$horizontalOrientationOffsetUnit};";
		}
		if(isset($attr['horizontalOrientation']) && 'right' === $attr['horizontalOrientation'] && 'relative' !== $attr['position']){
			$horizontalOrientationOffsetRight = isset($attr['horizontalOrientationOffsetRight']) ? $attr['horizontalOrientationOffsetRight'] : '0';
			$horizontalOrientationOffsetRightUnit = isset($attr['horizontalOrientationOffsetRightUnit']) ? $attr['horizontalOrientationOffsetRightUnit'] : 'px';
            $css .= "right: {$horizontalOrientationOffsetRight}{$horizontalOrientationOffsetRightUnit};";
		}
		if(isset($attr['verticalOrientation']) && 'top' === $attr['verticalOrientation'] && 'relative' !== $attr['position']){
			$verticalOrientationOffsetTop = isset($attr['verticalOrientationOffsetTop']) ? $attr['verticalOrientationOffsetTop'] : '0';
			$verticalOrientationOffsetTopUnit = isset($attr['verticalOrientationOffsetTopUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
            $css .= "top: {$verticalOrientationOffsetTop}{$verticalOrientationOffsetTopUnit};";
		}
		if(isset($attr['verticalOrientation']) && 'bottom' === $attr['verticalOrientation'] && 'relative' !== $attr['position']){
			$verticalOrientationOffsetBottom = isset($attr['verticalOrientationOffsetBottom']) ? $attr['verticalOrientationOffsetBottom'] : '0';
			$verticalOrientationOffsetBottomUnit = isset($attr['verticalOrientationOffsetBottomUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
            $css .= "bottom: {$verticalOrientationOffsetBottom}{$verticalOrientationOffsetBottomUnit};";
		}

        // flex properties
		$css .= "align-self: " . (isset($attr['alignSelf']) ? $attr['alignSelf'] : 'inherit;' ). ";";
        if(isset($attr['order']) && $attr['order'] === 'start'){
			$css .= "order:-9999;";
		}elseif(isset($attr['order']) && $attr['order'] === 'end'){
			$css .= "order:9999;";
		}elseif(isset($attr['order']) && $attr['order'] === 'custom'){
		$css .= isset( $attr['customOrder'] ) ? "order:{$attr['customOrder']};" : '';
		}

		//flex size
        if(isset($attr['flexSize']) && $attr['flexSize'] === 'none'){
			
			$css .= "flex-grow:0;
				flex-shrink:0;";
		
		}elseif(isset($attr['flexSize']) && $attr['flexSize'] === 'grow'){
			$css .= "flex-grow:1;
			flex-shrink:0;";

		}elseif(isset($attr['flexSize']) && $attr['flexSize'] === 'shrink'){
			$css .= "flex-grow:0;
			flex-shrink:1;";
		}elseif(isset($attr['flexSize']) && $attr['flexSize'] === 'custom'){
			$css .= isset( $attr['FlexGrowSize'] ) ? "flex-grow:{$attr['FlexGrowSize']};" : '';
            $css .= isset( $attr['FlexShrinkSize'] ) ? "flex-shrink:{$attr['FlexShrinkSize']};" : '';
		}

        $css .= "}";
        
        // overlay
        $css .= ".th-c{$attr['uniqueID']} > .wp-block-th-blocks-container-overlay{";
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
        $css .= "border-radius:inherit";
        $css .= "}";

        // overlay hover
        $css .= ".th-c{$attr['uniqueID']}:hover > .wp-block-th-blocks-container-overlay{";
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
            $css .= "border-radius:inherit";
            $css .= "}";

        //inside wrap
        $css .= ".th-c{$attr['uniqueID']} > .th-inside-content-wrap{";

			// min-height
			if (isset($attr['contentMinHgt'])) {
				$contentMinHgtUnit = isset($attr['contentMinHgtUnit']) ? $attr['contentMinHgtUnit'] : 'px';
				$css .= "min-height: {$attr['contentMinHgt']}{$contentMinHgtUnit}; ";
			}else{
				$css .= "min-height:auto;";
			}

             //flex-direction
             $css .= isset($attr['direction']) ? "flex-direction: {$attr['direction']}; " : '';
             //justifiy-content
             $css .= isset($attr['Justify']) ? "justify-content: {$attr['Justify']}; " : '';
             //align-Items
             $css .= isset($attr['AlignItem']) ? "align-items: {$attr['AlignItem']}; " : '';
             //flex-wrap
             $css .= isset($attr['Wrap']) ? "flex-wrap: {$attr['Wrap']}; " : '';
			 
             //  align content
             if (isset($attr['Wrap']) && $attr['Wrap']=='wrap') {
             $css .= isset($attr['AlignContent']) ? "align-content: {$attr['AlignContent']}; " : '';
             }

			 //gap
			 $elementGap = isset($attr['elementGap']) ? $attr['elementGap'] : $container_gap;	
			 $elementGapUnit = isset($attr['elementGapUnit']) ? $attr['elementGapUnit'] : 'px';
             $css .= "gap: {$elementGap}{$elementGapUnit};";
		

        $css .= "}";

        // Hover
        $css .= ".th-c{$attr['uniqueID']}:hover{";
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
			
			$css .= "transition: all ". (isset($attr['transitionAll']) ? $attr['transitionAll'] : '0.2' ). "s ease;";

        $css .= "}";

	//shaper
	    $css .= ".th-c{$attr['uniqueID']} > .th-shaper .th-shape-top svg{";	
		$css .= isset( $attr['shapeTopWidth'] ) ? "width:{$attr['shapeTopWidth'] }%;" : '';
		$css .= isset( $attr['shapeTopHeight'] ) ? "height:{$attr['shapeTopHeight'] }px;" : '';
	    $css .= "}";

		$css .= ".th-c{$attr['uniqueID']} > .th-shaper .th-shape-bottom svg{";	
		$css .= isset( $attr['shapeBottomWidth'] ) ? "width:{$attr['shapeBottomWidth'] }%;" : '';
		$css .= isset( $attr['shapeBottomHeight'] ) ? "height:{$attr['shapeBottomHeight'] }px;" : '';
		$css .= "}";

		$css .= ".th-c{$attr['uniqueID']} > .th-shaper .th-shape-top {";
		$css .= isset( $attr['shapeTopFront'] ) ? "z-index:1" : 'z-index:0';	
		$css .= "}";

		$css .= ".th-c{$attr['uniqueID']} > .th-shaper .th-shape-bottom {";
		$css .= isset( $attr['shapeBottomFront'] ) ? "z-index:1" : 'z-index:0';	
		$css .= "}";

      //    tablet view
      $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {";
      
      $css .= ".th-c{$attr['uniqueID']}.boxed-content > .th-inside-content-wrap{";
            // boxed-width
            if (isset($attr['boxedcontentWidthTablet'])) {
                $boxedcontentWidthUnit = isset($attr['boxedcontentWidthUnitTablet']) ? $attr['boxedcontentWidthUnitTablet'] : '%';
                $css .= "max-width: {$attr['boxedcontentWidthTablet']}{$boxedcontentWidthUnit}; ";
            }else{
                $css .= "max-width:100%;";
            }
			
            $css .= "}";
    
            $css .= ".th-c{$attr['uniqueID']}.fullwidth-content{";
              
                if (isset($attr['fullcontentWidthTablet'])){
                    $fullcontentWidthUnitTablet = isset($attr['fullcontentWidthUnitTablet']) ? $attr['fullcontentWidthUnitTablet'] : '%';
                    $css .= "max-width: {$attr['fullcontentWidthTablet']}{$fullcontentWidthUnitTablet}; 
					width: {$attr['fullcontentWidthTablet']}{$fullcontentWidthUnitTablet};
					margin-left: auto;
					margin-right: auto;";
                }else{
                    $css .= "
					
					max-width: {100%};
					margin-left: auto;
					margin-right: auto;";
                }
           $css .= "}";
    
    
           $css .= ".th-c{$attr['uniqueID']}{";
          
           // min-height
           if (isset($attr['contentMinHgtTablet'])) {
                $contentMinHgtUnit = isset($attr['contentMinHgtUnit']) ? $attr['contentMinHgtUnit'] : 'px';
                $css .= "min-height: {$attr['contentMinHgtTablet']}{$contentMinHgtUnit}; ";
            }else{
                $css .= "min-height: auto;";
            }
    
    
           //flex-direction
            $css .= isset($attr['directionTablet']) ? "flex-direction: {$attr['directionTablet']}; " : '';
            //justifiy-content
            $css .= isset($attr['directionTablet']) ? "flex-direction: {$attr['directionTablet']}; " : '';
            if (isset($attr['paddingTypeTablet']) && 'unlinked' === $attr['paddingTypeTablet']) {
				$paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
				$paddingTopTablet = isset($attr['paddingTopTablet']) ? $attr['paddingTopTablet'] : 0;
				$paddingRightTablet = isset($attr['paddingRightTablet']) ? $attr['paddingRightTablet'] : 0;
				$paddingBottomTablet = isset($attr['paddingBottomTablet']) ? $attr['paddingBottomTablet'] : 0;
				$paddingLeftTablet = isset($attr['paddingLeftTablet']) ? $attr['paddingLeftTablet'] : 0;
				$paddingTablet = "{$paddingTopTablet}{$paddingUnit} {$paddingRightTablet}{$paddingUnit} {$paddingBottomTablet}{$paddingUnit} {$paddingLeftTablet}{$paddingUnit}";
			    $css .= "padding: {$paddingTablet};";
			} else {
				$paddingTablet = isset($attr['paddingTablet']) ? $attr['paddingTablet'] : $globalpadding;
				$paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
				$paddingTablet = "{$paddingTablet}{$paddingUnit}";
				$css .= "padding: {$paddingTablet};";
			}

			//for margin tablet
			if (isset($attr['marginTypeTablet']) && 'unlinked' === $attr['marginTypeTablet']) {
				$marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
				$marginTopTablet = isset($attr['marginTopTablet']) ? $attr['marginTopTablet'] : 0;
				$marginBottomTablet = isset($attr['marginBottomTablet']) ? $attr['marginBottomTablet'] : 0;
				$marginLeftTablet = isset($attr['marginLeftTablet']) ? $attr['marginLeftTablet'] : 0;
				$marginRightTablet = isset($attr['marginRightTablet']) ? $attr['marginRightTablet'] : 0;
                $css .="
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

            //for border-width tablet
			if (isset($attr['borderWidthTypeTablet']) && 'unlinked' === $attr['borderWidthTypeTablet']) {
				$borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
				$borderWidthTopTablet = isset($attr['borderWidthTopTablet']) ? $attr['borderWidthTopTablet'] : 0;
				$borderWidthRightTablet = isset($attr['borderWidthRightTablet']) ? $attr['borderWidthRightTablet'] : 0;
				$borderWidthBottomTablet = isset($attr['borderWidthBottomTablet']) ? $attr['borderWidthBottomTablet'] : 0;
				$borderWidthLeftTablet = isset($attr['borderWidthLeftTablet']) ? $attr['borderWidthLeftTablet'] : 0;
				$css .= "border-top-width: {$borderWidthTopTablet}{$borderWidthUnit}; border-right-width: {$borderWidthRightTablet}{$borderWidthUnit}; border-bottom-width: {$borderWidthBottomTablet}{$borderWidthUnit}; border-left-width: {$borderWidthLeftTablet}{$borderWidthUnit};";
			} else {
				$borderWidthTablet = isset($attr['borderWidthTablet']) ? $attr['borderWidthTablet'] : 0;
				$borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
				$css .= "border-width: {$borderWidthTablet}{$borderWidthUnit};";
			}

			//for border-radius tablet
			if (isset($attr['borderRadiusTypeTablet']) && 'unlinked' === $attr['borderRadiusTypeTablet']) {
				$borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
				$borderRadiusTopTablet = isset($attr['borderRadiusTopTablet']) ? $attr['borderRadiusTopTablet'] : 0;
				$borderRadiusRightTablet = isset($attr['borderRadiusRightTablet']) ? $attr['borderRadiusRightTablet'] : 0;
				$borderRadiusBottomTablet = isset($attr['borderRadiusBottomTablet']) ? $attr['borderRadiusBottomTablet'] : 0;
				$borderRadiusLeftTablet = isset($attr['borderRadiusLeftTablet']) ? $attr['borderRadiusLeftTablet'] : 0;
				$css .= "border-top-right-radius: {$borderRadiusTopTablet}{$borderRadiusUnit}; border-top-left-radius: {$borderRadiusRightTablet}{$borderRadiusUnit}; border-bottom-right-radius: {$borderRadiusBottomTablet}{$borderRadiusUnit}; border-bottom-left-radius: {$borderRadiusLeftTablet}{$borderRadiusUnit};";
			} else {
				$borderRadiusTablet = isset($attr['borderRadiusTablet']) ? $attr['borderRadiusTablet'] : 0;
				$borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
				$css .= "border-radius: {$borderRadiusTablet}{$borderRadiusUnit};";
			}
            $css .= (isset($attr['zindexTablet']) ? "z-index:{$attr['zindexTablet']};}" : '');
            //position

			if(isset($attr['horizontalOrientation']) && 'left' === $attr['horizontalOrientation']  && 'relative' !== $attr['position']){
				$horizontalOrientationOffsetTablet = isset($attr['horizontalOrientationOffsetTablet']) ? $attr['horizontalOrientationOffsetTablet'] : '0';
				$horizontalOrientationOffsetUnit = isset($attr['horizontalOrientationOffsetUnit']) ? $attr['horizontalOrientationOffsetUnit'] : 'px';
				$css .= "left: {$horizontalOrientationOffsetTablet}{$horizontalOrientationOffsetUnit};";
			}
			if(isset($attr['horizontalOrientation']) && 'right' === $attr['horizontalOrientation'] && 'relative' !== $attr['position']){
				$horizontalOrientationOffsetRightTablet = isset($attr['horizontalOrientationOffsetRightTablet']) ? $attr['horizontalOrientationOffsetRightTablet'] : '0';
				$horizontalOrientationOffsetRightUnit = isset($attr['horizontalOrientationOffsetRightUnit']) ? $attr['horizontalOrientationOffsetRightUnit'] : 'px';
				$css .= "right: {$horizontalOrientationOffsetRightTablet}{$horizontalOrientationOffsetRightUnit};";
			}
			if(isset($attr['verticalOrientation']) && 'top' === $attr['verticalOrientation'] && 'relative' !== $attr['position']){
				$verticalOrientationOffsetTopTablet = isset($attr['verticalOrientationOffsetTopTablet']) ? $attr['verticalOrientationOffsetTopTablet'] : '0';
				$verticalOrientationOffsetTopUnit = isset($attr['verticalOrientationOffsetTopUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
				$css .= "top: {$verticalOrientationOffsetTopTablet}{$verticalOrientationOffsetTopUnit};";
			}
			if(isset($attr['verticalOrientation']) && 'bottom' === $attr['verticalOrientation'] && 'relative' !== $attr['position']){
				$verticalOrientationOffsetBottomTablet = isset($attr['verticalOrientationOffsetBottomTablet']) ? $attr['verticalOrientationOffsetBottomTablet'] : '0';
				$verticalOrientationOffsetBottomUnit = isset($attr['verticalOrientationOffsetBottomUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
				$css .= "bottom: {$verticalOrientationOffsetBottomTablet}{$verticalOrientationOffsetBottomUnit};";
			}

            // flex properties
			$css .= "align-self: " . (isset($attr['alignSelfTablet']) ? $attr['alignSelfTablet'] : 'inherit;' ). ";";
			if(isset($attr['orderTablet']) && $attr['orderTablet'] === 'start'){
				$css .= "order:-9999;";
			}elseif(isset($attr['orderTablet']) && $attr['orderTablet'] === 'end'){
				$css .= "order:9999;";
			}elseif(isset($attr['orderTablet']) && $attr['orderTablet'] === 'custom'){
			$css .= isset( $attr['customOrderTablet'] ) ? "order:{$attr['customOrderTablet']};" : '';
			}
			//flex size
			if(isset($attr['flexSizeTablet']) && $attr['flexSizeTablet'] === 'none'){
			
				$css .= "flex-grow:0;
					flex-shrink:0;";
			
			}elseif(isset($attr['flexSizeTablet']) && $attr['flexSizeTablet'] === 'grow'){
				$css .= "flex-grow:1;
				flex-shrink:0;";
	
			}elseif(isset($attr['flexSizeTablet']) && $attr['flexSizeTablet'] === 'shrink'){
				$css .= "flex-grow:0;
				flex-shrink:1;";
			}elseif(isset($attr['flexSizeTablet']) && $attr['flexSizeTablet'] === 'custom'){
				$css .= isset( $attr['FlexGrowSizeTablet'] ) ? "flex-grow:{$attr['FlexGrowSizeTablet']};" : '';
				$css .= isset( $attr['FlexShrinkSizeTablet'] ) ? "flex-shrink:{$attr['FlexShrinkSizeTablet']};" : '';
			}
            
            $css .= "}";

            //inside wrap
            $css .= ".th-c{$attr['uniqueID']} > .th-inside-content-wrap{";
                //flex-direction
                $css .= isset($attr['directionTablet']) ? "flex-direction: {$attr['directionTablet']}; " : '';
                //justifiy-content
                $css .= isset($attr['JustifyTablet']) ? "justify-content: {$attr['JustifyTablet']}; " : '';
                //align-Items
                $css .= isset($attr['AlignItemTablet']) ? "align-items: {$attr['AlignItemTablet']}; " : '';
                //flex-wrap
                $css .= isset($attr['WrapTablet']) ? "flex-wrap: {$attr['WrapTablet']}; " : '';
                //  align content
                if (isset($attr['WrapTablet']) && $attr['WrapTablet']=='wrap') {
                $css .= isset($attr['AlignContentTablet']) ? "align-content: {$attr['AlignContentTablet']}; " : '';
                }
				//gap
			
			 $elementGapTablet = isset($attr['elementGapTablet']) ? $attr['elementGapTablet'] : $container_gap;	
			 $elementGapUnit = isset($attr['elementGapUnit']) ? $attr['elementGapUnit'] : 'px';
             $css .= "gap: {$elementGapTablet}{$elementGapUnit};";

            $css .= "}";

            $css .= ".th-c{$attr['uniqueID']}:hover {";
                //for border-width hover tablet
			if (isset($attr['borderWidthHvrTypeTablet']) && 'unlinked' === $attr['borderWidthHvrTypeTablet']) {
				$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
				$borderWidthHvrTopTablet = isset($attr['borderWidthHvrTopTablet']) ? $attr['borderWidthHvrTopTablet'] :'';
				$borderWidthHvrRightTablet = isset($attr['borderWidthHvrRightTablet']) ? $attr['borderWidthHvrRightTablet'] : '';
				$borderWidthHvrBottomTablet = isset($attr['borderWidthHvrBottomTablet']) ? $attr['borderWidthHvrBottomTablet'] : '';
				$borderWidthHvrLeftTablet = isset($attr['borderWidthHvrLeftTablet']) ? $attr['borderWidthHvrLeftTablet'] : '';
				$css .= "border-top-width: {$borderWidthHvrTopTablet}{$borderWidthHvrUnit}; border-right-width: {$borderWidthHvrRightTablet}{$borderWidthHvrUnit}; border-bottom-width: {$borderWidthHvrBottomTablet}{$borderWidthHvrUnit}; border-left-width: {$borderWidthHvrLeftTablet}{$borderWidthHvrUnit};";
			} else {
				$borderWidthHvrTablet = isset($attr['borderWidthHvrTablet']) ? $attr['borderWidthHvrTablet'] : '';
				$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
				$css .= "border-width: {$borderWidthHvrTablet}{$borderWidthHvrUnit};";
			}

			//for border-radius hover tablet
			if (isset($attr['borderRadiusHvrTypeTablet']) && 'unlinked' === $attr['borderRadiusHvrTypeTablet']) {
				$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
				$borderRadiusHvrTopTablet = isset($attr['borderRadiusHvrTopTablet']) ? $attr['borderRadiusHvrTopTablet'] : '';
				$borderRadiusHvrRightTablet = isset($attr['borderRadiusHvrRightTablet']) ? $attr['borderRadiusHvrRightTablet'] : '';
				$borderRadiusHvrBottomTablet = isset($attr['borderRadiusHvrBottomTablet']) ? $attr['borderRadiusHvrBottomTablet'] : '';
				$borderRadiusHvrLeftTablet = isset($attr['borderRadiusHvrLeftTablet']) ? $attr['borderRadiusHvrLeftTablet'] : '';
				$css .= "
				border-top-right-radius: {$borderRadiusHvrTopTablet}{$borderRadiusHvrUnit}; 
				border-top-left-radius: {$borderRadiusHvrRightTablet}{$borderRadiusHvrUnit}; 
				border-bottom-right-radius: {$borderRadiusHvrBottomTablet}{$borderRadiusHvrUnit}; 
				border-bottom-left-radius: {$borderRadiusHvrLeftTablet}{$borderRadiusHvrUnit};";
			} else {
				$borderRadiusHvrTablet = isset($attr['borderRadiusHvrTablet']) ? $attr['borderRadiusHvrTablet'] : '';
				$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
				$css .= "border-radius: {$borderRadiusHvrTablet}{$borderRadiusHvrUnit};";
			}
            $css .= " }";

			//shaper
			$css .= ".th-c{$attr['uniqueID']} > .th-shaper .th-shape-top svg{";	
				$css .= isset( $attr['shapeTopWidthTablet'] ) ? "width:{$attr['shapeTopWidthTablet'] }%;" : '';
				$css .= isset( $attr['shapeTopHeightTablet'] ) ? "height:{$attr['shapeTopHeightTablet'] }px;" : '';
				$css .= "}";
		
				$css .= ".th-c{$attr['uniqueID']} > .th-shaper .th-shape-bottom svg{";	
				$css .= isset( $attr['shapeBottomWidthTablet'] ) ? "width:{$attr['shapeBottomWidthTablet'] }%;" : '';
				$css .= isset( $attr['shapeBottomHeightTablet'] ) ? "height:{$attr['shapeBottomHeightTablet'] }px;" : '';
				$css .= "}";

      $css .= " }";

      //    mobile view
      $css .= "@media only screen and (max-width: 767px){";
      
        $css .= ".th-c{$attr['uniqueID']}.boxed-content > .th-inside-content-wrap{";
              // boxed-width
              if (isset($attr['boxedcontentWidthMobile'])){
                  $boxedcontentWidthUnit = isset($attr['boxedcontentWidthUnitMobile']) ? $attr['boxedcontentWidthUnitMobile'] : '%';
                  $css .= "max-width: {$attr['boxedcontentWidthMobile']}{$boxedcontentWidthUnit}; ";
              }else{
                  $css .= "max-width:100%;";
              }
              $css .= "}";
      
              $css .= ".th-c{$attr['uniqueID']}.fullwidth-content{";
                  // boxed-width
                  if (isset($attr['fullcontentWidthMobile'])){
                      $fullcontentWidthUnitMobile = isset($attr['fullcontentWidthUnitMobile']) ? $attr['fullcontentWidthUnitMobile'] : '%';
                      $css .= "max-width: {$attr['fullcontentWidthMobile']}{$fullcontentWidthUnitMobile};
					  width: {$attr['fullcontentWidthMobile']}{$fullcontentWidthUnitMobile}; 
					  margin-left: auto;
					  margin-right: auto;";
                  }else{
                      $css .= "
					  max-width:100%;
					  margin-left: auto;
					  margin-right: auto;";
                  }
             $css .= "}";
      
      
             $css .= ".th-c{$attr['uniqueID']}{";
            
             // min-height
             if (isset($attr['contentMinHgtMobile'])) {
                  $contentMinHgtUnit = isset($attr['contentMinHgtUnit']) ? $attr['contentMinHgtUnit'] : 'px';
                  $css .= "min-height: {$attr['contentMinHgtMobile']}{$contentMinHgtUnit}; ";
              }else{
                  $css .= "min-height: auto;";
              }
      
      
             //flex-direction
            $css .= isset($attr['directionMobile']) ? "flex-direction: {$attr['directionMobile']}; " : '';
            //justifiy-content
            $css .= isset($attr['directionMobile']) ? "flex-direction: {$attr['directionMobile']}; " : '';
            if (isset($attr['paddingTypeMobile']) && 'unlinked' === $attr['paddingTypeMobile']) {
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $paddingTopMobile = isset($attr['paddingTopMobile']) ? $attr['paddingTopMobile'] : 0;
                $paddingRightMobile = isset($attr['paddingRightMobile']) ? $attr['paddingRightMobile'] : 0;
                $paddingBottomMobile = isset($attr['paddingBottomMobile']) ? $attr['paddingBottomMobile'] : 0;
                $paddingLeftMobile = isset($attr['paddingLeftMobile']) ? $attr['paddingLeftMobile'] : 0;
                $css .= "padding-top: {$paddingTopMobile}{$paddingUnit}; padding-right: {$paddingRightMobile}{$paddingUnit}; padding-bottom: {$paddingBottomMobile}{$paddingUnit}; padding-left: {$paddingLeftMobile}{$paddingUnit};";
            } else {
                $paddingMobile = isset($attr['paddingMobile']) ? $attr['paddingMobile'] : $globalpadding;
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $css .= "padding: {$paddingMobile}{$paddingUnit};";
            }	

            //for margin Mobile
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
                margin-right: {$marginRightMobile}{$marginUnit};";
            } else {
                $marginMobile = isset($attr['marginMobile']) ? $attr['marginMobile'] : 0;
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $css .= "margin: {$marginMobile}{$marginUnit};";
            }
            $css .=(isset($attr['zindexMobile']) ? "z-index:{$attr['zindexMobile']};" : '');
            if (isset($attr['borderWidthTypeMobile']) && 'unlinked' === $attr['borderWidthTypeMobile']) {
                $borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
                $borderWidthTopMobile = isset($attr['borderWidthTopMobile']) ? $attr['borderWidthTopMobile'] : 0;
                $borderWidthRightMobile = isset($attr['borderWidthRightMobile']) ? $attr['borderWidthRightMobile'] : 0;
                $borderWidthBottomMobile = isset($attr['borderWidthBottomMobile']) ? $attr['borderWidthBottomMobile'] : 0;
                $borderWidthLeftMobile = isset($attr['borderWidthLeftMobile']) ? $attr['borderWidthLeftMobile'] : 0;
                $css .= "border-top-width: {$borderWidthTopMobile}{$borderWidthUnit}; border-right-width: {$borderWidthRightMobile}{$borderWidthUnit}; border-bottom-width: {$borderWidthBottomMobile}{$borderWidthUnit}; border-left-width: {$borderWidthLeftMobile}{$borderWidthUnit};";
            } else {
                $borderWidthMobile = isset($attr['borderWidthMobile']) ? $attr['borderWidthMobile'] : 0;
                $borderWidthUnit = isset($attr['borderWidthUnit']) ? $attr['borderWidthUnit'] : 'px';
                $css .= "border-width: {$borderWidthMobile}{$borderWidthUnit};";
            }

            //for border-radius mobile
            if (isset($attr['borderRadiusTypeMobile']) && 'unlinked' === $attr['borderRadiusTypeMobile']) {
                $borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
                $borderRadiusTopMobile = isset($attr['borderRadiusTopMobile']) ? $attr['borderRadiusTopMobile'] : 0;
                $borderRadiusRightMobile = isset($attr['borderRadiusRightMobile']) ? $attr['borderRadiusRightMobile'] : 0;
                $borderRadiusBottomMobile = isset($attr['borderRadiusBottomMobile']) ? $attr['borderRadiusBottomMobile'] : 0;
                $borderRadiusLeftMobile = isset($attr['borderRadiusLeftMobile']) ? $attr['borderRadiusLeftMobile'] : 0;
                $css .= "border-top-right-radius: {$borderRadiusTopMobile}{$borderRadiusUnit}; 
				border-top-left-radius: {$borderRadiusRightMobile}{$borderRadiusUnit}; 
				border-bottom-right-radius: {$borderRadiusBottomMobile}{$borderRadiusUnit};
				 border-bottom-left-radius: {$borderRadiusLeftMobile}{$borderRadiusUnit};";
            } else {
                $borderRadiusMobile = isset($attr['borderRadiusMobile']) ? $attr['borderRadiusMobile'] : 0;
                $borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
                $css .= "border-radius: {$borderRadiusMobile}{$borderRadiusUnit};";
            }
            //position

			if(isset($attr['horizontalOrientation']) && 'left' === $attr['horizontalOrientation']  && 'relative' !== $attr['position']){
				$horizontalOrientationOffsetMobile = isset($attr['horizontalOrientationOffsetMobile']) ? $attr['horizontalOrientationOffsetMobile'] : '0';
				$horizontalOrientationOffsetUnit = isset($attr['horizontalOrientationOffsetUnit']) ? $attr['horizontalOrientationOffsetUnit'] : 'px';
				$css .= "left: {$horizontalOrientationOffsetMobile}{$horizontalOrientationOffsetUnit};";
			}
			if(isset($attr['horizontalOrientation']) && 'right' === $attr['horizontalOrientation'] && 'relative' !== $attr['position']){
				$horizontalOrientationOffsetRightMobile = isset($attr['horizontalOrientationOffsetRightMobile']) ? $attr['horizontalOrientationOffsetRightMobile'] : '0';
				$horizontalOrientationOffsetRightUnit = isset($attr['horizontalOrientationOffsetRightUnit']) ? $attr['horizontalOrientationOffsetRightUnit'] : 'px';
				$css .= "right: {$horizontalOrientationOffsetRightMobile}{$horizontalOrientationOffsetRightUnit};";
			}
			if(isset($attr['verticalOrientation']) && 'top' === $attr['verticalOrientation'] && 'relative' !== $attr['position']){
				$verticalOrientationOffsetTopMobile = isset($attr['verticalOrientationOffsetTopMobile']) ? $attr['verticalOrientationOffsetTopMobile'] : '0';
				$verticalOrientationOffsetTopUnit = isset($attr['verticalOrientationOffsetTopUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
				$css .= "top: {$verticalOrientationOffsetTopMobile}{$verticalOrientationOffsetTopUnit};";
			}
			if(isset($attr['verticalOrientation']) && 'bottom' === $attr['verticalOrientation'] && 'relative' !== $attr['position']){
				$verticalOrientationOffsetBottomMobile = isset($attr['verticalOrientationOffsetBottomMobile']) ? $attr['verticalOrientationOffsetBottomMobile'] : '0';
				$verticalOrientationOffsetBottomUnit = isset($attr['verticalOrientationOffsetBottomUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
				$css .= "bottom: {$verticalOrientationOffsetBottomMobile}{$verticalOrientationOffsetBottomUnit};";
			}
            // flex properties
			$css .= "align-self: " . (isset($attr['alignSelfMobile']) ? $attr['alignSelfMobile'] : 'inherit;' ). ";";
			if(isset($attr['orderMobile']) && $attr['orderMobile'] === 'start'){
				$css .= "order:-9999;";
			}elseif(isset($attr['orderMobile']) && $attr['orderMobile'] === 'end'){
				$css .= "order:9999;";
			}elseif(isset($attr['orderMobile']) && $attr['orderMobile'] === 'custom'){
			$css .= isset( $attr['customOrderMobile'] ) ? "order:{$attr['customOrderMobile']};" : '';
			}
			//flex size
			if(isset($attr['flexSizeMobile']) && $attr['flexSizeMobile'] === 'none'){
			
				$css .= "flex-grow:0;
					flex-shrink:0;";
			
			}elseif(isset($attr['flexSizeMobile']) && $attr['flexSizeMobile'] === 'grow'){
				$css .= "flex-grow:1;
				flex-shrink:0;";
	
			}elseif(isset($attr['flexSizeMobile']) && $attr['flexSizeMobile'] === 'shrink'){
				$css .= "flex-grow:0;
				flex-shrink:1;";
			}elseif(isset($attr['flexSizeMobile']) && $attr['flexSizeMobile'] === 'custom'){
				$css .= isset( $attr['FlexGrowSizeMobile'] ) ? "flex-grow:{$attr['FlexGrowSizeMobile']};" : '';
				$css .= isset( $attr['FlexShrinkSizeMobile'] ) ? "flex-shrink:{$attr['FlexShrinkSizeMobile']};" : '';
			}

            $css .= "}";

            $css .= ".th-c{$attr['uniqueID']}:hover {";
                if (isset($attr['borderWidthHvrTypeMobile']) && 'unlinked' === $attr['borderWidthHvrTypeMobile']) {
					$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
					$borderWidthHvrTopMobile = isset($attr['borderWidthHvrTopMobile']) ? $attr['borderWidthHvrTopMobile'] : '';
					$borderWidthHvrRightMobile = isset($attr['borderWidthHvrRightMobile']) ? $attr['borderWidthHvrRightMobile'] :'';
					$borderWidthHvrBottomMobile = isset($attr['borderWidthHvrBottomMobile']) ? $attr['borderWidthHvrBottomMobile'] :'';
					$borderWidthHvrLeftMobile = isset($attr['borderWidthHvrLeftMobile']) ? $attr['borderWidthHvrLeftMobile'] : '';
					$css .= "
					border-top-width: {$borderWidthHvrTopMobile}{$borderWidthHvrUnit}; 
					border-right-width: {$borderWidthHvrRightMobile}{$borderWidthHvrUnit}; 
					border-bottom-width: {$borderWidthHvrBottomMobile}{$borderWidthHvrUnit}; 
					border-left-width: {$borderWidthHvrLeftMobile}{$borderWidthHvrUnit};";
				} else {
					$borderWidthHvrMobile = isset($attr['borderWidthHvrMobile']) ? $attr['borderWidthHvrMobile'] :'';
					$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
					$css .= "border-width: {$borderWidthHvrMobile}{$borderWidthHvrUnit};";
				}

				if (isset($attr['borderRadiusHvrTypeMobile']) && 'unlinked' === $attr['borderRadiusHvrTypeMobile']) {
					$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
					$borderRadiusHvrTopMobile = isset($attr['borderRadiusHvrTopMobile']) ? $attr['borderRadiusHvrTopMobile'] : '';
					$borderRadiusHvrRightMobile = isset($attr['borderRadiusHvrRightMobile']) ? $attr['borderRadiusHvrRightMobile'] : '';
					$borderRadiusHvrBottomMobilet = isset($attr['borderRadiusHvrBottomMobile']) ? $attr['borderRadiusHvrBottomMobile'] : '';
					$borderRadiusHvrLeftMobile = isset($attr['borderRadiusHvrLeftMobile']) ? $attr['borderRadiusHvrLeftMobile'] :'';
					$css .= "border-top-right-radius: {$borderRadiusHvrTopMobile}{$borderRadiusHvrUnit}; border-top-left-radius: {$borderRadiusHvrRightMobile}{$borderRadiusHvrUnit}; border-bottom-right-radius: {$borderRadiusHvrBottomMobile}{$borderRadiusHvrUnit}; border-bottom-left-radius: {$borderRadiusHvrLeftMobile}{$borderRadiusHvrUnit};";
				} else {
					$borderRadiusHvrMobile = isset($attr['borderRadiusHvrMobile']) ? $attr['borderRadiusHvrMobile'] : '';
					$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
					$css .= "border-radius: {$borderRadiusHvrMobile}{$borderRadiusHvrUnit};";
				}
		
            $css .= "}";

            //inside wrap
            $css .= ".th-c{$attr['uniqueID']} > .th-inside-content-wrap{";
                //flex-direction
                $css .= isset($attr['directionMobile']) ? "flex-direction: {$attr['directionMobile']}; " : 'flex-direction:column;';
                //justifiy-content
                $css .= isset($attr['JustifyMobile']) ? "justify-content: {$attr['JustifyMobile']}; " : '';
                //align-Items
                $css .= isset($attr['AlignItemMobile']) ? "align-items: {$attr['AlignItemMobile']}; " : '';
                //flex-wrap
                $css .= isset($attr['WrapMobile']) ? "flex-wrap: {$attr['WrapMobile']}; " : '';
                //  align content
                if (isset($attr['WrapMobile']) && $attr['WrapMobile']=='wrap') {
                $css .= isset($attr['AlignContentMobile']) ? "align-content: {$attr['AlignContentMobile']}; " : '';
                }
				//gap
				$elementGapMobile = isset($attr['elementGapMobile']) ? $attr['elementGapMobile'] : $container_gap;	
			    $elementGapUnit = isset($attr['elementGapUnit']) ? $attr['elementGapUnit'] : 'px';
                $css .= "gap: {$elementGapMobile}{$elementGapUnit};";
                $css .= "}";

			//shaper
			$css .= ".th-c{$attr['uniqueID']} .th-shaper .th-shape-top svg{";	
				$css .= isset( $attr['shapeTopWidthMobile'] ) ? "width:{$attr['shapeTopWidthMobile'] }%;" : '';
				$css .= isset( $attr['shapeTopHeightMobile'] ) ? "height:{$attr['shapeTopHeightMobile'] }px;" : '';
				$css .= "}";
		
				$css .= ".th-c{$attr['uniqueID']} .th-shaper .th-shape-bottom svg{";	
				$css .= isset( $attr['shapeBottomWidthMobile'] ) ? "width:{$attr['shapeBottomWidthMobile'] }%;" : '';
				$css .= isset( $attr['shapeBottomHeightMobile'] ) ? "height:{$attr['shapeBottomHeightMobile'] }px;" : '';
				$css .= "}";
  
        $css .= " }";

        if (isset($attr['responsiveTogHideDesktop']) && $attr['responsiveTogHideDesktop'] == true){
            $css .= "@media only screen and (min-width: 1024px) {.th-c{$attr['uniqueID']}{display:none;}}";
        }
        //hide on Tablet
        if (isset($attr['responsiveTogHideTablet']) && $attr['responsiveTogHideTablet'] == true){
            $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) { .th-c{$attr['uniqueID']}{display:none;}}";
        }
        //hide on Mobile
        if (isset($attr['responsiveTogHideMobile']) && $attr['responsiveTogHideMobile'] == true){
            $css .= "@media only screen and (max-width: 767px) {.th-c{$attr['uniqueID']}{display:none;}}";
        }

    }

    return $css;

}