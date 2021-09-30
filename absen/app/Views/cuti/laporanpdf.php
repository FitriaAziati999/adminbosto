<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
        <div style="text-align:center">
            <h3> Laporan PDF data cuti</h3>
        </div>
        <table id="table">
            <thead>
                <tr>
                <th>id</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Bagian</th>
                <th>Sisa cuti</th>
                <!-- <th>Tgl cuti</th> -->
                </tr>
            </thead>
            <tbody>
            <?php $no=1;      
		        	    foreach($cuti as $v):?>
                        <tr> 
                        <td><?=$no;?></td>
                        <td><?=$v['nik'] ?></td>
                          <td><?=$v['nama_karyawan'] ?></td>
                          <td><?=$v['jabatan'];?><br>Bagian: <?=$v['bagian']; ?></br></td>
                          <td><?=($v['sisa_cuti'] == null ? $v['total_cuti'] : $v['sisa_cuti']);?></td>
                          <!-- <td><?=date('d/m/Y', strtotime($v['tgl_cuti'] ))?></td>  -->
                        </tr>
                        <?php $no++; endforeach;?>
            </tbody>
        </table>
    </body>
</html>

                         