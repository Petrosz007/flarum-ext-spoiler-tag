let spoilers = document.getElementsByClassName("spoiler-collapse");

for (let i = 0; i < spoilers.length; i++) {
  spoilers[i].addEventListener("click", function() {
    this.classList.toggle("spoiler-collapse-active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
} 