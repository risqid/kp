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

// store the local storage value
let theme = localStorage.getItem('theme');

var logo = document.getElementById('logo');
var navbar = document.getElementById('navbar');
var sidebar = document.getElementById('sidebar');
var modalInput = document.getElementsByClassName('modal-content')[0];
var modalEdit = document.getElementsByClassName('modal-content')[1];

const enableDarkMode = () => {
    localStorage.setItem("theme", "dark");
    document.body.setAttribute("data-background-color", "dark");
    
    if (logo != null) {
        logo.setAttribute("data-background-color", "dark2");
    }
    
    if (navbar != null) {
        navbar.setAttribute("data-background-color", "dark");
    }
    
    if (sidebar != null) {
        sidebar.setAttribute("data-background-color", "dark2");
    }
    
    if (modalInput != null) {
        modalInput.style.backgroundColor = "#202940";
    }
    
    if (modalEdit != null) {
        modalEdit.style.backgroundColor = "#202940";
    }
};

const disableDarkMode = () => {
    localStorage.setItem("theme", null);
    document.body.setAttribute("data-background-color", null);
    if (logo != null) {
    logo.setAttribute("data-background-color", "white");
    }
    if (navbar != null) {
    navbar.setAttribute("data-background-color", "white");
    }
    if (sidebar != null) {
        sidebar.setAttribute("data-background-color", null);
    }

    if (modalInput != null) {
      modalInput.style.backgroundColor = null;
    }

    if (modalEdit != null) {
      modalEdit.style.backgroundColor = null;
    }
};

// enable darkmode when toggle is on(checked) and disable it when toggle is off(inchecked)
var checkbox = document.querySelector('input[name=theme]');
checkbox.addEventListener('click', function() {
    if(this.checked) {
        trans()
        enableDarkMode()
    }else{
        trans()
        disableDarkMode()
    }
});

// important to load theme with previous setting after pade reloaded
if (theme === "dark") {
  enableDarkMode();
  checkbox.checked = true;
}

// for color transition when changing theme
let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
        document.documentElement.classList.remove('transition')
    }, 1000)
}