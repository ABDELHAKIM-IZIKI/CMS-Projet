<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 

function vayu_render_init(){

	add_action( 'wp_head', 'vayu_render_server_side_css',999 );
	
}

add_action( 'init', 'vayu_render_init', 99);

function vayu_render_server_side_css() {


	global $_wp_current_template_content;

	$content         = '';
	$slugs           = array();

	$template_blocks = parse_blocks( $_wp_current_template_content );

	foreach ( $template_blocks as $template_block ) {
		if ( 'core/template-part' === $template_block['blockName'] ) {
			$slugs[] = $template_block['attrs']['slug'];
		}
	}

	$templates_parts = get_block_templates( array( 'slugs__in' => $slugs ), 'wp_template_part' );
    
	
	foreach ( $templates_parts as $templates_part ) {
		if ( isset( $templates_part->content ) && isset( $templates_part->slug ) && in_array( $templates_part->slug, $slugs ) ) {
			$content .= $templates_part->content;
		}
	}

	$content .= $_wp_current_template_content; 

   if ( function_exists( 'has_blocks' ) ) {

		global $post;

		if ( ! is_object( $post ) && ( !is_404() ) ) {
			return;
		}

		$content .= get_post_field( 'post_content', get_the_ID() );

		$blocks = parse_blocks( $content );

		if ( ! is_array( $blocks ) || empty( $blocks ) ) {
			return;
		}


		if ( ( is_404() ) ) {
			
			$css = vayu_cycle_through_blocks( $blocks, ' ' );
		
		}
		else{
			$css = vayu_cycle_through_blocks( $blocks, $post->ID );	
		}



		if ( empty( $css ) ) {
			return;
		}

		$style  = "\n" . '<style id="vayu-block-css">' . "\n";
		$style .= $css;
		$style .= "\n" . '</style>' . "\n";

		echo $style;
	   }

}


function vayu_enqueue_google_fonts($font_family_string)
{
    $font_families = explode(',', $font_family_string);
    $font_family_string = str_replace(' ', '+', implode('|', $font_families));
    wp_enqueue_style('th-blocks-google-fonts-' . $font_family_string, "https://fonts.googleapis.com/css?family=$font_family_string&display=swap", array(), null);
}

function vayu_cycle_through_blocks( $blocks, $post_id ) {
	$css = '';
	foreach ( $blocks as $block ) {
		if ( $block['blockName'] === 'vayu-blocks/advance-timeline' ) {
			$css .= generate_inline_advance_timeline_styles($block['attrs']);
		}

		if ( $block['blockName'] === 'vayu-blocks/timeline-child' ) {
			$css .= generate_inline_timeline_child_styles($block['attrs']);
		}

		if ( $block['blockName'] === 'vayu-blocks/flip-wrapper' ) {
			$css .= generate_inline_flip_wrapper_styles($block['attrs']);
		}

	 	if ( $block['blockName'] === 'vayu-blocks/advance-slider' ) {
			$css .= generate_inline_slider_styles($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/flip-box' ) {
			$css .= generate_inline_flip_box_styles($block['attrs']);
		} 
		
		if ( $block['blockName'] === 'vayu-blocks/image' ) {
			$css .= generate_inline_image_styles($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/icon' ) {
			$css .= generate_inline_icon_styles($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/advance-heading' ) {
			   if ( isset($block['attrs']['fontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['fontFamily']);
			    }
                $css .= vayu_advance_heading_style($block['attrs']);
		} 

		if ( $block['blockName'] === 'vayu-blocks/advance-container' ) {
			
			 $css .= vayu_advance_container_style($block['attrs']);
	    } 

		if ( $block['blockName'] === 'vayu-blocks/advance-query-loop' ) {
			
			$css .= vayu_advance_loop_style($block['attrs']);
	   } 

	   if ( $block['blockName'] === 'vayu-blocks/blurb' ) {
			
		$css .= vayu_blurb_style($block['attrs']);

        } 

		if ( $block['blockName'] === 'vayu-blocks/unfold' ) {
			
			$css .= vayu_unfold_style($block['attrs']);
	
		} 

		if ( $block['blockName'] === 'vayu-blocks/advance-product' ){

			if ( isset($block['attrs']['tabfontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['tabfontFamily']);
			  }

			if ( isset($block['attrs']['catfontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['catfontFamily']);
			  } 
			
			if ( isset($block['attrs']['titlefontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['titlefontFamily']);
			  }
			
			if ( isset($block['attrs']['pricefontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['pricefontFamily']);
			  }
			
			if ( isset($block['attrs']['buttonfontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['buttonfontFamily']);
			  }

			$css .= vayu_advance_product_tab_style($block['attrs']);
	     } 

		if ( $block['blockName'] === 'vayu-blocks/advance-spacer' ) {
			 $css .= vayu_advance_spacer_style($block['attrs']);
	 	} 

		 if ( $block['blockName'] === 'vayu-blocks/advance-button' ) {

			if ( isset($block['attrs']['fontFamily'] ) ){
				vayu_enqueue_google_fonts($block['attrs']['fontFamily']);
			  }

			 $css .= vayu_advance_button_style($block['attrs']);
		} 

		if ( ! empty( $block['innerBlocks'] ) ) {
			$inner_css = vayu_cycle_through_blocks( $block['innerBlocks'], $post_id );
			if ( $inner_css ) {
				$css .= $inner_css;
			}
		}

		if ( 'core/block' === $block['blockName'] && ! empty( $block['attrs']['ref'] ) ) {
			$reusable_block = get_post( $block['attrs']['ref'] );
			if ( ! $reusable_block || 'wp_block' !== $reusable_block->post_type ) {
				continue;
			}

			if ( 'publish' !== $reusable_block->post_status || ! empty( $reusable_block->post_password ) ) {
				continue;
			}

			$blocks = parse_blocks( $reusable_block->post_content );
			$inner_css = vayu_cycle_through_blocks( $blocks, $reusable_block->ID );
			if ( $inner_css ) {
				$css .= $inner_css;
			}
		}
	}

	return $css;
}

function vayu_hex2rgba( $color, $opacity = false ) {

	$default = 'rgb(0,0,0)';

	if ( empty( $color ) ) {
		return $default;
	}

	if ( '#' == $color[0] ) {
		$color = substr( $color, 1 );
	}

	if ( strlen( $color ) == 6 ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	$rgb = array_map( 'hexdec', $hex );


	if ( $opacity >= 0 ) {

		$opacity = $opacity / 100;
		
		$output = 'rgba( ' . implode( ',', $rgb ) . ',' . $opacity . ' )';

	} else {

		$output = 'rgb( ' . implode( ',', $rgb ) . ' )';

	}

	return $output;
}