<!-- Se houver algum widget ativo então o mesmo será exibido.
Lá no functions php que é onde registro a sidebar, devemos colocar o id que colocamos lá aqui.
Esse h-100 dentro da tag aside faz com que a barra lateral não se extenda até o fim da página -->
<?php if( is_active_sidebar( 'sidebar-1' ) ): ?>
	<aside class="sidebar col-md-4 h-100">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>
<?php endif; ?>