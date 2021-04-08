<?php namespace App\Services;

use App\WorkDay;
use App\Interfaces\ScheduleServiceInterface;
use Carbon\Carbon;
use App\Appointment;
use App\User;
use App\Services\DB;

class ScheduleService implements ScheduleServiceInterface
{
	
	public function isAvailableInterval($date, $studentId, Carbon $start){

        $exists = Appointment::where('teacher_id',$studentId)
        	->where('date', $date)
        	->where('time_start', $start->format('H:i:s'))
        	->exists();

        return !$exists;  //available if already none exists
	}

	public function getAvailableIntervals($date, $studentId)
	{

        $workDay = WorkDay::where ('active',true)
        ->where('day', $this->getDayFromDate($date))
        ->where('user_id',$studentId)
        ->first([
            'morning_start','morning_end',
            'afternoon_start','afternoon_end'
        ]);

          
        //if($date == '2021-04-05')
        //dd($workDay);

        if ($workDay) {
            $morningIntervals = $this->getIntervals($workDay->morning_start, $workDay->morning_end, $date, $studentId);

            $afternoonIntervals = $this->getIntervals($workDay->afternoon_start, $workDay->afternoon_end, $date, $studentId);


             //$newDate = $date->format('Y-m-d');
           //if($date == '2021-04-05')
           //dd( $afternoonIntervals);

            //dd($afternoonIntervals);

        } else {
            $morningIntervals = [];
            $afternoonIntervals = [];
        }
        

        $data = [];
        $data['morning'] = $morningIntervals;
        $data['afternoon'] = $afternoonIntervals;
        /*
        if ($workDay) {
            dd($data);
        }*/

        return $data;
	}

    public function getTeacherAssigned($studentId, $date, Carbon $start, Carbon $end){

        /*if($date == '2021-04-05'){
         // dd("entre",$date,$start->format('H:i:s'));
         if($start->format('H:i:s') == '08:00:00')
          dd("Entr");
        }*/

//        dd ($date,$start->format('H:i:s'));

        $teacher  = Appointment::where('student_id',$studentId)
        	->where('date', $date)
        	->where('time_start', $start->format('H:i:s'))
            ->where('time_end', $end->format('H:i:s'))
            ->where('teacher_id', '!=', null)
        	->get(['teacher_id']);

        //dd ($teacher);

        if (count($teacher) > 0){
            $user = User::findOrFail($teacher[0]->teacher_id);
            //dd ($user);
            return $user;
        } else{
            return null;
        }

        /*
         if (count($teacherAvailables) > 0){
            $teacherAvailables = array_map(function($item){
                $user = User::findOrFail($item);
                return $user;
           },$teacherAvailables);        
      }

        */
         
    }

