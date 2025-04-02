<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\UpdateWallet;
use Carbon\Carbon;

class UserController extends Controller
{
    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        UpdateWallet::dispatch($user->id)->delay(Carbon::now()->addSeconds(15));
     
        // UpdateWallet::dispatch($user->id);
        return redirect()->route('user.create');
    }

}
   