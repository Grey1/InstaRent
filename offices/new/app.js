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

app.controller=("TimeController",function(){

	this.fromtime = 18;
	this.totime = 36;
	

});