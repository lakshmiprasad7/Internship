<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light">
        <div class="container">
            <div class="row md-gutters">
                <div class="col-md-12 comp-grid">
                    <h4 >DashBoard Activity</h4>
                </div>
                <div class="col-sm-12 pt-5 comp-grid">
                    <div  class="">
                        <div class="container">
                            <div class="row ">
                                <div class="col-sm-3 mb-3 comp-grid">
                                    <?php $rec_count = $comp_model->getcount_amcdetails();  ?>
                                    <a class="animated tada record-count alert alert-success"  href="<?php print_link("amcdetails/") ?>">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fa fa-list-alt "></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="flex-column justify-content align-center">
                                                    <div class="title">Amcdetails</div>
                                                    <small class="">The details</small>
                                                </div>
                                            </div>
                                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3 mb-3 comp-grid">
                                    <?php $rec_count = $comp_model->getcount_purchasedetails();  ?>
                                    <a class="animated tada record-count alert alert-info"  href="<?php print_link("purchasedetails/") ?>">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fa fa-list-alt "></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="flex-column justify-content align-center">
                                                    <div class="title">Purchasedetails</div>
                                                    <small class="">The details</small>
                                                </div>
                                            </div>
                                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3 mb-3 comp-grid">
                                    <?php $rec_count = $comp_model->getcount_register();  ?>
                                    <a class="animated tada record-count alert alert-warning"  href="<?php print_link("register/") ?>">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fa fa-users "></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="flex-column justify-content align-center">
                                                    <div class="title">Register</div>
                                                    <small class="">The Users</small>
                                                </div>
                                            </div>
                                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container comp-grid">
                    <div  class="">
                        <div class="container">
                            <div class="row ">
                                <div class="col-sm-12 mb-6 comp-grid">
                                    <div class="card card-body">
                                        <?php 
                                        $chartdata = $comp_model->barchart_newchart3();
                                        ?>
                                        <div>
                                            <h4>New Chart 3</h4>
                                            <small class="text-muted"></small>
                                        </div>
                                        <hr />
                                        <canvas id="barchart_newchart3"></canvas>
                                        <script>
                                            $(function (){
                                            var chartData = {
                                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                                            datasets : [
                                            {
                                            label: 'Dataset 1',
                                            backgroundColor:'<?php echo random_color(0.9); ?>',
                                            type:'',
                                            borderWidth:3,
                                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                                            }
                                            ]
                                            }
                                            var ctx = document.getElementById('barchart_newchart3');
                                            var chart = new Chart(ctx, {
                                            type:'bar',
                                            data: chartData,
                                            options: {
                                            scaleStartValue: 0,
                                            responsive: true,
                                            scales: {
                                            xAxes: [{
                                            ticks:{display: true},
                                            gridLines:{display: true},
                                            categoryPercentage: 1.0,
                                            barPercentage: 0.8,
                                            scaleLabel: {
                                            display: true,
                                            labelString: ""
                                            },
                                            }],
                                            yAxes: [{
                                            ticks: {
                                            beginAtZero: true,
                                            display: true
                                            },
                                            scaleLabel: {
                                            display: true,
                                            labelString: ""
                                            }
                                            }]
                                            },
                                            }
                                            ,
                                            })});
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
