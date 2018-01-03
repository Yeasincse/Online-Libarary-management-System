@extends('admin.layouts.admin_master')
@section('content')
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

function makerequest(isbn_no,objID)
 {
//        alert(isbn_no);
        //var obj = document.getElementById(objID);
        //serverPage='search.php?text='+given_text+'&abc='+d23;
        serverPage='isbn-no-check/'+isbn_no;
	xmlhttp.open("GET", serverPage);
	xmlhttp.onreadystatechange = function()
	 {
//	alert(xmlhttp.readyState);
	//alert(xmlhttp.status);
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		 {
//                     alert(hi);
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
<script>
    function checkFullName() {
      
	   name = document.add_book.BookName.value.length;
        full_name = document.add_book.BookName.value;
        if (name == 0) {
            document.getElementById("f_name").innerHTML = "You  have to input your book name !";
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
</script>
<!-- MENU SECTION END-->

     <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Book</h4>

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
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Book Info
                    </div>
                    <div class="panel-body">
                        <form role="form" name="add_book" action="{{url('/add-book-info')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Book Name<span style="color:red;">*</span></label>
                                <input class="form-control" type="text"  onblur="checkFullName()" name="BookName" autocomplete="off"  required />
                           <p id="f_name" style="color: red"></p>
                                <p id="ff_name" style="color: green"></p>
						  </div>

                            <div class="form-group">
                                <label> Category<span style="color:red;">*</span></label>
                                <select class="form-control" name="CatId" required="required">
                                    <option value=""> Select Category</option>
                                   @foreach($allCategory as $category)
                                            <option value="{{$category->id}}">{{$category->CategoryName}}</option>
                                      @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label> Author<span style="color:red;">*</span></label>
                                <select class="form-control" name="AuthorId" required="required">
                                    <option value=""> Select Author</option>
                                      @foreach($allAuthors as $Authors) 
                                            <option value="{{$Authors->id}}">{{$Authors->AuthorName}}</option>
                                      @endforeach
                                </select>
                            </div>
							<div class="form-group">
                                <label> Book Shelf<span style="color:red;">*</span></label>
                                <select class="form-control" name="shelfId" required="required">
                                    <option value=""> Select Shelf</option>
                                     @foreach($bookShelf as $bookShelf)
									  <option value="{{$bookShelf->id}}">{{$bookShelf->ShelfName}}</option>
                                           
                                      @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ISBN Number<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="ISBNNumber" onblur="makerequest(this.value, 'res')"   required="required" autocomplete="off"  />
                                 <span id='res' style="color:red"></span>
                                <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
                            </div>

                            <div class="form-group">
                                <label>Price<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="BookPrice" autocomplete="off"   required="required" />
                            </div>
							 <div class="form-group">
                                <label>Total Book<span style="color:red;">*</span></label>
                                <input class="form-control" type="text" name="TotalBook" autocomplete="off"   required="required" />
                            </div>
                            <button type="submit" name="add" id="submit" class="btn btn-info">Add Book</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
@endsection
