
var app = angular.module('AppController', ['ui.bootstrap']);

app.controller('TypeaheadCtrl', function($scope, $http) {
$scope.selected = undefined;
$scope.getLocation = function(val) {
    return $http.get('//maps.googleapis.com/maps/api/geocode/json', {
      params: {
        address: val,
        sensor: false
      }
    }).then(function(response){
      return response.data.results.map(function(item){
        return item.formatted_address;
      });
    });
  };
}
)


app.controller('dataController', function($scope,$http){
            this.WordLength = 0;
          this.Text = "";
          

          this.UpdateWordLength = function($event)
          {
            this.WordLength = this.Text.length;
          };

})