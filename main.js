// get Transaction type
const transactType=document.querySelector("#transact-type");
// get Transaction form
const paymentcard= document.querySelector(".payment-card");
const transactcard= document.querySelector(".transfer-card");
const Cheque= document.querySelector("#chak");


//chack for Transaction type event listener:
transactType.addEventListener("change",function(event){
//chack for Transaction type and display forms: balti run lik hadik form 
switch(transactType.value){
    case "Paiement":
        transactcard.style.display= "none";
        Cheque.style.display= "none";
        paymentcard.style.display= "block";
        
        //paymentcard.nextElementSibling.style.display = "none";
        
        break;
    case "transfert":
        //transactcard.previousElementSibling.style.display= "none";
        paymentcard.style.display= "none";
        Cheque.style.display= "none";
        transactcard.style.display= "block";
        //transactcard.nextElementSibling.style.display = "none";
        break;
    case "Cheque":
        paymentcard.style.display= "none";
        transactcard.style.display= "none";
        Cheque.style.display= "block";
        break;
    /*case "retirer":
        retirerCard.previousElementSibling.style.display= "none";            
        retirerCard.style.display= "block";
        transactcard.style.display= "none";
        paymentcard.style.display= "none";
        
        break;*/

}
//End chack for Transaction type and display forms:
});
//End chack for Transaction type event listener:

// servises de application
//prorpos
document.getElementById("propos").onclick = function(){
    
    document.getElementById("servise1").style.display = "none";
    document.getElementById("cont1").style.display = "none";

    document.getElementById("app").style.display = "block";
    

   /* document.getElementById("form_deposer").style.display = "none";
    document.getElementById("operation").style.display = "none";
    document.getElementById("card").style.display = "none";
    document.getElementById("accordion3_message").style.display = "none";
    document.getElementById("retirer").style.display = "none";
    document.getElementById("compte").style.display = "none";
    document.getElementById("element_form").style.display = "block";*/
    
}

//return
document.getElementById("return").onclick = function(){
    document.getElementById("app").style.display = "none";
    document.getElementById("immo").style.display = "none";
    document.getElementById("servise1").style.display = "none";
    document.getElementById("cont1").style.display = "none";
    document.getElementById("servise1").style.display = "block";
}  

document.getElementById("return9").onclick = function(){
    document.getElementById("app").style.display = "none";
    document.getElementById("immo").style.display = "none";
    document.getElementById("servise1").style.display = "none";
    document.getElementById("cont1").style.display = "none";
    document.getElementById("servise1").style.display = "block";
}   
document.getElementById("return10").onclick = function(){
    document.getElementById("app").style.display = "none";
    document.getElementById("immo").style.display = "none";
    document.getElementById("servise1").style.display = "none";
    document.getElementById("cont1").style.display = "none";
    document.getElementById("servise1").style.display = "block";
}   
////////////////////////////////////////////////
//immobilier
document.getElementById("Immobilier").onclick = function(){
    document.getElementById("cont1").style.display = "none";
    document.getElementById("servise1").style.display = "none";
    document.getElementById("immo").style.display = "block";
}
//immmoblier
// contact
document.getElementById("Contactez").onclick = function(){
    document.getElementById("app").style.display = "none";
    document.getElementById("immo").style.display = "none";
    document.getElementById("servise1").style.display = "none";
    document.getElementById("cont1").style.display = "block";
    
}  
//contact

const range=document.querySelector("#customRange1");
const echeance=document.querySelector("#customRange5");
const Montant=document.querySelector("#Man");
const echan=document.querySelector("#echan");
//taux
const range2=document.querySelector("#customRange4");
const taux=document.querySelector("#taux");
//ans
const range3=document.querySelector("#customRange2");
const ans=document.querySelector("#ans");
//mais
const range4=document.querySelector("#customRange3");
const mois=document.querySelector("#mois");
//
Montant.value=500000;
echan.value=8807;
taux.value=2;
ans.value=5;
mois.value=0;
//
range.addEventListener("change",function(event){
   
   Montant.value=range.value;
   
   echan.value=(+Montant.value+taux.value * +taux.value/100) * +ans.value + (+mois.value)/12;
   echeance.value=echan.value;
});
range2.addEventListener("change",function(event){
    taux.value=range2.value;
});
range3.addEventListener("change",function(event){
    ans.value=range3.value;
});
range4.addEventListener("change",function(event){
    mois.value=range4.value;
});




