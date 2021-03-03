<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6"> 
        <h1 class="m-0 text-dark">Data Aturan Pertanyaan [Kata Kunci]</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title primary">List Data</h3>

          <div class="card-tools">
          </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Pertanyaan</th>
                <th>Jumlah Kata Kunci</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $query="SELECT * from tb_pertanyaan";
              $result=$mysqli->query($query);
              $num_result=$result->num_rows;
              if ($num_result > 0 ) { 
                $no=0;
                while ($data=mysqli_fetch_assoc($result)) {
                  extract($data);
                  ?>
                  <tr>
                    <td width="5%"><?=$no+=1; ?></td>
                    <td><?=$jenis; ?></td>
                    <td><?=$pertanyaan; ?></td>
                    <td><?=JumlahData($mysqli,"tb_pertanyaan_rule where idpertanyaan='$idpertanyaan'");?></td>
                    <td width="20%">

                      <a href="?hal=aturan_olah&id=<?=$idpertanyaan; ?>" 
                        class="btn btn-icon btn-primary" title="Detail Data"><i class="fa fa-list"></i> </a>

                      </td>

                    </tr>
                  <?php }} ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

