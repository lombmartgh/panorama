<?php
global $base_url;
global $language;
$lang_name = $language->language;
?>
<?php

$producto_pos['tipo'] = arg(1);
drupal_add_js($producto_pos,'setting');

?>


<section id="section-top">
  <div class="col-xs-12 top">
    <div id="top">
      <div class="container">
        <div class="col-md-6 offer">

        </div>
        <div class="col-md-6">
          <?php echo render($page['top']); ?>
        </div>
      </div>

    </div>
  </div>
</section>


<section id="section-menubar">
  <div class="col-xs-12 otra">
    <div class="col-xs-12 menubar">
      <div class="container">
        <div class="logo col-xs-2 text-center">

          <div class="navbar-header">
            <a class="navbar-brand home" data-animate-hover="bounce"
               href="<?php print $front_page ?>">
              <img class="" src="<?php echo $logo ?>"
                   alt="<?php print $site_name ?>"
                   title="<?php print $site_name ?>"
                   id="logo">
            </a>
          </div>
        </div>


        <div class="megamenu col-xs-9">
          <?php echo render($page['menu']); ?>
        </div>
        <div class="buscar col-xs-1">
          <div class="navbar-collapse  right" id="search-not-mobile">
            <button type="button" class="btn navbar-btn btn-primary"
                    data-toggle="collapse"
                    data-target="#search">
              <span class="sr-only">Toggle search</span>
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </div>
      <div id="search" class="col-xs-12 buscador">
        <div class="container"><?php echo render($page['buscador']); ?></div>
      </div>
    </div>

  </div>
</section>


<?php

print render($page['content']['metatags']);
?>


<section id="contenido">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contenido">
        <section id="mensajes">
          <?php if ($messages): ?>
            <div id="mensajes-aplicacion" class='block'>
              <div id="messages">
                <div class="section clearfix"><?php print $messages; ?></div>
              </div>
            </div>
          <?php endif; ?>
        </section>
        <?php if ($breadcrumb): ?>
          <div id="breadcrumb"><?php print $breadcrumb; ?></div>
        <?php endif; ?>
        <?php print render($title_prefix); ?>

        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?>
          <div class="tabs">
            <?php print render($tabs); ?>
          </div>
        <?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links">
            <?php print render($action_links); ?>
          </ul>
        <?php endif; ?>

        <div class="contenedor">
          <div class="izquierda <?php print $izquierda_grid_class ?>">
            <?php echo render($page['izquierda']); ?>
          </div>
          <div class="partecontenido <?php print $content_grid_class ?>">

            <div id="mision" class="box">
              <h1><?php print t('Mision') ?></h1>
              <?php if ($page['mision']): ?>
                      <?php print render($page['mision']); ?>
              <?php endif; ?>
            </div>
            <div id="vision" class="box">
              <h1><?php print t('Vision') ?></h1>
              <?php if ($page['vision']): ?>
                      <?php print render($page['vision']); ?>
              <?php endif; ?>

            </div>

            <div id="contacto" class="row contacto box">
              <h1><?php print t('Contactos') ?></h1>
              <div class="col-sm-6 col-md-4">
                <h3><i class="fa fa-map-marker" style="padding-right: 5px;" ></i><?php print t('Address')?></h3>
                
                <?php if ($page['address']): ?>
                    <?php print render($page['address']); ?>
                <?php endif; ?>
                
              </div>
              <!-- /.col-sm-4 -->
              <div class="col-sm-6 col-md-4">
                <h3><i class="fa fa-phone" style="padding-right: 5px;" ></i><?php print t('Call center')?></h3>
                
                <?php if ($page['callcenter']): ?>
                    <?php print render($page['callcenter']); ?>
                <?php endif; ?>
              
              </div>
              <!-- /.col-sm-4 -->
              <div class="col-sm-6 col-md-4">
                  <h3><i class="fa fa-envelope" style="padding-right: 5px;"></i><?php print t('Electronic support')?> </h3>
                
                <?php if ($page['support']): ?>
                    <?php print render($page['support']); ?>
                <?php endif; ?>
                
              </div>

              <div class="mapa col-xs-12">
                  
                  <?php if ($page['mapacontacto']): ?>
                    <?php print render($page['mapacontacto']); ?>
                <?php endif; ?>
                
              </div>

            </div>


          </div>


        </div>
      </div>
    </div>
</section>


