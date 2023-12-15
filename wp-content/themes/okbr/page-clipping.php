<?php
$pg = get_query_var('paged');
$pg = $pg ? $pg : 1;
$ppp = get_option( 'posts_per_page' );
$ptal = get_post_type_archive_link('clipping');
get_header(); 
?>
<?php get_template_part('block-menu'); ?>
    <main>
        <article class="container-fluid   pt7 pt10-sm pb5 pb10-sm">
            <div class="wrap">
                <div class="row">
                    <div class="col-xs-12  col-md-9">
                        <h2 class="t6 w100 ff2  mb2"><?php md_field('titulo'); ?></h2>
                    </div>
                </div>
                <div class="conteudo ">
                    <div class="row center-xs">
                        <div class="col-xs-12 col-sm-9 col-md-6 tl">
                            <?php echo md_field('texto'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <?php if(have_rows('logos')): ?>
        <!-- Logos da imprensa -->
        <article class="container-fluid bg-branco pt5 pb5">
            <div class="wrap">
                <div class="row center-xs between-md middle-xs">
                    <?php while(have_rows('logos')): the_row(); ?>
                    <div class="col-xs-12 col-sm-4 col-sm-3 mb2 mb0-sm">
                        <a <?php echo ($url = get_sub_field('url')) ? 'href="'.$url.'" target="_blank"' : 'onclick="return false;"'; ?>>
                            <?php 
                                $img = get_sub_field('imagem');
                                $img = $img ? $img['url'] :  tu(0).'/assets/images/ph_meio.png';
                            ?>
                            <figure><img src="<?php echo $img; ?>"></figure>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </article>
        <?php endif; ?>

        <article class="container-fluid pt5 pb5">
            <div class="wrap">

                <!-- Notícias -->
                    <?php $noticias = new WP_Query(array("post_type"=>"clipping","posts_per_page"=>$ppp,"paged"=>$pg)); ?>
                    <section class="row center-xs mb3">
                        <?php while($noticias->have_posts()): $noticias->the_post(); ?>
                            <?php get_template_part('block-namidia'); ?>
                        <?php endwhile; ?>
                    </section>
                    <?php 
                        $c = wp_count_posts(get_post_type());
                        $c = $c->publish;
                        $max = ceil($c/$ppp);
                        if($c > $ppp):
                    ?>
                    <section class="row center-xs">
                        <div class="col-xs-12 col-sm-12 col-md-8">
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

        <?php if(have_rows('presskit')): ?>
        <!-- Press Kit -->
        <article class="container-fluid pt5 pb5">
            <div class="wrap">
                <header class="row">
                    <div class="col-xs-12">
                        <h2 class="titulo-secao  mb4">Press Kit</h2>
                    </div>
                </header>

                <!-- Press Kit e Logos -->
                <section class="row center-xs middle-xs">
                    <?php while(have_rows('presskit')): the_row(); ?>
                    <div class="col-xs-12 col-md-6 mb2 mb1-md">
                        <a href="<?php the_sub_field('arquivo'); ?>" class="cartao cartao-horizontal middle-xs" download>
                            <figure><img src="<?php tu(); ?>/assets/images/presskit.png"></figure>
                            <section class="  p2 tl">
                                <div class="t4 w600 ff2 mb02"><p><?php md_sub_field('titulo'); ?></p></div>
                                <div class="t3 w400 lh1-50"><p><?php md_sub_field('descricao'); ?></p></div>
                                <button class="btn-txt btn-cartao btn-download">Download</button>
                            </section>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </section>
            </div>
        </article>
        <?php endif; ?>

    <?php get_template_part('block-apoie'); ?>

    </main>
<?php get_footer(); ?>