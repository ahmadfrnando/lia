<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Obat Masuk</title>
</head>
<body>
    <h1>Laporan Obat Masuk</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Fungsi</th>
                <th>Stok</th>
                <th>Jenis Obat</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Paracetamol</td>
                <td>Analgesik</td>
                <td>100</td>
                <td>Tablet</td>
                <td>2025-03-07</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Amoxicillin</td>
                <td>Antibiotik</td>
                <td>150</td>
                <td>Tablet</td>
                <td>2025-03-07</td>
            </tr>
            <!-- Add more rows as necessary -->
        </tbody>
    </table>

    <button id="printBtn">Cetak Laporan</button>

    <script>
        document.getElementById('printBtn').addEventListener('click', function() {
            window.print(); // This will open the print dialog
        });
    </script>
</body>
</html>
