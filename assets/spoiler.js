let spoilers = document.getElementsByClassName('spoiler-collapse');

for(let index_ = 0; index_ < spoilers.length; index_++) {
    let element = spoilers[index_];
    element.addEventListener('click', (e) => {
        e.currentTarget.classList.toggle('spoiler-collapse-active');

        let spoiler_content = e.currentTarget.nextElementSibling;
        if(spoiler_content.style.maxHeight == 0) {
            spoiler_content.style.maxHeight = 0;
        } else {
            spoiler_content.style.maxHeight = spoiler_content.scrollHeight + "px";
        }
    });
}