var list = document.querySelectorAll(".list-group-item") ;
var close = document.getElementById("close") ;
var aside = document.getElementById("aside") ;

// for(let i = 0 ; i < list.length ; i++){
    
//     })
// }
close.addEventListener("click", ()=>{
    aside.style.width = "10px" ;
})
var items = [] ;
list.forEach(item =>{
    item.addEventListener("click", ()=>{
        item.className = "active" ;
    })
})