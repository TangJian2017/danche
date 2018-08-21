var flag = true;
function sortTable(sort_row){
    /*
     * 思路：
     * 1，排序就需要数组。获取需要参与排序的行对象数组。
     * 2，对行数组中的每一个行的年龄单元格的数据进行比较，并完成行对象在数组中的位置置换。
     * 3，将排好序的数组重新添加回表格。
     */
    var oTabNode = document.getElementById("info");
    var collTrNodes = oTabNode.rows;
    //定义一个临时容器，存储需要排序行对象。
    var trArr = [];
    //遍历原行集合，并将需要排序的行对象存储到临时容器中。
    for(var x=1; x<collTrNodes.length; x++){
        trArr[x-1] = collTrNodes[x];
    }
    //对临时容器排个序。
    mySort(trArr,sort_row);
    //将排完序的行对象添加会表格。
    if (flag) {
        for (var x = 0; x < trArr.length; x++) {
            //oTabNode.childNodes[0].appendChild(trArr[x]);
//                        alert(trArr[x].cells[0].innerHTML);
            trArr[x].parentNode.appendChild(trArr[x]);
        }
        flag = false;
    }else{
        for (var x = trArr.length-1; x >=0; x--) {
            trArr[x].parentNode.appendChild(trArr[x]);
        }
        flag = true;
    }
//                alert("over");
}
function mySort(arr,sort_row){
    for(var x=0; x<arr.length-1; x++){
        for(var y=x+1; y<arr.length; y++){

            //按照第sort_row列排列
            if(parseInt(arr[x].cells[sort_row].innerHTML)>parseInt(arr[y].cells[sort_row].innerHTML)){
                var temp = arr[x];
                arr[x] = arr[y];
                arr[y] = temp;
//                            arr[x].swapNode(arr[y]);
            }
        }
    }
}