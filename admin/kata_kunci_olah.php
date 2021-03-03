<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_kata_kunci","idkatakunci='$kode'"));
}else{
  $idkatakunci= KodeOtomatis($mysqli,"tb_kata_kunci", "idkatakunci", "K", "1", "4");  
}


?>

<!-- Main content -->
<section class="content" style="margin-top: 10px;">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Olah Data Kata Kunci</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="kata_kunci_proses.php" method="post">

            <div class="card-body">

              <div class="form-group">
                <label for="nama">Kode</label>
                <input type="text" name="idkatakunci" class="form-control" value="<?=@$idkatakunci?>" placeholder="Inputkan Kode" required="" readonly>
              </div>

              <div class="form-group">
                <label for="nama">Nama Kata Kunci</label>
                <input type="text" name="katakunci" class="form-control" value="<?=@$katakunci?>" placeholder="Inputkan Nama Kata Kunci" required="">
              </div>

            </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
              class="btn btn-primary" value="Simpan">
              <a href="?hal=kata_kunci" class="btn btn-default">
                Batal
              </a>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->