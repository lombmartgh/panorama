<?php

/**
 * Override or insert variables into the maintenance page template.
 */


/**
 * Override or insert variables into the html template.
 */


/**
 * Override or insert variables into the node template.
 */

function konka_preprocess_node(&$variables){
    // Global node.
    $node = $variables['node'];

    $variables['display_social'] = theme_get_setting('display_social', 'konka');
    $variables['twitter_url'] = theme_get_setting('twitter_url', 'konka');
    $variables['facebook_url'] = theme_get_setting('facebook_url', 'konka');
    $variables['youtube_url'] = theme_get_setting('youtube_url', 'konka');
    $variables['gplus_url'] = theme_get_setting('gplus_url', 'konka');
    $variables['instagram_url'] = theme_get_setting('instagram_url', 'konka');
    $variables['mail_to'] = theme_get_setting('mail_to', 'konka');

      $nodevisit = statistics_get($node->nid);
    $variables['count_visit_node'] = $nodevisit['totalcount'] + 1;
    

}


/**
 * Display the list of available node types for node creation.
 */
function konka_preprocess_page(&$variables) {
    //debug($variables['theme_hook_suggestions']);
// Get the entire main menu tree
    $main_menu_tree = menu_tree_all_data('menu-menu-principal-1');

// Add the rendered output to the $main_menu_expanded variable
    $variables['main_menu_expanded'] = menu_tree_output($main_menu_tree);

    /**
     * insert variables into page template.
     */

    if ($variables['page']['izquierda'] && $variables['page']['content']) {
        $variables['izquierda_grid_class'] = 'col-sm-3 col-xs-12';
        $variables['content_grid_class'] = 'col-sm-9 col-xs-12';
    } elseif (!$variables['page']['izquierda']) {
        $variables['izquierda_grid_class'] = '';
        $variables['content_grid_class'] = 'col-xs-12';
    }



    $variables['display_social'] = theme_get_setting('display_social', 'konka');
    $variables['twitter_url'] = theme_get_setting('twitter_url', 'konka');
    $variables['facebook_url'] = theme_get_setting('facebook_url', 'konka');
    $variables['youtube_url'] = theme_get_setting('youtube_url', 'konka');
    $variables['gplus_url'] = theme_get_setting('gplus_url', 'konka');
    $variables['instagram_url'] = theme_get_setting('instagram_url', 'konka');
    $variables['theme_path_social'] = base_path() . drupal_get_path('theme', 'konka');
    $variables['mail_to'] = theme_get_setting('mail_to', 'konka');

    $variables['footer_developed'] = theme_get_setting('footer_developed');
    $variables['footer_developedby_url'] = filter_xss_admin(theme_get_setting('footer_developedby_url', 'konka'));
    $variables['footer_developedby'] = filter_xss_admin(theme_get_setting('footer_developedby', 'konka'));

}
function konka_preprocess_html(&$vars) {
    $viewport = array(
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1, maximum-scale=1',
        ),
    );
    drupal_add_html_head($viewport, 'viewport');
}
function konka_preprocess_search_block_form(&$vars) {
    $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}

function konka_form_user_login_form_alter(&$form) {

    $form['name']['#attributes']['placeholder'] = t('user');
    $form['pass']['#attributes']['placeholder'] = t('password');

}

function konka_form_user_profile_form_alter(&$form) {

   /* global $user;
    echo "<pre>";
    print_r($user);
    echo "</pre>";*/
        unset($form['contact']);
        unset($form['timezone']);

}



function konka_form_user_login_block_alter(&$form){


   /* $form['name']['#attributes']['placeholder'] = t('Nombre de usuario*');
    $form['pass']['#attributes']['placeholder'] = t('Contraseña*');*/

    $form['#prefix']= "<div id='block-user-login' class='block-user'>";
    $form['#suffix']= "</div>";
    $form['actions']['submit']['#ajax']=array(
        'callback' =>'callback_ajax',
        'wrapper' => 'block-user-login',
        'method' => 'replace',
        'effect' => 'fade',
    );

}

function konka_form_user_register_form_alter(&$form){


    $form['name']['#attributes']['placeholder'] = t('user');
    $form['pass']['#attributes']['placeholder'] = t('email');

    $form['#prefix']= "<div id='block-user-register' class='block-user-register'>";
    $form['#suffix']= "</div>";
    $form['actions']['submit']['#ajax']=array(
        'callback' =>'callback_ajax',
        'wrapper' => 'block-user-register',
        'method' => 'replace',
        'effect' => 'fade',
    );

}

function callback_ajax($form,&$form_state){

    if (form_get_errors()){
        $form['#prefix'].=theme('status_messages');
        return $form;
    }
    else{

        drupal_add_js(drupal_get_path('theme', 'konka') . '/js/login.js');

    }
}


