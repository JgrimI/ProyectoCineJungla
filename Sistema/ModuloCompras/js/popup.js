var btnAbrirPopup = document.getElementsByClassName('btn-abrir-popup');

var cod_lista;
var overlay = document.getElementById('overlay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup');

for (var i = 0; i < btnAbrirPopup.length; i++) {

    btnAbrirPopup[i].addEventListener('click', function() {

        overlay.classList.add('active');
        popup.classList.add('active');
        alert(btnAbrirPopup[i].value);
    });

}

btnCerrarPopup.addEventListener('click', function(e) {
    e.preventDefault();
    overlay.classList.remove('active');
    popup.classList.remove('active');
});


// Note: 
// There is a file named svg_extend.js which is loaded here.
// It allows us to user add/remove/has class which SVG's
// don't have out of the box.


// Grab our elements
// so we can use them below
var closeIcon = document.querySelectorAll('svg.close'),
    $container = $('.container'),
    $list = $container.find('ul'),
    $links = $container.find('a'),
    $text = $container.find('span');


// When the '+' icon is clicked...
$(closeIcon).on('click', function() {
    // Add class to rotate icon to an 'x'
    this.toggleClass('active');
    // Toggle the list
    $list.toggle();
});

// When the icon is hovered, add
// a class to it's parent so we can style it
$(closeIcon).hover(function() {
    $container.addClass('hover');
}, function() {
    $container.removeClass('hover');
});


$links.on('click', function() {
    $links.removeClass('active');

    $(this).addClass('active');
    $text.text($(this).text()).addClass('fade');

    setTimeout(function() {
        $text.removeClass('fade');
    }, 800);

    $list.toggle();
    closeIcon.toggleClass('active');
});