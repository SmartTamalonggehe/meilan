<div class="card-body">
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered animated flipInX">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pasien</th>
                    <th>ISI</th>
                </tr>
                @foreach ($smsMasuk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pasien->nm_pasien }}</td>
                    <td>{{ $item->isi_sms }}</td>
                </tr>
                @endforeach
            </thead>
        </table>
    </div>
</div>
