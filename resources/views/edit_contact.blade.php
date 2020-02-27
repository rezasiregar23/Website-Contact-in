<!DOCTYPE html>
<html lang="en">

<head>
        <title>Contact-in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php">Contact</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/list">List Contact</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/order/new">New Contact</a>
        </li>
                <li class="nav-item active">
            <a class="nav-link" href="/contact">Favorite</a>
        </li>
               <li class="nav-item active">
            <a class="nav-link" href="/block">Block</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/">Exit</a>
        </li>
            </ul>
</nav>

    <div class="container" style="margin-top:20px">
    <h1 class="text-center">Edit Contact</h1>
    <h6 class="text-center">For new contact, please complete the following form.</h6>
    <div class="col-md-11 offset-md-5">
    <img width= "90px" src="{{ asset('images/tambah.jpg') }}">
    </div>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer"><b>Contact Name*</b></label>
                            <input type="text" id="contact" name="contact" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="phone"><b>Phone Number*</b></label>
                            <input type="text" id="phonenumber" name="phone number" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="address"><b>Address</b></label>
                            <textarea rows="2" id="address" name="address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 border-left">
                        <div class="form-group">
                            <label for="gender"><b>Gender</b></label>
                            <select name="cake" class="form-control" id="gender">
                                <option value="BRNIES00">Male</option>
                                <option value="BRNIES01">Female</option>
                                <option value="BRNIES02">Unknown</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone"><b>E-mail</b></label>
                            <input type="email" id="email" name="E-mail" class="form-control" value="">
                        </div>
                        <span><i><b>Note:</b> fields with * are required</i></span>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <input class="btn btn-primary btn-block" type="submit" value="Edit" id="edit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="place-order">
                </div>
            
        </div>
    </div>
</div>

</body>
<script>
    var url = window.location.pathname;
var id = url.split('/');
var temp = id[id.length-1];
$.ajax({
    url:'http://localhost:8000/api/get_detail/' + temp,
    type:'GET',
    success:function(e){
        document.getElementById('phonenumber').value = e.data.no_handphone;
        document.getElementById('contact').value = e.data.name;
        document.getElementById('address').value = e.data.address;
        document.getElementById('email').value = e.data.email;
    }
});


document.getElementById("edit").addEventListener("click",function(){
    var contactName=document.getElementById("contact").value;
    var phoneNumber=document.getElementById("phonenumber").value;
    var address=document.getElementById("address").value;
    var email=document.getElementById("email").value;
    $.ajax({
            url:'http://localhost:8000/api/update_contact/'+temp,
            type:'PUT',
            data:{
                'no_handphone':phoneNumber,
                'name':contactName,
                'email':email,
                'address':address
            },
            success: function(e){
                window.location='/list';
            }
        });
});

</script>

</html>