<div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" >

                <img src="{{asset('public/frontEnd/')}}/assets/img/logo.png" />
            </a>

        </div>
    </div>
</div>
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">                        

                        <li><a href="{{url('/adminlogin')}}">Admin Login</a></li>
                        <li><a href="{{url('/signup')}}">User Signup</a></li>
                        <li><a href="{{url('/')}}">User Login</a></li>


                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

