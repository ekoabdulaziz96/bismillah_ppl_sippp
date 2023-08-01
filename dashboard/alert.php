 <?php if(isset($_GET['alert'])){?>
        <?php if($_GET['alert']==1){?>
                  <div class="alert alert-success alert-respon" id="alert-teliti2" role="alert" style=" transition: top 0.5s ease-in;">
                      <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong><i class="fa fa-check" aria-hidden="true"></i> Berhasil !</strong> Data berhasil ditambahkan!
                  </div>
                  <?php }elseif($_GET['alert']==2){?>
                        <div class="alert alert-success alert-respon2" id="alert-teliti3" role="alert">
                            <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong><i class="fa fa-check" aria-hidden="true"></i> Gagal !</strong> Data gagal ditambahkan!
                        </div>
                      <?php }elseif ($_GET['alert']==3){?>
                              <div class="alert alert-success alert-respon" id="alert-abdi1" role="alert">
                                  <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <strong><i class="fa fa-check" aria-hidden="true"></i> Berhasil !</strong> Data berhasil diubah!
                              </div>
                              <?php }elseif($_GET['alert']==4){?>
                                    <div class="alert alert-success alert-respon2" id="alert-abdi2" role="alert">
                                        <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-times" aria-hidden="true"></i> Gagal !</strong> Data gagal diubah!
                                    </div>
                                    <?php }elseif($_GET['alert']==5){?>
                                         <div class="alert alert-success alert-respon" id="alert-abdi3" role="alert" style=" transition: top 0.1s ease-in;">
                                       <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-check" aria-hidden="true"></i>  Berhasil !</strong> Data berhasil dihapus!
                                        </div>
                                     <?php }elseif($_GET['alert']==6){?>
                                        <div class="alert alert-success alert-respon2" id="alert-abdi" role="alert">
                                        <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-times" aria-hidden="true"></i> Gagal !</strong> Data gagal dihapus!
                                    </div>
                                    <?php } elseif($_GET['alert']==11){?>
                                        <div class="alert alert-success alert-respon2" id="alert-abdi" role="alert">
                                        <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-times" aria-hidden="true"></i> Gagal !</strong> Maaf Username Tidak Boleh sama!
                                    </div>
                                    <?php } elseif($_GET['alert']==12){?>
                                        <div class="alert alert-success alert-respon2" id="alert-abdi" role="alert">
                                        <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-times" aria-hidden="true"></i> Gagal !</strong> Maaf Ruangan pada hari dan jam tersebut sudah dipakai!
                                    </div>
                                    <?php } elseif($_GET['alert']==13){?>
                                        <div class="alert alert-success alert-respon2" id="alert-abdi" role="alert">
                                        <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-times" aria-hidden="true"></i> Gagal !</strong> Maaf Mata kuliah dengan kelas tersebut sudah ada!
                                    </div>
                                     <?php } elseif($_GET['alert']==14){?>
                                        <div class="alert alert-success alert-respon2" id="alert-abdi" role="alert">
                                        <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-times" aria-hidden="true"></i> Gagal !</strong> Maaf Mahasiswa bersangkutan sudah terdaftar pada Praktikum Mata Kuliah tersebut!
                                    </div>
                                     <?php }elseif($_GET['alert']==15){?>
                                         <div class="alert alert-success alert-respon" id="alert-abdi3" role="alert" style=" transition: top 0.1s ease-in;">
                                       <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-check" aria-hidden="true"></i>  Berhasil !</strong> Password berhasil diubah!
                                        </div>
                                     <?php }elseif($_GET['alert']==16){?>
                                        <div class="alert alert-success alert-respon2" id="alert-abdi" role="alert">
                                        <button type="button" class="close" style="margin-left:8px;line-height:0.8;" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong><i class="fa fa-times" aria-hidden="true"></i> Gagal !</strong> Password gagal diubah!
                                    </div>
                                  <?php };  ?>
    <?php };  ?>