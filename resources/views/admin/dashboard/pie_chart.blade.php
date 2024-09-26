<style>
#pieChart {
  width: 100%;
  height: 500px;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="m-0">Transaksi Per Produk</h5>
            </div>
            <div class="card-body">
                <div id="pieChart"></div>
            </div>
        </div>
    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("pieChart");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(
  am5percent.PieChart.new(root, {
    endAngle: 270
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "persen_transaksi",
    categoryField: "nama_produk",
    endAngle: 270
  })
);

series.states.create("hidden", {
  endAngle: -90
});

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll({!! $pieChart !!});

series.appear(1000, 100);

}); // end am5.ready()
</script>