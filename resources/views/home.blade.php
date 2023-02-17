
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container">        
    <form action="/action_page.php">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="email" class="form-control" placeholder="Enter name" id="name">
        </div>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd">
        </div>
        <button type="button" class="btn btn-primary" onclick="get_validate()">Submit</button>
    </form>
</div>

{{ csrf_field() }}

<script>
    function get_validate(){
        
    $.ajax({
            type: "post",
            url:"{{URL::to('/verifydata')}}",
            data:{name:$('#name').val() ,email : $('#email').val(),_token: "{{ csrf_token() }}" },
            success:function(data){
                console.log(data);
            },
            error: function (xhr) {
                if (xhr.status == 422) {
                    var errors = JSON.parse(xhr.responseText);
                    if (errors.name) {
                        alert('Name is required'); // and so on
                    }
                }
            }
        });
    }
</script>

