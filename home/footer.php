<!-- jQuery 3 -->
<script src="../plugins/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/dist/js/select2.full.min.js"></script>
<!-- Morris.js charts -->
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/morris.js/morris.min.js"></script>

<!-- DataTables -->
<script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Sparkline -->
<script src="../plugins/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/min/moment.min.js"></script>
<script src="../plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

</body>
</html>

<script>

    var AdminLTEOptions = {
        //Enable sidebar expand on hover effect for sidebar mini
        //This option is forced to true if both the fixed layout and sidebar mini
        //are used together
        sidebarExpandOnHover: true,
        //BoxRefresh Plugin
        enableBoxRefresh: true,
        //Bootstrap.js tooltip
        enableBSToppltip: true
    };
    /** add active class and stay opened when selected */
    var url = window.location;

// for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function () {
        return this.href == url;
    }).parent().addClass('active');

// for treeview
    $('ul.treeview-menu a').filter(function () {
        return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
    
     

    

</script>