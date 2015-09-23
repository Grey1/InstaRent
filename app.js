/**
*  Module
*
* Description
*/
var app = angular.module('store', [])
app.controller('timeController', function(){

	this.frommeridian = "AM" ;
	this.temp="";
	this.previousfrommeridian = "PM";
	this.text = "9:00";
	
	this.changeValue = function(value){
		this.text = value;
	};

	this.setfromMeridian = function(){
		this.temp=this.frommeridian;
		this.frommeridian = this.previousfrommeridian;
		this.previousfrommeridian = this.temp;
		
	};
});
