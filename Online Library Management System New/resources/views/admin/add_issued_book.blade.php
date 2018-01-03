@extends('admin.layouts.admin_master')
@section('content')
<script type="text/javascript">

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

function makerequest(student_sid,objID)
 {
//        alert(email_address);
        //var obj = document.getElementById(objID);
        //serverPage='search.php?text='+given_text+'&abc='+d23;
        serverPage='studentsid-check/'+student_sid;
	xmlhttp.open("GET", serverPage);
	xmlhttp.onreadystatechange = function()
	 {
//	alert(xmlhttp.readyState);
//	alert(xmlhttp.status);
//        alert(hi);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		 {
//			alert(xmlhttp.responseText);
                                 document.getElementById(objID).innerHTML = xmlhttp.responseText;
			
                                 //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
                        
//                                            if(xmlhttp.responseText == 'Alerdy Exists !')
//                                            {
//                                                document.getElementById('submit').disabled=true;
//                                            }
//                                            if(xmlhttp.responseText == 'Avilable')
//                                            {
//                                                document.getElementById('submit').disabled=false;
//                                            }
				if(xmlhttp.responseText == 'This Student Isued A Book But Not Return !'){
					document.getElementById('bookid').disabled=true;
					document.getElementById('submit').disabled=true;
				}else{
					document.getElementById('bookid').disabled=false;
					document.getElementById('submit').disabled=false;
				}
				if(xmlhttp.responseText == 'Invaid Student Id. Please Enter Valid Student id'){
					document.getElementById('bookid').disabled=true;
					document.getElementById('submit').disabled=true;
				}else{
					
					document.getElementById('submit').disabled=false;
				}
		}
	}
xmlhttp.send(null);
}
function getbook(book_isbn,res)
 {
//        alert(book_isbn);
        //var obj = document.getElementById(objID);
        //serverPage='search.php?text='+given_text+'&abc='+d23;
        serverPage='book-isbn-check/'+book_isbn;
	xmlhttp.open("GET", serverPage);
	xmlhttp.onreadystatechange = function()
	 {
//	alert(xmlhttp.readyState);
//	alert(xmlhttp.status);
//        alert(hi);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		 {
//			alert(xmlhttp.responseText);
                                 document.getElementById(res).innerHTML = xmlhttp.responseText;
			
                                 //document.getElementById(objcw).innerHTML = xmlhttp.responseText;
//                        
                                            
											if(xmlhttp.responseText == 'Invalid')
                                            {
                                                document.getElementById('submit').disabled=true;
                                            }
                                            else
                                            {//
                                                document.getElementById('submit').disabled=false;
                                            }
											if(xmlhttp.responseText == 'This Book Are Not Available!')
                                            {
												
                                                document.getElementById('submit').disabled=true;
                                            }
                                            else
                                            {//
												
                                                document.getElementById('submit').disabled=false;
                                            }
											if(xmlhttp.responseText == 'The bookshelf of this book Are Not Available!')
                                            {
												
                                                document.getElementById('submit').disabled=true;
                                            }
                                            else
                                            {//
												
                                                document.getElementById('submit').disabled=false;
                                            }
		 }
	}
xmlhttp.send(null);
}

</script>




     <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issue a New Book</h4>

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
            <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Issue a New Book
                    </div>
                    <div class="panel-body">
                         <form role="form" action="{{url('/add-issued-book-info')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Srtudent id<span style="color:red;">*</span></label>
                                <input class="form-control" onblur="makerequest(this.value, 'get_student_name')" type="text" name="studentid" id="studentid" autocomplete="off"  required />
                               
                            </div>

                            <div class="form-group">
                                <span id="get_student_name" style="font-size:16px;"></span> 
                            </div>





                            <div class="form-group">
                                <label>ISBN Number or Book Title<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="booikid" id="bookid" onBlur="getbook(this.value, 'get_book_name')"  required="required"/>
                            </div>

                            <div class="form-group">
                                <!--<span id="get_book_name" style="font-size:16px;"></span>--> 
                                <select  class="form-control" name="bookdetails" id="get_book_name1" readonly>
                                    <option class="get_book_name" id="get_book_name"></option>
                                </select>
                            </div>
                            <button type="submit" name="issue" id="submit" class="btn btn-info">Issue Book </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection