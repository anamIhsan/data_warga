<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: center;
			font-size: 20px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <center>
      <table>
        <tr>
          <td><img src="{{ asset('dist/img/user2-160x160.jpg') }}" width="90" height="90"></td>
          <td>
          <center>
            <font size="5">PEMERINTAH KABUPATEN JAKARTA PUSAT</font><br> 
            <font size="5">KECAMATAN KEMAYORAN</font><br>
            <font size="5">KELURAHAN KEBON KOSONG</font><br>
            <font size="4"><b>
              Alamat : Kebon Kosong, Kemayoran, Jakarta Pusat, Kode Pos 55663
              <br>
              Telp. (0247) 99996666
            </b></font><br>
          </center>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      <table width="625">
        <tr>
          <td class="text2">SURAT KETERANGAN PENDATANG</td>
        </tr>
      </table>
      </table>
      <table>
        <tr class="text2">
          <td>NIK</td>
          <td width="572">: {{ $data->nik }}</td>
        </tr>
        <tr>
          <td>Perihal</td>
          <td width="564">: Kebutuhan Warga</td>
        </tr>
      </table>
      <br>
      <table width="625">
        <tr>
             <td>
               <font size="2">Kpd yth.<br><strong>{{ $data->residents->name }}</strong><br></font>
             </td>
          </tr>
      </table>
      <br>
      <table width="625">
        <tr>
             <td>
               <font size="2">
                  Assalamu'alaikum wr.wb<br>Dalam rangka praktikum simulasi digital yg jatuh pada tanggal 16 mei 2019
                  Siswa smk baitul hikmah <b>kelas X</b> akan mengadakan peraktikum, jadi di harapkan siswa di minta hadir
                  pada tempat yang sudah di siapkan.
                </font>
             </td>
          </tr>
      </table>
      <br>
      </table>
      <table>
        <tr class="text2">
          <td>Pelapor</td>
          <td width="541">: {{ $data->resident->name }}</td>
        </tr>
        <tr>
          <td>Tanggal datang</td>
          <td width="525">: {{ $data->tanggal_datang }}</td>
        </tr>
        <tr>
          <td>Jenis kelamin</td>
          <td width="525">: </td>
        </tr>
      </table>
      <br>
      <table width="625">
        <tr>
             <td>
                <font size="2">
                  Diharapkan atas kehadiranya, Demikian surat ini di sampaikan, atas perhatian dan kerjasamanya kami
                  ucapkan terima kasih.<br><br>Wassalamu'alaikum wr.wb.
                </font>
             </td>
          </tr>
      </table>
      <br>
      <table width="625">
        <tr>
          <td width="430"><br><br><br><br></td>
          <td class="text" align="center">Ketua RW<br><br><br><br>Bpk Fauzy.s.kom</td>
        </tr>
         </table>
    </center>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
