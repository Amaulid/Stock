<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/js/jquery-ui.min.css') ?>">
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.min.js') ?>"></script>
</head>

<body>

<form action="<?php echo base_url('product/save'); ?>" method="post">
    <label for="name">Nama Produk:</label>
    <input type="text" name="name" id="product-name">
    <br>
    <label for="price">Harga:</label>
    <input type="number" step="1" name="price" id="price">
    <br>
    <label for="quantity">Jumlah:</label>
    <input type="number" name="quantity" id="quantity">
    <br>
    <input type="submit" value="Submit">
</form>

<script>
    $(document).ready(function(){
        $("#product-name").autocomplete({
            source: "<?php echo base_url('product/search'); ?>",
            select: function(event, ui){
                $("#product-name").val(ui.item.label);
                $("#price").val(ui.item.price);
                $("#quantity").val(ui.item.quantity);
                return false;
            }
        });
    });
</script>

</body>
</html>
