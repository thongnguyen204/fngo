
$(function(){
    var max_day = $("#day_number").val();
    var count1 = max_day;
    $("#addDayEdit").on('click',function(){
        count1++;
        var table = "<table id='"+count1+"'>"+
        "<tr> <td>Title</td>"+
        "<td><input type='text' name='subTripTitle["+count1+"]' size='40'/></td>"
        +"</tr>"
        +"<tr><td>Content</td><td><textarea name='subTripContent["+count1+"]' rows='10' cols='50'></textarea></td></tr>"
        +"</table>";
        $("#day").append(table);
    });
    $("#removeDayEdit").on('click',function(){
        var x = '#' + String(count1);
        $(x).remove();
        count1--;
        
    });

    // print subtrips

    
     
  });
  
