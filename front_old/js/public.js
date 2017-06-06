function alert_msg(msg) {
        var alert_html = '';
        alert_html += '<div id="alert_modal" class="alert-modalbg">';
        alert_html += '<div class="alert-dialog">';
        alert_html += '<a href="#close" title="Close" class="alert-close">X</a>';
        alert_html += '<h2>Indian Music Lab Alert!!!</h2>';
        alert_html += '<p>'+msg+'</p>';
//        alert_html += '<p>You opened up the freakin\' modal window! Now close it, ya dingus.</p>';
        alert_html += '<p class="fineprint">Sorry for calling you a dingus earlier.</p></div></div>';
        return alert_html;
}