angular.module("sistema", []);
angular.module('sistema').controller('SistemaCtrl', function ($scope) {


    //-- Função Carregamento inicial --//
    $scope.fnInit = function () {
    }

    //Funções
    //-- Função carrega modal cadastro/login --//
    $scope.Getmodalcadastro = function () {
        fnCarregamodalcadastro();
    };
    var fnCarregamodalcadastro = function () {
        $('#Cadastro_login').modal('show', true);
    }
    //-- Função carrega modal login --//
    $scope.Getmodallogin = function () {
        fnCarregamodallogin();
    };
    var fnCarregamodallogin = function () {
        $('#login-modal').modal('show', true);
        $('#Cadastro_login').modal('hide');
    }
    //-- Função carrega modal cadastro --//
    $scope.Getmodallogincadastro = function () {
        fnCarregamodallogincadastro();
    };
    var fnCarregamodallogincadastro = function () {
        $('#cadastro-modal').modal('show', true);
        $('#Cadastro_login').modal('hide');
        $('#login-modal').modal('hide');
    }
});




//Função animate.js Menu - rolagem suave //
function rolar_para(elemento) {
    $('html, body').animate({
        scrollTop: $(elemento).offset().top
    }, 1000);
}
