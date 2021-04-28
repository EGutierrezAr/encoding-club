<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documents;
use App\Level;
use App\Lessons;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$file = Documents::all();
        
        $file = Documents::
                join('Levels', 'Documents.level_id', '=', 'Levels.id')
                ->join('Lessons', 'Documents.lesson_id', '=', 'Lessons.id')
                ->select('Documents.id', 'Lessons.lesson_number', 'Documents.title', 'Documents.description', 'Documents.file', 'Levels.level', 'Levels.course')
                ->get();
        
        //dd($file);

         /*DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.id', 'contacts.phone', 'orders.price')
            ->get();
        */

        $levels = Level::all();
        
        $levelId =null;
        $lessons =null;
        $title = null;

        return view('admin.documents.view',compact('file','levels','lessons','levelId','title'));
    }

    public function indexLevel($levelId)
    {
        
        $file = Documents::
                join('Levels', 'Documents.level_id', '=', 'Levels.id')
                ->join('Lessons', 'Documents.lesson_id', '=', 'Lessons.id')
                ->select('Documents.id', 'Lessons.lesson_number', 'Documents.title', 'Documents.description', 'Documents.file', 'Levels.level', 'Levels.course')
                ->get();


        $levels = Level::all();
        $lessons = Lessons::where('level_id',$levelId)->get();  

        //dd($lessons);
        
        return view('admin.documents.view',compact('file','levels','lessons','levelId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Documents;
        if($request->file('file')){
            $file = $request->file;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/',$filename);
            $data->file=$filename;
        }
        $data->level_id=$request->level;
        $data->lesson_id=$request->class;
        $data->title=$request->title;
        $data->description=$request->description;
        
        //dd($data);
        $data->save();


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = Documents::find($id);

        return view('admin.documents.details',compact('data'));
    }


    public function download($file)
    {
        return response()->download('storage/'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
