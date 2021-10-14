window.addEventListener("DOMContentLoaded", () => {
  const btns = document.querySelectorAll(".switch_btn");

  btns.forEach(function(btn){
    btn.addEventListener('click', function(){
      console.log(btn.dataset.id);
      const body = document.getElementById(`body-${btn.dataset.id}`);
      if(getComputedStyle(body).display == "none"){
        body.style.display = "block";
      } else {
        body.style.display = "none";
      }
    })
  })
})