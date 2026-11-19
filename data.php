<?php
include 'koneksi.php';
$sql = "select * from anggota";
$hasil = mysqli_query($koneksi, $sql);
$jumlah = mysqli_num_rows($hasil);
?>
<p>Jumlah Anggota: <?php echo $jumlah; ?></p>
<table>
    <tr>
        <th>No</th>
        <th>No Anggota</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($baris = mysqli_fetch_assoc($hasil)) { ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo htmlspecialchars($baris["no_anggota"]); ?></td>
        <td><?php echo htmlspecialchars($baris["nama_lengkap"]); ?></td>
        <td><?php echo htmlspecialchars($baris["alamat"]); ?></td>
        <td>
            <a href="detail.php?id=<?php echo (int) $baris["id"]; ?>">Detail</a>
            <form class="inline" action="hapus.php" method="post"
                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                <input type="hidden" name="id" value="<?php echo (int) $baris["id"]; ?>">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>