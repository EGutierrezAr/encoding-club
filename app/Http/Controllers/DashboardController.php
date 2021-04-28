<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ScheduleServiceInterface;
use App\User;
use Illuminate\Support\Arr; 
use Carbon\Carbon;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ScheduleServiceInterface $scheduleService)
    {
            //dd(auth()->user());

            $studentId ='52';  
            //$studentId = $id;  
            $start_date = Carbon::today(); 
            $end_date = Carbon::today()->addDays(20);
    
            $teachers=[];
            $teacherNameDisplay=[];
    
            $datesTime = [];
            $datesTime2 = [];
            $datesTime3 = [];
            for($date = $start_date; $date->lte($end_date); $date->addDay()) { 
                $datesAvailable = $scheduleService->getAvailableIntervals($date->format('Y-m-d'), $studentId);
    
    
                if (!empty($datesAvailable['morning']) || !empty($datesAvailable['afternoon'])) {
                   
                    foreach( $datesAvailable['morning'] as $tim) {
                        //$teacher = $scheduleService->getAvailableTeachers($date->format('Y-m-d'),$start = new Carbon($tim['start']), $end = new Carbon($tim['end']), "morning");
                        //if($teacher != null)
                        //$teachers[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teachers', $teacher);
                        
                        $teacherName = $scheduleService->getTeacherAssigned($studentId, $date->format('Y-m-d'), $start = new Carbon($tim['start']), $end = new Carbon($tim['end']));
                       
                        if($teacherName != null)
                            $teacherNameDisplay[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teacherName', $teacherName);
                    }
                    
    
                    foreach( $datesAvailable['afternoon'] as $tim) {
                        //$teacher = $scheduleService->getAvailableTeachers($date->format('Y-m-d'),$start = new Carbon($tim['start']), $end = new Carbon($tim['end']), 'afternoon');
                        //if($teacher != null)
                        //$teachers[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teachers', $teacher);
    
                        $teacherName = $scheduleService->getTeacherAssigned($studentId, $date->format('Y-m-d'), $start = new Carbon($tim['start']), $end = new Carbon($tim['end']));
                        
    
                        if($teacherName != null)
                            $teacherNameDisplay[] = Arr::add(['days' => $date->format('d-m-Y').$tim['start']], 'teacherName', $teacherName);
                    }
    
                    $datesTime[] = Arr::add(['days' => $date->format('d-m-Y')], 'time', $datesAvailable['morning']); 
    
                    //$datesTime2[] = Arr::crossJoin($datesAvailable['morning'], $teachers); 
                    //$datesTime3[] = Arr::flatten($datesTime2);
                    
                    $datesTime[] = Arr::add(['days' => $date->format('d-m-Y')], 'time', $datesAvailable['afternoon']);
                }
            }         

            //dd($datesTime);
            $student = User::students()->findOrFail($studentId);
            return view('dashboard',compact('datesTime','teacherNameDisplay' ,'student')); 

            /*return view('students.testForm');*/

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
        //
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
