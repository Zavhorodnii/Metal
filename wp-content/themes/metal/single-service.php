<?php
    get_header();
?>

    <section class="servise section_pad-top section_mar-bot">
    <div class="container">


        <?php
            if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
        ?>

        <div class="section__row-top">
            <h2 class="title-section"><? echo get_the_title();?></h2>
            <a href="popup-1" class="sectop__link col-fil js-btn-popup">Подписаться на рассылку акций</a>
        </div>

        <div class="wr-treatment">
            <div class="wr-treatment__content">
                <!-- первый абзац задан в стилях жирный-->
                <? the_content(); ?>
            </div>
        </div>

        <div class="wr-row-price">
            <?php

                $tables = get_field('table_block', get_the_ID());
                if($tables)
                    foreach($tables as $table){
                        ?>
                        <h2 class="site-title-3"><?php echo $table['description_before_the_table'] ?></h2>
                        <div class="wr-row-price__col">
                            <?php
                                if(isset($table['tables']))
                                    foreach ($table['tables'] as $columns){
                                    ?>
                                        <div class="wr-row-price__item">
                                            <div class="answers-tabel">
                                                <div class="answers-tabel__top">
                                                    <div class="answers-tabel-row">
                                                        <div class="c-table">
                                                            <span><?php echo $columns['first_table_column_name']; ?></span>
                                                            <?php echo $columns['first_table_column_description']; ?>
                                                        </div>
                                                        <div class="c-table">
                                                            <span><?php echo $columns['second_table_column_name']; ?></span>
                                                            <?php echo $columns['second_table_column_description']; ?>
                                                        </div>
                                                        <div class="c-table">
                                                            <span><?php echo $columns['third_table_column_name']; ?></span>
                                                            <?php echo $columns['third_table_column_description']; ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="answers-tabel__body">

                                                    <?php
                                                        if(isset($columns['table_rows']))
                                                            foreach($columns['table_rows'] as $column){
                                                            ?>
                                                                <div class="answers-tabel-row">
                                                                    <div class="c-table">
                                                                        <span><?php echo $column['first_column_value']; ?></span>
                                                                    </div>
                                                                    <div class="c-table">
                                                                        <span><?php echo $column['second_column_value']; ?></span>
                                                                    </div>
                                                                    <div class="c-table">
                                                                        <span><?php echo $column['third_column_value']; ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                ?>

                        </div>
                        <?php
                    }
            ?>

            <?
                $enumerations = get_field('enumeration_block', get_the_ID());
//                echo '|' . $enumerations . '|';
                if($enumerations)
                    foreach($enumerations as $enumeration){
                        ?>
                        <h2 class="site-title-3"><? echo $enumeration['title_enumeration_block']; ?></h2>
                        <div class="answers-row-infow">
                            <ul class="ul-type-1">
                                <?
                                if(isset($enumeration['enumeration_block']))
                                    foreach($enumeration['enumeration_block'] as $item){
                                        ?>
                                        <li><? echo $item['value']; ?></li>
                                        <?
                                    }
                                ?>
                            </ul>
                        </div>
                        <?
//                    }
                }
            ?>


            <div class="answers-row-btn">
                <div class="wr-treatment__btn">
                    <a href="popup-4" class="btn btn-arrow js-btn-popup">
                        <span>Быстрая заявка на расчет</span>
                        <svg>
                            <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                  transform="matrix(-1 0 0 1 24 0)"></path>
                        </svg>
                    </a>
                    <a href="popup-0" class="btn btn-grad-black btn-arrow js-btn-popup">
                        <span>Перезвоните мне</span>
                        <svg>
                            <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                  transform="matrix(-1 0 0 1 24 0)"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
</section>

<?php
    get_footer();
?>
