@extends('user.layouts.user_master')
@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">My Profile</h4>

            </div>

        </div>
        <div class="row">
            <?php
            $message = Session::get('message');
            if ($message) {
                ?>
                <div class="col-md-6">
                    <div class="alert alert-success" >
                        <strong>Success :</strong> 
                        <?php echo $message; ?>
                    </div>
                </div>

                <?php
                Session::put('message', Null);
            }
            ?>
        </div>  
        
        <div class="row">

            <div class="col-md-9 col-md-offset-1">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        My Profile
                    </div>
                    <div class="panel-body">
                         <form role="form" action="{{url('/update-user-info')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Student ID : </label>
                                {{$profile_info->StudentId}}
                            </div>

                            <div class="form-group">
                                <label>Reg Date : </label>
                                {{$profile_info->created_at}}
                            </div>
                      
                                <div class="form-group">
                                    <label>Last Updation Date : </label>
                                    {{$profile_info->updated_at}}
                                </div>
           


                            <div class="form-group">
                                <label>Profile Status : </label>
                                <?php if ($profile_info->Status == 1) { ?>
                                    <span style="color: green">Active</span>
                                <?php } else { ?>
                                    <span style="color: red">Blocked</span>
                                <?php } ?>
                            </div>


                            <div class="form-group">
                                <label>Enter Full Name</label>
                                <input class="form-control" type="text" name="fullanme" value="{{$profile_info->FullName}}" autocomplete="off" required />
                           
                            </div>


                            <div class="form-group">
                                <label>Mobile Number :</label>
                                <input class="form-control" type="text" name="mobileno" maxlength="10" value="{{$profile_info->MobileNumber}}" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Enter Email</label>
                                <input class="form-control" type="email" name="email" id="emailid" value="{{$profile_info->EmailId}}"  autocomplete="off" required readonly />
                            </div>


                            <button type="submit" name="update" class="btn btn-primary" id="submit">Update Now </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection