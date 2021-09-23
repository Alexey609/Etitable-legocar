<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
    
    <!— Bootstrap core CSS —>
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    
    <!— Custom styles for this template —>
    <link href="https://getbootstrap.com/docs/4.3/examples/sign-in/signin.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        min-width: 768px {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
        }
        .file {
            margin-top: 25px;
            margin-bottom: 25px;
        }
        .form-control {
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="text-center">
<form id="reg" class="form-signin" enctype="multipart/form-data" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Ввод данных</h1>
    <div id="errors-reg" style="display: none; color:red"></div>
    <input type="text" name="name" class="form-control" placeholder="Имя">
    <input type="text" name="car" class="form-control" placeholder="Марка машины" autofocus>
<!--    <input type="file" name="pic" class="file" multiple accept="image/*,image/jpeg">-->
    <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
</form>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#reg').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            method: 'POST',
            url: '/user_save.php',
            data: data,
            success: function (data) {
                data = JSON.parse(data);
                $('#errors-reg').text('');
                $('#errors-reg').show();
                if (!data.status) {
                    $('#errors-reg').css('color', 'red');
                    $(data.errors).each(function (key, value) {
                        $('#errors-reg').append(value + '<br>');
                    })
                } else {
                    $('#errors-reg').css('color', 'green');
                    $('#errors-reg').text(data.message);
                }
            }
        });
    })
</script>
</body>
</html>
