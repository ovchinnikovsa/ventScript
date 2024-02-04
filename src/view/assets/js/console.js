const terminal = document.getElementById('terminal');
const input = document.getElementById('input');

input.addEventListener('keydown', function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        const command = input.value;
        executeCommand(command);
        input.value = "";
    }
});

function executeCommand(command) {
    const output = document.createElement('div');
    output.textContent = "> " + command;
    terminal.appendChild(output);


    if (command.toLowerCase() === "echo") {
        const result = document.createElement('div');
        result.textContent = "Hello, World!";
        terminal.appendChild(result);
    } else {
        const result = document.createElement('div');
        result.textContent = "Команда не распознана.";
        terminal.appendChild(result);
    }

    terminal.scrollTop = terminal.scrollHeight;
}