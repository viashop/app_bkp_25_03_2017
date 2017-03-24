<!--   Core JS Files   -->
<script src="/fw/material-pro/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="/fw/material-pro/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/fw/material-pro/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/fw/material-pro/assets/js/material.min.js" type="text/javascript"></script>
<script src="/fw/material-pro/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="/fw/material-pro/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/fw/material-pro/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="/fw/material-pro/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="/fw/material-pro/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="/fw/material-pro/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="/fw/material-pro/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="/fw/material-pro/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="/fw/material-pro/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="/fw/material-pro/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="/fw/material-pro/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="/fw/material-pro/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="/fw/material-pro/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/fw/material-pro/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="/fw/material-pro/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="/fw/material-pro/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="/fw/material-pro/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="/fw/material-pro/assets/js/custom.js"></script>
<script type="text/javascript">
    $().ready(function() {
        custom.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>
@include('account.partials.scriptsmessage')
