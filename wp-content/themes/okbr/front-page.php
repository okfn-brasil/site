 <?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main>
    <!-- Header -->
    <header class="hero container-fluid pt3 pt7-sm pb3 pb5-sm" <?php if($b = get_field('banner')) echo 'style="background-image:url('.(isset($b['sizes']['full']) ? $b['sizes']['full'] : $b['url']).');"' ?>>
        <div class="row bottom-xs middle-sm">
            <div class="col-xs">
                <div class="wrap pb5 pt3">
                    <div class="row">
                        <div class=" col-xs-12 header-carrossel">
                            <?php while(have_rows('carousel')): the_row(); ?>
                            <article class="p05">
                                <div class="row middle-xs">
                                    <?php
                                        $link = get_sub_field('url');
                                        $texto = get_sub_field('texto');

                                        if($img = get_sub_field('imagem')): 
                                    ?>
                                        <div class="col-xs-12 col-md-5">
                                            <?php $img = $img ? isset($img['sizes']['meio']) ? $img['sizes']['meio'] : $img['url'] :  tu(0).'/assets/images/ph_meio.png'; ?>
                                            <?php if($link): ?><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php endif; ?>
                                                <figure class="mb2"><img src="<?php echo $img; ?>"></figure>
                                            <?php if($link): ?></a><?php endif; ?>
                                            <?php if($link): ?><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><button class="btn-txt"><?php echo $link['title']; ?></button></a><?php endif; ?>
                                        </div>
                                        <div class="col-xs-12 col-md-7">
                                            <?php if($link): ?><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php endif; ?>
                                                <h2 class="t5 lh1-25 ff2 tcb w100 mb2"><?php echo animaTermos($texto); ?></h2>
                                            <?php if($link): ?></a><?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-xs-12 col-sm-10 col-md-8">
                                            <?php if($link): ?><a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php endif; ?>
                                                <h2 class="t6 lh1-25 ff2 tcb w100 mb2"><?php echo animaTermos($texto); ?></h2>
                                            <?php if($link): ?></a><?php endif; ?>
                                            <?php if($link): ?>
                                                <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                                                    <button class="btn-txt"><?php echo $link['title']; ?></button>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </article>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Eixos de Atuação -->
    <article class="container-fluid bg-preto pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb2 mb4-sm">Eixos de atuação</h2>
                </div>
            </header>

            <?php 
                $eixos = new WP_Query(array("post_type"=>"eixo","posts_per_page"=>-1));
                $i = 0;
                if($eixos->have_posts()):
            ?>
            <?php while($eixos->have_posts()): $eixos->the_post(); $i++; ?>
                <section class="row middle-xs pt3 pb3 <?php echo $i%2 ? 'reverse' : ''; ?>">
                    <div class="col-xs-12 col-md-7 z1">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['banner']) ? $img['sizes']['banner'] : $img['url'] :  tu(0).'/assets/images/ph_banner.png';
                        ?>
                        <figure class="img-deslocada img-frame <?php echo $i%2 ? 'esquerda' : 'direita'; ?> mb2 mb0-md">
                            <img src="<?php echo $img; ?>">
                        </figure>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="col-xs-12 col-md-5 z2">
                        <h3 class="t6 w100 ff2 tcb nowrap mb1 mb3-md"><?php md_field('titulo'); ?></h3>
                        <div class="row">
                            <div class="col-xs-12 col-md-8 <?php echo $i%2 ? '' : 'col-md-offset-4'; ?>">
                                <div class="t3 lh1-50 tccc mb1 mb3-md">
                                    <p><?php md_field('descricao'); ?></p>
                                </div>
                                <button class="btn-txt">Saiba mais</button>
                            </div>
                        </div>
                    </a>
                </section>
            <?php endwhile; ?>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </article>

    <!-- Nossos Projetos -->
    <article class="container-fluid bg-code pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb4">Nossos Projetos</h2>
                </div>
            </header>

            <!-- Projetos -->
            <div class="start-xs projects">
                <?php 
                    $projetos = new WP_Query(array("post_type"=>"projeto","posts_per_page"=>-1));
                    while($projetos->have_posts()): $projetos->the_post();
                ?>
                <!-- Projeto -->
                <article class="mb2">
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
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <div class="row mt3">
                <div class="col-xs-12 tc">
                    <a href="<?php echo home_url("projetos"); ?>">
                        <button class="btn-txt btn-txt-branco">Veja todos os projetos</button>
                    </a>
                </div>
            </div>
        </div>
    </article>

    <!-- Notícias -->
    <article class="container-fluid bg-cinza-escuro pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao tcb mb4">Notícias</h2>
                </div>
            </header>

            <!-- Notícias -->
            <div class="row center-xs">
                <?php 
                    $noticias = new WP_Query(array("post_type"=>"noticia","posts_per_page"=>3));
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
                <?php endwhile; wp_reset_postdata(); ?>
            </div>

            <div class="row mt3">
                <div class="col-xs-12 tc">
                    <a href="<?php echo home_url("noticias"); ?>"><button class="btn-txt">Veja todas as notícias</button></a>
                </div>
            </div>
        </div>
    </article>

    <?php get_template_part('block-apoie'); ?>
</main>
<?php get_footer(); ?>