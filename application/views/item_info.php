<!-- Представление "item_info.php" -->
<?php
    // Подключаем верхнюю часть сайта - представление "header.php"
    $this->load->view('header');

    // Основная часть страницы
    echo "<div class='container-fluid'>";
    echo '<h2>'. $description . '</h2>';
    echo '<h3>' . $item[0]['itemname'] . '</h3>';
    echo '<p>' . $item[0]['pricein'] . '</p>';
    echo '<p style="color: red; font-size: 14pt; font-family: Verdana;">' . $item[0]['pricesale'] . '</p>';
    echo '<p>' . $item[0]['info'] . '</p>';
    echo "</div>";
    
    // Подключаем нижнюю часть сайта - представление "footer.php"
    $this->load->view('footer');
?>