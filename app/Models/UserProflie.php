<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'contact_number', 'location', 'gender', 'date_of_birth',
        'profile_picture', 'user_weight', 'user_height', 'user_bodytype', 'experience_level',
        'fitness_goal_1', 'fitness_goal_2', 'fitness_goal_3', 'health_condition',
        'preferred_workout_plan_1', 'preferred_workout_plan_2', 'preferred_workout_plan_3', 'password'
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }
}
