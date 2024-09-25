<div class="modal fade" id="modalDelete-{{ $data->id }}">
    <div class="modal-dialog middle-align-center">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    Yakin ingin menghapus data kategori <b>{{ $data->nama }}</b>?
                </div>
            </div>
            <div class="modal-footer justify-content-end">
                <form action="{{ route('admin.hapus_kategori', $data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Close
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-save"></i> Ya, Hapus data ini!
                    </button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->