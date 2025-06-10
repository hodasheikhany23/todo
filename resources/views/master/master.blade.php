<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>نرم افزار To-Do List</title>
    <!-- لینک بوت استرپ RTL -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: 'Vazir', sans-serif; /* پیشنهاد فونت فارسی زیبای وزیر */
            background-color: #f8f9fa;
            max-width: 1400px;
            margin: auto;
            padding-top: 4rem;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" />
</head>

<body>
<div class="container d-flex justify-content-center align-items-start gap-4 mt-5">
    @yield('content')
</div>

<script>
    const addBtn = document.getElementById('add-task-btn');
    const taskInput = document.getElementById('new-task');
    const taskList = document.getElementById('task-list');

    addBtn.addEventListener('click', () => {
        const taskText = taskInput.value.trim();
        if (!taskText) return alert('لطفا یک کار وارد کنید');

        // ساخت آیتم جدید
        const li = document.createElement('li');
        li.className = 'list-group-item todo-item d-flex justify-content-between align-items-center';

        const span = document.createElement('span');
        span.textContent = taskText;

        const delBtn = document.createElement('button');
        delBtn.className = 'btn btn-danger btn-sm';
        delBtn.textContent = 'حذف';
        delBtn.addEventListener('click', () => li.remove());

        li.appendChild(span);
        li.appendChild(delBtn);

        taskList.appendChild(li);
        taskInput.value = '';
    });

</script>
</body>
</html>
