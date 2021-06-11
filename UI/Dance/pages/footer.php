</div>
<!-- /#wrapper -->

<!--Delete message-->
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['error']); ?>

<script>
    // Delete message after 10 seconds.
    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 10000);

</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./public/bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="./public/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script type="text/javascript" src="./public/js/sb-admin-2.js"></script>
<script type="text/javascript" src="./public/js/main.js"></script>
<script type="text/javascript" src="./public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="./public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      var arr = [['Date', 'Revenue ($)']];
      var orders = JSON.parse(document.getElementById("order").value);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      for(x of orders){
        arr.push([x.date,parseInt(x.total_price)])
      } 
      function drawChart() {

        var data = google.visualization.arrayToDataTable(arr);

        var options = {
          title: 'Revenue by date'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
</body>
</html>
