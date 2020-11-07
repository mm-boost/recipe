
$(function(){
 $(document).on('click', '#food_cre',function(){
    var table = document.getElementById("food_table");
    var row = table.insertRow();

    //   /let newCell = newrow.insertCell();
    //   let newText = document.createTextNode('<input class=foodtex value="" name="foodname" type="text" placeholder="食材名">');
    //   newCell.appendChild(newText);

    //   newCell = newrow.insertCell();
    //   newText = document.createTextNode('<input value="" name="foodnum" type="text" placeholder="数量">');
    //   newCell.appendChild(newText);

    //   newCell = newrow.insertCell();
    //   newText = document.createTextNode('<button class="fooddel" name="del">✖︎</button>');
    //   newCell.appendChild(newText);
        //td分追加
        var cell1 = row.insertCell();
        var cell2 = row.insertCell();
        // セルの内容入力
        cell1.innerHTML = '行を追加';
        cell2.innerHTML = 'この行を削除';
    }); 
});

// $(function(){
// $(document).on('click', '.fooddel',function(){
//     let row = $(this).closest("tr").remove();
//     $(row).remove();
//     });
// });
