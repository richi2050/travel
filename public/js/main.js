var isChrome = !!window.chrome && !!window.chrome.webstore;

function destaca (id)
{
	if (id == 'home_boton_proceso') { $("#maincircle").attr( 'src', 'images/proceso_circulo.png'); }
	if (id == 'home_boton_edo_cta') { $("#maincircle").attr( 'src', 'images/edo_cta_circulo.png'); }
	if (id == 'home_boton_politicas') { $("#maincircle").attr( 'src', 'images/politicas_circulo.png'); }
	if (id == 'home_boton_registros') { $("#maincircle").attr( 'src', 'images/registros_circulo.png'); }
	
}


function showMenu()
{
	$('.menu-item').slideToggle(350);
}

function restaura()
{
	$("#maincircle").attr('src','images/circulo.png');
}

