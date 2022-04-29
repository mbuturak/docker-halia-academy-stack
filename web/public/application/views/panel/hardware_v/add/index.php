<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("panel/common/header") ?>
</head>

<body>
    <div id="app">

        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        
        <?php $this->load->view("panel/sidebar_v/index") ?>

        <div id="main">
            <?php $this->load->view("panel/hardware_v/add/content") ?>
            <?php $this->load->view("panel/common/footer") ?>
        </div>
    </div>

    <?php $this->load->view("panel/common/all_js") ?>
</body>

</html>