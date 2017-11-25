app.factory("productsFactory", function($http){
    
       var factory = {};
    
       // read all products
       factory.readProducts = function(){
           return $http({
               method: 'GET',
                url: 'https://lynxco.000webhostapp.com/api/product/read.php'
           });
       };
        
       // createProduct will be here
       // create product
        factory.createProduct = function($scope){

            return $http({
                method: 'POST',
                data: {
                    'productName' : $scope.name,
                    'productDescription' : $scope.description,
                    'productPrice' : $scope.price
                },
                url: 'https://lynxco.000webhostapp.com/api/product/create.php'
            });

        };
        
        // readOneProduct will be here
        // read one product
        factory.readOneProduct = function(id){
            return $http({
                method: 'GET',
                url: 'https://lynxco.000webhostapp.com/api/product/read_one.php?id=' + id
            });
        };

        // update product
        factory.updateProduct = function($scope){
            return $http({
                method: 'POST',
                data: {
                    'productId' : $scope.id,
                    'productName' : $scope.name,
                    'productDescription' : $scope.description,
                    'productPrice' : $scope.price
                },
                url: 'https://lynxco.000webhostapp.com/api/product/update.php'
            });
        };
    
   // deleteProduct will be here
   // delete product
    factory.deleteProduct = function(id){
        return $http({
            method: 'POST',
            data: { 'productId' : id },
            url: 'https://lynxco.000webhostapp.com/api/product/delete.php'
        });
    };
    
    // searchProducts will be here
    // search all products
    factory.searchProducts = function(keywords){
        return $http({
            method: 'GET',
            url: 'https://lynxco.000webhostapp.com/api/product/search.php?s=' + keywords
        });
    };
        
       return factory;
   });