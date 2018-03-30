/* Gestion de la to-do list*/

var myNodelist = document.getElementsByTagName("li");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("span");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}


var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

var list = document.querySelector('ul');
if(list){
    list.addEventListener('click', function(ev) {
        if (ev.target.tagName === 'li') {
          ev.target.classList.toggle('checked');
        }
      }, false);
}


function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("Remplir le champ");
  } else {
    document.getElementById("myUL").appendChild(li);
    li.style.listStyle = "none";
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("span");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}

function loadNewProfilePic(input)
{
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile_pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
}

window.onload=function()
{
  $(function() { 
    // Delete anchor tag clicked
    $('a.deleteEntryAnchor').click(function() { 
      var thisparam = $(this);
      thisparam.parent().parent().find('p').text('Effacement...'); 
      $.ajax({ 
          type: 'POST', 
          url: "../Traitements/delete.php",
          data: "id=" + thisparam.data().id, 
            
          success: function(results){ 
              thisparam.parent().parent().fadeOut('slow'); 
          } 
      }); 
      return false; 
    });
    });

    

}

