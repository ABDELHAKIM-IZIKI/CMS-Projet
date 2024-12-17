<?php 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
function vayu_block_blurb_render($attributes, $content, $block) {
    $classnames = 'vayu_blocks_blrub_wrap';

    // Add layout-specific classnames
    if (isset($attributes['blurbLayout'])) {
        if ($attributes['blurbLayout'] === 'classic') {
            $classnames .= ' is-blurb-classic';
        } elseif ($attributes['blurbLayout'] === 'flipbox') {
            $classnames .= ' is-blurb-flipbox';
        }
    }

    // Get block wrapper attributes
    $wrapper_attributes = get_block_wrapper_attributes(['class' => trim($classnames)]);

    // Check for link URL and link target
    $link_enable = isset($attributes['linkEnable']) ? esc_url($attributes['linkEnable']) : false;
    $link_url = isset($attributes['linkUrl']) ? esc_url($attributes['linkUrl']) : '';
    $link_target = isset($attributes['linkTarget']) && $attributes['linkTarget'] === '_blank' ? ' target="_blank" rel="noopener noreferrer"' : '';

    // Render the block with optional link
    if ($link_enable == true && $link_url !=='' ) {
        return sprintf(
            '
            <div %1$s><a href="%2$s"%3$s>
            <div class="blurb-inner">%4$s</div>
            </a></div>
            ',
            $wrapper_attributes,
            $link_url,
            $link_target,
            $content
        );
    } else {
        return sprintf(
            '<div %1$s><div class="blurb-inner">%2$s</div></div>',
            $wrapper_attributes,
            $content
        );
    }
}
