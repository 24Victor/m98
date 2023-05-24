document.getElementById("boto_inici-sessio").addEventListener("click", iniciarSessio);
document.getElementById("boto_register").addEventListener("click", register);
window.addEventListener("resize", amplePagina);


//Declarant variables
var contenedor_login_register = document.querySelector(".contenedor_login-register");
var formulari_register = document.querySelector(".formulari_register");
var formulari_login = document.querySelector(".formulari_login");
var caixa_trasera_login = document.querySelector(".caixa_trasera-login");
var caixa_trasera_register = document.querySelector(".caixa_trasera-register");


function amplePagina(){
    if(window.innerWidth > 850){
        caixa_trasera_login.style.display = "block";
        caixa_trasera_register.style.display = "block";
    }else{
        caixa_trasera_register.style.display = "block";
        caixa_trasera_register.style.opacity = "1";
        caixa_trasera_login.style.display = "none";
        formulari_login.style.display = "block";
        formulari_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
    }
}

amplePagina();


function iniciarSessio(){
    if(window.innerWidth > 850){
        formulari_register.style.display = "none";
        contenedor_login_register.style.left = "10px";
        formulari_login.style.display = "block";
        caixa_trasera_register.style.opacity  = "1";
        caixa_trasera_login.style.opacity = "0";
    }else{
        formulari_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
        formulari_login.style.display = "block";
        caixa_trasera_register.style.display  = "block";
        caixa_trasera_login.style.display = "none";
    }
}


function register(){
    if(window.innerWidth > 850){
        formulari_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        formulari_login.style.display = "none";
        caixa_trasera_register.style.opacity  = "0";
        caixa_trasera_login.style.opacity = "1";
    }else{
        formulari_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulari_login.style.display = "none";
        caixa_trasera_register.style.display  = "none";
        caixa_trasera_login.style.display = "block";
        caixa_trasera_login.style.opacity = "1";
    }
}