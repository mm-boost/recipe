
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
    cell1.innerHTML = '<td class="foodname"><input class=foodtex value="" name="foodname[]" type="text" placeholder="食材名"></td>';
    cell2.innerHTML = '<td class="foodnum"><input class=food_num value="" name="foodnum[]" type="text" placeholder="数量"></td>';
    cell3.innerHTML = '<td class="foodunit"><select name="unit[]" class="unit"><option value="">単位</option><option value="cc">cc</option><option value="ml">ml</option><option value="g">g</option><option value="本">本</option><option value="個">個</option><option value="枚">枚</option><option value="束">束</option><option value="袋">袋</option><option value="缶">缶</option><option value="房">房</option><option value="切">切</option><option value="合">合</option><option value="適量">適量</option>';
    cell4.innerHTML = '<td class="food_del"><button class="fooddel" name="del">✖︎</button></td>';
 });
});

$(function(){
$(document).on('click', '.fooddel',function(){
  let row = $(this).closest("tr").remove();
  $(row).remove();
  });
});

//shopping 買い物メモの金額自動計算設定
function addSelectItem(){
  itemStr = document.form1.shop.value;
  len = document.form1.retailer.options.length;
  document.form1.retailer.options[len] = new Option(itemStr,itemStr);
  }  

function inputCheck(){
  // 2つの入力フォームの値を取得
  //document（資料）オブジェクトは、ブラウザ上で表示されたドキュメントを操作できます
  var amount = document.getElementById("amount").value;
  var num = document.getElementById("num").value;
  //乗算の設定
  var mul = parseFloat(amount, 10) * parseFloat(num, 10);
  //デバックの設定
  console.log(mul);
  // 計算結果を表示
  var amounttotal = document.getElementById("amounttotal");
  if(isNaN){
  amounttotal.value = mul;
      } else {
  amounttotal.value = 0;
      }    
  }  
  

