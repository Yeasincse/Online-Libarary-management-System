@extends('admin.layouts.admin_master')
@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Reg Students</h4>
            </div>


        </div>
        <div class="row">
            <?php
            $message = Session::get('message');
            $block = Session::get('block');
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
           if ($block) {
              
                ?>
                <div class="col-md-6">
                    <div class="alert alert-danger" >
                        <strong>Success :</strong> 
                        <?php
                        echo $block;
                        ?>
                    </div>

                </div>

                <?php
                Session::put('block', Null);
         
            }
            ?>
        </div> 
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Reg Students
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Email id </th>
                                        <th>Mobile Number</th>
                                        <th>Reg Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($alluser as $alluser)
                                    <tr class="odd gradeX">
                                        <td class="center">{{$i}}</td>
                                        <td class="center">{{$alluser->StudentId}}</td>
                                        <td class="center">{{$alluser->FullName}}</td>
                                        <td class="center">{{$alluser->EmailId}}</td>
                                        <td class="center">{{$alluser->MobileNumber}}</td>
                                        <td class="center">{{$alluser->created_at}}</td>
                                        <td class="center">
                                            <?php
                                            if ($alluser->Status == 1) {
                                                echo "Active";
                                            } else {
                                                echo "Blocked";
                                            }
                                            ?>
                                        </td>
                                        <td class="center">
                                            <?php if ($alluser->Status == 1) { ?>
                                                <a href="{{url('/block-user/'.$alluser->id)}}" onclick="return confirm('Are you sure you want to block this student?');"" >  <button class="btn btn-danger"> Inactive</button>
                                                <?php } else { ?>
                                                    <a href="{{url('/unblock-user/'.$alluser->id)}}" onclick="return confirm('Are you sure you want to active this student?');""><button class="btn btn-primary"> Active</button> 
                                                    <?php } ?>   
                                                    </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                    @endforeach 
                                                    </tbody>
                                                    </table>
                                                    </div>

                                                    </div>

                                                    <!--End Advanced Tables -->
                                                    </div>
                                                    </div>

                                                    </div>
                                                    </div>
                                                    </div>
                                                    <!-- CONTENT-WRAPPER SECTION END-->
                                                    @endsection
