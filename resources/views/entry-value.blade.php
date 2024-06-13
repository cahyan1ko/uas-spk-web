@extends('layout.main')
@section('container')
<form action="">
    <div class="mb-3">
        <label for="merk" class="form-label">Merk</label>
        <input type="text" class="form-control" id="merk" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="material" class="form-label">Material</label>
        <input type="text" class="form-control" id="material">
    </div>
    <div class="mb-3">
        <label for="kenyamanan-bermain" class="form-label">Kenyamanan Bermain</label>
        <input type="text" class="form-control" id="kenyamanan-bermain">
    </div>
    <div class="mb-3">
        <label for="berat" class="form-label">Berat</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

<form action="">
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Merk</th>
                <th scope="col">Harga</th>
                <th scope="col">Material</th>
                <th scope="col">Kenyamanan Bermain</th>
                <th scope="col">Berat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Gibson</td>
                <td>750.000</td>
                <td>4</td>
                <td>5</td>
                <td>1.6</td>
            </tr>
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Hitung</button>
</form>
@endsection