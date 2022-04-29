<?php $alert = $this->session->userdata("alert");
if (isset($alert) && $alert["type"] == "success") { ?>
    <script>
        Toastify({
            text: "<?php echo $alert["text"] ?>",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "center",
            backgroundColor: "#2FAF4E",
        }).showToast();
    </script>
<?php } else { ?>
    <script>
        Toastify({
            text: "<?php echo $alert["text"] ?>",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "center",
            backgroundColor: "#FF5733",
        }).showToast();
    </script>
<?php } ?>