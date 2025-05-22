console.log("oi");

const conteiner = document.querySelector(".conteiner")
const botaoReiniciar = document.querySelector("button")
let cartas;
let Carta1 = ""
let Carta2 = ""
var primeiraCarta="", segundaCarta="";
const items = [
   { nome: "limao", imagem: "limao.jpg" },
   { nome: "cherry", imagem: "Cherry.jpg" },
   { nome: "mirtilo", imagem: "Mirtilo.jpg" },
   { nome: "moranguinho", imagem: "moranguinho.jpg" },
   { nome: "plum", imagem: "Plum.jpg" },
   { nome: "torte", imagem: "Torte.jpg" },
];
function criarCartas() {
   let itemsDuplicado = [...items, ...items];
   let moranguinhos = itemsDuplicado.sort(() => Math.random() - 0.5);
   moranguinhos.map((morango) => {
      morango.imagem = "../imagens/" + morango.imagem;

      conteiner.innerHTML += `
   <div class="carta" data-carta="${morango.nome} ">
    <div class= "atras"> ? </div>
    <div class= "frente">
    <img src=${morango.imagem} width="180px" height="120px"/>
    </div>
    </div>`;
   }

   );
}
criarCartas();

function VirarCarta() {
   cartas = document.querySelectorAll(".carta")
   cartas.forEach((carta) => {
      carta.addEventListener("click", () => {
         if (primeiraCarta == "") {
            carta.classList.add("carta-virada");
            primeiraCarta = carta;
         } else if (segundaCarta == "") {
            carta.classList.add("carta-virada");
            segundaCarta = carta;
            checarCarta()
         }

      });
   });
}
VirarCarta();


 function checarCarta(){
   const primeiraPersonagem = primeiraCarta.getAttribute("data-carta")
   const segundaPersonagem = segundaCarta.getAttribute("data-carta")

   if(primeiraPersonagem == segundaPersonagem){
      primeiraCarta = ""
      segundaCarta = ""
   }else{
      setTimeout(() => {
        primeiraCarta.classList.remove("carta-virada")
      segundaCarta.classList.remove("carta-virada")

      primeiraCarta = ""
      segundaCarta = ""
      }, 500);
      
   }
 }
