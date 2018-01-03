@extends('user.layouts.user_master')
@section('content')
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">ADMIN DASHBOARD</h4>
                
                            </div>

        </div>
             
             <div class="row">



            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
                            <?php $i=1;?>
                            @foreach($book_issued as $book_issued)                          
                            <?php $i++; ?>
                            @endforeach
                            <h3><?php $i=$i-1; echo $i; ?></h3>
                            Book Issued
                        </div>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
                            <?php $i=1;?>
                            @foreach($book_issued_no_rtrn as $book_issued_no_rtrn)                          
                            <?php $i++; ?>
                            @endforeach
                            <h3><?php $i=$i-1; echo $i; ?></h3>
                          Books Not Returned Yet
                        </div>
                    </div>
        </div>


            
    </div>
    </div>
@endsection

