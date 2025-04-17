<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDN Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container">
    <form id="myForm">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control">
            <input type="text" id="email" name="email" class="form-control">
            <input type="text" id="phone" name="phone" class="form-control">
            <input type="text" id="password" name="password" class="form-control">
            <input type="text" id="c_password" name="c_password" class="form-control">


        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDN Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container">
    <form id="myForm">
        <div class="form-group">
            <label for="name">Email:</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
    </br>
    <div class="form-group">
        <label for="name">Password:</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/api/auth/register',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Data submitted successfully!');
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });
});

// login
$('#login-form').submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: '/api/auth/login',
        method: 'POST',
        data: formData,
        success: function (response) {
            alert('Login Successful');
            // Handle success (e.g., redirect to dashboard)
        },
        error: function (xhr) {
            alert('Login failed: ' + xhr.responseText);
        }
    });
});

</script>

</body>
</html>
