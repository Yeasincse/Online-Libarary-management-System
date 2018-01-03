@extends('frontEnd.layouts.master')
@section('content')
<script type="text/javascript">
      function checkVercode() {
        x = document.login.vercode.value;
        y = document.login.con_vercode.value;
        if (x != y) {
            document.login.con_vercode.focus();
            document.getElementById("var").innerHTML = "Verification Code do not match !!";
            document.getElementById("var_r").innerHTML = "";
            document.getElementById("submit").disabled = true;
        } else {
            document.getElementById("var").innerHTML = "";
            document.getElementById("var_r").innerHTML = "Verification Code match !!";
            document.getElementById("submit").disabled = false;
        }
    }
</script>
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">USER LOGIN FORM</h4>
            </div>
        </div>
        <div class="row">
            <?php
            $message = Session::get('exception');
            
            if ($message) {
                ?>
                <div class="col-md-6">
                    <div class="alert alert-danger" >
                        <strong>Success :</strong> 
                        <?php
                        echo $message;
                        ?>
                    </div>

                </div>

                <?php
                Session::put('exception', Null);
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

                        <form name="login" action="{{url('/user-login-check')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Enter Email id</label>
                                <input class="form-control" type="email" name="emailid" required autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" required autocomplete="off"  />
                                <p class="help-block"><a href="{{url('/user-forgot-password')}}">Forgot Password</a></p>
                            </div>

                            <div class="form-group">
                                <label>Verification code : </label>
                                <input type="text" class="form-contro1l"  name="con_vercode" onblur="checkVercode()" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<span style="color: white;background: black;padding: 5px 35px;font-weight: bold;">{{$verification_code}}</span>
                                <input type="hidden" value="{{$verification_code}}" name="vercode" class="form-control">
                                <p id="var" style="color: red"></p>
                                <p id="var_r" style="color: green"></p>
                            </div> 

                            <button type="submit" name="login" id="submit" class="btn btn-info">LOGIN </button> | <a href="{{url('/signup')}}">Not Register Yet</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        <!---LOGIN PABNEL END-->            


    </div>
</div>
@endsection