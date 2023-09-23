enum PuzzleType {
    None = "None",
    Soil = "Soil",
    Rock = "Rock",
    Crypto = "Crypto",
    Explosive = "Explosive",
    Consumable = "Consumable"
}

interface Block {
    soil_id : number
    spawn_id : number
    spawn_type : PuzzleType
    soil_src : string
    content_src : string
}
interface Puzzle {
  name : string
  blocks : Block[][]
}

const defaultBlock: Block = {
  soil_id: -1,
  spawn_id: -1,
  spawn_type: PuzzleType.None,
  soil_src: "",
  content_src: "",
}
var puzzleBlocks : Block[][] =[[]]
  
  
jQuery(($) => { 
    $("#puzzle-reload-button").on('click', function() {
        rebuildBoard()
        rebindEvents()
    })  
    rebuildBoard()
    rebindEvents()
})

function rebindEvents() {
    $(".puzzle-dragable").on('dragstart', function(event) {
        var classes = $(event.target).attr('class').split(/\s+/)
        // Get puzzle type
        let puzzle_type : PuzzleType = PuzzleType.Consumable
        if(classes.includes("puzzle-soil")) puzzle_type = PuzzleType.Soil
        else if(classes.includes("puzzle-rock")) puzzle_type = PuzzleType.Rock
        else if(classes.includes("puzzle-crypto")) puzzle_type = PuzzleType.Crypto
        else if(classes.includes("puzzle-explosive")) puzzle_type = PuzzleType.Explosive
        else if(classes.includes("puzzle-consumable")) puzzle_type = PuzzleType.Consumable
        event.originalEvent.dataTransfer.setData('src', $(event.target).attr('src'))
        event.originalEvent.dataTransfer.setData('id', $(event.target).attr('data-id'))
        event.originalEvent.dataTransfer.setData('type', puzzle_type)
        event.target.classList.add("dragging");
    })
    $(".puzzle-dragable").on('dragend', function(event) {
        event.target.classList.remove("dragging");
    })
    $(".puzzle-designer-square").on('dragover', function(event) {
        event.preventDefault();
    })
    $(".puzzle-designer-square").on('drop', function(event) {
        event.preventDefault();
        // Set block in array
        let x : number = Number(event.currentTarget.getAttribute('data-x'))
        let y : number = Number(event.currentTarget.getAttribute('data-y'))
        if(event.originalEvent.dataTransfer.getData('type') == PuzzleType.Soil) {
          puzzleBlocks[x][y].soil_id = Number(event.originalEvent.dataTransfer.getData('id'))
          puzzleBlocks[x][y].soil_src = event.originalEvent.dataTransfer.getData('src')
          event.currentTarget.getElementsByClassName("puzzle-designer-img-back")[0].setAttribute('src', event.originalEvent.dataTransfer.getData('src'))
        } else {
          puzzleBlocks[x][y].spawn_id = Number(event.originalEvent.dataTransfer.getData('id'))
          puzzleBlocks[x][y].content_src = event.originalEvent.dataTransfer.getData('src')
          event.currentTarget.getElementsByClassName("puzzle-designer-img-front")[0].setAttribute('src', event.originalEvent.dataTransfer.getData('src'))
          puzzleBlocks[x][y].spawn_type = PuzzleType[event.originalEvent.dataTransfer.getData('type')]
        }
    })
    $("#create-new-puzzle-form").on('submit', function(event) {
      let postData : Puzzle = {
        blocks: puzzleBlocks,
        name: String($("#name").val())
      }

      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        url: "/administrator/world/puzzle",
        data: postData
      }).done(function() {
        $(location).attr('href',"/administrator/world/puzzle"); 
      })

      return false
    });
}


function rebuildBoard() {
    let height : number = Number($("#puzzle-height").val())
    let width : number = Number($("#puzzle-width").val())

    // Fill puzzle array
    while(puzzleBlocks.length) puzzleBlocks.pop()
    for (let row = 0; row < height; row++) {
      var newRow = Array<Block>();
      for (let column = 0; column < width; column++) {
        newRow.push({
          soil_id: -1,
          spawn_id: -1,
          spawn_type: PuzzleType.None,
          soil_src: "",
          content_src: "",
        })
      }
      puzzleBlocks.push(newRow)
    }
    $('.puzzle-designer').empty();

    let newHtml : string = ""
    // Build new elements
    let lastWasOdd : boolean = true
    for (let row = 0; row < height; row++) {
      lastWasOdd = !lastWasOdd

      newHtml += '<div class="puzzle-designer-row">'
      for (let column = 0; column < width; column++) {
        if((column + Number(lastWasOdd)) % 2) {
          newHtml += 
          `<div id="puzzle-designer-square-${row}-${column}" class="puzzle-designer-square" data-x="${column}" data-y="${row}">
            <img id="puzzle-designer-back-${row}-${column}" class="puzzle-designer-img-back" src="${puzzleBlocks[column][row].soil_src}"/>
            <img id="puzzle-designer-front-${row}-${column}" class="puzzle-designer-img-front src="${puzzleBlocks[column][row].content_src}"/>
          </div>`
        } else {
          newHtml += 
          `<div id="puzzle-designer-square-${row}-${column}" class="puzzle-designer-square puzzle-designer-square-odd" data-x="${column}" data-y="${row}">
            <img id="puzzle-designer-back-${row}-${column}" class="puzzle-designer-img-back" src="${puzzleBlocks[column][row].soil_src}"/>
            <img id="puzzle-designer-front-${row}-${column}" class="puzzle-designer-img-front src="${puzzleBlocks[column][row].content_src}"/>
          </div>`
        }
      }
      newHtml += '</div>'
    }
    $(newHtml).appendTo('.puzzle-designer');
}