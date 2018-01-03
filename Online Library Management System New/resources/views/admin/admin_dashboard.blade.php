@extends('admin.layouts.admin_master')
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
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
                            <?php $i=1;?>
                            @foreach($book as $book)                          
                            <?php $i++; ?>
                            @endforeach
                            <h3><?php $i=$i-1; echo $i; ?></h3>
                      Books Listed
                        </div>
                    </div>

            
                 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
                           <?php $i=1;?>
                            @foreach($book_isseud as $book_isseud)
                           
                            <?php $i++; ?>
                            @endforeach
                              <h3><?php $i=$i-1; echo $i; ?></h3>
                           Times Book Issued
                        </div>
                    </div>
             
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
                             <?php $i=1;?>
                            @foreach($book_isseud_rtrn as $book_isseud_rtrn)                          
                            <?php $i++; ?>
                            @endforeach
                             <h3><?php $i=$i-1; echo $i; ?></h3>
                          Times  Books Returned
                        </div>
                    </div>
               <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <?php $i=1;?>
                            @foreach($alluser as $alluser)                  
                            <?php $i++; ?>
                            @endforeach
                             <h3><?php $i=$i-1; echo $i; ?></h3>
                           Registered Users
                        </div>
                    </div>

        </div>



 <div class="row">

 <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-user fa-5x"></i>
                            <?php $i=1;?>
                            @foreach($author as $author)                  
                            <?php $i++; ?>
                            @endforeach
                            <h3><?php $i=$i-1; echo $i; ?></h3>
                      Authors Listed
                        </div>
                    </div>

            
                 <div class="col-md-3 col-sm-3 rscol-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-file-archive-o fa-5x"></i>
                            <?php $i=1;?>
                            @foreach($category as $category)                         
                            <?php $i++; ?>
                            @endforeach
                          <h3><?php $i=$i-1; echo $i; ?></h3>
                           Listed Categories
                        </div>
                    </div>
             
        </div>             

             <div class="row">
              <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
                    <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                   
                    <div class="carousel-inner">
                        <div class="item active">

                            <img src="{{asset('public/frontEnd/')}}/assets/img/1.jpg" alt="" />
                           
                        </div>
                        <div class="item">
                            <img src="{{asset('public/frontEnd/')}}/assets/img/2.jpg" alt="" />
                          
                        </div>
                        <div class="item">
                            <img src="{{asset('public/frontEnd/')}}/assets/img/3.jpg" alt="" />
                           
                        </div>
                    </div>
                    <!--INDICATORS-->
                     <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                    <!--PREVIUS-NEXT BUTTONS-->
                     <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
                </div>
              </div>                        
            
             </div>
            
    </div>
    </div>
@endsection