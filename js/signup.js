function Validator(options){
    function validate(inputEle, rule, message){
        var errorMess = rule.test(inputEle.value)
        if(errorMess){
            message.innerText = errorMess;
            inputEle.parentElement.classList.add('invalid');
        }else{
            message.innerText = '';
            inputEle.parentElement.classList.remove('invalid');
        }
        return !errorMess;
    }
    var formEle = document.querySelector(options.form);
    if(formEle){
        formEle.onsubmit = (e)=>{
            e.preventDefault();
            var isFormValid = true;
            options.rules.forEach((rule)=>{
                var inputEle = formEle.querySelector(rule.selector);
                var errorFormMess = inputEle.parentElement.querySelector(options.errorSelector);
                var isValid = validate(inputEle,rule,errorFormMess);
                if(!isValid){
                    isFormValid = false;
                }
            });
            if(isFormValid){
                if(typeof options.onSubmit === 'function'){
                    var enableInputs = formEle.querySelectorAll('[name]');
                    var formValues = Array.from(enableInputs).reduce((values,input)=>{
                        values[input.name] = input.value
                        return values;
                    },{});
                    options.onSubmit(formValues);
                }
            }
        }
        options.rules.forEach((rule)=>{
            var inputEle = formEle.querySelector(rule.selector);
            if(inputEle){
                var errorFormMess = inputEle.parentElement.querySelector(options.errorSelector);
                inputEle.onblur = ()=>{
                    validate(inputEle,rule,errorFormMess);
                }
                inputEle.oninput = ()=>{
                    if(inputEle.value){
                        errorFormMess.innerText = '';
                        inputEle.parentElement.classList.remove('invalid');
                    }
                }
            }
        })
    }
}

Validator.checkRuleRequired = (selector)=>{
    return{
        selector: selector,
        test: (value)=>{
            return value.trim() ? undefined : 'Vui lòng nhập trường này!'
        }
    }
}

Validator.checkRuleEmail = (selector)=>{
    return{
        selector: selector,
        test: (value)=>{
            var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if(value){
                return regex.test(value) ? undefined : 'Vui lòng nhập đúng định dạng email';
            }else{
                return 'Vui lòng nhập trường này!'
            }
            
        }
    }
}

Validator.checkRuleUsername = (selector, min)=>{
    return{
        selector: selector,
        test:(value)=>{
            var regex = /^[a-z0-9_-]{3,16}$/;
            if(value){
                if(value.length < min){
                    return `Vui lòng nhập vào tối thiểu ${min} ký tự`
                }
                else{
                    return regex.test(value) ? undefined : 'Vui lòng nhập đúng định dạng username';
                }
            }else{
                return 'Vui lòng nhập trường này'
            }
        }
    }
}

Validator.minLength = (selector, min)=>{
    return{
        selector:selector,
        test:(value)=>{
            if(value){
                return value.length >= min ? undefined : `Vui lòng nhập vào tối thiểu ${min} ký tự`;
            }else{
                return 'Vui lòng nhập trường này'
            }
            
        }
    }
}

Validator.confirmedPassword = (selector, getPassword) =>{
    return{
        selector: selector,
        test:(value)=>{
            if(value){
                return value === getPassword() ? undefined: 'Giá trị nhập vào không hợp lệ!';
            }else{
                return 'Vui lòng nhập trường này'
            }
            
        }
    }
}