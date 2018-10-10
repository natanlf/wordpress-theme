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
			'title' => __( 'Copyright', 'wpwordpress'),
			'description' => __( 'Copyright Section', 'wpwordpress' )
		)
	);
	
	/*o type pode ser theme_mod ou option mas o option é para todo o site e geralmente plugins afetam todo o site e nesse caso afetamos somente o tema.
	sanitize serve para verificar os dados inseridos pelo usuário, é uma validação, pois o usuário pode tentar colocar um campo string para um inteiro por exemplo.
	https://divpusher.com/blog/wordpress-customizer-sanitization-examples
	No site acima temos vários tipos de filtro que podemos usar no sanitize*/
	$wp_customize->add_setting(
		'set_copyright', array(
			'type' => 'theme_mod',
			'default' => __( 'Copyright X - All rights reserved', 'wpwordpress' ),
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_copyright', array( //informamos o nome da setting usada
			'label' => __( 'Copyright', 'wpwordpress' ),
			'description' => __( 'Choose whether to show the Services section or not', 'wpwordpress' ),
			'section' => 'sec_copyright', //nome da seção que o controle está ligado
			'type' => 'text' //estamos controlando um campo do tipo texto
		)
	);	

	// Map

	$wp_customize->add_section( 
		'sec_map', array(
			'title' => __( 'Map', 'wpwordpress' ),
			'description' => __( 'Map Section', 'wpwordpress' )
		)
	);	

	// API Key

	//Aramazena e recupera o valor da chave na tabela wpoptions
	$wp_customize->add_setting(
		'set_map_apikey', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	//Temos o %s que serve como coringa pois ele recebe a url
	$wp_customize->add_control(
		'set_map_apikey', array(
			'label' => __( 'API Key', 'wpwordpress' ),
			'description' => sprintf(  //como temos tag html tratamos de forma diferente
				__( 'Get your key <a target="_blank" href="%s">here</a>', 'wpwordpress' ),
				'https://console.developers.google.com/flows/enableapi?apiid=maps_backend' 
				),
			'section' => 'sec_map',
			'type' => 'text'
		)
	);

	// Address

	$wp_customize->add_setting(
		'set_map_address', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_textarea'
		)
	);

	$wp_customize->add_control(
		'set_map_address', array(
			'label' => __( 'Type your address here', 'wpwordpress' ),
			'description' => __( 'No special characters allowed', 'wpwordpress' ),
			'section' => 'sec_map',
			'type' => 'textarea'
		)
	);

	// Slider

	$wp_customize->add_section( 
		'sec_slider', array(
			'title' => __( 'Slider', 'wpwordpress' ),
			'description' => __( 'Slider Section', 'wpwordpress' )
		)
	);	

	// Design

	$wp_customize->add_setting(
		'set_slider_option', array(
			'type' => 'theme_mod',
			'default' => '1',
			'sanitize_callback' => 'wpcurso_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'set_slider_option', array(
			'label' => __( 'Choose your design type here', 'wpwordpress' ),
			'description' => __( 'Choose your design type', 'wpwordpress' ),
			'section' => 'sec_slider',
			'type' => 'select',
			'choices' => array(
				'1' => __( 'Design Type 1', 'wpwordpress' ),
				'2' => __( 'Design Type 2', 'wpwordpress' ),
				'3' => __( 'Design Type 3', 'wpwordpress' ),
				'4' => __( 'Design Type 4', 'wpwordpress' )
			)
		)
	);	

	// Limit
	/*absint é uma função que aceita somente números positivos*/
	$wp_customize->add_setting(
		'set_slider_limit', array(
			'type' => 'theme_mod',
			'default' => '5',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_limit', array(
			'label' => __( 'Number of posts to display', 'wpwordpress' ),
			'description' => __( 'Choose the number of posts to be displayed', 'wpwordpress' ),
			'section' => 'sec_slider',
			'type' => 'number'
		)
	);	

	// Categories
	$wp_customize->add_setting(
		'set_slider_categories', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_slider_categories', array(
			'label' => 'Categories to include',
			'description' => 'Choose the categories to include. Use commas to sepate the categories. For example 4,5,8,20',
			'section' => 'sec_slider',
			'type' => 'text'
		)
	);


	// Front Page Loops

	$wp_customize->add_section( 
		'sec_loops', array(
			'title' => 'Front Page Loops',
			'description' => 'Controls the loops in front page'
		)
	);

	$wp_customize->add_setting(
		'set_loop1_categories', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_loop1_categories', array(
			'label' => 'Categories to include in first loop',
			'description' => 'Choose the categories to include in first loop. Use commas to sepate the categories. For example 4,5,8,20',
			'section' => 'sec_loops',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'set_loop2_posts_per_page', array(
			'type' => 'theme_mod',
			'default' => '2',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		'set_loop2_posts_per_page', array(
			'label' => 'Number of posts to display in second loop',
			'description' => 'Choose the number of posts to display in second loop',
			'section' => 'sec_loops',
			'type' => 'number'
		)
	);


	$wp_customize->add_setting(
		'set_loop2_categories_to_exclude', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_loop2_categories_to_exclude', array(
			'label' => 'Categories to exclude in second loop',
			'description' => 'Choose the categories to exclude in second loop. Use commas to sepate the categories. For example 4,5,8,20',
			'section' => 'sec_loops',
			'type' => 'text'
		)
	);


	$wp_customize->add_setting(
		'set_loop2_categories_to_include', array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_loop2_categories_to_include', array(
			'label' => 'Categories to include in second loop',
			'description' => 'Choose the categories to include in second loop. Use commas to sepate the categories. For example 4,5,8,20',
			'section' => 'sec_loops',
			'type' => 'text'
		)
	);

}
add_action( 'customize_register', 'wpcurso_customizer' ); //carregamos a função criada

/*
https://divpusher.com/blog/wordpress-customizer-sanitization-examples
Usamos essa função pois não existe uma função com o filtro para o select
*/
function wpcurso_sanitize_select( $input, $setting ){
 
    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible select options 
    $choices = $setting->manager->get_control( $setting->id )->choices;
                     
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
     
}