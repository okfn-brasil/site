<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main>
    <!-- Nós somos -->
    <article class="container-fluid hero bg-grafismo pt7 pt10-sm pb5">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12  col-md-9">
                    <h2 class="t6 w100 ff2  mb2"><?php md_field('titulo'); ?></h2>
                </div>
            </div>
            <section class="conteudo ">
                <div class="row center-xs">
                    <div class="col-xs-12 col-sm-9 col-md-6 tl">
                        <?php echo md_field('texto'); ?>
                    </div>
                </div>
            </section>
        </div>
    </article>

    <!-- Nossos Projetos -->
    <article class="container-fluid  pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao  mb2">Nossos Projetos</h2>
                </div>
            </header>

            <!-- Filtro dos projetos -->
            <section class="row start-xs">
                <div class="col-xs-12">
                    <ul class="mb0 lista-horizontal  mb4">
                        <li class="mr1"><button class="btn-filtro ativo" data-filtro="">Todos</button></li>
                        <?php 
                            $eixos = new WP_Query(array("post_type"=>"eixo","posts_per_page"=>-1,"orderby"=>"name"));
                            while($eixos->have_posts()): $eixos->the_post();
                        ?>
                        <li class="mr1"><button class="btn-filtro" data-filtro="<?php the_ID() ?>"><?php the_title(); ?></button></li>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </ul>   
                </div>
            </section>

            <!-- Projetos -->
            <section class="row start-xs ">
                <?php 
                    $projetos = new WP_Query(array(
                        "post_type"=>"projeto","posts_per_page"=>-1,
                        "meta_query" => array(array('key'=>'aberto','value'=>'1','compare' => '='))
                    ));
                    while($projetos->have_posts()): $projetos->the_post();
                ?>
                <!-- Projeto -->
                <?php $eixos = get_field('eixos',get_the_ID(),false); ?>
                <article class="col-xs-12 col-sm-6 col-md-4 mb2" data-categoria="<?php if($eixos) echo implode(",", $eixos); ?>">
                    <a href="<?php the_permalink(); ?>" class="cartao cartao-vertical">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class=" p2">
                            <div class="t3 lh1-50">
                                <p><?php md_field('descricao'); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia Mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>
        </div>
    </article>

    <article class="container-fluid bg-roxo pt5 pb5">
        <div class="wrap">
            <header>
                <h2 class="titulo-secao tcb  mb4">Projetos realizados</h2>
            </header>
            <section>
                <ul class="lista-horizontal">
                    <?php 
                        $projetos = new WP_Query(array(
                            "post_type"=>"projeto","posts_per_page"=>-1,
                            "meta_query" => array(array('key'=>'aberto','value'=>'1','compare' => '!='))
                        ));
                        while($projetos->have_posts()): $projetos->the_post();
                    ?>
                    <li><a href="<?php the_permalink(); ?>"><button class="btn btn-tag m05"><?php the_title(); ?></button></a></li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </section>
        </div>
    </article>

    <?php get_template_part('block-apoie'); ?>

</main>
<?php get_footer(); ?>