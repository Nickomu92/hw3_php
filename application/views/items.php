<!-- Представление "items.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo '<h3 class="text-center">' . $title . '</h3><hr/>';
    echo '<table class="table table-striped">';
    echo '<thead><th>Название товара</th><th>Цена закупки</th><th>Цена продажи</th><th>Описание товара</th></thead>';
    
    foreach($items as $c)
    {
        echo '<tr>';
        echo '<td>' . $c['itemname'] . '</td>';
        echo '<td>' . $c['pricein'] . '</td>';
        echo '<td>' . $c['pricesale'] . '</td>';
        echo '<td>' . $c['info'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';

    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>
