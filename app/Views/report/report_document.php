<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Dokumen Jamaah</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <style type="text/css">
        .head {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        .body {
            border-collapse: collapse;
            border: 1px;
            border-color: black;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
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
    <center>
        <table class="head" width="625">
            <tr>
                <td>
                    <center>
                        <font size="5"><b>Zafa Tour Padang</b></font><br>
                        <font size="2">Alamat : Jalan Ampang Karang Ganting No. 16</font><br>
                        <font size="2"><i>Email : zafatourpadang@gmail.com Telp./Fax (0821) 7153 8531</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <table width="625" class="head">
                <tr>
                    <td class="text2">Kota Padang, <?= date("d M Y"); ?></td>
                </tr>
            </table>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Dokumen Jamaah</td>
            </tr>
        </table>
        <table border="1" class="body" width="625">
            <?php $no = 0;
            foreach ($jamaah as $row) : $no++ ?>
                <tr style="height: 30px;">
                    <td width="150px" style="padding-left: 10px;">NIK</td>
                    <td style="padding-left: 10px;"><strong><?= $row['document_nik']; ?></strong></td>
                </tr>
                <tr style="height: 30px;">
                    <td style="padding-left: 10px;">Nama</td>
                    <td style="padding-left: 10px;"><strong><?= $row['document_nama']; ?></strong></td>
                </tr>
                <tr style="height: 30px;">
                    <td style="padding-left: 10px;">Alamat</td>
                    <td style="padding-left: 10px;">
                        <strong><?= $row['document_alamat']; ?></strong>
                    </td>
                </tr>
                <tr style="height: 30px;">
                    <td style="padding-left: 10px;">Tempat Tanggal Lahir</td>
                    <td style="padding-left: 10px;">
                        <strong>
                            <?= $row['document_tempat_lahir']; ?>,
                            <?= $row['document_tgl_lahir']; ?>
                        </strong>
                    </td>
                </tr>
                <tr style="height: 30px;">
                    <td style="padding-left: 10px;">No. Telp</td>
                    <td style="padding-left: 10px;">
                        <strong><?= $row['document_notelp']; ?></strong>
                    </td>
                </tr>
                <tr style="height: 30px;">
                    <td style="padding-left: 10px;">Jenis Kelamin</td>
                    <td style="padding-left: 10px;">
                        <strong> <?= $row['document_kelamin'] == 0 ? 'Perempuan' : 'Laki-Laki' ?></strong>
                    </td>
                </tr>
                <tr style="height: 30px;">
                    <td style="padding-left: 10px;">No. Passport</td>
                    <td style="padding-left: 10px;">
                        <strong><?= $row['document_no_paspor']; ?></strong>
                    </td>
                </tr>
                <tr style="height: 30px;">
                    <td style="padding-left: 10px;">Tgl Berlaku</td>
                    <td style="padding-left: 10px;">
                        <strong><?= $row['document_tgl_berlaku']; ?></strong>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 10px;">Foto KTP</td>
                    <td>
                        <img src="<?= base_url() ?>/document/<?= $row['document_foto_ktp']; ?>" width="100px" height="100px">
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 10px;">Foto Passport</td>
                    <td>
                        <img src="<?= base_url() ?>/document/<?= $row['document_foto_paspor']; ?>" width="100px" height="100px">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <table width="625" style="margin-top: 30px;">
            <tr style="text-align: right !important;">
                <td>Kota Padang, <?= date("d M Y"); ?></td>
            </tr>
            <tr style="text-align: right !important;">
                <td>Admin</td>
            </tr>
            <tr style="text-align: right !important; height: 120px;">
                <td>(...........................................)</td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>