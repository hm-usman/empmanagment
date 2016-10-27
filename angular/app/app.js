var app = angular.module('main-App', ['ui.bootstrap', 'ngRoute']);             
app.config(function($routeProvider) {
    $routeProvider
            .when("/", {
                templateUrl: 'dashboard',
    })
         .when("/dashboard", {
             templateUrl : "dashboard"
    })
            .when("/employee", {
               templateUrl : "employee/index",
        //controller: 'customersCrtl'
    })
            .when("/test", {
             templateUrl: 'templates/items.html'
        //controller: 'ItemController'
    })
    .when("/holiday", {
              templateUrl: "empholiday/index"
              //controller: 'ItemController'
    })
            .when("/leave", {
              templateUrl: "leave/index"
        //controller: 'ItemController'
    })
            .when("/leavelist", {
                templateUrl: "leavelist/index"
        //controller: 'ItemController'
    })
            .when("/holidaylist", {
                templateUrl: "holidaylist/index"  
    })
            .when("/feradio", {
                 templateUrl: "feradio/index"
    })
            .when("/dias", {
                templateUrl: "dias/index"
    })
            .when("/emp_reports", {
                templateUrl: "emp_reports/index"
                
    })
            .when("/emp_monthly_reports", {
                templateUrl: "emp_monthly_reports/index"
    })
            .when("/active_emp_reports", {
                templateUrl: "active_emp_reports/index"
    })
          .when("/inactive_emp_reports", {
                templateUrl: "inactive_emp_reports/index"
    })
          .when("/admin_emp_reports", {
                templateUrl: "admin_emp_reports/index"
    })
          .when("/retired_emp_reports", {
                templateUrl: "retired_emp_reports/index"
    })
            .when("/logout", {
                templateUrl : "login/logout",
    })
});
app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});
app.controller('customersCrtl', function ($scope, $http, $timeout, $route, $routeParams, $location) {
    $http.get('employee/get_all_emp').success(function(data){
        
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
    $scope.clearForm = function(){
        $scope.emp_file = "";
        $scope.emp_name = "";
    }
    $scope.getAll = function(){
        $http.get("employee/get_all_emp").success(function(response){
            $scope.list = response;
        });
    }
    $scope.createEmployee = function(){
        // fields in key-value pairs
        //alert($scope.emp_file);
        $http.post('employee/create_employee', {
                'emp_file' : $scope.emp_file, 
                'emp_name' : $scope.emp_name, 
                'emp_cellnum' : $scope.emp_cellnum,
                'emp_department' : $scope.emp_department,
                'emp_current_contract' : $scope.emp_current_contract,
                'emp_email' : $scope.emp_email,
                'emp_password' : $scope.emp_password,
                'emp_status' : $scope.emp_status,
                'emp_type' : $scope.emp_type,
            }
        ).success(function (data, status, headers, config) {
            console.log(data);
            // tell the user new product was created
            //Materialize.toast(data);

            // close modal
            //$('#add').closeModal();
            
            alert("Successfully Added");
            // clear modal content
           // $scope.clearForm();

            // refresh the list
            $scope.getAll();
        })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
            
        });
    }
    $scope.updateEmployee = function(){
        $http.post('employee/update/'+$scope.emp_id, {
            'emp_file' : $scope.emp_file, 
            'emp_name' : $scope.emp_name, 
            'emp_cellnum' : $scope.emp_cellnum,
            'emp_department' : $scope.emp_department,
            'emp_current_contract' : $scope.emp_current_contract,
            'emp_email' : $scope.emp_email,
            'emp_password' : $scope.emp_password,
            'emp_status' : $scope.emp_status,
            'emp_type' : $scope.emp_type,
        })
        .success(function (data, status, headers, config){             
            // tell the user product record was updated
                        
            alert("Success");
            // refresh the product list
            $scope.getAll();
        });
    }
    $scope.deleteEmployee = function(id){
        //alert(id);
        // ask the user if he is sure to delete the record
        if(confirm("Are you sure?")){
            // post the id of product to be deleted
            $http.post('employee/delete/'+id, {
                //'emp_id' : id
            }).success(function (data, status, headers, config){

                // tell the user product was deleted
                //Materialize.toast(data, 4000);

                // refresh the list
                $scope.getAll();
            });
        }
    }
    $scope.readNotes = function(id){
        alert(id);
        $http.get('employee/get_emp_notes/'+id, {
        })
        .success(function(data,status,header,config){
            
        })
    }
    $scope.readOne = function(id){
        //alert(id);
        // post id of product to be edited
        $http.post('employee/get_single_emp/'+id, {
            //'emp_id' : id 
        })
        .success(function(data, status, headers, config){
            //alert(data['emp_file']);
            //return;
            // put the values in form
            $scope.emp_id = data["emp_id"];
            $scope.emp_file = data["emp_file"];
            $scope.emp_name = data["emp_name"];
            $scope.emp_cellnum = data["emp_cellnum"];
            $scope.emp_department = data["emp_department"];
            $scope.emp_current_contract = data["emp_current_contract"];
            $scope.emp_email = data["emp_email"];
            $scope.emp_password = data["emp_password"];
            $scope.emp_status = data["emp_status"];
            $scope.emp_type = data["emp_type"];            
        })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
        });
    }
});
app.controller('holidayCrtl', function ($scope, $http, $timeout, $route, $routeParams, $location) {
    $http.get('empholiday/get_all_holiday').success(function(data){
        
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
    $scope.clearForm = function(){
        $scope.emp_file = "";
        $scope.emp_name = "";
    }
    $scope.getAll = function(){
        $http.get("empholiday/get_all_holiday").success(function(response){
            $scope.list = response;
        });
    }
    $scope.createHoliday = function(){
        $http.post('empholiday/add_holiday', {
                'amount' : $scope.amount, 
                'date' : $scope.date, 
                'trans_type' : $scope.trans_type,
                'status' : $scope.status,
            }
        ).success(function (data, status, headers, config) {
            //console.log(data);
            // tell the user new product was created
            //Materialize.toast(data);

            // close modal
           // dialog.close(resutl);
            
            
            
            alert("Successfully Added");
            // clear modal content
           // $scope.clearForm();

            // refresh the list
            $scope.getAll();
        })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
        });
    }
    $scope.updateHoliday = function(){
        $http.post('empholiday/update_holiday/'+$scope.holiday_id, {
                'amount' : $scope.amount, 
                'date' : $scope.date, 
                'trans_type' : $scope.trans_type,
                'status' : $scope.status,
        })
        .success(function (data, status, headers, config){             
            // tell the user product record was updated
                        
            alert(data);
            // refresh the product list
            $scope.getAll();
         })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
        });
    }
    $scope.deleteHoliday = function(id){
        //alert(id);
        // ask the user if he is sure to delete the record
        if(confirm("Are you sure?")){
            // post the id of product to be deleted
            $http.post('empholiday/delete/'+id, {
                //'emp_id' : id
            }).success(function (data, status, headers, config){

                // tell the user product was deleted
                //Materialize.toast(data, 4000);

                // refresh the list
                $scope.getAll();
            });
        }
    }
    $scope.readHoliday = function(id){
        //alert(id);
        //return;
        // post id of product to be edited
        $scope.holiday_id=id;
        $http.post('empholiday/get_single_holiday/'+id, {
            //'emp_id' : id 
        })
        .success(function(data, status, headers, config){
            //alert(data['emp_file']);
            //return;
            // put the values in form
            $scope.amount = data["amount"];
            $scope.date = data["date"];
            $scope.trans_type = data["trans_type"];
            $scope.status = data["status"];            
        })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
        });
    }
});
app.controller('leaveCrtl', function ($scope, $http, $timeout, $route, $routeParams, $location) {
    $http.get('leave/get_all_leave').success(function(data){
        
        $scope.list = data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 10; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
    });
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
    $scope.clearForm = function(){
        $scope.emp_file = "";
        $scope.emp_name = "";
    }
    $scope.getAll = function(){
        $http.get("empleave/get_all_leave").success(function(response){
            $scope.list = response;
        });
    }
    $scope.createHoliday = function(){
        $http.post('empleave/add_leave', {
                'amount' : $scope.amount, 
                'date' : $scope.date, 
                'trans_type' : $scope.trans_type,
                'status' : $scope.status,
            }
        ).success(function (data, status, headers, config) {
            //console.log(data);
            // tell the user new product was created
            //Materialize.toast(data);

            // close modal
            //$('#add').closeModal();
            
            alert("Successfully Added");
            // clear modal content
           // $scope.clearForm();

            // refresh the list
            $scope.getAll();
        })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
        });
    }
    $scope.updateHoliday = function(){
        $http.post('empleave/update_leave/'+$scope.holiday_id, {
                'amount' : $scope.amount, 
                'date' : $scope.date, 
                'trans_type' : $scope.trans_type,
                'status' : $scope.status,
        })
        .success(function (data, status, headers, config){             
            // tell the user product record was updated
                        
            alert(data);
            // refresh the product list
            $scope.getAll();
         })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
        });
    }
    $scope.deleteHoliday = function(id){
        //alert(id);
        // ask the user if he is sure to delete the record
        if(confirm("Are you sure?")){
            // post the id of product to be deleted
            $http.post('empholiday/delete/'+id, {
                //'emp_id' : id
            }).success(function (data, status, headers, config){

                // tell the user product was deleted
                //Materialize.toast(data, 4000);

                // refresh the list
                $scope.getAll();
            });
        }
    }
    $scope.readHoliday = function(id){
        //alert(id);
        //return;
        // post id of product to be edited
        $scope.holiday_id=id;
        $http.post('empholiday/get_single_holiday/'+id, {
            //'emp_id' : id 
        })
        .success(function(data, status, headers, config){
            //alert(data['emp_file']);
            //return;
            // put the values in form
            $scope.amount = data["amount"];
            $scope.date = data["date"];
            $scope.trans_type = data["trans_type"];
            $scope.status = data["status"];            
        })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
        });
    }
});

app.controller('empreportsCtrl', function($scope, $http, $timeout, $route, $routeParams, $location){
$http.get('emp_reports/get_all_emp').success(function(data){
    $scope.list = data;
});
});
app.controller('activeempreportsCtrl', function($scope, $http, $timeout, $route, $routeParams, $location){
    $http.get('emp_reports/get_active_emp').success(function(data){
    $scope.list = data;
});
});
app.controller('inactiveempreportsCtrl', function($scope, $http, $timeout, $route, $routeParams, $location){
    $http.get('emp_reports/get_inactive_emp').success(function(data){
    $scope.list = data;
});
});
app.controller('retairedempreportsCtrl', function($scope, $http, $timeout, $route, $routeParams, $location){
    $http.get('emp_reports/get_retaired_emp').success(function(data){
    $scope.list = data;
});
});