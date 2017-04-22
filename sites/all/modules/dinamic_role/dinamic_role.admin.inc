<?php
function dinamic_role_admin_settings() {
 
    $form['dr_bloque'] = array(
        '#type' => 'fieldset',
        '#title' => t('Roles a agregar'),
        '#collapsible' => TRUE,
        '#collapsed' => FALSE,
    );

    //funcion q devuelve todos los roles
    $listado = user_roles();
    $roles = array();
    $cont=0;
    foreach ($listado as $rol) {
        $cont++;
        //excluyo el rol 1 es user anonimo y el rol 2  q es autenticado
        if ($cont>2) {
            $roles[$rol] = $rol;
        }
    }


    $form['dr_bloque']['dr_roles'] = array(
        '#type' => 'checkboxes',
        '#title' => t('Roles a agregar a los usuarios.'),
        '#options' => $roles,
        '#default_value' => variable_get('dr_roles', array('')),
        '#description' => t('Los roles seleccionados serán agregados a los usuarios cuando sean creados.'),
    );


    return system_settings_form($form);
}