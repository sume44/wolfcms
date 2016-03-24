(function(ck) {
  // prevent creation of editor instances (textarea class="ckeditor")!
  ck.replaceByClassEnabled = 0;
  // don't load default config script
  ck.config.customConfig = '';
  // don't load default styles script
  ck.config.stylesSet = [];
  // don't load default templates
  ck.config.templates_files = [ ];
  // 'protect' php code
  ck.config.protectedSource = [ /<\?[\s\S]*?\?>/g ];
})(CKEDITOR);

var CKFilter = CKFilter || {
  config : {},
  addEditor : function(elId) {
    try { CKEDITOR.replace(elId, CKFilter.config ); }
    catch(err) { if (typeof(console) !== 'undefined') console.log(err.message); }
  },
  destroyEditor : function(elId) {
    var ck = CKEDITOR.instances[elId];
    if (ck) { ck.updateElement(); ck.destroy(true); }
  }
};

/* Wolf's filter switch */
$(function() {
  var $filters = $('.filter-selector');
  $filters.live('wolfSwitchFilterIn', function(ev,f,el) {
    if (f=='ckeditor') { CKFilter.addEditor(el.attr('id')); }
  });
  $filters.live('wolfSwitchFilterOut', function(ev,f,el) {
    if (f=='ckeditor') { CKFilter.destroyEditor(el.attr('id')); }
  });
});
