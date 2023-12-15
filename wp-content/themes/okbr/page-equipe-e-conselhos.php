<?php get_header(); ?>
<?php get_template_part('block-menu'); ?>
    <main>
        <!-- Uma rede de colaboração -->
        <section class="container-fluid hero pt7 pt10-sm pb5 pb10-sm">
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
        </section>
       
        <?php $i=0; while(have_rows('grupos')): the_row(); $i++; ?>
        <article class="container-fluid <?php echo $i%2 ? 'bg-branco tcp' : 'bg-roxo' ?> pt3 pb5">
            <div class="wrap">
                <div class="row center-xs">
                    <div class="col-xs-12 col-sm-9 col-md-6">
                        <h2 class="t6 w600 ff2 mb2 tcv"><?php echo md_sub_field('titulo'); ?></h2>
                        <p class="t3 lh1-25 mb5 <?php echo $i%2 ? 'tcp' : 'tcb' ?>"><?php echo md_sub_field('descricao'); ?></p>
                    </div>
                </div>
                <section class="row center-xs ">
                    <?php if($colab = get_sub_field('colaboradores')): foreach($colab as $post): setup_postdata($post); ?>
                        <article class="col-xs-12 col-sm-4 col-md-3 mb2 mb3-md">
                            <?php get_template_part('block-colaborador'); ?>
                        </article>
                    <?php endforeach; endif; wp_reset_postdata(); ?>
                </section>
            </div>
        </article>
        <?php if($colab = get_sub_field('colaboradores')): foreach($colab as $post): setup_postdata($post); ?>
                <?php get_template_part('modal-colaborador'); ?>
        <?php endforeach; endif; wp_reset_postdata(); ?>
        <?php endwhile; ?>
       
       <!-- Associados -->
       <article class="container-fluid bg-roxo  pt5 pb5">
           <div class="wrap">
               <div class="row center-xs">
                   <div class="col-xs-12 col-sm-9 col-md-6">
                       <h2 class="t6 w600 ff2 mb2 tcv">Associados</h2>
                   </div>
               </div>
                <section class="mb3 mb5-sm t3 w400 mb05 lh1-50 tcb" style="column-width: 250px;">
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
                           <button class="btn btn-verde">Quero me associar</button>
                        </a>
                    </div>
               </section>
           </div>
       </article>

        <?php get_template_part('block-prestacao'); ?>
    </main>
<?php get_footer(); ?>