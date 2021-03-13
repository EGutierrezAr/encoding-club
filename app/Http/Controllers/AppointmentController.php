<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request){
      
        $rules = [
            
            //'parentEmail' => 'required|email',
            'parentEmail' => 'required',
            'parentName' => 'required',
            'parentPhone' => 'required',
            'childName' => 'required',
            'childAge' => 'required'
        ];
        $messages = [
            'parentEmail.required' => 'Es necesario el correo electrónico del Padre',
            'parentName.required' => 'Es necesario en nombre del Padre',
            'parentName.min' => 'Como mínimo el nombre del Padre debe tener al menos 3 caracteres',
            'parentPhone.required' => 'Es necesario en teléfono del Padre',
            'childName.required' => 'Es necesario en nombre del niño',
            'childAge.required' => 'Es necesario la edad del niño',
        ];

        //return back()->with(compact('notification'));
        $notification ='ERROR';
        $this->validate($request, $rules, $messages, compact('notification'));

        $appointment = new Appointment();
        $appointment->parentEmail = $request->input('parentEmail');
        $appointment->parentName = $request->input('parentName');
        $appointment->parentPhone = $request->input('parentPhone');
        $appointment->childName = $request->input('childName');
        $appointment->childAge = $request->input('childAge');
        $appointment->save();

        $notification = 'Acabas de reservar tu Clases de Prueba';
        
        //dd($notification);
        return redirect('/')->with(compact('notification'));
    }
}
