@extends('frontEnd.layouts.master')
@section('content')
<script type="text/javascript">
    function valid()
    {
         if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value)
        {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        } else if (document.chngpwd.vercode.value != document.chngpwd.con_vercode.value)
        {
            alert("Verification Code do not match  !!");
            document.chngpwd.vercode.focus();
            return false;
        }
        return true;
    }
</script>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User Password Recovery</h4>
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
                Session::put('message', NUll);
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
                Session::put('exception', NUll);
         
            }
            ?>
        </div> 
        <!--LOGIN PANEL START-->           
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        LOGIN FORM
                    </div>
                    <div class="panel-body">
                        <form role="form" name="chngpwd" method="post" action="{{url('/user-password-change')}}" onSubmit="return valid();">
                              {{csrf_field()}}
                            <div class="form-group">
                                <label>Enter Reg Email id</label>
                                <input class="form-control" type="email" name="email" required autocomplete="off" />
                            </div>

                            <div class="form-group">
                                <label>Enter Reg Mobile No</label>
                                <input class="form-control" type="text" name="mobile" required autocomplete="off" />
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="newpassword" required autocomplete="off"  />
                            </div>

                            <div class="form-group">
                                <label>ConfirmPassword</label>
                                <input class="form-control" type="password" name="confirmpassword" required autocomplete="off"  />
                            </div>

                               <div class="form-group">
                                <label>Verification code : </label>
                                <input type="text" class="form-control1"  name="con_vercode" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<span style="color: white;background: black;padding: 5px 35px;font-weight: bold;">{{$verification_code}}</span>
                                <input type="hidden" value="{{$verification_code}}" name="vercode" class="form-control">
                            </div>

                            <button type="submit" name="change" class="btn btn-info">Chnage Password</button> | <a href="{{url('/')}}">Login</a>
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