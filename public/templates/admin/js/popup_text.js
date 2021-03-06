
function PopupText(title, msg, $false) { /*change*/
    var $content =  "<div class='dialog-ovelay'>" +
                    "<div class='dialog'><header>" +
                        " <h3> " + title + " </h3> " +
                        "<i class='fa fa-close'></i>" +
                    "</header>" +
                    "<div class='dialog-msg'>" +
                        " " + msg + "  " +
                    "</div>" +
                    "<footer>" +
                        "<div class='controls'>" +
                            " <button class='button button-default cancelAction'>" + $false + "</button> " +
                        "</div>" +
                    "</footer>" +
                "</div>" +
            "</div>";
    $('body').prepend($content);

    $('.cancelAction, .fa-close').click(function () {
        $(this).parents('.dialog-ovelay').fadeOut(500, function () {
            $(this).remove();
        });
    });
        
}

