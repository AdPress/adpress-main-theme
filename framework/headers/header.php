<?php global $brad_data , $woocommerce , $header_class; ?>
                 
<div id="header_wrapper" class="<?php echo $header_class?>">
  <?php
if( @$brad_data['show_topbar'] == true ) :
    get_template_part('framework/headers/header-topbar');
endif;
?>
  <div class="header_container">
    <div id="header" class="header-v1 <?php if($brad_data['check_fixed_header'] == true){ echo ' sticky-nav'; } else if( $brad_data['show_second_nav'] == true){ echo ' second-nav';}?>" data-height="<?php echo $brad_data['header_height']?>" data-shrinked-height="<?php echo intval($brad_data['shrink_nav_height']);?>" data-auto-offset="<?php echo $brad_data['check_auto_offset'];?>" data-offset="<?php echo intval($brad_data['shrink_nav_offset'])?>" data-second-nav-offset="<?php echo intval($brad_data['second_nav_offset'])?>">
      <section id="main_navigation" class="header-nav shrinking-nav">
        <div class="container">
          <div id="main_navigation_container" class="row-fluid">
            <div class="row-fluid"> 
              <!-- logo -->
              <div class="logo-container">
                <a id="logo" href="<?php echo home_url(); ?>">
                  <?php if( isset($brad_data['media_logo']['url'])){ ?>
                  <img src="<?php echo $brad_data['media_logo']['url']; ?>" class="default-logo" alt="<?php bloginfo('name'); ?>">
                  <?php if( isset($brad_data['media_logo_white']['url']) ){ ?>
                  <img src="<?php echo $brad_data['media_logo_white']['url']; ?>" class="white-logo" alt="<?php bloginfo('name'); ?>">
                  <?php } else { ?>
                  <img src="<?php echo $brad_data['media_logo']['url']; ?>" class="white-logo" alt="<?php bloginfo('name'); ?>">
                  <?php }} else { echo bloginfo('name'); }?>
                  </a>
         
              </div>  
                
              <!-- Tooggle Menu will displace on mobile devices -->
              <div id="mobile-menu-container">
              <?php if($woocommerce && $brad_data['check_cartmobile'] == true):?>
                <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="carticon-mobile"><i class="fa-shopping-cart"></i></a>
                <?php endif; ?>
              <a class="toggle-menu" href="#"><i class="fa-navicon"></i></a>  
              </div>
              
              <nav class="nav-container">
                <ul id="main_menu" class="main_menu">
                <!-- Main Navigation Menu -->
                <?php get_template_part('framework/headers/nav-bar'); ?>
                             
                <?php if ($woocommerce && $brad_data['check_cartheader'] == true) { ?>
                <li class="cart-container"> 
                  <!-- Cart Icons --> 
                  <a class="cart-icon-wrapper" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"> <span class="cart-icon"><i class="fa-shopping-cart"></i></span><span class="count"><?php echo $woocommerce->cart->cart_contents_count; ?></span></a> 
                  <!-- Cart Menu Start -->
                  <?php
               // Check for WooCommerce 2.0 and display the cart widget
	          if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) {
	                the_widget( 'WC_Widget_Cart', 'title= ' );
	          } else {
		         the_widget( 'WooCommerce_Widget_Cart', 'title= ' );
	         }
	         ?>
                </li>
                <?php }  ?>
                
                <?php  if($brad_data['check_searchform'] == true) : ?>
                <li id="header-search-button"><a href="#"  class="search-button"><i class="fa-search"></i></a>
                <div id="header-search-panel">
                            <div>
                              <form action="<?php echo home_url(); ?>/" id="header-search-form" method="get">
                                <input type="text"  id="header-search" name="s" value="" placeholder="<?php echo __('Hit Enter to Search','brad-framework');?>" autocomplete="off" />
                                <!-- Create a fake search button --> 
                                <input type="submit"  name="submit" value="submit" />
                              </form>
                              <span class="close-icon"><i class="fa fa-search"></i></span>
                           </div>
                     </div>
                 </li>
                <?php endif; ?>
  
				<?php if( $brad_data['check_searchicons_header'] ){ ?>
                 <li class="header-social-icons">
                      <?php get_template_part('framework/headers/social-icons'); ?>
                 </li>     
                 <?php } ?>
               
               </ul>
               </nav>
              </div>
            </div>
          </div>
      </section>
    </div>
  </div>
</div>

