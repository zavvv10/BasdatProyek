<h1>Form pemesanan</h1>
<br>
<form method="post" action="input_order.php">
    <div syle="padding ; 30px">
        <table cellpadding=5 cellspacing=0>
            <tr>
                <td>
                    Nama
                </td> <td>:</td>
                <td><input type="text" maxlength="30" name="nama" size="50"></td>
            </tr>
            <tr>
                <td>Alamat</td> <td>:</td>
                <td><input type="text" maxlength="100" name="alamat" size="50"></td>
            </tr>
            <tr>
                <td>No.HP</td><td>:</td>
                <td><input type="tel" pattern="[0-9]+" maxlength="30" name="No_HP" size="50" required></td>
            </tr>
            
            <tr>
                <td>Jasa</td>
                <td>:</td>
                <td>
                    <select name="pilihan_jasa">
                        <option value="opsi_1">Opsi 1</option>
                        <option value="opsi_2">Opsi 2</option>
                        <option value="opsi_3">Opsi 3</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td><button type="submit" name="tblsubmit">Buat Pesanan</button></td>
            </tr>
          
        </table>
    </div>
</form>
<!-- <input type="submit" value="Daftar" name="daftar" /> -->