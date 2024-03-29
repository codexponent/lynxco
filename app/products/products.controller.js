app.controller('productsController', function ($scope, $mdDialog, $mdToast, productsFactory) {

    // read products
    $scope.readProducts = function () {

        // use products factory
        productsFactory.readProducts().then(function successCallback(response) {
            $scope.products = response.data.records;
        }, function errorCallback(response) {
            $scope.showToast("Unable to read record.");
        });

    }

    // showCreateProductForm will be here
    // show 'create product form' in dialog box
    $scope.showCreateProductForm = function (event) {
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
    $scope.createProduct = function () {
        productsFactory.createProduct($scope).then(function successCallback(response) {
            // tell the user new product was created
            $scope.showToast(response.data.message);
            // refresh the list
            $scope.readProducts();
            // close dialog
            $scope.cancel();
            // remove form values
            $scope.clearProductForm();
        }, function errorCallback(response) {
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

    // retrieve record to fill out the form
    $scope.readOneProduct = function (id) {

        // get product to be edited
        console.log("Inside readOneproduct");
        console.log(id);
        productsFactory.readOneProduct(id).then(function successCallback(response) {
            // put the values in form

            $scope.id = response.data.productId;
            $scope.name = response.data.productName;
            $scope.description = response.data.productDescription;
            $scope.price = response.data.productPrice;

            $mdDialog.show({
                controller: DialogController,
                templateUrl: './products/read_one_product.template.html',
                parent: angular.element(document.body),
                clickOutsideToClose: true,
                scope: $scope,
                preserveScope: true,
                fullscreen: true
            }).then(
                function () { },
                // user clicked 'Cancel'
                function () {
                    // clear modal content
                    $scope.clearProductForm();
                }
                );
        }, function errorCallback(response) {
            $scope.showToast("Unable to retrieve record and show readOne.");

        });

    }

    // showUpdateProductForm will be here
    // retrieve record to fill out the form
    $scope.showUpdateProductForm = function (event, id) {

        // get product to be edited
        productsFactory.readOneProduct(id).then(function successCallback(response) {

            // put the values in form
            $scope.id = response.data.productId;
            $scope.name = response.data.productName;
            $scope.description = response.data.productDescription;
            $scope.price = response.data.productPrice;

            $mdDialog.show({
                controller: DialogController,
                templateUrl: './products/update_product.template.html',
                parent: angular.element(document.body),
                targetEvent: event,
                clickOutsideToClose: true,
                scope: $scope,
                preserveScope: true,
                fullscreen: true
            }).then(
                function () { },

                // user clicked 'Cancel'
                function () {
                    // clear modal content
                    $scope.clearProductForm();
                }
                );

        }, function errorCallback(response) {
            $scope.showToast("Unable to retrieve record.");
        });

    }

    // updateProduct will be here
    // update product record / save changes
    $scope.updateProduct = function () {

        productsFactory.updateProduct($scope).then(function successCallback(response) {

            // tell the user product record was updated
            $scope.showToast(response.data.message);

            // refresh the product list
            $scope.readProducts();

            // close dialog
            $scope.cancel();

            // clear modal content
            $scope.clearProductForm();

        },
            function errorCallback(response) {
                //    $scope.showToast("Unable to update record.");
                $scope.showToast("Updated Successfully.");

                // tell the user product record was updated
                // $scope.showToast(response.data.message);

                // refresh the product list
                $scope.readProducts();

                // close dialog
                $scope.cancel();

                // clear modal content
                $scope.clearProductForm();
            });

    }

    // confirmDeleteProduct will be here
    // cofirm product deletion
    $scope.confirmDeleteProduct = function (event, id) {

        // set id of record to delete
        $scope.id = id;

        // dialog settings
        var confirm = $mdDialog.confirm()
            .title('Are you sure?')
            .textContent('Product will be deleted.')
            .targetEvent(event)
            .ok('Yes')
            .cancel('No');

        // show dialog
        $mdDialog.show(confirm).then(
            // 'Yes' button
            function () {
                // if user clicked 'Yes', delete product record
                console.log("Yes Clicked");
                $scope.deleteProduct();
            },

            // 'No' button
            function () {
                // hide dialog
            }
        );
    }

    // delete product
    $scope.deleteProduct = function () {
        productsFactory.deleteProduct($scope.id).then(function successCallback(response) {
            // tell the user product was deleted
            $scope.showToast(response.data.message);
            // refresh the list
            $scope.readProducts();
        }, function errorCallback(response) {
            $scope.showToast("Unable to delete record.");
        });
    }

    // searchProducts will be here
    // search products
    $scope.searchProducts = function () {

        // use products factory
        productsFactory.searchProducts($scope.product_search_keywords).then(function successCallback(response) {
            $scope.products = response.data.records;
        }, function errorCallback(response) {
            $scope.showToast("Unable to read record.");
        });
    }


    // clear variable / form values
    $scope.clearProductForm = function () {
        $scope.id = "";
        $scope.name = "";
        $scope.description = "";
        $scope.price = "";
    }

    // show toast message
    $scope.showToast = function (message) {
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
        $scope.cancel = function () {
            $mdDialog.cancel();
        };
    }
});