$(function(){
  $("#post-form").validate({
    rules: {
      image:{
        required: true,
        extension: "xls|csv"
      }
    }
    messages:{
      required: 'please upload featured image'
    }
  });
});
