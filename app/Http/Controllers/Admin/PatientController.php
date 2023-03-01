<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller; 


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $patients = User::patients()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];

        $messages =[
            'name.required' => 'El nombre del paciente es obligatorio',
            'name.min' => 'El nombre del paciente debe tener más de 3 caráteres', 
            'email.required' => 'El correo electónico es obligatorio',
            'email.email' => 'Se debe ingresar un correo válido',
            'address.min' => 'La dirección debe tener más de 6 carácteres',
            'phone.required' => 'El número de telefono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + ['role' => 'paciente',
                'password' => bcrypt($request->input('password'))]
        );

        $notification = 'Se ha registrado un nuevo paciente';
        return redirect('/pacientes')->with(compact('notification')); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $patient = User::Patients()->findOrFail($id);
        return view('patients.edit', compact('patient')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'address' => 'nullable|min:6',
            'phone' => 'required',
        ];

        $messages =[
            'name.required' => 'El nombre del paciente es obligatorio',
            'name.min' => 'El nombre del paciente debe tener más de 3 caráteres', 
            'email.required' => 'El correo electónico es obligatorio',
            'email.email' => 'Se debe ingresar un correo válido',
            'address.min' => 'La dirección debe tener más de 6 carácteres',
            'phone.required' => 'El número de telefono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);
        $user = User::Patients()->findOrFail($id);
        $data =  $request->only('name', 'email', 'cedula', 'address', 'phone');
        $password = $request->input('password');

        if($password)
            $data ['password'] = bcrypt($password); 
        
        $user->fill($data);
        $user->save();

        $notification = 'El paciente se ha modificado correctamente' ;
        return redirect('/pacientes')->with(compact('notification')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $user = User::Patients()->findOrFail($id); 
        $patientName = $user->name;
        $user->delete(); 
        $notification = 'Se ha eliminado '.$patientName.' correctamente'; 

        return redirect('/pacientes')->with(compact('notification')); 
    }
}
