<?php

namespace App\Http\Controllers\SoftDelete;

use App\Http\Controllers\Controller;
use App\Model\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function List()
    {
        $data['users']=Users::all();
        $data['users_recycle'] =Users::onlyTrashed()->get();
        return view('recycle.component-accordions',$data);
    }
    public function Add(Request $request)
    {
        $user=new Users();
        $user->name= $request->name;
        $user->address= $request->address;
        $user->email= $request->email;
        $user->save();
        return redirect()->route('list');
    }
    public function RemoveItem($id)
    {
        $user=Users::find($id);
        $user->delete();
        return redirect()->route('list');
    }
    public function Restore($id)
    {
        $user=Users::onlyTrashed()
        ->where('id',$id)
        ->restore();
        return redirect()->route('list');
    }
    public function PermentlyDelete($id)
    {
        $user=Users::onlyTrashed()
        ->where('id',$id)
        ->forceDelete();
        return redirect()->route('list');
    }
}
