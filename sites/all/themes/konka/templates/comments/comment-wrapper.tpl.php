<?php ?>
<div id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <?php if ($content['comments'] && $node->type != 'forum'): ?>
        <div class="comentarios-wrapper-stilos">
            <?php print render($title_prefix); ?>
            <div class="col-xs-12 title-comment header-comment"><?php print $node->comment_count; echo ' '; print t('comment(s)'); ?></div>
            <?php print render($title_suffix); ?>
            <?php print render($content['comments']); ?>
        </div>
    <?php endif; ?>

    <?php if ($content['comment_form']): ?>
        <div class="col-xs-12 header-comment"><?php print t('Leave comment'); ?></div>
        <div class="col-sm-6 form-comments"> <?php print render($content['comment_form']); ?> </div>
    <?php endif; ?>
</div>
