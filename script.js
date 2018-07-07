var app=angular.module('main', ['ngRoute','ui.bootstrap','ngMessages']);

app.config(function($routeProvider){
    $routeProvider.when('/',{
        templateUrl: './components/home.html',
        controller: 'homeCtrl'
    }).when('/logout',{
        resolve: {
            deadResolve: function($location, user){
                user.clearData();
                $location.path('/');
            }
        }
    }).when('/login',{
        templateUrl: './components/login.html',
        controller: 'loginCtrl'
    }).when('/dashboard',{
        resolve: {
            check: function($location, user) {
                if (!user.isUserLoggedIn()) {
                    $location.path('/login');
                }

            },
        },
        templateUrl: './components/dashboard.html',
        controller: 'dashboardCtrl'
    }).when('/admin',{
        resolve: {
            check: function($location, user) {
                if (!user.isUserLoggedIn()) {
                    $location.path('/login');
                }

            },
        },
        templateUrl: './cms/admin/index.php',
        controller: 'dashboardCtrl'
    }).when('/Lecdashboard',{
        resolve: {
            check: function($location, user) {
                if (!user.isUserLoggedIn()) {
                    $location.path('/login');
                }

            },
        },
        templateUrl: './components/Lecdashboard.html',
        controller: 'dashboardCtrl'
    }).when('/register',{
        templateUrl: './components/register.html',
        controller: 'regCtrl'
    }).when('/results',{
        templateUrl: './components/results.html',
        controller: 'resultsCtrl'
    }).when('/course',{
        templateUrl: './components/courses.html',
        controller: 'courseCtrl'
    }).when('/news',{
        templateUrl: './components/news.html',
        controller: 'newsCtrl'
    }).when('/contact',{
        templateUrl: './components/contact.html',
        controller: 'contactCtrl'
    }).otherwise({
        template: '404'
    });

});
app.service('user',function(){
    var username;
    var loggedin = false;
    var id;

    this.getName = function() {
        return username;
    };
    this.setID = function(userID) {
        id = userID;
    };
    this.getID = function() {
        return id;
    };
    this.isUserLoggedIn = function() {
        if(!!localStorage.getItem('login')){
            loggedin = true;
            var data = JSON.parse(localStorage.getItem('login'));
            username = data.username;
            id = data.id;
        }
        return loggedin;
    };

    this.saveData = function (data) {
        username = data.user;
        id = data.id;
        loggedin = true;
        localStorage.setItem('login', JSON.stringify({
            username: username,
            id: id
        }));
    };
    this.clearData = function() {
        localStorage.removeItem('login');
        username = "";
        id = "";
        loggedin = false;
    }
})
app.controller('homeCtrl', function($scope, $location){
    $scope.gotoLogin = function(){
        $location.path('/login');
    };
    $scope.register = function() {
        $location.path('/register');
    };
    $scope.courses = function() {
        $location.path('/course')
    };
    $scope.news = function() {
        $location.path('/news')
    };
    $scope.contact = function() {
        $location.path('/contact')
    };
    $scope.carouselslider = function(){
        $scope.myInterval = 2500;
        $scope.slides = [
            {
                image: "./img/home.jpg"
            },
            {
                image: "./img/home1.jpg"
            },
            {
                image: './img/home2.jpg'
            },
            {
                image: './img/home3.jpg'
            }
        ];
    };
});

app.controller('loginCtrl', function($scope, $http, $location, user){
    $scope.login = function() {
        var username = $scope.username;
        var password = $scope.password;
        var type = $scope.selected_person.name;
        $http({
            url: 'http://localhost/Sem3_project/server.php',
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            data:'type='+type+'&username='+username+'&password='+password
        }).then(function(response){
            if(response.data.status == 'loggedin') {
                user.saveData(response.data);
                if(type=="Student"){
                    $location.path('/dashboard');
                }else if(type=="Admin"){
                    $location.path('/admin');
                }else if(type=="Registrar"){
                    $location.path('/admin');
                }else if(type=="Lecturer"){
                    $location.path('/Lecdashboard');
                }

             }else {
                alert('invalid login');
            }
        })
    };
    $scope.rolelist=function() {
        $scope.people = [
            {name: "Student"},{name: "Admin"},{name: "Registrar"},{name: "Lecturer"}
        ];
    };



});
app.controller('dashboardCtrl', function($scope, $location, user, $http){
    $scope.user = user.getName();

    $scope.gotoLogout = function(){
        $location.path('/logout');
    };
    $scope.gotoResults = function(){
        $location.path('/results');
    };
    $scope.tab = 1;

    $scope.setTab = function(newTab){
        $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum){
        return $scope.tab === tabNum;
    };
    $scope.insertData=function()
    {
        $http.post
        (
            "leave.php",
            {
                'uname':$scope.Id,
                'type':$scope.leavetype,
                'num_day':$scope.numofdays,
                'from_date':$scope.from,
                'to_date':$scope.to,
                'comment':$scope.reason

            }
        )

    }
    $scope.approval=function()
    {
        $http.get
        (
            "approval.php",
        ).then(function(response){$scope.leaveapprove = response.data.records;});
    }
});
app.controller('regCtrl', function($scope, $http){
    $scope.insertData=function()
    {
        $http.post
        (
            "insert.php",
            {
                'fullname':$scope.fullname,
                'name':$scope.name,
                'email':$scope.email,
                'mobile':$scope.mobilenum,
                'birthday':$scope.date_of_birth,
                'address':$scope.address,
                'gender':$scope.gender
            }
        )
    alert("Successfully Recorded!!");
    }

});
app.controller('courseCtrl', function($scope,user){

});
app.controller('newsCtrl', function($scope,user){

});
app.controller('contactCtrl', function($scope,user){

});
