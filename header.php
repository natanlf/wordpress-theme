<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Usamos viewport para variar a escala, pois cada os dipositivos móveis varim muito o seu tamanho -->
	<meta name="viewport" content="width=device-width"> 
	<title>Curso WordPress</title>
	<?php wp_head(); ?> <!--Função responsável por carregar scripts, folhas de estilos e inclusive as dos plugins do wordpress-->
</head>
<body <?php body_class(); ?>>
	<header>
		<section class="top-bar">
			<!-- https://designmodo.com/bootstrap-4-grid-system/ -->
			<!-- https://getbootstrap.com/docs/4.0/layout/grid/#all-breakpoints -->
			<!-- https://www.w3schools.com/bootstrap4/bootstrap_grid_basic.asp -->
			<!--Dentro da classe container do Bootstrpa tenho uma linha que possui 12 colunas-->
			<!--Tenho as colunas grande, pequeno e extra pequeno-->
			<!--col-xl-9 que é a grande tem 9 colunas na div social-media-icons, isso quer dizer que sobram 3 colunas dessas 12, essas 3 colunas são usadas na classe search, segue essa lógica para as demais colunas-->
			<div class="container">
				<div class="row">
					<div class="social-media-icons col-xl-9 col-sm-7 col-6">Ícones Sociais</div>
					<div class="search col-xl-3 col-sm-5 col-6 text-right"><?php get_search_form(); ?></div>
				</div>
			</div>	
		</section>
		<section class="menu-area">
			<div class="container">
				<div class="row">
					<section class="logo col-md-2 col-12 text-center">Logo</section>
					<nav class="main-menu col-md-10 text-right">
						<!-- Chamo o menu através do método wp_nav_menu, preciso informar qual menu eu quero pois posso ter vários, é por isso que precisamos do slug e informamos o slug my_main_menu.
						Podemos perceber que no caso de dispositivos extra pequenos a logo terá 12 colunas e o menu não tem colunas nesse caso, pois em casos como esse de dispositivos móveis vamos usar um plugin que deixa o menu responsivo  -->
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'my_main_menu'
								)
							);
						?>
					</nav>
				</div>
			</div>
			
		</section>
	</header>