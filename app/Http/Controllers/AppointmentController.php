<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request){
      
        $rules = [
            /*
            'parentEmail' => 'required|email',
            //'parentEmail' => 'required| min:3',
            'parentName' => 'required| min:3',
            'parentPhone' => 'required| min:10',
            'childName' => 'required| min:3',
            'childAge' => 'required| min:1' */
        ];
        $messages = [
            //'parentEmail.min' => 'xEs necesario el ',
            'parent_name.min' => 'Como mínimo el nombre del Padre debe tener al menos 3 caracteres',
            'parent_phone.required' => 'Como mínimo son 10 números',
            'student_name.required' => 'Como mínimo el nombre del estudiante debe tener al menos 3 caracteres',
            'student_age.required' => 'Como mínimo el nombre del estudiante debe tener al menos 1 caracteres',
        ];

        //return back()->with(compact('notification'));
        $notification ='ERROR';
        $this->validate($request, $rules, $messages, compact('notification'));

        $appointment = new Appointment();
        $appointment->parent_email = $request->input('parent_email');
        $appointment->parent_name = $request->input('parent_name');
        $appointment->parent_phone = $request->input('parent_phone');
        $appointment->student_name = $request->input('student_name');
        $appointment->student_age = $request->input('student_age');
        $appointment->status = 'reservada';
        $appointment->save();

        $notification = 'Acabas de reservar tu Clases de Prueba';
        
        //dd($notification);
        return redirect('/')->with(compact('notification'));
    }
}
