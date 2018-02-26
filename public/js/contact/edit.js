$(function() {
   $('#submit').on('click', function() {
      $.ajax({
         type: 'POST',
         url: $('#frm-edit').attr('url') + '/contact/update',
         data: $('#frm-edit').serialize(),
         success: function(resp) {
            alert(resp.message);
            if (resp.status) {
               document.location = '/contact/index';
            }
         }, 
         error: function(response) {
            alert('Não foi possível realizar a edição, entrar em contato com o suporte.');
         },
         dataType: 'json'
      });
   });
   
   $('#cell_number').mask('(00) 0 0000-0000');
   $('#phone_number').mask('(00) 0000-0000');
});
