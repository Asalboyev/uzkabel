<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Login From</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="login.css" />
</head>
<body>
<div class="login_form_container">

    <div class="login_form">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="input_group">
                <i class="fa fa-user"></i>
                <input
                    name="email"
                    tabindex="1"
                    required
                    autofocus
                    type="text"
                    placeholder="Username"
                    class="input_text"
{{--                    autocomplete="off"--}}
                />
            </div>
            <div class="input_group">
                <i class="fa fa-unlock-alt"></i>
                <input
                    name="password" tabindex="2"
                    requir
                    type="password"
                    placeholder="Password"
                    class="input_text"
{{--                    autocomplete="off"--}}
                />
            </div>
            <div class="button_group" id="login_button">
                <button type="submit"  class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="login.js"></script>
</body>
</html>
