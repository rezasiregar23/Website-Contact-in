
<!DOCTYPE html>
<html lang="en">

<head>
        <title>Contact</title>
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
            <a class="nav-link" href="/new">New Contact</a>
        </li>
                <li class="nav-item active">
            <a class="nav-link" href="/contact">Favorite</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/favorite">Block</a>
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
                    <h1 class="h3 mb-3 font-weight-normal">Blocked Contact</h1>
                    <img width="150px" src="{{ asset('images\kunci.jpg') }}">
                    <div class="row">
                    <div class="col-md-10 offset-md-1">
                    <table class="table">
                    <thead>
                    <tr>
                        <th>List Blocked Contact</th>  
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
    url:'api/get_all_block',
    type:'GET',
    success:function(e){
        var data = e.data;
        var htmls='';
        for(var i=0 ; i<data.length ; i++){
            var htmls='<tr>';
            htmls+= '<td>' +(i+1)+'</td>';
            htmls+= '<td>' +data[i].name+'</td>';
            htmls+= '<td>' +data[i].no_handphone+'</td>';
            htmls+= '<td><button onclick="unblockContact('+data[i].id+')">Unblock</button></td>';
            htmls+='</tr>';
            $('#data').append(htmls);
            htmls='';
        } 
        
    }
});
function unblockContact($id){
    $.ajax({
        url:'api/unblock_contact_by_id/'+$id,
        type:'DELETE',
        success:function(){
            window.location='/block';
        }
    });
}
</script>
</html>