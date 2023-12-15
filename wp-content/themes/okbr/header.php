<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    	<?php
    		global $page, $paged;
    		wp_title( '|', true, 'right' );
    		bloginfo( 'description' );
    	?>
    </title>
	<?php wp_head(); ?>
	<link rel="icon" type="image/png" href="<?php tu(); ?>/assets/images/icon.png" />
    <link rel="stylesheet" href="<?php tu(); ?>/build/style.css?v=20231101">
    <!-- FontGoogle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@100;300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>