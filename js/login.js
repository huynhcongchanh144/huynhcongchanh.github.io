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
    }
    var formEle = document.querySelector(options.form);
    if(formEle){
        formEle.onsubmit = (e)=>{
            e.preventDefault();
            options.rules.forEach((rule)=>{
                var inputEle = formEle.querySelector(rule.selector);
                var errorFormMess = inputEle.parentElement.querySelector(options.errorSelector);
                validate(inputEle,rule,errorFormMess);
            });
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