$(document).ready(function(e) { 

  $('.datepicker').datepicker({
    format: "dd/mm/YYYY",
    todayHighlight: true,
    autoclose: true,
    clearBtn: true
  });

  var quill = new Quill('#editor', {
    theme: 'snow'
  });
  var quill2 = new Quill('#editor2', {
    theme: 'snow'
  });

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
        heroId: $(this).attr("featuresId"),
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

    $(".remove-btn").on("click", function () {
        
        var url = $(this).data("url");
    
        var data = {
          menuId: $(this).attr("menuId"),
        };
    
        Swal.fire({
          title: "Emin misiniz?",
          text: "Bu menü ve buna bağlı diğer menüler silinecektir. Bu işlemi geri alamayacaksınız ! Devam etmek istiyor musunuz?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Evet, Sil!",
          cancelButtonText: "Hayır",
        }).then((result) => {
          if (result.isConfirmed) {
            $.post(url, data, function (response) {
              location.reload();
            });
          }
        });
      });

      $(".remove-training").on("click", function () {
        
        var url = $(this).data("url");
    
        var data = {
          trainingId: $(this).attr("trainingId"),
          imageUrl: $(this).attr("imageUrl"),
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

      $(".statusChange-training").on("click", function () {
        
        var url = $(this).data("url");
    
        var data = {
          trainingId: $(this).attr("trainingId"),
        };
    
        $.post(url, data, function (response) {
          location.reload();
        });
        
      });

      $(".tutor-remove-btn").on("click", function () {
        
        var url = $(this).data("url");
    
        var data = {
          tutorId: $(this).attr("tutorId"),
          imageUrl: $(this).attr("imageUrl"),
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

      $(".comment-remove").on("click", function () {
        
        var url = $(this).data("url");
    
        var data = {
          commentId: $(this).attr("commentId")
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

 });  
