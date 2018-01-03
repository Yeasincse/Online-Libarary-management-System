@extends('admin.layouts.admin_master')
@section('content')
<!-- MENU SECTION END-->

 <div class="content-wrapper">
     <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Author</h4>

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
                        Author Info
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{url('/add-author-info')}}" method="post">
                            {{csrf_field()}}
                      
                            <div class="form-group">
                                <label>Author Name</label>
                                <input class="form-control" type="text" name="AuthorName" autocomplete="off"  required />
                            </div>

                            <button type="submit" name="create" class="btn btn-info">Add Author </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection