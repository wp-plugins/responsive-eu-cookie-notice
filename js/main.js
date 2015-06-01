( function($) {
    if (rn && rn.enabled && rn.enabled == '1') {
        //we're in business!
        rn.Cookies = Cookies.noConflict();
        var rn_nodisplay = rn.Cookies.get('rn_nodisplay');
        if (!rn_nodisplay) {
            var container = $('<div>').hide();
            $('body').prepend(container);
            container.attr('id','rn_container');
            container.css('width','100%');
            container.css('background-color', rn.bgcolor);
            container.css('border-top','1px solid #ccc');
            container.css('min-height','2em');
            var close = $('<a>').html('<span style="vertical-align: middle;">×</span> <small>' + rn.close_text + '</small>');
            close.css('float','right');
            close.css('font-weight','bold');
            close.css('text-decoration','none');
            close.css('margin-right','2%');
            close.css('cursor', 'pointer'); 
            close.on('click',function() {
                var rn_expires = parseInt(rn.hide_days);
                $('#rn_container').fadeOut();
                rn.Cookies.set('rn_nodisplay','true', { expires: rn_expires });
            });
            container.append(close);
            var subdiv = $('<div>');
            subdiv.css('margin','0 auto');
            subdiv.css('max-width','66%');
            subdiv.css('opacity','1');
            subdiv.css('background-color','transparent');
            subdiv.css('color', rn.textcolor);
            container.append(subdiv);
            subdiv.html(rn.content);
            setTimeout( function() {
                container.fadeIn();
            }, 500 );
        }
    }
})(jQuery);
