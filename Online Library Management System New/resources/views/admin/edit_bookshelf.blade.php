@extends('admin.layouts.admin_master')
@section('content')
<!-- MENU SECTION END-->

<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit Shelf</h4>

            </div>

        </div>  
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Shelf Info
                    </div>
                    <div class="panel-body">

                        <form role="form" action="{{url('/update-shelf-info')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Shelf Name</label>
                                <input class="form-control" value="{{$bookshelf->ShelfName}}" type="text" name="ShelfName" autocomplete="off" required />
                              <input class="form-control" value="{{$bookshelf->id}}" type="hidden" name="shelfId" autocomplete="off" required />
                            
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                             <?php $status = $bookshelf->Status;
                             if($status ==1 ){
                             ?>
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
                             <?php } else{?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="Status" id="status" value="0" checked="checked">Inactive
                                    </label>
                                </div>
                                 <div class="radio">
                                    <label>
                                        <input type="radio" name="Status" id="status" value="1" >Active
                                    </label>
                                </div>
                                
                             <?php } ?>
                            </div>
                            <button type="submit" name="create" class="btn btn-info">Update </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

