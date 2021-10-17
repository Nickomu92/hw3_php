<!-- Представление "page1.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo '<h3 class="text-center">' . $title . '</h3><hr/>';
    echo '<ul style="margin-bottom: 30px; font-weight: bold; font-size: 12pt;">';
    foreach($categories as $category)
        {
            echo '<li>' . $category['category'] . '</li>';
        }    
    echo '</ul>';

    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>