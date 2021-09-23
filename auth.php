
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!— Bootstrap core CSS —>
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    
    <!— Custom styles for this template —>
    <link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<form id="auth" class="form-signin" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
    <div id="errors-auth" style="display: none; color:red"></div>
    <input type="email" name="email" class="form-control" placeholder="Email address" autofocus>
    <input class="form-control" type="password" name="password" placeholder="Password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#auth').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            method: 'POST',
            url: '/user_auth.php',
            data: data,
            success: function (data) {
                data = JSON.parse(data);
                $('#errors-auth').text('');
                $('#errors-auth').show();
                if (!data.status) {
                    $('#errors-auth').css('color', 'red');
                    $(data.errors).each(function (key, value) {
                        $('#errors-auth').append(value + '<br>');
                    })
                } else {
                    $('#errors-auth').css('color', 'green');
                    $.each(data.message, function (key, value) {
                        $('#errors-auth').append(
                            key + ' : ' + value + '<br>'
                        )
                    })
                }
            }
        });
    })
</script>
</body>
</html>
