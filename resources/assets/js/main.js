$(function(){

  window.getEmail = (id) => {
    fetch(`/donor/${id}/get_email`)
    .then((response) => response.json())
    .then((data) => {
      if (data.status) {
        location.href = `mailto:${data.result}?subject=Interest In Healthcare Supplies&body=Hello, I saw your account on hometohospital.com and wanted to contact you about supplies you could make or donate.`
      }
    });
   }
})