<section id="section-menuabajo">
  <div id="footer" data-animate="fadeInUp" class="col-xs-12 menuabajo">
    <div class="container">
      <div
        class="col-sm-6 col-md-3 bloques"><?php echo render($page['paginas']); ?></div>
      <div
        class="col-sm-6 col-md-3 bloques"><?php echo render($page['topcategories']); ?></div>
      <div
        class="col-sm-6 col-md-3 bloques"><?php echo render($page['findus']); ?></div>
      <div class="col-sm-6 col-md-3 bloques">
        <?php echo render($page['boletin']); ?>

        <?php if ($display_social): ?>
          <div class="social">
            <h4><?php print t('Nuestras Redes') ?></h4>
            <ul class="icon_list">
              <?php $Foptions['attributes'] = array(
                'target' => '_blank',
                'title'  => 'Facebook'
              ); ?>
              <?php $Toptions['attributes'] = array(
                'target' => '_blank',
                'title'  => 'Twitter'
              ); ?>
              <?php $Goptions['attributes'] = array(
                'target' => '_blank',
                'title'  => 'Google+'
              ); ?>
              <?php $Ioptions['attributes'] = array(
                'target' => '_blank',
                'title'  => 'Instagram'
              ); ?>
              <?php $Yoptions['attributes'] = array(
                'target' => '_blank',
                'title'  => 'Youtube'
              ); ?>
              <?php $Moptions['attributes'] = array(
                'target' => '_blank',
                'title'  => 'Email'
              ); ?>

              <?php if ($facebook_url): ?>
                <li
                  class="fb"><?php print l(t(''), $facebook_url, $Foptions); ?></li> <?php endif; ?>
              <?php if ($twitter_url): ?>
                <li
                  class="tw"><?php print l(t(''), $twitter_url, $Toptions); ?></li> <?php endif; ?>
              <?php if ($instagram_url): ?>
                <li
                  class="instag"><?php print l(t(''), $instagram_url, $Ioptions); ?></li> <?php endif; ?>
              <?php if ($gplus_url): ?>
                <li
                  class="gplus"><?php print l(t(''), $gplus_url, $Goptions); ?></li> <?php endif; ?>
              <?php if ($youtube_url): ?>
                <li
                  class="youtube"><?php print l(t(''), $youtube_url, $Yoptions); ?></li> <?php endif; ?>
              <?php if ($mail_to): ?>
                <li
                  class="mail"><?php print l(t(''), 'mailto:' . $mail_to, $Moptions); ?></li> <?php endif; ?>
            </ul>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
<section id="section-copyright">
  <div class="col-xs-12 copyright">
    <div id="copyright">
      <?php if ($footer_developed): ?>
        <div class="copyrights text-center">
          Copyright &copy; <?php echo date("Y"); ?>
          <a href="<?php print ($footer_developedby_url); ?>" target="_blank"
             class="ph_link"
             title="<?php print ($footer_developedby) ?>"> <?php print ($footer_developedby); ?> </a>.
          <?php print t("All Rights Reserved."); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- Modal HTML Para el LOGIN USER-->
<div id="login-user" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php print t('Login') ?></h4>
      </div>
      <div class="modal-body">
        <?php
        $block = block_load('user', "login");
        $output = _block_get_renderable_array(_block_render_blocks(array($block)));
        print drupal_render($output);
        global $base_url;

        ?>

        <!-- <p class="text-center action-forget-pass">
                    <?php //print l(t('No recuerdo mi contraseña'),$base_url.'/user/password');
        // print t('No recuerdo mi contraseña');
        ?>
                </p>
                <div class="disparador-forget-pass" style="">
                    <?php
        // print drupal_render(drupal_get_form('user_pass')); ?>
                </div>-->

        <p
          class="text-center text-muted"><?php print t('No me he registrado aún') ?>
          <br>
          <a class="active" title=""
             href="<?php print $base_url ?>/#register-user" role="button"
             data-toggle="modal"><?php print t('Hazlo ya!') ?></a>
        </p>


      </div>
      <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>

<!-- Modal HTML Para Registrar USER-->
<div id="register-user" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php print t('Sign up') ?></h4>
      </div>
      <div class="modal-body">
        <?php
        $form = drupal_get_form('user_register_form');
        print drupal_render($form);
        ?>
      </div>
      <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>


<!-- Modal HTML Para Contact-->
<!--<div id="contact-form" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php /*print t('Contact us')*/ ?></h4>
            </div>
            <div class="modal-body">
                <?php
/*                $form=drupal_get_form('contact_site_form');
                print drupal_render($form);
                */ ?>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
<!--     </div>
 </div>
</div>-->
