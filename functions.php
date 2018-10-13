<?php

//Incluindo os arquivos da TGM
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

// Requerendo o arquivo do Customizer
require get_template_directory() . '/inc/customizer.php';

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

	//Função de configuração
	function wpcurso_config(){
		//Registrando nossos menus
		/*Dentro do array temos o my_main_menu que é um slug, ou seja, é um nome curto usado para identificar o menu e recebe um valor (Main Menu) que é o que será exibido na administração do WordPress.
		Podemos colocar vários menus dentro desse array*/
		register_nav_menus(
			array(
				'my_main_menu' => __( 'Main Menu', 'wpwordpress' ),
				'footer_menu' => __( 'Footer Menu', 'wpwordpress' )
			)
		);
		//Cabeçalhos customizados, podemos passar vários tipos de parametros para customizar o header
		//Nesse caso vamos passar somente altura e largura
		$args = array(
			'height'	=> 225,
			'width'		=> 1920
		);
		add_theme_support( 'custom-header', $args );
		//Agora podemos definir uma imagem para cada post
		add_theme_support('post-thumbnails');
		/*Formatos de posts. Existem vários formatos mas vamos usar o padrão, imagem e vídeo
		Para aplicar o formato de post devo ir no admin do wordpress e selecionar o formato de post desejado*/
		add_theme_support('post-formats', array('video', 'image'));
		add_theme_support( 'title-tag'); //adiciona a tag title no wordpress, tag importante no SEO
		//logo qe pose ser alterada pelo customizer
		add_theme_support( 'custom-logo', array( 'height' => 110, 'width' => 200 ) );

		// Habilitando suporte à tradução
	$textdomain = 'wpwordpress';
	load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages/' ); //tema filho
	load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' ); //tema pai
	}

	add_action( 'after_setup_theme', 'wpcurso_config', 0 );

// Registrando Sidebars
add_action( 'widgets_init', 'wpcurso_sidebars' );
function wpcurso_sidebars(){
	register_sidebar(
		array(
			'name' => __( 'Home Page Sidebar', 'wpwordpress' ),
			'id' => 'sidebar-1',
			'description' => __( 'Sidebar to be used on Home Page', 'wpwordpress'),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);
	register_sidebar(
		array(
			'name' => __( 'Blog Sidebar', 'wpwordpress'),
			'id' => 'sidebar-2',
			'description' => __( 'Sidebar to be used on Blog Page', 'wpwordpress'),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	

	//Sidebars dos serviços
	register_sidebar(
		array(
			'name' => __( 'Services 1', 'wpwordpress' ),
			'id' => 'services-1',
			'description' => __( 'First Services Area.', 'wpwordpress' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	

	register_sidebar(
		array(
			'name' => __( 'Services 2', 'wpwordpress' ),
			'id' => 'services-2',
			'description' => __( 'Second Services Area.', 'wpwordpress' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	

		register_sidebar(
		array(
			'name' => __( 'Services 3', 'wpwordpress' ),
			'id' => 'services-3',
			'description' => __( 'Third Services Area.', 'wpwordpress' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	

	register_sidebar(
		array(
			'name' => __( 'Social Icons', 'wpwordpress' ),
			'id' => 'social-media',
			'description' => __( 'Place your media icons here', 'wpwordpress' ),
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>'
		)
	);	
}
?>