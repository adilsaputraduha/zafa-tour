<?php $no = 0;
foreach ($detailfasilitas as $row) : $no++ ?>
    <tr>
        <td> <?= $row['fasilitas_nama']; ?></td>
        <td style="text-align: center;">
            <a class="btn btn-sm btn-danger" onclick="ajaxDelete(<?= $row['detail_id']; ?>)"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
<?php endforeach; ?>

<script>
    function ajaxDelete(id) {
        $.ajax({
            url: "<?= base_url('admin/paket/detail-delete/fasilitas'); ?>",
            type: "POST",
            data: {
                detailid: id,
            },
            success: function(data) {
                reload();
            },
            error: function(xhr, ajaxOption, thrownError) {
                alert(xhr.status + '\n' + thrownError)
            }
        });
    }
</script>