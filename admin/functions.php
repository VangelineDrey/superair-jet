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
        
            function artikeledit($data){
                global $conn;
            $id=$data["id"]; 
            $title= htmlspecialchars($data["title"]);
            $kode_rute= htmlspecialchars($data["kode_rute"]);
            $asal= htmlspecialchars($data["asal"]);
            $destinasi= htmlspecialchars($data["destinasi"]);
            $gambarlama= htmlspecialchars($data["oldimage"]);
    
            if($_FILES['image']['error'] === 4){
                $gambar=$gambarlama;
            } else {
            $gambar= uploada('image');
            }
        
            $query= "UPDATE artikel SET title='$title',kode_rute='$kode_rute', asal='$asal',destinasi='$destinasi',image='$gambar'
            WHERE id= $id
            ";
            mysqli_query($conn,$query);
        
            return mysqli_affected_rows($conn);
            }
        
            function artikeldelete($id){
                global $conn;
                mysqli_query($conn,"DELETE FROM artikel where id = $id");
                return mysqli_affected_rows($conn);
            }

            
            
                function anggotaedit($data){
                    global $conn;
                $id=$data["id"]; 
                $nama= htmlspecialchars($data["name"]);
                $divisi= htmlspecialchars($data["divisi"]);
                $dob= htmlspecialchars($data["dob"]);
                $words= htmlspecialchars($data["words"]);
                $akhir=htmlspecialchars($data["akhir"]);
                $gambarlama= htmlspecialchars($data["oldimage"]);
    
                if($_FILES['image']['error'] === 4){
                    $gambar=$gambarlama;
                } else {
                $gambar= uploadm('image');
                }
            
                $query= "UPDATE anggota SET name='$nama', divisi='$divisi', dob='$dob',words='$words',image='$gambar', akhirjabatan='$akhir'
                WHERE id= $id
                ";
                mysqli_query($conn,$query);
            
                return mysqli_affected_rows($conn);
                }
            
                function anggotadelete($id){
                    global $conn;
                    mysqli_query($conn,"DELETE FROM anggota where id = $id");
                    return mysqli_affected_rows($conn);
                }    

                function vote($data){
                    global $conn;                
                    $name= htmlspecialchars($_POST["name"]);
                    $nik= htmlspecialchars($_POST["nik"]);
                    $timestamps= htmlspecialchars($_POST["timestamps"]);
                    $vote= htmlspecialchars($_POST["buhleidonea"]);

                    
                    $validations=query("SELECT * FROM pemilu where nik = '$nik' AND name='$name'");
                    
                    if(!empty($validations)){
                    $validation=query("SELECT * FROM pemilu where nik = '$nik' AND name='$name'")[0];
                    
                        if($validation['changecount']!=1){    
                        $query= "UPDATE pemilu SET vote = '$vote', timestamps='$timestamps', changecount=1 WHERE nik='$nik'
                        ";
                        mysqli_query($conn,$query);
                        return mysqli_affected_rows($conn);
                        }
                        else{
                        return 0;
                        }
                    }
                    else{
                        return mysqli_affected_rows($conn);
                    }
                }
?>