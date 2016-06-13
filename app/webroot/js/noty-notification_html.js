// notification body's can be any html string or just string
function generate(type, text) {

    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        layout      : 'center',
        closeWith   : ['click'],
        theme       : 'relax',
        maxVisible  : 10,
        animation   : {
            open  : 'animated bounceInLeft',
            close : 'animated bounceOutRight',
            easing: 'swing',
            speed : 500
        }
    });
}
