<?php
/*https://developer.wordpress.org/themes/customize-api/customizer-objects/
Temos paineis, seções e controles, uma seção tem o seu controle
$wp_customize: objeto usado para criar seção, controle ...
Settings passam os dados do controle direto para o banco de dados, o wordpress guarda esses dados dentro de tabela wp_options, basta achar os campos que começam por theme_mods
*/
function wpcurso_customizer( $wp_customize ){

	// Copyright

	//primeiro informamos o id da seção
	$wp_customize->add_section( 
		'sec_copyright', array(
			'title' => 'Copyright',
			'description' => 'Copyright Section'
		)
	);
	
	/*o type pode ser theme_mod ou option mas o option é para todo o site e geralmente plugins afetam todo o site e nesse caso afetamos somente o tema.
	sanitize serve para verificar os dados inseridos pelo usuário, é uma validação, pois o usuário pode tentar colocar um campo string para um inteiro por exemplo.
	https://divpusher.com/blog/wordpress-customizer-sanitization-examples
	No site acima temos vários tipos de filtro que podemos usar no sanitize*/
	$wp_customize->add_setting(
		'set_copyright', array(
			'type' => 'theme_mod',
			'default' => 'Copyright X - All rights reserved',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_copyright', array( //informamos o nome da setting usada
			'label' => 'Copyright',
			'description' => 'Please, type your copyright information here',
			'section' => 'sec_copyright', //nome da seção que o controle está ligado
			'type' => 'text' //estamos controlando um campo do tipo texto
		)
	);	

}
add_action( 'customize_register', 'wpcurso_customizer' ); //carregamos a função criada