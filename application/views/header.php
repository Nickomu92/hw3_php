<!-- Представление "header.php" -->
<!-- Верхняя часть сайта (шаблон) -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Codeigniter 3</title>
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
            
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand" style="color: red">Niko<span style="color: orange">Mu</span></span>
                </div>
            
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo site_url('home/index'); ?>">Категории</a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('home/itemsList'); ?>">Товары</a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('home/getItemInfo'); ?>">Поиск товара</a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('home/getItemInfo2'); ?>">Выбор товара</a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('home/selectImages'); ?>">Загрузить изображение</a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('home/selectMultipleImages'); ?>">Загрузить изображения</a>
                        </li>

                        <li>
                            <a href="<?php echo site_url('home/registration'); ?>">Регистрация</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo site_url('home/getCatalog'); ?>">Каталог товаров</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
