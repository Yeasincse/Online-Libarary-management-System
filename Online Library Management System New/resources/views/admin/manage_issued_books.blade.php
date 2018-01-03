@extends('admin.layouts.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Issued Books</h4>
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
                        Issued Books 
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Book Name</th>
                                        <th>ISBN </th>
                                        <th>Issued Date</th>
                                        <th>Return Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                  @foreach($manage_isseud_books as $manage_isseud_book)                           
                                            <tr class="odd gradeX">
                                                <td class="center">{{$i}}</td>
                                                <td class="center">
                                                    <?php 
                                                        $name = \App\Student::where('StudentId',$manage_isseud_book->StudentID)->first();
                                                        echo $name->FullName;
                                                    ?>
                                                 </td>
                                                <td class="center">
                                                     <?php 
                                                        $bookname = \App\Books::where('id',$manage_isseud_book->BookId)->first();
                                                        echo $bookname->BookName;
                                                    ?>
                                                    
                                                </td>
                                                <td class="center">{{$bookname->ISBNNumber}}</td>
                                                <td class="center">{{$manage_isseud_book->IssuesDate}}</td>
                                                <td class="center">
                                                   {{$manage_isseud_book->ReturnDate}}
                                                     </td>
                                                <td class="center">

                                                    <a href="{{url('/edit-issued-books/'.$manage_isseud_book->id)}}"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>

                                                </td>
                                            </tr>
                                          <?php $i++;?>  
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