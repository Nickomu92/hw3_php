<!-- Представление "form_validation.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo '<span style="color: red; margin-left: 20px;">';
    echo validation_errors();
    echo '</span>';

    if(isset($success))
    {
        echo '<span style="color: green; margin-left: 20px;">';
        echo $success;
        echo '</span>';
    }
    
    echo '<h3 class="text-center">Регистрация</h3><hr/>';
    
    $st['class'] = 'form-horizontal';
    $st['style'] = 'margin: 20px;';

    echo form_open('home/registration', $st);

    echo '<div class="row" style="margin: 6px;">';
    echo form_label('Логин: ', 'login', array('class'=>'control-label col-md-4'));
    $data = array('name'=>'login', 'size'=>'50', 'placeholder' => 'user', 'value'=>set_value('login'));
    echo form_input($data);
    echo '</div>';

    echo '<div class="row 1" style="margin: 6px;">';
    echo form_label('Email: ', 'email', array('class' => 'control-label col-md-4'));
    $data = array('name' => 'email', 'type' => 'email', 'size' => '50', 'placeholder' => 'user@gmail.com', 'value' => set_value('email'));
    echo form_input($data);
    echo '</div>';

    echo '<div class="row" style="margin: 6px;">';
    echo form_label('Пароль: ', 'pass1', array('class'=>'control-label col-md-4'));
    $data = array('name'=>'pass1', 'size'=>'50', 'value' => set_value('pass1'));
    echo form_password($data);
    echo '</div>';

    echo '<div class="row" style="margin: 6px;">';
    echo form_label('Подтверждение пароля: ', 'pass2', array('class'=>'control-label col-md-4'));
    $data = array('name'=>'pass2', 'size'=>'50', 'value' => set_value('pass2'));
    echo form_password($data);
    echo '</div>';

    echo '<div class="row" style="margin: 6px;">';
    echo form_submit(array('name'=>'send', 'value'=>'Регистрация', 'class'=>'btn btn-success col-md-offset-5'));
    echo form_reset(array('name'=>'reset', 'value'=>'Сброс', 'class'=>'btn btn-info'));
    echo '</div>';

    echo form_close();

    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>