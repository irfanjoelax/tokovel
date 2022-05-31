@if (session('alert-primary'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>{{ session('alert-primary') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('alert-success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('alert-success') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('alert-warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ session('alert-warning') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('alert-danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session('alert-danger') }}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif