<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * amcdetails_IcNo_option_list Model Action
     * @return array
     */
	function amcdetails_IcNo_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT IcNo AS value,IcNo AS label FROM user ORDER BY IcNo ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * purchasedetails_IcNo_option_list Model Action
     * @return array
     */
	function purchasedetails_IcNo_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT IcNo AS value,IcNo AS label FROM user ORDER BY IcNo ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * register_username_value_exist Model Action
     * @return array
     */
	function register_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("register");
		return $exist;
	}

	/**
     * register_email_value_exist Model Action
     * @return array
     */
	function register_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("register");
		return $exist;
	}

	/**
     * getcount_amcdetails Model Action
     * @return Value
     */
	function getcount_amcdetails(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM amcdetails";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_purchasedetails Model Action
     * @return Value
     */
	function getcount_purchasedetails(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM purchasedetails";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_register Model Action
     * @return Value
     */
	function getcount_register(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM register";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	* barchart_newchart3 Model Action
	* @return array
	*/
	function barchart_newchart3(){
		
		$db = $this->GetModel();
		$chart_data = array(
			"labels"=> array(),
			"datasets"=> array(),
		);
		
		//set query result for dataset 1
		$sqltext = "WITH StatusCounts AS (
    SELECT
        COUNT(p.Status) AS count_of_Status,
        MONTH(p.pdStartDate) AS month_of_pdStartDate,
        MONTH(p.pdEndDate) AS month_of_pdEndDate
    FROM
        purchaseDetails AS p
    WHERE
        p.Status IN ('New', 'Expired')
    GROUP BY
        MONTH(p.pdStartDate),
        MONTH(p.pdEndDate)
)
SELECT
    month_of_pdStartDate AS Month,
    SUM(count_of_Status) AS Count_of_Statuses_By_Start_Month
FROM
    StatusCounts
GROUP BY
    month_of_pdStartDate
ORDER BY
    month_of_pdStartDate;
";
		$queryparams = null;
		$dataset1 = $db->rawQuery($sqltext, $queryparams);
		$dataset_data =  array_column($dataset1, '');
		$dataset_labels =  array_column($dataset1, '');
		$chart_data["labels"] = array_unique(array_merge($chart_data["labels"], $dataset_labels));
		$chart_data["datasets"][] = $dataset_data;

		return $chart_data;
	}

}
