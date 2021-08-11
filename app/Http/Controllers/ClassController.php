<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lessons;
use App\Classes;
use App\Level;
use App\Appointment;

use CArbon\Carbon;

//https://carbon.nesbot.com/docs/#api-week

use App\Exports\PrevMonthClassesAll;
use App\Exports\PrevWeekClassesAll;
use App\Exports\WeekClassesAll;
use App\Exports\PostMonthClassesAll;
use App\Exports\PostWeekClassesAll;
use Maatwebsite\Excel\Facades\Excel;

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
        $student = User::students()->where ('id',61)->get('level')->first();
        $noActualLevel = $student['level'];

        $lessons = Lessons::where('level_id',$noActualLevel)->get();  

        for ($i=count($lessons); $i >= 1; --$i){

            $classes = Classes::where('student_id',61)
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
                'student_id'=> 61,
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

    public function todayClassList(Request $request, $dayNumber)
    {
        //dd( $dayNumber);

        //$dayNumber = -2;

        $now  = Carbon::today();
        //$now  = $now->subDays(5);
        //$now  = $now->addDays(1);

        if($dayNumber == -2){
            /*
            $now->subMonth();

            $appointments = Appointment::join('users', 'appointments.teacher_id', '=', 'users.id')
            ->Join('levels', 'appointments.level_id', '=', 'levels.id')
            ->where('role', '=', 'teacher')
            ->whereBetween('date',[$now->startOfMonth()->format('Y-m-d'), $now->endOfMonth()->format('Y-m-d')])
            ->select('users.name','users.last_name','users.phone',//,'users.email'
                    'appointments.student_name','levels.level', 'levels.course','appointments.parent_name','appointments.parent_phone',
                    'appointments.time_start',
                    'appointments.type','appointments.status_appointment')->get();*/
            
            return Excel::download(new PrevMonthClassesAll, 'PrevMonthClassesAll.xlsx');

        } elseif($dayNumber == -1){
            /*
            $now->subWeek();

            //dd($now->startOfWeek()->format('Y-m-d H:i'));   
            //dd($now->endOfWeek()->format('Y-m-d H:i'));

            $appointments = Appointment::join('users', 'appointments.teacher_id', '=', 'users.id')
            ->Join('levels', 'appointments.level_id', '=', 'levels.id')
            ->where('role', '=', 'teacher')
            ->whereBetween('date',[$now->startOfWeek()->format('Y-m-d'), $now->endOfWeek()->format('Y-m-d')])
            ->select('users.name','users.last_name','users.phone',//,'users.email'
                    'appointments.student_name','levels.level', 'levels.course','appointments.parent_name','appointments.parent_phone',
                    'appointments.time_start',
                    'appointments.type','appointments.status_appointment')->get();*/

            return Excel::download(new PrevWeekClassesAll, 'PrevWeekClassesAll.xlsx');

        } elseif($dayNumber == 0){
            /*
            //$now->subWeek();

            //dd($now->startOfWeek()->format('Y-m-d H:i'));   
            //dd($now->endOfWeek()->format('Y-m-d H:i'));

            $appointments = Appointment::join('users', 'appointments.teacher_id', '=', 'users.id')
            ->Join('levels', 'appointments.level_id', '=', 'levels.id')
            ->where('role', '=', 'teacher')
            ->whereBetween('date',[$now->startOfWeek()->format('Y-m-d'), $now->endOfWeek()->format('Y-m-d')])
            ->select('users.name','users.last_name','users.phone',//,'users.email'
                    'appointments.student_name','levels.level', 'levels.course','appointments.parent_name','appointments.parent_phone',
                    'appointments.time_start',
                    'appointments.type','appointments.status_appointment')->get();*/
            
            return Excel::download(new WeekClassesAll, 'WeekClassesAll.xlsx');

        } elseif($dayNumber == 8){
            /*$now->addWeek();

            $appointments = Appointment::join('users', 'appointments.teacher_id', '=', 'users.id')
            ->Join('levels', 'appointments.level_id', '=', 'levels.id')
            ->where('role', '=', 'teacher')
            ->whereBetween('date',[$now->startOfWeek()->format('Y-m-d'), $now->endOfWeek()->format('Y-m-d')])
            ->select('users.name','users.last_name','users.phone',//,'users.email'
                    'appointments.student_name','levels.level', 'levels.course','appointments.parent_name','appointments.parent_phone',
                    'appointments.time_start',
                    'appointments.type','appointments.status_appointment')->get();*/

            return Excel::download(new PostWeekClassesAll, 'PostWeekClassesAll.xlsx');

        } elseif($dayNumber == 9){
            /*$now->addMonth();

            $appointments = Appointment::join('users', 'appointments.teacher_id', '=', 'users.id')
            ->Join('levels', 'appointments.level_id', '=', 'levels.id')
            ->where('role', '=', 'teacher')
            ->whereBetween('date',[$now->startOfMonth()->format('Y-m-d'), $now->endOfMonth()->format('Y-m-d')])
            ->select('users.name','users.last_name','users.phone',//,'users.email'
                    'appointments.student_name','levels.level', 'levels.course','appointments.parent_name','appointments.parent_phone',
                    'appointments.time_start',
                    'appointments.type','appointments.status_appointment')->get();*/

            return Excel::download(new PostMonthClassesAll, 'PostMonthClassesAll.xlsx');
        } else {
           
            for ($i=6; $i > 0; $i--){
                if ($now->dayOfWeek == $i && $dayNumber == 1){
                    if ($now->dayOfWeek == $i)
                    $now->subDays($i-1);
                }  
                if ($now->dayOfWeek == $i && $dayNumber == 2){
                    if ($now->dayOfWeek == $i)
                    $now->subDays($i-2);
                }
                if ($now->dayOfWeek == $i && $dayNumber == 3){
                    if ($now->dayOfWeek == $i)
                    $now->subDays($i-3);
                }
                if ($now->dayOfWeek == $i && $dayNumber == 4){
                    if ($now->dayOfWeek == $i)
                    $now->subDays($i-4);
                }
                if ($now->dayOfWeek == $i && $dayNumber == 5){
                    if ($now->dayOfWeek == $i)
                    $now->subDays($i-5);
                }
                if ($now->dayOfWeek == $i && $dayNumber == 6){
                    if ($now->dayOfWeek == $i)
                    $now->subDays($i-6);
                }
                if ($now->dayOfWeek == 0 && $dayNumber == 1){ 
                    $now->subDays(6);
                }
                if ($now->dayOfWeek == 0 && $dayNumber == 2){
                    $now->subDays(5);
                } 
                if ($now->dayOfWeek == 0 && $dayNumber == 3){
                    $now->subDays(4);
                } 
                if ($now->dayOfWeek == 0 && $dayNumber == 4){
                    $now->subDays(3);
                } 
                if ($now->dayOfWeek == 0 && $dayNumber == 5){
                    $now->subDays(2);
                } 
                if ($now->dayOfWeek == 0 && $dayNumber == 6){
                    $now->subDays(1);
                } 
            }

            $appointments = Appointment::join('users', 'appointments.teacher_id', '=', 'users.id')
            ->Join('levels', 'appointments.level_id', '=', 'levels.id')
            ->where('role', '=', 'teacher')
            ->whereDay('date', $now->day)
            ->select('users.name','users.last_name','users.phone',//,'users.email'
                    // \DB::raw('(CASE WHEN users.level ="1" THEN "BASICO" WHEN users.level = "2" THEN "MEDIO" ELSE "AVANZADO" END) as level'),
                    // \DB::raw('(CASE WHEN users.status ="1" THEN "PRUEBA" WHEN users.status = "2" THEN "ACTIVO" ELSE "INACTIVO" END) as estatus'),
                    'appointments.student_name','levels.level', 'levels.course','appointments.parent_name','appointments.parent_phone',
                    'appointments.time_start',
                    'appointments.type','appointments.status_appointment')->get();

            return view('class.classesList', compact('appointments','dayNumber'));

        }
        
        //dd($appointments);

        
    }
}
