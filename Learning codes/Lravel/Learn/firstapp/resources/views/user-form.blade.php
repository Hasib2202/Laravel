<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        /* Align items to the top */
        min-height: 100vh;
        margin: 0;
        padding-top: 20px;
        flex-wrap: wrap;
        /* Allow form containers to wrap */
    }

    .form-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
        margin: 20px;
        /* Add margin between form containers */
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
        font-weight: 600;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select,
    input[type="range"] {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    select:focus,
    input[type="range"]:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    input[type="checkbox"],
    input[type="radio"] {
        margin-right: 8px;
    }

    .skill-container,
    .gender-container,
    .city-container,
    .age-container {
        margin-bottom: 20px;
    }
    .input-error {
        border: 1px solid red;
        color: red;
    }
</style>

<div>
    <div class="form-container">
        <h2>Add user form</h2>

        <!-- @if($errors->any())
        <div class="error" style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->

        <form action="user-form" method="post">
            @csrf

            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="{{$errors->first('name')?'input-error':''}}">
                <span style="color: red;">@error('name'){{ $message }}@enderror</span>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="{{$errors->first('email')?'input-error':''}}">
                <span style="color: red;">@error('email'){{ $message }}@enderror</span>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="{{ old('password') }}"
                class="{{$errors->first('password')?'input-error':''}}">
                <span style="color: red;">@error('password'){{ $message }}@enderror</span>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}"
                class="{{$errors->first('confirm_password')?'input-error':''}}">
                <span style="color: red;">@error('confirm_password'){{ $message }}@enderror</span>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                class="{{$errors->first('phone')?'input-error':''}}">
                <span style="color: red;">@error('phone'){{ $message }}@enderror</span>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}"
                class="{{$errors->first('address')?'input-error':''}}">
                <span style="color: red;">@error('address'){{ $message }}@enderror</span>

                <button type="submit">Submit</button>
                
            </div>
        </form>

    </div>

    <div class="form-container">
        <h2>User extra data</h2>
        <form action="user-form-extra" method="post">
            @csrf
            <div class="skill-container">
                <h2>Skill</h2>
                <input type="checkbox" id="php" name="skill[]" value="php">
                <label for="php">PHP</label>

                <input type="checkbox" id="java" name="skill[]" value="java">
                <label for="java">JAVA</label>

                <input type="checkbox" id="python" name="skill[]" value="python">
                <label for="python">PYTHON</label>
            </div>

            <div class="gender-container">
                <h2>Gender</h2>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label>
            </div>

            <div class="city-container">
                <h2>City</h2>
                <select name="city" id="">
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Barisal">Barisal</option>
                </select>
            </div>

            <div class="age-container">
                <h2>Age</h2>
                <input type="range" name="age" id="age" min="18" max="100">
                <label for="age">Age</label>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>