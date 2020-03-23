angular.module('bolaoApp')
	.config(['$routeProvider',
		function config($routeProvider){
			$routeProvider.
        	when('/', {
          		templateUrl: '/telas/p-inicial.html',
          		controller: 'PInicialController'
	        }).
	        otherwise('/');
		}]);