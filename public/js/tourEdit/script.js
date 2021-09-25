
$(function(){
    var max_day = $("#day_number").val();
    var count1 = max_day;
    $("#addDayEdit").on('click',function(){
        count1++;
        var table = "<div id='"+count1+"'>"+
        "<label for='title'>Title </label>"+
        "<input class='form-control'  type='text' name='subTripTitle["+count1+"]'/>"
        +"<label for='content'>Content</label><textarea class='form-control' name='subTripContent["+count1+"]' rows='10' cols='50'></textarea>"
        +"</div>";
        $("#day").append(table);
    });
    $("#removeDayEdit").on('click',function(){
        var x = '#' + String(count1);
        $(x).remove();
        count1--;
        
    });

    // print subtrips

    
     
  });
  
