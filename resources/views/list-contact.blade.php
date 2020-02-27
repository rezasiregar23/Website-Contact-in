<!DOCTYPE html>
<html lang="en">

<head>
        <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
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

    <div class="container">
    <h1 class="text-center">List Contact</h1>
    <div class="row">
        <div class="form-group">
            <tr>
                <td><input type="text" size="30" name="Search" class="form-control" placeholder="Search" required
                        autofocus></td>
            </tr>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-sm btn-primary btn-block" type="submit">Search</button>
            </div>
        </div>
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
    </div>
    <div class="row">
        <div class="col">
            <div class="text-right">
                <a href="contact-new.php" class="btn btn-sm btn-success">New Contact</a>
                <button style="background-color:red" class="btn btn-sm btn-success" id="deleteAll">Delete All</button>
            </div>
        </div>
    </div>
</div>

</body>

<script>
$.ajax({
    url:'api/get_all_contacts',
    type:'GET',
    success:function(e){
        var data = e.data;
        var htmls='';
        for(var i=0 ; i<data.length ; i++){
            var htmls='<tr>';
            htmls+= '<td>' +(i+1)+'</td>';
            htmls+= '<td>' +data[i].name+'</td>';
            htmls+= '<td>' +data[i].no_handphone+'</td>';
            htmls+= '<td><button onclick="viewItem('+data[i].id+')">View</button><button onclick="editItem('+data[i].id+')">Edit</button><button onclick="deleteData('+data[i].id+')">Delete</button></td>';
            htmls+='</tr>';
            $('#data').append(htmls);
            htmls='';
        } 
        
    }
});
function deleteData($id){
    $.ajax({
        url:'api/delete_contact_by_id/'+$id,
        type:'DELETE',
        success:function(){
            window.location='/list';
        }
    });
}
function viewItem($id){
    window.location = 'http://localhost:8000/detail/'+$id;

}

function editItem($id){
    window.location = 'http://localhost:8000/edit/'+$id;
}

    document.getElementById("deleteAll").addEventListener("click",function(){
        $.ajax({
        url:'api/delete_all_contacts',
        type:'DELETE',
        success:function(e){
            window.location = 'http://localhost:8000/list';
        },
        error:function(e){
            console.log(e);
        }
    });
    })
</script>
</html>
