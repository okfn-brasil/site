<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<?php while(have_posts()): the_post(); ?>
<main>
    <!-- Imagem em destaque -->
    <?php 
        $img = get_field('banner');
        $img = $img ? $img : get_field('imagem');
        $img = $img ? isset($img['sizes']['full']) ? $img['sizes']['full'] : $img['url'] :  tu(0).'/assets/images/ph_full.png';
    ?>
    <header class="container-fluid bg-preto bg-imagem pt10 pb10" style="background-image: url(<?php echo $img; ?>)">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-9">
                    <div class="bannermobile" style="background-image: url(<?php echo $img; ?>)"></div>
                    <h2 class="t6 w100 ff2 tcb mb2"><?php md_field('titulo'); ?></h2>
                </div>
            </div>
        </div>
    </header>

    <!-- Conteúdo -->
    <article class="container-fluid bg-preto pt3 pb3">
        <div class="wrap">
            <section class="conteudo tcb">
                <?php get_template_part('block-conteudo'); ?>
            </section>
        </div>
    </article>

    <?php 
        $rederelacionada = new WP_Query(array(
            "post_type"=>"rede", "posts_per_page"=>-1,
            'meta_query' => array(array('key'=>'eixos','value'=>'"' . get_the_ID() . '"','compare' => 'LIKE'))
        )); 
        if($rederelacionada->have_posts()):
    ?>
    <!-- Rede -->
    <article class="container-fluid bg-cinza-escuro pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb4">Rede</h2>
                </div>
            </header>
            <!-- Notícias -->
            <div class="row center-xs">
                <?php while($rederelacionada->have_posts()): $rederelacionada->the_post(); ?>
                <article class="col-xs-12 col-md-6 mt2 mt0-sm">
                    <a <?php echo get_field('link') ? 'href="'.get_field('link').'"' : ''; ?> class="cartao cartao-horizontal middle-xs mb1 mr0 mr1-md">
                        <?php 
                            $img = get_field('imagem');
                            if($img){
                                $img = isset($img['sizes']['vertical']) ? $img['sizes']['vertical'] : $img['url'];
                            }else{
                                $img = tu(0).'/assets/images/ph_vertical.png';
                            }
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class="lh1-50 tcb p2 p1-sm tl">
                            <h3 class="t4 ff2 w600 mb1"><?php the_title(); ?></h3>
                            <p class="t3"><?php the_field('texto'); ?></p>
                        </section>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </article>
    <?php endif; ?>

    <?php 
        $projetos = new WP_Query(array("post_type"=>"projeto","posts_per_page"=>-1,'meta_query' => array(array('key'=>'eixos','value'=>'"' . get_the_ID() . '"','compare' => 'LIKE')))); 
        if($projetos->have_posts()):
    ?>
    <!-- Projetos relacionados -->
    <article class="container-fluid bg-code pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb4">Projetos relacionados</h2>
                </div>
            </header>
            <!-- Projetos -->
            <div class="row start-xs">
                <?php 
                    while($projetos->have_posts()): $projetos->the_post();
                ?>
                <!-- Projeto -->
                <article class="col-xs-12 col-sm-6 col-md-4 mb2">
                    <a href="<?php the_permalink(); ?>" class="cartao cartao-vertical">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class="tcb p2">
                            <div class="t3 lh1-50">
                                <p><?php md_field('descricao'); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia Mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; ?>
            </div>
        </div>
    </article>
    <?php endif; wp_reset_postdata();?>

    <?php 
        $noticias = new WP_Query(array("post_type"=>"noticia","posts_per_page"=>3,'meta_query' => array(array('key'=>'eixos','value'=>'"' . get_the_ID() . '"','compare' => 'LIKE'))));
        if($noticias->have_posts()):
    ?>
    <!-- Notícias relacionadas -->
    <article class="container-fluid bg-cinza-escuro pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb4">Notícias relacionadas</h2>
                </div>
            </header>
            <!-- Notícias -->
            <div class="row center-xs">
                <?php 
                    while($noticias->have_posts()): $noticias->the_post();
                ?>
                <!-- Notícia -->
                <article class="col-xs-12 col-sm-10 col-md-8 mb1">
                    <a href="<?php the_permalink(); ?>" class="cartao cartao-horizontal middle-xs">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumbhor']) ? $img['sizes']['thumbhor'] : $img['url'] :  tu(0).'/assets/images/ph_thumbhor.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class=" tcb p2 tl">
                            <div class="t1 ff2 uc w100 mb05">
                                <p><?php the_date('d M Y'); ?></p>
                            </div>
                            <div class="t3 ff2 lh1-50 w600">
                                <p><?php the_title(); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia Mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; ?>
            </div>
            <div class="row mt3">
                <div class="col-xs-12 tc">
                    <a href="<?php echo home_url("noticias"); ?>">
                        <button class="btn-txt">Veja todas as notícias</button>
                    </a>
                </div>
            </div>
        </div>
    </article>
    <?php endif; wp_reset_postdata();?>

    <!-- Voluntários -->
    <?php 
        $voluntarios = array();
        if($projetos){
            while($projetos->have_posts()): $projetos->the_post();
                if($v = get_field('voluntario')){
                    $v = explode(';', preg_replace('/[\n\r]+/', ';', $v));
                    $voluntarios = array_unique(array_merge($voluntarios,array_values($v)));
                }
            endwhile; wp_reset_postdata();
            asort($voluntarios);
        }
        if(sizeof($voluntarios)):
    ?>
    <article class="container-fluid bg-branco pt5 pb5">
       <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao mb2">Voluntários</h2>
                </div>
            </header>
            <section class="mb3 mb5-sm t3 w400 mb05 lh1-50" style="column-width: 250px;">
                <?php echo implode("<br>", $voluntarios); ?>
            </section>
            <section class="row center-xs">
                <div class="col-xs-12">
                    <a href="<?php echo home_url("participe"); ?>"><button class="btn btn-verde">Quero ser um voluntário!</button></a>
                </div>
            </section>
       </div>
    </article>
    <?php endif; ?>

    <?php get_template_part('block-apoie'); ?>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>