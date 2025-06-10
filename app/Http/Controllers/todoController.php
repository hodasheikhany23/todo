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
    public function index()
    {
        $todos = Todo::all();
        return view('layout.list',['todos'=>$todos]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
