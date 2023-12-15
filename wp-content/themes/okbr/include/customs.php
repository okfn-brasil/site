<?php

/* Clear default post types */
	add_action( 'init', 'removePostTypeSupports', 10 );
	function removePostTypeSupports() {
	// 	remove_post_type_support("post",'editor');
	// 	remove_post_type_support("post",'author');
	// 	remove_post_type_support("post",'thumbnail');
	// 	remove_post_type_support("post",'excerpt');
	// 	remove_post_type_support("post",'trackbacks');
	// 	remove_post_type_support("post",'custom-fields');
	// 	remove_post_type_support("post",'comments');
	// 	remove_post_type_support("post",'revisions');
	// 	remove_post_type_support("post",'page-attributes');
	// 	remove_post_type_support("post",'post-formats');

	 	remove_post_type_support("page",'editor');
	// 	remove_post_type_support("page",'author');
	// 	remove_post_type_support("page",'thumbnail');
	// 	remove_post_type_support("page",'excerpt');
	// 	remove_post_type_support("page",'trackbacks');
	// 	remove_post_type_support("page",'custom-fields');
	// 	remove_post_type_support("page",'comments');
	// 	remove_post_type_support("page",'revisions');
	// 	remove_post_type_support("page",'page-attributes');
	// 	remove_post_type_support("page",'post-formats');
	}

