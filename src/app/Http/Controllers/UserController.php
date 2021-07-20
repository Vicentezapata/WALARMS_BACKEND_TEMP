<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->type_user = $request['type_user'];
        $user->save();
        return  $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //METODO 1
        /*$user = TypeIngredient::where('id',$request['id'])->first();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->save();*/
        //METODO 2
        $user = User::where('id',$request['id'])->update(['name'=>$request['name'],'password'=>$request['password'],'email'=>$request['email'],'type_user'=>$request['type_user']]);
        return $user;
    }

    public function delete(Request $request)
    {
        $user = User::find($request['id']);
        $user->delete();
        return $user;
    }
    public function login(Request $request)
    {
        $type_user = 'none';
        $user = User::where('email',$request['email'])->where('password',$request['password'])->get();
        $cantUser = count($user);
        if(count($user) > 0){
            $type_user = $user->first()->type_user;
        }
        //return $cantUser;
        return response()->json(['permission'=>$cantUser,'type_user'=>$type_user]);
    }
}
