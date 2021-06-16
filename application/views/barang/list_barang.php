<div class="row">
    <div class="col-12">
        <a href="#" class="btn btn-primary float-left" onclick="loadMenu('<?= base_url('barang/form_create') ?>')">Tambah Data Barang</a>
    </div>

    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h4>Dibawah ini adalah Data Barang</h4>
                <table id="tabel_barang" class="table">

                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function loadKonten(url) {
        $.ajax(url, {
            type: 'GET',
            success: function(data, status, xhr) {
                var objData = JSON.parse(data);

                $('#tabel_barang').html(objData.konten);

                reloadEvent();
            },
            error: function(jqXHR, textStatus, errorMsg) {
                alert('Error : ' + errorMsg);
            }
        })
    }

    loadKonten('http://localhost:8080/backend_inventory/barang/list_barang');

    function reloadEvent() {
        $('.linkEditBarang').on('click', function() {
            var hashClean = this.hash.replace('#', '');
            loadMenu('<?= base_url('barang/form_edit/') ?>' + hashClean);
        });
    }
</script>