<?php
/**
 * Template Name: page_delivery
 */
get_header();
?>

    <section class="servise section_pad-top section_mar-bot">
        <div class="container">

            <?php
            if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
            ?>

            <div class="section__row-top">
                <h2 class="title-section"><?php echo get_the_title(); ?></h2>
                <a href="popup-1" class="sectop__link col-fil js-btn-popup">Подписаться на рассылку акций</a>
            </div>

            <div class="wr-dever">
                <h2 class="site-title-3"><?php echo get_field('table_of_contents_of_blocks') ?></h2>

                <?
                    $field = get_field('block_delivery');
                    if($field)
                        foreach($field as $item){
                        ?>

                        <div class="content-site__item-form">

                            <h3 class="site-title-3 dop--icon">
                                <svg class="svg-icon">
                                    <use xlink:href="
                                    <?
                                        switch ($item['icon']){
                                            case 'pickup':
                                                echo '#icon-car';
                                                break;
                                            case 'courier':
                                                echo '#icon-bus';
                                                break;
                                            case 'region':
                                                echo '#icon-maps';
                                                break;
                                            default:
                                                echo '';
                                        }
                                    ?>
                                    "></use>
                                </svg>
                                <span><? echo $item['title']; ?></span>
                            </h3>
                            <?
                            if($item['second_title']){
                                ?>
                                    <p class="answers__item--text answers__item--text_dop"><? echo $item['second_title']; ?></p>
                                <?
                            }
                            ?>
                            <?
                            if($item['green_field']){
                                ?>
                                    <p class="work-day"><? echo $item['green_field']; ?></p>
                                <?
                            }
                            if ($item['description']){
                            ?>
                                <ul class="ul-type-8" >
                                    <? echo $item['description'] ?>
                                </ul>
                            <?}?>
                        </div>
                        <?
                    }
                ?>
            </div>

        </div>
    </section>

<?php
get_footer();
?>