$(document).ready(function() {
 //Updating
 $('.edit-row').on('click', function(){
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form
   const payload = $(this).data('payload')
   console.log(payload);

   $('input[name=product_name]').removeAttr('required')
   $('input[name=product_image]').removeAttr('required')
   $('textarea[name=product_desc]').removeAttr('required')
   $('input[name=product_stock]').removeAttr('required')

   $('input[name=product_name]').val(payload.product_name)
   $('textarea[name=product_desc]').val(payload.product_desc)
   $('input[name=product_stock]').val(payload.product_stock)
   $('#preview').attr('src', payload.product_image)

   // $('select[name=user_type] option').each(function() {
   //   $(this).removeAttr('selected')
   // });
   // $('select[name=user_type] option').filter(function () { return $(this).html() == payload.user_type; }).attr('selected', 'selected')

   $('#main-form').attr('action', base_url + 'cms/products/update/' + payload.product_id)
   $('.modal').modal()
 })

 // Adding
 $('.add-btn').on('click', function() {
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form

   $('input[name=product_name]').attr('required', 'required')
   $('input[name=product_image]').attr("required", 'required')
   $('input[name=product_stock]').attr('required', 'required')
   $('textarea[name=product_desc]').attr("required", 'required')

   $('#main-form').attr('action', base_url + 'cms/products/add')
   
 })

 //Deleting
 $('.btn-delete').on('click', function(){

   let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
   if (p === 'DELETE') {
     const id = $(this).data('id')
     console.log(id);

     invokeForm(base_url + 'cms/products/delete', {id: id});
   }

 })

})