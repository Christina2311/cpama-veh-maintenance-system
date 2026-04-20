<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;background: #dfdff0; margin: 0; padding: 0; overflow-y: auto;">
        
        <div style="width: 100%; max-width: 450px; background-color: #0b0f29; padding: 50px 40px; border-radius: 12px; box-shadow: 0 15px 35px rgba(0,0,0,0.4); color: white; margin: 20px;">
            
            <div style="text-align: center; margin-bottom: 30px;">
                <img src="{{ asset('images/veh_main_logo.png') }}" 
                     style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 15px;" 
                     alt="Logo">    

                <h1 style="font-size: 28px; font-weight: 800; text-transform: uppercase; margin: 0; letter-spacing: 1px; font-family: sans-serif;">
                    CPAMA VEH MAINTENANCE
                </h1>
                <p style="color: #9ca3af; font-size: 14px; margin-top: 10px; font-family: sans-serif;">Login to continue</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="email" style="display: block; font-size: 13px; color: #d1d5db; margin-bottom: 8px; font-family: sans-serif;">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                        placeholder="Email"
                        style="width: 100%; padding: 12px; border-radius: 6px; border: none; background-color: white; color: black; box-sizing: border-box;">
                    <x-input-error :messages="$errors->get('email')" style="margin-top: 8px; color: #f87171; font-size: 12px;" />
                </div>

                <div style="margin-bottom: 25px;">
                    <label for="password" style="display: block; font-size: 13px; color: #d1d5db; margin-bottom: 8px; font-family: sans-serif;">Password</label>
                    <input id="password" type="password" name="password" required 
                        placeholder="Password"
                        style="width: 100%; padding: 12px; border-radius: 6px; border: none; background-color: white; color: black; box-sizing: border-box;"
                    <x-input-error :messages="$errors->get('password')" style="margin-top: 8px; color: #f87171; font-size: 12px;" />
                </div>

                <div style="margin-top: 30px;">
                <button type="submit" 
                    onmouseover="this.style.backgroundColor='#3b3fd4'"
                    onmouseout="this.style.backgroundColor='#2827c4'"
                    style="width: 100%; padding: 12px; background-color: #2827c4; border: none; border-radius: 8px; color: white; font-size: 18px; font-weight: 700; text-transform: uppercase; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: background-color 0.2s; box-sizing: border-box;">
                    
                    <img src="{{ asset('images/login_icon.png') }}" 
                        alt="Login Icon"
                        style="width: 24px; height: 24px; margin-right: 12px; filter: brightness(0) invert(1);">

                    LOGIN
                </button>
            </div>
            </form>
        </div>
    </div>

</body>
</html>