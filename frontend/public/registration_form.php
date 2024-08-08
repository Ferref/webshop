<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webshop</title>
    <link href='../public/css/style.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Register to the webshop</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="error-message" class="alert alert_danger" role="alert" style="display: none"></div>
                <form id="register-form">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" required>
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" required>
                    </div>
                <button type="submit" class="gbtn btn-primary btn-block">Register</button>
                </form>
                <div class="text-center mt-3">
                    <a href="login_form.php">DO you already have an account? Login here!
                </div>          
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(
            function(){
                $('#register-form').on('submit', function(e){
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'registration.php',
                        data: $(this).serialize(),
                        success: function(response){
                            if(res.status === 'error'){
                                $('#error-message').text(res.message).show();
                            }else{
                                window.location.href = 'login_form.php';
                            }
                        }
                    })
                })
            }
        )
    </script>
</body>
</html>