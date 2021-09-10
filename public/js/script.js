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

  });
  
