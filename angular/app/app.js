var app = angular.module('myApp', ['ui.bootstrap']);

app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});
app.controller('customersCrtl', function ($scope, $http, $timeout) {
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
    $scope.showCreateForm = function(){
        // clear form
        $scope.clearForm();

        // change modal title
        $('#modal-product-title').text("Create New Employee");

        // hide update product button
        $('#btn-update-product').hide();

        // show create product button
        $('#btn-create-product').show();

    }
    $scope.createEmployee = function(){
        // fields in key-value pairs
        $http.post('../ajax/employees/create_employee.php', {
                'emp_file' : $scope.emp_file, 
                'emp_name' : $scope.emp_name, 
                //'price' : $scope.price
            }
        ).success(function (data, status, headers, config) {
            console.log(data);
            // tell the user new product was created
            Materialize.toast(data);

            // close modal
            $('#modal-product-form').closeModal();

            // clear modal content
            $scope.clearForm();

            // refresh the list
            $scope.getAll();
        });
    }
    $scope.updateEmployee = function(){
        $http.post('employee/update/'+$scope.emp_id, {
            'emp_file' : $scope.emp_file, 
            'emp_name' : $scope.emp_name, 
            
        })
        .success(function (data, status, headers, config){             
            // tell the user product record was updated
            
            alert("Success");
            // refresh the product list
            $scope.getAll();
        });
    }
    $scope.deleteProduct = function(emp_file){
        // ask the user if he is sure to delete the record
        if(confirm("Are you sure?")){
            // post the id of product to be deleted
            $http.post('../ajax/employees/delete_employee.php', {
                'emp_file' : emp_file
            }).success(function (data, status, headers, config){

                // tell the user product was deleted
                Materialize.toast(data, 4000);

                // refresh the list
                $scope.getAll();
            });
        }
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
            
            
        })
        .error(function(data, status, headers, config){
            alert("Ajax file not found");
            return;
            
        });
    }
    
});
