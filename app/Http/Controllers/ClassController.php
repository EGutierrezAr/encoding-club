<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lessons;
use App\Classes;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actualClass=null;
        $noActualClass=null;
        $student = User::students()->where ('id',52)->get('level')->first();
        $noActualLevel = $student['level'];

        $lessons = Lessons::where('level_id',$noActualLevel)->get();  

        for ($i=count($lessons); $i >= 1; --$i){

            $classes = Classes::where('student_id',52)
            ->where('level_id',$student['level'])
            ->where('lesson_id',$i)
            ->get()->first();  

            if ($classes['status'] == 0){
                $actualClass=$classes;
                $noActualClass=$i;
            }
        }

        return view('class.studentClass', compact('lessons','actualClass','noActualClass','noActualLevel'));
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
        //dd($request->input('noActualClass'));
        
        Classes::updateOrCreate(
            [
                'student_id'=> 52,
                'level_id'=> $request->input('noActualLevel'),
                'lesson_id'=> $request->input('noActualClass')
            ], [
            'status' => 1,
            'score_1' => $request->input('question1'),
            'score_2' => $request->input('question2'),
            'score_3' => $request->input('question3'),
            'score_4' => $request->input('question4'),
            'score_5' => $request->input('question5')
            ]
        );

        $notification = "La clase ha finalizado correctamente.";
        return redirect('/class')->with(compact('notification')); 

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
}
