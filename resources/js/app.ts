import * as mathjs from "mathjs"
import * as L from "leaflet"
import $ from "jquery";

jQuery(($) => {

        $(".spritesheet-field").change(function() {
          console.log("jaaajaaaa")
        })


        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });

        $(".math-expression").each( (input, element ) => {
          if(element instanceof HTMLInputElement) {
            validate(element)
          }
        })

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
        
        
        function validate(input : HTMLInputElement) {
          let value : string = input.value
          // provide a scope
          let scope = {
            energy: 3,
            aggressiveness: 4,
            spookiness: 4,
            brain_size: 5,
            eye_shape: 6,
            eye_color: 6,
            tier: 1,
            original: 2,
          }

          if (!value) {
            $(input).removeClass("is-valid")
            $(input).removeClass("is-invalid")
          } else {
            try {
              mathjs.evaluate(value, scope)
              $(input).addClass("is-valid")
              $(input).removeClass("is-invalid")
              
            } catch (error : any) {
              $(input.parentElement).find(".invalid-feedback").text(error)
              $(input).addClass("is-invalid")
              $(input).removeClass("is-valid")
            }
          }
        }


        $(".math-expression").keyup(function() {
          if(this instanceof HTMLInputElement) {
            validate(this)
          }
        });
        // DOMContentLoaded  end

        let map = new L.Map('map', {
          center: new L.LatLng(	52.36, 4.89814),
          zoom: 12,
        });
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        let marker = L.marker([52.36, 4.89814]).addTo(map);

        map.on('click', function(e){
          var coord = e.latlng;
          var lat = coord.lat;
          var lng = coord.lng;
          $("#latitude").val(lat)
          $("#longitude").val(lng)
          marker.setLatLng(coord)
          console.log("You clicked the map at latitude: " + lat + " and longitude: " + lng);
        });
