$(document).ready(function(e) { 
   
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    $(".remove-hero").on("click", function () {
        
      var url = $(this).data("url");
  
      var data = {
        heroId: $(this).attr("heroId"),
      };
  
      Swal.fire({
        title: "Emin misiniz?",
        text: "Bu işlemi geri alamayacaksınız !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Tamam, Sil!",
        cancelButtonText: "Hayır",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(url, data, function (response) {
            location.reload();
          });
        }
      });
    });

    $(".remove-features").on("click", function () {
        
      var url = $(this).data("url");
  
      var data = {
        featuresId: $(this).attr("featuresId"),
      };
  
      Swal.fire({
        title: "Emin misiniz?",
        text: "Bu işlemi geri alamayacaksınız !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Tamam, Sil!",
        cancelButtonText: "Hayır",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(url, data, function (response) {
            location.reload();
          });
        }
      });
    });

    $(".remove-keywords").on("click", function () {
        
      var url = $(this).data("url");
  
      var data = {
        keywordsId: $(this).attr("keywordsId"),
      };
  
      Swal.fire({
        title: "Emin misiniz?",
        text: "Bu işlemi geri alamayacaksınız !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Tamam, Sil!",
        cancelButtonText: "Hayır",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(url, data, function (response) {
            location.reload();
          });
        }
      });
    });

    $("#contactForm").submit(function(e){
      e.preventDefault();
      var form= $("#contactForm");
      $.ajax({
          type: form.attr('method'),
          url: form.attr('action'),
          data: form.serialize(),
          success: function (data) {
          console.log(data);
          if(data){
            Swal.fire({
              icon: 'success',
              title: 'İşlem Başarılı',
              text: 'Process ekleme başarılı.',
            })
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
             
            })
          }
          },
          error: function (data, status, error) {
            alert(data.responseText);
        }
      });
    });
 });
