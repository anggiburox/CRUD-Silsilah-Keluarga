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

    a {
        text-decoration: none;
        padding: 5px 10px;
        background-color: green;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <h3>Form Perbaharui Data</h3>
    <div class="form-container">
        @foreach($pgw as $p)
        <form action="/update" method="post">
            {{ csrf_field() }}
            <ul>
                <li>
                    <label>Nama:</label>
                    <input type="text" name="nama" required value="{{$p->Nama}}">
                    <input type="hidden" name="nama_lama" value="{{$p->Nama}}">
                </li>
                <li class="form-field">
                    <label>Jenis Kelamin:</label>
                    <ul>
                        <li>
                            <label>Laki-Laki</label>
                            <input type="radio" name="jk" value="Laki-Laki" @if ($p->Jenis_Kelamin == 'Laki-Laki')
                            checked @endif required>
                        </li>
                        <li>
                            <label>Perempuan</label>
                            <input type="radio" name="jk" value="Perempuan" @if ($p->Jenis_Kelamin == 'Perempuan')
                            checked @endif required>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="/index">Kembali</a>
                    <button type="submit">Submit</button>
                </li>
            </ul>
        </form>
        @endforeach
    </div>
</body>

</html>