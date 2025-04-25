<?php
namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function show()
    {
        $workouts = \DB::table('workout_plans')->get();
        return view('registration', compact('workouts'));
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
        }

        $data['password'] = $data['user_password'];
        unset($data['user_password'], $data['user_password_confirmation']);

        UserProfile::create($data);

        return redirect()->route('register.success')->with('message', 'Registration successful');
    }
}
