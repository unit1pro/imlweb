<!-- footer content -->
<footer class="footer_fixed">
    <div class="pull-right">
        Indian Music Lab - A&R Manager
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>



<!-- FastClick -->
<script src="<?php echo base_url(); ?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url(); ?>/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="<?php echo base_url(); ?>/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- morris.js -->
<script src="<?php echo base_url(); ?>/vendors/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/morris.js/morris.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url(); ?>/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url(); ?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url(); ?>/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo base_url(); ?>/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url(); ?>/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url(); ?>/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url(); ?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url(); ?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url(); ?>/vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url(); ?>/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url(); ?>/vendors/iCheck/icheck.min.js"></script>

<!-- bootstrap-wysiwyg -->
<script src="<?php echo base_url(); ?>/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?php echo base_url(); ?>/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?php echo base_url(); ?>/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?php echo base_url(); ?>/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?php echo base_url(); ?>/vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Autosize -->
<script src="<?php echo base_url(); ?>/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?php echo base_url(); ?>/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?php echo base_url(); ?>/vendors/starrr/dist/starrr.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url(); ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url(); ?>/build/js/custom.js"></script>
<!--<script>
  $(document).ready(function() {
    //random data
    var d1 = [
      [0, 1],
      [1, 9],
      [2, 6],
      [3, 10],
      [4, 5],
      [5, 17],
      [6, 6],
      [7, 10],
      [8, 7],
      [9, 11],
      [10, 35],
      [11, 9],
      [12, 12],
      [13, 5],
      [14, 3],
      [15, 4],
      [16, 9]
    ];

    //flot options
    var options = {
      series: {
        curvedLines: {
          apply: true,
          active: true,
          monotonicFit: true
        }
      },
      colors: ["#26B99A"],
      grid: {
        borderWidth: {
          top: 0,
          right: 0,
          bottom: 1,
          left: 1
        },
        borderColor: {
          bottom: "#7F8790",
          left: "#7F8790"
        }
      }
    };
    var plot = $.plot($("#placeholder3xx3"), [{
      label: "Registrations",
      data: d1,
      lines: {
        fillColor: "rgba(150, 202, 89, 0.12)"
      }, //#96CA59 rgba(150, 202, 89, 0.42)
      points: {
        fillColor: "#fff"
      }
    }], options);
  });
</script>-->
<!-- /Flot -->

<!-- jQuery Sparklines -->
<script>
//      $(document).ready(function() {
//        $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
//          type: 'bar',
//          height: '40',
//          barWidth: 9,
//          colorMap: {
//            '7': '#a1a1a1'
//          },
//          barSpacing: 2,
//          barColor: '#26B99A'
//        });
//
//        $(".sparkline_two").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {
//          type: 'line',
//          width: '200',
//          height: '40',
//          lineColor: '#26B99A',
//          fillColor: 'rgba(223, 223, 223, 0.57)',
//          lineWidth: 2,
//          spotColor: '#26B99A',
//          minSpotColor: '#26B99A'
//        });
//      });
//    </script>
<!-- /jQuery Sparklines -->

<!-- Doughnut Chart -->
<!--    <script>
  $(document).ready(function() {
    var options = {
      legend: false,
      responsive: false
    };

    new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: {
        labels: [
          "Symbian",
          "Blackberry",
          "Other",
          "Android",
          "IOS"
        ],
        datasets: [{
          data: [15, 20, 30, 10, 30],
          backgroundColor: [
            "#BDC3C7",
            "#9B59B6",
            "#E74C3C",
            "#26B99A",
            "#3498DB"
          ],
          hoverBackgroundColor: [
            "#CFD4D8",
            "#B370CF",
            "#E95E4F",
            "#36CAAB",
            "#49A9EA"
          ]
        }]
      },
      options: options
    });
  });
</script>-->
<!-- /Doughnut Chart -->

