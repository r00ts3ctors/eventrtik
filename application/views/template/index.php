<?php
$this->load->view('template/head');
$this->load->view('template/menu');

$this->load->view($slide);
?>

<main id="main">
    <?php
    echo $this->session->flashdata('pesan');

    foreach ($konten as $key => $value) {
        $this->load->view($value);
    }
    ?>

</main>
<?php
$this->load->view('template/footer');

?>