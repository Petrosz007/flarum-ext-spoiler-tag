let spoilers = document.getElementsByClassName('spoiler-collapse');

for(let i = 0; i < spoilers.length; i++) {
    let element = spoilers[i];
    element.addEventListener('click', () => {
        this.classList.toggle('spoiler-collapse-active');

        let spoiler_content = this.nextElementSibling;
        if(spoiler_content.style.maxHeight == 0) {
            spoiler_content.style.maxHeight = 0;
        } else {
            spoiler_content.style.maxHeight = spoiler_content.scrollHeight + "px";
        }
    });
    console.log('asd'); 
}