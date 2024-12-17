<?php 

if ( ! defined( 'ABSPATH' ) ) {
   exit;
} 

function vayu_block_loop_render($attributes, $content, $block) {

    return $content;

}

function vayu_advance_loop_style($attr){

    $css = "";
    $css .= ".wp-block-vayu-blocks-advance-query-loop{";
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
        $css .= "}";
        /**************/
        //Hover
        /**************/
         $css .= ".wp-block-vayu-blocks-advance-query-loop:hover{";
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

    /**********/
    // Tablet
    /**********/

    $css .= "@media only screen and (min-width: 768px) and (max-width: 1023px) {";
    $css .= ".wp-block-vayu-blocks-advance-query-loop{";
    if (isset($attr['paddingTypeTablet']) && 'unlinked' === $attr['paddingTypeTablet']) {
        $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
        $paddingTopTablet = isset($attr['paddingTopTablet']) ? $attr['paddingTopTablet'] : 0;
        $paddingRightTablet = isset($attr['paddingRightTablet']) ? $attr['paddingRightTablet'] : 0;
        $paddingBottomTablet = isset($attr['paddingBottomTablet']) ? $attr['paddingBottomTablet'] : 0;
        $paddingLeftTablet = isset($attr['paddingLeftTablet']) ? $attr['paddingLeftTablet'] : 0;
        $paddingTablet = "{$paddingTopTablet}{$paddingUnit} {$paddingRightTablet}{$paddingUnit} {$paddingBottomTablet}{$paddingUnit} {$paddingLeftTablet}{$paddingUnit}";
        $css .= "padding: {$paddingTablet};";
    } else {
        $paddingTablet = isset($attr['paddingTablet']) ? $attr['paddingTablet'] : '';
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
    $css .= "}";

    $css .= ".wp-block-vayu-blocks-advance-query-loop:hover {";
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
    $css .= "}";

    $css .= "}";
    
    //    mobile view
    $css .= "@media only screen and (max-width: 767px){";

    $css .= ".wp-block-vayu-blocks-advance-query-loop{";
    if (isset($attr['paddingTypeMobile']) && 'unlinked' === $attr['paddingTypeMobile']) {
        $paddingUnit = isset($attr['paddingUnit']) ? $attr['paddingUnit'] : 'px';
        $paddingTopMobile = isset($attr['paddingTopMobile']) ? $attr['paddingTopMobile'] : 0;
        $paddingRightMobile = isset($attr['paddingRightMobile']) ? $attr['paddingRightMobile'] : 0;
        $paddingBottomMobile = isset($attr['paddingBottomMobile']) ? $attr['paddingBottomMobile'] : 0;
        $paddingLeftMobile = isset($attr['paddingLeftMobile']) ? $attr['paddingLeftMobile'] : 0;
        $css .= "padding-top: {$paddingTopMobile}{$paddingUnit}; padding-right: {$paddingRightMobile}{$paddingUnit}; padding-bottom: {$paddingBottomMobile}{$paddingUnit}; padding-left: {$paddingLeftMobile}{$paddingUnit};";
    } else {
        $paddingMobile = isset($attr['paddingMobile']) ? $attr['paddingMobile'] : '';
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

    $css .= "}";

    $css .= ".wp-block-vayu-blocks-advance-query-loop:hover{";
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

    $css .= "}";


    return $css;

}