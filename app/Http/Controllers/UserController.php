<?php



namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function getUserInfo(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }

    public function updateUserInfo(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|min:6',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['message' => 'User info updated successfully']);
    }
}
