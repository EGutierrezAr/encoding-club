<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ScheduleServiceInterface;
use App\User;
use App\WorkDay;
use App\Appointment;
use Illuminate\Support\Arr; 

use Carbon\Carbon;

class StudentController extends Controller
{
    private $days = [
		'Lunes','Martes','Miércoles',
		'Jueves','Viernes','Sábado','Domingo'
	];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$students = User::all(); //ALL
        $students = User::students()->paginate(5); 
        //dd($students);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    private function performValidation(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => 'required|min:3',
            /*'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:3',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'level' => 'nullable|min:3',
            'status' => 'nullable|min:3',
            'observation' => 'nullable|min:3',*/
        ];
        /*
        $messages = [
            'name.min' => 'Como mínimo el nombre del estudiante debe tener al menos 3 caracteres',
        ];*/

        //return back()->with(compact('notification'));
       
        $this->validate($request, $rules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => 'required|min:3',
            /*'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:3',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'level' => 'nullable|min:3',
            'status' => 'nullable|min:3',
            'observation' => 'nullable|min:3',*/
        ];

        $this->validate($request, $rules);

        $password = $request->input('password');
        $user = User::create(
            $request->only('name','email','password','last_name','phone','address','city','level','status','observation')
            + [
                'role' => 'student',
                'password' => bcrypt($password),
            ]
        );

        appointment::updateOrCreate(
            [
                'parent_email'=> $request->input('email')
            ], [
            'student_id' => $user->id,
            'type' => 'prueba'
            ]
        );

        $notification = "El estudiate se ha registrado correctamente.";
        return redirect('/students')->with(compact('notification')); 

        /*
        //dd($request->all());
        $student =new User();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        //$student->name() = $request->input('name');
        $student->password = $request->input('password');
        $student->last_name = $request->input('last_name');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->level = $request->input('level');
        $student->role = $request->input('role');
        $student->status = $request->input('status');
        $student->observation = $request->input('observation');

        //$student->save();  //Eso es una forma de hacerlo pero menos segura */

        
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
    public function edit(User $student)
    {
        //dd("entre");
        return view('students.edit', compact('student'));
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
    
        $rules = [
            'name' => 'required|min:3',
            /*'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:3',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'level' => 'nullable|min:3',
            'status' => 'nullable|min:3',
            'observation' => 'nullable|min:3',*/
        ];

        $this->validate($request, $rules);

        $user = User::students()->findOrFail($id);

        $data = $request->only('name','email','password','last_name','phone','address','city','level','status','observation');

        $user->fill($data);
        $user->save();  //UPDATE

        $notification = "El estudiate se ha registrado correctamente.";
        return redirect('/students')->with(compact('notification')); 

        /*
        $student->name = $request->input('name');
        //$student->email = $request->input('email');
        //$student->password = $request->input('password');
        $student->last_name = $request->input('last_name');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->level = $request->input('level');
        $student->role = $request->input('role');
        $student->status = $request->input('status');
        $student->observation = $request->input('observation');
        $student->save();

        $notification = "El estudiate se ha actualizado correctamente.";
        return redirect('/students')->with(compact('notification')); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $deleteStudent = $student->name;
        $student->delete();

        $notification = "El estudiate $deleteStudent se ha eliminado correctamente.";
        return redirect('/students')->with(compact('notification'));
    }

    public function editSchedule($id)
    {
    	$workDays = workDay::where('user_id', $id)->get();

        if (count($workDays) > 0){
            $workDays ->map(function ($workDay){
                $workDay->morning_start = (new Carbon($workDay->morning_start))->format('g:i A');
                $workDay->morning_end = (new Carbon($workDay->morning_end))->format('g:i A');
                $workDay->afternoon_start = (new Carbon($workDay->afternoon_start))->format('g:i A');
                $workDay->afternoon_end = (new Carbon($workDay->afternoon_end))->format('g:i A');
                return $workDay;
            });
        } else {
            $workDays = collect();
            for ($i=0; $i<7; ++$i) 
                $workDays->push(new workDay()); 
            
        }

    	//dd($workDays->toArray());
    	
    	//dd($workDays->toArray());
    	$days = $this->days;

        $nameUser = User::students()->findOrFail($id)->name;
	
    	return view('students/schedule', compact('workDays','days', 'nameUser', 'id')); 
    }

    public function storeSchedule(Request $request, $id, ScheduleServiceInterface $scheduleService)
    {

    	$active = $request ->input('active') ?: [];
    	$morning_start = $request ->input('morning_start');
    	$morning_end = $request ->input('morning_end');
    	$afternoon_start = $request ->input('afternoon_start');
    	$afternoon_end = $request ->input('afternoon_end');

    	$errors = [];

        $student = User::students()->findOrFail($id);

        if ($student->status != '1')
            $this->deleteAppoitmentByChange ($id);


    	for($i=0; $i<7; ++$i) {
    		if ($morning_start[$i] > $morning_end[$i]) {
    			$errors [] = 'Las horas del turno mañana son inconsistentes para el día '.$this->days[$i].'.';
    		}
			if ( $afternoon_start[$i] != '12:00' && $afternoon_start[$i] != '01:00'){
    		if ($afternoon_start[$i] > $afternoon_end[$i]) {
    			$errors [] = 'Las horas del turno tarde son inconsistentes para el día '.$this->days[$i].'.';
    		}}

	    	WorkDay::updateOrCreate(
	    		[
		   			'day' => $i,
		   			'user_id'=> $id
		   		], [
		            'active' => in_array($i, $active),

		            'morning_start' => $morning_start[$i],
		            'morning_end' =>  $morning_end[$i],

		            'afternoon_start' => $afternoon_start[$i],
		            'afternoon_end' => $afternoon_end[$i]
	        	]
	    	);

            //dd($active);
            if(in_array($i, $active) == 1) {
               
                $start_date = Carbon::today(); 
                $end_date = Carbon::today()->addDays(6);

                for($date = $start_date; $date->lte($end_date); $date->addDay()) { 

/* METER VALIDACIÓN DE CUANTOS DIAS SE CALCULA LA PROXIMA CITA, DEPENDIENDO DE LA DURACIÓN DEL CURSO*/ 

                    $dateCarbon = new Carbon($date);
                    $iday = $dateCarbon->dayOfWeek;
                    $day = ($iday==0 ? 6 : $iday-1);
                 
                    if ($i == $day) {

                        $datesAvailable = $scheduleService->getAvailableIntervals($date->format('Y-m-d'), $id);

                        if (!empty($datesAvailable['morning']) || !empty($datesAvailable['afternoon'])) {
                            foreach( $datesAvailable['morning'] as $tim) {

                                $tmpStart = new Carbon($tim['start']);
                                $tmpEnd = new Carbon($tim['end']);

                                if ($tmpStart != $tmpEnd){
                                    $this->updateOrCreateAppoitment($id,  $student, $date ,$tmpStart, $tmpEnd);
                                }
                            }

                            foreach( $datesAvailable['afternoon'] as $tim) {
                                $tmpStart = new Carbon($tim['start']);
                                $tmpEnd = new Carbon($tim['end']);

                                if ($tmpStart != $tmpEnd){
                                    $this->updateOrCreateAppoitment($id,  $student, $date ,$tmpStart, $tmpEnd);
                                }
                            }
                        }

                    }
                }
                //dd($days);
            }
	    } 
        
	    if(count($errors) > 0)
    		return back()->with(compact('errors'));
    	$notification = 'Los cambios se han guardado correctamente';
    	return back()->with(compact('notification'));
    }

    public function assingTeacher (Request $request, $id, $teacherid, $date, $time) {
//dd($teacherid);
        if ($teacherid == "-1"){
            $error ='No ha seleccionado un profesor';
            return back()->with(compact('error'));
        } else {

            $dateCarbon = new Carbon($date);

            appointment::updateOrCreate(
                [
                'student_id' => $id,
                'date' => $dateCarbon->format('Y-m-d'),
                'time_start' => $time.':00:00',

                ], [
                'teacher_id' => $teacherid
                ]
            );
            
            $notification = 'Se asignado correctamente el profesor ';
            return back()->with(compact('notification'));
        }

    }
    
    private function updateOrCreateAppoitment ($userId, $student, $date, $timeStart, $timeEnd)
    {
        //$student = $user = User::students()->findOrFail($userId);

        if ($student->status == '1'){
            appointment::updateOrCreate(
                [
                    'student_id' => $userId
                ], [
                'date' => $date->format('Y-m-d'),
                'time_start' => $timeStart,
                'time_end' => $timeEnd
                ]
            );
        } else {
            $appoitment = Appointment::where('student_id',$userId)->get();

            appointment::create(
                [
                    'parent_email' => $appoitment[0]->parent_email,
                    'parent_name' => $appoitment[0]->parent_name,
                    'parent_phone' => $appoitment[0]->parent_phone,
                    'student_name' => $student->name." ".$student->last_name,

                    'student_id' => $userId,
                    'date' => $date->format('Y-m-d'),
                    'time_start' => $timeStart,
                    'time_end' => $timeEnd,
                    'status' => 'reservada',
                    'type' => 'pagada'
                ]
            );
        }
    }

    private function deleteAppoitmentByChange ($userId)
    {
        $appoitmentToDelete = Appointment::where('student_id',$userId)
        ->where('type','pagada')
        ->get();

        if (count($appoitmentToDelete) > 0){
            for($i=0; $i < count($appoitmentToDelete); ++$i) 
                Appointment::where('id',$appoitmentToDelete[$i]->id)->delete();
        }
    }

    public function appointment($id, ScheduleServiceInterface $scheduleService)
    {
        
        $studentId = $id;  


        $start_date = Carbon::today(); 
        $end_date = Carbon::today()->addDays(20);

        $teachers=[];
        $teacherNameDisplay=[];

        $datesTime = [];
        $datesTime2 = [];
        $datesTime3 = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()) { 
            $datesAvailable = $scheduleService->getAvailableIntervals($date->format('Y-m-d'), $studentId);

            

            /*if($date->format('Y-m-d') == '2021-04-05'){
              if (!empty($datesAvailable['afternoon'])){
                dd($datesAvailable['afternoon']);
              }
              dd($datesAvailable);
            }*/
            
            

            if (!empty($datesAvailable['morning']) || !empty($datesAvailable['afternoon'])) {
               
                foreach( $datesAvailable['morning'] as $tim) {
                    $teacher = $scheduleService->getAvailableTeachers($date->format('Y-m-d'),$start = new Carbon($tim['start']), $end = new Carbon($tim['end']), "morning");
                    if($teacher != null)
                    $teachers[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teachers', $teacher);
                    
                    $teacherName = $scheduleService->getTeacherAssigned($studentId, $date->format('Y-m-d'), $start = new Carbon($tim['start']), $end = new Carbon($tim['end']));
                   
                    //dd($teacherName);
                   
                    if($teacherName != null)
                        $teacherNameDisplay[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teacherName', $teacherName);
                    /*else
                    $teacherNameDisplay=null;
                    */
                    
                }
                
               

                foreach( $datesAvailable['afternoon'] as $tim) {
                    $teacher = $scheduleService->getAvailableTeachers($date->format('Y-m-d'),$start = new Carbon($tim['start']), $end = new Carbon($tim['end']), 'afternoon');
                    if($teacher != null)
                    $teachers[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teachers', $teacher);

                    $teacherName = $scheduleService->getTeacherAssigned($studentId, $date->format('Y-m-d'), $start = new Carbon($tim['start']), $end = new Carbon($tim['end']));
                    

                    if($teacherName != null){
                        $teacherNameDisplay[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teacherName', $teacherName);
                        
                    }/*else{
                        $teacherNameDisplay=null;
                    }*/
                }

                
                
   
               
                
                //$teachers[] = Arr::add(['days' => $date->format('d-m-Y')], 'time', 'nada');    
                              /*
                //$dates[] = $date->format('d-m-Y');
                $teachers = $scheduleService->getAvailableTeachers($date->format('Y-m-d'),$start = new Carbon('12:00:00'), $start = new Carbon('12:00:00'));
                
                $datesTime[] = Arr::add(['days' => $date->format('d-m-Y')], 'time', $datesAvailable['morning']);
                //$datesTime2[] = Arr::add($datesTime , 'teachers', $teachers);
                */


                $datesTime[] = Arr::add(['days' => $date->format('d-m-Y')], 'time', $datesAvailable['morning']); 

                $datesTime2[] = Arr::crossJoin($datesAvailable['morning'], $teachers); 
                $datesTime3[] = Arr::flatten($datesTime2);
                
                
                $datesTime[] = Arr::add(['days' => $date->format('d-m-Y')], 'time', $datesAvailable['afternoon']);
                
                
            }
        } 

        //dd($teacherNameDisplay);
        
        $student = User::students()->findOrFail($id);
        //$nameUser = User::teachers()->findOrFail($id)->name;
         //dd($nameUser);

        return view('students.addTeacher',compact('datesTime','teacherNameDisplay' , 'teachers','student')); 
    	
    }
}
