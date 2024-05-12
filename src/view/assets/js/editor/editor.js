let editor = ace.edit("editor");
// editor.session.setMode("ace/mode/text");

document.getElementById('compile-btn').addEventListener('click', function () {
    let editorContent = editor.getSession().getValue();

    const xhr = new XMLHttpRequest();

    xhr.open('POST', '/compile', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText);
        } else {
            console.error('Ошибка при выполнении запроса');
        }
    };

    xhr.onerror = function () {
        console.error('Ошибка при выполнении запроса');
    };

    const jsonData = JSON.stringify({ code: editorContent });
    xhr.send(jsonData);
});