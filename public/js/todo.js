document.querySelector('#sendTodo').addEventListener('submit', function(event) {
    
    event.preventDefault();
    
    var formData = new FormData(document.querySelector('#sendTodo'));
    var iserror = false;
    
    if(formData.get("text") == null || formData.get("text") == "") {
        document.getElementById("textErrorMessage").innerText = "※テキストを入力してください";
        iserror = true;
    }

    if(formData.get("priority") == null || formData.get("priority") == "") {
        document.getElementById("priorityErrorMessage").innerText = "※優先度を決めてください";
        iserror = true;
    }

    if(iserror) return;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/save-todo', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

    xhr.onload = function(e) {
        isXhr(xhr, e);
    };

    xhr.send(formData);
    
});
addEvent();
function addEvent() {
    document.querySelectorAll(".delete").forEach(del => {
        del.addEventListener("click", (e) => {
            var id = e.target.getAttribute("data-id");
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/delete-todo?id=' + id, true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    
            xhr.onload = function(e) {
                isXhr(xhr, e);
            };
    
            xhr.send();
        });
    });
}

function isXhr(xhr, e) {

    if (xhr.status === 200) {

        const json = JSON.parse(e.target.response);
        console.log(json);
        var todoList = document.getElementById("todoList");

        const lists = document.getElementsByClassName("lists");
        Array.from(lists).forEach(tr => {
            tr.remove();
        });

        json.forEach(todo => {
            todoList.insertAdjacentHTML("beforeend", `<tr class="lists"><td>${todo.id}</td><td>${todo.text}</td><td>${todo.priority}</td><td><input type="button" name="deleteButton" value="削除" class="delete" data-id="${todo.id}"></td></tr>`);
        });
        addEvent();

        document.getElementById("textErrorMessage").innerText = "";
        document.getElementById("priorityErrorMessage").innerText = "";
        document.querySelector('#sendTodo').reset();

    } else {

        alert('データの保存に失敗しました。');

    }

}