var myApp = angular.module("myApp", []);
myApp.controller('ctrCrud',['$scope','$http', function($scope,$http) {

$scope.moy = function() 
{
   result = (parseInt($scope.n1)*parseInt($scope.c1)) + (parseInt($scope.n2)*parseInt($scope.c2)) + (parseInt($scope.n3)*parseInt($scope.c3));
   result2 =parseInt($scope.c1) + parseInt($scope.c2)+ parseInt($scope.c3);
   $scope.moyenne = result / result2;
   if($scope.moyenne>=10)
         $scope.observation="admis";
   else
         $scope.observation="redouble";
};

$scope.getAll = function(){
  
    $http.get("liste1.php").success(function(response){
        $scope.details = response.records;
    });
}


$scope.insertdata =function() {
$http.post("insert2.php",
{
  'mat' :$scope.mat,
  'nom' :$scope.nom,
  'classe':$scope.classe,
  'n1':$scope.n1,
  'n2':$scope.n2,
  'n3':$scope.n3,
  'c1':$scope.c1,
  'c2':$scope.c2,
  'c3':$scope.c3
}
).success(function (data, status, headers, config) {
          $scope.get_product();
        })
 
        .error(function(data, status, headers, config){
            
        });
}
}]);

