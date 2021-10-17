<!-- Представление "form_upload_multiple.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo '<div class="container-fluid" style="margin: 20px 0;">';
    echo '<h3 class="text-center">Загрузка нескольких изображений</h3><hr/>';

    if(isset($error))
    {
        echo '<div style="color: red;">';
        echo '<ul>';

        foreach($error as $item => $value)
        {
            echo '<li>' . $item . ' : ' . $value . '</li>';
        }

        echo '</ul>';
        echo '</div>';
    }

    if(isset($success))
    {
        echo '<div style="color: green;">';
        echo '<ul>';

        foreach ($success as $item => $value)
        {
            echo '<li>' . $item . ' : ' . $value . '</li>';
        }

        echo '</ul>';
        echo '</div>';
    }

    $data['class'] = 'form-horizontal';
    echo form_open_multipart('home/selectMultipleImages', $data);

    echo '<div class="col-md-offset-4">';
    echo form_label('Выберите изображения: ', 'image', array('class'=>'control-label', 'style' => 'margin: 10px;'));
    echo form_upload('upfile[]', '', 'multiple');
    echo form_submit(array('name'=>'send', 'value'=>'Загрузить', 'class'=>'btn btn-success', 'style' => 'margin: 10px 10px 30px;'));
    echo '</div>';
    echo form_close();
    echo '</div>';

    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>