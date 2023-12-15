<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <!-- Header -->
        <header class="container-fluid  pt7 pt10-sm pb5">
            <div class="wrap">
                <div class="row mb2">
                    <div class="col-xs-12 center-xs">
                        <h2 class="t3 w600 ff3 uc  mb2"><?php the_field('midia'); ?></h2>
                        <h1 class="t6 w100 ff2  mb2"><?php the_title(); ?></h1>
                        <p class="t3 w300 ff2 uc "><?php the_field('data'); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="flex flex-column flex-row-md tc tl-md">
                            <p class="t1 w400 ff2 tcv ls1 uc inline-block mb2 mb0-md mr0 mr2-md">Compartilhar</p>
                            <ul class="lista-horizontal m0">
                                <li class="mr05 ml05"><a href="http://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_the_permalink());?>"><button class="rede-social rede-social-verde twitter"></button></a></li>
                                <li class="mr05 ml05"><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>&amp;t=<?php echo urlencode(get_the_title()); ?>"><button class="rede-social rede-social-verde facebook"></button></a></li>
                                <li class="mr05 ml05"><a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&amp;body=<?php echo urlencode(get_the_title()); ?>: <?php echo urlencode(get_the_permalink());?>"><button class="rede-social rede-social-verde mail"></button></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- conteúdo -->
        <article class="container-fluid bg-branco pt5 pb3">
            <div class="wrap">
                <section class="conteudo tccc">
                    <?php get_template_part('block-conteudo'); ?>
                </section>
            </div>
        </article>
       
    </main>
<?php get_footer(); ?>