 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="css/plugins/pace/pace.css" rel="stylesheet">
        <script src="js/plugins/pace/pace.js"></script>
        <!-- GLOBAL STYLES - Include these on every page. -->
        <link href="css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
        <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- PAGE LEVEL PLUGIN STYLES -->
        <!-- THEME STYLES - Include these on every page. -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/plugins.css" rel="stylesheet">
        <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
        <link href="css/demo.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <?php
// show potential errors / feedback (from registration object)
//    if (isset($employee)) {
//        if ($employee->errors) {
//            foreach ($employee->errors as $error) {
//                echo $error;
//            }
//        }
//        if ($employee->messages) {
//            foreach ($employee->messages as $message) {
//                echo $message;
//            }
//        }
//    }
    ?>
    <body>

        <div id="wrapper">
<?php
            include("views/top_nav.php");
            include("views/left_nav.php");
            ?>
            <!-- begin MAIN PAGE CONTENT -->
            <div id="page-wrapper">

                <div class="page-content">

                    <!-- begin PAGE TITLE ROW -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-title">
                                <div class="col-md-6">
                                    <h1>Departments Sales 
                                    <!--<small>Table Options</small>-->
                                    
                                </h1>
                                </div>
                                <!--                            <ol class="breadcrumb">
                                                                <li><i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                                                </li>
                                                                <li class="active">Basic Tables</li>
                                                            </ol>-->
                               
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <!-- end PAGE TITLE ROW -->

                <!-- begin MAIN PAGE ROW -->
                <div class="row">
                                    
<!--                <div class="tile green" style="height: 320px">
                                    <h4><i class="fa fa-usd"></i> Revenue Breakdown <a href="javascript:;"><i class="fa fa-refresh pull-right"></i></a>
                                    </h4>
                                    <p class="small text-faded">
                                        Today:
                                        <strong>$324.20 -</strong>
                                        Week:
                                        <strong>$1,230.43</strong>
                                    </p>
                                    <div id="morris-chart-dashboard" style="position: relative;"></div></div>-->
                    <div class="green"><div id="morris-chart-dashboard"></div></div>
                  
                  
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <div class="row">
                    &nbsp;
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="panel-heading">
    <h1 class="panel-title">
     Bar chart
     
  </h1>
</div>
                    <div id="pnl_barchart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                </div>

                </div>
                <!-- /.page-content -->

            </div>
            <!-- /#page-wrapper -->
            <!-- end MAIN PAGE CONTENT -->

        </div>
        <!-- /#wrapper -->
        <!-- GLOBAL SCRIPTS -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
        <script src="js/plugins/popupoverlay/defaults.js"></script>

        <!-- /#logout -->
        <!-- Logout Notification jQuery -->
        <!-- HISRC Retina Images -->

        <!-- PAGE LEVEL PLUGIN SCRIPTS -->

        <!-- THEME SCRIPTS -->
        <script src="js/flex.js"></script>
        <script src="js/calculate.js"></script>
        <script src="js/calculate_yearwise.js"></script>
         <!-- Morris Charts -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript">
        //Morris Area Chart
var sales_data = [{
    date: '2008',
    RoomsDepartment: 767165.28,
    FnBDepartment: 221453.96,
    MinorOperatingDepartment: 18867,
}, {
    date: '2009',
    RoomsDepartment: 1252454.20,
    FnBDepartment: 320264.35,
    MinorOperatingDepartment: 20395,
},  ];
Morris.Area({
    element: 'morris-chart-dashboard',
    data: sales_data,
    xkey: 'date',
    xLabelFormat: function(date) {
        //return (date.getMonth() + 1) + '/' + date.getDate() + '/' + date.getFullYear();
        return date.getFullYear();
    },
    xLabels: 'day',
    ykeys: ['RoomsDepartment', 'FnBDepartment', 'MinorOperatingDepartment'],
    yLabelFormat: function(y) {
        //return "$" + y;
        return  y;
    },
    labels: ['Room Department', 'FOOD & BEVERAGE DEPARTMENT', 'Minor Operating Department'],
    lineColors: ['#fff', '#fff', '#fff', '#fff'],
    hideHover: 'auto',
    resize: true,
    gridTextFamily: ['Open Sans'],
    gridTextColor: ['rgba(255,255,255,0.7)'],
    fillOpacity: 0.1,
    pointSize: 0,
    smooth: true,
    lineWidth: 2,
    grid: true,
    dateFormat: function(date) {
        d = new Date(date);
        //return (d.getMonth() + 1) + '/' + d.getDate() + '/' + d.getFullYear();
        return  d.getFullYear();
    },
});

Morris.Bar({
         element: 'pnl_barchart',
         data: [
            {y: 'Room Department', a: 682777, b: 1119694},
            {y: 'Food and Beverage Department', a: 87277,  b: 126588},
            {y: 'Minor Operating Department', a: 11829,  b: 12869},
            {y: 'Total Sales', a: 1037183,  b: 1634679},
            {y: 'Net Profit or Loss', a: 432138,  b: 510446}
         ],
         xkey: 'y',
         ykeys: ['a', 'b'],
         labels: ['2008', '2009']
      });

        </script>
         <!-- /#logout -->
   

   
  
    </body>

</html>
