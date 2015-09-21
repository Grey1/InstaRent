var app = angular.module('AppController', [])
app.controller('WordController', function(){
          
          this.WordLength = 0;
          this.Text = "";
          

          this.UpdateWordLength = function( $event)
          {
            this.WordLength = this.Text.length;
          };
        });

app.controller("PanelController", function(){

	this.tab=1;
	this.selectTab = function(settab){
		this.tab = settab;
	};

	this.isSelected = function(checktab){
		return checktab===this.tab;
	};

});

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



