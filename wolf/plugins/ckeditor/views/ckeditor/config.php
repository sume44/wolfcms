if (!!CKFilter) {

    CKFilter.wolfSite = '<?php echo $settings['site']; ?>';
    CKEDITOR_BASEPATH = CKFilter.ckeditorPath = '<?php echo $settings['site']; ?>/wolf/plugins/ckeditor/resources/ckeditor';

    CKFilter.config = {
        language: '<?php echo $settings['user']['lang']; ?>',
        contentsLanguage: '<?php echo $settings['user']['lang']; ?>',
        contentsLangDirection: '<?php echo $settings['user']['dir']; ?>',
<?php if ($settings['filemanager']['enabled']): ?>
        filebrowserRoot:           '<?php echo $settings['routes']['filemanager']; ?>',
        filebrowserImageBrowseUrl: '<?php echo $settings['routes']['filemanager_images']; ?>',
        filebrowserFlashBrowseUrl: '<?php echo $settings['routes']['filemanager_flash']; ?>',
<?php if ( ! (bool) $settings['filemanager']['images_only']): ?>
        filebrowserBrowseUrl: '<?php echo $settings['routes']['filemanager']; ?>',
<?php endif; ?>
<?php endif;?>
        baseHref: CKFilter.wolfSite
    };

}
