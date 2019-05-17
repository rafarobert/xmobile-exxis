var app = angular.module("SistemaPOS",['ngRoute']);

app.config(function($routeProvider) {
  $routeProvider
    .when('/',{
      templateUrl: 'views/login.html',
      controller: 'LoginController'
    })
    .when('/home',{
      templateUrl: 'views/home.html'
    })
});

app.controller('Base',function($scope,$location){
  $scope.location = $location;
  $scope.public = ($location.path() === '/') ? true : false;
})

app.directive('lHeader',function($timeout){
  return {
    restrict:'E',
    scope: true,
    templateUrl: 'views/layout/header.html',
    link: function(){
      $timeout(function(){
        angular.element('.button-menu-mobile').on('click', function (event) {
          var $body = angular.element('body');
          event.preventDefault();
          $body.toggleClass('sidebar-enable');
          if (screen.width >= 768) {
              $body.toggleClass('enlarged');
          } else {
              $body.removeClass('enlarged');
          }
          angular.element('.slimscroll-menu').slimscroll({
            height: 'auto',
            position: 'right',
            size: "8px",
            color: '#9ea5ab',
            wheelStep: 5,
            touchScrollStep: 20
          });
        });
      });
    }
  }
});

app.directive('lMenu',function($timeout){
  return {
    restrict:'E',
    scope: true,
    templateUrl: 'views/layout/menu.html',
    link: function(){
      $timeout(function(){
        angular.element('#side-menu').metisMenu();
      });
    }
  }
});

