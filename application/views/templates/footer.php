      <footer class="footer">
        <div class="container-fluid">
          <nav class="pull-left">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="">
                  CV Surya Jaya Tehnik
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright ml-auto">
            made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
          </div>
        </div>
      </footer>
    </div>

  </div>
  
  <!-- jQuery UI -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


  <!-- jQuery Sparkline -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

  <!-- Chart Circle -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/chart-circle/circles.min.js"></script>

  <!-- Datatables -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/datatables/datatables.min.js"></script>

  <!-- jQuery Vector Maps -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
  <!-- chart -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/demo.js"></script>
  <!-- my custom js -->
  <script src="<?= base_url('assets') ?>/js/custom.js"></script>

  <!-- Atlantis JS -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/atlantis.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#multi-filter-select').DataTable( {
        "order": [[ 0, "desc" ]],
        "pageLength": 12,
        "lengthMenu": [ [-1, 12, 24, 36, 48, 60], ["All" ,12, 24, 36, 48, 60] ],
        "pagingType": "full_numbers",
        initComplete: function () {
          this.api().columns().every( function () {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
                );

              column
              .search( val ? '^'+val+'$' : '', true, false )
              .draw();
            } );

            column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
          } );
        }
      });
    });
    // $.notify({icon: 'flaticon-alarm-1',message:'data berhasil diubah'},{type:'primary'});

  </script>
</body>
</html>