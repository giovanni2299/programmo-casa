import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
import axios from 'axios'

// Recupero il form 
const forms = document.querySelectorAll('.destroy-form')

// Ciclo ogni form per aggangiare l'ascolto dell'evento
forms.forEach((form, i) => {

    // Aggancio l'evento
    form.addEventListener('submit',(e) => {
        // Al momento del click sul bottone blocco il codice successivo
        e.preventDefault()

        const modalDelete = document.querySelectorAll('.modal-delete');
        
        modalDelete[i].classList.add('d-block');
        modalDelete[i].classList.remove('d-none');

        const btnYes = document.querySelectorAll('.btn-yes');
        btnYes[i].addEventListener('click', (ev) =>{
            ev.preventDefault();

            form.submit();
        })

        const btnNo = document.querySelectorAll('.btn-no');
        btnNo[i].addEventListener('click', (ev) =>{
            ev.preventDefault();
            
            modalDelete[i].classList.add('d-none');
            modalDelete[i].classList.remove('d-block');
        })
    })

})

const city = document.querySelector('.my-input-address')
let inputSuggestions = document.querySelector('.my-table-suggestions')
const inputLat = document.querySelector('.latitude')
const inputLon = document.querySelector('.longitude')

let indexInputLatLon = null

let inputCity = city.value

let valueCity
let resultAddress
let cancelToken;

city.addEventListener('input', function(){
    valueCity = city.value
    
})

city.addEventListener('keyup', function (){

    if (cancelToken) {
        cancelToken.cancel();
    }

    cancelToken = axios.CancelToken.source();

    axios.post('http://127.0.0.1:8000/api/address/', {parametro: valueCity}, {
        cancelToken: cancelToken.token
    })
    .then(function (response) {
        
        const suggestions = response.data.response.results;
        if(suggestions){
            inputSuggestions.innerHTML = ''

            suggestions.forEach((el)=>{

                inputSuggestions.innerHTML += `
                    <tr>
                        <td class='result-address'>${el.address.country}, ${el.address.municipality}, ${ el.address.countrySubdivisionName}, ${ el.address.streetName}, 
                    </tr>
                    <span class='lat' hidden>
                        ${el.position.lat}
                    </span>
                    <span class='lon' hidden>
                        ${el.position.lon}
                    </span></td>
                    `
            })
        }

        let resultAddress = document.querySelectorAll('.result-address')
        const resultsLat = document.querySelectorAll('.lat')
        const resultsLon = document.querySelectorAll('.lon')
        // const inputLat = document.querySelector('.latitude')
        // const inputLon = document.querySelector('.longitude')

        if(resultAddress){
        
            for(let i = 0; i < resultAddress.length; i++){
                let el = resultAddress[i]
                el.addEventListener('click', ()=>{
                    city.value = resultAddress[i].textContent
                    inputSuggestions.innerHTML = ''
                    inputLat.value = resultsLat[i].innerText.replace(/\s+/g, '')
                    inputLon.value = resultsLon[i].innerText.replace(/\s+/g, '')
                    indexInputLatLon = i
                   // console.log(inputLat)
                })
            }
        }

        // console.log(response.data.response);
        // console.log(resultAddress)
        // console.log(city.value)
    })
})


const formsCreate = document.querySelectorAll('.form-create-apartment')

formsCreate.forEach( formCreate => {
    formCreate.addEventListener('submit', (e) => {
        
        e.preventDefault()
        
        if(inputLat.value[indexInputLatLon] && inputLon.value[indexInputLatLon]) {
            
            formCreate.submit()
        }else{
            alert('Seleziona un indirizzo suggerito')
        }
    })
})

