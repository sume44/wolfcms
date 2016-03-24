<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>File Manager</title>
    <base href="<?php echo rtrim(URL_PUBLIC, '/'); ?>/wolf/plugins/ckeditor/resources/filemanager/" />
    <link rel="stylesheet" type="text/css" href="styles/filemanager.min.css" />
    <!--[if IE 9]>
    <link rel="stylesheet" type="text/css" href="styles/ie9.css" />
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="styles/ie8.css" />
    <![endif]-->
    <script type="text/javascript">
        var configUrl = "<?php echo $settings['configUrl']; ?>?v=23";
    </script>
<body>
    <div>
        <form id="uploader" method="post">
            <button id="home" name="home" type="button" value="Home">&nbsp;</button>
            <h1></h1>
            <div id="uploadresponse"></div>
            <input id="mode" name="mode" type="hidden" value="add" /> 
            <input id="currentpath" name="currentpath" type="hidden" />
            <span id="file-input-container">
                <div id="alt-fileinput">
                    <input id="filepath" name="filepath" type="text" />
                    <button id="browse" name="browse" type="button" value="Browse"></button>
                </div>
                <input id="newfile" name="newfile" type="file" />
            </span>
            <button id="upload" name="upload" type="submit" value="Upload"></button>
            <button id="newfolder" name="newfolder" type="button" value="New Folder"></button>
            <button id="grid" class="ON" type="button">&nbsp;</button>
            <button id="list" type="button">&nbsp;</button>
        </form>
        <div id="splitter">
            <div id="filetree"></div>
            <div id="fileinfo">
                <h1></h1>
            </div>
        </div>
        <ul id="itemOptions" class="contextMenu">
            <li class="select"><a href="#select"></a></li>
            <li class="download"><a href="#download"></a></li>
            <li class="rename"><a href="#rename"></a></li>
            <li class="delete separator"><a href="#delete"></a></li>
        </ul>
    </div>
    <script type="text/javascript" src="scripts/filemanager.min.js"></script>
</body>
</html>