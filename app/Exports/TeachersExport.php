<?php

namespace App\Exports;

use App\User;
use App\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $appointments = Appointment::rightJoin('users', 'appointments.teacher_id', '=', 'users.id')
        ->where('role', '=', 'teacher')
        ->select('users.name','users.last_name','users.email','users.phone',
                 \DB::raw('(CASE WHEN users.level ="1" THEN "BASICO" WHEN users.level = "2" THEN "MEDIO" ELSE "AVANZADO" END) as level'),
                 'appointments.student_name','appointments.parent_name','appointments.parent_phone',
                 'appointments.date','appointments.time_start',
                 'appointments.type','appointments.status_appointment')->get();

        //dd($appointments);

        return  $appointments;
    }

    public function headings(): array
    {
        return [
            'Nombre del profesor',
            'Apellido del profesor',
            'Email del profesor',
            'Teléfono del profesor',
            'Nivel del profesor',
            'Nombre del estudiante',
            'Tutor del estudiante',
            'Teléfono del tutor',
            'Fecha de clase',
            'Hora de clase',
            'Tipo de clase',
            'Status de clase'
        ];
    }
}
