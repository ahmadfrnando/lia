<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Obat Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>
</head>

<body>
    <h1>Laporan Obat Keluar</h1>
    <button id="downloadBtn">Download PDF</button>
    <table>
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
            <?php
            $link = mysqli_connect('localhost:3307', 'root', 'root', 'db_puskesmas');
            include "../../../control.php";

            $mysqli = new databases();
            $result = $mysqli->get_show_obat_keluar();
            foreach ($result as $row) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama_obat']; ?></td>
                    <td><?php echo $row['fungsi']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td><?php echo $row['jenis_obat']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <script>
        const { jsPDF } = window.jspdf;

        document.getElementById('downloadBtn').addEventListener('click', function() {
            const doc = new jsPDF();
            doc.text("Laporan Obat Masuk", 10, 10);

            const table = document.querySelector('table');

            doc.autoTable({
                html: table,
                startY: 20
            });

            doc.save('laporan_obat_keluar.pdf');
        });
    </script>
</body>

</html>
