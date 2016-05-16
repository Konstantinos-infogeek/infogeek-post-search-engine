/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com on 16/5/2016.
 * Project: wp-infogeek
 * File Name:
 */

(function () {
    var ipsSearch = angular.module("IpsSearchEngine", ["ngSanitize"]);


    ipsSearch.controller("SearchController", ["$scope", "$http", function ($scope, $http) {
        this.posts = [];

        this.init = function () {
            $http.get(ips.admin + "/?action=get_posts",{}).success(function (data) {
                $scope.posts = data;
            });
        }

    }]);
    
}());
