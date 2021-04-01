<?php namespace App\Interfaces;

use Carbon\Carbon;

interface ScheduleServiceInterface
{
	public function isAvailableInterval($date, $doctorId, Carbon $start);
	public function getAvailableIntervals($date, $doctorId);
	public function getAvailableTeachers($date, Carbon $start, Carbon $end, $time);	
}