<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        //
        $agents =  User::adminsales()->get();
        return view('agents.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [

            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'digits:8',
            'address' => 'min:3',
            'phone' => 'min:6'
        ];
        $this->validate($request, $rules);
        User::create(
            $request->only('name','email','dni','address','phone')
            + [
                'role' => 'admin',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'el admin se ha registrado correctamente.';
        return redirect('/agents')->with(compact('notification'));
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
        //
        $agent= User::adminsales()->findOrFail($id);
        return view('agents.edit', compact('agent'));
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
        //
        $rules = [

            'name' => 'required|min:3',
            'email' => 'required|email',
            'dni' => 'digits:8',
            'address' => 'min:3',
            'phone' => 'min:6'
        ];
        $this->validate($request, $rules);

        $user = User::adminsales()->findOrFail($id);
        $data = $request->only('name','email','dni','address','phone');
        $password = $request->input('password');
        if ($password)
            $data['password'] = bcrypt($password);
        
        $user->fill($data);
        $user->save();
        $notification = 'el admin se ha registrado correctamente.';
        return redirect('/agents')->with(compact('notification'));
    }


    public function destroy(User $agent)
    {
        //

        $agentNanme = $agent->name;
        $agent->delete();
        $notification ="The agent $agentNanme was delete";
        return redirect('/agents')->with(compact('notification'));
    }
}
