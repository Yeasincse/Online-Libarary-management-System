@extends('admin.layouts.admin_master')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issued Book Details</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Issued Book Details
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{url('/update-return-isseud-book')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Student Name :</label>
                                <?php
                                $name = \App\Student::where('StudentId', $issuedbook->StudentID)->first();
                                echo $name->FullName;
                                ?>
                                <input class="form-control" type="hidden" value="{{$issuedbook->id}}" name="Issued_id" id="fine"  required />
								<input class="form-control" type="hidden" value="{{$issuedbook->BookId}}" name="book_id" id="fine"  required />
                            </div>

                            <div class="form-group">
                                <label>Book Name :</label>
                                <?php
                                $bookname = \App\Books::where('id', $issuedbook->BookId)->first();
                                echo $bookname->BookName;
                                ?>

                            </div>


                            <div class="form-group">
                                <label>ISBN :</label>
                                {{$bookname->ISBNNumber}}
                            </div>

                            <div class="form-group">
                                <label>Book Issued Date :</label>
                                {{$issuedbook->IssuesDate}}
                            </div>


                            <div class="form-group">
                                <label>Book Returned Date :</label>
                                {{$issuedbook->ReturnDate}}
                            </div>

                            <div class="form-group">
                                <label>Fine (in BDT) :</label>
                                <?php
                                if ($issuedbook->fine == NULL) {
                                    ?>
                                    <input class="form-control" type="text" name="fine" id="fine"  required />

                                    <?php
                                } else {
                                    echo $issuedbook->fine;
                                }
                                ?>
                            </div>

                            <?php if ($issuedbook->fine == NULL) { ?>
                                <button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button>
                            <?php } else { ?>
                                <a href="{{url('/manage-issued-books')}}"><button type="button" name="" id="" class="btn btn-info"> Return Back </button></a>
                            <?php } ?>
                        </form>
                    </div>



                </div>
            </div>
        </div>

    </div>

</div>

@endsection