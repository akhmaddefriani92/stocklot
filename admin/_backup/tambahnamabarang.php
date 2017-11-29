<?php include "config.php";

switch ($_GET[act]) {
	// Tampil Kategori Barang
	default:
		?>
		<h2>Tambah Kategori Barang</h2>
		<form method=POST action='aksi.php?module=tambahnamabarang&act=input'>
			<table >
				<tr><td>Tambah nama</td><td> : <input type=text name='namaBarang' size=30></td></tr>
				<tr><td colspan=2 align=right><input type=submit value='Simpan'>&nbsp;&nbsp;&nbsp;
						<input type=reset value='Batal'></td></tr>
			</table>
		</form>
		<br/>
		<h2>Data Kategori Barang</h2>
		<table border="1" class="tabel">
			<tr>
				<th>No</th>
				<th>Kategori</th>
				<th>Aksi</th>
			</tr>
			<?php
			$tampil = mysql_query("SELECT * from nm_brg");
			$no = 1;
			while ($r = mysql_fetch_array($tampil)) {
				//untuk mewarnai tabel menjadi selang-seling
				/*
				  if (($no % 2) == 0) {
				  $warna = "#EAF0F7";
				  } else {
				  $warna = "#FFFFFF";
				  }
				 * 
				 */
				// Mewarnai tabel diganti dengan css agar lebih fleksibel
				?>
				<tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
					<td><?php echo $no; ?></td>
					<td><?php echo $r['nm_brg']; ?></td>
					<td><a href=tambahnamabarang.php?act=editnamabarang&id=<?php echo $r['id']; ?>>Edit</a> |
						<a href=aksi.php?module=namabarang&act=hapus&id=<?php echo $r['id']; ?>>Hapus</a>
					</td>
				</tr>
				<?php
				$no++;
			}
			echo "</table>
                <p>&nbsp;</p>
                <a href=javascript:history.go(-1)><< Kembali</a>";
			break;

		case "editnamabarang":
			$edit = mysql_query("select * from nm_brg where id = '$_GET[id]'");
			$data = mysql_fetch_array($edit);
			echo "<h2>Edit Kategori Barang</h2>
            <form method=POST action='aksi.php?module=nm_brg&act=update' name='editnamabarang'>
              <input type=hidden name='id' value='$data[id]'>
              <table>
                <tr><td>Edit Kategori</td><td> : <input type=text name='namaBarang' size=30 value='$data[nm_brg]'></td></tr>
                <tr><td colspan=2 align=right><input type=submit value='Simpan'>&nbsp;&nbsp;&nbsp;
                                <input type=button value=Batal onclick=self.history.back()></td></tr>
              </table>
               </form>
            <br/>
              <h2>Data Kategori Barang</h2>";
			?>
			<table border="1" class="tabel">
				<tr>
					<th>No</th>
					<th>Kategori</th>
					<th>Aksi</th>
				</tr>
				<?php
				$tampil = mysql_query("SELECT * from nm_brg");
				$no = 1;
				while ($r = mysql_fetch_array($tampil)) :
					?>

					<tr <?php echo $no % 2 === 0 ? 'class="alt"' : ''; ?>>
						<td><?php echo $no; ?></td>
						<td><?php echo $r['nm_brg']; ?></td>
						<td class=td><a href=tambahnamabarang.php?&act=editnamabarang&id=<?php echo $r['id']; ?>>Edit</a> |
							<a href=aksi.php?module=nm_brg&act=hapus&id=<?php echo $r['id']; ?>>Hapus</a>
						</td>
					</tr>
					<?php
					$no++;
				endwhile;
				?>
			</table>
			<?php
			break;
	}


	/* CHANGELOG -----------------------------------------------------------

	  1.0.1 / 2010-06-03 : Harry Sufehmi		: various enhancements, bugfixes
	  0.6.5		    : Gregorius Arief		: initial release

	  ------------------------------------------------------------------------ */
	?>
