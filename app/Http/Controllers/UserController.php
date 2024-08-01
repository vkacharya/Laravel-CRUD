<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function login()
    {
        return view('pages.eloquent-crud-users.login');
    }

    public function loginHandle(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('users.index');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
    public function logout()
    {
        Auth::logout();
        return view('pages.eloquent-crud-users.login');
    }

    public function index()
    {
        $user = User::paginate(5);
        return view('pages.eloquent-crud-users.index', compact('user'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.eloquent-crud-users.add-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users,email|email',
                'age' => 'required|numeric',
                'city' => 'required',
                'password' => 'required', //|confirmed for two boxes
                'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5555'
            ]
        );
        // $user = new User;
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'age' => $request->age,
        //     'city' => $request->city
        // ]);
        // $user->save();
        $filename = time() . '_' . $request->file->getClientoriginalName();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
            'password' => $request->password,
            'file' => $request->file('file')->storeAs('images', $filename, 'public')
            // 'file' => $request->file('file')->move(public_path('storage/images'), $request->file->getClientoriginalName())
        ]);
        // if ($user) {
        return redirect()->route('login')
            ->with('status', 'new user added succesfully, You can Login Now');
        // }
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
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('pages.eloquent-crud-users.add-edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:students,email|email',
                'age' => 'required|numeric',
                'city' => 'required',
                'password' => 'required',
                'file' => 'image|mimes:jpeg,png,jpg,gif|max:5555'
            ]
        );
        $filename = time() . '_' . $request->file->getClientoriginalName();
        if (file_exists($filename)) {
            @unlink($filename);
        }
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
            'password' => $request->password,
            'file' => $request->file('file')->storeAs('images', $filename, 'public')
            // 'file' => $request->file('file')->move(public_path('storage/images'), $request->file->getClientoriginalName())
        ]);

        // if ($user) {
        return redirect()->route('users.index')
            ->with('status', 'user updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $filename = public_path("storage/") . $id->file;
        User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('status', 'user deleted succesfully');
    }
}
