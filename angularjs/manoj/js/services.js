
//creating a service name Employee to fetch data from record.json

var employeeServices = angular.module('employeeServices', ['ngResource']);
employeeServices.factory('Employee', ['$resource',
  function($resource){

	return $resource('js/record.json', {}, {

        save:   {method:'POST'},
        query: {method:'GET',  isArray:true},
        update: {method: "PUT"},
        del: {method:'DELETE'}
	});

  }]);
