var employees = angular.module('details', ['employeeServices']);
employees.controller('hello', ['$scope', 'Employee',
    function($scope, Employee) {
        $scope.record = Employee.query();
        // Our form data for creating a new post with ng-model
        $scope.postData = {};
        //to save data

    }]);
