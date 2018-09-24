<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Curso WordPress</title>
	<?php wp_head(); ?> <!--Função responsável por carregar scripts, folhas de estilos e inclusive as dos plugins do wordpress-->
</head>
<body <?php body_class(); ?>>
	<p>Este é um parágrafo de referência.</p>
	<header>
		<section class="top-bar">
			<div class="social-media-icons">Ícones Sociais</div>
			<div class="search">Pesquisa</div>
		</section>
		<section class="menu-area">
			<section class="logo">Logo</section>
			<nav class="menu">Menu</nav>
		</section>
	</header>