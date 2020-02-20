<?php
include_once 'site_header.php';
?>
<style>
    .top1{
        background: #000;
        height: 2px;
    }
    .top4{
        background: #FFF;
        height: 2px;

    }
    .top2{
        height: 2px;
        background: red;
    }
    .top3{
        height: 2px;
        background: green;

    }
    .page-header{
        margin: 0 0 0;
        -webkit-tap-highlight-color: rgba(0,0,0,0);
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        line-height: 1.42857143;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        border: none;
        text-align: center;
        color: #FFFFFF;
        background-color: #73c2fb;
        background: #E8F5FF -webkit-gradient(linear, left top, left bottom, from(#4297D5), to(#E8F5FF)) no-repeat;
        height: 110px;
    }
    .page-content{
        padding: 0;
    }
    .row{
        margin-left: 0;
    }
    .rp{
        -webkit-tap-highlight-color: rgba(0,0,0,0);
text-align: center;
box-sizing: border-box;
margin: 0;
padding: 0;
border: none;
font-family: inherit;
font-weight: 500;
line-height: 1.1;
color: inherit;
margin-top: 10px;
margin-bottom: 10px;
font-size: 18px;
    }
    
</style>

<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">

            <?php
//            $current_file = $_SERVER['PHP_SELF'];
//            if (!in_array($current_file, $_SESSION["authorized_menu"]['authorized_menu'])) {
//                echo 'You are not Authorised to access this file';
//                return;
//            }
            ?>

            <div class="page-header row col-lg-12 text-center">
                <div class="col-sm-4">
                    
                </div>
                <div class="col-sm-4 text-center">
                    <h1 class="rp">Republic Of Kenya</h1>
                </div>
                <div class="col-sm-4">
                    
                </div>
               

            </div>
            <!-- /.page-header -->
            <div class="top1 row col-sm-12"></div>
            <div class="top4 row col-sm-12 "></div>
            <div class="top2 row col-sm-12"></div>
            <div class="top4 row col-sm-12"></div>
            <div class="top3 row col-sm-12"></div>
            <div class="top4 row col-sm-12"></div>
            <div class="row">
                <div class="space-6"></div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10">


                </div>
                <div class="col-sm-1">
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<?php include_once 'site_footer.php'; ?>
