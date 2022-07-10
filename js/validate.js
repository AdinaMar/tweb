// getting all forms
const elForms = [...document.querySelectorAll('form')];

// looping an array
elForms.map(elForm => {
  // Get your DOM references just once, not every time the function runs
  const elInput  = elForm.querySelector(`input[type='text']`);
  const elPassword  = elForm.querySelector(`input[type='password']`);
  const elName = elForm.querySelector('.name');
  const elEmail = elForm.querySelector(`input[type='email']`);
  const elAddress = elForm.querySelector('.address');

  // Set up event handlers in JavaScript
  elForm.addEventListener('submit', (event) => validateUsername(event, elInput)); // passing parameters
  elForm.addEventListener('submit', (event) => validatePassword(event, elPassword)); // passing parameters
  elForm.addEventListener('submit', (event) => validateName(event, elName)); // passing parameters
  elForm.addEventListener('submit', (event) => validateEmail(event, elEmail)); // passing parameters
  elForm.addEventListener('submit', (event) => validateUsername(event, elAddress)); // passing parameters
});

function validateUsername(event, elInput) {
    if(elInput.value==='') { 
        setErrorFor(elInput, 'Username cannot be blank')
        event.preventDefault();
    } 
}

function validatePassword(event, elInput) {
    if(elInput.value==='') { 
        setErrorFor(elInput, 'Password cannot be blank')
        event.preventDefault();
    }else if(elInput.value.length <= 6) {
        setErrorFor(elInput, 'Password must be at least 6 characters');
        event.preventDefault();        
    }
}

function validateName(event, elInput) {
    if(elInput.value==='') { 
        setErrorFor(elInput, 'Name cannot be blank')
        event.preventDefault();
    }else if (!isName(elInput.value)) {
        setErrorFor(elInput, 'Name is not valid');
        event.preventDefault();        
    }
}

function validateEmail(event, elInput){
    if(elInput.value==='') { 
        setErrorFor(elInput, 'Email cannot be blank')
        event.preventDefault();
    }else if (!isEmail(elInput.value)) {
        setErrorFor(elInput, 'Email is not valid');
        event.preventDefault();        
    }
}



function setErrorFor(input, message) {
    const inputParent = input.parentElement;
    const small = inputParent.querySelector('small');
  
    //add error inside small element
    small.innerText = message;
    inputParent.className = 'form-input error';
  }
  
  function setSuccessFor(input) {
    const inputParent = input.parentElement;
    inputParent.classList.remove('error');
  }
  
  function isName(name) {
    return /^[a-zA-Z ]+$/.test(name);
  }
  
  function isEmail(email) {
    return /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(
      email
    );
  }