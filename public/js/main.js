const quill = new Quill('#editor', {
    theme: 'snow'
});


const recipeForm = document.getElementById('create-recipe__form')


recipeForm.onsubmit = () => {
    const recipeBodyContent = document.getElementById('body-content')
    recipeBodyContent.value = quill.root.innerHTML;
}
