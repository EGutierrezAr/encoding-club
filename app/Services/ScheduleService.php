<?php namespace App\Services;

use App\WorkDay;
use App\Interfaces\ScheduleServiceInterface;
use Carbon\Carbon;
use App\Appointment;
use App\User;

class ScheduleService implements ScheduleServiceInterface
{
	
	public function isAvailableInterval($date, $studentId, Carbon $start){
        $exists = Appointment::where('idTeacher',$studentId)
        	->where('date', $date)
        	->where('time', $start->format('H:i:s'))
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

        if ($workDay) {
            $morningIntervals = $this->getIntervals($workDay->morning_start, $workDay->morning_end, $date, $studentId);

            $afternoonIntervals = $this->getIntervals($workDay->afternoon_start, $workDay->afternoon_end, $date, $studentId);

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

    public function getAvailableTeachers($date, Carbon $start, Carbon $end)
	{

        
        $userAvailables = WorkDay::where ('active',true)
        ->where('day', $this->getDayFromDate($date))
        ->where('morning_start',$start->format('H:i:s'))
        ->Where('morning_end',$end->format('H:i:s'))
        ->orWhere('afternoon_start',$start->format('H:i:s'))
        ->Where('afternoon_end',$end->format('H:i:s'))
        ->distinct('user_id')
        ->get('user_id')->toArray();
        //->unique('user_id');
        /*
        ->where('morning_start',$time->format('H:i:s'))
        ->orWhere('morning_end',$time->format('H:i:s'))
        ->orWhere('afternoon_start',$time->format('H:i:s'))
        ->orWhere('afternoon_end',$time->format('H:i:s'));*/

        //dd($userAvailables);
        //$usersAvailables = [];
        
        if (count($userAvailables) > 0){
                $usersAvailables = array_map(function($item){
                    $user = User::teachers()->findOrFail($item['user_id']);
                    return $user;
               },$userAvailables);        
        }

        /*

        if ($workDay) {
            $morningIntervals = $this->getIntervals($workDay->morning_start, $workDay->morning_end, $date, $studentId);

            $afternoonIntervals = $this->getIntervals($workDay->afternoon_start, $workDay->afternoon_end, $date, $studentId);

            //dd($afternoonIntervals);
        } else {
            $morningIntervals = [];
            $afternoonIntervals = [];
        }
        

        $data = [];
        $data['morning'] = $morningIntervals;
        $data['afternoon'] = $afternoonIntervals;
        */
        return $usersAvailables;
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

	private function getIntervals($start, $end, $date, $studentId){
        $start = new Carbon($start);
        $end = new Carbon($end);

        $intervals =[];
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