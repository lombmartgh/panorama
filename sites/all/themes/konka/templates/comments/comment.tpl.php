<?php
/**
 * @file
 * Default theme implementation for comments.
 *
 * Available variables:
 * - $author: Comment author. Can be link or plain text.
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $created: Formatted date and time for when the comment was created.
 *   Preprocess functions can reformat it by calling format_date() with the
 *   desired parameters on the $comment->created variable.
 * - $changed: Formatted date and time for when the comment was last changed.
 *   Preprocess functions can reformat it by calling format_date() with the
 *   desired parameters on the $comment->changed variable.
 * - $new: New comment marker.
 * - $permalink: Comment permalink.
 * - $submitted: Submission information created from $author and $created during
 *   template_preprocess_comment().
 * - $picture: Authors picture.
 * - $signature: Authors signature.
 * - $status: Comment status. Possible values are:
 *   comment-unpublished, comment-published or comment-preview.
 * - $title: Linked title.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - comment: The current template type, i.e., "theming hook".
 *   - comment-by-anonymous: Comment by an unregistered user.
 *   - comment-by-node-author: Comment by the author of the parent node.
 *   - comment-preview: When previewing a new or edited comment.
 *   The following applies only to viewers who are registered users:
 *   - comment-unpublished: An unpublished comment visible only to administrators.
 *   - comment-by-viewer: Comment by the user currently viewing the page.
 *   - comment-new: New comment since last the visit.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * These two variables are provided for context:
 * - $comment: Full comment object.
 * - $node: Node object the comments are attached to.
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_comment()
 * @see template_process()
 * @see theme_comment()
 *
 * @ingroup themeable
 */
/* print '<pre>';
  print_r($comment);die; */
global $base_url;
global $user;
$url = $base_url.'/'.drupal_get_path('theme', 'konka');
?>


<div class="comments clearfix"<?php print $attributes; ?>>
    <div class="content">
        <div class="picture-user-comment col-sm-2">
            <?php
                   $user_comment = user_load($comment->uid);
                  if ($user_comment->picture){
                      $img_url=file_create_url($user_comment->picture->uri);
                      ?>
                      <img style="width: 90px;height: 90px;" class="img-circle" src="<?php echo $img_url?>">
                  <?php }
                else{?>
                    <img style="width: 90px;height: 90px;" class="img-circle" src="<?php echo $url?>/img/default-user.png">

             <?php }

            ?>



        </div>
        <div class="data-comment col-sm-9">
            <div class="user-comment">
                <?php echo "<span>" . $comment->name . "</span>"; ?>
            </div>
            <div class="date-comment text-muted">
                <?php echo format_date($comment->created, 'custom','F j, Y h:i a'); ?>
            </div>
            <div class="body-comment" style="">
                <p class=""style=""><?php echo $comment->comment_body['und'][0]['value']; ?>  </p>
            </div>
            <div class="links-comment" style="">
                <?php print render($content['links']); ?>
            </div>
        </div>
    </div>
</div>
