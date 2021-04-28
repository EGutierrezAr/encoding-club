<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Arr; 
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::teachers()->paginate(5);
        //$teachers = User::teachers()->get(); //ALL
        return view('teachers.index',compact('teachers'));
    }

    
    public function find(Request $request)
    {
        //dd("entre");
        $search = $request->input('search');
        $teachers = User::teachers()->where('name',  'LIKE', "%{$search}%")->paginate(5); 
        return view('teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
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
       // dd($request);
        $this->performValidation($request);

        User::create(
            $request->only('name','email','last_name','phone','address','city','level','status','observation')
            + [
                'role' => 'teacher',
                'password' => Hash::make($request->input('password')),
            ]
        );

        $notification = "El estudiate se ha registrado correctamente.";
        return redirect('/teachers')->with(compact('notification'));
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
    public function edit($id)
    {
        $teacher = User::teachers()->findOrFail($id);
        return view('teachers.edit', compact('teacher'));
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

        $user = User::teachers()->findOrFail($id);

        $data = $request->only('name','email','password','last_name','phone','address','city','level','status','observation');

        $user->fill($data);
        $user->save();  //UPDATE

        $notification = "El profesor se ha actualizado correctamente.";
        return redirect('/teachers')->with(compact('notification')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        $deleteTeacher = $teacher->name;
        $teacher->delete();

        $notification = "El profesor $deleteTeacher se ha eliminado correctamente.";
        return redirect('/teachers')->with(compact('notification'));
    }
}
