@extends('admin.layouts.admin_master')
@section('content')
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Categories</h4>
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
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Categories Listing
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Creation Date</th>
                                        <th>Updation Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($allCategory as $category)
                                    <tr class="odd gradeX">
                                        <td class="center">{{$i}}</td>
                                        <td class="center">{{$category->CategoryName}}</td>
                                        <td class="center"><?php if ($category->Status == 1) { ?>
                                                <a href="#" class="btn btn-success btn-xs">Active</a>
                                            <?php } else { ?>
                                                <a href="#" class="btn btn-danger btn-xs">Inactive</a>
                                            <?php } ?></td>
                                        <td class="center">{{$category->created_at}}</td>
                                        <td class="center">{{$category->updated_at}}</td>
                                        <td class="center">

                                            <a href="{{url('/edit-category/'.$category->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                                <a href="{{url('/category/delete/'.$category->id)}}" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                         </td>
                                       </tr>
                                      <?php $i++; ?>
                                      @endforeach
                                   </tbody>
                                 </table>
                           </div>
                       </div>
                       </div>
                       <!--End Advanced Tables -->
                      </div>
                      </div>
             </div>
        </div>
  @endsection
