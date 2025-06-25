<?php
// Папка куда будем сохранять файлы
$target_dir = 'uploads/';

// Полное имя загружаемого файла
$file_name = basename($_FILES["uploaded_file"]["name"]);

// Путь к файлу внутри сервера
$target_file = $target_dir . $file_name;

// Переменная для хранения ошибок
$upload_error = '';

// Проверяем тип файла (если надо)
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
$file_type = pathinfo($file_name, PATHINFO_EXTENSION);
if (!in_array(strtolower($file_type), $allowed_types)) {
    $upload_error .= "Тип файла недопустим.<br>";
}

// Если ошибка отсутствует, пытаемся загрузить файл
if ($upload_error === '') {
    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_file)) {
        echo "<p style='color: green'>Файл успешно загружен!</p>";
    } else {
        echo "<p style='color: red'>Ошибка при загрузке файла.</p>";
    }
} else {
    echo "<p style='color: red'>" . $upload_error . "</p>";
}
?>
<a href="index.html">Вернуться назад</a>