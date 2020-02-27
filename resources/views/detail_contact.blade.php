<!DOCTYPE html>
<html lang="en">

<head>
        <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
            <a class="nav-link" href="/new">New Contact</a>
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

    <div class="container text-center" style="margin-top:20px">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form >
                    <h1 class="h3 mb-3 font-weight-normal">Detail Contact</h1>
                    <img width="150px" src="{{ asset('images\profile.jpg') }}">
                    <div class="row">
                    <div class="col-md-10 offset-md-1">
                    <table class="table" id="table">
                    </table>
                    
                    <div class="row">
                        <div class="col">
                            <input style="background-color:#32cd32" class="btn btn-primary btn-block" type="submit" value="Add to favorite" id="favorite">
                        </div>
                        <div class="col">
                             <input style="background-color:#df1919" class="btn btn-primary btn-block" type="submit" value="Add to block" id="block">
                        </div>
                     </div>
                    
                    </div>
                </form>
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
        var htmls='';
        htmls+='<tr>';
        htmls+='<td>Phone Number<td><td>:<td>'
        htmls+='<td>'+e.data.no_handphone+'<td>'
        htmls+='</tr>';

        htmls+='<tr>';
        htmls+='<td>Name<td><td>:<td>'
        htmls+='<td>'+e.data.name+'<td>'
        htmls+='</tr>';

        htmls+='<tr>';
        htmls+='<td>Address<td><td>:<td>'
        htmls+='<td>'+e.data.address+'<td>'
        htmls+='</tr>';

        htmls+='<tr>';
        htmls+='<td>Email<td><td>:<td>'
        htmls+='<td>'+e.data.email+'<td>'
        htmls+='</tr>';

        $('#table').append(htmls);
    }
});

document.getElementById('favorite').addEventListener('click',function(){
    $.ajax({
    url:'http://localhost:8000/api/create_favorite/' + temp,
    type:'POST',
    success:function(e){
        window.location='';
    },
    error:function(e){
        console.log(e);
    }
})
});

document.getElementById('block').addEventListener('click',function(){
    $.ajax({
    url:'http://localhost:8000/api/create_block/' + temp,
    type:'POST',
    success:function(e){
        window.location='';
    },
    error:function(e){
        console.log(e);
    }
})
});
</script>
</html>
