<?php defined('IN_CMS') || exit(); ?>

<div class="box">
    <p class="button">
        <a href="<?php echo get_url('plugin/ckeditor/settings'); ?>">
            <img src="<?php echo ICONS_URI; ?>settings-32.png" align="middle" title="<?php echo __('ckeditor::views.sidebar.settings'); ?>" alt="<?php echo __('ckeditor::views.sidebar.settings'); ?>" />
            <?php echo __('ckeditor::views.sidebar.settings'); ?>
        </a>
    </p>
    <p class="button">
        <a href="<?php echo get_url('plugin/ckeditor/documentation'); ?>">
            <img src="<?php echo ICONS_URI; ?>documentation-32.png" align="middle" alt="dir icon" />
            <?php echo __('ckeditor::views.sidebar.docs'); ?>
        </a>
    </p>
</div>