
<!DOCTYPE html>
<html lang="en">

<head>
        <title>Favorite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="list-contact">Contact</a>
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
                    <h1 class="h3 mb-3 font-weight-normal">Favorite</h1>
                    <img width="100px" src="{{ asset('images\bintang.jpg') }}">
                    <div class="row">
                    <div class="col-md-10 offset-md-1">
                    <div class="form-group">
                   
                </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>List Favorite Contact</th>  
                        </tr>
                        <tr>
                            <th> 
                            <input class="search" type="search" placeholder="Search...">               
                            <input class="button" type="submit" value="Search">       
                            </th>            
                        </tr>
                        <div class="col-md-10 offset-md-1">
                            <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="data">
                     
                    </tbody>
            </table>
        </div>
                         </thead>
                    </table>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
$.ajax({
    url:'api/get_all_favorite',
    type:'GET',
    success:function(e){
        var data = e.data;
        var htmls='';
        for(var i=0 ; i<data.length ; i++){
            var htmls='<tr>';
            htmls+= '<td>' +(i+1)+'</td>';
            htmls+= '<td>' +data[i].name+'</td>';
            htmls+= '<td>' +data[i].no_handphone+'</td>';
            htmls+= '<td><button onclick="unfavoriteContact('+data[i].id+')">Unfavorite</button></td>';
            htmls+='</tr>';
            $('#data').append(htmls);
            htmls='';
        } 
        
    }
});
function unfavoriteContact($id){
    $.ajax({
        url:'api/unfavorite_contact_by_id/'+$id,
        type:'DELETE',
        success:function(){
            window.location='/favorite';
        }
    });
}
</script>


</html>