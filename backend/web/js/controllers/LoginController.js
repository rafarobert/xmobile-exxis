app.controller('LoginController',function($scope,$http,$location){
  $scope.model = {};
  $scope.validation = /^[A-Za-z0-9\_]+$/;
  $scope.login = function () {
    console.log($scope.model);
    $location.path('/home');
  }
});