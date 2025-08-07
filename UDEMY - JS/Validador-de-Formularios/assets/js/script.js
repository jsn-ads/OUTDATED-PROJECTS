let formValidator = {
    
    handleSubmit:(event)=>{
        event.preventDefault();

        let send = true;

        let inputs = form.querySelectorAll('input');

        console.log(inputs);

        for (let i = 0; i < inputs.length; i++) {
            
            let input = inputs['i'];

            console.log(input);
            
            let check = formValidator.checkInput(input);
            
            if(check !== true){

                send = false;
                console.log(check);

            }
            
        }

        if(send){
            form.submit();
        }
    },
    checkInput:(input) => {

        let rules = input.getAttribute('data-rules');

        if(rules !== null){

            rules = rules.split('|');

            for (let k in rules) {
                
                let rDetails = rules[k].split('=');

                switch(rDetails[0]){

                    case 'required':

                        return "O campo esta vazio.";

                        break;

                    case 'min':

                        return "Nome no minimo com 2 digitos.";

                        break;
                }
            }
        }

        return true;
    }
}

let form = document.querySelector('.formValidator');

form.addEventListener('submit', formValidator.handleSubmit);