<?php defined('IN_CMS') || exit(); ?>

<h1>Documentation</h1>

<div id="ckeditor_filter">
    <h2>CKEditor</h2>
    <p>
        This plugin comes with the <b>standard</b> package of CKEditor (Version 4.2 - 18 Jul 2013).
        You should be able to update or replace it without major problems,
        download the distribution you want and replace the contents of <code>'resources/ckeditor/'</code>
    </p>
    <p>
        Configuration, stylesheet and style files are stored in another location <code>'resources/users/ckeditor.*'</code>,
        so read CKEditor offical docs for the options available.
    </p>
    <p>
        The main configuration file can be customized by editing <code>'resources/users/ckeditor.config.js'</code>,
        which has a few comments that may be helpful.
    </p>

    <p>The editor stylesheet can be found in <code>'resources/users/ckeditor.editor.css'</code></p>

    <h2>Filemanager</h2>
    <p>
        To enable the filemanager, you should do so by going to the
        <a href="<?php echo get_url('plugin/ckeditor/settings'); ?>" title="CKEditor plugin settings" target="_self">settings</a>
        screen.
    </p>
    <p>
        The filemanager configuration is now stored in a json file <code>'resources/users/filemanager.config.json'</code>,
        most important, it must be valid json, so don't use single quotes!
    </p>
    <p>
        A few settings are stored in database and they will override the ones specified in the json file.
    </p>
    <p>
        The <a href="https://github.com/simogeo/Filemanager" title="Filemanager github" target="_blank">filemanager</a> uses a modified version of the 'php' connector,
        so is not 'trivial' to update or replace it.
    </p>
</div>