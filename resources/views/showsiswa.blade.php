<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            padding: 5x 7px;
            border: 1px solid;
        }
    </style>
</head>
<body>
    <table>

        <tr>
            <th>
                NIS
            </th>
            <th>
                Nama Lengkap
            </th>
            <th>
                Jurusan
            </th>
            <th>
                Kelas
            </th>
            <th>
                Jenis Kelamin
            </th>
        </tr>

        <tr>
            <td>
                {{ $siswa->nis }}
            </td>
            <td>
                {{ $siswa->nama_lengkap }}
            </td>
            <td>
                {{ $jurusan->jurusan }}
            </td>
            <td>
                {{ $siswa->kelas }}
            </td>
            <td>
                {{ $siswa->jenis_k }}
            </td>
        </tr>

    </table>
</body>
</html>