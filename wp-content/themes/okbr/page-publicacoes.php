<?php 
$pg = get_query_var('paged');
$pg = $pg ? $pg : 1;
$ppp = get_option( 'posts_per_page' );
$ptal = get_post_type_archive_link('publicacao');
get_header(); ?>
<?php get_template_part('block-menu'); ?>
<main id="page-publicacoes">
    <!-- Publicacoes Header -->
    <article class="container-fluid hero pt7 pt10-sm pb5 pb5-sm">
        <div class="wrap">
            <div class="row">
                <div class="col-xs-12  col-md-9">
                    <h1 class="t6 w100 ff2  ">Publicações que</h1>
                    <h1 class="t6 w600 ff2 tcv ">democratizam o</h1>
                    <h1 class="t6 w600 ff2 tcv ">conhecimento</h1>
                </div>
            </div>
 
        </div>
    </article>

    <!-- Publicacoes -->
    <article class="container-fluid  pt3 pb3">
        <div class="wrap">
            <header class="row">
                <div class="col-xs-12">
                    <h2 class="titulo-secao  mb5">Ebooks</h2>
                </div>
            </header>

            <!-- Publicações -->
            <?php $noticias = new WP_Query(array("post_type"=>"publicacao","posts_per_page"=>$ppp,"paged"=>$pg)); ?>
            <section class="row center-xs mb3">
                <?php while($noticias->have_posts()): $noticias->the_post(); ?>
                <!-- Notícia -->
                <article class="col-xs-12 col-md-10 mb2 mb1-md">
                    
                        <div class="cartao-publicacao">
                            <div class="img" class="flex">
                                <?php 
                                    $img = get_field('imagem');
                                    $img = $img ? isset($img['sizes']['thumb']) ? $img['sizes']['full'] : $img['url'] :  tu(0).'/assets/images/thumb.png';
                                ?>
                                <figure><img src="<?php echo $img; ?>" ></figure>
                            </div>
                        

                            <div class="interna ">
                                <div class="t4 ff2 lh1-50 w700 mb05"><?php the_title(); ?></div>
                                <p class="mb05"><?php the_field('descricao'); ?></p>

                                <?php if( have_rows('itens') ): ?>
                                    <ul class="">
                                        <?php while ( have_rows('itens') ) : the_row(); ?>

                                        <?php 
                                        $link = get_sub_field('link');
                                        if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                            <a class="btn-txt mr2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                        <?php endif; ?>

                                      

                                        <?php endwhile; ?>

                                      
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                   <!--      <a href="<?php the_permalink(); ?>" class=" cartao-publicacao">
                    </a> -->
                </article>
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


</main>
<?php get_footer(); ?>