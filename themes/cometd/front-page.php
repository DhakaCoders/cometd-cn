<?php get_header(); 
$telephone = get_field('telephone', 'options');
$intro = get_field('intro', HOMEID);
?>
<section class="hm-bnr-section inline-bg" style="background-image: url('<?php echo !empty($intro['image'])?cbv_get_image_src($intro['image']):''; ?>');">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-bnr-cntnt">
          <?php if( $intro ): ?>
          <div class="hm-bnr-cntnt" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/bnr-cntnt-grey-bg.png');">
            <div class="hm-bnr-lft-cntnt">
              <div class="hm-bnr-des">
                <?php 
                  if( !empty($intro['title']) ) printf('<h1 class="fl-h1 hm-bnr-cntnt-title">Welcome to Comet Dental!</h1>', $intro['title']); 
                  if( !empty($intro['description']) ) echo wpautop($intro['description']); 
                ?>
                <?php if( !empty($telephone) ): ?>
                <div class="hm-bnr-contact-info">
                  <strong>SCHEDULE YOUR APPOINTMENT</strong>
                  <div class="hm-bnr-tel">
                    <?php printf('<a href="tel:%s">%s</a>', phone_preg($telephone), $telephone); ?>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <?php if(!empty($intro['logo'])): ?>
            <div class="hm-bnr-rgt-cntnt">
              <div class="hm-bnr-rgt-logo">
                <div class="hide-1023"><?php echo cbv_get_image_tag($intro['logo']); ?></div>
                <!-- <div class="show-1023"><img src="<?php echo THEME_URI; ?>/assets/images/logo-white.png" alt=""></div> -->
              </div>
            </div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php 
      $showhide_gallery = get_field('showhide_gallery', HOMEID);
      if( $showhide_gallery ): 
        $galleries = get_field('gallery', HOMEID);
        if( $galleries ):
      ?>
      <div class="col-md-12">
        <div class="bnr-service-grd-cntlr-row">
          <!-- If want to make this grid to Slider then use this"servicegrdSlider" class at "service-grids-cntlr  " -->
            <div class="service-grids-cntlr  servicegrdSlider">
              <?php foreach( $galleries as $galID ): ?>
              <div class="service-grd-col">
                <div class="service-grd-item">
                  <div class="service-grd-fea-img">
                    <div class="inline-bg" style="background-image: url('<?php echo cbv_get_image_src($galID); ?>');"></div>
                      <?php echo cbv_get_image_tag($galID); ?>
                  </div>
                </div>
              </div>
             <?php endforeach; ?>
            </div>
        </div>
      </div>
      <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>    
</section>
<?php 
  $proinfo = get_field('profileinfo', 'options');
  $address = get_field('address', 'options');
  $gurl = get_field('gurl', 'options');
  $gmaplink = !empty($gurl)?$gurl: 'javascript:void()';
  $profile_image = get_field('profile_image', HOMEID);
?>
<section class="hm-contact-sec-wrp">
  <?php if( !empty($profile_image) ): ?>
  <div class="hm-contact-lft-img-cntlr">
    <?php echo cbv_get_image_tag($profile_image); ?>
  </div>
  <?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-contact-sec-cntlr">
          <div class="hm-contact-con-lft">
            <div class="hm-contact-con-lft-inr">
              <div class="contact-con-info-cntlr">
                <div class="contact-info-row contact-info-row-1">
                  <?php 
                    if( !empty($proinfo['name']) ) printf('<h2 class="fl-h3 contact-info-title">%s</h2>', $proinfo['name']); 
                    if( !empty($address) ) printf('<a href="%s">%s</a>', $gmaplink, $address); 
                  ?>
                </div>
                <?php if( !empty($proinfo['office_hours']) ): ?>
                <div class="contact-info-row contact-info-row-2">
                  <h3 class="fl-h3 contact-info-title">OFFICE HOURS:</h3>
                  <?php printf('%s', $proinfo['office_hours']); ?>
                </div>
                <?php endif; ?>
                <div class="contact-info-row contact-info-row-3">
                  <?php printf('<span>PHONE: </span><a href="tel:%s">%s</a>', phone_preg($telephone), $telephone); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="hm-contact-con-rgt">
            <div class="hm-contact-con-rgt-inner"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $mapcode = get_field('map_code', HOMEID); if( $mapcode ): ?>
  <div class="hm-contact-map-cntlr">
    <div class="hm-contact-google-map-wrp">
      <div class="hm-contact-google-map">
        <?php printf( '%s', $mapcode ); ?>
      </div> 
    </div>
  </div>
<?php endif; ?>
</section>
<?php get_footer(); ?>
