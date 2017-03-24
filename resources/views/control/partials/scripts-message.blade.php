@if (session('info'))
<script type="text/javascript">
    $(document).ready(function(){
        $.notify({
            icon: 'fa fa-info-circle',
            message: "{{ session('info') }}"

        },{
            type: 'info',
            timer: 4000
        });
    });
</script>
@endif

@if (session('success'))
<script type="text/javascript">
    $(document).ready(function(){
        $.notify({
            icon: 'fa fa-thumbs-up',
            message: "{{ session('success') }}"

        },{
            type: 'success',
            timer: 4000
        });
    });
</script>
@endif

@if (session('warning'))
<script type="text/javascript">
    $(document).ready(function(){
        $.notify({
            icon: 'fa fa-exclamation-circle',
            message: "{{ session('warning') }}"

        },{
            type: 'warning',
            timer: 4000
        });
    });
</script>
@endif

@if (session('danger'))
<script type="text/javascript">
    $(document).ready(function(){
        $.notify({
            icon: 'fa fa-thumbs-down',
            message: "{{ session('danger') }}"
        },{
            type: 'danger',
            timer: 4000
        });
    });
</script>

@endif

@if($errors->all())
    @foreach ($errors->all() as $error)
    <script type="text/javascript">
        $(document).ready(function(){
            $.notify({
                icon: 'fa fa-thumbs-down',
                message: "{{ $error }}"

            },{
                type: 'danger',
                timer: 4000
            });
        });
    </script>
    @endforeach
@endif
