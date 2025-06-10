@extends('master.master')
@section('content')
    <div class="card p-5 border-0 rounded" style="flex-grow: 1; max-width: 700px;">
        <h5 class="mb-4 text-center">لیست کارها</h5>
        @if($msg != '')
            <div class="alert bg-success">{{$msg}}</div>
        @endif
        <table class="table table-striped table-bordered rounded text-center align-middle rounded" style="border-radius: 24px !important;">
            <thead class="table">
            <tr>
                <th>ردیف</th>
                <th>عنوان تسک</th>
                <th>توضیحات </th>
                <th>وضعیت</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{$todo->id}}</td>
                    <td>{{$todo->title}}</td>
                    <td class="text-black-50 text-sm" style="font-size: 12px !important;">{{$todo->description}}</td>
                    <td>
                        @if($todo->completed == 0)
                           <span class="badge bg-warning text-dark">
                               درجریان
                        @elseif($todo->completed == 1)
                           <span class="badge bg-success">
                               تکمیل شده
                        @endif
                        </span>
                    </td>
                    <td>{{verta($todo->deadline)-> format('Y/m/d')}}</td>
                    <td>
                        @if($todo->completed==0)
                            <form class="d-inline" method="post" action="{{ url('/todo/' . $todo->id . '/completed') }}">
                                @csrf
                            <button class="btn btn-success btn-sm" type="submit"> <i class="bi bi-check2-square"></i> </button>
                            </form>
                        @endif
                        <a class="btn btn-primary btn-sm" href="{{ route('todo.edit', ['todo' => $todo->id]) }}"><i class="bi bi-pencil-square"></i></a>
                        <form class="d-inline" method="post" action="{{route('todo.destroy', ['todo'=>$todo->id])}}" >
                            @csrf
                            @if(isset($todo))
                                @method('delete')
                            @endif
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
