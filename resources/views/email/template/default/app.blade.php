<html>

    @include('email.template.default.partials.htmlhead')

    <body style="width:100% !important; color:#333333; background:#f7f7f7; font-family: Helvetica,sans-serif;
        font-size:13px; line-height:130%; margin:0; padding:0;" yahoo="fix">

        <!-- * Header Module * -->
        @include('email.template.default.partials.htmlheader')
        <!-- * End of Header Module * -->

        @yield('main-content')

        <!-- * Image 560x200 Module + Text Module * -->
        @include('email.template.default.partials.htmlfooter')
        <!-- * End of Image 560x200 Module + Text Module * -->
        <!-- * Footer Module * -->
        @include('email.template.default.partials.htmlcopyright')
        <!-- * End of Footer Module * -->
    </body>
</html>
