<?php $alert = $this->session->userdata("alert");
if (isset($alert) && $alert["type"] == "success") { ?>
    <script>
        Swal.fire({
            title: 'İşte bu !',
            text: 'En kısa zamanda geri dönüş sağlayacağız.',
            icon: 'success',
            confirmButtonText: 'Ok',
        })
    </script>
<?php } else { ?>
    <script>
        Swal.fire({
            title: 'Ops !',
            text: 'Bir hata ile karşılaşıldı lütfen bütün alanları eksiksiz doldurun.',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    </script>
<?php } ?>