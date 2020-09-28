      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title"><?= $title ?></h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="#">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#"><?= $title ?></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <script>
//Notify
$.notify({icon: "flaticon-success",title: "Data berhasil ditambahkan",message: "",
},{type: "primary",placement: {from: "top",align: "right"},time: 1000,});
// sweet alert
swal("data berhasil ditambahkan!", "", {icon : "success",buttons: {confirm: {className : "btn btn-primary"}},});
      </script>