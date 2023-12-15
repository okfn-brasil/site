<?php 
$pg = get_query_var('paged');
$pg = $pg ? $pg : 1;
$ppp = get_option( 'posts_per_page' );
$ptal = get_post_type_archive_link('noticia');
get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main id="page-noticias">
    <!-- Notícia destaque -->
    <article class="container-fluid hero pt7 pt10-sm pb5 pb5-sm">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12  col-md-9">
                    <h1 class="t6 w600 ff2 tcv">Notícias</h1>
                </div>
            </div>
       <!--      <?php 
                if($pg <= 1):
                $destaque = get_field('destaque');
                if($destaque):
            ?>
            <section class="header-carrossel">
                <?php 
                    foreach( $destaque as $post):
                    setup_postdata($post);
                ?>
                <div class="p05">
                    <a href="<?php the_permalink(); ?>" class="row middle-xs">
                        <div class="col-xs-12 col-md-5 mb3 mb0-md">
                            <?php 
                                $img = get_field('imagem');
                                $img = $img ? isset($img['sizes']['meio']) ? $img['sizes']['meio'] : $img['url'] :  tu(0).'/assets/images/ph_meio.png';
                            ?>
                            <figure><img src="<?php echo $img; ?>"></figure>
                        </div>
                        <div class="col-xs-12 col-md-7"><div class="t6 w100 ff2  mb2 mb0-md"><p><?php the_title(); ?></p></div></div>
                        <div class="col-xs-12 col-md-6"><button class="btn-txt">Leia mais</button></div>
                    </a>
                </div>
                <?php endforeach; ?>
            </section>
            <?php endif; wp_reset_postdata(); endif; ?> -->
        </div>
    </article>

    <!-- Notícia -->
    <article class="container-fluid  pt3 pb3">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao  mb5">Notícias</h2>
                </div>
            </header>

            <!-- Notícias -->
            <?php $noticias = new WP_Query(array("post_type"=>"noticia","posts_per_page"=>$ppp,"paged"=>$pg)); ?>
            <section class="row center-xs mb3">
                <?php while($noticias->have_posts()): $noticias->the_post(); ?>
                    <?php get_template_part('block-noticia'); ?>
                <?php endwhile; ?>
            </section>
            <?php 
                $c = wp_count_posts(get_post_type());
                $c = $c->publish;
                $max = ceil($c/$ppp);
                if($c > $ppp):
            ?>
            <section class="row center-xs">
                <div class="col-xs-12  col-md-8">
                    <ul class="lista-horizontal">
                        <?php if($pg > 1): ?><li><a href="<?php echo $ptal.'?paged='.($pg-1); ?>"><button class="btn-txt invertido mr2-sm p05">Voltar</button></a></li><?php endif; ?>
                        <?php if($pg-3 > 1): ?>
                            <li><a href="<?php echo $ptal.'?paged='.(1); ?>"><button class="btn-txt semSeta p05 <?php if(1 == $pg) echo 'ativo'; ?>">Primeira</button></a></li>
                            <li><span class="p05 ">...</span></li>
                        <?php endif; ?>
                        <?php for ($i = max(1,$pg-3); $i <= min($max,$pg+3); $i++): ?>
                        <li><a href="<?php echo $ptal.'?paged='.($i); ?>"><button class="btn-txt semSeta p05 <?php if($i == $pg) echo 'ativo'; ?>"><?php echo $i; ?></button></a></li>
                        <?php endfor; ?>
                        <?php if($pg+3 < $max): ?>
                            <li><span class="p05 ">...</span></li>
                            <li><a href="<?php echo $ptal.'?paged='.($max); ?>"><button class="btn-txt semSeta p05 <?php if($max == $pg) echo 'ativo'; ?>">Última</button></a></li>
                        <?php endif; ?>
                        <?php if($pg < $max): ?><li><a href="<?php echo $ptal.'?paged='.($pg+1); ?>"><button class="btn-txt ml2-sm p05">Próxima</button></a></li><?php endif; ?>
                    </ul>
                </div>
            </section>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </article>

    <?php if($pg <= 1): ?>
        


    <!-- Na mídia -->
    <article class="container-fluid bg-roxo pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb5">Na mídia</h2>
                </div>
            </header>

            <!-- Mídias -->
            <section class="row center-xs mb3">
                <?php 
                    $noticias = new WP_Query(array("post_type"=>"clipping","posts_per_page"=>3));
                    while($noticias->have_posts()): $noticias->the_post();
                ?>
                    <?php get_template_part('block-namidia'); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>

            <section class="row center-xs">
                <div class="col-xs-12  col-md-8">
                    <a href="<?php echo home_url("clipping"); ?>">
                        <button class="btn btn-verde">Veja todos</button>
                    </a>
                </div>
            </section>
        </div>
    </article>
    <?php endif; ?>
</main>
<?php get_footer(); ?>