<!-- Представление "form_item_id2.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo '<div class="container-fluid" style="margin: 20px 0;">';
    echo '<h3 class="text-center">' . $title . '</h3><hr/>';

    $data['class'] = 'form-horizontal';
    echo form_open('home/getItemInfo2', $data);
    
    echo '<div class="col-md-offset-4 row" style="margin-bottom: 30px;">';
    echo form_label('Выберите товар: ', 'itemid', array('class'=>'control-label row-item', 'style' => 'margin: 10px;'));
    echo '<select name="itemid" class="row-item" style="margin-right: 20px;">';

    foreach($list as $l)
    {
        echo '<option value=' . $l['id'] . '>';
        echo $l['itemname'];
        echo '</option>';
    }

    echo '</select>';
    echo form_submit(array('name'=>'send', 'value'=>'Найти', 'class'=>'btn btn-success'));
    echo '</div>';
    echo form_close();
    echo '</div>';

    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>