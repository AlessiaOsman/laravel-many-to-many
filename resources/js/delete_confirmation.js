const deleteForm = document.querySelectorAll('.delete-form');
deleteForm.forEach(form => {
    form.addEventListener('submit', e =>{
        e.preventDefault();
        const confirmation = confirm('Sei sicuro di voler cancellare il progetto?');
        if(confirmation) form.submit();
    })
})
