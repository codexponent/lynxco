app.controller('productsController', function($scope, $mdDialog, $mdToast, productsFactory){
    
       // read products
       $scope.readProducts = function(){
    
           // use products factory
           productsFactory.readProducts().then(function successCallback(response){
               $scope.products = response.data.records;
           }, function errorCallback(response){
               $scope.showToast("Unable to read record.");
           });
    
       }
        
       // showCreateProductForm will be here
       // show 'create product form' in dialog box
        $scope.showCreateProductForm = function(event){

            console.log("Form is created");
            
            $mdDialog.show({
                controller: DialogController,
                templateUrl: './products/create_product.template.html',
                parent: angular.element(document.body),
                clickOutsideToClose: true,
                scope: $scope,
                preserveScope: true,
                fullscreen: true // Only for -xs, -sm breakpoints.
            });
        }
        //createProduct will be here
        // create new product
        $scope.createProduct = function(){
            
            productsFactory.createProduct($scope).then(function successCallback(response){
            
                console.log("Chek controlll here");
                console.log($scope);
                console.log("response");
                console.log(response);

                // tell the user new product was created
                $scope.showToast(response.data.message);
            
                // refresh the list
                $scope.readProducts();
            
                // close dialog
                $scope.cancel();
            
                // remove form values
                $scope.clearProductForm();
            
            }, function errorCallback(response){
                // $scope.showToast("Unable to create record.");
                $scope.showToast("Successfully Created.");

                // // tell the user new product was created
                // $scope.showToast(response.data.message);
                
                    // refresh the list
                    $scope.readProducts();
                
                    // close dialog
                    $scope.cancel();
                
                    // remove form values
                    $scope.clearProductForm();
            });
        }   
        // readOneProduct will be here

        // clear variable / form values
        $scope.clearProductForm = function(){
            $scope.id = "";
            $scope.name = "";
            $scope.description = "";
            $scope.price = "";
        }

        // show toast message
        $scope.showToast = function(message){
            $mdToast.show(
                $mdToast.simple()
                    .textContent(message)
                    .hideDelay(3000)
                    .position("top right")
            );
        }

       // DialogController will be here
       // methods for dialog box
        function DialogController($scope, $mdDialog) {
            $scope.cancel = function() {
                $mdDialog.cancel();
            };
        }
   });