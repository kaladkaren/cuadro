$(document).ready(function() {
 //Updating
 $('.edit-row').on('click', function(){
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form
   const payload = $(this).data('payload')
   console.log(payload);

   $('textarea[name=faq_question]').removeAttr('required')
   $('textarea[name=faq_answer]').removeAttr('required')

   $('textarea[name=faq_question]').val(payload.faq_question)
   $('textarea[name=faq_answer]').val(payload.faq_answer)

   // $('select[name=user_type] option').each(function() {
   //   $(this).removeAttr('selected')
   // });
   // $('select[name=user_type] option').filter(function () { return $(this).html() == payload.user_type; }).attr('selected', 'selected')

   $('#main-form').attr('action', base_url + 'cms/faq/update/' + payload.faq_id)
   $('.modal').modal()
 })

 // Adding
 $('.add-btn').on('click', function() {
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form

   $('textarea[name=faq_question]').attr('required', 'required')
   $('textarea[name=faq_answer]').attr("required", 'required')

   $('#main-form').attr('action', base_url + 'cms/faq/add')
   
 })

 //Deleting
 $('.btn-delete').on('click', function(){

   let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
   if (p === 'DELETE') {
     const id = $(this).data('id')
     console.log(id);

     invokeForm(base_url + 'cms/faq/delete', {id: id});
   }

 })

})