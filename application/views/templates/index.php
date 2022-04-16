<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h2 class="m-0 font-weight-bold text-dark"><?php echo $title;?>
<button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
     </div>
<div class="card-body">
    <?php echo $this->session->flashdata('pesan'); ?>
 <div class="table-responsive">
 <table class="table table-bordered " 
 id="dataTable" width="100%" cellspacing="0">
 <thead>                  
    <tr>
      <td>No</td>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Jurusan</th>
      <th>Alamat</th>
      <th>Keterangan</th>
      <th>Foto</th>
      <th style="width: 125px;">Tindakan</th>
    </tr>
</thead>
   <tbody>
    <?php 
    $no = 1;
    foreach ($tbl_siswa as $sis) :  ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $sis['nama_siswa']; ?></td>
            <td><?php echo $sis['kelas']; ?></td>
            <td><?php echo $sis['jurusan']; ?></td>
            <td><?php echo $sis['alamat']; ?></td>
            <td><?php echo $sis['kategori_id']; ?></td>
            <td><img src="<?php echo base_url() . '/gambar/' . $sis['gambar']; ?>" width="50"></td>
            <td>
              <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editmodal<?php echo $sis['id_siswa'];?>">
              <i class="fa fa-edit"></i>
            </button>
            <a href="<?php echo base_url() ?>Home/hapus_data/<?php echo $sis['id_siswa']; ?>" class=" btn btn-danger"> <i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>



</div>
    </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Halaman Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php echo form_open_multipart('home/proses_tambah_data'); ?>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_siswa" class="form-control"
            required="">
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <input type="number" name="kelas" class="form-control"
            required="">
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control"
            required="">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control"
            required="">
        </div>
        <div class="form-group">
        <label>Keterangan</label>
        <br>
          <select name="kategori_id" id="kategori_id" class="form-control">
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
         </select>  
    </div>
    </div>
    <div class="">
      <label for=""></label>
      <input type="file" name="userfile" class="" size="20" required="">
    </div>
    <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<!--Akhir Modal-->

<!--Modal Untuk Edit-->
<?php $no = 0;
foreach ($tbl_siswa as $sis) : $no++; ?>
<div class="modal fade" id="editmodal<?php echo $sis['id_siswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Halaman Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php echo form_open_multipart('home/proses_edit_data'); ?>

         <input type="hidden" name="id_siswa" value="<?php echo $sis['id_siswa']; ?>">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama_siswa" class="form-control" value="<?php echo $sis['nama_siswa']; ?>">
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <input type="number" name="kelas" class="form-control" value="<?php echo $sis['kelas']; ?>">
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value="<?php echo $sis['jurusan']; ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $sis['alamat']; ?>">
        </div>
        <div class="form-group">
        <label for="">Keterangan</label>
        <br>
          <select name="kategori_id" id="kategori_id" value="<?php echo $sis['kategori_id']; ?>" class="form-control">
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
             
         </select>  
    </div>
   <div class="form-group">
           <label>Foto</label>
           <br>
            <input type="file" name="userfile"  size="20">
    </div>
    <img src="<?php echo base_url() . '/gambar/' . $sis['gambar']; ?>" width="100">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!--Akhir Edit-->

           
         