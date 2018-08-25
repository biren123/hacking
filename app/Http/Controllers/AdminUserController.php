<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\photo;
use App\role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=user::all();
      return view('Admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=role::lists('name','id')->all();
        return view('Admin.user.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       if(trim($request->password)==''){
        $input=$request->except('password');
       }else{
           $input=$request->all();
       }
       $input=$request->all();
       if($file=$request->file('photo_id')){
        $name=time().$file->getClientOriginalName();
        $file->move('gallery',$name);
        $photo=photo::create(['file'=>$name]);
        $input['photo_id']=$photo->id;

       }
       $input['password']=bcrypt($request->password);
       user::create($input);
        return redirect('/admin/users');
//
//        return $request->all();
//
//        user::create($request->all());
//        return redirect('/admin/users');

        //
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
        $user=user::findOrFail($id);

        $role=role::lists('name','id')->all();
        return view('admin.user.edit',compact('user','role'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = user::find($id);
        if(trim($request->password)==''){
            $input=$request->except('password');
        }else {
            $input = $request->all();
        }
      if($file=$request->file('photo_id')){

          $name=time().$file->getClientOriginalName();
          $file->move('gallery',$name);
          $photo=photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
      }
        $input['password']=bcrypt($request->password);

        $user->update($input);
        return redirect('/admin/users');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user= user::findOrFail($id);
        unlink(public_path().$user->photo->file);
       $user->delete();

       Session::flash('deleted_user','The user has been deleted');
       return redirect('/admin/users');

        //
    }
}
