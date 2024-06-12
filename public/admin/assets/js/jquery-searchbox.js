(function($) {
    /*
    * æ¤œç´¢æ©Ÿèƒ½ä»˜ã ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹
    *
    * Copyright (c) 2020 iseyoshitaka
    */
    $.fn.searchBox = function(opts) {

    // å¼•æ•°ã«å€¤ãŒå­˜åœ¨ã™ã‚‹å ´åˆã€ãƒ‡ãƒ•ã‚©ãƒ«ãƒˆå€¤ã‚’ä¸Šæ›¸ãã™ã‚‹
    var settings = $.extend({}, $.fn.searchBox.defaults, opts);
    
    var init = function (obj) {

        var self = $(obj),
            parent = self.closest('div,tr'),
            searchWord = ''; // çµžã‚Šè¾¼ã¿æ–‡å­—åˆ—
        
        // çµžã‚Šè¾¼ã¿æ¤œç´¢ç”¨ã®ãƒ†ã‚­ã‚¹ãƒˆå…¥åŠ›æ¬„ã®è¿½åŠ 
        self.before('<input type="text" class="refineText formTextbox" />');
        var refineText = parent.find('.refineText');
        if (settings.mode === MODE.NORMAL) {
            refineText.attr('readonly', 'readonly');
        }
        
        // åˆæœŸè¡¨ç¤ºã§é¸æŠžæ¸ˆã¿ã®å ´åˆã€çµžã‚Šè¾¼ã¿æ–‡è¨€å…¥åŠ›æ¬„ã«é¸æŠžæ¸ˆã¿ã®æ–‡è¨€ã‚’è¡¨ç¤º
        var selectedOption = self.find('option:selected');
        if(selectedOption){
            refineText.val(selectedOption.text());
            if (selectedOption.val() === '') {
                if (settings.mode === MODE.TAG) {
                    refineText.val("");
                }
            }
        }

        // ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹ã®ä»£ã‚ã‚Šã«è¡¨ç¤ºã™ã‚‹ãƒ€ãƒŸãƒ¼ãƒªã‚¹ãƒˆã‚’ä½œæˆ
        var visibleTarget =self.find('option').map(function(i, e) {
            return '<li data-selected="off" data-searchval="' + $(e).val() + '"><span>' + $(e).text() + '</span></li>';
        }).get();
        self.after($('<ul class="searchBoxElement"></ul>').hide());

        // ãƒ€ãƒŸãƒ¼ãƒªã‚¹ãƒˆã®è¡¨ç¤ºå¹…ã‚’ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹ã«ã‚ã‚ã›ã‚‹
        var refineTextWidth = (settings.elementWidth) ? settings.elementWidth : self.width();
        refineText.css('width', refineTextWidth);
        parent.find('.searchBoxElement').css('width', refineTextWidth);

        // å…ƒã®ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹ã¯éžè¡¨ç¤ºã«ã™ã‚‹
        self.hide();

        // ãƒ€ãƒŸãƒ¼ãƒªã‚¹ãƒˆã‚’æ¤œç´¢æ¡ä»¶ã§çµžã‚Šè¾¼ã¿ã¾ã™ã€‚
        var changeSearchBoxElement = function() {
            if (searchWord !== '') {
                var matcher = new RegExp(searchWord.replace(/\\/g, '\\\\'), "i");
                var filterTarget = $(visibleTarget.join()); // é…åˆ—ã®ã‚³ãƒ”ãƒ¼
                filterTarget = filterTarget.filter(function(){
                    return $(this).text().match(matcher);
                });
                parent.find('.searchBoxElement').empty();
                parent.find('.searchBoxElement').html(filterTarget);
                parent.find('.searchBoxElement').show();
            } else {
                parent.find('.searchBoxElement').empty();
                parent.find('.searchBoxElement').html(visibleTarget.slice(0, settings.optionMaxSize).join(''));
                parent.find('.searchBoxElement').show();
            }
            
            // é¸æŠžä¸­ã®LIã‚¿ã‚°ã®èƒŒæ™¯è‰²ã‚’å¤‰æ›´ã—ã¾ã™ã€‚
            var selectedOption = self.find('option:selected');
            if(selectedOption){
                parent.find('.searchBoxElement').find('li').removeClass('selected');
                parent.find('.searchBoxElement').find('li[data-searchval="' + selectedOption.val() + '"]').addClass('selected');
            }
            
            // ãƒ€ãƒŸãƒ¼ãƒªã‚¹ãƒˆé¸æŠžæ™‚
            parent.find('.searchBoxElement').find('li').click(function(e){
                e.preventDefault();
                // e.stopPropagation();
                var li = $(this),
                    searchval = li.data('searchval');
                self.val(searchval).change();
                parent.find('li').attr('data-selected', 'off');
                li.attr('data-selected', 'on');
            });

        };

        // keyupæ™‚ã®ãƒ•ã‚¡ãƒ³ã‚¯ã‚·ãƒ§ãƒ³
        refineText.keyup(function(e){
            searchWord = $(this).val();
            // ãƒ€ãƒŸãƒ¼ãƒªã‚¹ãƒˆã‚’ãƒªãƒ•ãƒ¬ãƒƒã‚·ãƒ¥
            changeSearchBoxElement();
        });

        // ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹å¤‰æ›´æ™‚
        self.change(function(){
            // ç›´è¿‘ã®çµžã‚Šè¾¼ã¿æ–‡è¨€ã‚¨ãƒªã‚¢ã¸é¸æŠžã‚ªãƒ—ã‚·ãƒ§ãƒ³ã®ãƒ†ã‚­ã‚¹ãƒˆã‚’åæ˜ 
            var selectedOption = $(this).find('option:selected');
            searchWord = selectedOption.text();
            refineText.val(selectedOption.text());

            if (settings.selectCallback) {
                settings.selectCallback({
                    selectVal: selectedOption.attr('value'),
                    selectLabel: selectedOption.text()
                });
            }
        });

        // ãƒ†ã‚­ã‚¹ãƒˆãƒœãƒƒã‚¯ã‚¹ã‚’ã‚¯ãƒªãƒƒã‚¯ã—ãŸå ´åˆã¯ãƒ€ãƒŸãƒ¼ãƒªã‚¹ãƒˆã‚’è¡¨ç¤ºã™ã‚‹
        refineText.click(function(e) {
            e.preventDefault();

            // ãƒ¢ãƒ¼ãƒ‰ã«åˆã‚ã›ã¦è¨­å®š
            if (settings.mode === MODE.NORMAL) {
                searchWord = '';
            } else if (settings.mode === MODE.INPUT) {
                refineText.val('');
                searchWord = '';
            } else if (settings.mode === MODE.TAG) {
                var selectedOption = self.find('option:selected');
                if (selectedOption.val() === '') {
                    refineText.val('');
                    searchWord = '';
                }
            }

            // ãƒ€ãƒŸãƒ¼ãƒªã‚¹ãƒˆã‚’ãƒªãƒ•ãƒ¬ãƒƒã‚·ãƒ¥
            parent.find('.searchBoxElement').hide();
            changeSearchBoxElement();
            
        });
        
        // ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹ã®å¤–ã‚’ã‚¯ãƒªãƒƒã‚¯ã—ãŸå ´åˆã¯ãƒ€ãƒŸãƒ¼ãƒªã‚¹ãƒˆã‚’éžè¡¨ç¤ºã«ã™ã‚‹ã€‚
        $(document).click(function(e){
            if($(e.target).hasClass('refineText')){
                return;
            }
            parent.find('.searchBoxElement').hide();
            if (settings.mode !== MODE.TAG) {
                var selectedOption = self.find('option:selected');
                searchWord = selectedOption.text();
                refineText.val(selectedOption.text());
            }
        });

    }

    $(this).each(function (){
        init(this);
    });

    return this;
}

var MODE = {
    NORMAL: 0, // é€šå¸¸ã®ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹
    INPUT: 1, // å…¥åŠ›å¼ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹
    TAG: 2 // ã‚¿ã‚°è¿½åŠ å¼ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹
};

$.fn.searchBox.defaults = {
    selectCallback: null, // é¸æŠžå¾Œã«å‘¼ã°ã‚Œã‚‹ã‚³ãƒ¼ãƒ«ãƒãƒƒã‚¯
    elementWidth: null, // ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹ã®è¡¨ç¤ºå¹…
    optionMaxSize: 100, // ã‚»ãƒ¬ã‚¯ãƒˆãƒœãƒƒã‚¯ã‚¹å†…ã«è¡¨ç¤ºã™ã‚‹æœ€å¤§æ•°
    mode: MODE.INPUT // è¡¨ç¤ºãƒ¢ãƒ¼ãƒ‰
};

})(jQuery);