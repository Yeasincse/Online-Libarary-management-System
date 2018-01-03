@extends('admin.layouts.admin_master')
@section('content')

<script type="text/javascript">
       function checkPassword() {
        x = document.chngpwd.confirmpassword.value;
        y = document.chngpwd.newpassword.value;
        if (x != y) {

            document.getElementById("pass").innerHTML = "Password and Confirm Password Field do not match  !!";
            document.getElementById("pass_r").innerHTML = "";
            document.getElementById("submit").disabled = true;
//            document.getElementById("confirmPassword").focus();
        } else {
//            document.signup.confirmpassword.focus();
            document.getElementById("pass").innerHTML = "";
            document.getElementById("pass_r").innerHTML = "Password and Confirm Password Field match  !!";
            document.getElementById("submit").disabled = false;
        }
    }
</script>


<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User Change Password</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $message = Session::get('message');
            $exception = Session::get('exception');
            if ($message) {
                ?>
                <div class="col-md-6">
                    <div class="alert alert-success" >
                        <strong>Success :</strong> 
                        <?php
                        echo $message;
                        ?>
                    </div>

                </div>

                <?php
                Session::put('message', Null);
            }
            if ($exception) {
                ?>
                <div class="col-md-6">
                    <div class="alert alert-danger" >
                        <strong>Success :</strong> 
                        <?php
                        echo $exception;
                        ?>
                    </div>

                </div>

                <?php
                Session::put('exception', Null);
            }
            ?>
        </div>  
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Change Password
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{url('/admin-password-change')}}" method="post" name="chngpwd">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Current Password</label>
                                <input class="form-control" type="password" name="password" autocomplete="off" required  />
                            </div>

                            <div class="form-group">
                                <label>Enter Password</label>
                                <input class="form-control" type="password" name="newpassword" autocomplete="off" required  />
                            </div>

                            <div class="form-group">
                                <label>Confirm Password </label>
                                <input class="form-control"  type="password"  onblur="checkPassword()" name="confirmpassword" autocomplete="off" required  />
                           <p id="pass" style="color: red"></p>
                                <p id="pass_r" style="color: green"></p>
                            </div>

                            <button type="submit" name="change" id="submit" class="btn btn-info">Chnage </button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <!---LOGIN PABNEL END-->            


    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection