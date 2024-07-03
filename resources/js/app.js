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

// console.log(forms)

// Ciclo ogni form per aggangiare l'ascolto dell'evento
forms.forEach(form => {

    // Aggancio l'evento
    form.addEventListener('submit',(e) => {
        // Al momento del click sul bottone blocco il codice successivo
        e.preventDefault()

        // Mostro un modale per chiedere la conferma dell'eliminazione 
        if(confirm('Vuoi eliminare questo post?')) {
            // Se la risposta è positiva faccio ripartire il codice
            form.submit()
        }
    })

})

const city = document.querySelector('.my-input-address')
let inputSuggestions = document.querySelector('.my-table-suggestions')

let inputCity = city.value

let valueCity
let resultAddress

city.addEventListener('input', function(){
    valueCity = city.value
    
})

city.addEventListener('keyup', function (){

    axios.post('http://127.0.0.1:8000/api/address/', {parametro: valueCity})
    .then(function (response) {
        
        const suggestions = response.data.response.results;
        if(suggestions){
            inputSuggestions.innerHTML = ''

            suggestions.forEach((el)=>{

                    inputSuggestions.innerHTML += `
                        <tr>
                            <td class='result-address'>${el.address.country}, ${el.address.municipality}, ${ el.address.countrySubdivisionName}, ${ el.address.streetName}</td>
                        </tr>
                        `
            })
        }

        let resultAddress = document.querySelectorAll('.result-address')
        
        if(resultAddress){
        
            for(let i = 0; i < resultAddress.length; i++){
                let el = resultAddress[i]
                el.addEventListener('click', ()=>{
                    city.value = resultAddress[i].textContent
                    inputSuggestions.innerHTML = ''
                    
                })
            }
        }

        console.log(response.data.response);
        console.log(resultAddress)
        console.log(city.value)
    })
})


