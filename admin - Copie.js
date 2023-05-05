
//chack  Admin 
//cree cilent 
document.getElementById("ajouter_compte").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";
    

    document.getElementById("form_deposer").style.display = "none";
    document.getElementById("operation1").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("hhh").style.display = "none";
    document.getElementById("element_form").style.display = "block";
    
}
// Guichet
document.getElementById("Guichet").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";

    document.getElementById("form_deposer").style.display = "none";
    document.getElementById("operation1").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("element_form").style.display = "none";
    document.getElementById("hhh").style.display = "block";
    
}
// retirer
/*document.getElementById("retirer_argent").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";
    
    document.getElementById("element_form").style.display = "none";
    document.getElementById("operation").style.display = "none";
    document.getElementById("card").style.display = "none";
    
    document.getElementById("retirer").style.display = "block";
    
}*/
//list client
/*document.getElementById("client_element2").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";

    document.getElementById("element_form").style.display = "none";
    
    document.getElementById("form_deposer").style.display = "none";
    document.getElementById("operation").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("container1").style.display = " block ";
}*/
//container1 id pour client
// list admin 
document.getElementById("profile").onclick = function(){
    
    document.getElementById("element_form").style.display = "none";
    
    document.getElementById("form_deposer").style.display = "none";
    document.getElementById("operation1").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("hhh").style.display = "none";
    document.getElementById("container2").style.display = " flex ";
}
//operation
document.getElementById("oper").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";
    
    document.getElementById("element_form").style.display = "none";
    document.getElementById("form_deposer").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("hhh").style.display = "none";
    document.getElementById("operation1").style.display = "flex";
}
//deposer
document.getElementById("deposer1").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";
    

    document.getElementById("element_form").style.display = "none";
    document.getElementById("operation1").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("hhh").style.display = "none";
    document.getElementById("form_deposer").style.display = "block";
    
}
//retier
document.getElementById("retirer_argent").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";
    

    document.getElementById("element_form").style.display = "none";
    document.getElementById("operation1").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("hhh").style.display = "none";
    document.getElementById("retirer").style.display = "block";
    
}
// card 
document.getElementById("card_client").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";
    

    document.getElementById("element_form").style.display = "none";
    document.getElementById("operation1").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("hhh").style.display = "none";
    document.getElementById("card").style.display = "flex";
    
}

//notification
const notification = document.getElementById("notification");
const notif= document.getElementById("notif");
notification.addEventListener("click",function(){
    notif.innerHTML="0";
});
/*<!--Message pour  les clients crée -->*/
document.getElementById("notification").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";
    

    document.getElementById("element_form").style.display = "none";
    document.getElementById("operation1").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("form_deposer").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("hhh").style.display = "none";
    document.getElementById("accordion3_message").style.display = "block";
    
    
}
//Ajustement
document.getElementById("Traitement").onclick = function(){
    
    document.getElementById("container2").style.display = " none ";
    
    document.getElementById("element_form").style.display = "none";
    document.getElementById("operation1").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("form_deposer").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("hhh").style.display = "none";
    document.getElementById("compte").style.display = "flex";
    
    
}
//notification
/*<!--End Message pour  les clients crée -->*/
//liste compte 
// get Transaction type
const compte=document.querySelector("#select");
// get Transaction form
const table3= document.querySelector(".table3");
const table1= document.querySelector(".table1");
//chack for Transaction type event listener:
compte.addEventListener("change",function(event){
//chack for Transaction type and display forms: balti run lik hadik form 
switch(compte.value){
    case "1":
        table1.style.display= "none";
        table3.style.display= "block";
        //paymentcard.nextElementSibling.style.display = "none";
        
        break;
    case "2":
        //transactcard.previousElementSibling.style.display= "none";
        table3.style.display= "none";
        table1.style.display= "block";
        //transactcard.nextElementSibling.style.display = "none";
        break;
    /*case "deposer":
        paymentcard.style.display= "none";
        depositCard.previousElementSibling.style.display= "none";
        depositCard.style.display= "block";
        depositCard.nextElementSibling.style.display = "none";
        break;
    case "retirer":
        retirerCard.previousElementSibling.style.display= "none";            
        retirerCard.style.display= "block";
        transactcard.style.display= "none";
        paymentcard.style.display= "none";
        
        break;*/

}
//End chack for Transaction type and display forms:
});
//End chack for Transaction type event listener:

