<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:user_profiles',
            'contact_number' => 'required|string',
            'location' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required|date',
            'profile_picture' => 'nullable|image|max:2048',

            'user_weight' => 'required|numeric',
            'user_height' => 'required|numeric',
            'user_bodytype' => 'required|in:Ectomorph,Mesomorph,Endomorph',
            'experience_level' => 'required|integer|between:1,10',
            'fitness_goal_1' => 'required|string',
            'fitness_goal_2' => 'required|string',
            'fitness_goal_3' => 'required|string',
            'health_condition' => 'required|string',

            'preferred_workout_plan_1' => 'required|exists:workout_plans,id',
            'preferred_workout_plan_2' => 'required|exists:workout_plans,id',
            'preferred_workout_plan_3' => 'required|exists:workout_plans,id',

            'user_password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'user_password.confirmed' => 'Passwords do not match.',
        ];
    }
}
