var liclick=""

const cargarImagenes = async()=>{
	let input=document.querySelector("#buscar").value;

	if(input === ""){
		mostrarError("#msj-error","SE DEBE ESCRIBIR UN VALOR");
		return;
	}
	if(input.length >100){
		mostrarError("#msj-error","LA LONGITUD DEL TEXTO DEBE SER MENOR A 100 CARACTERES")
	}
	const key = "13119377-fc7e10c6305a7de49da6ecb25";
	let category = liclick;
	const url = `https://pixabay.com/api/?key=${key}&q=${input}&category=${category}`;
	//console.log(url);
	const respuesta = await fetch(url);
	const resultado = await respuesta.json();

	let imagenes = resultado.hits;
	console.log(imagenes);

	let imagenesHTML = "";
	imagenes.map(imagen =>{
		const{id,likes,previewURL,tags, views} = imagen;
		imagenesHTML+=`
		<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
			<div class="card">
				<img src="${previewURL}" alt="${tags}" class="card-img-top" style="cursor: pointer;" onclick="imgclick(this)" id="${id}" >
				<div class="card-body" style="display: none;" id="${id}">
					<p class="card-text">Estos son los tags: <strong>${tags}</strong></p>
    				<p class="card-text">${likes} Me gusta</p>
    				<p class="card-text">${views} Visitas</p>
    			</div>
			</div>
		</div>
		`;
	});
	/*imagenesHTML+=`
		<nav aria-label="Page navigation example" id="pageNum">
			<ul class="pagination">
			    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item"><a class="page-link" href="#">Next</a></li>
			</ul>
		</nav>`;*/
	divListadoImagenes = document.querySelector("#listadoImagenes")
	divListadoImagenes.innerHTML=imagenesHTML;


}

const mostrarError = (elemento, mensaje)=>{
	divError=document.querySelector(elemento);
	divError.innerHTML = `<div class="alert alert-primary" role="alert">${mensaje}</p>`;
	setTimeout(()=>{divError.innerHTML="";},2000)
}

function imgclick(elemento) {
	let pictures = document.getElementsByClassName("card-body");
	const picture = Array.from(pictures).map(image=>{
		if(elemento.id == image.id){
			if(image.style.display == "none"){
				image.style.display = "block";
			}
			else{
				image.style.display = "none";
			}
		}
	});
	
}
function textCategory(elemento) {
	let actual = document.getElementById("btnDrop");
	liclick = elemento.innerHTML;
	actual.innerHTML = `\n\t\t\t    \t${liclick}\n\t\t\t  \t`;
	cargarImagenes();
}
const inputElement = document.querySelector("#buscar");
inputElement.addEventListener("keydown",function(event){
	if(event.key === "Enter"){
		cargarImagenes();
	}
});






