<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm tài khoản</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Nhập thông tin tài khoản</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="admin/user/create" method="post">
                <?= view('messages/message') ?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input name="email" type="email" class="form-control" value="<?= old('email') ?>" id="exampleInputEmail1" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Mật khẩu</label>
                      <input name="password" type="password" class="form-control" value="<?= old('password') ?>" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
                    </div>
                    <div style="display: flex;">
                      <div class="form-group">
                        <label for="firstName">Tên</label>
                        <input name="firstName" type="text" class="form-control" value="<?= old('firstName') ?>" id="firstName" placeholder="Nhập tên">
                      </div>
                      <div class="form-group">
                        <label for="lastName">Họ</label>
                        <input name="lastName" type="text" class="form-control" value="<?= old('lastName') ?>" id="lastName" placeholder="Nhập họ">
                      </div>
                      <div class="form-group">
                        <label for="zip">Zip</label><br>
                        <input name="zip" type="text" id="zip"  class="form-control" value="<?= old('zip') ?>"  pattern="[0-9]{5}" placeholder="Nhập zip" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="state">Tỉnh</label>
                      <input name="state" type="text" class="form-control" value="<?= old('state') ?>" id="state" placeholder="Nhập tỉnh">
                    </div>
                    
                      <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div style="display: flex;">
                      <div class="form-group">
                        <label for="phone">Số điện thoại</label><br>
                        <input type="tel" id="phone" name="phone" class="form-control" value="<?= old('phone') ?>" pattern="[0-9]{10}" placeholder="Nhập số điện thoại" required>
                      </div>
                      <!-- <div class="form-group">
                        <label for="zip">Zip</label><br>
                        <input type="text" id="zip" name="zip" pattern="[0-9]{5}" placeholder="Nhập zip" required>
                      </div> -->
                      <div class="form-group">
                      <label for="fax">Số fax</label>
                      <input name="fax" type="tel" class="form-control" value="<?= old('fax') ?>" id="fax" pattern="[0-9]{10}" placeholder="Nhập số fax" required>
                    </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="country">Quốc gia</label>
                      <input name="country" type="text" class="form-control" value="<?= old('country') ?>" id="country" placeholder="Nhập quốc gia">
                    </div>
                    <div class="form-group">
                      <label for="address">Địa chỉ</label>
                      <input name="address" type="text" class="form-control" value="<?= old('address') ?>" id="address" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group">
                      <label for="address2">Địa chỉ 2</label>
                      <input name="address2" type="text" class="form-control" value="<?= old('address2') ?>" id="address2" placeholder="Nhập địa chỉ 2">
                    </div>
                
                  </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                      <button type="reset" class="btn btn-secondary">Reset</button>
                      <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                  </div>
            </form>
        </div>
        <!-- /.card -->

        
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->