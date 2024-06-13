@extends('layout.main')
@section('container')

<form action="">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Merk</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Harga</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Material</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Kenyamanan Bermain</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Berat</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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