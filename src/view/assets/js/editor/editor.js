let editor = ace.edit("editor");
// editor.session.setMode("ace/mode/text");

document.getElementById('compile-btn').addEventListener('click', function () {
    let editorContent = editor.getSession().getValue();
    // editorContent = JSON.stringify(editorContent);
    // Создаем объект XMLHttpRequest
    const xhr = new XMLHttpRequest();

    // Настраиваем запрос
    xhr.open('POST', '/handlers/ajax/compile.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Назначаем обработчик события успешного завершения запроса
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText);
            // Здесь вы можете обработать ответ от сервера после компиляции
        } else {
            console.error('Ошибка при выполнении запроса');
        }
    };

    // Назначаем обработчик события ошибки
    xhr.onerror = function () {
        console.error('Ошибка при выполнении запроса');
    };

    // Отправляем запрос с содержимым редактора
    xhr.send('code=' + encodeURIComponent(editorContent));
});