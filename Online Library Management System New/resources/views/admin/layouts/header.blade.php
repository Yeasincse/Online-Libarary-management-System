<div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">

                <img src="{{asset('public/frontEnd/')}}/assets/img/logo.png" />
            </a>

        </div>

        <div class="right-div">
            <a href="{{url('/admin-logout')}}" class="btn btn-danger pull-right">LOG ME OUT</a>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/admin-dashboard')}}" class="menu-top-active">DASHBOARD</a></li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Categories <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/add-category')}}">Add Category</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/manage-category')}}">Manage Categories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Authors <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/add-author')}}">Add Author</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/manage-authors')}}">Manage Authors</a></li>
                            </ul>
                        </li>
						<li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> BookShelf <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/add-shelf')}}">Add shelf</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/manage-shelf')}}">Manage Shelf</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/add-book')}}">Add Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/manage-books')}}">Manage Books</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Issue Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/add-issued-book')}}">Issue New Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/manage-issued-books')}}">Manage Issued Books</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('/reg-students')}}">Reg Students</a></li>

                        <li><a href="{{url('/change-password')}}">Change Password</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>