<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <article class="container-fluid bg-preto bg-grafismo pt7 pt10-sm pb5 pb10-sm">
            <div class="wrap">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-md-9">
                        <h1 class="t6 w100 ff2 tcb mb3"><?php md_field('titulo'); ?></h1>
                    </div>
                </div>
                <section class="conteudo tccc">
                    <?php get_template_part('block-conteudo'); ?>
                </section>
            </div>
        </article>
    </main>
<?php get_footer(); ?>