<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Purchasedetails</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="purchasedetails-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("purchasedetails/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="IcNo">Icno <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <select required=""  id="ctrl-IcNo" name="IcNo"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php 
                                                    $IcNo_options = $comp_model -> purchasedetails_IcNo_option_list();
                                                    if(!empty($IcNo_options)){
                                                    foreach($IcNo_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = $this->set_field_selected('IcNo',$value, "");
                                                    ?>
                                                    <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                        <?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <small class="form-text">select the <b>*ICNO</b> Number</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="indentName">Indentname <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-indentName"  value="<?php  echo $this->set_field_value('indentName',""); ?>" type="text" placeholder="Enter Indentname" minlength="5"  required="" name="indentName"  class="form-control " />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                    </div>
                                                </div>
                                                <small class="form-text">Enter the Indent Name</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="indentorName">Indentorname <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-indentorName"  value="<?php  echo $this->set_field_value('indentorName',""); ?>" type="text" placeholder="Enter Indentorname" minlength="5"  required="" name="indentorName"  class="form-control " />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                        </div>
                                                    </div>
                                                    <small class="form-text">Enter the Indentor Name</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="poValue">Povalue <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input id="ctrl-poValue"  value="<?php  echo $this->set_field_value('poValue',""); ?>" type="number" placeholder="Enter Povalue" min="1" step="0.1"  required="" name="poValue"  class="form-control " />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                            </div>
                                                        </div>
                                                        <small class="form-text">Enter the amount</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="Status">Status <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <?php
                                                            $Status_options = Menu :: $Status;
                                                            if(!empty($Status_options)){
                                                            foreach($Status_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            //check if current option is checked option
                                                            $checked = $this->set_field_checked('Status', $value, "");
                                                            ?>
                                                            <label class="custom-control custom-radio custom-control-inline">
                                                                <input id="ctrl-Status" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="Status" />
                                                                    <span class="custom-control-label"><?php echo $label ?></span>
                                                                </label>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </div>
                                                            <small class="form-text">Select atleast one Option</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="pdStartDate">Pdstartdate <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input id="ctrl-pdStartDate" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('pdStartDate',date_now()); ?>" type="datetime" name="pdStartDate" placeholder="Enter Pdstartdate" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="Y-m-d" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                                <small class="form-text">Please Enter the <b>*startdate</b>.</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="pdEndDate">Pdenddate <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                    <input id="ctrl-pdEndDate" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('pdEndDate',date_now()); ?>" type="datetime" name="pdEndDate" placeholder="Enter Pdenddate" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="Y-m-d" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <small class="form-text">Please Enter the <b>*End Date</b>.</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="supplierName">Suppliername <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="input-group">
                                                                        <input id="ctrl-supplierName"  value="<?php  echo $this->set_field_value('supplierName',""); ?>" type="text" placeholder="Enter Suppliername" minlength="5"  required="" name="supplierName"  class="form-control " />
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="fa fa-user "></i></span>
                                                                            </div>
                                                                        </div>
                                                                        <small class="form-text">Please Enter the<b>Supplier</b> Name.</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="phoneNumber">Phonenumber <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group">
                                                                            <input id="ctrl-phoneNumber"  value="<?php  echo $this->set_field_value('phoneNumber',""); ?>" type="tel" placeholder="Enter Phonenumber"  required="" name="phoneNumber"  class="form-control " />
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i class="fa fa-phone "></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <small class="form-text">Enter the Phone Number</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="Email">Email <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="input-group">
                                                                                <input id="ctrl-Email"  value="<?php  echo $this->set_field_value('Email',""); ?>" type="email" placeholder="Enter Email"  required="" name="Email"  class="form-control " />
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                                                    </div>
                                                                                </div>
                                                                                <small class="form-text">Enter the Valid Mail Address</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                    <div class="form-ajax-status"></div>
                                                                    <button class="btn btn-primary" type="submit">
                                                                        Submit
                                                                        <i class="fa fa-send"></i>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
