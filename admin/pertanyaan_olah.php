<?php
if (isset($_GET['id'])){
  $kode=$_GET['id'];
  extract(ArrayData($mysqli,"tb_pertanyaan","idpertanyaan='$kode'"));
}else{
  $idpertanyaan= KodeOtomatis($mysqli,"tb_pertanyaan", "idpertanyaan", "P", "1", "4");  
}

$namajenis = array('Program Studi','Beasiswa','Akreditasi');
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
            <h3 class="card-title">Olah Data Pertaanyaan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="pertanyaan_proses.php" method="post">

            <div class="card-body">

              <div class="form-group">
                <label for="nama">Kode</label>
                <input type="text" name="idpertanyaan" class="form-control" value="<?=@$idpertanyaan?>" placeholder="Inputkan Kode" required="" readonly>
              </div>

              <div class="form-group">
                <label for="nama">Jenis</label>
                <select class="form-control select" name="jenis" required="">
                  <?php  foreach ($namajenis as $key => $value) { ?>
                    <option value="<?=$value?>" <?=isselect(@$jenis,$value)?>><?=$value?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="nama">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="form-control" value="<?=@$pertanyaan?>" placeholder="Inputkan Pertanyaan" required="">
              </div>

              <div class="form-group">
                <label for="nama">Jawaban</label>
                <textarea class="form-control" rows="4" required="" name="jawaban" placeholder="Inputkan Jawaban"><?=@$jawaban?></textarea>
              </div>

            </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
              class="btn btn-primary" value="Simpan">
              <a href="?hal=pertanyaan" class="btn btn-default">
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