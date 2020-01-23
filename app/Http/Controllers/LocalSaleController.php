<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class LocalSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $localsales = User::localsales()->paginate(5);
        return view('localsales.index', compact('localsales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('localsales.create');
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
                'role' => 'localsales',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'el admin se ha registrado correctamente.';
        return redirect('/localsales')->with(compact('notification'));
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
        $localsales= User::localsales()->findOrFail($id);
        return view('localsales.edit', compact('localsales'));
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

        $user = User::localsales()->findOrFail($id);
        $data = $request->only('name','email','dni','address','phone');
        $password = $request->input('password');
        if ($password)
            $data['password'] = bcrypt($password);
        
        $user->fill($data);
        $user->save();
        $notification = 'el admin se ha registrado correctamente.';
        return redirect('/localsales')->with(compact('notification'));
    }

    public function destroy(User $localsale)
    {
        //
        $localsaleNanme = $localsale->name;
        $localsale->delete();
        $notification ="The agent $localsaleNanme was delete";
        return redirect('/localsales')->with(compact('notification'));
    }
}
