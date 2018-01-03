@extends('admin.layouts.admin_master')
@section('content')
<!-- MENU SECTION END-->

<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add category</h4>

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
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Category Info
                    </div>
                    <div class="panel-body">

                        <form role="form" action="{{url('/add-category-info')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" type="text" name="CategoryName" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="Status" id="status" value="1" checked="checked">Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="Status" id="status" value="0">Inactive
                                    </label>
                                </div>

                            </div>
                            <button type="submit" name="create" class="btn btn-info">Add Category</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

