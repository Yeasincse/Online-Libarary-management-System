@extends('admin.layouts.admin_master')
@section('content')
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Books</h4>
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


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Category</th>
                                            <th>Author</th>
											<th>Shelf</th>
                                            <th>ISBN</th>
                                            <th>Price(in BD)</th>
											<th>Total Book</th>
											<th>Total Book(Available)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($books as $book)
                                        <tr class="odd gradeX">
                                            <td class="center">{{$i}}</td>
                                            <td class="center">{{$book->BookName}}</td>
                                            <td class="center">
                                                <?php
                                                
                                                $catId = $book->CatId;
                                                $CategoryName = \App\Category::all()->where('id',$catId)->first();
                                                echo $CategoryName->CategoryName;
                                                ?>
                                            </td>
                                            <td class="center">
                                                <?php
                                                
                                                $AuthorId = $book->AuthorId;
                                                $AuthorName = \App\Authors::all()->where('id',$AuthorId)->first();
                                                echo $AuthorName->AuthorName;
                                                ?>
                                            </td>
											 <td class="center">
                                                <?php
                                                
                                                $shelfId = $book->shelfId;
                                                $shelfName = \App\BookShelf::all()->where('id',$shelfId)->first();
                                                echo $shelfName->ShelfName;
                                                ?>
                                            </td>
                                            <td class="center">{{$book->ISBNNumber}}</td>
                                            <td class="center">{{$book->BookPrice}}</td>
											<td class="center">{{$book->TotalFixedBook}}</td>
											<td class="center">{{$book->TotalBook}}</td>
                                            <td class="center">

                                                <a href="{{url('/edit-book/'.$book->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>
                                          <a href="{{url('/book/delete/'.$book->id)}}" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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

     <!-- CONTENT-WRAPPER SECTION END-->
@endsection
