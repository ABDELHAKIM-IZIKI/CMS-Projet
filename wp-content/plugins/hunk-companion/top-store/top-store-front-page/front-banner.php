<?php
if(get_theme_mod('top_store_disable_banner_sec',false) == true){
    return;
  }
?>
<section class="thunk-banner-section">
	<?php top_store_display_customizer_shortcut( 'top_store_banner' );?>
	<div class="content-wrap">
  <?php top_store_front_banner(); ?>
</div>
</section>