<!-- bootstrap-daterangepicker -->
<script type="text/javascript">
    $(document).ready(function () {

        var cb = function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Clear',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function () {
            console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function () {
            console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
            console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
            console.log("cancel event fired");
        });
        $('#options1').click(function () {
            $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function () {
            $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function () {
            $('#reportrange').data('daterangepicker').remove();
        });
    });
</script>
<!-- /bootstrap-daterangepicker -->

<!-- morris.js -->
<!--    <script>
  $(document).ready(function() {
    Morris.Bar({
      element: 'graph_bar',
      data: [
        { "period": "Jan", "Hours worked": 80 }, 
        { "period": "Feb", "Hours worked": 125 }, 
        { "period": "Mar", "Hours worked": 176 }, 
        { "period": "Apr", "Hours worked": 224 }, 
        { "period": "May", "Hours worked": 265 }, 
        { "period": "Jun", "Hours worked": 314 }, 
        { "period": "Jul", "Hours worked": 347 }, 
        { "period": "Aug", "Hours worked": 287 }, 
        { "period": "Sep", "Hours worked": 240 }, 
        { "period": "Oct", "Hours worked": 211 }
      ],
      xkey: 'period',
      hideHover: 'auto',
      barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
      ykeys: ['Hours worked', 'sorned'],
      labels: ['Hours worked', 'SORN'],
      xLabelAngle: 60,
      resize: true
    });

    $MENU_TOGGLE.on('click', function() {
      $(window).resize();
    });
  });
</script>-->


<!-- /morris.js -->

<!-- Skycons -->
<!--    <script>
  var icons = new Skycons({
      "color": "#73879C"
    }),
    list = [
      "clear-day", "clear-night", "partly-cloudy-day",
      "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
      "fog"
    ],
    i;

  for (i = list.length; i--;)
    icons.set(list[i], list[i]);

  icons.play();
</script>-->
<!-- /Skycons -->

<!-- gauge.js -->
<!--    <script>
  var opts = {
    lines: 12,
    angle: 0,
    lineWidth: 0.4,
    pointer: {
      length: 0.75,
      strokeWidth: 0.042,
      color: '#1D212A'
    },
    limitMax: 'false',
    colorStart: '#1ABC9C',
    colorStop: '#1ABC9C',
    strokeColor: '#F0F3F3',
    generateGradient: true
  };
  var target = document.getElementById('foo'),
      gauge = new Gauge(target).setOptions(opts);

  gauge.maxValue = 100;
  gauge.animationSpeed = 32;
  gauge.set(80);
  gauge.setTextField(document.getElementById("gauge-text"));

  var target = document.getElementById('foo2'),
      gauge = new Gauge(target).setOptions(opts);

  gauge.maxValue = 5000;
  gauge.animationSpeed = 32;
  gauge.set(4200);
  gauge.setTextField(document.getElementById("gauge-text2"));
</script>-->

<!-- bootstrap-wysiwyg -->
<script>
    $(document).ready(function () {
        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                'Times New Roman', 'Verdana'
            ],
                    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function (idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({
                container: 'body'
            });
            $('.dropdown-menu input').click(function () {
                return false;
            })
                    .change(function () {
                        $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                    })
                    .keydown('esc', function () {
                        this.value = '';
                        $(this).change();
                    });

            $('[data-role=magic-overlay]').each(function () {
                var overlay = $(this),
                        target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });

            if ("onwebkitspeechchange" in document.createElement("input")) {
                var editorOffset = $('#editor').offset();

                $('.voiceBtn').css('position', 'absolute').offset({
                    top: editorOffset.top,
                    left: editorOffset.left + $('#editor').innerWidth() - 35
                });
            } else {
                $('.voiceBtn').hide();
            }
        }

        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            } else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
            fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
    });
</script>


<script>
  $(document).ready(function() {
    $('input[name=Date]').daterangepicker({
      locale: {
        format: 'YYYY-MM-DD'
      },
      showDropdowns: true,
      singleDatePicker: true,
      calender_style: "picker_4"
    }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
  });
</script>

<!-- datatables -->
<script>
    $(document).ready(function () {

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            fixedHeader: true,
//            dom: "Bfrtip",
//            buttons: [
//                {
//                    extend: "copy",
//                    className: "btn-sm"
//                },
//                {
//                    extend: "csv",
//                    className: "btn-sm"
//                },
//                {
//                    extend: "excel",
//                    className: "btn-sm"
//                },
//                {
//                    extend: "pdfHtml5",
//                    className: "btn-sm"
//                },
//                {
//                    extend: "print",
//                    className: "btn-sm"
//                },
//            ],
            responsive: true,
            'order': [[1, 'asc']],
            'columnDefs': [
                {orderable: false, targets: [0]}
            ]
        });
        $datatable.on('draw.dt', function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });
    });

    $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready( function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
    });

</script>




<!-- Flot -->

</body>
</html>