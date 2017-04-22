<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function konka_form_system_theme_settings_alter(&$form, &$form_state)
{

    $form['konka_settings'] = array(
        '#type' => 'fieldset',
        '#title' => t('Konka Business Theme Settings'),
        '#collapsible' => FALSE,
        '#collapsed' => FALSE,
    );
    
   
    $form['konka_settings']['tabs'] = array(
        '#type' => 'vertical_tabs',
    );

    $form['konka_settings']['tabs']['social'] = array(
        '#type' => 'fieldset',
        '#title' => t('Social Icon'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );
    $form['konka_settings']['tabs']['social']['display_social'] = array(
        '#type' => 'checkbox',
        '#title' => t('Show Social Icon'),
        '#default_value' => theme_get_setting('display_social', 'konka'),
        '#description' => t("Check this option to show Social Icon. Uncheck to hide."),
    );
    $form['konka_settings']['tabs']['social']['facebook1'] = array(
        '#type' => 'fieldset',
        '#title' => t('Facebook'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['konka_settings']['tabs']['social']['facebook1']['facebook_url'] = array(
        '#type' => 'textfield',
        '#title' => t('Facebook URL'),
        '#default_value' => theme_get_setting('facebook_url', 'konka'),
        '#description' => t("Enter your Facebook Profile URL. example:: http://www.xyz.com"),
    );
    $form['konka_settings']['tabs']['social']['twitter1'] = array(
        '#type' => 'fieldset',
        '#title' => t('Twitter'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['konka_settings']['tabs']['social']['twitter1']['twitter_url'] = array(
        '#type' => 'textfield',
        '#title' => t('Twitter URL'),
        '#default_value' => theme_get_setting('twitter_url', 'konka'),
        '#description' => t("Enter your Twitter Profile URL. example:: http://www.xyz.com"),
    );

    $form['konka_settings']['tabs']['social']['youtube1'] = array(
        '#type' => 'fieldset',
        '#title' => t('Youtube'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['konka_settings']['tabs']['social']['youtube1']['youtube_url'] = array(
        '#type' => 'textfield',
        '#title' => t('Youtube URL'),
        '#default_value' => theme_get_setting('youtube_url', 'konka'),
        '#description' => t("Enter your Youtube Profile URL. example:: http://www.xyz.com"),
    );

    $form['konka_settings']['tabs']['social']['gplus1'] = array(
        '#type' => 'fieldset',
        '#title' => t('Google+'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['konka_settings']['tabs']['social']['gplus1']['gplus_url'] = array(
        '#type' => 'textfield',
        '#title' => t('Gplus URL'),
        '#default_value' => theme_get_setting('gplus_url', 'konka'),
        '#description' => t("Enter your Google+ Profile URL. example:: http://www.xyz.com"),
    );

    $form['konka_settings']['tabs']['social']['instagram1'] = array(
        '#type' => 'fieldset',
        '#title' => t('Instagram'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['konka_settings']['tabs']['social']['instagram1']['instagram_url'] = array(
        '#type' => 'textfield',
        '#title' => t('Instagram URL'),
        '#default_value' => theme_get_setting('instagram_url', 'konka'),
        '#description' => t("Enter your Instagram Profile URL. example:: http://www.xyz.com"),
    );
    $form['konka_settings']['tabs']['social']['mail1'] = array(
        '#type' => 'fieldset',
        '#title' => t('Email'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
    );
    $form['konka_settings']['tabs']['social']['mail1']['mail_to'] = array(
        '#type' => 'textfield',
        '#title' => t('Email to'),
        '#default_value' => theme_get_setting('mail_to', 'konka'),
        '#description' => t("Enter your Email. example: user@gmail.com"),
    );
    
    $form['konka_settings']['tabs']['footer'] = array(
        '#type' => 'fieldset',
        '#title' => t('Footer'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    $form['konka_settings']['tabs']['footer']['footer_developed'] = array(
        '#type' => 'checkbox',
        '#title' => t('Show theme developed by in footer'),
        '#default_value' => theme_get_setting('footer_developed', 'konka'),
        '#description' => t("Check this option to show design & developed by text in footer. Uncheck to hide."),
    );
    $form['konka_settings']['tabs']['footer']['footer_developedby'] = array(
        '#type' => 'textfield',
        '#title' => t('Add name developed by in footer'),
        '#default_value' => theme_get_setting('footer_developedby', 'konka'),
        '#description' => t("Add name developed by in footer"),
    );
    $form['konka_settings']['tabs']['footer']['footer_developedby_url'] = array(
        '#type' => 'textfield',
        '#title' => t('Add link to developed by in footer'),
        '#default_value' => theme_get_setting('footer_developedby_url', 'konka'),
        '#description' => t("Add url developed by in footer. example:: http://www.xyz.com"),
    );

}
