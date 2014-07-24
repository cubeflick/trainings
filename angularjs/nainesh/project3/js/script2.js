// Code goes here
var employApp = angular.module('employApp', []);


employApp.controller('EmployListCtrl', ['$scope', '$http', function ($scope, $http) {
    $http.get('emploees.json').success(function (data) {
        $scope.emploees = data;
    });
    $scope.orderProp = 'id';
}]);