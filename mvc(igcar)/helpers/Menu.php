<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbartopleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'amcdetails', 
			'label' => 'Amcdetails', 
			'icon' => '<i class="fa fa-th-list "></i>'
		),
		
		array(
			'path' => 'purchasedetails', 
			'label' => 'Purchasedetails', 
			'icon' => '<i class="fa fa-th-list "></i>'
		),
		
		array(
			'path' => 'register', 
			'label' => 'Register', 
			'icon' => '<i class="fa fa-briefcase "></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-mouse-pointer "></i>'
		)
	);
		
	
	
			public static $Status = array(
		array(
			"value" => "new", 
			"label" => "New", 
		),
		array(
			"value" => "Expired", 
			"label" => "Expired", 
		),);
		
}