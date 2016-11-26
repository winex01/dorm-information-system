<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dorm Info System</title>
    <link rel="icon" href="image/logos.png">
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/form-login.css" rel="stylesheet">
</head>

<body>
<div class="navbar navbar-inverse">
    <div class="container">
        <h2 class="text-primary"><span class="glyphicon glyphicon-home"></span>&nbsp;Dormitory Information System</h2>
    </div>
</div>

    <?php include_once('includes/login_form.php'); ?>
    <?php include_once('layout/footer.php'); ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#username').focus();

            $('#buttonSubmit').click(function() {
                var username = $('input[id=username]');
                var password = $('input[id=pwd]');
                var result = '';
                if(username.val() == ''){
                    username.parent().addClass('has-error');
                    username.parent().parent().addClass('has-error');
                    username.next().text('Username is required');
                    username.focus();
                }else{
                    result += '1';
                    username.parent().removeClass('has-error');
                    username.parent().parent().removeClass('has-error');
                    username.next().text('');
                    password.focus();
                }
                if(password.val() == ''){
                    password.parent().addClass('has-error');
                    password.parent().parent().addClass('has-error');
                    password.next().text('Password is required');
                }else{
                    result += '2';
                    password.parent().removeClass('has-error');
                    password.parent().parent().removeClass('has-error');
                    password.next().text('');
                }
                if(result == '12'){
                    $.ajax({
                            url: 'data/Login.php',
                            type: 'post',
                            data: {username:username.val(), password:password.val()},
                            success: function (data) {
                                var html = '';
                                if(data == 0){
                                     html += 'Invalid Username or Password';
                                    $('#msg').html(html);
                                }else{
                                    window.location = data;
                                }  
                            }
                        });
                }                
            });//end #buttonSubmit
        });
    </script>

</body>

</html>
