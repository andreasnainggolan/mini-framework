<table border=1>
    <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
        <?php      
         foreach ($data['user'] as $pengguna): ?>
            <tr>
                <td><?php echo $pengguna['nama']; ?></td>
                <td><?php echo $pengguna['email']; ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>


