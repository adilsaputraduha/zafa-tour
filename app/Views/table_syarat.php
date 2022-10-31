<?php $no = 0;
foreach ($detailsyarat as $row) : $no++ ?>
    <tr>
        <td> <?= $row['syarat_nama']; ?></td>
        <td style="text-align: center;">
            <a class="btn btn-sm btn-danger" onclick="ajaxDeleteSyarat(<?= $row['detail_id']; ?>)"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
<?php endforeach; ?>

<script>
    function ajaxDeleteSyarat(id) {
        $.ajax({
            url: "<?= base_url('admin/paket/detail-delete/syarat'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reloadSyarat();
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }
</script>