
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->string('location');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('date_of_birth');
            $table->string('profile_picture')->nullable();

            // Fitness details
            $table->float('user_weight');
            $table->float('user_height');
            $table->enum('user_bodytype', ['Ectomorph', 'Mesomorph', 'Endomorph']);
            $table->tinyInteger('experience_level');
            $table->string('fitness_goal_1');
            $table->string('fitness_goal_2');
            $table->string('fitness_goal_3');
            $table->text('health_condition');

            $table->unsignedBigInteger('preferred_workout_plan_1');
            $table->unsignedBigInteger('preferred_workout_plan_2');
            $table->unsignedBigInteger('preferred_workout_plan_3');

            $table->string('password');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
