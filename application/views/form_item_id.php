<!-- Представление "form_item_id.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo '<div class="container-fluid" style="margin: 20px 0;">';
    echo '<h3 class="text-center">' . $title . '</h3><hr/>';

    $data['class'] = 'form-horizontal';
    $data['accept-charset'] = 'utf8';

    echo form_open('home/getItemInfo', $data);
    echo '<div class="col-md-offset-4 row">';
    echo form_label('Укажите Id товара: ', 'itemid', array('class'=>'control-label row-item', 'style' => 'margin: 10px;'));
    $inp = array('name' => 'itemid', 'class' => 'row-item', 'style' => 'color: green; margin: 20px 10px 40px;', 'placeholder' => 'Id товара', 'type' => 'text');
    echo form_input($inp);
    echo form_submit(array('name' => 'send', 'value' => 'Найти', 'class' => 'btn btn-sm btn-success row item', 'style' => 'margin: 18px;'));
    echo '</div>';
    echo form_close();
    echo '</div>';

    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>