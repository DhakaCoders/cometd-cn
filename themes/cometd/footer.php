<?php 
  $copyright_text = get_field('copyright_text', 'options');
?>
<footer class="footer-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ftr-cntlr">
          <div class="ftr-copyright">
            <?php if( !empty( $copyright_text ) ) printf( '%s', $copyright_text); ?>
          </div>
          <div class="ftr-menu">
            <?php 
              $ftmenuOptions = array( 
                  'theme_location' => 'cbv_ft_menu', 
                  'menu_class' => 'clearfix reset-list',
                  'container' => '',
                  'container_class' => ''
                );
              wp_nav_menu( $ftmenuOptions ); 
            ?>
          </div>
        </div>
      </div>
    </div>
  </div> 
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>