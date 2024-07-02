import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

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