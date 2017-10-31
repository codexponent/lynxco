app.factory("productsFactory", function($http){
    
       var factory = {};
    
       // read all products
       factory.readProducts = function(){
           return $http({
               method: 'GET',
               url: 'http://localhost/lynxco/api/product/read.php'
           });
       };
        
       // createProduct will be here
       // create product
        factory.createProduct = function($scope){

            console.log("JS Check Here");
            console.log($scope);
            console.log("Name: " + $scope.name);
            console.log("Description: " + $scope.description);
            console.log("Price: " + $scope.price);


            // return $.ajax({
            //     type: "POST",
            //     url: 'http://localhost/lynxco/api/product/create.php',
            //     data: {
            //         'name' : $scope.name,
            //         'description' : $scope.description,
            //         'price' : $scope.price,
            //         'category_id' : 1
            //       }
            //   });

            return $http({
                method: 'POST',
                data: {
                    'name' : $scope.name,
                    'description' : $scope.description,
                    'price' : $scope.price,
                    'category_id' : 1
                },
                url: 'http://localhost/lynxco/api/product/create.php'
            });

        };
        
        // readOneProduct will be here
        
       return factory;
   });