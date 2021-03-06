$(function() {
   $('#submit').on('click', function() {
      $.ajax({
         type: 'POST',
         url: $('#frm-create').attr('url') + '/contact/store',
         data: $('#frm-create').serialize(),
         success: function(resp) {
            alert(resp.message);
            if (resp.status) {
               document.location = '/contact/index';
            }
         }, 
         error: function(response) {
            alert('Não foi possível realizar o cadastro.');
         },
         dataType: 'json'
      });
   });
   
   $('#cell_number').mask('(00) 0 0000-0000');
   $('#phone_number').mask('(00) 0000-0000');
});
