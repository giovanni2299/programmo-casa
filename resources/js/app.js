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

const city = document.querySelector('.my-input-city')
let inputSuggestions = document.querySelector('.my-table-suggestions')

let inputCity = city.value
let valueCity;

city.addEventListener('keydown', function (){
    axios.post('http://127.0.0.1:8000/api/address/', {parametro: valueCity})
    .then(function (response) {
        const suggestions = response.data.response.results;
        suggestions.forEach((el)=>{
            

                inputSuggestions.innerHTML += `
                    <tr>
                        <td>${el.address.country}, ${el.address.municipality}, ${ el.address.countrySubdivisionName}, ${ el.address.streetName}</td>
                    </tr>
                    `
        })
        console.log(response.data.response.results);

    })
})

city.addEventListener('input', function(){
    valueCity = city.value
    console.log(city.value)
    console.log(inputCity)
    console.log(valueCity)
})

