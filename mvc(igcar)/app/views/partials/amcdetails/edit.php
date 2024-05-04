<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Edit  Amcdetails</h4>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("amcdetails/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
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
                                                    $rec = $data['IcNo'];
                                                    $IcNo_options = $comp_model -> amcdetails_IcNo_option_list();
                                                    if(!empty($IcNo_options)){
                                                    foreach($IcNo_options as $option){
                                                    $value = (!empty($option['value']) ? $option['value'] : null);
                                                    $label = (!empty($option['label']) ? $option['label'] : $value);
                                                    $selected = ( $value == $rec ? 'selected' : null );
                                                    ?>
                                                    <option 
                                                        <?php echo $selected; ?> value="<?php echo $value; ?>"><?php echo $label; ?>
                                                    </option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="amcName">Amcname <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input id="ctrl-amcName"  value="<?php  echo $data['amcName']; ?>" type="text" placeholder="Enter Amcname" minlength="5"  required="" name="amcName"  class="form-control " />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                    </div>
                                                </div>
                                                <small class="form-text">Please Enter the <b>*Amc </b> Name.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="amcInitiatorName">Amcinitiatorname <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-amcInitiatorName"  value="<?php  echo $data['amcInitiatorName']; ?>" type="text" placeholder="Enter Amcinitiatorname" minlength="5"  required="" name="amcInitiatorName"  class="form-control " />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                        </div>
                                                    </div>
                                                    <small class="form-text">Please Enter  The <b>*Indentor</b> Name.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="amcValue">Amcvalue <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input id="ctrl-amcValue"  value="<?php  echo $data['amcValue']; ?>" type="number" placeholder="Enter Amcvalue" min="1" step="0.1"  required="" name="amcValue"  class="form-control " />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                            </div>
                                                        </div>
                                                        <small class="form-text">Enter the Amount</small>
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
                                                            $field_value = $data['Status'];
                                                            if(!empty($Status_options)){
                                                            foreach($Status_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            //check if value is among checked options
                                                            $checked = $this->check_form_field_checked($field_value, $value);
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
                                                            <small class="form-text">Please select the atleast one status</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="amcStartDate">Amcstartdate <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input id="ctrl-amcStartDate" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['amcStartDate']; ?>" type="datetime" name="amcStartDate" placeholder="Enter Amcstartdate" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="Y-m-d" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                                <small class="form-text">Enter the <b>*Start date</b>.</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="amcEndDate">Amcenddate <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                    <input id="ctrl-amcEndDate" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['amcEndDate']; ?>" type="datetime" name="amcEndDate" placeholder="Enter Amcenddate" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="Y-m-d" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <small class="form-text">Enter the <b>*End Date</b>.</small>
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
                                                                        <input id="ctrl-supplierName"  value="<?php  echo $data['supplierName']; ?>" type="text" placeholder="Enter Suppliername" minlength="5"  required="" name="supplierName"  class="form-control " />
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                                            </div>
                                                                        </div>
                                                                        <small class="form-text">Please Enter the <b>*Supplier</b> Name.</small>
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
                                                                            <input id="ctrl-phoneNumber"  value="<?php  echo $data['phoneNumber']; ?>" type="number" placeholder="Enter Phonenumber" step="1"  required="" name="phoneNumber"  class="form-control " />
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text"><i class="fa fa-phone "></i></span>
                                                                                </div>
                                                                            </div>
                                                                            <small class="form-text">Enter the  10 digit phone number</small>
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
                                                                                <input id="ctrl-Email"  value="<?php  echo $data['Email']; ?>" type="email" placeholder="Enter Email"  required="" name="Email"  class="form-control " />
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="fa fa-at "></i></span>
                                                                                    </div>
                                                                                </div>
                                                                                <small class="form-text">Enter the Valid Mail address</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-ajax-status"></div>
                                                                <div class="form-group text-center">
                                                                    <button class="btn btn-primary" type="submit">
                                                                        Update
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
