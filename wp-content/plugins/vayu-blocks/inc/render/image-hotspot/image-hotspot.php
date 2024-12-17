<?php
function vayu_blocks_render_hotspot_block( $attributes ) {
    // Extract block attributes.
    $image = isset( $attributes['image'] ) ? esc_url( $attributes['image'] ) : '';
    $hotspots = isset( $attributes['hotspots'] ) ? $attributes['hotspots'] : [];
    $block_classes = isset( $attributes['className'] ) ? esc_attr( $attributes['className'] ) : '';

    // Start output buffering for rendering.
    ob_start(); 
    ?>
    <div class="vayu-blocks-hotspot <?php echo $block_classes; ?>">
        <?php if ( $image ) : ?>
            <div class="image-wrapper" style="position: relative;">
                <img
                    src="<?php echo $image; ?>"
                    alt="Hotspot Image"
                    class="vayu-blocks-ihs-image"
                />
                <?php foreach ( $hotspots as $index => $hotspot ) :
                    $x = isset( $hotspot['x'] ) ? floatval( $hotspot['x'] ) : 0;
                    $y = isset( $hotspot['y'] ) ? floatval( $hotspot['y'] ) : 0;
                    $tooltiptext = isset( $hotspot['tooltiptext'] ) ? $hotspot['tooltiptext'] : '';
                    $pointtext = isset( $hotspot['pointtext'] ) ? $hotspot['pointtext'] : '';
                    $type = isset( $hotspot['type'] ) ? esc_attr( $hotspot['type'] ) : 'text';
                    $link = isset( $hotspot['link'] ) ? esc_url( $hotspot['link'] ) : '';
                    $target = isset( $hotspot['target'] ) ? esc_attr( $hotspot['target'] ) : '_self';
                    $rel = isset( $hotspot['rel'] ) ? esc_attr( $hotspot['rel'] ) : 'noopener noreferrer';
                    $animation = isset( $hotspot['animation'] ) ? esc_attr( $hotspot['animation'] ) : '';
                    $icon = isset( $hotspot['icon'] ) ? $hotspot['icon'] : ''; // SVG or HTML icon.
                    $product = isset( $hotspot['productId'] ) ? intval( $hotspot['productId'] ) : 0;

                    // Fetch product details if a product ID is provided.
                    $product_html = '';
                    if ( $product ) {
                        $wc_product = wc_get_product( $product ); // Use WooCommerce function to fetch the product.
                        if ( $wc_product ) {
                            $product_title = $wc_product->get_name();
                            $product_link = $wc_product->get_permalink();
                            $product_price = $wc_product->get_price_html();
                            $product_image = $wc_product->get_image( 'thumbnail', [ 'class' => 'hotspot-product-image' ] );
                            $add_to_cart_url = do_shortcode( '[add_to_cart_url id="' . $product . '"]' );
                    
                            $product_html = sprintf(
                                '<div class="hotspot-product">
                                    <a href="%1$s" target="_blank" rel="noopener noreferrer">
                                        %2$s
                                        <h3>%3$s</h3>
                                        <p>%4$s</p>
                                    </a>
                                    <a href="%5$s" class="hotspot-add-to-cart-link">%6$s</a>
                                </div>',
                                esc_url( $product_link ),
                                $product_image ? $product_image : '',
                                esc_html( $product_title ),
                                $product_price ? $product_price : esc_html__( 'Price not available', 'vayu-blocks' ),
                                esc_url( $add_to_cart_url ),
                                esc_html__( 'Add to Cart', 'vayu-blocks' )
                            );
                        }
                    }
                ?>
                    <div
                        class="hotspot <?php echo $animation; ?>"
                        style="
                            position: absolute;
                            top: <?php echo $y; ?>%;
                            left: <?php echo $x; ?>%;
                            transform: translate(-50%, -50%);
                        "
                    >
                        <!-- Hotspot Icon -->
                        <div
                            class="hotspot-icon"
                            style="background: red; min-width: 12px;min-height: 12px;border-radius: 50%;"
                        >
                            <?php if ( $icon ) : ?>
                                <span class="hotspot-icon-content"><?php echo $icon; ?></span>
                            <?php endif; ?>

                            <!-- Optional Text within the Icon -->
                            <?php if ( ! empty( $pointtext ) ) : ?>
                                <span class="hotspot-text"><?php echo $pointtext; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Hotspot Tooltip -->
                        <div class="hotspot-tooltip">
                            <?php if ( 'link' === $type && $link ) : ?>
                                <a
                                    href="<?php echo $link; ?>"
                                    target="<?php echo $target; ?>"
                                    rel="<?php echo $rel; ?>"
                                    style="color: #fff; text-decoration: underline;"
                                >
                                    <?php echo $tooltiptext; ?>
                                </a>
                            <?php else : ?>
                                <span><?php echo $tooltiptext; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Render Product Information -->
                        <?php 
                        if( $type == 'product' ){
                        echo $product_html;
                        } ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="vayu-blocks-no-image">
                <p><?php esc_html_e( 'No image selected.', 'vayu-blocks' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
function vayu_blocks_render_pin_block( $attributes ) {
    return '';
}