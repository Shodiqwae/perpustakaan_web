<!DOCTYPE html>
<html>
<head>
    <title>Rent Log</title>
    <style>
        /* Tambahkan style yang dibutuhkan untuk PDF */
    </style>
</head>
<body>
    <center>

        <h1>Laporan Peminjaman</h1>
    </center>
    <p>Borrowed: {{ $borrowedCount }}</p>
    <p>Completed: {{ $completedCount }}</p>
    <p>Canceled: {{ $canceledCount }}</p>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Peminjam</th>
                <th>Nama Buku</th>
                <th>Status</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->book->title }}</td>
                    <td>{{ $loan->status }}</td>
                    <td>{{ $loan->borrow_date }}</td>
                    <td>{{ $loan->return_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
