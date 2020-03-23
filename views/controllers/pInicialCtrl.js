angular.module('bolaoApp')
	.controller('PInicialController', ['$http', '$scope',
		function PInicialController($http, $scope){
			$http({
				method: 'GET',
				url: '/content/index.json'
			}).then(function success(response){
				$scope.viewdata = response.data;
			}, function error(response){

			});
		}
	]);