<!-- Представление "catalog.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo '<div class="container-fluid" style="margin: 20px 0;">';
    echo '<h3 class="text-center">' . $title . '</h3><hr/>';

    echo '<div class="row container-fluid">';
    $data['class'] = 'form-horizontal';
    echo form_open('home/getCatalog', $data);
    
    echo '<div class="row-item pull-right">';
    echo form_submit(array('name' => 'send', 'value' => 'Применить', 'class' => 'btn btn-sm btn-success row item', 'style' => 'margin: 7px;'));
    echo '</div>';
    
    echo '<div class="row-item pull-right">';
    echo '<select name="category" style="margin: 10px;">';
    echo '<option value="0" selected>Фильтрация по категории...</option>';
    
    foreach($categories as $category)
    {
        echo '<option value=' . $category['id'] . '>';
        echo $category['category'];
        echo '</option>';
    }

    echo '</select>';
    echo '</div>';

    echo '<div class="row-item pull-right">';
    echo '<select name="price" style="margin: 10px;">';
    echo '<option value="0" selected>Фильтрация по цене...</option>';
    echo '<option value="1">От дешевых к дорогим</option>';
    echo '<option value="2">От дорогих к дешевым</option>';
    echo '</select>';
    echo '</div>';

    if(isset($info))
    {
        echo '<div class="row-item pull-left">';
        echo $info;
        echo '</div>';
    }
 
    echo form_close();
    echo '</div>';

    echo '<div class="container-fluid">';

    foreach($items as $item)
    {
        echo '<div class="col-sm-3 col-md-3 col-lg-3 container" style="max-height: 320px; padding: 2px; border: 2px solid #999; border-radius: 4px; padding: 0">';
		echo '<div class="row" style="margin: 2px; background-color: #ffd2aa;">';
		echo '<span class="pull-left" style="margin-left: 10px; font-weight: bold;">';
        echo $item['itemname'];
        echo '</span>';
		echo '<span class="pull-right" style="margin-right: 10px;">';
		echo $item['rate'] . '&nbsp;rate';
		echo '</span>';
		echo '</div>';
		echo '<div style="height: 100px; padding: 10px;; margin: 2px;" class="row">';
		
		echo '<img src="'. base_url($item['imagepath']). '" style="position: relative; height: 100%;" />';

		echo '<span class="pull-right" style="margin-left: 10px; color: red; font-size: 16pt;">';
		echo '$&nbsp;' . $item['pricesale'];
		echo '</span>';

		echo '</div>';

		echo '<div class="row" style="margin: 2px;">';
		echo '<p class="text-left col-xs-12" style="background-color: lightblue; overflow: auto; height: 60px;">' . $item['info'] . '</p>';
		echo '</div>';
		
		echo '<div class="row" style="margin-top: 2px;">';

		echo '<button class="btn btn-success col-xs-offset-1 col-xs-10" style="margin-bottom: 10px;">Добавить в корзину</button>';
		echo '</div>';
		echo '</div>';
    }

    echo '</div>';
    echo '</div>';

    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>