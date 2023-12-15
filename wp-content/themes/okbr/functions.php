<?php
date_default_timezone_set('America/Sao_Paulo');

/* Functions */
	function tu($echo=true){
		if($echo){ 
			echo get_template_directory_uri();
		}else{
			return get_template_directory_uri();
		}
	}
	function the_slug($echo=true){
		$slug = basename(get_permalink());
		do_action('before_slug', $slug);
		$slug = apply_filters('slug_filter', $slug);
		if( $echo ) echo $slug;
		do_action('after_slug', $slug);
		return $slug;
	}
	function clean($string) {
	   $string = str_replace(' ', '', $string);
	   return preg_replace('/[^A-Za-z0-9]/', '', $string);
	}
	function currentURL(){
		return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}
	include_once("plugins/Parsedown.php");
	function md_line($b) {
		$Parsedown = new Parsedown();
		return $Parsedown->line($b);
	}
	function md_text($b) {
		$Parsedown = new Parsedown();
		return $Parsedown->text($b);
	}
	function md_field($b) {
		echo animaTermos(md_line(get_field($b)));
	}
	function md_sub_field($b) {
		echo md_line(get_sub_field($b));
	}
	function acertagrid($i, $count){
		$diferenca = $count % 3;
		if($diferenca == 1){
			echo ($i <= 2 || $i>$count-2) ? 'col-md-6' : 'col-md-4';
		}elseif($diferenca == 2){
			echo ($i <= 2) ? 'col-md-6' : 'col-md-4';
		}else{
			echo 'col-md-4';
		} 
	}
	function animaTermos($s){
		return preg_replace(array('/\[/','/\]/'), array('<br><span class="tcv w800 termos" data-termos="','"></span>'), $s);
	}


