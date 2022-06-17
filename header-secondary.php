<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico"/>
    <title><?php the_title(); ?></title>
    <?php wp_head();?>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <h3 class="title"><a href="/">ATS ELECTRICALS</a></h3>
                </div>
                <div class="col-md-9 col-xs-12">
                <?php
                    wp_nav_menu(
                        array(
                            'theme-location' => 'top_bar',
                            'menu_class' => 'top_bar',
                        )
                    )
                ?>
                </div>
            </div>
        </div>
    </header>