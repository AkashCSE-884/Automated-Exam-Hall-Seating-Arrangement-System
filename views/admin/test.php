<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<ul id="contentul"></ul>

<script>
    
    myFunction1()
    function shuffleObject(obj){
    // new obj to return
        let newObj = {};
            // create keys array
        var keys = Object.keys(obj);
            // randomize keys array
            keys.sort(function(a,b){return Math.random()- 0.5;});
        // save in new array
            keys.forEach(function(k) {
                newObj[k] = obj[k];
        });
        return newObj;
    }
    function shuffle(o){ //v1.0
    for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
    };
    


    async function myFunction1() {
        var obj = {}
        const req = await fetch('../../section.json');
        let resReq = await req.json();
        let data = resReq.ret_data;
        // console.log(data);



        let frm = new FormData();
        frm.append("testPerform","hello");
        let testData = await fetch("../process/dataProcess.php",{
            method:"POST",
            body: frm
        });
        let res = await testData.json();
        let html = "";


        for (let i=0; i<data.length; i++){
            html += `<h1>${data[i].dept_name} <br>${data[i].name}</h1>`
            obj [`${data[i].dept_name}-${data[i].name}`] = [];
            // xi  = []
            // console.log(xi)
            res.map(el =>{
            
            if(el.batch_id == (i+1)){
                obj[`${data[i].dept_name}-${data[i].name}`].push(el)
                html+=`<li>${el.user_name}</li>`
            }
            
        })
        
            html += `<h2></h2>`
            
        }
        contentul.innerHTML = html;

        room = {}
        room2 = []
        m=0
        let frm2 = new FormData();
        frm2.append("testPerformRoom","hello2");
        let testDataT = await fetch("../process/dataProcess.php",{
            method:"POST",
            body: frm2
        });
        let resT = await testDataT.json();
        // console.log(Object.values(resT));
        obj = shuffleObject(obj);
        resT = shuffle(resT);
        roomNumber = [] 
        for(let j=0; j<resT.length; j++){
            room[j] = [];
            roomNumber.push(Object.values(resT)[j].room_id)
            for(k=0; k<Object.keys(obj).length; k++){
                
                for (let l = 0; l < Object.values(obj)[k].length; l++) {
                    var flag = 0;
                    if(room[0].length >10){
                        for(let o=0; o<Object.keys(room).length; o++){
                            
                            for (let li = 0; li < Object.values(room)[o].length; li++) {
                                if(Object.values(obj)[k][l].user_id === Object.values(room)[o][li].user_id) {
                                    flag = 1
                                    break;
                                }
                                if(j==o && room[j].length >0){ 
                                    
                                    if(room[j][0].batch_id == 1 || room[j][0].batch_id == 3 || room[j][0].batch_id == 5 || room[j][0].batch_id == 7 || room[j][0].batch_id == 9 || room[j][0].batch_id ==11 ){ 
                                        // console.log(Object.values(obj)[k][l].batch_id)
                                        if (Object.values(obj)[k][l].batch_id == 2 || Object.values(obj)[k][l].batch_id == 4 || Object.values(obj)[k][l].batch_id == 6 || Object.values(obj)[k][l].batch_id == 8 || Object.values(obj)[k][l].batch_id == 10 || Object.values(obj)[k][l].batch_id ==12 ){ 
                                            flag = 1
                                            break
                                        }
                                        
                                    }
                                }
                                
                            }if(flag == 1){break}
                        }
                    } 
                   
                    else{
                        room[j].push(Object.values(obj)[k][l])
                        flag = 1;
                    } 
                    if(resT[j].seat_capacity  <= room[j].length){break}
                    if(flag == 0 ){ room[j].push(Object.values(obj)[k][l])}
                   
                }
            }
        }
        // console.log(room)
        html = ""
        for (let i=0; i<Object.keys(room).length; i++){
            
            if(Object.values(room)[i].length>10){
                html+=`<h1>Room -${roomNumber[i]}</h1>`
                for (let l=0; l<Object.values(room)[i].length; l++){
                    
                    html+=`<li>${Object.values(room)[i][l].user_name} ${Object.values(room)[i][l].id}---${Object.values(room)[i][l].batch_id}</li>`
                }
            }
            
           
            
            
        
            
        }
        contentul.innerHTML = html;
    }

</script>
</body>

</html>