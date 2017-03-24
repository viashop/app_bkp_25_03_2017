@if (session('message_success_login'))
<script type="text/javascript">
    $(document).ready(function(){
        custom.showSwalAccount('message-success-login');

        setTimeout(function(){
            location.href="{{ url(session('redirect_user_login')) }}"
        } , 4000);

    });

</script>

    @php
        Session::forget('message_success_login');
        Session::forget('redirect_user_login');
    @endphp

@endif

@if (session('message_error'))
    <script type="text/javascript">
        $(document).ready(function(){
            custom.showSwalAccount('message-error',  '{{ session('message_error') }}' );
        });
    </script>

    @php
        Session::forget('message_error')
    @endphp

@endif

@if (session('message_error_reset_password'))
    <script type="text/javascript">
        $(document).ready(function(){
            custom.showSwalAccount('message-error-reset-password',  '{{session('message_error_reset_password')}}', '{{ route('account.recover') }}' );
        });
    </script>

    @php
        Session::forget('message_error_reset_password');
    @endphp

@endif

@if (session('message_success_reset_password'))
    <script type="text/javascript">
        $(document).ready(function(){
            custom.showSwalAccount('message-success-reset-password');
        });

    </script>

    @php
        Session::forget('message_success_reset_password');
    @endphp

@endif

@if($errors->all())
    @foreach ($errors->all() as $error)
    <script type="text/javascript">
        $(document).ready(function(){
            custom.showSwalAccount('message-error',  '{{ $error }}' );
        });
    </script>
    @endforeach
@endif
