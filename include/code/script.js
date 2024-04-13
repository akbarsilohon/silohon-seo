( function(){
    tinymce.PluginManager.add( 'sls_mce', function( editor ){
        editor.addButton( 'sls_mce', {
            text: 'Silohon',
            icon: 'icon bx bx-code-alt',
            type: 'menubutton',
            menu: [
                { // Ads Shortcoder
                    text: ' Ads',
                    icon: 'icon bx bxl-google',
                    menu: [
                        { // Shortcode 1
                            text: ' AD 1',
                            icon: 'icon bx bxl-google',
                            onclick: function(){
                                var ads1 = '<p>[sls_ad1]</p>';
                                editor.insertContent(ads1);
                            }
                        }, { // Shortcode 2
                            text: ' AD 2',
                            icon: 'icon bx bxl-google',
                            onclick: function(){
                                var ads2 = '<p>[sls_ad2]</p>';
                                editor.insertContent(ads2);
                            }
                        }
                    ]
                }, { // FAQs
                    text: ' FAQs',
                    icon: 'icon bx bxs-message-dots',
                    onclick: function(){

                        var faqsBody = [];

                        editor.windowManager.open({
                            title: 'Add FAQs',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'faqTitle',
                                    label: 'Title',
                                    minWidth: 380,
                                    value: 'FAQs'
                                }, {
                                    type: 'textbox',
                                    name: 'faqIntroduction',
                                    label: 'Intoduction',
                                    value: '',
                                    multiline: true,
                                    minHeight: 80
                                }, {
                                    type: 'textbox',
                                    name: 'faqValue',
                                    label: 'Q & A',
                                    value: '',
                                    multiline: true,
                                    minHeight: 80
                                }, {
                                    type: 'textbox',
                                    name: 'question',
                                    label: 'Question',
                                    value: '',
                                }, {
                                    type: 'textbox',
                                    name: 'answer',
                                    label: 'Answer',
                                    value: '',
                                    multiline: true,
                                    minHeight: 80
                                }, {
                                    type: 'button',
                                    text: 'Push Q&A',
                                    maxWidth: 80,
                                    onclick: function(){
                                        var tanya = editor.windowManager.getWindows()[0].find('#question').value();
                                        var jawab = editor.windowManager.getWindows()[0].find('#answer').value();

                                        if(tanya&& jawab ){
                                            var pushItem = '<p>[question]'+ tanya +'[/question]</p>\n<p>[answer]'+ jawab +'[/answer]</p>\n';
                                            faqsBody.push( pushItem );

                                            var useItem = editor.windowManager.getWindows()[0].find('#faqValue');
                                            useItem.value( faqsBody.join('\n') );

                                            editor.windowManager.getWindows()[0].find('#question').value('');
                                            editor.windowManager.getWindows()[0].find('#answer').value('');
                                        }
                                    }
                                }
                            ],
                            onsubmit: function( e ){
                                var judul = e.data.faqTitle;
                                var intro = e.data.faqIntroduction;
                                var isi = e.data.faqValue;

                                var onPush = '<p>[sls_faq title="'+judul+'" intro="'+intro+'"]</p>'+isi+'<p>[/sls_faq]</p>';
                                editor.insertContent( onPush );
                            }
                        });
                    }
                }, { // Youtube Embed
                    text: ' Youtube Embed',
                    icon: 'icon bx bxl-youtube',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Ease Embed Youtube Video',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'ytTitle',
                                    label: 'Title',
                                    value: '',
                                    minWidth: 380
                                }, {
                                    type: 'textbox',
                                    name: 'ytDesc',
                                    label: 'Description',
                                    value: '',
                                    multiline: true,
                                    minHeight: 80
                                },{
                                    type: 'textbox',
                                    name: 'ytID',
                                    label: 'Youtube ID Video',
                                    value: ''
                                }
                            ], onsubmit: function( e ){
                                var yTitle = e.data.ytTitle;
                                var yDesc = e.data.ytDesc;
                                var yID = e.data.ytID;

                                editor.insertContent('<p>[sls_yt title="'+yTitle+'" description="'+yDesc+'" ytid="'+yID+'"]</p>');
                            }
                        });
                    }
                }
            ]
        });
    });
})();