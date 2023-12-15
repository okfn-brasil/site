<?php 
global $wp_query;
get_header(); 
?>
<?php get_template_part('block-menu'); ?>
    <main>
        <!-- Buscar -->
        <header class="container-fluid  pt7 pt10-sm pb3">
            <div class="wrap">
                <div class="row bottom-xs">
                    <div class="col-xs-12 col-md-4">
                        <h1 class="t6 w600 ff2 tcv lh1 mb1">Buscar</h1>
                    </div>
                    <form class="col-xs-12 col-md-8" action="<?php echo home_url(); ?>">
                        <input class="t3 ml05 mr05 buscar campo-linha mb1" type="text" name="s" placeholder="O que você procura?">
                    </form>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-4">
                        <p class="t4 w400 ">Sua busca por "<strong><?php echo $_GET['s']; ?></strong>" retornou <?php echo $wp_query->found_posts; ?> resultados</p>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid  pt3 pb5">
            <div class="wrap">
                <div class="row mb5">
                    <div class="col-xs-12 col-md-8 col-md-offset-4">
                        <?php while (have_posts()): the_post(); ?>
                        <?php if(get_post_type() == 'eixo'): ?>
                        <article class="mb2">
                            <a href="<?php echo the_permalink(); ?>">
                                <p class="t4  w400">eixo de atuação: <b><?php the_title(); ?></b></p>
                                <p class="t3 w400 tccc lh1-50"><?php md_field('descricao'); ?></p>
                            </a>
                        </article>
                        <?php elseif(get_post_type() == 'page'): ?>
                            <article class="mb2 bg-verde p1">
                                <a href="<?php echo the_permalink(); ?>">
                                    <p class=" t1 ff2 uc w300 mb05">Página</p>
                                    <div class="t4  w400"><b><?php the_title(); ?></b></div>
                                </a>
                            </article>
                        <?php elseif(get_post_type() == 'colaborador'): ?>
                        <article class="mb2">
                            <a href="<?php echo the_permalink(); ?>" class="flex middle-xs">
                                <?php 
                                    $img = get_field('imagem');
                                    $img = $img ? isset($img['sizes']['perfil']) ? $img['sizes']['perfil'] : $img['url'] :  tu(0).'/assets/images/ph_meio.png';
                                ?>
                                <figure class="mr1 ml0"><img src="<?php echo $img; ?>"></figure>
                                <div>
                                    <p class="t4  w400"><?php the_title(); ?></b></p>
                                    <p class="t3 w400 tccc lh1-50"><?php md_field('cargo'); ?></p>
                                </div>
                            </a>
                        </article>                       
                        <?php elseif(get_post_type() == 'clipping'): ?>
                            <?php get_template_part('block-namidia'); ?>
                        <?php else: ?>
                            <?php get_template_part('block-noticia'); ?>
                        <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
                
                <?php 
                    global $wp;
                    $ppp = get_option( 'posts_per_page' );
                    $pg = get_query_var('paged');
                    if(get_query_var('paged'))unset($wp->query_vars['paged']);
                    $ptal = add_query_arg( $wp->query_vars, home_url() );
                    $pg = $pg ? $pg : 1;
                    $c = $wp_query->found_posts;
                    $max = ceil($c/$ppp);
                    if($c > $ppp):
                ?>
                <section class="row center-xs">
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <ul class="lista-horizontal">
                            <?php if($pg > 1): ?><li><a href="<?php echo $ptal.'&paged='.($pg-1); ?>"><button class="btn-txt invertido mr2-sm p05">Voltar</button></a></li><?php endif; ?>
                            <?php if($pg-3 > 1): ?>
                                <li><a href="<?php echo $ptal.'&paged='.(1); ?>"><button class="btn-txt semSeta p05 <?php if(1 == $pg) echo 'ativo'; ?>">Primeira</button></a></li>
                                <li><span class="p05 ">...</span></li>
                            <?php endif; ?>
                            <?php for ($i = max(1,$pg-3); $i <= min($max,$pg+3); $i++): ?>
                            <li><a href="<?php echo $ptal.'&paged='.($i); ?>"><button class="btn-txt semSeta p05 <?php if($i == $pg) echo 'ativo'; ?>"><?php echo $i; ?></button></a></li>
                            <?php endfor; ?>
                            <?php if($pg+3 < $max): ?>
                                <li><span class="p05 ">...</span></li>
                                <li><a href="<?php echo $ptal.'&paged='.($max); ?>"><button class="btn-txt semSeta p05 <?php if($max == $pg) echo 'ativo'; ?>">Última</button></a></li>
                            <?php endif; ?>
                            <?php if($pg < $max): ?><li><a href="<?php echo $ptal.'&paged='.($pg+1); ?>"><button class="btn-txt ml2-sm p05">Proxima</button></a></li><?php endif; ?>
                        </ul>
                    </div>
                </section>
                <?php endif; ?>                  
            </div>
        </div>
    </main>
<?php get_footer(); ?>