    public function getAvailableTeachers($date, Carbon $start, Carbon $end, $time)
	{
       // dd($date);


       

       $teacherAvailables=[];

      /*  if ($time == 'morning'){
            $condition1 = "morning_start";
            $condition2 = "morning_end"; 
        }
        else {
            $condition1 = "afternoon_start";
            $condition2 = "afternoon_end";
        }*/


        /*$userAvailables = WorkDay::where ('active',true)
        ->whereExists(function ($query) {
            $query->select(WorkDay::raw(1))
                ->from('users')
                ->whereColumn('work_days.user_id', 'users.id')
                ->where('users.role','=',"teacher");
        })
        ->where('day', $this->getDayFromDate($date))
        ->where ($condition1,$start->format('H:i:s'))
        ->where ($condition2,$end->format('H:i:s'))
        ->distinct('user_id')
        ->get('user_id')->toArray() ;
        */


        $teacherPosible = WorkDay::where ('active',true)
        ->whereExists(function ($query) {
            $query->select(WorkDay::raw(1))
                ->from('users')
                ->whereColumn('work_days.user_id', 'users.id')
                ->where('users.role','=',"teacher");
        })
        ->where('day', $this->getDayFromDate($date))
       // ->where ($condition1,$start->format('H:i:s'))
        ->distinct('user_id')
        ->get(['user_id','morning_start','morning_end','afternoon_start','afternoon_end']);
       // ->toArray() ;


     
      /* if($start->format('H:i:s') == '01:00:00')
       dd("Entr",$teacherPosible);
*/

        if ($teacherPosible) {
            foreach( $teacherPosible as $teacher) {
                if ($time == 'morning'){
            
                    $morningIntervals = $this->getIntervals($teacher->morning_start, $teacher->morning_end, $date, $teacher->user_id);
                    if (!empty($morningIntervals)){
                        foreach( $morningIntervals as $tim) {
                            $startTmp = new Carbon($tim['start']);
                            $endTmp = new Carbon($tim['end']);

                            if ($startTmp == $start && $endTmp == $end)
                            $teacherAvailables[] = $teacher->user_id;
                        }
                    }
                } 

                if ($time == 'afternoon'){
                
                    $afternoonIntervals = $this->getIntervals($teacher->afternoon_start, $teacher->afternoon_end, $date, $teacher->user_id);

                    /*if($date == '2021-04-05'){
                        if ($time == 'afternoon'){
                          
                                dd($afternoonIntervals);
                
                        }
                    }*/

                    

                    if (!empty($afternoonIntervals)){
                        foreach( $afternoonIntervals as $tim) {
                            $startTmp = new Carbon($tim['start']);
                            $endTmp = new Carbon($tim['end']);
                            
                           
                            /*if($start->format('H:i:s') == '01:00:00')
                            dd("Entr", $startTmp, $endTmp, $start,$end );*/

                            if ($startTmp == $start && $endTmp == $end)
                            $teacherAvailables[] = $teacher->user_id;
                        }
                         //if($date == '2021-04-05')
                        //dd($teacherAvailables);
                    }
                }

                /*if($date == '2021-04-05'){
                    if ($time == 'afternoon'){
                        if ($teacher->afternoon_start == '01:00:00'){
                            dd($teacherAvailables);
                        }
                    }
                }*/


            }
        }


        if (count($teacherAvailables) > 0){
            $teacherAvailables = array_map(function($item){
                $user = User::findOrFail($item);
                return $user;
           },$teacherAvailables);        
      }

     

   //dd($teacherAvailables);

      /*
        $userAvailables = WorkDay::where ('active',true)

        ->whereExists(function ($query) {
            $query->select(WorkDay::raw(1))
                  ->from('users')
                  ->whereColumn('work_days.user_id', 'users.id')
                  ->where('users.role','=',"teacher");
        })

        ->where('day', $this->getDayFromDate($date))


            ->where('morning_start',$start->format('H:i:s'))
            ->Where('morning_end',$end->format('H:i:s'))

     
            ->where('afternoon_start',$start->format('H:i:s'))
            ->Where('afternoon_end',$end->format('H:i:s'))
 

        orWhere(function($query) use ($start, $end) {

            $query->where('afternoon_start',$start->format('H:i:s'))
                  ->where('afternoon_end',$end->format('H:i:s'));
        })

        ->distinct('user_id')


        ->get('user_id')->toArray();

        */

   /*if ($start->format('H:i:s') == '09:00:00')
        dd($userAvailables);


        //->unique('user_id');
        
        ->where('morning_start',$time->format('H:i:s'))
        ->orWhere('morning_end',$time->format('H:i:s'))
        ->orWhere('afternoon_start',$time->format('H:i:s'))
        ->orWhere('afternoon_end',$time->format('H:i:s'));*/

        //dd($userAvailables);
        //$usersAvailables = [];
        
        /*if (count($userAvailables) > 0){
                $usersAvailables = array_map(function($item){
                    $user = User::findOrFail($item['user_id']);
                    return $user;
               },$userAvailables);        
        }*/
        //dd($userAvailables);

        if (count($teacherAvailables) > 0)
        return $teacherAvailables;
        else
        return null;
        
	}

	private function getDayFromDate($date)
	{
        $dateCarbon = new Carbon($date);
        //Carbon 0 sunday - 6 Saturday
        //WorkDay 0 Mondat -6 sunday
        $i = $dateCarbon->dayOfWeek;
        $day = ($i==0 ? 6 : $i-1);
        return $day;
	}

	private function getIntervals($start, $end, $date, $studentId)
    {
        
        $newStart = new Carbon($start);
        $newEnd = new Carbon($end);

        $start = new Carbon($start);
        $end = new Carbon($end);

        $intervals =[];

        if($newStart->format('H:i:s') == "12:00:00" && $newEnd->format('H:i:s') != "12:00:00") {
            
            $interval =[];
            $interval['start'] = '12:00:00';
            $interval['end'] = '01:00:00';
           
            $available = $this->isAvailableInterval($date, $studentId, $newStart);
            if($available){
            	$intervals []= $interval;	
            }
            $start =  new Carbon('01:00:00');
        }
           

        while($start < $end){
            $interval =[];

            //$interval['start'] = $start->format('g:i A');
            $interval['start'] = $start->format('H:i:s');

            //si no existe una cita para esta hora con este DR
            $available = $this->isAvailableInterval($date, $studentId, $start);

            $start->addMinutes(60);
            //$interval['end'] = $start->format('g:i A');
            $interval['end'] = $start->format('H:i:s');

            
            if($available){
            	$intervals []= $interval;	
            }
            
        }

        return $intervals;
    }
}