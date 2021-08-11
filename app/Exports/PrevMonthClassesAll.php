<?php

namespace App\Exports;

use App\User;
use App\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use CArbon\Carbon;

class PrevMonthClassesAll implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $now  = Carbon::today();
        $now->subMonth();

        $appointments = Appointment::join('users', 'appointments.teacher_id', '=', 'users.id')
        ->Join('levels', 'appointments.level_id', '=', 'levels.id')
        ->where('role', '=', 'teacher')
        ->whereBetween('date',[$now->startOfWeek()->format('Y-m-d'), $now->endOfWeek()->format('Y-m-d')])
        ->select('users.name','users.last_name','users.phone',//,'users.email'
                'appointments.student_name','levels.level', 'levels.course','appointments.parent_name','appointments.parent_phone',
                'appointments.time_start',
                'appointments.type','appointments.status_appointment')->get();

        return  $appointments;
    }

    public function headings(): array
    {
        return [
            'Nombre del estudiante',
            'Apellido del estudiante',
            'Nivel del estudiante',
            'Status de estudiante',
            'Nombre del Tutor',
            'Email del Tutor',
            'Teléfono del tutor',
            'Fecha de clase',
            'Hora de clase',
            'Tipo de clase',
            'Status de clase'
        ];
    }
}
