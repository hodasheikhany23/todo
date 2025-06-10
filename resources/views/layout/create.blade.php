@extends('master.master')
@section('content')
<div class="card p-4 border-0" style="width: 350px; flex-shrink: 0;">
    <h5 class="text-center mb-4 text-small">نرم افزار مدیریت کارها</h5>
    <div class="input-group mb-3 d-flex flex-row justify-content-center">
        <form method="post" action="@if(isset($task)) {{url('/todo/')}} @else {{route('store')}} @endif">
            @csrf
            @if($msg!='')
                <div class="alert bg-success">{{$msg}}</div>
            @endif
            <input
                type="text"
                id="new-task"
                name="title"
                class="form-control me-3"
                placeholder="عنوان"
                aria-label="کار جدید"
            />
                @error('title')
                <div class="alert">{{$message}}</div>
                @enderror
            <input
                type="text"
                id="new-task"
                name="date"
                class="form-control me-3 mt-2"
                placeholder="تاریخ تحویل"
            />
            @error('deadline')
            <div class="alert">{{$message}}</div>
            @enderror
            <div class="form-group mt-2">
                  <textarea name="text" placeholder="توضیحات" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            @error('description')
            <div class="alert">{{$message}}</div>
            @enderror
            <button class="btn btn-primary mt-3" id="add-task-btn">افزودن</button>
        </form>

    </div>
</div>
@endsection
