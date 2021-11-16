window.addEventListener("DOMContentLoaded", () => {
  const btns = document.querySelectorAll(".switch_btn2");

  btns.forEach(function(btn2){
    btn2.addEventListener('click', function(){
      console.log(btn2.dataset.id);
      const comments = document.getElementById(`comments-${btn2.dataset.id}`);
      if(getComputedStyle(comments).display == "none"){
        comments.style.display = "block";
      } else {
        comments.style.display = "none";
      }
    })
  })
})