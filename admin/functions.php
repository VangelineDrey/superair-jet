<?php 

$conn = mysqli_connect("localhost","root","","superairjet");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows=[]; 
    while ($row= mysqli_fetch_assoc($result));
{
        $rows[]=$row; 
    }
    return $rows;
}

    function members($data){
        global $conn;

        $nama= htmlspecialchars($data["name"]);

        $query= "INSERT INTO pembeli
        VALUES ('','$nama')
        ";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
        
    }

    function membersedit($data){
        global $conn;
        $id=$data["id"]; 
        $nama= htmlspecialchars($data["name"]);
    
    $query= "UPDATE pembeli SET nama_pembeli='$nama'
    WHERE id_pembeli= $id
    ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
    }

    function membersdelete($id){
        global $conn;
        mysqli_query($conn,"DELETE FROM pembeli where id_pembeli = $id");
    
        return mysqli_affected_rows($conn);
    }

    function maskapai($data){
        global $conn;
    
        $nama= htmlspecialchars($data["nama"]);
    
        $query= "INSERT INTO maskapai
         VALUES ('','$nama')
         ";
         mysqli_query($conn,$query);
    
        return mysqli_affected_rows($conn);
        
    }
    
        function maskapaiedit($data){
            global $conn;
        $id=$data["id"]; 
        $nama= htmlspecialchars($data["nama"]);
    
        $query= "UPDATE maskapai SET nama_maskapai='$nama'
        WHERE id_maskapai= $id
        ";
        mysqli_query($conn,$query);
    
        return mysqli_affected_rows($conn);
        }
    
        function divisidelete($id){
            global $conn;
            mysqli_query($conn,"DELETE FROM divisi where id = $id");
            return mysqli_affected_rows($conn);
        }

    
        function rute($data){
            global $conn;
        
            $kode_rute= htmlspecialchars($data["kode_rute"]);
            $kelas= htmlspecialchars($data["kelas"]);
            $waktu= htmlspecialchars($data["waktu"]);
            $asal= htmlspecialchars($data["asal"]);
            $destinasi= htmlspecialchars($data["destinasi"]);
        
            $query= "INSERT INTO rute
             VALUES ('$kode_rute','$kelas','$waktu','$asal','$destinasi')
             ";
             mysqli_query($conn,$query);
        
            return mysqli_affected_rows($conn);
            
        }

        function ruteedit($data){
            global $conn;
        
            $kode_rute= htmlspecialchars($data["kode_rute"]);
            $kelas= htmlspecialchars($data["kelas"]);
            $waktu= htmlspecialchars($data["waktu"]);
            $asal= htmlspecialchars($data["asal"]);
            $destinasi= htmlspecialchars($data["destinasi"]);
    
            $query= "UPDATE rute SET kelas='$kelas',waktu='$waktu', asal='$asal',destinasi='$destinasi'
            WHERE kode_rute= $kode_rute
            ";
             mysqli_query($conn,$query);
        
            return mysqli_affected_rows($conn);
            
        }

        function pesawat($data){
            global $conn;
        
            $nomor_penerbangan= htmlspecialchars($data["nomor_penerbangan"]);
            $terminal= htmlspecialchars($data["terminal"]);
            $id_maskapai= htmlspecialchars($data["id_maskapai"]);
        
            $query= "INSERT INTO pesawat
             VALUES ('','$nomor_penerbangan','$terminal','$id_maskapai')
             ";
             mysqli_query($conn,$query);
        
            return mysqli_affected_rows($conn);
            
        }

        function pesawatedit($data){
            global $conn;
        
            $id_pesawat= htmlspecialchars($data["id_pesawat"]);
            $nomor_penerbangan= htmlspecialchars($data["nomor_penerbangan"]);
            $terminal= htmlspecialchars($data["terminal"]);
            $id_maskapai= htmlspecialchars($data["id_maskapai"]);
    
            $query= "UPDATE pesawat SET nomor_penerbangan='$nomor_penerbangan',terminal='$terminal', id_maskapai='$id_maskapai'
            WHERE id_pesawat= $id_pesawat
            ";
             mysqli_query($conn,$query);
        
            return mysqli_affected_rows($conn);
            
        }
        
        function order($data){
            global $conn;
        
            $id_pembeli= htmlspecialchars($data["id_pembeli"]);
            $kode_rute= htmlspecialchars($data["kode_rute"]);
            $id_maskapai= htmlspecialchars($data["id_maskapai"]);
            $id_pesawat= htmlspecialchars($data["id_pesawat"]);
            $seq_number= htmlspecialchars($data["seq_number"]);
            $pnr= htmlspecialchars($data["pnr"]);
            $tanggal_penerbangan= htmlspecialchars($data["tanggal_penerbangan"]);
        
            $query= "INSERT INTO pemesanan
             VALUES ('','$id_pembeli','$kode_rute','$id_maskapai','$id_pesawat','$seq_number','$pnr','$tanggal_penerbangan')
             ";
             mysqli_query($conn,$query);
        
            return mysqli_affected_rows($conn);
            
        }

        function orderedit($data){
            global $conn;

            $id_tiket= htmlspecialchars($data["id_tiket"]);
            $id_pembeli= htmlspecialchars($data["id_pembeli"]);
            $kode_rute= htmlspecialchars($data["kode_rute"]);
            $id_maskapai= htmlspecialchars($data["id_maskapai"]);
            $id_pesawat= htmlspecialchars($data["id_pesawat"]);
            $seq_number= htmlspecialchars($data["seq_number"]);
            $pnr= htmlspecialchars($data["pnr"]);
            $tanggal_penerbangan= htmlspecialchars($data["tanggal_penerbangan"]);
        
            $query= "UPDATE pemesanan SET id_pembeli='$id_pembeli', kode_rute='$kode_rute', id_maskapai='$id_maskapai', id_pesawat='$id_pesawat', seq_number='$seq_number', pnr='$pnr', tanggal_penerbangan='$tanggal_penerbangan'
            WHERE id_tiket='$id_tiket'
             ";
             mysqli_query($conn,$query);
        
            return mysqli_affected_rows($conn);
            
        }
            
                function pesawatdelete($id){
                    global $conn;
                    mysqli_query($conn,"DELETE FROM pesawat where id_pesawat = $id");
                    return mysqli_affected_rows($conn);
                }   
                function maskapaidelete($id){
                    global $conn;
                    mysqli_query($conn,"DELETE FROM maskapai where id_maskapai = $id");
                    return mysqli_affected_rows($conn);
                }   
                function orderdelete($id){
                    global $conn;
                    mysqli_query($conn,"DELETE FROM pemesanan where id_tiket = $id");
                    return mysqli_affected_rows($conn);
                }   
                function rutedelete($id){
                    global $conn;
                    mysqli_query($conn,"DELETE FROM rute where kode_rute = $id");
                    return mysqli_affected_rows($conn);
                }   
        
?>