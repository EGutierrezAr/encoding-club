<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$students = User::all(); //ALL
        $students = User::students()->paginate(5); 
        //dd($students);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    private function performValidation(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => 'required|min:3',
            /*'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:3',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'level' => 'nullable|min:3',
            'status' => 'nullable|min:3',
            'observation' => 'nullable|min:3',*/
        ];
        /*
        $messages = [
            'name.min' => 'Como mínimo el nombre del estudiante debe tener al menos 3 caracteres',
        ];*/

        //return back()->with(compact('notification'));
       
        $this->validate($request, $rules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => 'required|min:3',
            /*'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:3',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'level' => 'nullable|min:3',
            'status' => 'nullable|min:3',
            'observation' => 'nullable|min:3',*/
        ];

        $this->validate($request, $rules);

        $password = $request->input('password');
        User::create(
            $request->only('name','email','password','last_name','phone','address','city','level','status','observation')
            + [
                'role' => 'student',
                'password' => bcrypt($password),
            ]
        );

        $notification = "El estudiate se ha registrado correctamente.";
        return redirect('/students');

        /*
        //dd($request->all());
        $student =new User();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        //$student->name() = $request->input('name');
        $student->password = $request->input('password');
        $student->last_name = $request->input('last_name');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->level = $request->input('level');
        $student->role = $request->input('role');
        $student->status = $request->input('status');
        $student->observation = $request->input('observation');

        //$student->save();  //Eso es una forma de hacerlo pero menos segura */

        
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
    public function edit(User $student)
    {
        //dd("entre");
        return view('students.edit', compact('student'));
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
    
        $rules = [
            'name' => 'required|min:3',
            /*'last_name' => 'nullable|min:3',
            'phone' => 'nullable|min:3',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'level' => 'nullable|min:3',
            'status' => 'nullable|min:3',
            'observation' => 'nullable|min:3',*/
        ];

        $this->validate($request, $rules);

        $user = User::students()->findOrFail($id);

        $data = $request->only('name','email','password','last_name','phone','address','city','level','status','observation');

        $user->fill($data);
        $user->save();  //UPDATE

        $notification = "El estudiate se ha registrado correctamente.";
        return redirect('/students')->with(compact('notification')); 

        /*
        $student->name = $request->input('name');
        //$student->email = $request->input('email');
        //$student->password = $request->input('password');
        $student->last_name = $request->input('last_name');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->level = $request->input('level');
        $student->role = $request->input('role');
        $student->status = $request->input('status');
        $student->observation = $request->input('observation');
        $student->save();

        $notification = "El estudiate se ha actualizado correctamente.";
        return redirect('/students')->with(compact('notification')); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $deleteStudent = $student->name;
        $student->delete();

        $notification = "El estudiate $deleteStudent se ha eliminado correctamente.";
        return redirect('/students')->with(compact('notification'));
    }
}
