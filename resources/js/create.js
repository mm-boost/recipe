
$(function(){
 $(document).on('click', '#food_cre',function(){
    var table = document.getElementById("food_table");
    var row = table.insertRow();

    //td分追加
    var cell1 = row.insertCell();
    var cell2 = row.insertCell();
    var cell3 = row.insertCell();
    var cell4 = row.insertCell();
    // セルの内容入力
    cell1.innerHTML = '<input class=foodtex value="" name="foodname" type="text" placeholder="食材名">';
    cell2.innerHTML = '<td class="foodnum"><input class=food_num value="" name="foodnum" type="text" placeholder="数量"></td>';
    cell3.innerHTML = '<select name="unit" class="unit"><option value="">単位</option><option value="1">cc</option><option value="2">ml</option><option value="3">g</option><option value="4">本</option><option value="5">個</option><option value="6">枚</option><option value="7">房</option><option value="8">適量</option></select>';
    cell4.innerHTML = '<button class="fooddel" name="del">✖︎</button>';
  }); 
});

$(function(){
$(document).on('click', '.fooddel',function(){
  let row = $(this).closest("tr").remove();
  $(row).remove();
  });
});
