<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lessons;
use App\Level;
use App\Classes;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nextClass=null;
        $student = User::students()->where ('id',52)->get()->first();

        $noActualLevel = $student->level;

       
        $level = Level::where('id',$noActualLevel)->get('level')->first();

        $lessons = Lessons::where('level_id',$noActualLevel)->get();  

        for ($i=count($lessons); $i >= 1; --$i){
            $classes = Classes::where('student_id',52)
            ->where('level_id',$noActualLevel )
            ->where('lesson_id',$i)
            ->get()->first();  
            if ($classes['status'] == 0){
                $nextClass=$i;
            }
        }

        $classes = Classes::where('student_id',52)
        ->where('level_id',$noActualLevel )
        ->get();  
        //dd($classes);



        return view('tasks.tasksList', compact('student','classes','level','lessons','nextClass'));
        //return view('tasks.task');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      

        $filename =null;
        if($request->file('file')){
            $file = $request->file;
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/',$filename);
            //$data->file=$filename;
            //dd($filename);
        }

       
        Classes::updateOrCreate(
            [
                'student_id'=> $request->input('studentId'),
                'level_id' => $request->input('levelId'),
                'lesson_id' => $request->input('lessonId')
            ], [
            'url_homework' => $request->input('observation'),
            'file_homework' => $filename,
            'status_homework' => 1
            ]
        );

        $notification = "El tarea se subio correctamente.";
        return redirect()->back()->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


    
    public function viewTask (Request $request,  $file) {

       // dd($file);

       $student = User::students()->where ('id',52)->get()->first();
       $level = Level::where('id',$student->level)->get()->first();
       $lessons = Lessons::where('file_homework',$file)->get()->first();  

       //dd($lessons);

        return view('tasks.task', compact('file','student','level','lessons'));
    }

}
