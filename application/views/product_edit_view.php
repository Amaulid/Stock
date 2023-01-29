<form action="<?php echo base_url('product/update/'.$product->id); ?>" method="post">
    <label for="name">Nama Produk:</label>
    <input type="text" name="name" id="name" value="<?php echo $product->name; ?>">
    <br>
    <label for="price">Harga:</label>
    <input type="number" name="price" id="price" value="<?php echo $product->price; ?>">
    <br>
    <label for="quantity">Jumlah:</label>
    <input type="number" name="quantity" id="quantity" value="<?php echo $product->quantity; ?>">
    <br>
    <input type="submit" value="Submit">
</form>

<a href="<?= base_url('product') ?>">Cancel</a>
