<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialty;
use App\Http\Controllers\Controller; 



class DoctorController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $doctors = User::doctors()->paginate(10);
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create(){
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
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
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe tener más de 3 caráteres', 
            'email.required' => 'El correo electónico es obligatorio',
            'email.email' => 'Se debe ingresar un correo válido',
            'address.min' => 'La dirección debe tener más de 6 carácteres',
            'phone.required' => 'El número de telefono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name', 'email', 'cedula', 'address', 'phone')
            + ['role' => 'medico',
                'password' => bcrypt($request->input('password'))]
        );

        $user->specialties()->attach($request->input('specialties')); 
        $notification = 'Se ha registrado un nuevo médico';
        return redirect('/medicos')->with(compact('notification')); 
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

        $doc = User::doctors()->findOrFail($id);
        $specialties = Specialty::all();
        $specialty_ids = $doc->specialties()->pluck('specialties.id');
        return view('doctors.edit', compact('doc', 'specialties', 'specialty_ids')); 
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
            'name.required' => 'El nombre del médico es obligatorio',
            'name.min' => 'El nombre del médico debe tener más de 3 caráteres', 
            'email.required' => 'El correo electónico es obligatorio',
            'email.email' => 'Se debe ingresar un correo válido',
            'address.min' => 'La dirección debe tener más de 6 carácteres',
            'phone.required' => 'El número de telefono es obligatorio',
        ];

        $this->validate($request, $rules, $messages);
        $user = User::doctors()->findOrFail($id);
        $data =  $request->only('name', 'email', 'cedula', 'address', 'phone');
        $password = $request->input('password');

        if($password)
            $data ['password'] = bcrypt($password); 
        
        $user->fill($data);
        $user->save();
        $user->specialties()->sync($request->input('specialties'));

        $notification = 'El médico se ha modificado correctamente' ;
        return redirect('/medicos')->with(compact('notification')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $user = User::doctors()->findOrFail($id); 
        $doctorName = $user->name;
        $user->delete(); 
        $notification = 'Se ha eliminado '.$doctorName.' correctamente'; 

        return redirect('/medicos')->with(compact('notification')); 
    }
}
