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
            'parentName.min' => 'Como mínimo el nombre del Padre debe tener al menos 3 caracteres',
            'parentPhone.required' => 'Como mínimo son 10 números',
            'childName.required' => 'Como mínimo el nombre del niño debe tener al menos 3 caracteres',
            'childAge.required' => 'Como mínimo el nombre del niño debe tener al menos 1 caracteres',
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
