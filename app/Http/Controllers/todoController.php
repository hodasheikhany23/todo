<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Termwind\parse;

class todoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($msg='')
    {
        $todos = Todo::all();
        return view('layout.list',['todos'=>$todos,'msg'=>$msg]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($msg='')
    {
        return view('layout.create',['msg'=>$msg]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>['required','min:3','max:255'],
            'description'=>['string'],
        ]);
        try {
            $v = Verta::parse($request->input('date'));
            $date = $v->datetime();

            $todo = new Todo();
            $todo -> title = $request->input('title');
            $todo -> description = $request->input('text');
            $todo -> deadline = $date->format('Y-m-d');;
            $todo->save();
            return $this->create('تسک جدید با موفقیت افزوده شد');
        }
        catch (\Exception $e) {
            Log::channel('errors')->error('خطا در ذخیره تسک'.$e->getLine(),$e->getCode());
            return $this->create('001: خطا در ذخیره تسک');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $msg='')
    {
        $todo  = Todo::findOrFail($id);
        return view('layout.create', ['todo' => $todo, 'msg' => $msg]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title'=>['required','min:3','max:255'],
            'description'=>['string'],
        ]);
        $todo = Todo::findOrFail($id);
        try {
            $v = Verta::parse($request->input('date'));
            $date = $v->datetime();

            $todo -> title = $request->input('title');
            $todo -> description = $request->input('text');
            $todo -> deadline = $date->format('Y-m-d');;
            $todo->save();
            return $this->edit($id,'تسک  با موفقیت ویرایش شد');
        }
        catch (\Exception $e) {
            Log::channel('errors')->error('خطا در ذخیره تسک'.$e->getLine(),$e->getCode());
            return $this->edit($id,'001: خطا در ویرایش تسک');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        try {
            Todo::destroy($id);
            return $this->index('تسک مورد نظر حذف شد');
        }
        catch (\Exception $e) {
            Log::channel('errors')->error('خطا در حذف تسک'.$e->getLine(),$e->getCode());
            return $this->index('خطا در حذف');
        }
    }
    public function complete($id)
    {
       $todo = Todo::findOrFail($id);
        try {
            $todo -> completed = '1';
            $todo->save();
            return $this->index('تسک  با موفقیت کامل شد');
        }
        catch (\Exception $e) {
            Log::channel('errors')->error('خطا در انجام تسک'.$e->getLine(),$e->getCode());
            return $this->index('001: خطا در انجام تسک');
        }
    }
}
