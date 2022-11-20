@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div type="button" class="close d-flex justify-content-end" data-dismiss="alert" aria-label="Close">&times;</div>
    <strong>Whoops!</strong>
    @foreach ($errors->all() as $error)
    <br>
    {{ $error }}
    @endforeach
</div>
@endif
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <div type="button" class="close d-flex justify-content-end" data-dismiss="alert" aria-label="Close">&times;</div>
    {{ session('success') }}
</div>
@endif
