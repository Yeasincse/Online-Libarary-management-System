@extends('admin.layouts.admin_master')
@section('content')
<!-- MENU SECTION END-->

     <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit Book</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Book Info
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{url('/update-book-info')}}" method="post" name="edit_book">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Book Name<span style="color:red;">*</span></label>
                                <input class="form-control" value="{{$book->BookName}}" type="text" name="BookName" autocomplete="off"  required />
                            <input class="form-control" value="{{$book->id}}" type="hidden" name="id" autocomplete="off"  required />
                            </div>

                            <div class="form-group">
                                <label> Category<span style="color:red;">*</span></label>
                                <select class="form-control" name="CatId" required="required">
                                    <option value=""> Select Category</option>
                                   @foreach($allCategory as $category)
                                            <option value="{{$category->id}}">{{$category->CategoryName}}</option>
                                      @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label> Author<span style="color:red;">*</span></label>
                                <select class="form-control" name="AuthorId" required="required">
                                    <option value=""> Select Author</option>
                                      @foreach($allAuthors as $Authors)
                                            <option value="{{$Authors->id}}">{{$Authors->AuthorName}}</option>
                                      @endforeach
                                </select>
                            </div>
								<div class="form-group">
                                <label> Shelf<span style="color:red;">*</span></label>
                                <select class="form-control" name="shelfId" required="required">
                                    <option value=""> Select Shelf</option>
                                      @foreach($bookShelf as $bookShelf)
                                            <option value="{{$bookShelf->id}}">{{$bookShelf->ShelfName}}</option>
                                      @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ISBN Number<span style="color:red;">*</span></label>
                                <input class="form-control" value="{{$book->ISBNNumber}}" type="text" name="ISBNNumber"  required="required" autocomplete="off"  />
                                <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
                            </div>

                            <div class="form-group">
                                <label>Price<span style="color:red;">*</span></label>
                                <input class="form-control" value="{{$book->BookPrice}}" type="text" name="BookPrice" autocomplete="off"   required="required" />
                            </div>
							<div class="form-group">
                                <label>Total Book<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="TotalBook" value="{{$book->TotalFixedBook}}" autocomplete="off"   required="required" />
                            </div>
                            <button type="submit" name="add" class="btn btn-info">Update </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
<script type="text/javascript">

document.forms['edit_book'].elements['CatId'].value='<?php echo $book->CatId?>';
document.forms['edit_book'].elements['AuthorId'].value='<?php echo $book->AuthorId?>';
document.forms['edit_book'].elements['shelfId'].value='<?php echo $book->shelfId?>';
</script>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection
