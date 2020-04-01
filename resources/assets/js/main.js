$(function(){
  $(document).ready(()=> {
    setTimeout(function(){
      $('input[data-required=true]').attr('required', true);
    }, 500);
  })

  window.getEmail = (id) => {
    fetch(`/donor/${id}/get_email`)
    .then((response) => response.json())
    .then((data) => {
      if (data.status) {
        location.href = `mailto:${data.result}?subject=Interest In Healthcare Supplies&body=Hello, I saw your account on hometohospital.com and wanted to contact you about supplies you could make or donate.`
      }
    });
   }

   window.toggleSubmitLoader = () => {
     $('#loader').attr('hidden') ? $('#loader').attr('hidden', false) : $('#loader').attr('hidden', true)
     $('#submit').attr('hidden') ? $('#submit').attr('hidden', false) : $('#submit').attr('hidden', true)
   }

   window.submitDonor = () => {
     toggleSubmitLoader();
     let errorFields = []
     let items = []
     const fields = [
       'first_name',
       'last_name',
       'bio',
       'email',
       'location',
     ];
     const required = [
       'first_name',
       'last_name',
       'email',
       'location',
     ]
     const data = {};


     // validate input/textarea fields
     fields.map((field) => {
       const value = $(`[name='${field}']`).val()

       if (value.length === 0 && required.includes(field)) {
         errorFields.push(field)
       }
       data[field] = value
     })

     // collect all items
     $('tr.is-selected').each((idx, el) => {
       items.push([
         $(el).data('item-id'),
         $(el).data('item-type'),
       ])
     })

     // push error message to array if you have noting selected
     items.length === 0 ? errorFields.push('items') : null
     // show errors
     if (errorFields.length > 0) {
       toggleSubmitLoader();
       alert(`${errorFields.join(' ,')} cannot be empty.`)
       return false
     }
     // items appended to data obj
     data.items = items

     $.ajax({
       url: '/donor/new/submit',
       type: 'POST',
       data: data,
       success: (result) => {
         const res = JSON.parse(result);

         if(res.status) {
           window.location = `/donor/${res.id}/details`
         } else {
           alert(res.msg);
           toggleSubmitLoader();
         }
       }
     })
   }
})
