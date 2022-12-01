<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Booking</title>
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
        <table class="head" width="1000">
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
            <table width="1000" class="head">
                <tr>
                    <td class="text2">Kota Padang, <?= date("d M Y"); ?></td>
                </tr>
            </table>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Manifest Booking Zafa Tour</td>
            </tr>
        </table>
        <table border="1" class="body" width="1000">
            <thead>
                <tr style="height: 25px;">
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>No Hp</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl Lahir</th>
                    <th>Passpor</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($booking as $row) : $no++ ?>
                    <tr style="height: 20px; text-align: center;">
                        <td> <?= $row['document_nama']; ?></td>
                        <td> <?= $row['document_nik']; ?></td>
                        <td>
                            <?php if ($row['document_kelamin'] == 0) { ?>
                                P
                            <?php } else { ?>
                                L
                            <?php } ?>
                        </td>
                        <td> <?= $row['document_notelp']; ?></td>
                        <td> <?= $row['document_tempat_lahir']; ?></td>
                        <td> <?= $row['document_tgl_lahir']; ?></td>
                        <td> <?= $row['document_no_paspor']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table width="1000" style="margin-top: 30px;">
            <tr style="text-align: right !important;">
                <td>Kota Padang, <?= date("d M Y"); ?></td>
            </tr>
            <tr style="text-align: right !important;">
                <td>Pimpinan</td>
            </tr>
            <tr style="text-align: right !important; height: 120px;">
                <td>(...........................................)</td>
            </tr>
        </table>
    </center>
</body>

<script>
    // window.print();
</script>

</html>