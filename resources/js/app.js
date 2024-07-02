import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const forms = document.querySelectorAll('.services-destroy-form')

console.log(forms)

forms.forEach(form => {

    form.addEventListener('submit',(e) => {
        e.preventDefault()

        if(confirm('Vuoi eliminare questo post?')) {
            form.submit()
        }
    })

})