<?php
/**
 * Template Name: equipment
 *
 */
get_header(); ?>

<section class="section-equipment section_pad-top section_mar-bot">
    <div class="container">

        <?php
        if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
        ?>

        <div class="section__row-top">
            <h2 class="title-section"><? echo get_field('title_page'); ?></h2>
            <a href="<? echo get_field('link_page') ;?>" class="sectop__link"><? echo get_field('description_link') ;?></a>
        </div>



        <div class="section__tabs">
            <?php
                $terms = get_terms( [
                    'taxonomy' => 'equipment',
                    'hide_empty' => false,
                ] );
                $index = 0;
                foreach ($terms as $term){
                    ?>
                    <a href="#" class="section__tabs_tab js-change-class <?php echo $index === 0 ? 'active js-select-title' : '';?> " data-change_active="<?php echo $term->term_id ?>"><?php echo $term->name?></a>
                    <?php
                    $index++;
                }
            ?>
        </div>

        <div class="section__tabs-mob">
            <div class="select-site js-select-site">
                <div class="select-site__main js-main-sel" data-value="-1">
                    <span class="js-select-main">Выбрать категорию</span>
                    <i class="select-icons icon-arrow-grey">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g fill-rule="evenodd">

                                <path  d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z" transform="matrix(-1 0 0 1 24 0)"/>
                            </g>
                        </svg>
                    </i>
                </div>
                <div class="select-site__lisp js-select-lisp">
                    <?php
                        foreach ($terms as $term){
                            ?>
                            <a href="#" class="select-site__option js-select-option js-change-class " data-change_active="<?php echo $term->term_id ?>"><?php echo $term->name?></a>
                            <?php

                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="section-equipment__wrapp">

        </div>

    </div>

    </div>
    </div>

</section>

<?php

get_footer();
?>
