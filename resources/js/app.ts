
jQuery(($) => {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });

        let sortable = require('bootstrap-html5sortable')

        // @ts-ignore: using code that is not supported by typescript
        $('.table-sortable tbody').sortable().bind('sortupdate', function(e, ui) {
          //Get indexes of rows 
          let newOrder : Array<number> = []
        $('.table-sortable tbody tr').each(function() {
          newOrder.push(Number($(this).find("td:eq(0)").text()));
        });
        console.log(newOrder);
        $.ajax({
          type:"POST",
          url: "soil/update-sorting",
          data: JSON.stringify(newOrder),
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      });
    });

    document.addEventListener("DOMContentLoaded", function(){
        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {
        
          // close all inner dropdowns when parent is closed
          document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
              // after dropdown is hidden, then find all submenus
                this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                  // hide every submenu as well
                  everysubmenu.style.display = 'none';
                });
            })
          });
        
          document.querySelectorAll('.dropdown-menu a').forEach(function(element){
            element.addEventListener('click', function (e) {
                let nextEl = this.nextElementSibling;
                if(nextEl && nextEl.classList.contains('submenu')) {	
                  // prevent opening link if link needs to open dropdown
                  e.preventDefault();
                  if(nextEl.style.display == 'block'){
                    nextEl.style.display = 'none';
                  } else {
                    nextEl.style.display = 'block';
                  }
        
                }
            });
          })
        }
        // end if innerWidth
        }); 
        // DOMContentLoaded  end
