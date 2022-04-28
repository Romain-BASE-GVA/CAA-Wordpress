(function() {
    tinymce.PluginManager.add('wdm_mce_button', function( editor, url ) {
       editor.addButton( 'wdm_mce_button', {
             text: 'Shortcodes',
             icon: false,
             type: 'menubutton',
             menu: [
                   {
                    text: 'Caption',
                    onclick: function() {
                       editor.insertContent('[quote the_quote="Write the quote here"  the_caption="Write the caption here"]');
                              }
                    },
                //    {
                //     text: 'Sample Item 2',
                //     onclick: function() {
                //        editor.insertContent('[wdm_shortcode 2]');
                //              }
                //    }
                   ]
          });
    });
})();