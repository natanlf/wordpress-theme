<?php

//Comentários sobre inclusão do css
//O primeiro parametro da minha função wp_enqueue_style é o identificador que precisa ser unico
//O segundo é o caminho do arquivo que vamos incluir
//O terceiro diz se a folha de estilo (css) tem alguma dependencia com algum arquivo
//O quarto é a versão e não é obrigatório passar
//O quanto é sobre qual tipo de media esse arquivo se refere, no nosso caso todas

//No caso dos demais scripts segue a mesma lógica da inclusão do css, no caso de js mudou apenas o final para script (wp_enqueue_script), estamos carregando da web e temos uma dependencia onde o js do bootstrap depende do jquery e o ultimo parametro que está true define que vamos carregar o script no fim da página antes do fechamento da tag body

function load_scripts(){
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
	wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0', 'all' );
	wp_enqueue_style( 'template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all' );
}
	
	//Quando o gancho do wordpress wp_enqueue_scripts que serve para incluir scripts no tema for chamado
	//então chamo a função load_scripts que é responsável por colocar o arquivo css no tema
	add_action('wp_enqueue_scripts', 'load_scripts'); 

	//Registrando nossos menus
	/*Dentro do array temos o my_main_menu que é um slug, ou seja, é um nome curto usado para identificar o menu e recebe um valor (Main Menu) que é o que será exibido na administração do WordPress.
	Podemos colocar vários menus dentro desse array*/
	register_nav_menus(
		array(
			'my_main_menu' => 'Main Menu'
		)
	);
?>