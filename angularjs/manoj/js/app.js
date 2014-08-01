function Hello($scope, $http) {
    $http.get('js/record.json').
        success(function(data) {
            $scope.greeting = data;
        });
  
}
