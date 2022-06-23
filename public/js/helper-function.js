const $ = (selector) => {
    return document.getElementById(selector);
}

// отражаем ошибки
const showError = (property) => {
    if (property) {
        let elementInput = document.querySelector(`[name="${property}"]`)
        let elementError = document.querySelector(`.${property}`)
        if(elementInput) elementInput.classList.add('is-invalid')
        if(elementError) elementError.classList.remove('d-none')
    }
}

// очищаем форму от стилизации об ошибках
const clearError = () => {
    document.querySelectorAll('.text-error').forEach(element=> element.classList.add('d-none'))
    document.querySelectorAll('.is-invalid').forEach(element=> element.classList.remove('is-invalid'))
}

// выполняем проверку элементов формы
const checkForm = (data) => {
    clearError()
    for (let property in data) {
        showError(property)
        document.querySelector(`.${property}`).textContent = data[property]
    }
}


