// Constantes para el div contenedor de los inputs y el botón de agregar
const contenedor = document.querySelector('#dinamic');
const btnAgregar = document.querySelector('#agregar');

// Variable para el total de elementos agregados
let total = 1;

/**
 * Método que se ejecuta cuando se da clic al botón de agregar elementos
 */
btnAgregar.addEventListener('click', e => {
    let div = document.createElement('div');
    div.innerHTML = `<div class="row">
                        <div class="col-9">
                            <div class="input-group flex-nowrap mb-2">
                                <span class="input-group-text">Presentación #${total++}</span> 
                                <input type="number" name="nombre[]" type="text" class="form-control" placeholder="Cantidad" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group flex-nowrap mb-2">
                                <span class="input-group-text" id="addon-wrapping">Cantidad</span>
                                <input type="number" class="form-control" placeholder="Cantidad" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                    </div>`;
    contenedor.appendChild(div);
})

/**
 * Método para eliminar el div contenedor del input
 * @param {this} e 
 */
const eliminar = (e) => {
    const divPadre = e.parentNode;
    contenedor.removeChild(divPadre);
    actualizarContador();
};

/**
 * Método para actualizar el contador de los elementos agregados
*/
const actualizarContador = () => {
    let divs = contenedor.children;
    total = 1;
    for (let i = 0; i < divs.length; i++) {
        divs[i].children[0].innerHTML = total++;
    }//end for
};