/* PostTypes */
	add_action( 'init', 'registerPostypes', 2 );
	add_theme_support( 'post-thumbnails' );
	function registerPostypes() {
		register_post_type( "noticia", array(
			"labels" => array(
				"name" => "Notícias",
				"related" => "Notícias relacionadas",
				"singular_name" => "Notícia",
				"menu_name" => "Notícias",
				"all_items" => "Todas as Notícias",
				"add_new" => "Adicionar nova",
				"add_new_item" => "Adicionar nova Notícia",
				"edit" => "Editar",
				"edit_item" => "Editar Notícia",
				"new_item" => "Nova Notícia",
				"view" => "Ver",
				"view_item" => "Ver Notícia",
				"search_items" => "Buscar Notícia",
				"not_found" => "Nenhuma Notícia encontrada",
				"not_found_in_trash" => "Nenhuma encontrada",
			),
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"query_var" => true,
			"menu_position" => 1,		
			"supports" => array("title", "thumbnail"),
			"taxonomies" => array("post_tag")
		));
		register_post_type( "projeto", array(
			"labels" => array(
				"name" => "Projetos",
				"related" => "Projetos relacionados",
				"singular_name" => "Projeto",
				"menu_name" => "Projetos",
				"all_items" => "Todos os Projetos",
				"add_new" => "Adicionar novo",
				"add_new_item" => "Adicionar novo Projeto",
				"edit" => "Editar",
				"edit_item" => "Editar Projeto",
				"new_item" => "Novo Projeto",
				"view" => "Ver",
				"view_item" => "Ver Projeto",
				"search_items" => "Buscar Projeto",
				"not_found" => "Nenhum Projeto encontrado",
				"not_found_in_trash" => "Nenhum encontrado",
			),
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "projetos", "hierarchical" => false, "with_front" => false ),
			"query_var" => true,
			"menu_position" => 2,		
			"supports" => array("title", "thumbnail"),
		));
		register_post_type( "eixo", array(
			"labels" => array(
				"name" => "Eixos de atuação",
				"related" => "Eixos relacionados",
				"singular_name" => "Eixo",
				"menu_name" => "Eixos",
				"all_items" => "Todos os Eixos",
				"add_new" => "Adicionar novo",
				"add_new_item" => "Adicionar novo Eixo",
				"edit" => "Editar",
				"edit_item" => "Editar Eixo",
				"new_item" => "Novo Eixo",
				"view" => "Ver",
				"view_item" => "Ver Eixo",
				"search_items" => "Buscar Eixo",
				"not_found" => "Nenhum Projeto encontrado",
				"not_found_in_trash" => "Nenhum encontrado",
			),
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "eixos-de-atuacao", "hierarchical" => false, "with_front" => false ),
			"query_var" => true,
			"menu_position" => 2,		
			"supports" => array("title", "thumbnail"),
		));
		register_post_type( "rede", array(
			"labels" => array(
				"name" => "Redes",
				"related" => "Grupo de rede relacionados",
				"singular_name" => "Rede",
				"menu_name" => "Rede",
				"all_items" => "Todos os grupos de rede",
				"add_new" => "Adicionar novo",
				"add_new_item" => "Adicionar novo",
				"edit" => "Editar",
				"edit_item" => "Editar",
				"new_item" => "Novo",
				"view" => "Ver",
				"view_item" => "Ver",
				"search_items" => "Buscar",
				"not_found" => "Nenhum item encontrado",
				"not_found_in_trash" => "Nenhum encontrado",
			),
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => true,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"query_var" => true,
			"menu_position" => 3,		
			"supports" => array("title", "thumbnail"),
		));
		register_post_type( "colaborador", array(
			"labels" => array(
				"name" => "Colaboradores",
				"related" => "Colaboradores relacionados",
				"singular_name" => "Colaborador",
				"menu_name" => "Colaboradores",
				"all_items" => "Todos os Colaboradores",
				"add_new" => "Adicionar novo",
				"add_new_item" => "Adicionar novo Colaborador",
				"edit" => "Editar",
				"edit_item" => "Editar Colaborador",
				"new_item" => "Novo Colaborador",
				"view" => "Ver",
				"view_item" => "Ver Colaborador",
				"search_items" => "Buscar Colaborador",
				"not_found" => "Nenhum Autor encontrado",
				"not_found_in_trash" => "Nenhum encontrado",
			),
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"query_var" => true,
			"menu_position" => 3,		
			"supports" => array("title", "thumbnail"),
		));
		register_post_type( "evento", array(
			"labels" => array(
				"name" => "Eventos",
				"related" => "Eventos relacionados",
				"singular_name" => "Evento",
				"menu_name" => "Eventos",
				"all_items" => "Todos os Eventos",
				"add_new" => "Adicionar novo",
				"add_new_item" => "Adicionar novo Evento",
				"edit" => "Editar",
				"edit_item" => "Editar Evento",
				"new_item" => "Novo Evento",
				"view" => "Ver",
				"view_item" => "Ver Evento",
				"search_items" => "Buscar Evento",
				"not_found" => "Nenhum Evento encontrado",
				"not_found_in_trash" => "Nenhum encontrado",
			),
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => true,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"query_var" => true,
			"rewrite" => array( "slug" => "eventos", "with_front" => true ),
			"menu_position" => 3,		
			"supports" => array("title", "thumbnail"),
		));
		register_post_type( "clipping", array(
			"labels" => array(
				"name" => "Na mídia",
				"related" => "Matérias relacionadas",
				"singular_name" => "Matéria",
				"menu_name" => "Clipping",
				"all_items" => "Todas as matérias",
				"add_new" => "Adicionar nova",
				"add_new_item" => "Adicionar nova Matéria",
				"edit" => "Editar",
				"edit_item" => "Editar Matéria",
				"new_item" => "Nova Matéria",
				"view" => "Ver",
				"view_item" => "Ver Matéria",
				"search_items" => "Buscar Matéria",
				"not_found" => "Nenhuma Matéria encontrada",
				"not_found_in_trash" => "Nenhuma encontrada",
			),
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"query_var" => true,
			"rewrite" => array( "slug" => "clippings", "with_front" => true ),
			"menu_position" => 3,		
			"supports" => array("title", "thumbnail"),
		));
		register_post_type( "publicacao", array(
			"labels" => array(
				"name" => "Publicações",
				"related" => "Publicações relacionadas",
				"singular_name" => "Publicações",
				"menu_name" => "Publicações",
				"all_items" => "Todas as Publicações",
				"add_new" => "Adicionar nova",
				"add_new_item" => "Adicionar nova Publicação",
				"edit" => "Editar",
				"edit_item" => "Editar Publicação",
				"new_item" => "Nova Publicação",
				"view" => "Ver",
				"view_item" => "Ver Publicação",
				"search_items" => "Buscar Publicação",
				"not_found" => "Nenhuma Publicação encontrada",
				"not_found_in_trash" => "Nenhuma encontrada",
			),
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"query_var" => true,
			"menu_position" => 1,		
			"supports" => array("title", "thumbnail"),
		));
	}

/* Order */
	function menuOrder( $menu_order ) {
	    return array( 
	    	'index.php', 
	    	'edit.php?post_type=page', 
	    	'edit.php?post_type=noticia', 
	    	'edit.php?post_type=projeto', 
	    	'edit.php?post_type=eixo', 
	    	'edit.php?post_type=colaborador', 
	    	'edit.php?post_type=rede', 
	    	'edit.php?post_type=evento', 
	    	'edit.php?post_type=clipping', 
			'edit.php?post_type=publicacao', 
    	);
	}
	add_filter( 'custom_menu_order', '__return_true' );
	add_filter( 'menu_order', 'menuOrder' );