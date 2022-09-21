function open_modal(url, id) {
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById(`#myBtn_${id}`);
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks on the button, open the modal
    // btn.onclick = function () {
      modal.style.display = "block";
    // }
    
    // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //   modal.style.display = "none";
    // }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    var form = new FormData();
    form.append('id', id);
  
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'accept': 'application/json'
        },
        body: form,
    })
        .then(response => response.text())
        .then(function (response) {
            console.log(response);
            console.log(response.message);
            $('#myModal').html(response);
         
        });
}

