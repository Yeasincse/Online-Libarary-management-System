@extends('frontEnd.layouts.master')
@section('content')



<script type="text/javascript">
    function checkPassword() {
        x = document.signup.confirmpassword.value;
        y = document.signup.password.value;
        if (x != y) {

            document.getElementById("pass").innerHTML = "Password and Confirm Password Field do not match  !!";
            document.getElementById("pass_r").innerHTML = "";
            document.getElementById("submit").disabled = true;
//            document.getElementById("confirmPassword").focus();
        } else {
//            document.signup.confirmpassword.focus();
            document.getElementById("pass").innerHTML = "";
            document.getElementById("pass_r").innerHTML = "Password and Confirm Password Field match  !!";
            document.getElementById("submit").disabled = false;
        }
    }
    function checkVercode() {
        x = document.signup.vercode.value;
        y = document.signup.con_vercode.value;
        if (x != y) {
            document.signup.vercode.focus();
            document.getElementById("pass").innerHTML = "";
            document.getElementById("pass_r").innerHTML = "";
            document.getElementById("var").innerHTML = "Verification Code do not match !!";
            document.getElementById("var_r").innerHTML = "";
            document.getElementById("submit").disabled = true;
        } else {
            document.getElementById("pass").innerHTML = "";
            document.getElementById("pass_r").innerHTML = "";
            document.getElementById("var").innerHTML = "";
            document.getElementById("var_r").innerHTML = "Verification Code match !!";
            document.getElementById("submit").disabled = false;
        }
    }
    function checkFullName() {
        name = document.signup.FullName.value.length;
        full_name = document.signup.FullName.value;
        if (name == 0) {
            document.getElementById("f_name").innerHTML = "You  have to input your name !";
            document.getElementById("ff_name").innerHTML = "";
            document.getElementById("submit").disabled = true;
        } else {
            if (full_name.search(/[^a-zA-Z]+/) === -1) {
                document.getElementById("ff_name").innerHTML = "";
                
            } else {
                document.getElementById("f_name").innerHTML = "";
                document.getElementById("ff_name").innerHTML = "Please use betwean a-z or A-Z alphabet !";
               
//                alert("There are non characters.");
            }
            document.getElementById("f_name").innerHTML = "";
            document.getElementById("submit").disabled = false;
        }


    }
    function valid()
    {
        name = document.getElementById("FullName").value;
        MobileNumber = document.getElementById("MobileNumber").value;
        email = document.getElementById("email").value;
        password = document.getElementById("password").value;
        con_vercode = document.getElementById("con_vercode").value;

        return true;
    }
</script>
<script type="text/javascript">
<!--
//Create a boolean variable to check for a valid Internet Explorer instance.
var xmlhttp = false;
//Check if we are using IE.
try {
//If the Javascript version is greater than 5.
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert(xmlhttp);
//alert ("You are using Microsoft Internet Explorer.");
} catch (e) {
  //alert(e);
    
//If not, then use the older active x object.
try {
//If we are using Internet Explorer.
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
} catch (E) {
//Else we must be using a non-IE browser.
xmlhttp = false;
}
}
//alert(typeof XMLHttpRequest1221);
//If we are using a non-IE browser, create a javascript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer");
}

function makerequest(email_address,objID)
 {
       // alert(given_text);
        //var obj = document.getElementById(objID);
        //serverPage='search.php?text='+given_text+'&abc='+d23;
        serverPage='ajax-email-check/'+email_address;
	xmlhttp.open("GET", serverPage);
	xmlhttp.onreadystatechange = function()
	 {
	//alert(xmlhttp.readyState);
	//alert(xmlhttp.status);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		 {
			//alert(xmlhttp.responseText);
                                            document.getElementById(objID).innerHTML = xmlhttp.responseText;
			//document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                                            if(xmlhttp.responseText == 'Alerdy Exists !')
                                            {
                                                document.getElementById('submit').disabled=true;
                                            }
                                            if(xmlhttp.responseText == 'Avilable')
                                            {
                                                document.getElementById('submit').disabled=false;
                                            }
		 }
	}
xmlhttp.send(null);
}

</script>
<hr/>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User Signup</h4>

            </div>

        </div>

        <div class="row">
            <?php
            $message = Session::get('message');
            $sdtid = Session::get('sdtid');
            if ($message) {
                ?>
                <div class="col-md-6">
                    <div class="alert alert-success" >
                        <strong>Success :</strong> 
                        <?php
                        echo $message . ' . ' . $sdtid;
                        ?>
                    </div>

                </div>

                <?php
                Session::put('message', Null);
            }
            ?>
        </div> 

        <div class="row">

            <div class="col-md-9 col-md-offset-1">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        SINGUP FORM
                    </div>
                    <div class="panel-body">
                        <form name="signup" action="{{url('/save-user-details')}}" method="post" onSubmit="return valid();">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Enter Full Name</label>
                                <input class="form-control" id="FullName" onblur="checkFullName()" type="text" name="FullName" autocomplete="off" required />
                                <p id="f_name" style="color: red"></p>
                                <p id="ff_name" style="color: green"></p>
                            </div>


                            <div class="form-group">
                                <label>Mobile Number :</label>
                                <input class="form-control" id="MobileNumber" type="number" name="MobileNumber" maxlength="11" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Enter Email</label>
                                <input class="form-control" id="emailid" type="email" name="email" onblur="makerequest(this.value, 'res')"  autocomplete="off" required  />
                                <span id='res' style="color:red"></span>
                            </div>

                            <div class="form-group">
                                <label>Enter Password</label>
                                <input class="form-control" id="password" type="password" name="password" autocomplete="off" required  />
                           
                            </div>

                            <div class="form-group">
                                <label>Confirm Password </label>
                                <input class="form-control" id="confirmPassword" onblur="checkPassword()"  type="password" name="confirmpassword" autocomplete="off" required  />
                                <p id="pass" style="color: red"></p>
                                <p id="pass_r" style="color: green"></p>
                            </div>
                            <div class="form-group">
                                <label>Verification code : </label>
                                <input type="text" class="form-control1" id="con_vercode" onblur="checkVercode()" name="con_vercode" maxlength="5" autocomplete="off" required  style="height:25px;" />&nbsp;<span style="color: white;background: black;padding: 5px 35px;font-weight: bold;">{{$verification_code}}</span>
                                <input type="hidden" value="{{$verification_code}}" id="vercode" name="vercode" class="form-control">
                                <p id="var" style="color: red"></p>
                                <p id="var_r" style="color: green"></p>
                            </div>                              
                            <button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection