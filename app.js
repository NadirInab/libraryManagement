var profile = document.getElementById("profile") ;
var profileSection =  document.getElementById("profileSection") ;

var signIn =  document.getElementById("signInLink") ;
var signUp =  document.getElementById("singUp12") ;

var signInForm =  document.getElementById("signInForm") ;
var signUpForm =  document.getElementById("signUpForm") ;

// alert("hi") ;

// console.log(signIn) ;

signUp.addEventListener("click", ()=>{
    alert("here signUp") ;
    signUpForm.style.display = "contents" ;
    signInForm.style.display = "none" ;
})

signIn.addEventListener("click", ()=>{
    signUpForm.style.display = "none" ;
    signInForm.style.display = "block" ;
})
