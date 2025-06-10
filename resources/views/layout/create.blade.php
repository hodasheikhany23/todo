@extends('master.master')
@section('content')
<div class="card p-4 border-0" style="width: 350px; flex-shrink: 0;">
    <h5 class="text-center mb-4 text-small">نرم افزار مدیریت کارها</h5>
    <div class="input-group mb-3 d-flex flex-row justify-content-center">
        <form method="post">
            <input
                type="text"
                id="new-task"
                class="form-control me-3"
                placeholder="عنوان"
                aria-label="کار جدید"
            />
            <input
                type="text"
                id="new-task"
                class="form-control me-3 mt-2"
                placeholder="تاریخ تحویل"
            />
            <div class="form-group mt-2">
                  <textarea placeholder="توضیحات" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button class="btn btn-primary mt-3" id="add-task-btn">افزودن</button>
        </form>

    </div>
</div>
@endsection
