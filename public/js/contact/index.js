$(function () {
   $('#submit').on('click', function () {
      $('#frm-pesquisar').submit();
   });

   $('.remove').on('click', function () {
      $.ajax({
         type: 'POST',
         url: $('#frm-pesquisar').attr('url') + '/contact/delete',
         data: {id: $(this).attr('val')},
         success: function (resp) {
            console.log(resp);
            if (resp.status) {
               alert('Exclusão realizado com sucesso');
               document.location.reload();
            } else {
               alert('Não foi possível realizar a exclusão');
            }
         },
         error: function (response) {
            alert('Não foi possível realizar a requisição, favor entrar em contato.');
         },
         dataType: 'json'
      });
   });

   $('.edit').on('click', function () {
      document.location = $('#frm-pesquisar').attr('url') + '/contact/edit?id=' + $(this).attr('val');
   });
});