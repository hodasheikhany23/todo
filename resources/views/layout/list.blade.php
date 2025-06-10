@extends('master.master')
@section('content')
    <div class="card p-5 border-0 rounded" style="flex-grow: 1; max-width: 700px;">
        <h5 class="mb-4 text-center">لیست کارها</h5>
        <table class="table table-striped table-bordered rounded text-center align-middle rounded" style="border-radius: 24px !important;">
            <thead class="table">
            <tr>
                <th>ردیف</th>
                <th>عنوان کار</th>
                <th>وضعیت</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>خرید کردن</td>
                <td><span class="badge bg-warning text-dark">در جریان</span></td>
                <td>1402/03/12</td>
                <td>
                    <button class="btn btn-success btn-sm">انجام شد</button>
                    <button class="btn btn-danger btn-sm">حذف</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>آماده کردن گزارش</td>
                <td><span class="badge bg-danger">تکمیل نشده</span></td>
                <td>1402/03/14</td>
                <td>
                    <button class="btn btn-success btn-sm">انجام شد</button>
                    <button class="btn btn-danger btn-sm">حذف</button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>تماس با مشتری</td>
                <td><span class="badge bg-success">انجام شده</span></td>
                <td>1402/03/10</td>
                <td>
                    <button class="btn btn-secondary btn-sm" disabled>انجام شد</button>
                    <button class="btn btn-danger btn-sm">حذف</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
