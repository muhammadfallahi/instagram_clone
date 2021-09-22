<style>
      .alert{
    position: inherit !important;
}
</style>
<div>
 
@if(session('alert'))
<div class="alert alert-danger" role="alert">{{ session('alert') }}</div>
@endif

</div>