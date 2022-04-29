 $(function() {
  $(".productType").change(function(){

    var myValue = $(this).val();
    var base_url = $(this).data("url");

    $.ajax({
      type:"post",
      url: base_url,
      data :{"myId":myValue},
      dataType:"text",
      success:function(data){
        console.log(data);

        $("#productName").html(data);
      }
    })
  })

  
});