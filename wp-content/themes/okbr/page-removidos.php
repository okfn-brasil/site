        
    <!-- Rede de eventos -->
    <article class="container-fluid  pt5 pb5">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao  mb5">Rede de eventos</h2>
                </div>
            </header>

            <?php 
                $eventos = new WP_Query(array("post_type"=>"evento","posts_per_page"=>-1,'meta_query'=>array(array('key'=>'data','compare'=>'>=','value'=>date('Ymd')))));
                $eventosp = new WP_Query(array("post_type"=>"evento","posts_per_page"=>-1,'meta_query'=>array(array('key'=>'data','compare'=>'<','value'=>date('Ymd')))));
            ?>
            <!-- Filtro dos eventos -->
            <section class="row start-xs">
                <div class="col-xs-12">
                    <ul class="mb0 lista-horizontal  mb4">
                        <?php if($eventos->have_posts()): ?><li class="mr1"><button class="btn-filtro" data-filtro="proximos-eventos">Próximos eventos</button></li><?php endif; ?>
                        <?php if($eventosp->have_posts()): ?><li class="mr1"><button class="btn-filtro" data-filtro="passados-eventos">Eventos passados</button></li><?php endif; ?>
                    </ul>   
                </div>
            </section>

            <?php if($eventos->have_posts()): ?>
            <!-- Próximos eventos -->
            <section class="row mb3 eventos-carrossel carrossel" data-categoria="proximos-eventos">
                <?php 
                    while($eventos->have_posts()): $eventos->the_post();
                ?>
                <!-- Notícia -->
                <article class="col-xs-12">
                    <a href="<?php the_permalink(); ?>" class="cartao cartao-vertical">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class=" p2">
                            <div class="t1 ff2 uc w300 mb05">
                                <p><?php the_field('data'); ?></p>
                            </div>
                            <div class="t3 ff2 lh1-50 w600">
                                <p><?php the_title(); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia Mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>
            <?php endif; ?>

            <?php if($eventosp->have_posts()): ?>
            <!-- Eventos passados -->
            <section class="row mb3 eventos-carrossel carrossel" data-categoria="passados-eventos">
                <?php 
                    while($eventosp->have_posts()): $eventosp->the_post();
                ?>
                <!-- Notícia -->
                <article class="col-xs-12">
                    <a href="<?php the_permalink(); ?>" class="cartao cartao-vertical">
                        <?php 
                            $img = get_field('imagem');
                            $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['thumb'] : $img['url'] :  tu(0).'/assets/images/ph_thumb.png';
                        ?>
                        <figure><img src="<?php echo $img; ?>"></figure>
                        <section class=" p2">
                            <div class="t1 ff2 uc w300 mb05">
                                <p><?php the_field('data'); ?></p>
                            </div>
                            <div class="t3 ff2 lh1-50 w600">
                                <p><?php the_title(); ?></p>
                            </div>
                            <button class="btn-txt btn-cartao">Leia Mais</button>
                        </section>
                    </a>
                </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </section>
            <?php endif; ?>

            <section class="row center-xs">
                <div class="col-xs-12  col-md-8">
                    <a href="<?php echo home_url("eventos"); ?>">
                        <button class="btn-txt">Histórico</button>
                    </a>
                </div>
            </section>
        </div>
    </article>
    