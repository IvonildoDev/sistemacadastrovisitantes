
window.addEventListener("scroll", function () {
    let header = this.document.querySelector('#header')
    header.classList.toggle('rolagem', this.window.scrollY > 0)
})


let formValidator = {
    handleSubmit: (event) => {
        event.preventDefault();
        let send = true;

        let inputs = form.querySelectorAll('input');

        formValidator.clearErrors();

        for (let i = 0; i < inputs.length; i++) {
            let input = inputs[i];
            let check = formValidator.checkInput(input);
            if (check !== true) {
                send = false;
                formValidator.showError(input, check);
                // exibir erro
            }
        }
        // send = false;
        if (send) {
            form.submit();
        }
    },
    checkInput: (input) => {
        let rules = input.getAttribute('data-rules');

        if (rules !== null) {
            rules = rules.split('|');
            for (let k in rules) {
                let rDetails = rules[k].split('=');
                switch (rDetails[0]) {
                    case 'required':

                        if (input.value == '') {
                            return 'Campo não pode ser vazio.';
                        }
                        break;
                    case 'min':
                        break;
                }
            }

        }
        return true;
    },
    showError: (input, error) => {
        input.style.borderColor = '#ff0000';

        let errorElement = document.createElement9('div');
        errorElement.classList.add('error');
        errorElement.innerHTML = error;

        input.parentElement.insertBefore(errorElement, input.ElementSibling);
    },

    clearErrors: () => {
        let inputs = form.querySelectorAll('input');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].style = '';
        }


        let errorElements = document.querySelectorAll('.error');
        for (let i = 0; i < errorElements.length; i++) {
            errorElements[i].remove();
        }
    }

};


let form = document.querySelector('.validator');
form.addEventListener('submit', formValidator.handleSubmit);
