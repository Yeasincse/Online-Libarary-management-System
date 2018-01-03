@extends('user.layouts.user_master')
@section('content')
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Issued Books</h4>
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
                                            <th>Book Name</th>
                                            <th>ISBN </th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Fine in(BDT)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                               <?php $i=1; ?>
                                        @foreach($book_issued as $book_issued)
                                        <tr class="odd gradeX">
                                            <td class="center">{{$i}}</td>
                                            <td class="center">
                                                <?php 
                                                        $bookname = \App\Books::where('id',$book_issued->BookId)->first();
                                                        echo $bookname->BookName;
                                                    ?>
                                            </td>
                                            <td class="center">
                                                {{$bookname->ISBNNumber}}
                                            </td>
                                            <td class="center">
                                                {{$book_issued->IssuesDate}}
                                            </td>
                                            <td class="center">
                                                <?php if($book_issued->ReturnDate == 'Not Return Yet'){?>
                                                <span style="color:red">
                                                     {{$book_issued->ReturnDate}}
                                                </span>
                                                <?php } else {?>
                                           {{$book_issued->ReturnDate}}
                                                <?php } ?>
                                            </td>
                                              <td class="center"> 
                                               <?php if($book_issued->fine == '0'){?>
                                              
                                                     <?php } else {?>
                                                  {{$book_issued->fine}}
                                               <?php } ?>
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
    </div>
@endsection