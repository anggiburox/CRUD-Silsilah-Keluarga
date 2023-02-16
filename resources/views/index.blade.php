<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi CRUD</title>
    <style>
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form button {
        margin-top: 20px;
    }

    input[type="text"] {
        padding: 5px;
        margin-bottom: 10px;
        width: 200px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    h3 {
        margin-top: 5%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    ul {
        list-style: none;
    }

    li label {
        display: inline-block;
    }

    li input[type=radio] {
        display: inline-block;
        width: 20px;
        height: 20px;
        margin: 0 10px;
        vertical-align: middle;
    }

    .table-container {
        width: 50%;
        margin: 0 auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid #ccc;
        margin-bottom: 80px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .form-container {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    button[type="submit"] {
        padding: 5px 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .search-container {
        flex-direction: column;
        align-items: flex-end;
        margin-top: 10px;
        margin-bottom: -70px;
        margin-left: 20%;
    }

    .search-container label {
        margin-right: 10px;
    }

    .table-container {
        width: 50%;
        margin: 0 auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .alert-danger {
        margin-top: 10px;
        padding: 15px;
        background-color: #f44336;
        color: white;
        font-size: 16px;
    }

    .alert-success {
        margin-top: 10px;
        padding: 15px;
        background-color: green;
        color: white;
        font-size: 16px;
    }

    h4 {
        margin-left: 25%;
    }
    </style>
</head>

<body>
    <h3>Form Tambah Data</h3>
    <div class="form-container">
        <form action="/store" method="post">
            {{ csrf_field() }}
            <ul>
                <li>
                    <label>Nama:</label>
                    <input type="text" name="nama" required>
                </li>
                <li class="form-field">
                    <label>Jenis Kelamin:</label>
                    <ul>
                        <li>
                            <label>Laki-Laki</label>
                            <input type="radio" name="jk" value="Laki-Laki" required>
                        </li>
                        <li>
                            <label>Perempuan</label>
                            <input type="radio" name="jk" value="Perempuan" required>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="submit">Submit</button>
                </li>
            </ul>
        </form>
        @if(Session::has('success'))
        <div class="alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('danger'))
        <div class="alert-danger">
            {{Session::get('danger')}}
        </div>
        @endif
    </div>
    <div class="search-container">
        <form action="search" method="GET">
            <ul>
                <li>
                    <label>Search</label>
                    <input type="text" id="search" name="search">
                    <button type="submit">Submit</button>
                </li>
            </ul>
        </form>
    </div>


    <h4>Data Silsilah Keluarga</h4>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;?>
                @foreach($pgw as $p)
                <?php $no++ ;?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $p->Nama }}</td>
                    <td>{{ $p->Jenis_Kelamin }}</td>
                    <td>
                        <a href="edit/{{ $p->Nama}}" type="button">Perbaharui</a>
                        |
                        <a href="hapus/{{ $p->Nama}}"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                            type="button">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>