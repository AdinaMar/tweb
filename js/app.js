//USER CARD TOGGLE INFOS

$('.user-card').on('click', function () {
  // the element that was clicked:
  $(this)
    // finding the first ancestor <div> element:
    .closest('div')
    // finding the descendent '.toggleclass' elements:
    .find('.user-info')
    // adding the 'open' class-name:
    .toggleClass('active');
  $(this).toggleClass('active');
});

//DELETE OFFICE
function deleteOffice(id) {
  $.ajax({
    url: 'includes/deleteoffice.php',
    type: 'POST',
    data: 'id=' + id,
    success: function (result) {
      $('#office-card' + id).hide(500);
    },
  });
}


function deleteUser(id) {
    $.ajax({
      url: 'includes/delete.php',
      type: 'POST',
      data: 'id=' + id,
      success: function (result) {
        $('#user-row' + id).hide(500);
      },
    });
  }

  //SEARCH USER
  $(document).ready(function(){
    $("#search-user").keyup(function(){
      var input = $(this).val();
      

      if(input != ""){
        $.ajax({
          url: "includes/livesearch.php",
          method: "POST",
          data:{input:input},

          success:function(data){
            console.log(data)
            $("#search-result").html(data);
          }
        })
      }else {
        $("#search-result").css("display", "none");
      }
    })
  })

