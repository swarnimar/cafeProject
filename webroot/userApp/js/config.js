
function configState($stateProvider, $urlRouterProvider, $locationProvider, host) {
  
  // Optimize load start with remove binding information inside the DOM element
    // $compileProvider.debugInfoEnabled(true);
  $urlRouterProvider.otherwise("/");
  $locationProvider.hashPrefix('!');
  // Set default state
  $stateProvider
  
    .state('home', {
        controller:'HomeController',
        url: "/",
        templateUrl: host+"userApp/views/home.html",
        data: {
            pageTitle: 'Dashboard'
        }
    })
    .state('sell', {
        controller:'SellController',
        url: "/sell",
        templateUrl: host+"userApp/views/sell.html",
        data: {
            pageTitle: 'Dashboard'
        }
    })

}


var app = angular
              .module('userApp')
              .constant('host', window.hostUrl)
              .config(configState)
              .config(['$resourceProvider', function($resourceProvider) {
                  // Don't strip trailing slashes from calculated URLs
                  $resourceProvider.defaults.stripTrailingSlashes = false;
                }])
              // .config(function($httpProvider){
              //   $httpProvider.interceptors.push('apiInterceptor');
              // })
              // .directive('pageTitle', pageTitle)
              // .directive('smallHeader', smallHeader)
              // .directive('minimalizaMenu', minimalizaMenu)
              // // .directive('sideNavigation', sideNavigation)
              // // .directive('sparkline', sparkline)
              // // .directive('icheck', icheck)
              // // .directive('panelTools', panelTools)
              // // .directive('panelToolsFullscreen', panelToolsFullscreen)
              // .directive('animatePanel', animatePanel)
              // .directive('landingScrollspy', landingScrollspy)
              // .directive('clockPicker', clockPicker)
              // .directive('dateTimePicker', dateTimePicker)
              // .directive('touchSpin', touchSpin)
              .run(function($rootScope, $state, BusinessesFactory, ProductsFactory) {
                  BusinessesFactory.getBusinesses();
                  ProductsFactory.init();
                  $rootScope.$state = $state;
                  // editableOptions.theme = 'bs3';
              });
