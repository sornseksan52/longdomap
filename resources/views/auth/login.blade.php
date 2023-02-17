<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style type="text/css">
    .btn-facebook{
        color : white !important;
        background-color: #4267b2 !important;
        border-bottom: 1px solid #4267b2 !important;
    }
    .btn-google{
        color: white !important;
        background-color: #e23939 !important;
        border-bottom: 1px solid #e23939 !important;
    }
</style>

    <p class="text-center" style="margin:20px;">หรือเข้าสู่ระบบด้วย</p>
    <hr/>
    <div class="form-group">
        <div class="col-md-12 text-center" >
            <a href="{{ url('auth/google') }}" target="_blank" class="btn btn-lg btn-success btn-google">
                <i class="fa fa-google"></i> &nbsp; Login With Google
            </a> <hr>
            <a href="{{url('login/facebook')}}" target="_blank" class="btn btn-lg btn-primary btn-facebook">
                <i class="fa fa-facebook"></i> &nbsp; Login with Facebook
            </a>
            <hr/>
        </div>

    </div>

