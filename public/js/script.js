var count = 0;

$(function(){
    $("#addDay").on('click',function(){
        count++;
        var table = "<table id='"+count+"'>"+
        "<tr> <td>Title</td>"+
        "<td><input type='text' name='subTripTitle["+count+"]' size='40'/></td>"
        +"</tr>"
        +"<tr><td>Content</td><td><textarea name='subTripContent["+count+"]' rows='10' cols='50'></textarea></td></tr>"
        +"</table>";

        $("#day").append(table);
        
    });
    $("#removeDay").on('click',function(){
        var x = '#' + String(count);
        $(x).remove();
        count--;
    });
    var max_day = $("#day_number").val();
    
  });

  //show Image name on input after chose from device
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  //show image before save
  $(document).ready(function(){
    // Prepare the preview for profile picture
        $("#customFile").change(function(){
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#avatar').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }