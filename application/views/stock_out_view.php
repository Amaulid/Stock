<form action="<?php echo base_url('stock_out/add'); ?>" method="post">
    <label for="product_id">ID Produk:</label>
    <select name="product_id" id="product_id">
        <?php foreach ($products as $product): ?>
        <option value="<?php echo $product->id; ?>"><?php echo $product->name; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="quantity">Jumlah:</label>
    <input type="number" name="quantity" id="quantity">
    <br>
    <input type="submit" value="Submit">
</form>
