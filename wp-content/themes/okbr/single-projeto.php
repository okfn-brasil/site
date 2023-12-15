<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <!-- Header -->
        <header class="container-fluid  pt7 pt10-sm pb3">
            <div class="wrap">
                <div class="row mb2">
                    <div class="col-xs-12 col-md-7">
                        <h2 class="t6 w600 ff2 tcv"><?php md_field('titulo'); ?></h2>
                    </div>
                </div>
                <div class="row mb2">
                    <div class="col-xs-12 col-md-6 mb3 mb0-md">
                        <p class="t4  w400 lh1-50"><?php md_field('descricaocomp'); ?></p>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <!-- Detalhes -->
                            <section class="box-detalhes">
                                <div class="row mb2">
                                    <?php if(get_field('ano')): ?>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="t3 w400 tcc lh1-25 tl">Ano</div>
                                        <div class="t3 w400  lh1-50 tl"><?php md_field('ano'); ?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(get_field('financiamento')): ?>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="t3 w400 tcc lh1-25 tl">Financiamento</div>
                                        <div class="t3 w400  lh1-50 tl"><?php md_field('financiamento'); ?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(get_field('parcerias')): ?>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="t3 w400 tcc lh1-25 tl">Parceria</div>
                                        <div class="t3 w400  lh1-50 tl"><?php md_field('parcerias'); ?></div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="row bottom-xs">
                                    <div class="col-xs-12 col-sm-6 tl">
                                        <ul class="lista-horizontal mb2 mb0-sm">
                                            <?php if($twitter = get_field('twitter')): ?><li><a href="<?php echo $twitter; ?>" target="_blank"><button class="rede-social rede-social-preto twitter mr1"></button></a></li><?php endif; ?>
                                            <?php if($facebook = get_field('facebook')): ?><li><a href="<?php echo $facebook; ?>" target="_blank"><button class="rede-social rede-social-preto facebook mr1"></button></a></li><?php endif; ?>
                                            <?php if($github = get_field('github')): ?><li><a href="<?php echo $github; ?>" target="_blank"><button class="rede-social rede-social-preto github mr1"></button></a></li><?php endif; ?>
                                            <?php if($feed = get_field('feed')): ?><li><a href="<?php echo $feed; ?>" target="_blank"><button class="rede-social rede-social-preto feed mr1"></button></a></li><?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 tl tr-sm">
                                        <?php if($website = get_field('website')): ?><a href="<?php echo $website; ?>" target="_blank"><button class="btn-txt">Página do Projeto</button></a><?php endif; ?>
                                    </div>
                                </div>
                            </section>
                    </div>
                </div>
            </div>
        </header>

        <!-- Conteúdo -->
        <article class="container-fluid   pb5">
            <div class="wrap">
                <section class="conteudo ">
                    <?php get_template_part('block-conteudo'); ?>
                </section>

                <div class="row center-xs middle-xs">
                    <?php if($colab = get_field('colaboradores')): foreach($colab as $post): setup_postdata($post); ?>
                        <article class="col-xs-12 col-sm-4 col-md-3 mb2 mb3-md">
                            <?php get_template_part('block-colaborador'); ?>
                        </article>
                    <?php endforeach; endif; wp_reset_postdata(); ?>
                    <?php if($website): ?>
                    <div class="col-xs-12 col-md-6">
                        <div class="t4 w600  mb1 tl">Quer saber mais?</div>
                        <div class="t3 w400 lh1-50  tl">Mais informações podem ser achadas no <a href="<?php echo $website; ?>" target="_blank" class="tcv w600 u">site do projeto</a></div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </article>
        <?php if($colab = get_field('colaboradores')): foreach($colab as $post): setup_postdata($post); ?>
                <?php get_template_part('modal-colaborador'); ?>
        <?php endforeach; endif; wp_reset_postdata(); ?>
       
       <!-- Lista de colaboradores -->
       <?php if(get_field('voluntario')): ?>
       <article class="container-fluid bg-branco pt5 pb5">
           <div class="wrap">
                <header class="row">
                    <div class="col-xs-12">
                        <h2 class="titulo-secao mb2">Voluntários</h2>
                    </div>
                </header>
                <section class="mb3 mb5-sm t3 w400 mb05 lh1-50" style="column-width: 250px;">
                    <?php 
                        if($v = get_field('voluntario')){
                            $v = explode(';', preg_replace('/[\n\r]+/', ';', $v));
                            $voluntarios = array_unique(array_values($v));
                            asort($voluntarios);
                            echo implode("<br>", $voluntarios); 
                        }
                    ?>
               </section>
               <section class="row center-xs">
                   <div class="col-xs-12">
                       <a href="<?php echo home_url("participe"); ?>">
                           <button class="btn btn-verde">Quero ser um voluntário!</button>
                        </a>
                    </div>
               </section>
           </div>
       </article>
       <?php endif; ?>

    <?php get_template_part('block-apoie'); ?>
        
    </main>
<?php get_footer(); ?>