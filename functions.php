<?php

//O primeiro parametro da minha função wp_enqueue_style é o identificador que precisa ser unico
//O segundo é o caminho do arquivo que vamos incluir
//O terceiro diz se a folha de estilo (css) tem alguma dependencia com algum arquivo
//O quarto é a versão e não é obrigatório passar
//O quanto é sobre qual tipo de media esse arquivo se refere, no nosso caso todas

function load_scripts(){
	wp_enqueue_style( 'template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all' );
}
	
	//Quando o gancho do wordpress wp_enqueue_scripts que serve para incluir scripts no tema for chamado
	//então chamo a função load_scripts que é responsável por colocar o arquivo css no tema
	add_action('wp_enqueue_scripts', 'load_scripts'); 
?>