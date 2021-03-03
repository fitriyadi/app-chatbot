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
            <h3 class="card-title">Aturan Kata Kunci Pertanyaan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="quickForm" action="aturan_proses.php" method="post">

            <div class="card-body">

              <div class="form-group">
                <label for="nama">Kode</label>
                <input type="text" name="idpertanyaan" class="form-control" value="<?=@$idpertanyaan?>" placeholder="Inputkan Kode" required="" readonly>
              </div>

              <div class="form-group">
                <label for="nama">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="form-control" value="<?=@$pertanyaan?>" placeholder="Inputkan Pertanyaan" readonly>
              </div>

              <div class="form-group">
                <label for="nama">Kata Kunci</label>
                <div class="col-md-12">
                  <?php
                  $query="SELECT * from tb_kata_kunci";
                  $result=$mysqli->query($query);
                  $num_result=$result->num_rows;
                  if ($num_result > 0 ) { 
                    $no=0;
                    while ($data=mysqli_fetch_assoc($result)) {
                      extract($data);
                      ?>
                      <label class="checkbox-inline mr-5">
                        <input type="checkbox" <?=iscek($mysqli,$idpertanyaan,$idkatakunci)?> name="katakunci[<?=$idkatakunci?>]" value=""> <?=$katakunci?>
                      </label>

                    <?php } }?>
                  </div>
                </div>


              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <input type="submit" name="<?=isset($_GET['id'])?'ubah':'tambah';?>" 
                class="btn btn-primary" value="Simpan">
                <a href="?hal=aturan" class="btn btn-default">
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

  <?php

  function iscek($mysqli,$idpertanyaan,$idkatakunci){
    $query="select * from tb_pertanyaan_rule where idpertanyaan='$idpertanyaan' and idkatakunci='$idkatakunci'";
    $row = $mysqli->query($query)->num_rows;
    if ($row> 0)
      return "checked";
    else
      return "";
  }

  ?>