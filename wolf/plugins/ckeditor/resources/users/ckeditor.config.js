/*
 * http://docs.ckeditor.com/#!/guide/dev_toolbar
 */
CKEDITOR.tools.extend(CKFilter.config,
{
    entities: false,
    basicEntities: false,
    entities_additional: '',
    contentsCss: [
        'wolf/plugins/ckeditor/resources/users/ckeditor.editor.css'        
    ],
    stylesSet: 'mystyles:../users/ckeditor.styles.js',
    justifyClasses: [ 'left', 'centered', 'right', 'justify' ],
    toolbar: 'WolfBasic',
    toolbar_WolfBasic:
    [
        [ 'Styles','Format' ],
        [ 'Bold','Italic','Underline','Blockquote'],
        [ 'NumberedList','BulletedList' ],
        [ 'Undo','Redo','RemoveFormat' ],
        [ 'Link','Unlink','-','Image' ],
        [ 'Cut','Copy','Paste','PasteFromWord' ],
        [ 'Maximize', 'Source' ]
    ],
    /* Miscelaneous options */
    filebrowserWindowWidth: '60%',
    filebrowserWindowHeight: '60%',
    tabSpaces: 4,
    dialog_backgroundCoverOpacity: 0.85,
    dialog_backgroundCoverColor: '#2a2a2a',
    resize_dir: 'vertical',
    uiColor: '#eaebec',
    magicline_color: '76a83a',
    height: '360px'
});