@extends('user.layouts.user_master')
@section('content')

<script type="text/javascript">
    function valid()
    {
        if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value)
        {
            alert("New Password and Confirm Password Field do not match  !!");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
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
   
                        <form role="form" action="{{url('/change-user-password')}}"  method="post" onSubmit="return valid();" name="chngpwd">
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
                                <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
                            </div>

                            <button type="submit" name="change" class="btn btn-info">Chnage </button> 
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