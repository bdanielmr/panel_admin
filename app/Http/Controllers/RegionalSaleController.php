<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegionalSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $regionalsales = User::regionalsales()->paginate(5);
        return view('regionalsales.index', compact('regionalsales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('regionalsales.create');
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
                'role' => 'regionalsales',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'el Regional agent se ha registrado correctamente.';
        return redirect('/regionalsales')->with(compact('notification'));
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
        $regionalsales = User::regionalsales()->findOrFail($id);
        return view('regionalsales.edit', compact('regionalsales'));
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

        $user = User::regionalsales()->findOrFail($id);
        $data = $request->only('name','email','dni','address','phone');
        $password = $request->input('password');
        if ($password)
            $data['password'] = bcrypt($password);
        
        $user->fill($data);
        $user->save();
        $notification = 'el regional agent se ha registrado correctamente.';
        return redirect('/regionalsales')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $regionalsale)
    {
        //
        
        $regionalsaleNanme = $regionalsale->name;
        $regionalsale->delete();
        $notification ="The regional sales $regionalsaleNanme was delete";
        return redirect('/regionalsales')->with(compact('notification'));
    }
}