/* Config */
	add_filter('xmlrpc_enabled', '__return_false');
	/* Menu */
		add_action( 'after_setup_theme', 'register_custom_nav_menus' );
		function register_custom_nav_menus() {
			register_nav_menus(array(
				'primary' => 'Primary Navigation',
				'footer' => 'Footer Navigation',
			));
		}

	/* Hide Menus */
		add_action( 'admin_menu', 'hideMenus', 999 );
	    function hideMenus(){
	        remove_menu_page('edit.php');
	        remove_menu_page('edit-comments.php');
	        remove_menu_page('tools.php');
	        
		    //remove_submenu_page('themes.php', 'themes.php');
		    //remove_submenu_page('themes.php', 'theme-editor.php');
		    //remove_submenu_page('themes.php', 'customize.php?return=%2Fokbr%2Fwordpress%2Fwp-admin%2Fthemes.php');

		    remove_submenu_page('options-general.php', 'options-media.php');
		    remove_submenu_page('options-general.php', 'options-discussion.php');
		    remove_submenu_page('options-general.php', 'options-writing.php');
		    //remove_submenu_page('options-general.php', 'options-reading.php');
		    //remove_submenu_page('options-general.php', 'options-permalink.php');
		    remove_submenu_page('options-general.php', 'privacy.php');
	    }

	    add_action('wp_dashboard_setup', 'removeDashboardWidgets', 999 );
	    function removeDashboardWidgets(){
	        global $wp_meta_boxes;
	        unset($wp_meta_boxes['dashboard']['normal']['core']['welcome']);
	        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	        //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	    }

	    add_action( 'admin_bar_menu', 'removeBarNodes', 999 );
	    function removeBarNodes(){
	        global $wp_admin_bar;   
	        $wp_admin_bar->remove_node( 'comments' );
	        $wp_admin_bar->remove_node( 'new-post' );
	        $wp_admin_bar->remove_node( 'customize' );
	    }

	/* Images */
		// add_filter('intermediate_image_sizes_advanced', 'removeImages');
		// function removeImages($sizes){
		// 	unset( $sizes['thumbnail']);
		// 	unset( $sizes['medium']);
		// 	unset( $sizes['medium_large']);
		// 	unset( $sizes['large']);
		// 	return $sizes;
		// }

		add_action('init', 'imageSizes');
		function imageSizes() {
			add_image_size( 'banner', 1240, 600, true );
			add_image_size( 'perfil', 200, 200, true );
			add_image_size( 'thumb', 380, 306, true );
			add_image_size( 'thumbhor', 368, 200, true );
			add_image_size( 'vertical', 215, 300, true );
			add_image_size( 'full', 1920, 1920, false );
			add_image_size( 'meio', 600, 99999, false );
			add_filter( 'jpeg_quality', function(){return 90;});
		}
		add_action('upload_mimes', 'add_file_types_to_uploads');
		function add_file_types_to_uploads($file_types){
			$new_filetypes = array();
			$new_filetypes['svg'] = 'image/svg';
			$file_types = array_merge($file_types, $new_filetypes );
			return $file_types;
		}

	/* E-mail */
		function emailTabela($txt=''){
			return '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 800px; margin:0 auto; font-family: Verdana, sans-serif; font-size: 16px; line-height: 1.5; color: #444; text-align:center;"><tr><td style="padding: 30px 10px 20px; text-align: center;" align="center"><a href="'.home_url().'" style="display: inline-block; vertical-align: baseline;"><img src="'.tu(0).'/assets/images/icon.png" style="display: block;" width="122" height="122" alt="Open Knowledge Brasil"></a></td></tr><tr><td align="center" valign="top" style="padding: 20px 7% 50px; text-align:center;"><table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%" align="center" style="text-align:center;">'.$txt.'</table></td></tr><tr><td align="center" valign="top" style="padding: 30px 0;"><p style="font-size:11px; color:#777777;">Este é um e-mail automático, por favor não responda. Para mais informações, acesse:<br><a style="color:#00adef;" href="'.home_url().'">'.home_url().'</a></p></td></tr></table>';
		}
		add_filter( 'wp_mail_content_type', 'set_html_content_type' );
		add_action( 'phpmailer_init', 'configure_smtp' );
		function configure_smtp( $phpmailer ){
			if ( ! is_object( $phpmailer ) ) $phpmailer = (object) $phpmailer;
		    //$phpmailer->isSMTP();
			//$phpmailer->Mailer = 'smtp';
		    //$phpmailer->Host = '';
		    //$phpmailer->SMTPAuth = true;
		    //$phpmailer->Username = '';
		    //$phpmailer->Password = '';
		    //$phpmailer->SMTPSecure = 'tls';
		    //$phpmailer->Port = 587;
		    $phpmailer->From = 'contato@okfn.org.br';
		    $phpmailer->FromName = 'OKBR';
		    $phpmailer->isHTML(true);
		    $phpmailer->CharSet = 'UTF-8';
		}

	/* Conteudo */
		add_filter('use_block_editor_for_post', '__return_false', 10);
		add_filter('use_block_editor_for_post_type', '__return_false', 10);

	/* Estilos */
		add_action('admin_enqueue_scripts', 'backend_style');
		function backend_style() {
		  wp_enqueue_style('backend-styles', get_template_directory_uri().'/assets/backend_style.css');
		}
		
		add_filter('tiny_mce_before_init', 'custom_color_pallete');
		function custom_color_pallete($init) {
		    $custom_colours = '
		    	"00cb8d","Verde",
		    	"000000","Preto",
		    	"272727","Cinza-escuro",
		    	"4b4b4b","Cinza",
		    	"ababab","Cinza-claro",
		    	"f2f2f2","Offwhite",
		    	"ffffff","Branco"
		    ';
		    $init['textcolor_map'] = '['.$custom_colours.']';
		    $init['textcolor_rows'] = 2;
		    $init['textcolor_cols'] = 4;
		    $init['block_formats'] = 'Paragraph=p;Heading 3=h3;Heading 4=h4;Heading 5=h5';
		    return $init;
		}

		
		function editor_style() {
		    add_editor_style( 'assets/editor_style.css' );
		}
		add_action( 'admin_init', 'editor_style' );

		add_filter( 'mce_buttons', 'remove_mce_buttons');
		function remove_mce_buttons( $buttons ) {
		    $remove_buttons = array(
		        'alignleft',
		        'aligncenter',
		        'alignright',
		        'numlist',
		        'wp_more',
		        'spellchecker',
		        'dfw',
		        'fullscreen',
		        //'wp_adv',
		    );
		    foreach ( $buttons as $button_key => $button_value ) {if ( in_array( $button_value, $remove_buttons ) ) {unset( $buttons[ $button_key ] ); } }
		    return $buttons;
		}
		add_filter( 'mce_buttons_2', 'remove_mce_buttons2');
		function remove_mce_buttons2( $buttons ) {
		    $remove_buttons = array(
		        'alignjustify',
		        //'outdent',
		        //'indent',
		        'wp_help',
		    );
		    foreach ( $buttons as $button_key => $button_value ) {if ( in_array( $button_value, $remove_buttons ) ) {unset( $buttons[ $button_key ] ); } }
		    return $buttons;
		}

/* Includes */
	include_once("include/customs.php");
	/* Global Social */
	if( function_exists('acf_add_options_page') ) {
	    acf_add_options_page(array(
	        'page_title'    => 'Configuração de links',
	        'menu_title'    => 'Links Redes Sociais',
	        'menu_slug'     => 'links-gerais',
	        'capability'    => 'administrator',
	        'redirect'      => false
	    ));
	}
	//include_once("include/allfields.php");

/* Sistema */
	function newsletter($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			include_once( get_stylesheet_directory() . "/plugins/Mailchimp.php");
			try {
				$mailchimp = new Mailchimp('7a997073b3089e902c1422a708b91a44-us20');
				$lists = new Mailchimp_Lists($mailchimp);
				$lists->subscribe('e6ecc81a0f', array('email' => $email), null, 'html', false);
				
				$txt = '<tr><td style="padding: 30px 0;"><h2>Seja bem-vindo(a)!</h2><p>Seu cadastro em nossa newsletter foi concluído com sucesso!</p></td></tr>';
				$txt .='<tr><td style="padding: 30px 0; border-top:1px solid #ddd; font-size:0.8em;">Não deseja mais receber e-mails? <a href="'.home_url().'?removerInscricao='.$email.'&mailhash='.gerahash().'">Clique aqui</a></td></tr>';

				wp_mail($email,'Seja bem-vindo(a)!',emailTabela($txt));

			    return (Object)array("status"=>"sucesso","msg"=>"E-mail cadastrado com sucesso!");
		  	} catch (Mailchimp_List_AlreadySubscribed $e) {
			    return (Object)array("status"=>"erro","msg"=>"Você já assinou a newsletter.");
			} catch (Mailchimp_Email_AlreadySubscribed $e) {
			    return (Object)array("status"=>"erro","msg"=>"Você já assinou a newsletter.");
			} catch (Mailchimp_Email_NotExists $e) {
			    return (Object)array("status"=>"erro","msg"=>"O e-mail informado não existe.");
			} catch (Mailchimp_Invalid_Email $e) {
			    return (Object)array("status"=>"erro","msg"=>"O e-mail informado é inválido.");
			} catch (Mailchimp_List_InvalidImport $e) {
			    return (Object)array("status"=>"erro","msg"=>"O e-mail informado é inválido.");
			} catch (Exception $e) {
				return (Object)array("status"=>"erro","msg"=>"Não foi possível cadastrar esse e-mail!");
			}
		}else{
			return (Object)array("status"=>"erro","msg"=>"E-mail inválido!");
		}
	}
	function removeNewsletter($email){
		include_once( get_stylesheet_directory() . "/plugins/Mailchimp.php");
		try {
			$mailchimp = new Mailchimp('7a997073b3089e902c1422a708b91a44-us20');
			$lists = new Mailchimp_Lists($mailchimp);
			$lists->unsubscribe('e6ecc81a0f', array('email' => $email), false, false, false);
			
		    return (Object)array("status"=>"sucesso","msg"=>"E-mail removido de nosso banco de dados com sucesso.");
	  	} catch (Exception $e) {
			return (Object)array("status"=>"erro","msg"=>"E-mail não encontrado.");
		}
	}
	function especialNews($a){
        $email = isset($a['newsespecial']) ? $a['newsespecial'] : false;
        $rede = isset($a['rede']) ? $a['rede'] : false;
        $r = false;
        while(have_rows('redes',30)): the_row();
            if(clean(get_sub_field('titulo')) === $rede){
                $r = (Object)array(
                    'nome'=>get_sub_field('titulo'),
                    'lista'=>get_sub_field('lista'),
                    'chave'=>get_sub_field('chave')
                );
            }
        endwhile;

        if(!$r){
            return (Object)array("status"=>"erro","msg"=>"Lista inválida!");
        }
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            include_once( get_stylesheet_directory() . "/plugins/Mailchimp.php");
            try {
                $mailchimp = new Mailchimp($r->chave);
                $lists = new Mailchimp_Lists($mailchimp);
                $lists->subscribe($r->lista, array('email' => $email), null, 'html', false);
                
                $txt = '<tr><td style="padding: 30px 0;"><h2>Seja bem-vindo(a)!</h2><p>Seu cadastro em nossa newsletter "'.$r->nome.'" foi concluído com sucesso!</p></td></tr>';

                wp_mail($email,'Seja bem-vindo(a)!',emailTabela($txt));

                return (Object)array("status"=>"sucesso","msg"=>"E-mail cadastrado com sucesso!");
            } catch (Mailchimp_List_AlreadySubscribed $e) {
                return (Object)array("status"=>"erro","msg"=>"Você já assinou a newsletter.");
            } catch (Mailchimp_Email_AlreadySubscribed $e) {
                return (Object)array("status"=>"erro","msg"=>"Você já assinou a newsletter.");
            } catch (Mailchimp_Email_NotExists $e) {
                return (Object)array("status"=>"erro","msg"=>"O e-mail informado não existe.");
            } catch (Mailchimp_Invalid_Email $e) {
                return (Object)array("status"=>"erro","msg"=>"O e-mail informado é inválido.");
            } catch (Mailchimp_List_InvalidImport $e) {
                return (Object)array("status"=>"erro","msg"=>"O e-mail informado é inválido.");
            } catch (Exception $e) {
                return (Object)array("status"=>"erro","msg"=>"Não foi possível cadastrar esse e-mail!");
            }
        }else{
            return (Object)array("status"=>"erro","msg"=>"E-mail inválido!");
        }
    }
	function acoes(){
		global $alerta;
		if(isset($_POST['assinarnews']) && $_POST['assinarnews']){
			$alerta = newsletter($_POST['assinarnews']);
		}
		if(isset($_GET['removerInscricao']) && isset($_GET['mailhash'])){
			$alerta = removeNewsletter($_GET['removerInscricao']);
		}
		if(isset($_POST['newsespecial']) && $_POST['newsespecial']){
			$alerta = especialNews($_POST); 
		}
		if(isset($_POST['ajax']) && $alerta){ echo json_encode($alerta); exit; }
	}
	add_action('init', 'acoes');	

/* Disable emojis */
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content', 'wp_staticize_emoji' );

/* Search */
	function cf_search_join( $join ) {
		global $wpdb;
	
		if ( is_search() ) {    
			$join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
		}
	
		return $join;
	}
	add_filter('posts_join', 'cf_search_join' );
	function cf_search_where( $where ) {
		global $pagenow, $wpdb;
	
		if ( is_search() ) {
			$where = preg_replace(
				"/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
				"(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
		}
	
		return $where;
	}
	add_filter( 'posts_where', 'cf_search_where' );
	function cf_search_distinct( $where ) {
		global $wpdb;
	
		if ( is_search() ) {
			return "DISTINCT";
		}
	
		return $where;
	}
	add_filter( 'posts_distinct', 'cf_search_distinct' );