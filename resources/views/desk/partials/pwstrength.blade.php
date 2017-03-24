@php
switch (Route::getFacadeRoot()->current()->uri()) {
    case 'senha-redefinir/{token?}':
    case 'registrar':
@endphp
<script type="text/javascript" src="{{'/js/pwstrength-bootstrap.min.js'}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        "use strict";
        var options = {};
        options.ui = {
            container: "#pwd-container",
            showVerdictsInsideProgressBar: true,
            viewports: {
                progress: ".pwstrength_viewport_progress"
            }
        };
        options.common = {
            debug: true,
            onLoad: function () {
                $('#messages').text('Start typing password');
            }
        };
        $(':password').pwstrength(options);

        $(":password").click(function () {
            $("#pwstrength_viewport_progress").show("slow");
        });

    });
</script>
@php
    break;
}
@endphp