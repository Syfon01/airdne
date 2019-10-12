// JavaScript Validation

const name = document.getElementById('name')
const lastname = document.getElementById('lastname')
const pass = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
    let messages = []
    if(name.value == "" || lastname.value == "") {
        messages.push('name cannot be empty')
    }

    if(messages.length > 0) {
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
})