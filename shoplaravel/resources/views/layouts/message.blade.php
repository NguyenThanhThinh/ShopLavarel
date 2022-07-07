<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    toastr.options = {
        "positionClass" : "toast-top-center",
    }
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif
</script>
