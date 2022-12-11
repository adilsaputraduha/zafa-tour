<!DOCTYPE html>
<html>

<head>
    <title>Faktur Booking</title>
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
        <table class="head" width="700">
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
                <td>Faktur Booking</td>
            </tr>
        </table>
        <table class="head" width="700" style="margin-bottom: 20px;">
            <?php $no = 0;
            foreach ($booking as $row) : $no++ ?>
                <tr>
                    <td width="10%" style="padding-top: 0.5rem;">Nomor Nota</td>
                    <td width="20%" style="padding-top: 0.5rem;"><strong><?= $nomorbooking; ?></strong></td>
                    <td width="10%" style="padding-top: 0.5rem;">Peserta</td>
                    <td width="20%" style="padding-top: 0.5rem;"><strong><?= $row['peserta_nama']; ?></strong></td>
                </tr>
                <tr>
                    <td style="padding-top: 0.5rem;">Tanggal</td>
                    <td style="padding-top: 0.5rem;"><strong><?= $row['booking_tanggal']; ?></strong></td>
                    <td style="padding-top: 0.5rem;">Status</td>
                    <td style="padding-top: 0.5rem;">
                        <strong>
                            <?php if ($row['booking_status'] == 1) { ?>
                                Belum Bayar
                            <?php } else if ($row['booking_status'] == 2) { ?>
                                Sudah Bayar DP (Belum Verifikasi)
                            <?php } else if ($row['booking_status'] == 3) { ?>
                                Sudah Bayar DP (Sudah Verifikasi)
                            <?php } else if ($row['booking_status'] == 4) { ?>
                                Diverifikasi
                            <?php } else if ($row['booking_status'] == 5) { ?>
                                Selesai
                            <?php } else if ($row['booking_status'] == 6) { ?>
                                Batal
                            <?php } else if ($row['booking_status'] == 7) { ?>
                                Cicilan
                            <?php } else if ($row['booking_status'] == 8) { ?>
                                Sudah Bayar Lunas (Belum Verifikasi)
                            <?php } else { ?>
                                Sudah Bayar Lunas (Sudah Verifikasi)
                            <?php } ?>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 0.5rem;">Metode Pembayaran</td>
                    <td style="padding-top: 0.5rem;"><strong>
                            <?php if ($row['booking_metode'] == 0) { ?>
                                Lunas
                            <?php } else { ?>
                                Cicilan
                            <?php } ?>
                        </strong></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <table border="1" class="body" width="700">
            <thead>
                <tr style="height: 25px;">
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Jenis</th>
                    <th>Peserta</th>
                    <th>Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($booking as $row) : $no++ ?>
                    <tr style="height: 20px; text-align: center;">
                        <td> <?= $row['paket_nama']; ?></td>
                        <td> <?= 'Rp ' . number_format($row['paket_harga']) ?></td>
                        <td>
                            <?php if ($row['booking_jenis'] == 0) { ?>
                                Perorangan
                            <?php } else { ?>
                                Kelompok
                            <?php } ?>
                        </td>
                        <td> <?= $row['booking_jumlah']; ?></td>
                        <td> <?= 'Rp ' . number_format($row['booking_total']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table class="head" width="700" style="margin-bottom: 20px; margin-top: 30px;">
            <?php $no = 0;
            foreach ($booking as $row) : $no++ ?>
                <tr>
                    <td width="10%" style="padding-top: 0.5rem;">Tanggal Keberangkatan</td>
                    <td width="20%" style="padding-top: 0.5rem;"><strong><?= date('d M Y', strtotime($row['paket_tgl_mulai'])) ?></strong></td>
                </tr>
                <tr>
                    <td width="10%" style="padding-top: 0.5rem;">Tanggal Selesai</td>
                    <td width="20%" style="padding-top: 0.5rem;"><strong><?= date('d M Y', strtotime($row['paket_tgl_selesai'])) ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <table width="700" style="margin-top: 30px;">
            <tr style="text-align: right !important;">
                <td>Kota Padang, <?= date("d M Y"); ?></td>
            </tr>
            <tr style="text-align: right !important;">
                <td>Pimpinan Zafa Tour Padang</td>
            </tr>
            <tr style="text-align: right !important; height: 120px;">
                <td>(...................................)</td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>