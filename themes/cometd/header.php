<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
  <head>
  <meta charset="<?php bloginfo('charset'); ?>">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#EE3E15">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->	

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php 
    $logoObj = get_field('hdlogo', 'options');
    if( is_array($logoObj) ){
      $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
    }else{
      $logo_tag = '';
    }
    $telephone = get_field('telephone', 'options');
  ?>  
<div class="page-body-cntlr">
<div class="bdoverlay"></div>
<header class="header">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header-inr clearfix">
            <div class="hdr-lft">
              <?php if( !empty($logo_tag) ): ?>
              <div class="logo">
               <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                 </a>
              </div>
              <?php endif; ?>
            </div>
            <div class="hdr-menu hide-md">
              <nav class="main-nav">
              <?php 
                $mmenuOptions = array( 
                    'theme_location' => 'cbv_main_menu', 
                    'menu_class' => 'clearfix reset-list',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $mmenuOptions ); 
              ?>
              </nav>
            </div>
            <?php if( !empty($telephone) ): ?>
            <div class="hdr-rgt hide-md">
              <div class="hdr-tel">
                <span>MAKE AN APPOINTMENT</span>
                <?php printf('<a href="tel:%s">%s</a>', phone_preg($telephone), $telephone); ?>
              </div>
            </div>
            <?php endif; ?>
            <div class="hamburger-cntlr show-md">
              <div class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</header>

<div class="xs-mobile-menu">
  <div class="xs-mbl-hdr">
    <div class="hdr-lft">
    <?php if( !empty($logo_tag) ): ?>
    <div class="logo">
     <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php echo $logo_tag; ?>
       </a>
    </div>
    <?php endif; ?>
    </div>
    <div class="hdr-rgt">
      <div class="hamburger-cntlr">
        <div class="hamburger-icon">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </div>

  <div class="xs-menu">
    <nav class="main-nav">
      <?php 
        $mmenuOptions = array( 
            'theme_location' => 'cbv_main_menu', 
            'menu_class' => 'clearfix reset-list',
            'container' => '',
            'container_class' => ''
          );
        wp_nav_menu( $mmenuOptions ); 
      ?>
    </nav>
  </div>
  <?php if( !empty($telephone) ): ?>
  <div class="xs-mbl-btm">
    <div class="hdr-tel">
      <span>MAKE AN APPOINTMENT</span>
      <?php printf('<a href="tel:%s">%s</a>', phone_preg($telephone), $telephone); ?>
    </div>
  </div>
  <?php endif; ?>
</div>
<!-- end of header -->