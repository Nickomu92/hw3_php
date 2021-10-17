<!-- Представление "form_upload.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo '<div class="container-fluid" style="margin: 20px 0;">';
    echo '<h3 class="text-center">Загрузка изображения</h3><hr/>';

    if(isset($error))
    {
        echo '<div style="color: red;">' . $error . '</div>';
    }

    else if(isset($result))
    {
        echo '<div style="color: green;">' . $result . '</div>';
    }

    $data['class'] = 'form-horizontal';
    echo form_open_multipart('home/selectImages', $data);
    echo '<div class="col-md-offset-4 row">';
    
    echo form_label('Выберите изображение: ', 'image', array('class' => 'control-label row-item', 'style' => 'margin: 10px;'));

    echo form_upload('image', array('class'=>'control-label row-item'));

    echo form_submit(array('name'=>'send', 'value'=>'Загрузить', 'class'=>'btn btn-success row-item', 'style' => 'margin: 10px 10px 30px;'));
    echo '</div>';
    echo form_close();
    echo '</div>';

    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>