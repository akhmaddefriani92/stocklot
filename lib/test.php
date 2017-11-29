<html>
	<head>
		<title>Belajar AJAX</title>
		<script type="text/javascript" src="prmajax.js"></script>
	</head>
	<body>
	<div id="dom_pesan"></div>
	<form name="frm">
		<table width="300" style="border:silver 1px solid; border-radius:5px;">
		<tr>
			<td colspan="2">FORM INPUT DATA</td>
		</tr>
		<tr>
			<td width="100">Provinsi</td>
			<td>
				<select name="prov" onchange="pilih_kota('dom_kota',this.value);">
					<option value="#">Provinsi</option>
					<option value="1">Bali</option>
					<option value="2">Bangka Belitung</option>
					<option value="3">Banten</option>
					<option value="4">Bengkulu</option>
					<option value="5">DI Yogyakarta</option>
					<option value="6">DKI Jakarta</option>
					<option value="7">Gorontalo</option>
					<option value="8">Jambi</option>
					<option value="9">Jawa Barat</option>
					<option value="10">Jawa Tengah</option>
					<option value="11">Jawa Timur</option>
					<option value="12">Kalimantan Barat</option>
					<option value="13">Kalimantan Selatan</option>
					<option value="14">Kalimantan Tengah</option>
					<option value="15">Kalimantan Timur</option>
					<option value="16">Kalimantan Utara</option>
					<option value="17">Kepulauan Riau</option>
					<option value="18">Lampung</option>
					<option value="19">Maluku</option>
					<option value="20">Maluku Utara</option>
					<option value="21">Aceh</option>
					<option value="22">Nusa Tenggara Barat</option>
					<option value="23">Nusa Tenggara Timur</option>
					<option value="24">Papua</option>
					<option value="25">Papua Barat</option>
					<option value="26">Riau</option>
					<option value="27">Sulawesi Barat</option>
					<option value="28">Sulawesi Selatan</option>
					<option value="29">Sulawesi Tengah</option>
					<option value="30">Sulawesi Tenggara</option>
					<option value="31">Sulawesi Utara</option>
					<option value="32">Sumatera Barat</option>
					<option value="33">Sumatera Selatan</option>
					<option value="34">Sumatera Utara</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Kota</td>
			<td>
				<select name="kota" id="dom_kota">
					<option value="#">Pilih kota</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="button" name="btn" value="Kirim" onclick="kirim_data('dom_pesan');" />
			</td>
		</tr>
	</form>
	</body>
</html>