

var app = angular.module('requestApp',[]);

app.controller('requestCtrl',function($scope,$http){

	$scope.getSchName = function(x){
		 $http.post('get-schoolname.php', {ID:x})
            .then(function(data){
				$scope.schName = data.data;
            });
			
		
	}
	
	$scope.getID = function(x){
		$http.post('get-ID.php', {ID:x})
            .then(function(data){
				$scope.curscID = data.data;
            });
	}
})