<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

<script src="{{asset('admin/sweetalert2.js')}}"></script>
<script>
    function checkDelete(url) {
//        var check = confirm('Are you sure delete this?');
//        if(check){
//            return true;
//        }else {
//            return false;
//        }


        swal({
            title: 'Are you sure sir?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            window.location.href = url;
            //                swal(
            //                    'Deleted!',
            //                    'Your file has been deleted.',
            //                    'success'
            //                )
        })







    }
</script>
