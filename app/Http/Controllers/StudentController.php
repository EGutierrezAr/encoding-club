<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ScheduleServiceInterface;
use App\User;
use App\WorkDay;
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
        User::create(
            $request->only('name','email','password','last_name','phone','address','city','level','status','observation')
            + [
                'role' => 'student',
                'password' => bcrypt($password),
            ]
        );

        $notification = "El estudiate se ha registrado correctamente.";
        return redirect('/students');

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

    public function storeSchedule(Request $request, $id)
    {
        //dd($request->all());

    	$active = $request ->input('active') ?: [];
    	$morning_start = $request ->input('morning_start');
    	$morning_end = $request ->input('morning_end');
    	$afternoon_start = $request ->input('afternoon_start');
    	$afternoon_end = $request ->input('afternoon_end');

    	$errors = [];
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
	    } 

	    if(count($errors) > 0)
    		return back()->with(compact('errors'));

    	$notification = 'Los cambios se han guardado correctamente';
    	return back()->with(compact('notification'));
    }


    public function appointment($id, ScheduleServiceInterface $scheduleService)
    {
        
        $studentId = $id;  


        $start_date = Carbon::today(); 
        $end_date = Carbon::today()->addDays(20);

        /*
        $dates = [];
        $dates1 = [];
        $datesDoctor = []; */
        $teachers=[];

        $datesTime = [];
        $datesTime2 = [];
        $datesTime3 = [];
        for($date = $start_date; $date->lte($end_date); $date->addDay()) { 
            $datesAvailable = $scheduleService->getAvailableIntervals($date->format('Y-m-d'), $studentId);
            if (!empty($datesAvailable['morning']) || !empty($datesAvailable['afternoon'])) {

                foreach( $datesAvailable['morning'] as $tim) {
                    $teacher = $scheduleService->getAvailableTeachers($date->format('Y-m-d'),$start = new Carbon($tim['start']), $end = new Carbon($tim['end']), "morning");
                    $teachers[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teachers', $teacher);
                }
                
                foreach( $datesAvailable['afternoon'] as $tim) {
                    $teacher = $scheduleService->getAvailableTeachers($date->format('Y-m-d'),$start = new Carbon($tim['start']), $end = new Carbon($tim['end']), 'afternoon');
                    $teachers[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teachers', $teacher);
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
        //dd( $teachers);
        //$datesDoctor['days'] = $dates;
  
       // dd($datesTime);
        //return $datesDoctor;
        
        $nameUser = User::students()->findOrFail($id)->name;
        //$nameUser = User::teachers()->findOrFail($id)->name;
         //dd($nameUser);
        return view('students.addTeacher',compact('datesTime', 'teachers','nameUser')); 
    	
    }
}
