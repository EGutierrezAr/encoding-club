<?php

namespace App\Exports;

use App\User;
use App\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = Appointment::rightJoin('users', 'appointments.student_id', '=', 'users.id')
        ->where('role', '=', 'student')
        ->select('users.name','users.last_name',
                 \DB::raw('(CASE WHEN users.level ="1" THEN "BASICO" WHEN users.level = "2" THEN "MEDIO" ELSE "AVANZADO" END) as level'),
                 \DB::raw('(CASE WHEN users.status ="1" THEN "PRUEBA" WHEN users.status = "2" THEN "ACTIVO" ELSE "INACTIVO" END) as estatus'),
                 'appointments.parent_name','appointments.parent_email','appointments.parent_phone',
                 'appointments.date','appointments.time_start',
                 'appointments.type','appointments.status_appointment')->get();

        //dd($appointments);

        return  $students;
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
