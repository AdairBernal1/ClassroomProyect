<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('listUsers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('abcUserPut');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:8|max:200',
            'user_type' => 'required',
            'autism_lvl' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        $user = User::create($request->all());

        return redirect()->route('user.index')
                         ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|min:8|max:200', //password change optional
            'user_type' => 'required',
            'autism_lvl' => 'required',
        ]);
    
        $updateData = $request->except(['password']);
    
        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request['password']);
        }
    
        $user->update($updateData);
    
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
    public function login(Request $request){
        $incomingField = $request ->validate([
            'logusername'=> ['required','string'],
            'logpassword'=> ['required'],
        ]);
        
        if (!auth()->attempt(['username' => $incomingField['logusername'], 'password'=> $incomingField['logpassword']])) {
            return back()->withErrors([
                'logusername' => 'The provided credentials do not match our records.',
            ]);
        }
    
        $request -> session() -> regenerate();
        return redirect('/dashboard');
    }
    
    
    public function logout(Request $request){
        auth()->logout();
        return redirect('/');
    }
}
