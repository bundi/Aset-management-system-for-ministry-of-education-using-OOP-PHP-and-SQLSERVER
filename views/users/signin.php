
<?php
session_start();
$webpath = $_SERVER['DOCUMENT_ROOT'] . "/AsMoE/";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Login Page - A-School</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
         <link rel="stylesheet" href="../../pnotify/pnotify.custom.min.css" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- text fonts -->
        <link rel="stylesheet" href="../../assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="../../assets/css/ace.min.css" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="../../assets/css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="../../assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="../../assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="../../assets/js/html5shiv.min.js"></script>
        <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-layout blur-login">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="ace-icon fa fa-leaf green"></i>
                                    <span class="red">Aset</span>
                                    <span class="white" id="id-text2">Management System</span>
                                </h1>
                                <h4 class="blue" id="id-company-text">&copy; moe.go.ke</h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                Please Enter Your Information
                                            </h4>

                                            <div class="space-6"></div>

                                            <form method="post" id="login_form">
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <div id="email_error">
                                                                <input type="text" class="form-control" placeholder="Username" name="email" id="username_field"  autofocus/>
                                                                <i class="ace-icon fa fa-user"></i><br>
                                                         
                                                            </div>
                                                            
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                        <div id="password_error">
                                                               <input class="form-control" placeholder="Password" name="password" id="password_field" type="password"/>
                                                               <i class="ace-icon fa fa-lock"></i> <br>
                                                           </div>
                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">

                                                        <button type="button" onclick="loginUser();" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">Login</span>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                            </form>

                                            <div class="space-6"></div>

                                        </div><!-- /.widget-main -->


                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->




                            </div><!-- /.position-relative -->

                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

        <script src="../../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../../pnotify/pnotify.custom.min.js"></script>
        <script src="../../pnotify/custome.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="../../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
            
            
    function loginUser(){
    $('.submit-link').addClass('disabled');
    var notice = new PNotify(options_1);
    var str = $('#login_form').serialize();
    $.ajax({
        type:'POST',
        url: '../../controls/users/manageUser.php?testsubmit=submitted&action=user_sign_in',
        data: str,
        success: function(json) {

            var message = $.parseJSON(json).message;
            $('.validation').remove();
            if ( message.status != true ){
                var fields = $.parseJSON(json).fields;
                for (var i = 0; i < fields.length; i++) {
                    var field = fields[i];
                    //console.log(field.field);
                    $('#'+field.field+'_error').append('<l class="validation" style="color:red;">'+field.error+'</i>')
                }
                
                options.title = 'Error!!!';
                options.type = 'error';
                options.text = message.msg;
                notice.update(options);

            } else {
                $('#email').val('');
                $('#password').val('');
                
                
                options.title = 'Success!!!';
               options.type = 'success';
               options.text = message.msg;   
               notice.update(options);
                  
               setTimeout(function() {
                 location.href="../../index.php";
                },0);
               
                
            }
            $('.submit-link').removeClass('disabled');
            
        },
        error: function (xhr, desc, err){
            
            options.title = 'Error!!!';
           options.type = 'error';
            options.text = 'A network error occured. Please consult your network administrator.';
            notice.update(options);
            $('.submit-link').removeClass('disabled');
            
        }
    });
}
        </script>

    </body>
</html>
