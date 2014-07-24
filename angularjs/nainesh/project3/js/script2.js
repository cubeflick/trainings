// Code goes here
var employApp = angular.module('employApp', []);

employApp.service('empService', ['$http',function($http){
    this.empListing = function(){

        return $http.get('emploees.json').then(function (data) {
            return data;
        });
    }

}]);

employApp.controller('EmployListCtrl', ['$scope', '$http','empService', function ($scope, $http , empService) {
    empService.empListing().then(function(result){
        $scope.emploees = result.data;
    })
}]);