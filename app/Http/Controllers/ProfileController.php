<?php

namespace App\Http\Controllers;

use App\Interest;
use App\UserInterest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit() {
        $user = Auth::user();

        $interests = Interest::all();

        return view('edit_profile')->with(compact('user', 'interests'));
    }

    public function updateProfile(Request $request) {
        $data = $request->only(['interests']);
        $interests = $data['interests'];

        $user = Auth::user();

        foreach($interests as $interest) {
            $inter = Interest::updateOrCreate([
                "name" => $interest,
            ]);
            UserInterest::updateOrCreate([
                'interest_id' => $inter->id,
                'user_id' => $user->id,
            ]);
        }

        return $interests;
    }

    public function removeInterest(Request $request) {
        $user = Auth::user();
        $id = $request->get('id');
        UserInterest::where(['interest_id' => $id, 'user_id' => $user->id])->delete();
        return response()->json(['result' => 'success']);
    }
}
