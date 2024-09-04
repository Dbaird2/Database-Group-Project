function myFunction() {
    let element = document.body;
    element.classList.toggle("dark");

    const title_to_change = document.querySelectorAll('.text');
    const buttons_to_change = document.querySelectorAll('.text-to-change')
    title_to_change.forEach(section => {
        section.classList.toggle("whiteText");
    })
    buttons_to_change.forEach(section =>{
        section.classList.toggle("whiteText");
    })
}