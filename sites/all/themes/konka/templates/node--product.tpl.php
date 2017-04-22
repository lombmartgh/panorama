<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>"
     class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

    <?php print $user_picture; ?>

    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>><a
                href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
        <div class="submitted">
            <?php print $submitted; ?>
        </div>
    <?php endif; ?>

    <div
        class="nodo-contenido content color-blanco-fondo"<?php print $content_attributes; ?>>
        <?php
        // We hide the comments and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        /*print render($content);*/
        ?>

        <?php
        /*echo '<pre>';
                                print_r($content['product:sku']['#product']->field_commerce_saleprice['und'][0]['amount']);
                                echo '</pre>';*/
        ?>

        <div class="row" id="productMain">
            <div class="col-sm-6">
                <div id="mainImage" class="box">
                    <div class="img-responsive">
                        <?php print render($content['product:field_images']); ?>
                    </div>
                </div>

                <?php
                if (!empty($content['product:sku']['#product']->field_product_tags)) {
                    $tags_seleccionado = $content['product:sku']['#product']->field_product_tags['und'];

                    foreach ($tags_seleccionado as $selec) {
                        //$term = taxonomy_term_load($selec->tid);
                        /*si es "Price Off"*/
                        if ($selec['tid'] == 13) { ?>
                            <div class="ribbon sale">
                                <div class="theribbon"><?php print t('SALE') ?></div>
                                <div class="ribbon-background"></div>
                            </div>
                        <?php } /*si es "NEW"*/
                        elseif ($selec['tid'] == 12) { ?>
                            <div class="ribbon new">
                                <div class="theribbon"><?php print t('NEW') ?></div>
                                <div class="ribbon-background"></div>
                            </div>
                        <?php }
                    }
                }

                ?>


            </div>

            <div class="col-sm-6">
                <div class="box"
                     style="display: inline-block; background-color: #f6fffd;">

                    <div class="marca-producto text-center">
                        <?php
                        if (!empty($content['product:field_product_brands']['#object'])) {

                            $img_brands = $content['product:field_product_brands']['#object']->field_product_brands['und']['0']['taxonomy_term']->field_imagen['und']['0']['uri'];
                            if ($img_brands) {
                                ?>
                                <img class="img-brands" src="<?php print image_style_url('thumbnail', $img_brands) ?>">
                                <?php
                            } else {
                                print '<span style="font-size: 30px;" class="name-brands">' . $content['product:field_product_brands']['#object']->field_product_brands['und']['0']['taxonomy_term']->name . '</span>';
                            }
                        }
                        ?>


                    </div>
                    <h1
                        class="name-product text-center"><?php print render($title); ?></h1>

                    </p>
                    <?php if ($content['product:commerce_price']['#object']->field_commerce_saleprice['und'][0]['amount'] > 0) { ?>
                        <div
                            class="price-nodo text-center rebaja"><?php print render($content['product:commerce_price']); ?></div>
                        <div
                            class="price-nodo text-center"><?php print render($content['product:field_commerce_saleprice']); ?></div>
                    <?php } else { ?>
                        <div
                            class="price-nodo text-center"><?php print render($content['product:commerce_price']); ?></div>
                    <?php } ?>


                    <small
                        class="text-center comment-count-node col-xs-12"><?php print $node->comment_count . ' ' . t('Comment(s)'); ?></small>
                    <?php $nodevisit = statistics_get($node->nid); ?>
                    <small
                        class="text-center visit-count-node col-xs-12"><?php print $nodevisit['totalcount'] + 1 . ' ' . t('Vistas'); ?></small>

                    <div class="redes-sociales-node text-center col-xs-12">
                        <?php if ($display_social): ?>
                            <div class="social">
                                <ul class="icon_list">
                                    <?php $Foptions['attributes'] = array(
                                        'target' => '_blank',
                                        'title' => 'Facebook'
                                    ); ?>
                                    <?php $Toptions['attributes'] = array(
                                        'target' => '_blank',
                                        'title' => 'Twitter'
                                    ); ?>
                                    <?php $Goptions['attributes'] = array(
                                        'target' => '_blank',
                                        'title' => 'Google+'
                                    ); ?>
                                    <?php $Ioptions['attributes'] = array(
                                        'target' => '_blank',
                                        'title' => 'Instagram'
                                    ); ?>
                                    <?php $Yoptions['attributes'] = array(
                                        'target' => '_blank',
                                        'title' => 'Youtube'
                                    ); ?>
                                    <?php $Moptions['attributes'] = array(
                                        'target' => '_blank',
                                        'title' => 'Email'
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


                        <?php
                        $filename = $content['product:field_product_brands']['#object']->field_pdf['und']['0']['description'];
                        $url_pdf = file_create_url($content['product:field_product_brands']['#object']->field_pdf['und']['0']['uri']);
                        if (!empty($content['product:field_product_brands']['#object']->field_pdf)) {
                            echo '<div class="col-xs-12 text-center link-pdf">';

                            if (empty($filename)) {
                                print l(t('Download PDF'), $url_pdf, array('html' => true, 'attributes' => array('title' => 'PDF', 'target' => '_blank')));
                            } else {
                                print l(t($filename), $url_pdf, array('html' => true, 'attributes' => array('title' => $filename, 'target' => '_blank')));

                            }

                            echo '</div>';

                        }
                        ?>


                </div>


            </div>

        </div>


        <div class="box col-xs-12" id="details">

                <?php
                if (!empty($content['product:field_link']['#object']->field_link)) {
                    echo '<div class="link-sitio-node pull-right">';

                    $link = $content['product:field_link']['#object']->field_link['und']['0']['url'];
                    $title_link = $content['product:field_link']['#object']->field_link['und']['0']['title'];

                    if (empty($title_link)){
                        print l(t('Reference site'), $link, array('html' => true, 'attributes' => array('title' => t('Reference site'), 'target' => '_blank')));

                    }
                    else{
                        print l(t($title_link), $link, array('html' => true, 'attributes' => array('title' => $title_link, 'target' => '_blank')));
                    }
                    echo '</div>';

                }
                /*echo '<pre>';
                print_r($content['product:field_link']['#object']->field_link['und']['0']);
                echo '</pre>';*/


                ?>

            <?php if (!empty($node->body)) { ?>
                <h4><?php print t('Product details') ?></h4>
                <div class="descripcion-contenido-nodo col-md-12">
                    <div class="col-md-12">
                        <?php print render($content['body']); ?>
                    </div>
                </div>
            <?php } ?>
        </div>


    </div>
    <div
        class="comentarios-nodos col-xs-12 box">
        <?php print render($content['links']); ?>
        <?php print render($content['comments']); ?></div>
</div>


<?php


$tree = taxonomy_get_nested_tree(2, 10, 1);
$output = output_taxonomy_nested_tree($tree);
echo $output;

?>
