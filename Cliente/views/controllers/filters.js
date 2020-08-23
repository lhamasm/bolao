function html($sce) {
	return function(text){
		return $sce.trustAsHtml(text);
	}
}

angular.module('bolaoApp')
	.filter('html', ['$sce', html]);