<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $product->name; ?></td>
            <td>Rp.<?php echo $product->price; ?></td>
            <td><?php echo $product->quantity; ?></td>
            <td>
                <a href="<?php echo base_url('product/edit/'.$product->id); ?>">Edit</a> |
                <a href="#" onclick="confirmDelete('<?=base_url('product/delete/'.$product->id);?>')">Delete</a>
            </td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo base_url('product/add'); ?>">Tambah Produk</a>

<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this product?")) {
        window.location.href = id;
    }
}
</script>
