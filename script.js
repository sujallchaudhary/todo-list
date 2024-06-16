let createUserId = () => {
    if (localStorage.getItem('userId')) {
        return localStorage.getItem('userId');
    } else {
        let newUserId = Math.random().toString(36).substring(7);
        localStorage.setItem('userId', newUserId);
        return newUserId;
    }
};

let userId = createUserId();

document.addEventListener('DOMContentLoaded', () => {
    fetchData(userId);

    let addbtn = document.getElementsByClassName('submit-task')[0];
    addbtn.addEventListener('click', () => {
        let content = document.getElementById('task-input').value;
        if (content.trim() === "") {
            alert("Please enter a task");
            return;
        }
        add(userId, content);
    });

    document.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            addbtn.click();
        }
    });
});

let add = async (userId, content) => {
    let data = {
        method: 'POST',
        body: JSON.stringify({ userId: userId, content: content }),
        headers: {
            'Content-Type': 'application/json'
        }
    };
    let request = await fetch('https://api.sujal.info/todo/add', data);
    document.getElementById('task-input').value = "";
    fetchData(userId);
};

let fetchData = async (userId) => {
    let data = {
        method: 'POST',
        body: JSON.stringify({ userId: userId }),
        headers: {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': 'https://todo.sujal.info'
        }
    };
    let request = await fetch('https://api.sujal.info/todo/fetch', data);
    let response = await request.json();
    let dataFinal = Array.from(response);
    let html = '';
    dataFinal.forEach(tasks => {
        let isDone = tasks.isDone == 1 ? "checked" : "";
        html += `<li class="task-list-item">
                    <label class="task-list-item-label">
                        <input data-id="${tasks.id}" type="checkbox" ${isDone}>
                        <span>${tasks.content}</span>
                    </label>
                    <span class="delete-btn" title="Delete Task" data-id="${tasks.id}"></span>
                </li>`;
    });
    document.getElementById('task-List').innerHTML = html;

    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', (e) => {
            let contentId = e.target.getAttribute('data-id');
            del(userId, contentId);
        });
    });

    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('click', (e) => {
            let contentId = e.target.getAttribute('data-id');
            let isDone = e.target.checked ? 1 : 0;
            done(userId, contentId, isDone);
        });
    });
};

let del = async (userId, contentId) => {
    let data = {
        method: 'POST',
        body: JSON.stringify({ userId: userId, contentId: contentId }),
        headers: {
            'Content-Type': 'application/json'
        }
    };
    let request = await fetch('https://api.sujal.info/todo/delete', data);
    fetchData(userId);
};

let done = async (userId, contentId, isDone) => {
    let data = {
        method: 'POST',
        body: JSON.stringify({ userId: userId, contentId: contentId, isDone: isDone }),
        headers: {
            'Content-Type': 'application/json'
        }
    };
    await fetch('https://api.sujal.info/todo/done', data);
};
