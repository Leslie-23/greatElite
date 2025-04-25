<?php
$result = null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- <h1>Register</h1> --}}
    <div class="registration-container">
        <div class="registration-header">
            <h1>Join EliteFit</h1>
            <p>Transform your fitness journey with us</p>
        </div>

        <div class="registration-progress">
            <div class="progress-step active" id="step1" onclick="showSection(1)">Personal Details</div>
            <div class="progress-step" id="step2" onclick="showSection(2)">Fitness Profile</div>
            <div class="progress-step" id="step3" onclick="showSection(3)">Set Password</div>
        </div>

        <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
            <!-- User Registration Details -->
            <div id="section1" class="form-section">
                <h2>Personal Information</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" id="contact_number" name="contact_number" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <!-- <option value="Other">Other</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" id="profile_picture" name="profile_picture">
                    </div>
                </div>
            </div>

            <!-- User Fitness Details -->
            <div id="section2" class="form-section hidden">
                <h2>Fitness Profile</h2>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="user_weight">Weight (kg)</label>
                        <input type="number" id="user_weight" name="user_weight" required>
                    </div>
                    <div class="form-group">
                        <label for="user_height">Height (cm)</label>
                        <input type="number" id="user_height" name="user_height" required>
                    </div>
                    <div class="form-group">
                        <label for="user_bodytype">Body Type</label>
                        <select id="user_bodytype" name="user_bodytype" required>
                            <option value="">Select body type</option>
                            <option value="Ectomorph">Ectomorph</option>
                            <option value="Mesomorph">Mesomorph</option>
                            <option value="Endomorph">Endomorph</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="experience_level">Experience Level (1-10)</label>
                        <input type="range" id="experience_level" name="experience_level" min="1"
                            max="10" value="5" oninput="this.nextElementSibling.value = this.value">
                        <output>5</output>
                    </div>
                    <div class="form-group">
                        <label for="fitness_goal_1">Primary Fitness Goal</label>
                        <input type="text" id="fitness_goal_1" name="fitness_goal_1" required>
                    </div>
                    <div class="form-group">
                        <label for="fitness_goal_2">Secondary Fitness Goal</label>
                        <input type="text" id="fitness_goal_2" name="fitness_goal_2" required>
                    </div>
                    <div class="form-group">
                        <label for="fitness_goal_3">Additional Fitness Goal</label>
                        <input type="text" id="fitness_goal_3" name="fitness_goal_3" required>
                    </div>
                    <div class="form-group">
                        <label for="health_condition">Health Conditions</label>
                        <input type="text" id="health_condition" name="health_condition"
                            placeholder="Any medical conditions we should know about" required>
                    </div>
                    <div class="form-group">
                        <label for="preferred_workout_plan_1">Preferred Workout Plan 1</label>
                        <select id="preferred_workout_plan_1" name="preferred_workout_plan_1" required>
                            <option value="">Select workout plan</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['table_id']; ?>"><?php echo $row['workout_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="preferred_workout_plan_2">Preferred Workout Plan 2</label>
                        <select id="preferred_workout_plan_2" name="preferred_workout_plan_2" required>
                            <option value="">Select workout plan</option>
                            <?php mysqli_data_seek($result, 0); while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['table_id']; ?>"><?php echo $row['workout_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="preferred_workout_plan_3">Preferred Workout Plan 3</label>
                        <select id="preferred_workout_plan_3" name="preferred_workout_plan_3" required>
                            <option value="">Select workout plan</option>
                            <?php mysqli_data_seek($result, 0); while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['table_id']; ?>"><?php echo $row['workout_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Password Section -->
            <div id="section3" class="form-section hidden">
                <h2>Set Your Password</h2>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="user_password">Create Password</label>
                        <div class="password-input form-group">
                            <input type="password" id="user_password" name="user_password" required minlength="8">
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <p class="password-hint">Password must be at least 8 characters long</p>
                    </div>
                    <div class="form-group full-width">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="password-input">
                            <input type="password" id="confirm_password" name="confirm_password" required>
                            <button type="button" class="password-toggle" onclick="toggleConfirmPassword()">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <p id="password-match-message"></p>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" id="prevBtn" class="btn btn-prev hidden"
                    onclick="prevSection()">Previous</button>
                <button type="button" id="nextBtn" class="btn btn-next" onclick="nextSection()">Next</button>
                <button type="submit" id="submitBtn" class="btn btn-submit hidden">Complete Registration</button>
            </div>
        </form>
    </div>

</body>

</html>
