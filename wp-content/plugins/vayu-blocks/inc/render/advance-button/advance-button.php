<?php

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_advance_button_style($attr){
  
    $css = '';
	
    if(isset( $attr['uniqueID'] )){
      $css .= ".th-button-wrapper{$attr['uniqueID']}{";

        $css .= "box-sizing: border-box;";
        $css .= "width: 100%;display: flex;";
      //background
      if ( isset( $attr['backgroundType'] ) && $attr['backgroundType'] == 'image' ) {
        $css .= isset( $attr['backgroundImage']['url'] ) ? "background-image: url({$attr['backgroundImage']['url']});" : '';
        $css .= isset( $attr['backgroundAttachment']) ? "background-attachment: {$attr['backgroundAttachment']};" : '';
        $css .= isset( $attr['backgroundRepeat']) ? "background-repeat: {$attr['backgroundRepeat']};" : '';
        $css .= isset( $attr['backgroundSize']) ? "background-size: {$attr['backgroundSize']};" : '';
        $css .= isset( $attr['backgroundPosition']) ? "background-position-x: {$attr['backgroundPosition']['x']}%; background-position-y: {$attr['backgroundPosition']['y']}%;" : '';
      }elseif( isset( $attr['backgroundType'] ) && $attr['backgroundType'] == 'gradient' ){
        $css .= isset( $attr['backgroundGradient'] ) ? "background-image:{$attr['backgroundGradient']};" : '';  
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
  
        if( isset($attr['position']) && $attr['position'] == 'absolute' || isset($attr['position']) && $attr['position'] == 'fixed' ){
  
          $css .= "position: {$attr['position']};";
          
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
      }
      else{
          $css .= "position: relative;";
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
  
        //z-index
          $css .= isset( $attr['zindex'] ) ? "z-index:{$attr['zindex'] };" : '';
  
      //Responsive Hide
  if(isset($attr['responsiveTogHideDesktop']) && $attr['responsiveTogHideDesktop'] ){
      $css .= "display: none;";
  }

  $css .= "text-decoration: none;";

  if (isset($attr['align']) && $attr['align'] !=='space-around'){
    $css .= "justify-content: {$attr['align']};";
   }


  $css .= "}";

       //HOVER CSS
       $css .= ".th-button-wrapper{$attr['uniqueID']}:hover{";
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
                $css .= isset( $attr['backgroundColorHvr'] ) ? "background:{$attr['backgroundColorHvr']};" : '';
          }

          
     //border hover
			$css .= isset( $attr['borderHvrType'] ) ? "border-style:{$attr['borderHvrType'] };" : '';
			$css .= isset( $attr['borderColorHvr'] ) ? "border-color:{$attr['borderColorHvr'] };" : '';
		
			//border-width hover
			if (isset($attr['borderWidthHvrType']) && 'unlinked' === $attr['borderWidthHvrType']) {
				$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
				$borderWidthHvrTop = isset($attr['borderWidthHvrTop']) ? $attr['borderWidthHvrTop'] : 0;
				$borderWidthHvrRight = isset($attr['borderWidthHvrRight']) ? $attr['borderWidthHvrRight'] : 0;
				$borderWidthHvrBottom = isset($attr['borderWidthHvrBottom']) ? $attr['borderWidthHvrBottom'] : 0;
				$borderWidthHvrLeft = isset($attr['borderWidthHvrLeft']) ? $attr['borderWidthHvrLeft'] : 0;
				$css .= "border-top-width: {$borderWidthHvrTop}{$borderWidthHvrUnit}; 
				 border-right-width: {$borderWidthHvrRight}{$borderWidthHvrUnit};
				 border-bottom-width: {$borderWidthHvrBottom}{$borderWidthHvrUnit}; 
				 border-left-width: {$borderWidthHvrLeft}{$borderWidthHvrUnit}; 
				";
			} elseif(isset($attr['borderWidthHvr'])) {
				$borderWidthHvr = isset($attr['borderWidthHvr']) ? $attr['borderWidthHvr'] : 0;
				$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
				$css .= "border-width: {$borderWidthHvr}{$borderWidthHvrUnit};";
			}

			//border-radius hover
			if (isset($attr['borderRadiusHvrType']) && 'unlinked' === $attr['borderRadiusHvrType']) {
				$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
				$borderRadiusHvrTop = isset($attr['borderRadiusHvrTop']) ? $attr['borderRadiusHvrTop'] : 0;
				$borderRadiusHvrRight = isset($attr['borderRadiusHvrRight']) ? $attr['borderRadiusHvrRight'] : 0;
				$borderRadiusHvrBottom = isset($attr['borderRadiusHvrBottom']) ? $attr['borderRadiusHvrBottom'] : 0;
				$borderRadiusHvrLeft = isset($attr['borderRadiusHvrLeft']) ? $attr['borderRadiusHvrLeft'] : 0;
				$css .= "border-top-right-radius: {$borderRadiusHvrTop}{$borderRadiusHvrUnit};
				 border-top-left-radius: {$borderRadiusHvrRight}{$borderRadiusHvrUnit}; 
				 border-bottom-right-radius: {$borderRadiusHvrBottom}{$borderRadiusHvrUnit}; 
				 border-bottom-left-radius: {$borderRadiusHvrLeft}{$borderRadiusHvrUnit}; 
				";
			} elseif(isset($attr['borderRadiusHvr'])) {
				$borderRadiusHvr = isset($attr['borderRadiusHvr']) ? $attr['borderRadiusHvr'] : 0;
				$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
				$css .= "border-radius: {$borderRadiusHvr}{$borderRadiusHvrUnit};";
			}

			//box hvr shadow
			if (isset($attr['boxShadowHvr'])){
				$css .= "box-shadow: ". (isset($attr['boxShadowHorizontalHvr']) ? $attr['boxShadowHorizontalHvr'] : '0') ."px  ". (isset($attr['boxShadowVerticalHvr']) ? $attr['boxShadowVerticalHvr'] : '0') ."px ". (isset($attr['boxShadowBlurHvr']) ? $attr['boxShadowBlurHvr'] : '5') ."px ". (isset($attr['boxShadowSpreadHvr']) ? $attr['boxShadowSpreadHvr'] : '1') ."px  ". vayu_hex2rgba((isset($attr['boxShadowColorHvr']) ? $attr['boxShadowColorHvr'] : '#fff'), (isset($attr['boxShadowColorOpacityHvr']) ? $attr['boxShadowColorOpacityHvr'] : '50') ) ." ;";
			}

			$css .= "transition: all ". (isset($attr['transitionAll']) ? $attr['transitionAll'] : '0.2' ). "s ease;";
      
      $css .= "}";

      // Button Inside Style
    $css .= ".th-button-wrapper{$attr['uniqueID']} .th-button.th-button-inside{";

      $css .= "box-sizing: border-box; 
               max-width: 100%;";
      //button buttonbackground
      if ( isset( $attr['buttonbackgroundType'] ) && $attr['buttonbackgroundType'] == 'image' ) {
        $css .= isset( $attr['buttonbackgroundImage']['url'] ) ? "background-image: url({$attr['buttonbackgroundImage']['url']});" : '';
        $css .= isset( $attr['buttonbackgroundAttachment']) ? "background-attachment: {$attr['buttonbackgroundAttachment']};" : '';
        $css .= isset( $attr['buttonbackgroundRepeat']) ? "background-repeat: {$attr['buttonbackgroundRepeat']};" : '';
        $css .= isset( $attr['buttonbackgroundSize']) ? "background-size: {$attr['buttonbackgroundSize']};" : '';
        $css .= isset( $attr['buttonbackgroundPosition']) ? "background-position-x: {$attr['buttonbackgroundPosition']['x']}%; background-position-y: {$attr['buttonbackgroundPosition']['y']}%;" : '';
      }elseif( isset( $attr['buttonbackgroundType'] ) && $attr['buttonbackgroundType'] == 'gradient' ){
        $css .= isset( $attr['buttonbackgroundGradient'] ) ? "background-image:{$attr['buttonbackgroundGradient']};" : '';  
      }else{
        $css .= isset( $attr['buttonbackgroundColor'] ) ? "background-color:{$attr['buttonbackgroundColor']};" : 'background-color:#ff6912;';
      }


      //buttonpadding
      //Note This is a reverse solution if you select padding type unlinked by default
      if (isset($attr['buttonpaddingType']) && 'linked' === $attr['buttonpaddingType']) {
        $buttonpadding = isset($attr['buttonpadding']) ? $attr['buttonpadding'] : 0;
        $buttonpaddingUnit = isset($attr['buttonpaddingUnit']) ? $attr['buttonpaddingUnit'] : 'px';
        $css .= "padding: {$buttonpadding}{$buttonpaddingUnit};";
      } else {
        $buttonpaddingUnit = isset($attr['buttonpaddingUnit']) ? $attr['buttonpaddingUnit'] : 'px';
        $buttonpaddingTop = isset($attr['buttonpaddingTop']) ? $attr['buttonpaddingTop'] : 16;
        $buttonpaddingRight = isset($attr['buttonpaddingRight']) ? $attr['buttonpaddingRight'] : 40;
        $buttonpaddingBottom = isset($attr['buttonpaddingBottom']) ? $attr['buttonpaddingBottom'] : 16;
        $buttonpaddingLeft = isset($attr['buttonpaddingLeft']) ? $attr['buttonpaddingLeft'] : 40;
        $css .= "padding-top: {$buttonpaddingTop}{$buttonpaddingUnit}; 
        padding-right: {$buttonpaddingRight}{$buttonpaddingUnit}; 
        padding-bottom: {$buttonpaddingBottom}{$buttonpaddingUnit}; 
        padding-left: {$buttonpaddingLeft}{$buttonpaddingUnit}; 
          ";
      }

      $css .= isset( $attr['buttonColor']) ? "color: {$attr['buttonColor']};" : 'color: #FFF;';

       //buttonborder
       $css .= isset( $attr['buttonborderType'] ) ? "border-style:{$attr['buttonborderType'] };" : '';
       $css .= isset( $attr['buttonborderColor'] ) ? "border-color:{$attr['buttonborderColor'] };" : '';
   
   //buttonborder-width
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
 
     //buttonborder-radius
     if (isset($attr['buttonborderRadiusType']) && 'unlinked' === $attr['buttonborderRadiusType']) {
       $buttonborderRadiusUnit = isset($attr['buttonborderRadiusUnit']) ? $attr['buttonborderRadiusUnit'] : 'px';
       $buttonborderRadiusTop = isset($attr['buttonborderRadiusTop']) ? $attr['buttonborderRadiusTop'] : 0;
       $buttonborderRadiusRight = isset($attr['buttonborderRadiusRight']) ? $attr['buttonborderRadiusRight'] : 0;
       $buttonborderRadiusBottom = isset($attr['buttonborderRadiusBottom']) ? $attr['buttonborderRadiusBottom'] : 0;
       $buttonborderRadiusLeft = isset($attr['buttonborderRadiusLeft']) ? $attr['buttonborderRadiusLeft'] : 0;
       $css .= "border-top-right-radius: {$buttonborderRadiusTop}{$buttonborderRadiusUnit}; 
         border-top-left-radius: {$buttonborderRadiusRight}{$buttonborderRadiusUnit};
         border-bottom-right-radius: {$buttonborderRadiusBottom}{$buttonborderRadiusUnit};
         border-bottom-left-radius: {$buttonborderRadiusLeft}{$buttonborderRadiusUnit};
        ";
     } else {
       $buttonborderRadius = isset($attr['buttonborderRadius']) ? $attr['buttonborderRadius'] : 0;
       $buttonborderRadiusUnit = isset($attr['buttonborderRadiusUnit']) ? $attr['buttonborderRadiusUnit'] : 'px';
       $css .= "border-radius: {$buttonborderRadius}{$buttonborderRadiusUnit};";
     }
 
     //buttonbox shadow
     if (isset($attr['buttonboxShadow'])){
       $css .= "box-shadow: ". (isset($attr['buttonboxShadowHorizontal']) ? $attr['buttonboxShadowHorizontal'] : '0') ."px  ". (isset($attr['buttonboxShadowVertical']) ? $attr['buttonboxShadowVertical'] : '0') ."px ". (isset($attr['buttonboxShadowBlur']) ? $attr['buttonboxShadowBlur'] : '5') ."px ". (isset($attr['buttonboxShadowSpread']) ? $attr['buttonboxShadowSpread'] : '1') ."px  ". vayu_hex2rgba((isset($attr['buttonboxShadowColor']) ? $attr['buttonboxShadowColor'] : '#fff'), (isset($attr['buttonboxShadowColorOpacity']) ? $attr['buttonboxShadowColorOpacity'] : '50') ) .";";
     }

     //Typography Font Family
     $css .= "font-family: " . (isset($attr['fontFamily']) ? $attr['fontFamily'] : 'sans-serif') . ';';
     $css .= "font-weight: " . (isset($attr['fontVariant']) ? $attr['fontVariant'] : 'inherit') . ';';
     $css .= "font-style: " . (isset($attr['fontStyle']) ? $attr['fontStyle'] : 'normal') . ';';
     $css .= "text-transform: " . (isset($attr['textTransform']) ? $attr['textTransform'] : 'none') . ';';

    // Font Size
		if (isset($attr['fontSize'])) {
			$fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
			$css .= "font-size: {$attr['fontSize']}{$fontSizeUnit}; ";
		}
		// Line Height
		if (isset($attr['lineHeight'])) {
			$lineHeightUnit = isset($attr['lineHeightUnit']) ? $attr['lineHeightUnit'] : 'px';
			$css .= "line-height: {$attr['lineHeight']}{$lineHeightUnit}; ";
		}

		// Letter Spacing
		if (isset($attr['letterSpacing'])) {
			$letterSpacingUnit = isset($attr['letterSpacingUnit']) ? $attr['letterSpacingUnit'] : 'px';
			$css .= "letter-spacing: {$attr['letterSpacing']}{$letterSpacingUnit}; ";
		}
    
    $css .= "transition: all ". (isset($attr['transitionAll']) ? $attr['transitionAll'] : '0.2' ). "s ease;";

     if (isset($attr['align']) && $attr['align']=='space-around'){
      $css .= "
      width: 100%;
      justify-content: center;";
     }

     $css .= "display: flex;
              align-items: center;
              justify-content: center;
              text-decoration: none;
              ";

    $css .= "}";

    $css .= ".th-button-wrapper{$attr['uniqueID']} .th-button.th-button-inside:hover{";

         // Button Inside Style Hover
         //button buttonbackground
      if ( isset( $attr['buttonbackgroundTypeHvr'] ) && $attr['buttonbackgroundTypeHvr'] == 'image' ) {
        $css .= isset( $attr['buttonbackgroundImageHvr']['url'] ) ? "background-image: url({$attr['buttonbackgroundImageHvr']['url']});" : '';
        $css .= isset( $attr['buttonbackgroundAttachmentHvr']) ? "background-attachment: {$attr['buttonbackgroundAttachmentHvr']};" : '';
        $css .= isset( $attr['buttonbackgroundRepeatHvr']) ? "background-repeat: {$attr['buttonbackgroundRepeatHvr']};" : '';
        $css .= isset( $attr['buttonbackgroundSizeHvr']) ? "background-size: {$attr['buttonbackgroundSizeHvr']};" : '';
        $css .= isset( $attr['buttonbackgroundPositionHvr']) ? "background-position-x: {$attr['buttonbackgroundPositionHvr']['x']}%; background-position-y: {$attr['buttonbackgroundPositionHvr']['y']}%;" : '';
      }elseif( isset( $attr['buttonbackgroundTypeHvr'] ) && $attr['buttonbackgroundTypeHvr'] == 'gradient' ){
        $css .= isset( $attr['buttonbackgroundGradientHvr'] ) ? "background-image:{$attr['buttonbackgroundGradientHvr']};" : '';  
      }else{
        $css .= isset( $attr['buttonbackgroundColorHvr'] ) ? "background:{$attr['buttonbackgroundColorHvr']};" : 'background-color:#ff6912;';
      }
      
      $css .= isset( $attr['buttonborderColorHvr'] ) ? "border-color:{$attr['buttonborderColorHvr'] };" : '';
      $css .= isset( $attr['buttonColorHvr'] ) ? "color:{$attr['buttonColorHvr'] };" : '';
      
    $css .= "}";

    // Icon Position & Spacing
    $css .= ".th-button-wrapper{$attr['uniqueID']} .th-button.th-button-inside > span:nth-of-type(1){";
      if(isset( $attr['iconPosition'] ) && $attr['iconPosition'] == 'after' ){
      
        $css .= isset( $attr['iconSpacing'] )  ? "margin:0 0 0 {$attr['iconSpacing'] }px;" : '';
        $css .= "order: 15; display: flex; align-items: center;";
      }
      else{
        
        $css .= isset( $attr['iconSpacing'] ) ? "margin:0 {$attr['iconSpacing'] }px 0 0;" : '';
        $css .= "order: 5; display: flex; align-items: center;";
      }
      
    $css .= "}";

    $css .= ".th-button-wrapper{$attr['uniqueID']} .th-button.th-button-inside span:nth-of-type(2){";
    $css .= "order: 10;";
    $css .= "}";
    // Icon Position & Spacing End

            //    tablet view
     $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {";
    
        $css .= ".th-button-wrapper{$attr['uniqueID']}{";
        
             
            
              //margin
              if (isset($attr['marginTypeTablet']) && 'unlinked' === $attr['marginTypeTablet']) {
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $marginTop = isset($attr['marginTopTablet']) ? $attr['marginTopTablet'] : 0;
                $marginBottom = isset($attr['marginBottomTablet']) ? $attr['marginBottomTablet'] : 0;
                $marginLeft = isset($attr['marginLeftTablet']) ? $attr['marginLeftTablet'] : 0;
                $marginRight = isset($attr['marginRightTablet']) ? $attr['marginRightTablet'] : 0;
                $css .= "
                      margin-top: {$marginTop}{$marginUnit}; 
                      margin-bottom: {$marginBottom}{$marginUnit}; 
                      margin-left: {$marginLeft}{$marginUnit}; 
                      margin-right: {$marginRight}{$marginUnit}; 
                  ";
              } else {
                $marginTablet = isset($attr['marginTablet']) ? $attr['marginTablet'] : 0;
                $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
                $css .= "margin: {$marginTablet}{$marginUnit}; 
                ";
              }
        
              //padding
              if (isset($attr['paddingTypeTablet']) && 'unlinked' === $attr['paddingTypeTablet']) {
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $paddingTop = isset($attr['paddingTopTablet']) ? $attr['paddingTopTablet'] : 0;
                $paddingBottom = isset($attr['paddingBottomTablet']) ? $attr['paddingBottomTablet'] : 0;
                $paddingLeft = isset($attr['paddingLeftTablet']) ? $attr['paddingLeftTablet'] : 0;
                $paddingRight = isset($attr['paddingRightTablet']) ? $attr['paddingRightTablet'] : 0;
                $css .= "
                      padding-top: {$paddingTop}{$paddingUnit}; 
                      padding-bottom: {$paddingBottom}{$paddingUnit}; 
                      padding-left: {$paddingLeft}{$paddingUnit}; 
                      padding-right: {$paddingRight}{$paddingUnit}; 
                  ";
              } else {
                $paddingTablet = isset($attr['paddingTablet']) ? $attr['paddingTablet'] : 0;
                $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
                $css .= "padding: {$paddingTablet}{$paddingUnit};";
              }
            
              // $css .= (isset($attr['zindexTablet']) ? "z-index:{$attr['zindexTablet']};}" : '');
              $css .= isset( $attr['zindexTablet'] ) ? "z-index:{$attr['zindexTablet'] };" : '';
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
        
              //position
        
                  if( isset($attr['position']) && $attr['position'] == 'absolute' || isset($attr['position']) && $attr['position'] == 'fixed' ){
        
                    if(isset($attr['horizontalOrientation']) && 'left' === $attr['horizontalOrientation']  && 'inherit' !== $attr['position']){
                        $horizontalOrientationOffsetTablet = isset($attr['horizontalOrientationOffsetTablet']) ? $attr['horizontalOrientationOffsetTablet'] : '0';
                        $horizontalOrientationOffsetUnit = isset($attr['horizontalOrientationOffsetUnit']) ? $attr['horizontalOrientationOffsetUnit'] : 'px';
                        $css .= "left: {$horizontalOrientationOffsetTablet}{$horizontalOrientationOffsetUnit};";
                    }
                    if(isset($attr['horizontalOrientation']) && 'right' === $attr['horizontalOrientation'] && 'inherit' !== $attr['position']){
                        $horizontalOrientationOffsetRightTablet = isset($attr['horizontalOrientationOffsetRightTablet']) ? $attr['horizontalOrientationOffsetRightTablet'] : '0';
                        $horizontalOrientationOffsetRightUnit = isset($attr['horizontalOrientationOffsetRightUnit']) ? $attr['horizontalOrientationOffsetRightUnit'] : 'px';
                        $css .= "right: {$horizontalOrientationOffsetRightTablet}{$horizontalOrientationOffsetRightUnit};";
                    }
                    if(isset($attr['verticalOrientation']) && 'top' === $attr['verticalOrientation'] && 'inherit' !== $attr['position']){
                        $verticalOrientationOffsetTopTablet = isset($attr['verticalOrientationOffsetTopTablet']) ? $attr['verticalOrientationOffsetTopTablet'] : '0';
                        $verticalOrientationOffsetTopUnit = isset($attr['verticalOrientationOffsetTopUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
                        $css .= "top: {$verticalOrientationOffsetTopTablet}{$verticalOrientationOffsetTopUnit};";
                    }
                    if(isset($attr['verticalOrientation']) && 'bottom' === $attr['verticalOrientation'] && 'inherit' !== $attr['position']){
                        $verticalOrientationOffsetBottomTablet = isset($attr['verticalOrientationOffsetBottomTablet']) ? $attr['verticalOrientationOffsetBottomTablet'] : '0';
                        $verticalOrientationOffsetBottomUnit = isset($attr['verticalOrientationOffsetBottomUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
                        $css .= "bottom: {$verticalOrientationOffsetBottomTablet}{$verticalOrientationOffsetBottomUnit};";
                    }
        
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
        
                    //Responsive Hide
                    if(isset($attr['responsiveTogHideTablet']) && $attr['responsiveTogHideTablet'] ){
                        $css .= "display: none";
                    }
                    else{
                        $css .= "display: flex";
                    }

              $css .= "}";

              $css .= ".th-button-wrapper{$attr['uniqueID']}:hover{";

                //border-radius hover
		if (isset($attr['borderRadiusHvrTypeTablet']) && 'unlinked' === $attr['borderRadiusHvrTypeTablet']) {
			$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
			$borderRadiusHvrTop = isset($attr['borderRadiusHvrTopTablet']) ? $attr['borderRadiusHvrTopTablet'] : 0;
			$borderRadiusHvrRight = isset($attr['borderRadiusHvrRightTablet']) ? $attr['borderRadiusHvrRightTablet'] : 0;
			$borderRadiusHvrBottom = isset($attr['borderRadiusHvrBottomTablet']) ? $attr['borderRadiusHvrBottomTablet'] : 0;
			$borderRadiusHvrLeft = isset($attr['borderRadiusHvrLeftTablet']) ? $attr['borderRadiusHvrLeftTablet'] : 0;
			$css .= "border-top-right-radius: {$borderRadiusHvrTop}{$borderRadiusHvrUnit};
			 border-top-left-radius: {$borderRadiusHvrRight}{$borderRadiusHvrUnit}; 
			 border-bottom-right-radius: {$borderRadiusHvrBottom}{$borderRadiusHvrUnit}; 
			 border-bottom-left-radius: {$borderRadiusHvrLeft}{$borderRadiusHvrUnit}; 
			";
		} elseif(isset($attr['borderRadiusHvrTablet'])) {
			$borderRadiusHvr = isset($attr['borderRadiusHvrTablet']) ? $attr['borderRadiusHvrTablet'] : 0;
			$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
			$css .= "border-radius: {$borderRadiusHvr}{$borderRadiusHvrUnit};";
		}

		//border-width hover
		if (isset($attr['borderWidthHvrTypeTablet']) && 'unlinked' === $attr['borderWidthHvrTypeTablet']) {
			$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
			$borderWidthHvrTop = isset($attr['borderWidthHvrTopTablet']) ? $attr['borderWidthHvrTopTablet'] : 0;
			$borderWidthHvrRight = isset($attr['borderWidthHvrRightTablet']) ? $attr['borderWidthHvrRightTablet'] : 0;
			$borderWidthHvrBottom = isset($attr['borderWidthHvrBottomTablet']) ? $attr['borderWidthHvrBottomTablet'] : 0;
			$borderWidthHvrLeft = isset($attr['borderWidthHvrLeftTablet']) ? $attr['borderWidthHvrLeftTablet'] : 0;
			$css .= "border-top-width: {$borderWidthHvrTop}{$borderWidthHvrUnit}; 
			 border-right-width: {$borderWidthHvrRight}{$borderWidthHvrUnit};
			 border-bottom-width: {$borderWidthHvrBottom}{$borderWidthHvrUnit}; 
			 border-left-width: {$borderWidthHvrLeft}{$borderWidthHvrUnit}; 
			";
		} elseif(isset($attr['borderWidthHvrTablet'])) {
			$borderWidthHvr = isset($attr['borderWidthHvrTablet']) ? $attr['borderWidthHvrTablet'] : 0;
			$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
			$css .= "border-width: {$borderWidthHvr}{$borderWidthHvrUnit};";
		}

    $css .= "}";

    //************************************************** */
    // Button Style TablET
    //************************************************** */
  $css .= ".th-button-wrapper{$attr['uniqueID']} .th-button.th-button-inside{";
    //padding
    if (isset($attr['buttonpaddingTypeTablet']) && 'linked' === $attr['buttonpaddingTypeTablet']) {
      $paddingTablet = isset($attr['buttonpaddingTablet']) ? $attr['buttonpaddingTablet'] : 0;
      $paddingUnit = isset($attr['buttonpaddingUnit']) ? $attr['buttonpaddingUnit'] : 'px';
      $css .= "padding: {$paddingTablet}{$paddingUnit};";
      
    } else {
      $paddingUnit = isset($attr['buttonpaddingUnit']) ? $attr['buttonpaddingUnit'] : 'px';
      $paddingTop = isset($attr['buttonpaddingTopTablet']) ? $attr['buttonpaddingTopTablet'] : 0;
      $paddingBottom = isset($attr['buttonpaddingBottomTablet']) ? $attr['buttonpaddingBottomTablet'] : 0;
      $paddingLeft = isset($attr['buttonpaddingLeftTablet']) ? $attr['buttonpaddingLeftTablet'] : 0;
      $paddingRight = isset($attr['buttonpaddingRightTablet']) ? $attr['buttonpaddingRightTablet'] : 0;
      $css .= "
            padding-top: {$paddingTop}{$paddingUnit}; 
            padding-bottom: {$paddingBottom}{$paddingUnit}; 
            padding-left: {$paddingLeft}{$paddingUnit}; 
            padding-right: {$paddingRight}{$paddingUnit}; 
        ";
    }

    //buttonborder-width
    if (isset($attr['buttonborderWidthTypeTablet']) && 'unlinked' === $attr['buttonborderWidthTypeTablet']) {
      $buttonborderWidthUnit = isset($attr['buttonborderWidthUnit']) ? $attr['buttonborderWidthUnit'] : 'px';
      $buttonborderWidthTop = isset($attr['buttonborderWidthTopTablet']) ? $attr['buttonborderWidthTopTablet'] : 0;
      $buttonborderWidthRight = isset($attr['buttonborderWidthRightTablet']) ? $attr['buttonborderWidthRightTablet'] : 0;
      $buttonborderWidthBottom = isset($attr['buttonborderWidthBottomTablet']) ? $attr['buttonborderWidthBottomTablet'] : 0;
      $buttonborderWidthLeft = isset($attr['buttonborderWidthLeftTablet']) ? $attr['buttonborderWidthLeftTablet'] : 0;
      $css .= "border-top-width: {$buttonborderWidthTop}{$buttonborderWidthUnit}; 
      border-right-width: {$buttonborderWidthRight}{$buttonborderWidthUnit}; 
      border-bottom-width: {$buttonborderWidthBottom}{$buttonborderWidthUnit}; 
      border-left-width: {$buttonborderWidthLeft}{$buttonborderWidthUnit}; 
     ";
  } else {
      $buttonborderWidth = isset($attr['buttonborderWidthTablet']) ? $attr['buttonborderWidthTablet'] : 0;
      $buttonborderWidthUnit = isset($attr['buttonborderWidthUnit']) ? $attr['buttonborderWidthUnit'] : 'px';
      $css .= "border-width: {$buttonborderWidth}{$buttonborderWidthUnit}; ";
  }

  //buttonborder-radius
  if (isset($attr['buttonborderRadiusTypeTablet']) && 'unlinked' === $attr['buttonborderRadiusTypeTablet']) {
    $buttonborderRadiusUnit = isset($attr['buttonborderRadiusUnit']) ? $attr['buttonborderRadiusUnit'] : 'px';
    $buttonborderRadiusTop = isset($attr['buttonborderRadiusTopTablet']) ? $attr['buttonborderRadiusTopTablet'] : 0;
    $buttonborderRadiusRight = isset($attr['buttonborderRadiusRightTablet']) ? $attr['buttonborderRadiusRightTablet'] : 0;
    $buttonborderRadiusBottom = isset($attr['buttonborderRadiusBottomTablet']) ? $attr['buttonborderRadiusBottomTablet'] : 0;
    $buttonborderRadiusLeft = isset($attr['buttonborderRadiusLeftTablet']) ? $attr['buttonborderRadiusLeftTablet'] : 0;
    $css .= "border-top-right-radius: {$buttonborderRadiusTop}{$buttonborderRadiusUnit}; 
      border-top-left-radius: {$buttonborderRadiusRight}{$buttonborderRadiusUnit};
      border-bottom-right-radius: {$buttonborderRadiusBottom}{$buttonborderRadiusUnit};
      border-bottom-left-radius: {$buttonborderRadiusLeft}{$buttonborderRadiusUnit};
     ";
  } else {
    $buttonborderRadius = isset($attr['buttonborderRadiusTablet']) ? $attr['buttonborderRadiusTablet'] : 0;
    $buttonborderRadiusUnit = isset($attr['buttonborderRadiusUnit']) ? $attr['buttonborderRadiusUnit'] : 'px';
    $css .= "border-radius: {$buttonborderRadius}{$buttonborderRadiusUnit};";
  }

  // Font Size
  if (isset($attr['fontSizeTablet'])) {
    $fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
    $css .= "font-size: {$attr['fontSizeTablet']}{$fontSizeUnit}; ";
  }

  // Line Height
  if (isset($attr['lineHeightTablet'])) {
    $lineHeightUnit = isset($attr['lineHeightUnit']) ? $attr['lineHeightUnit'] : 'px';
    $css .= "line-height: {$attr['lineHeightTablet']}{$lineHeightUnit}; ";
  }

  // Letter Spacing
  if (isset($attr['letterSpacingTablet'])) {
    $letterSpacingUnit = isset($attr['letterSpacingUnit']) ? $attr['letterSpacingUnit'] : 'px';
    $css .= "letter-spacing: {$attr['letterSpacingTablet']}{$letterSpacingUnit}; ";
  }

    $css .= "}";

    $css .= "}";

             
     //    Mobile view
      $css .= "@media screen and (max-width: 767px){";
      $css .= ".th-button-wrapper{$attr['uniqueID']}{";
            
      //margin
      if (isset($attr['marginTypeMobile']) && 'unlinked' === $attr['marginTypeMobile']) {
        $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
        $marginTop = isset($attr['marginTopMobile']) ? $attr['marginTopMobile'] : 0;
        $marginBottom = isset($attr['marginBottomMobile']) ? $attr['marginBottomMobile'] : 0;
        $marginLeft = isset($attr['marginLeftMobile']) ? $attr['marginLeftMobile'] : 0;
        $marginRight = isset($attr['marginRightMobile']) ? $attr['marginRightMobile'] : 0;
        $css .= "
              margin-top: {$marginTop}{$marginUnit}; 
              margin-bottom: {$marginBottom}{$marginUnit}; 
              margin-left: {$marginLeft}{$marginUnit}; 
              margin-right: {$marginRight}{$marginUnit}; 
          ";
      } else {
        $marginMobile = isset($attr['marginMobile']) ? $attr['marginMobile'] : 0;
        $marginUnit = isset($attr['marginUnit']) ? $attr['marginUnit'] : 'px';
        $css .= "margin: {$marginMobile}{$marginUnit}; 
        ";
      }

      //padding
      if (isset($attr['paddingTypeMobile']) && 'unlinked' === $attr['paddingTypeMobile']) {
        $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
        $paddingTop = isset($attr['paddingTopMobile']) ? $attr['paddingTopMobile'] : 0;
        $paddingBottom = isset($attr['paddingBottomMobile']) ? $attr['paddingBottomMobile'] : 0;
        $paddingLeft = isset($attr['paddingLeftMobile']) ? $attr['paddingLeftMobile'] : 0;
        $paddingRight = isset($attr['paddingRightMobile']) ? $attr['paddingRightMobile'] : 0;
        $css .= "
              padding-top: {$paddingTop}{$paddingUnit}; 
              padding-bottom: {$paddingBottom}{$paddingUnit}; 
              padding-left: {$paddingLeft}{$paddingUnit}; 
              padding-right: {$paddingRight}{$paddingUnit}; 
          ";
      } else {
        $paddingMobile = isset($attr['paddingMobile']) ? $attr['paddingMobile'] : 0;
        $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
        $css .= "padding: {$paddingMobile}{$paddingUnit}; 
        ";
      }
    
      $css .= isset( $attr['zindexMobile'] ) ? "z-index:{$attr['zindexMobile'] };" : '';
     
      //for border-width Mobile
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

			//for border-radius Mobile
			if (isset($attr['borderRadiusTypeMobile']) && 'unlinked' === $attr['borderRadiusTypeMobile']) {
				$borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
				$borderRadiusTopMobile = isset($attr['borderRadiusTopMobile']) ? $attr['borderRadiusTopMobile'] : 0;
				$borderRadiusRightMobile = isset($attr['borderRadiusRightMobile']) ? $attr['borderRadiusRightMobile'] : 0;
				$borderRadiusBottomMobile = isset($attr['borderRadiusBottomMobile']) ? $attr['borderRadiusBottomMobile'] : 0;
				$borderRadiusLeftMobile = isset($attr['borderRadiusLeftMobile']) ? $attr['borderRadiusLeftMobile'] : 0;
				$css .= "border-top-right-radius: {$borderRadiusTopMobile}{$borderRadiusUnit}; border-top-left-radius: {$borderRadiusRightMobile}{$borderRadiusUnit}; border-bottom-right-radius: {$borderRadiusBottomMobile}{$borderRadiusUnit}; border-bottom-left-radius: {$borderRadiusLeftMobile}{$borderRadiusUnit};";
			} else {
				$borderRadiusMobile = isset($attr['borderRadiusMobile']) ? $attr['borderRadiusMobile'] : 0;
				$borderRadiusUnit = isset($attr['borderRadiusUnit']) ? $attr['borderRadiusUnit'] : 'px';
				$css .= "border-radius: {$borderRadiusMobile}{$borderRadiusUnit};";
			}

      //position
	  	if( isset($attr['position']) && $attr['position'] == 'absolute' || isset($attr['position']) && $attr['position'] == 'fixed' ){

			if(isset($attr['horizontalOrientation']) && 'left' === $attr['horizontalOrientation']  && 'inherit' !== $attr['position']){
				$horizontalOrientationOffsetMobile = isset($attr['horizontalOrientationOffsetMobile']) ? $attr['horizontalOrientationOffsetMobile'] : '0';
				$horizontalOrientationOffsetUnit = isset($attr['horizontalOrientationOffsetUnit']) ? $attr['horizontalOrientationOffsetUnit'] : 'px';
				$css .= "left: {$horizontalOrientationOffsetMobile}{$horizontalOrientationOffsetUnit};";
			}
			if(isset($attr['horizontalOrientation']) && 'right' === $attr['horizontalOrientation'] && 'inherit' !== $attr['position']){
				$horizontalOrientationOffsetRightMobile = isset($attr['horizontalOrientationOffsetRightMobile']) ? $attr['horizontalOrientationOffsetRightMobile'] : '0';
				$horizontalOrientationOffsetRightUnit = isset($attr['horizontalOrientationOffsetRightUnit']) ? $attr['horizontalOrientationOffsetRightUnit'] : 'px';
				$css .= "right: {$horizontalOrientationOffsetRightMobile}{$horizontalOrientationOffsetRightUnit};";
			}
			if(isset($attr['verticalOrientation']) && 'top' === $attr['verticalOrientation'] && 'inherit' !== $attr['position']){
				$verticalOrientationOffsetTopMobile = isset($attr['verticalOrientationOffsetTopMobile']) ? $attr['verticalOrientationOffsetTopMobile'] : '0';
				$verticalOrientationOffsetTopUnit = isset($attr['verticalOrientationOffsetTopUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
				$css .= "top: {$verticalOrientationOffsetTopMobile}{$verticalOrientationOffsetTopUnit};";
			}
			if(isset($attr['verticalOrientation']) && 'bottom' === $attr['verticalOrientation'] && 'inherit' !== $attr['position']){
				$verticalOrientationOffsetBottomMobile = isset($attr['verticalOrientationOffsetBottomMobile']) ? $attr['verticalOrientationOffsetBottomMobile'] : '0';
				$verticalOrientationOffsetBottomUnit = isset($attr['verticalOrientationOffsetBottomUnit']) ? $attr['verticalOrientationOffsetBottomUnit'] : 'px';
				$css .= "bottom: {$verticalOrientationOffsetBottomMobile}{$verticalOrientationOffsetBottomUnit};";
			}

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
    
			//Responsive Hide
			if(isset($attr['responsiveTogHideMobile']) && $attr['responsiveTogHideMobile'] ){
				$css .= "display: none";
			}
			else{
				$css .= "display: flex";
			}
     $css .= "}";

     $css .= ".th-button-wrapper{$attr['uniqueID']}:hover{";
        //border-radius hover
		if (isset($attr['borderRadiusHvrTypeMobile']) && 'unlinked' === $attr['borderRadiusHvrTypeMobile']) {
			$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
			$borderRadiusHvrTop = isset($attr['borderRadiusHvrTopMobile']) ? $attr['borderRadiusHvrTopMobile'] : 0;
			$borderRadiusHvrRight = isset($attr['borderRadiusHvrRightMobile']) ? $attr['borderRadiusHvrRightMobile'] : 0;
			$borderRadiusHvrBottom = isset($attr['borderRadiusHvrBottomMobile']) ? $attr['borderRadiusHvrBottomMobile'] : 0;
			$borderRadiusHvrLeft = isset($attr['borderRadiusHvrLeftMobile']) ? $attr['borderRadiusHvrLeftMobile'] : 0;
			$css .= "border-top-right-radius: {$borderRadiusHvrTop}{$borderRadiusHvrUnit};
			 border-top-left-radius: {$borderRadiusHvrRight}{$borderRadiusHvrUnit}; 
			 border-bottom-right-radius: {$borderRadiusHvrBottom}{$borderRadiusHvrUnit}; 
			 border-bottom-left-radius: {$borderRadiusHvrLeft}{$borderRadiusHvrUnit}; 
			";
		} elseif(isset($attr['borderRadiusHvrMobile'])) {
			$borderRadiusHvr = isset($attr['borderRadiusHvrMobile']) ? $attr['borderRadiusHvrMobile'] : 0;
			$borderRadiusHvrUnit = isset($attr['borderRadiusHvrUnit']) ? $attr['borderRadiusHvrUnit'] : 'px';
			$css .= "border-radius: {$borderRadiusHvr}{$borderRadiusHvrUnit};";
		}

		//border-width hover
		if (isset($attr['borderWidthHvrTypeMobile']) && 'unlinked' === $attr['borderWidthHvrTypeMobile']) {
			$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
			$borderWidthHvrTop = isset($attr['borderWidthHvrTopMobile']) ? $attr['borderWidthHvrTopMobile'] : 0;
			$borderWidthHvrRight = isset($attr['borderWidthHvrRightMobile']) ? $attr['borderWidthHvrRightMobile'] : 0;
			$borderWidthHvrBottom = isset($attr['borderWidthHvrBottomMobile']) ? $attr['borderWidthHvrBottomMobile'] : 0;
			$borderWidthHvrLeft = isset($attr['borderWidthHvrLeftMobile']) ? $attr['borderWidthHvrLeftMobile'] : 0;
			$css .= "border-top-width: {$borderWidthHvrTop}{$borderWidthHvrUnit}; 
			 border-right-width: {$borderWidthHvrRight}{$borderWidthHvrUnit};
			 border-bottom-width: {$borderWidthHvrBottom}{$borderWidthHvrUnit}; 
			 border-left-width: {$borderWidthHvrLeft}{$borderWidthHvrUnit}; 
			";
		} elseif(isset($attr['borderWidthHvrMobile'])) {
			$borderWidthHvr = isset($attr['borderWidthHvrMobile']) ? $attr['borderWidthHvrMobile'] : 0;
			$borderWidthHvrUnit = isset($attr['borderWidthHvrUnit']) ? $attr['borderWidthHvrUnit'] : 'px';
			$css .= "border-width: {$borderWidthHvr}{$borderWidthHvrUnit};";
		}
    $css .= "}";

    //************************************************** */
    // Button Style Mobile
    //************************************************** */
  $css .= ".th-button-wrapper{$attr['uniqueID']} .th-button.th-button-inside{";
    //padding
    if (isset($attr['buttonpaddingTypeMobile']) && 'linked' === $attr['buttonpaddingTypeMobile']) {
      $paddingMobile = isset($attr['buttonpaddingMobile']) ? $attr['buttonpaddingMobile'] : 0;
      $paddingUnit = isset($attr['buttonpaddingUnit']) ? $attr['buttonpaddingUnit'] : 'px';
      $css .= "padding: {$paddingMobile}{$paddingUnit};";
    } else {
      $paddingUnit = isset($attr['buttonpaddingUnit']) ? $attr['buttonpaddingUnit'] : 'px';
      $paddingTop = isset($attr['buttonpaddingTopMobile']) ? $attr['buttonpaddingTopMobile'] : 0;
      $paddingBottom = isset($attr['buttonpaddingBottomMobile']) ? $attr['buttonpaddingBottomMobile'] : 0;
      $paddingLeft = isset($attr['buttonpaddingLeftMobile']) ? $attr['buttonpaddingLeftMobile'] : 0;
      $paddingRight = isset($attr['buttonpaddingRightMobile']) ? $attr['buttonpaddingRightMobile'] : 0;
      $css .= "
            padding-top: {$paddingTop}{$paddingUnit}; 
            padding-bottom: {$paddingBottom}{$paddingUnit}; 
            padding-left: {$paddingLeft}{$paddingUnit}; 
            padding-right: {$paddingRight}{$paddingUnit}; 
        ";
    }

    //buttonborder-width
    if (isset($attr['buttonborderWidthTypeMobile']) && 'unlinked' === $attr['buttonborderWidthTypeMobile']) {
      $buttonborderWidthUnit = isset($attr['buttonborderWidthUnit']) ? $attr['buttonborderWidthUnit'] : 'px';
      $buttonborderWidthTop = isset($attr['buttonborderWidthTopMobile']) ? $attr['buttonborderWidthTopMobile'] : 0;
      $buttonborderWidthRight = isset($attr['buttonborderWidthRightMobile']) ? $attr['buttonborderWidthRightMobile'] : 0;
      $buttonborderWidthBottom = isset($attr['buttonborderWidthBottomMobile']) ? $attr['buttonborderWidthBottomMobile'] : 0;
      $buttonborderWidthLeft = isset($attr['buttonborderWidthLeftMobile']) ? $attr['buttonborderWidthLeftMobile'] : 0;
      $css .= "border-top-width: {$buttonborderWidthTop}{$buttonborderWidthUnit}; 
      border-right-width: {$buttonborderWidthRight}{$buttonborderWidthUnit}; 
      border-bottom-width: {$buttonborderWidthBottom}{$buttonborderWidthUnit}; 
      border-left-width: {$buttonborderWidthLeft}{$buttonborderWidthUnit}; 
     ";
  } else {
      $buttonborderWidth = isset($attr['buttonborderWidthMobile']) ? $attr['buttonborderWidthMobile'] : 0;
      $buttonborderWidthUnit = isset($attr['buttonborderWidthUnit']) ? $attr['buttonborderWidthUnit'] : 'px';
      $css .= "border-width: {$buttonborderWidth}{$buttonborderWidthUnit}; ";
  }

  //buttonborder-radius
  if (isset($attr['buttonborderRadiusTypeMobile']) && 'unlinked' === $attr['buttonborderRadiusTypeMobile']) {
    $buttonborderRadiusUnit = isset($attr['buttonborderRadiusUnit']) ? $attr['buttonborderRadiusUnit'] : 'px';
    $buttonborderRadiusTop = isset($attr['buttonborderRadiusTopMobile']) ? $attr['buttonborderRadiusTopMobile'] : 0;
    $buttonborderRadiusRight = isset($attr['buttonborderRadiusRightMobile']) ? $attr['buttonborderRadiusRightMobile'] : 0;
    $buttonborderRadiusBottom = isset($attr['buttonborderRadiusBottomMobile']) ? $attr['buttonborderRadiusBottomMobile'] : 0;
    $buttonborderRadiusLeft = isset($attr['buttonborderRadiusLeftMobile']) ? $attr['buttonborderRadiusLeftMobile'] : 0;
    $css .= "border-top-right-radius: {$buttonborderRadiusTop}{$buttonborderRadiusUnit}; 
      border-top-left-radius: {$buttonborderRadiusRight}{$buttonborderRadiusUnit};
      border-bottom-right-radius: {$buttonborderRadiusBottom}{$buttonborderRadiusUnit};
      border-bottom-left-radius: {$buttonborderRadiusLeft}{$buttonborderRadiusUnit};
     ";
  } else {
    $buttonborderRadius = isset($attr['buttonborderRadiusMobile']) ? $attr['buttonborderRadiusMobile'] : 0;
    $buttonborderRadiusUnit = isset($attr['buttonborderRadiusUnit']) ? $attr['buttonborderRadiusUnit'] : 'px';
    $css .= "border-radius: {$buttonborderRadius}{$buttonborderRadiusUnit};";
  }

  // Font Size
  if (isset($attr['fontSizeMobile'])) {
    $fontSizeUnit = isset($attr['fontSizeUnit']) ? $attr['fontSizeUnit'] : 'px';
    $css .= "font-size: {$attr['fontSizeMobile']}{$fontSizeUnit}; ";
  }

  // Line Height
  if (isset($attr['lineHeightMobile'])) {
    $lineHeightUnit = isset($attr['lineHeightUnit']) ? $attr['lineHeightUnit'] : 'px';
    $css .= "line-height: {$attr['lineHeightMobile']}{$lineHeightUnit}; ";
  }

  // Letter Spacing
  if (isset($attr['letterSpacingMobile'])) {
    $letterSpacingUnit = isset($attr['letterSpacingUnit']) ? $attr['letterSpacingUnit'] : 'px';
    $css .= "letter-spacing: {$attr['letterSpacingMobile']}{$letterSpacingUnit}; ";
  }
  
    $css .= "}";

    $css .= "}";


    $css .= ".th-button-wrapper{$attr['uniqueID']}:focus{outline: none;
    text-decoration: none;
    }"; 
    
    }

    return $css;
}